@extends('layouts.app')

@section('content')
@if ($livres->isEmpty())
    <div class="alert alert-warning">
        Aucun livre ne correspond à votre recherche.
    </div>
@endif

<div class="row">
    <div class="col-12">
        <h1 class="text-center mb-4">Liste des Livres</h1>
    </div>
</div>
<div class="row justify-content-center">
    <div class="col-8">
    <form action="{{ route('livres') }}" method="GET" class="mb-4">
    <div class="input-group">
        <input 
            type="text" 
            name="search" 
            class="form-control" 
            placeholder="Rechercher un livre..." 
            value="{{ request('search') }}">
        <button type="submit" class="btn btn-primary">Rechercher</button>
    </div>
</form>
        <table class="table table-striped">
            <thead>
                <tr>
                    <th>Image</th>
                    <th>Titre</th>
                    <th>Auteur</th>
                    <th>Année</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($livres as $livre)
                    <tr>
                        <td>
                            @if ($livre->image)
                                <img src="{{ asset('storage/' . $livre->image) }}" alt="Couverture" width="50">
                            @else
                                <span>Aucune image</span>
                            @endif
                        </td>
                        <td>{{ $livre->titre }}</td>
                        <td>{{ $livre->auteur }}</td>
                        <td>{{ $livre->annee_publication }}</td>
                        <td>
                            <!-- Boutons pour modifier et supprimer -->
                            <a href="{{ route('livres.edit', $livre->id) }}" class="btn btn-warning btn-sm">Modifier</a>
                            <form action="{{ route('livres.destroy', $livre->id) }}" method="POST" style="display:inline;"
                                onsubmit="return confirm('Êtes-vous sûr ?');">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger btn-sm">Supprimer</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>

    </div>
</div>
<div class="row mb-3">
    <div class="col-10 text-end">
        <a href="{{ url('/livres/create') }}" class="btn btn-primary">Ajouter un Livre</a>
    </div>
</div>

@endsection