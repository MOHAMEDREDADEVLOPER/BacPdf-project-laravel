<?php

namespace App\Http\Controllers;

use Dompdf\Dompdf;
use Illuminate\Support\Facades\View;
use App\Models\Fichier;
use App\Models\Download;
use App\Models\Student;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\ValidFichier;
// use App\Models\Pdf;

class FichierController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
    //    $fichier=Fichier::latest()->paginate(15);
    //    return view('pages.index',compact('fichier'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('pages.createpublication');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(ValidFichier $request)
    {
        $form=$request->validated();
        $form['id_student']=Auth::user()->id;
        $pdfs=$form['pdf']->store('pdfs','public');
        Fichier::create([
            'id_student'=>$form['id_student'],
            'titre'=>$form['titre'],
            'description'=>$form['description'],
            'metier'=>$form['metier'],
            'pdf'=>$pdfs
        ]);
        return to_route('student.index')->with('message','file was add');
    }

    /**
     * Display the specified resource.
     */
    public function show(Fichier $fichier)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Fichier $fichier)
    {
        return view('pages.editfichier',compact('fichier'));
    }
    // public function stoore(request $request)  {
    //     $fichier= new Fichier ;
    //     $fichier->titre=$request->titre;
    //     $fichier->description=$request->description;
    //     $fichier->metier=$request->metier;
    //     $fichier->id_student=Auth::user()->id;
    //     $pdfs=$request->pdf->store('pdfs','public');
    //     $fichier->pdf=$pdfs;
    //     $fichier->save
    //     } 
         /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Fichier $fichier)
{
    
    if($request->hasFile('pdf')){
        $pdf = $request->file('pdf')->store('pdf');
        if ($fichier->pdf) {
            Storage::delete($fichier->pdf);
        }
    } else {
        $pdf = $fichier->pdf;
    }
    
    $form = [
        'titre' => $request->input('titre'),
        'description' => $request->input('description'),
        'metier' => $request->input('metier'),
        'pdf' => $pdf, 
    ];
    $fichier->update($form);
    return redirect()->route('showw')->with('message', 'Le fichier a été modifié avec succès.');
}


    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Fichier $fichier)
    {
        $id=Auth()->user()->id;
        // dd($id);
        // $user=Student::FindorFail($id);
        // dd($user);
        $fichier->delete();
        return redirect()->route('showw')->with('message','Fichier ete supprimer');

    }
    public function download( $id ) {
            $id1=Auth()->user()->id;
            $file = Fichier::findOrFail($id);
            $name = $file->titre . '_' . time() . '.pdf';
            $pathToFile = 'storage/' . $file->pdf;
            
            $download = response()->download($pathToFile, $name);
            
            if ($download) {
                $frm = [
                    'fichier_id' => $id,
                    'student_id' => $id1,
                ];
                Download::create($frm); // Assuming Download is the model for saving download records
                return $download;
            }
    }
    //statistique
    public function showstatistique(){
        $id = auth()->user()->id;
        $fichiers = Fichier::where('id_student', $id)->get();
    
        $totalDownloads = 0;
        $maxDownloads = 0;
        $mostDownloadedFile = null;
    
        foreach ($fichiers as $fichier) {
            $id_fichier = $fichier->id;
    
            $downloads = Download::where('fichier_id', $id_fichier)->get();
            $count = count($downloads);
    
            $totalDownloads += $count;
    
            if ($count > $maxDownloads) {
                $maxDownloads = $count;
                $mostDownloadedFile = $fichier;
            }
    
            $fichier->download_count = $count;
        }
    
        $averageDownloads = $totalDownloads > 0 ? $totalDownloads / count($fichiers) : 0;
    
        return view('pages.statistique', compact('fichiers', 'totalDownloads', 'averageDownloads', 'mostDownloadedFile'));
    }
    
    
    // use Dompdf\Dompdf;
    // use Illuminate\Support\Facades\View;
    
    public function statistique(Student $student) {
        // Retrieve statistics data
        $fichiers = Fichier::where('id_student', $student->id)->get();
    
        $totalDownloads = 0;
        $maxDownloads = 0;
        $mostDownloadedFile = null;
    
        // Calculate statistics for each file
        foreach ($fichiers as $fichier) {
            $id_fichier = $fichier->id;
    
            $downloads = Download::where('fichier_id', $id_fichier)->get();
            $count = count($downloads);
    
            $totalDownloads += $count;
    
            if ($count > $maxDownloads) {
                $maxDownloads = $count;
                $mostDownloadedFile = $fichier;
            }
    
            $fichier->download_count = $count;
        }
    
        // Calculate average downloads
        $averageDownloads = $totalDownloads > 0 ? $totalDownloads / count($fichiers) : 0;
    
        // Render the PDF view with the statistics data
        $html = view('pdfs.pdf', compact('fichiers', 'totalDownloads', 'averageDownloads', 'mostDownloadedFile', 'student'))->render();
    
        // Create a new Dompdf instance
        $pdf = new Dompdf();
    
        // Load HTML content into Dompdf
        $pdf->loadHtml($html);
    
        // Set paper size and orientation if needed
        $pdf->setPaper('A4', 'portrait');
    
        // Render the PDF
        $pdf->render();
    
        // Output the generated PDF (download or display in browser)
        return $pdf->stream('statistique.pdf');
    }
    

    
}
