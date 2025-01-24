<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\LivreController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;


Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    // Routes pour les livres
    Route::post('/livres', [LivreController::class, 'store'])->name('livres.store');
    Route::get('/livres', [LivreController::class, 'index'])->name('livres');
});

Route::group(['middleware' => ['role:admin']], function () {
    Route::get('/livres/create', [LivreController::class, 'create'])->name('livres.create');
    Route::get('/livres/{id}/edit', [LivreController::class, 'edit'])->name('livres.edit');
    Route::patch('/livres/{id}', [LivreController::class, 'update'])->name('livres.update');
    Route::delete('/livres/{id}', [LivreController::class, 'destroy'])->name('livres.destroy');



});


require __DIR__ . '/auth.php';
