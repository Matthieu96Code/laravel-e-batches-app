@extends('layout.user-layout')

@section('content')
<h1>Detail du lot</h1>

<h2>{{ $correction->name }}</h2>
<p> Le contenu de votre correction : </p>
{!!$correction->content!!}
{{-- <p>Le total des correction assigné est : {{ $batch->project->batches }}</p> --}}
<form action="{{ route('corrections.destroy', $correction->id) }}" method='POST'>
    @csrf
    @method('delete')
    <button type="submit">Delete</button>
</form>

@endsection