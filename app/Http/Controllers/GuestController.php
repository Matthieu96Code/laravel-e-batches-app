<?php

namespace App\Http\Controllers;

use App\Models\Guest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class GuestController extends Controller
{
    
    public function index(){

        $guests = Guest::all();

        return view('guests.index', compact('guests'));
    }

    public function create(){

    }

    public function store(){
        
        $validated = request()->validate([
            'name' => 'required|min:3|max:40|unique:users,name',
            'password' => 'required|confirmed',
            // 'email' => 'nullable',
        ]);

        Guest::create([
            'name' => $validated['name'],
            'password' => Hash::make($validated['password']),
            // 'email' => $validated['email'],
        ]);

        return redirect()->route('login')->with('success', 'Account created Successfully');
    }
    
    public function show(){

    }
    
    public function edit(){

    }
    
    public function update(){

    }
    
    public function delete(){

    }

}
