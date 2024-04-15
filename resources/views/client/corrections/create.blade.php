@extends('layout.user-layout')

@section('content')

    

    <form class="main-form" action="{{ route('batches.corrections.store', $batch->id) }}" method="POST">
        @csrf
        
        <div class="main-form-group">
            <label class="main-label" for="">contenu de la correction</label>
            <textarea class="main-input" name="content" id="content" cols="10" rows="10"></textarea>
        </div>

        <div class="main-form-group">
            <label class="main-label" for="">Titre de la correction</label>
            <input class="main-input" type="text" name="name">
        </div>

        <div class="main-form-group">
            <button class="main-btn" type="submit">
                Creer une correction
            </button>
        </div>
    </form>

@endsection