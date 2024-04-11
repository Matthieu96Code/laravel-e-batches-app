@extends('layout.user-layout')

@section('content')
<h1 class="main-title">Projects</h1>

<table>
    
</table>
<h2>{{ $project->name }}</h2>
<p>{{ $project->user->name }}</p>
<p>{{ $project->batches }}</p>
<p>{{ $project->description }}</p>
<form action="{{ route('projects.destroy', $project->id) }}" method='POST'>
    @csrf
    @method('delete')
    <button type="submit">Delete</button>
</form>

@endsection