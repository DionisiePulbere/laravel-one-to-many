@extends('layouts.admin')

@section('content')
    <h1>Ecco l'elenco dei tuoi progetti</h1>
    <table class="table table-striped">
        <thead>
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Slug</th>
                <th>Client Name</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach($projects as $project)
            <tr>
                <td>{{ $project->id }}</td>
                <td>{{ $project->name }}</td>
                <td>{{ $project->slug }}</td>
                <td>{{ $project->client_name }}</td>
                <td>{{ $project->created_at }}</td>


                <td>
                    <div>
                        <a href="{{ route('admin.projects.show', ['project' => $project->id]) }}">View</a>
                        <a href="{{ route('admin.projects.edit', ['project' => $project->id]) }}">Edit</a>
                        <form action="{{ route('admin.projects.destroy', ['project' => $project->id]) }}" method="POST">
                            @csrf
                            @method('DELETE')

                            <button type="submit" class="btn btn-danger js-delete-btn" data-comic-title="{{ $project->name }}">Delete</button>
                        </form>
                    </div>
                </td>
            </tr>
            @endforeach
        </tbody>

    </table>
    <div class="modal fade" id="confirmDeleteModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="exampleModalLabel">Conferma Eliminazione</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Chiudi</button>
                <button type="button" id="confirm-deletion" class="btn btn-danger">Cancella</button>
            </div>
        </div>
    </div>
</div>

@endsection