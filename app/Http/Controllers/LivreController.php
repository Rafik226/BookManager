<?php

namespace App\Http\Controllers;
use App\Models\Livre;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class LivreController extends Controller
{

    public function create()
    {
        return view('create');
    }
    public function store(Request $request)
    {
        // Valider les données
        $request->validate([
            'titre' => 'required|string|max:255',
            'auteur' => 'required|string|max:255',
            'annee_publication' => 'required|integer|min:1900|max:2023',
            'image' => 'nullable|image|mimes:jpg,png,jpeg|max:2048', // Validation pour l'image
        ]);

        // Gérer l'upload de l'image
        $imagePath = null;
        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('images/livres', 'public'); // Sauvegarde dans storage/app/public/images/livres
        }

        // Créer le livre
        Livre::create([
            'titre' => $request->titre,
            'auteur' => $request->auteur,
            'annee_publication' => $request->annee_publication,
            'image' => $imagePath, // Stocker le chemin de l'image
        ]);

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
            'image' => 'nullable|image|mimes:jpg,png,jpeg|max:2048',
        ]);

        $livre = Livre::findOrFail($id);

        // Gérer l'upload de la nouvelle image
        if ($request->hasFile('image')) {
            if ($livre->image) {
                Storage::delete('public/' . $livre->image); // Supprime l'ancienne image
            }
            $livre->image = $request->file('image')->store('images/livres', 'public');
        }

        // Mettre à jour les autres champs
        $livre->update([
            'titre' => $request->titre,
            'auteur' => $request->auteur,
            'annee_publication' => $request->annee_publication,
            'image' => $livre->image,
        ]);

        return redirect()->route('livres')->with('success', 'Livre mis à jour avec succès!');
    }


    public function destroy($id)
    {
        $livre = Livre::findOrFail($id); // Récupérer le livre à supprimer
        // Supprimer l'image du stockage si elle existe
        if ($livre->image) {
            \Storage::disk('public')->delete($livre->image);
        }
        $livre->delete(); // Supprimer le livre

        // Rediriger avec un message de succès
        return redirect()->route('livres')->with('success', 'Livre supprimé avec succès!');
    }
    public function index(Request $request)
{
    // Vérifier si une recherche est effectuée
    $search = $request->input('search');

    if ($search) {
        // Filtrer les livres par titre ou auteur
        $livres = Livre::where('titre', 'like', "%{$search}%")
            ->orWhere('auteur', 'like', "%{$search}%")
            ->paginate(10);
    } else {
        // Sinon, afficher tous les livres
        $livres = Livre::paginate(10);
    }

    return view('livres', compact('livres'));
}



}
