@extends('layout.auth-layout')

@section('content')

    <div class="register-section">

        @if ($errors->any())
            @foreach ($errors->all() as $error)
                <p>{{$error}}</p>
            @endforeach
        @endif

        <h1 class="main-title register-title">S'enregistrer</h1>

        <form class="main-form" action="{{ route('guests.store') }}" method="post">
            @csrf
            <div class="main-form-group">
                <label class="main-label" for="name">Nom d'utilisateur</label>
                <input class="main-input" type="text" name="name" placeholder="Entrer un nom d'utilisateur">
            </div>
            @error('name')
                <p>{{ message }}</p>
            @enderror
            <div class="main-form-group">
                <label class="main-label" for="password">Mot de passe</label>
                <input class="main-input" type="password" name="password" placeholder="Entrer un mot de passe">
            </div>
            @error('password')
                <p>{{ message }}</p>
            @enderror
            <div class="main-form-group">   
                <label class="main-label" for="confirm-password">confirmer le mot de passe</label>
                <input class="main-input" type="password" name="password_confirmation" placeholder="confirmer le mot de pass ">
            </div>
            @error('password_confirmation')
                <p>{{ message }}</p>
            @enderror
            <div class="main-form-group">
                <button class="main-btn" type="submit">S'enregistrer</button>
            </div>
            <div class="main-form-group login-redirection">
                <p>Vous avez déjà un compte? <a href="{{ url('login') }}">se connecter</a></p>
            </div>
        </form>
    </div>
@endsection