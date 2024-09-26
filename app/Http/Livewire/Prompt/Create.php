<?php

namespace App\Http\Livewire\Prompt;

use App\Models\Prompt;
use Livewire\Component;
use LucasDotVin\Soulbscription\Models\Plan;

class Create extends Component
{
    public Prompt $prompt;

    public function mount(User $user)
    {
        $this->user = $user;
        $this->initListsForFields();
    }

    public function render()
    {
        return view('livewire.prompt.create');
    }

    public function submit()
    {
        $this->validate();
        $this->user->password = $this->password;
        $this->user->save();
        $this->user->roles()->sync($this->roles);

        return redirect()->route('admin.prompts.index');
    }


}
