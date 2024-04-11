<h1 class="main-title">Liste des invités</h1>

<table class="main-table guest-table">
    <thead class="main-thead guest-thead">
        <tr class="main-tr guest-tr">
            <th class="main-th guest-th">Nom d'utilisateur</th>
            <th class="main-th guest-th">Créer le</th>
            <th class="main-th guest-th">Modifier</th>
            <th class="main-th guest-th">Delete</th>
        </tr>
    </thead>
    <tbody class="main-thead guest-thead">
        @foreach ($guests as $guest)
            <tr class="main-tr guest-tr">
                <td class="main-td guest-td"><a href="{{ route('guests.show', $guest->id) }}">{{ $guest->name }}</a></td>
                <td class="main-td guest-td">{{ $guest->created_at }}</td>
                <td class="main-td guest-td"><a href="{{ route('guests.edit', $guest->id) }}">Edit</a></td>
                <td class="main-td guest-td">
                    <form action="{{ route('guest.destroy', $guest->id) }}" method='POST'>
                        @csrf
                        @method('delete')
                        <button type="submit">Delete</button>
                    </form>
                </td>
            </tr>
        @endforeach
    </tbody>
</table>

