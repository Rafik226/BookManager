<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Livre extends Model
{
    use HasFactory;

    // Colonnes que l'on peut remplir via le code
    protected $fillable = ['titre', 'auteur', 'annee_publication'];
}
