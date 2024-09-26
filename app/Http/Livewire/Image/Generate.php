<?php

namespace App\Http\Livewire\Image;

use App\Models\Image;
use App\Models\Prompt;
use Livewire\Component;
use LucasDotVin\Soulbscription\Models\Plan;
use GuzzleHttp\Client;

class Generate extends Component
{
    public Image $image;
    public Prompt $prompt;

    public function render()
    {
        return view('livewire.image.generate');
    }

    public $description;
    public $generatedUrl;

    public function submit()
    {
        // $this->validate();
        $description = $this->description ?? 'Sample Image';
        try {
            // Set up OpenAI API client
            $client = new Client([
                'base_uri' => 'https://api.openai.com',
                'headers' => [
                    'Authorization' => 'Bearer ' . config('services.openai.key'),
                    'Content-Type' => 'application/json',
                ],
            ]);

            // Make a request to OpenAI API
            $response = $client->post('/v1/images/generations', [
                'json' => [
                    "model" => "dall-e-3", //OpenAI model
                    "prompt" => $description,
                    "n" => 1,
                    "size" => "1024x1024", //Image resolution
                ],
            ]);

            //Get the image URL from the response
            $result = json_decode($response->getBody()->getContents());
            $url = $result->data[0]->url;
            Image::create([
                'url' => $url,
                'description' => $description,
            ]);
            Prompt::create([
                'webhook_url' => $url,
                'image_description' => $description,
            ]);


            //Set the generated URL for displaying in the view
            $this->generatedUrl = $url ?? null;
        } catch (\Exception $e) {
            var_dump($e->getMessage()); die();
            // Handle error case
            $this->generatedUrl = null;
            session()->flash('error', 'Error generating the image. Please try again.');
        }
    }
}
