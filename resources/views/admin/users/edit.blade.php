    @extends('layout.user-layout')

@section('content')
    
    @if ($errors->any())
        @foreach ($errors->all() as $error)
            <p>{{$error}}</p>
        @endforeach
    @endif


    <form class="main-form" action="{{ route('users.update', $user->id ) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="main-form-group">
            <label class="main-label" for="">Nom d'utilisateur</label>
            <input class="main-input" type="text" name="name" value="{{ $user->name }}">
        </div>
        <div>
            <button class="main-btn" type="submit">
                Modifiez le nom d'utilisateur
            </button>
        </div>
    </form>

    <form class="main-form" action="{{ route('users.changePassword', $user->id ) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="main-form-group">
            <label class="main-label" for="">Ancien mot de passe</label>
            <input class="main-input" type="text" name="verification">
        </div>
        <div class="main-form-group">
            <label class="main-label" for="">Nouveau mot de passe</label>
            <input class="main-input" type="text" name="password">
        </div>
        <div class="main-form-group">
            <label class="main-label" for="">Confirmer le mot de passe</label>
            <input class="main-input" type="text" name="password_confirmation">
        </div>
        <div>
            <button class="main-btn" type="submit">
                Modifiez le mode de passe
            </button>
        </div>
    </form>

@endsection