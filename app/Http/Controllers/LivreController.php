<?php

namespace App\Http\Controllers;
use App\Models\Livre;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class LivreController extends Controller
{

    public function create()
    {
        return view('create');
    }
    public function store(Request $request)
{
    // Validation des données
    $request->validate([
        'titre' => 'required|string|max:255',
        'auteur' => 'required|string|max:255',
        'annee_publication' => 'required|integer|min:1900|max:2023',
    ]);

    // Création du livre
    Livre::create([
        'titre' => $request->titre,
        'auteur' => $request->auteur,
        'annee_publication' => $request->annee_publication,
    ]);

    // Rediriger vers la liste des livres avec un message de succès
    return redirect()->route('livres')->with('success', 'Livre ajouté avec succès!');
}


}
