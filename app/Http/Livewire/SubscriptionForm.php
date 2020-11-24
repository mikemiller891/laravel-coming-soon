<?php

namespace App\Http\Livewire;

use App\Models\Visitor;
use Livewire\Component;

class SubscriptionForm extends Component
{
    public $email;

    public function render()
    {
        return view('livewire.subscription-form');
    }

    public function subscribe(): void
    {
        $validInputs = $this->validate([
            'email' => 'required|email|unique:visitors|max:100',
        ]);
        $visitor = new Visitor;
        $visitor->email = $validInputs['email'];
        $visitor->save();
        session()->flash('success', true);
        $this->reset();
    }
}
