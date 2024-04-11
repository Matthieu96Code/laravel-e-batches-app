@extends('layout.user-layout')

@section('content')
    
<form class="main-form" action="{{ route('batches.update', $batch->id) }}" method="POST">
    @csrf
    @method('PUT')
    <div class="main-form-group">
        <label class="main-label" for="">Titre du lot</label>
        <input class="main-input" type="text" name="name" value="{{ $batch->name }}">
    </div>
    <div class="main-form-group">
        <label class="main-label" for="">Selectionnez le projet</label>
        <select class="main-input" name="project_id" id="">
            <option value="{{ $batch->project_id }}" selected>{{ $batch->project->name }}</option>
            @foreach ($projects as $project)
                @if ($project->id !== $batch->project_id)
                    <option value="{{ $project->id }}">{{ $project->name }}</option>
                @endif
            @endforeach
        </select>
    </div>
    <div class="main-form-group">
        <button class="main-btn" type="submit">
            Modifiez le lot
        </button>
    </div>
</form>

@endsection