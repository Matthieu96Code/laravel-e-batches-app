<h1 class="main-title">Liste des invités</h1>

<table class="main-table guest-table">
    <thead class="main-thead guest-thead">
        <tr class="main-tr guest-tr">
            <th class="main-th guest-th">Nom d'utilisateur</th>
            <th class="main-th guest-th">Créer le</th>
            <th class="main-th guest-th">Add</th>
            <th class="main-th guest-th">Modifier</th>
            <th class="main-th guest-th">Delete</th>
        </tr>
    </thead>
    <tbody class="main-thead guest-thead">
        @foreach ($guests as $guest)
            <tr class="main-tr guest-tr">
                <td class="main-td guest-td"><a href="{{ route('guests.show', $guest->id) }}">{{ $guest->name }}</a></td>
                <td class="main-td guest-td">{{ $guest->created_at }}</td>
                <td class="main-td guest-td">
                    <form action="{{ route('guests.moveToUser', $guest->id) }}" method='POST'>
                        @csrf
                        {{-- <input type="text" value="{{ $guest->name }}" name="name">
                        <input type="password" value="{{ $guest->password }}" name="password"> --}}
                        <button class="add-btn" type="submit"><span class="main-icon add-icon"><x-iconsax-two-archive-add /></span></button>
                    </form>
                </td>
                <td class="main-td guest-td"><a href="{{ route('guests.edit', $guest->id) }}"><span class="main-icon edit-icon"><x-iconsax-lin-edit-2 /></span></a></td>
                <td class="main-td guest-td">
                    <form action="{{ route('guests.destroy', $guest->id) }}" method='POST'>
                        @csrf
                        @method('delete')
                        <button class="del-btn" type="submit"><span class="main-icon del-icon"><x-iconsax-lin-trash /></span></button>
                    </form>
                </td>
            </tr>
        @endforeach
    </tbody>
</table>

