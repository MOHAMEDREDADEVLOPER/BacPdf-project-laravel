<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Fichier;

class SearchController extends Controller
{
    // public function index(request $request){
    //      $validatedData = $request->validate([
    //         'noterigionale' => 'required|numeric|between:0,20',
    //         'notesemestreun' => 'required|numeric|between:0,20',
    //         'notesemestredeux' => 'required|numeric|between:0,20',
    //         'notenationale' => 'required|numeric|between:0,20',
    //     ]);
    //      $overallAverage = (($validatedData['noterigionale'] * 2) + $validatedData['notesemestreun'] + $validatedData['notesemestredeux'] + ($validatedData['notenationale'] * 4)) / 8;

    //     // Determine the mention based on the overall average
    //     if ($overallAverage >= 16) {
    //         $mention = 'Très bien';
    //     } elseif ($overallAverage >= 14) {
    //         $mention = 'Bien';
    //     } elseif ($overallAverage >= 12) {
    //         $mention = 'Assez bien';
    //     } else if($overallAverage >=10) {
    //         $mention = 'Mention passable';
    //     }else{
    //         $mention = 'ne pas reussi';
    //     }
    //     return view('pages.index', compact('mention','overallAverage'));
    // }
    // public function search(Request $request)
    // {
    //     $query = $request->input('query');

    //     $fichier = Fichier::where('titre', 'LIKE', "%$query%")
    //                         ->orWhere('description', 'LIKE', "%$query%")
    //                         ->paginate(10);

    //     return view('pages.index', compact('fichier', 'query'));
    // }
}

