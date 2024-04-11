@extends('layouts.app')

@section('title', 'Profile Setting')

@section('contents')
<hr>
<form method="POST" action="">
    <div>
        <label for="">Name</label>
        <input type="text" name="name" value="{{ auth()->user()->name }}">
    </div>
    <div>
        <label for="">Email</label>
        <input type="text" name="email" value="{{ auth()->user()->email }}">
    </div>
    <div>
        <button type="submit">Save Profile</button>
    </div>
</form>
@endsection