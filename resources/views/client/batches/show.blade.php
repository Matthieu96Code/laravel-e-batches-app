@extends('layout.user-layout')

@section('content')
<h1>Detail du lot</h1>

@if ($errors->any())
@foreach ($errors->all() as $error)
    <p>{{$error}}</p>
@endforeach
@endif

<form action="{{ route('batches.corrections.store', $batch->id) }}" method='POST'>
    @csrf
    {{-- <label for=""></label> --}}
    <input class="main-input" type="text" name="name" placeholder="taper le nom de la correction">
    <button class="main-btn" type="submit">Ajouter une correction</button>
</form>

{{-- <a href="{{ route('batches.corrections.create', $batch->id) }}">Ajouter une correction</a> --}}
{{-- <a href="{{ route('batches.corrections.index', $batch->id) }}">List des corrections</a> --}}

<h1>Liste des correction</h1>

<table class="main-table correction-table">
    <thead class="main-thead correction-thead">
        <tr class="main-tr correction-tr">
            <th class="main-th correction-th">Nom d'utilisateur</th>
            <th class="main-th correction-th">Créer le</th>
            <th class="main-th correction-th">Modifier</th>
            <th class="main-th correction-th">Delete</th>
        </tr>
    </thead>
    <tbody class="main-thead correction-thead">
        @foreach ($batch->corrections as $correction)
            @if ($batch->project->user->id === Auth::id())       
            <tr class="main-tr correction-tr">
                <td class="main-td correction-td"><a href="{{ route('corrections.show', $correction->id) }}">{{ $correction->name }}</a></td>
                <td class="main-td correction-td">{{ $batch->name }}</td>
                <td class="main-td correction-td"><a href="{{ route('corrections.edit', $correction->id) }}"><span class="main-icon edit-icon"><x-iconsax-lin-edit-2 /></span></a></td>
                <td class="main-td correction-td">
                    <form action="{{ route('corrections.destroy', $correction->id) }}" method='POST'>
                        @csrf
                        @method('delete')
                        <button class="del-btn" type="submit"><span class="main-icon del-icon"><x-iconsax-lin-trash /></span></button>
                    </form>
                </td>
            </tr>
            @endif
        @endforeach
    </tbody>
</table>

<h2>{{ $batch->name }}</h2>
<p>Le total des correction assigné est : {{ $batch->project->batches }}</p>
<form action="{{ route('batches.destroy', $batch->id) }}" method='POST'>
    @csrf
    @method('delete')
    <button type="submit">Delete</button>
</form>

@endsection