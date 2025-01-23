@extends('layouts.app')

@section('content')
<div class="row">
    <div class="col-12">
        <h1 class="text-center mb-4">Modifier le Livre</h1>
    </div>
</div>
<div class="row justify-content-center">
    <div class="col-8">
        <form action="{{ route('livres.update', $livre->id) }}" enctype="multipart/form-data" method="POST">
            @csrf
            @method('PUT') <!-- Spécifie qu'il s'agit d'une requête PUT -->
            <div class="mb-3">
                <label for="image" class="form-label">Image de couverture</label>
                @if ($livre->image)
                    <div class="mb-2">
                        <img src="{{ asset('storage/' . $livre->image) }}" alt="Image actuelle" width="100">
                    </div>
                @endif
                <input type="file" class="form-control" id="image" name="image" accept="image/*">
                <small class="form-text text-muted">Laissez vide pour conserver l'image actuelle.</small>
            </div>
            <div class="mb-3">
                <label for="titre" class="form-label">Titre</label>
                <input type="text" class="form-control" id="titre" name="titre" value="{{ $livre->titre }}" required>
            </div>

            <div class="mb-3">
                <label for="auteur" class="form-label">Auteur</label>
                <input type="text" class="form-control" id="auteur" name="auteur" value="{{ $livre->auteur }}" required>
            </div>

            <div class="mb-3">
                <label for="annee_publication" class="form-label">Année de Publication</label>
                <input type="number" class="form-control" id="annee_publication" name="annee_publication"
                    value="{{ $livre->annee_publication }}" required>
            </div>

            <button type="submit" class="btn btn-primary">Mettre à jour</button>
        </form>
    </div>
</div>
@endsection