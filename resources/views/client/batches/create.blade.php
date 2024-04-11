@extends('layout.user-layout')

@section('content')
    
    <form class="main-foem" action="{{ route('batches.store') }}" method="POST">
        @csrf
        <div class="main-form-group">
            <label class="main-label" for="">Titre du lot</label>
            <input class="main-input" type="text" name="name">
        </div>
        <div class="main-form-group">
            <label class="main-label" for="">Selectionnez le projet</label>
            <select class="main-input" name="project_id" id="">
                <option value="">Selectionnez le projet</option>
                @foreach ($projects as $project)
                    <option value="{{ $project->id }}">{{ $project->name }}</option>
                @endforeach
            </select>
        </div>
        <div class="main-form-group">
            <button class="main-btn" type="submit">
                Creer le projet
            </button>
        </div>
    </form>

@endsection