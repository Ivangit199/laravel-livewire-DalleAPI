<?php

namespace App\Http\Livewire\Prompt;

use App\Models\Prompt;
use Livewire\Component;

class Edit extends Component
{
    public Prompt $prompt;

    public array $listsForFields = [];

    public function mount(Prompt $prompt)
    {
        $this->prompt  = $prompt;
    }

    public function render()
    {
        return view('livewire.prompt.edit');
    }

    public function submit()
    {
        $this->validate();
        // $this->prompt->prompt = $this->prompt;
        $this->prompt->save();

        return redirect()->route('admin.prompts.index');
    }

    protected function rules(): array
    {
        return [
            'prompt.prompt' => [
                'string',
                'required',
            ],

        ];
    }

    // protected function initListsForFields(): void
    // {
    //     $this->listsForFields['roles'] = Role::pluck('title', 'id')->toArray();
    // }
}
