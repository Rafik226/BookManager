<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProduitController;
use App\Http\Controllers\LivreController;
use App\Models\Livre;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/produits-liste', [ProduitController::class, 'afficherProduits']);


Route::get('/livres', function () {
    $livres = Livre::all();
    return view('livres', compact('livres'));
});

Route::get('/livres/create', [LivreController::class, 'create'])->name('livres.create');