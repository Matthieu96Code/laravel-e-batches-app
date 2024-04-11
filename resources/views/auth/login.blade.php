@extends('layout.auth-layout')

@section('content')

    <div class="login-section">
        
        @if ($errors->any())
            @foreach ($errors->all() as $error)
                <p>{{$error}}</p>
            @endforeach
        @endif
        
        <h1 class="main-title login-title">Se connecter</h1>
        
        @foreach ($errors as $error)
            <p>{{ error }}</p>
        @endforeach    
        
        <form class="main-form login-form" action="" method="post">
            @csrf
            <div class="main-form-group">
                <label class="main-label" for="name">Nom d'utilisateur</label>
                <input class="main-input" type="text" name="name" placeholder="Entrer votre nom d'utilisateur">
            </div>
            <div class="main-form-group">
                <label class="main-label" for="password">Mot de passe</label>
                <input class="main-input" type="password" name="password" placeholder="Entrer votre mot de passe">
            </div>
            <div class="main-form-group">
                <button class="main-btn" type="submit">Se connecter</button>
            </div>
            <div class="main-form-group">
                <p class="register-redirection">vous n'avez de compte?<a class="resgister-link main" href="{{ url('register') }}" class="main-link"> Créer un compte</a></p>
            </div>
        </form>
    </div>
@endsection