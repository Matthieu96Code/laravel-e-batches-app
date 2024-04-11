@extends('layout.user-layout')

@section('content')
    
    <form class="main-form" action="{{ route('projects.update', $project->id ) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="main-form-group">
            <label class="main-label" for="">Titre du project</label>
            <input class="main-input" type="text" name="name" value="{{ $project->name }}">
        </div>
        <div class="main-form-group">
            <label class="main-label" for="">Selectionnez le client</label>
            <select class="main-input" name="user_id" id="">
                <option value="{{ $project->user_id }}" selected>{{ $project->user->name }}</option>
                @foreach ($users as $user)
                    @if ($user->id !== $project->user->id)
                        <option value="{{ $user->id }}">{{ $user->name }}</option>
                    @endif
                @endforeach
            </select>
        </div>
        <div class="main-form-group">
            <label class="main-label" for="">Nombre de lot affecter au projet</label>
            <input class="main-input" type="number" name="batches" value="{{ $project->batches }}">
        </div>
        <div class="main-form-group">
            <label class="main-label" for="">Descriptif du project</label>
            <textarea class="main-input" name="description" id="description" cols="30" rows="10">{{ $project->description }}</textarea>
        </div>
        <div>
            <button type="submit">
                Modifiez le projet
            </button>
        </div>
    </form>

@endsection