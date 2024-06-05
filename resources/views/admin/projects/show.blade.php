@extends('layouts.admin')

@section('content')
    <h2>{{ $project->name }}</h2>
    @if($project->cover_image)
        <div>
            <img src="{{ asset('storage/' . $project->cover_image) }}" alt="{{ $project->name }}">
        </div>
    @endif
    <div>
        <strong>ID:</strong> {{ $project->id }}
    </div>
    <div>
        <strong>Slug:</strong> {{ $project->slug }}
    </div>
    <div>
        <strong>Creato il:</strong> {{ $project->created_at }}
    </div>
    <div>
        <strong>Aggiornato il:</strong> {{ $project->updated_at }}
    </div>

    @if($project->summary)
    <div class="my-3">    
        <strong >Summary: </strong>{{ $project->summary }}
    </div>
    @endif

    <div class="my-5">
        <a href="{{ route('admin.projects.index') }}"><button class="btn btn-secondary">Indietro</button></a>
    </div>
@endsection