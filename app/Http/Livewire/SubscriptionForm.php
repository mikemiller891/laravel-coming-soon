<?php

namespace App\Http\Livewire;

use App\Models\Subscriber;
use Livewire\Component;

class SubscriptionForm extends Component
{
    public $email;

    protected $rules = [
        'email' => 'bail|required|max:100|email|unique:subscribers'
    ];

    public function render()
    {
        return view('livewire.subscription-form');
    }

    public function subscribe()
    {
        $validInputs = $this->validate();
        $subscriber = new Subscriber;
        $subscriber->email = $validInputs['email'];
        $subscriber->save();
        session()->flash('success', true);
        $this->reset();
    }
}
