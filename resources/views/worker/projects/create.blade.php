@extends('layout.user-layout')

@section('content')
    
    <form class="main-form" action="{{ route('projects.store') }}" method="POST">
        @csrf
        <div class="main-form-group">
            <label class="main-label" for="">Titre du project</label>
            <input class="main-input" type="text" name="name">
        </div>
        <div class="main-form-group">
            <label class="main-label" for="">Selectionnez le client</label>
            <select class="main-input" name="user_id" id="">
                <option value="">Selectionnez le client</option>
                @foreach ($users as $user)
                    <option value="{{ $user->id }}">{{ $user->name }}</option>
                @endforeach
            </select>
        </div>
        <div class="main-form-group">
            <label class="main-label" for="">Nombre de lot affecter au projet</label>
            <input class="main-input" type="number" name="batches">
        </div>
        <div class="main-form-group">
            <label class="main-label" for="">Descriptif du project</label>
            <textarea class="main-input" name="description" id="description" cols="30" rows="10"></textarea>
        </div>
        <div>
            <button class="main-btn" type="submit">
                Creer le projet
            </button>
        </div>
    </form>

@endsection