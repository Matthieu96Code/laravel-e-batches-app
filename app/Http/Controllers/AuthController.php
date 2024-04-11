<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\ValidationException;

class AuthController extends Controller
{
    public function __construct() {
        $this->middleware('guest')->except('logout');
    }

    public function register() {
        return view('auth/register');
    }

    public function registersave(Request $request) {
        Validator::make($request->all(), [
            'name' => 'required',
            'password' => 'required|min:6|confirmed',
        ])->validate();

        User::create([
            'name' => $request->name,
            'password' => Hash::make($request->password),
            'type' => "0"
        ]);

        return redirect()->route('login');
    }

    public function login() {
        return view('auth/login');
    }

    public function loginAction(Request $request) {
        Validator::make($request->all(), [
            'name' => 'required',
            'password' => 'required',
        ])->validate();

        if (!Auth::attempt($request->only('name', 'password'), $request->boolean('remenber'))) {
            throw ValidationException::withMessages([
                'name' => trans('auth.failed')
            ]);
        }

        $request->session()->regenerate();

        if (auth()->user()->type == 'admin') {
            return redirect()->route('admin/home');
        } else {
            return redirect()->route('home');
        }
    }

    public function logout(Request $request) {
        Auth::guard('web')->logout();

        $request->session()->invalidate();

        return redirect('/login');
    }
}
