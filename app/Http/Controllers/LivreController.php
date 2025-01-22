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
    public function edit($id)
    {
        $livre = Livre::findOrFail($id); // Récupère le livre à partir de l'ID
        return view('edit', compact('livre'));
    }

    public function update(Request $request, $id)
    {
        // Valider les données
        $request->validate([
            'titre' => 'required|string|max:255',
            'auteur' => 'required|string|max:255',
            'annee_publication' => 'required|integer|min:1900|max:2023',
        ]);

        // Récupérer le livre et le mettre à jour
        $livre = Livre::findOrFail($id);
        $livre->update([
            'titre' => $request->titre,
            'auteur' => $request->auteur,
            'annee_publication' => $request->annee_publication,
        ]);

        // Rediriger vers la liste des livres avec un message de succès
        return redirect()->route('livres')->with('success', 'Livre mis à jour avec succès!');
    }

    public function destroy($id)
    {
        $livre = Livre::findOrFail($id); // Récupérer le livre à supprimer
        $livre->delete(); // Supprimer le livre

        // Rediriger avec un message de succès
        return redirect()->route('livres')->with('success', 'Livre supprimé avec succès!');
    }


}
