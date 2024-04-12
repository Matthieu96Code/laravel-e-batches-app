<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{

    public function register(){

        return view('auth.register');
    }
    
    public function store(){
        
        $validated = request()->validate([
            'name' => 'required|min:3|max:40|unique:users,name',
            'password' => 'required|confirmed',
            // 'email' => 'nullable',
        ]);

        User::create([
            'name' => $validated['name'],
            'password' => Hash::make($validated['password']),
            // 'email' => $validated['email'],
        ]);

        return redirect()->route('login')->with('success', 'Account created Successfully');
    }
    
    public function login(){
        
        return view('auth.login');
    }
    
    public function authenticate(){
        
        $validated = request()->validate([
            'name' => 'required',
            'password' => 'required',
        ]);

        if(auth()->attempt($validated)){
            
            request()->session()->regenerate();
            
            if(auth()->user()->role > 0 ) {
            return redirect()->route('admin.dashboard')->with('success', 'Logged in Successfully');
            }

            return redirect()->route('users.home')->with('success', 'Logged in Successfully');
        }

        return redirect()->route('login')->withErrors([
            'email' => 'No matching user found with the provided email and password'
        ]);
    }

    public function logout(){
        auth()->logout();

        request()->session()->invalidate();
        request()->session()->regenerateToken();
        
        return redirect()->route('login')->with('success', 'Logged out Successfully');
    }

}
