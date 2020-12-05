<?php

namespace App\Http\Livewire;

use App\Models\Visitor;
use Livewire\Component;

class VisitorsList extends Component
{
    public function render()
    {
        return view('livewire.visitors-list', [
            'visitors' => Visitor::paginate(40),
        ]);
    }
}
