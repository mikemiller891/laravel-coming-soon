<?php

namespace App\Http\Controllers;

use App\Models\Visitor;
use Illuminate\Http\Request;

class ComingSoonController extends Controller
{
    public function show()
    {
        return view('coming-soon');
    }

    public function store(Request $request)
    {
        $validInputs = $request->validate([
            'email' => 'required|email|unique:visitors|max:100',
        ]);
        $visitor = new Visitor;
        $visitor->email = $validInputs['email'];
        $visitor->save();

        return view('coming-soon');
    }
}
