@extends('layouts.auth  ')

@section('title', 'Register')

@section('contents')
    <div class=" bg-white p-5 md:px-12">
        <div>
            <h1 class="font-bold text-2xl text-gray-700 py-5 mb-2">S&lsquo;enregistre sur e-correction</h1>
        </div>
        <div>
            <form action="{{ route('register.save') }}" method="POST">
                @csrf
                <div class="flex flex-col">
                    <label for="name" class="pt-4 pb-2">Nom d&lsquo;utilisateur</label>
                    <input type="text" name="name" id='name' class="border border-skin-input rounded-md p-3 hover:border-skin-input-hover focus:outline-none hover:shadow-sm" placeholder="Entrer votre nom d'utilisateur">
                    @error('name')
                    <span>{{ $message }}</span>
                    @enderror
                </div>
                <div class="flex flex-col">
                    <label for="password"  class="pt-4 pb-2">Mot de passe</label>
                    <div class="border border-skin-input rounded-md p-3 hover:border-skin-input-hover focus:outline-none hover:shadow-sm flex justify-between">
                        <input type="password" name="password" id='password' class="flex-grow outline-none" placeholder="Entrer votre mot de passe">
                    </div>
                    @error('password')
                    <span>{{ $message }}</span>
                    @enderror
                </div>
                <div class="flex flex-col">
                    <label for="password_confirmation"  class="pt-4 pb-2">Confirmer le mot de passe</label>
                    <div class="border border-skin-input rounded-md p-3 hover:border-skin-input-hover focus:outline-none hover:shadow-sm flex justify-between">
                        <input type="password" name="password_confirmation" id='password_confirmation' class="flex-grow outline-none" placeholder="Entrer votre mot de passe">
                    </div>
                    @error('password_confirmation')
                    <span>{{ $message }}</span>
                    @enderror
                </div>
                <div>
                    <label for="terms">I accept <a href="">terms and conditions</a></label>
                    <input type="checkbox" name="terms" id="terms">
                </div>
                <div class="my-4">
                    <button class="bg-skin-button-accent w-full p-3 rounded-md text-skin-button hover:bg-skin-button-accent-hover" type="submit">S&lsquo;enregistrer</button>
                </div>
                <p className="text-center text-gray-500">Vous avez déjà un compte? <a className="text-blue-600" href="{{ route('login') }}">Se connecter</a></p>
            </form>
        </div>
                    
@endsection