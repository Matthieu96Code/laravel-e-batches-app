@extends('layout.user-layout')

@section('content')
<h1>Liste des lots</h1>

<table class="main-table batch-table">
    <thead class="main-thead batch-thead">
        <tr class="main-tr batch-tr">
            <th class="main-th batch-th">Nom d'utilisateur</th>
            <th class="main-th batch-th">Créer le</th>
            <th class="main-th batch-th">Modifier</th>
            <th class="main-th batch-th">Delete</th>
        </tr>
    </thead>
    <tbody class="main-thead batch-thead">
        @foreach ($batches as $batch)
            @if ($batch->project->user->id === Auth::id())   
            <tr class="main-tr batch-tr">
                <td class="main-td batch-td"><a href="{{ route('batches.show', $batch->id) }}">{{ $batch->name }}</a></td>
                <td class="main-td batch-td">{{ $batch->project->name }}</td>
                <td class="main-td batch-td"><a href="{{ route('batches.edit', $batch->id) }}">Edit</a></td>
                <td class="main-td batch-td">
                    <form action="{{ route('batches.destroy', $batch->id) }}" method='POST'>
                        @csrf
                        @method('delete')
                        <button class="del-btn batch-del-btn" type="submit">Delete</button>
                    </form>
                </td>
            </tr>
            @endif
        @endforeach
    </tbody>
</table>

<button class="batch-del-btn-test" type="button">
    Click me
</button>

<div class="main-modal invisible" id="deleteModal">
    modal
</div>

@endsection

@section('script')

    <script>

        const allBody = document.querySelector('body');
        const delModal = document.querySelector('.main-modal');

        const btn = document.querySelector('.batch-del-btn-test');
        btn.addEventListener('click', () => {
            delModal.classList.toggle('invisible');
            // delModal.classList.add('visible');
        });

    </script>
@endsection