@extends('layouts.app')

@section('content')
<div class="row">
    <div class="col-12">
        <h1 class="text-center mb-4">Liste des Livres</h1>
    </div>
</div>
<div class="row justify-content-center">
    <div class="col-8">
        <table class="table table-striped table-bordered">
            <thead class="table-dark">
                <tr>
                    <th>ID</th>
                    <th>Titre</th>
                    <th>Auteur</th>
                    <th>Année de Publication</th>
                </tr>
            </thead>
            <tbody>
                @foreach($livres as $livre)
                    <tr>
                        <td>{{ $livre->id }}</td>
                        <td>{{ $livre->titre }}</td>
                        <td>{{ $livre->auteur }}</td>
                        <td>{{ $livre->annee_publication }}</td>
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