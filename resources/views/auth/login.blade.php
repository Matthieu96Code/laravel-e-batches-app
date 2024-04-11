@extends('layouts.auth  ')

@section('title', 'Login')

@section('contents')
    <div class=" bg-white p-5 md:px-12">
        <div>
            <h1 class="font-bold text-2xl text-gray-700 py-5 mb-2">Se connecter à e-correction</h1>
        </div>
        <div>
            <form action="{{ route('login.action') }}" method="POST">
                @csrf
                @if ($errors->any())
                <div>
                    <strong>Error</strong>
                    <ul>
                        @foreach ($errors->all() as $error)
                        <li><span>{{ $error }}</span></li>
                        @endforeach
                    </ul>
                </div>
                @endif
                <div class="flex flex-col">
                    <label class="pt-4 pb-2" for="name">Nom d&lsquo;utilisateur</label>
                    <input type="text" name="name" id='name' class="border border-skin-input rounded-md p-3 hover:border-skin-input-hover focus:outline-none hover:shadow-sm" placeholder="Entrer votre nom d'utilisateur">
                    @error('name')
                    <span>{{ $message }}</span>
                    @enderror
                </div>
                <div class="flex flex-col" >
                    <label for="password" class="pt-4 pb-2">Mot de passe</label>
                    <div class="border border-skin-input rounded-md p-3 hover:border-skin-input-hover focus:outline-none hover:shadow-sm flex justify-between">
                        <input type="password" name="password" id='password' class="flex-grow outline-none" placeholder="Entrer votre mot de passe">
                    </div>
                    @error('password')
                    <span>{{ $message }}</span>
                    @enderror
                </div>
                <div>
                    <label for="remember" id="remember">Remenber me</label>
                </div>
                <div class="my-4">
                    <button type="submit" class="bg-skin-button-accent w-full p-3 rounded-md text-skin-button hover:bg-skin-button-accent-hover" type="submit">Se connecter</button>
                </div>
            </form>
            <p class="text-center text-gray-500">Vous n&lsquo;avez pas de compte? <a class="text-blue-600" href="{{ route('register') }}">Creer un compte</a></p>
        </div>
    </div>
                    

@endsection
