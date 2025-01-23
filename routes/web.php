<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProduitController;
use App\Http\Controllers\LivreController;
use App\Models\Livre;

Route::get('/', function () {
    return view('welcome');
});


Route::get('/livres', [LivreController::class, 'index'])->name('livres');
Route::get('/livres/create', [LivreController::class, 'create'])->name('livres.create');
Route::post('/livres/store', [LivreController::class, 'store'])->name('livres.store');
Route::get('/livres/{id}/edit', [LivreController::class, 'edit'])->name('livres.edit');
Route::put('/livres/{id}', [LivreController::class, 'update'])->name('livres.update');
Route::delete('/livres/{id}', [LivreController::class, 'destroy'])->name('livres.destroy');
