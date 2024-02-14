<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Fichier;

class SearchController extends Controller
{
    // public function search(Request $request)
    // {
    //     $query = $request->input('query');

    //     $fichier = Fichier::where('titre', 'LIKE', "%$query%")
    //                         ->orWhere('description', 'LIKE', "%$query%")
    //                         ->paginate(10);

    //     return view('pages.index', compact('fichier', 'query'));
    // }
}

