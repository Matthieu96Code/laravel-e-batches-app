@extends('layout.user-layout')

@section('content')
<h1>Detail du lot</h1>

<a href="{{ route('batches.corrections.create', $batch->id) }}">Ajouter une correction</a>
<a href="{{ route('batches.corrections.index', $batch->id) }}">List des corrections</a>

<h2>{{ $batch->name }}</h2>
<p>Le total des correction assigné est : {{ $batch->project->batches }}</p>
<form action="{{ route('batches.destroy', $batch->id) }}" method='POST'>
    @csrf
    @method('delete')
    <button type="submit">Delete</button>
</form>

@endsection