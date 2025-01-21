<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class LivreController extends Controller
{
    public function afficherlivres()
{
    $livres = DB::table('livres')->get();
    return view('livresListe', compact('livres'));
}
}
