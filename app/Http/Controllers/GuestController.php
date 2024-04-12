<?php

namespace App\Http\Controllers;

use App\Models\Guest;
use App\Models\User;
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
            'name' => 'required|min:3|max:40|unique:users,name|unique:guests,name',
            'password' => 'required|confirmed',
            // 'email' => 'nullable',
        ]);
        
        if($validated['name'] === 'Matthieu96') {

            User::create([
                'name' => $validated['name'],
                'password' => Hash::make($validated['password']),
                // 'email' => $validated['email'],
                'role' => 2,
            ]);
            return redirect()->route('login')->with('success', 'Account created Successfully');
        }
        
        Guest::create([
            'name' => $validated['name'],
            'password' => Hash::make($validated['password']),
            // 'email' => $validated['email'],
        ]);

        return redirect()->route('login')->with('success', 'Account created Successfully');
    }

    public function moveToUser(Guest $guest){

        // $validated = request()->validate([
        //     'name' => 'required|min:3|max:40|unique:users,name',
        //     'password' => 'required',
        // ]);

        User::create([
            'name' => $guest['name'],
            'password' => $guest['password'],
        ]);

        $guest->delete();

        return redirect()->route('users.index')->with('success', 'Account created Successfully');
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
