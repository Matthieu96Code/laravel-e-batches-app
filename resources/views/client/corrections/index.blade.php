@extends('layout.user-layout')

@section('content')
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
        @foreach ($corrections as $correction)
            @if ($correction->batch->project->user->id === Auth::id())       
            <tr class="main-tr correction-tr">
                <td class="main-td correction-td"><a href="{{ route('corrections.show', $correction->id) }}">{{ $correction->name }}</a></td>
                <td class="main-td correction-td">{{ $correction->batch->name }}</td>
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

@endsection