<?php

namespace App\Http\Controllers;

use App\Models\Guest;
use App\Models\User;
use Illuminate\Auth\Events\Validated;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{

    public function home() {

        return view('client.home');
    }

    public function warranty() {

        return view('client.warranty');
    }

    public function fidelity() {

        return view('client.fidelity');
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $users = User::all();

        return view('admin.users.index', compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        
        $guests = Guest::all();

        return view('admin.users.create', compact('guests'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store()
    {

        $validated = request()->validate([
            'name' => 'required|min:3|max:40|unique:users,name',
            'password' => 'required|confirmed',
            'role' => 'numeric',
        ]);

        User::create([
            'name' => $validated['name'],
            'password' => Hash::make($validated['password']),
            'role' => $validated['role'],
        ]);

        return redirect()->route('users.index')->with('success', 'Account created Successfully');
    }

    /**
     * Display the specified resource.
     */
    public function show(User $user)
    {

        return view('admin.users.show', compact('user'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(User $user)
    {

        return view('admin.users.edit', compact('user'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(User $user)
    {

        $validated = request()->validate([
            'name' => 'required|min:3|max:40|unique:users,name',
        ]);

        $user->update($validated);

        return redirect()->route('users.index');
    }

    public function changePassword(User $user)
    {
        $validated = request()->validate([
            'password' => 'required|confirmed',
        ]);

        if(!Hash::check(request()->verification, $user->password)) {

            return redirect()->back()->with('error', 'password don\'t match' );
        }

        $user->update([
            'password' => Hash::make($validated['password']),
        ]);

        $user->update($validated);

        return redirect()->route('users.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(User $user)
    {
        $user->delete();
    
        return redirect()->route('users.index');
    }
}
