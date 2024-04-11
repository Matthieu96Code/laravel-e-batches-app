@extends('layout.text-editor')

@section('content')
    
<form class="main-form" action="{{ route('corrections.update', $correction->id) }}" method="POST">
    @csrf
    @method('PUT')
    <div  class="main-form-group">
        <label class="main-label" for="">Titre de la correction</label>
        <input class="main-input" type="text" name="name" value="{{ $correction->name }}">
    </div>        
    <div  class="main-form-group">
        <label class="main-label" for="">contenu de la correction</label>
        <textarea class="main-input" name="content" id="description" cols="30" rows="10">
            {{ $correction->content }}
        </textarea>
    </div>
    <div  class="main-form-group">
        <button class="main-btn" type="submit">
            Modifiez la correction
        </button>
    </div>
</form>

@endsection
