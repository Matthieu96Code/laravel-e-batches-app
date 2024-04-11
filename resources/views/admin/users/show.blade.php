@extends('layout.user-layout')

@section('content')
<h1>User</h1>

<h2>{{ $user->name }}</h2>
<h2>{{ $user->created_at }}</h2>

<form action="{{ route('users.destroy', $user->id) }}" method='post'>
    @csrf
    @method('delete')
    <button type="submit">Delete</button>
</form>

@endsection