@extends('layout.user-layout')

@section('content')


    <h1 class="main-title">Créer un utilisateur</h1>
    <form class="main-form" action="{{ route('users.store') }}" method="post">
        @csrf
        <div class="main-form-group">
            <label class="main-label" for="name">Nom d'utilisateur</label>
            <input class="main-input" type="text" name="name">
        </div>
        @error('name')
            <p>{{ message }}</p>
        @enderror
        <div class="main-form-group">
            <label class="main-label" for="password">Mot de passe</label>
            <input class="main-input" type="password" name="password">
        </div>
        @error('password')
            <p>{{ message }}</p>
        @enderror
        <div class="main-form-group">
            <label class="main-label" for="confirm-password">confirmer le mot de passe</label>
            <input class="main-input" type="password" name="password_confirmation">
        </div>
        @error('password_confirmation')
            <p>{{ message }}</p>
        @enderror
        <div class="main-form-group">
            <label class="main-label">Rôle de l'utilisateur</label>
            <select class="main-input" name="role" id="role">
                <option class="main-input" value="0">User</option>
                <option class="main-input" value="1">Agent</option>
            </select>
        </div>
        <div class="main-form-group">
            <button class="main-btn create-user-btn" type="submit">Créer</button>
        </div>
    </form>

    
    @include('admin.guest.index')
    
@endsection