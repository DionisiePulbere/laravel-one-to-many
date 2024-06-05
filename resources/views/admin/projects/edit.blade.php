@extends('layouts.admin')

@section('content')
    <h1>Stai modificando il progetto {{ $project->name }}</h1>
    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
    <form action="{{ route('admin.projects.update', ['project' => $project->id]) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')

        <div class="mb-3">
            <label for="name" class="form-label">Nome</label>
            <input type="text" class="form-control" id="name" name="name" value="{{ old('name', $project->name) }}">
        </div>
        <div class="mb-3">
            <label for="cover_image" class="form-label">Immagine</label>
            <input class="form-control" type="file" id="cover_image" name="cover_image">
            @if($project->cover_image)
                <div class="py-2">
                    <img src="{{ asset('storage/' . $project->cover_image) }}" alt="{{ $project->name }}">
                </div>
            @else
                <p>Nessuan immagine caricata precedentemente</p>
            @endif
        </div>
        <div class="mb-3">
            <label for="client_name" class="form-label">Nome del cliente</label>
            <input type="text" class="form-control" id="client_name" name="client_name" value="{{ old('client_name', $project->client_name) }}">
        </div>
        <div class="mb-3">
            <label for="summary" class="form-label">Summary</label>
            <textarea class="form-control" id="summary" rows="5" name="summary">{{ old('summary', $project->summary) }}</textarea>
        </div>
        <div class="my-5">
        <a href="{{ route('admin.projects.index') }}"><button class="btn btn-secondary">Indietro</button></a>
        <button type="submit" class="btn btn-primary">Salva</button>
    </div>
    </form>

    
@endsection