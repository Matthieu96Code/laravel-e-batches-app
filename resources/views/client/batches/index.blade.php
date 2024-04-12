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
                <td class="main-td batch-td"><a href="{{ route('batches.edit', $batch->id) }}"><x-iconsax-lin-edit-2 /></a></td>
                <td class="main-td batch-td">
                    <form action="{{ route('batches.destroy', $batch->id) }}" method='POST'>
                        @csrf
                        @method('delete')
                        <button class="del-btn batch-del-btn" type="button"><x-iconsax-lin-trash /></button>
                    </form>
                </td>
            </tr>
            @endif

            {{-- Modal form --}}

            <div class="main-modal invisible" id="deleteModal">
                <h3>êtes vous sûr de vouloir supprimez ce lot</h3>
                <p>cet action serait irréverssible</p>
                <div>
                    <form action="{{ route('batches.destroy', $batch->id) }}" method='POST'>
                        @csrf
                        @method('delete')
                        <button class="yes-btn" type="submit">Oui</button>
                    </form>
                    <button class="no-btn" type="button">Non</button>
                </div>
            </div>
            
        @endforeach
    </tbody>
</table>



@endsection

@section('script')

    <script>

        const allBody = document.querySelector('body');
        const delModal = document.querySelector('.main-modal');

        const btn = document.querySelector('.batch-del-btn');
        btn.addEventListener('click', (e) => {
            e.preventDefault();
            delModal.classList.toggle('invisible');
            // delModal.classList.add('visible');
        });

    </script>
@endsection