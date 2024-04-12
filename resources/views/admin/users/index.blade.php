@extends('layout.user-layout')

@section('content')
<h1 class="main-title">Liste des utilisateur</h1>

<button class="main-btn add-user-btn"><a href="{{ route('users.create') }}">Add user</a></button>

<table class="main-table user-table">
    <thead class="main-thead user-thead">
        <tr class="main-tr user-tr">
            <th class="main-th user-th">Nom d'utilisateur</th>
            <th class="main-th user-th">Créer le</th>
            <th class="main-th user-th">Rôle</th>
            <th class="main-th user-th">Modifier</th>
        </tr>
    </thead>
    <tbody class="main-thead user-thead">
        @foreach ($users as $user)
            <tr class="main-tr user-tr">
                <td class="main-td user-td"><a href="{{ route('users.show', $user->id) }}">{{ $user->name }}</a></td>
                <td class="main-td user-td">{{ $user->created_at }}</td>
                <td class="main-td user-td">
                    @switch($user->role)
                        @case(0)
                            User
                            @break
                        @case(1)
                            Agent
                            @break
                        @case(2)
                            Admin
                            @break
                        @default                            
                    @endswitch
                </td>
                <td class="main-td user-td"><a href="{{ route('users.edit', $user->id) }}"><x-iconsax-lin-edit-2 /></a></td>
            </tr>
        @endforeach
    </tbody>
</table>


@endsection