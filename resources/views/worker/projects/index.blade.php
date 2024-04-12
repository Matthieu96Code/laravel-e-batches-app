@extends('layout.user-layout')

@section('content')
<h1 class="main-title">Liste des projects</h1>

<table class="main-table ptoject-table">
    <thead class="main-thead ptoject-thead">
        <tr class="main-tr ptoject-tr">
            <th class="main-th ptoject-th">Nom du projet</th>
            <th class="main-th ptoject-th">Client</th>
            <th class="main-th ptoject-th">Modifier</th>
            <th class="main-th ptoject-th">Delete</th>
        </tr>
    </thead>
    <tbody class="main-thead project-thead">
        @foreach ($projects as $project)
            <tr class="main-tr project-tr">
                <td class="main-td project-td"><a href="{{ route('projects.show', $project->id) }}">{{ $project->name }}</a></td>
                <td class="main-td project-td">{{ $project->user->name }}</td>
                <td class="main-td project-td"><a href="{{ route('projects.edit', $project->id) }}"><x-iconsax-lin-edit-2 /></a></td>
                <td class="main-td project-td">
                    <form action="{{ route('projects.destroy', $project->id) }}" method='post'>
                        @csrf
                        @method('delete')
                        <button type="submit"><x-iconsax-lin-trash /></button>
                    </form>
                </td>
            </tr>
        @endforeach
    </tbody>
</table>

@endsection