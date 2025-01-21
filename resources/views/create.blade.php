@extends('layouts.app')

@section('content')
    <div class="row">
        <div class="col-12">
            <h1 class="text-center mb-4">Ajouter un Livre</h1>
        </div>
    </div>
    <div class="row justify-content-center">
        <div class="col-8">
            <form action="{{ route('livres.store') }}" method="POST">
                @csrf
                <div class="mb-3">
                    <label for="titre" class="form-label">Titre</label>
                    <input type="text" class="form-control" id="titre" name="titre" required>
                </div>

                <div class="mb-3">
                    <label for="auteur" class="form-label">Auteur</label>
                    <input type="text" class="form-control" id="auteur" name="auteur" required>
                </div>

                <div class="mb-3">
                    <label for="annee_publication" class="form-label">Année de Publication</label>
                    <input type="number" class="form-control" id="annee_publication" name="annee_publication" required>
                </div>

                <button type="submit" class="btn btn-success">Ajouter le Livre</button>
            </form>
        </div>
    </div>
@endsection
