<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\FichierController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\SearchController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/
// Route::get('/search', [SearchController::class,'search'])->name('search');


// Route::get('/',[AdminController::class,'ip']);
Route::get('/createstudentfromadmin',[AdminController::class,'createstudentfromadmin'])->name('createstudentfromadmin');
Route::get('/cretefromadmin',[AdminController::class,'cretefromadmin'])->name('cretefromadmin');
Route::post('/cretefromadmin',[AdminController::class,'createstudentfromadmin'])->name('createstudentfromadmin');
Route::post('/createstudentfromadminwithexel',[AdminController::class,'createstudentfromadminwithexel'])->name('createstudentfromadminwithexel');
//
Route::get('/ereur',function(){
    return view('pages.ereur');
});

//student
Route::resource('/student', StudentController::class)->missing(function(){
    return view('pages.ereur');
});
Route::get('/mesfichiers', [StudentController::class,'showw'])->name('showw')->missing(function(){
    return view('pages.ereur');
});;
Route::get('/gett', [StudentController::class,'showw'])->name('editt')->missing(function(){
    return view('pages.ereur');
});;
Route::post('/student', [StudentController::class,'storee'])->name('storee');
Route::get('/edit', [StudentController::class,'editt'])->name('editt');
//fichiereditt
Route::resource('/fichier', FichierController::class);
Route::get('/statistique/{student}', [FichierController::class,'showstatistique'])->name('showstatistique')->missing(function(){
    return view('pages.ereur');
});;
Route::get('/statistiques', [FichierController::class,'statistique'])->name('statistique')->missing(function(){
    return view('pages.ereur');
});;
Route::get('/download/{id}', [FichierController::class,'download'])->name('download')->missing(function(){
    return view('pages.ereur');
});;


// Route::put('/student/{student}', [StudentController::class,'updatee'])->name('updatee');
Route::post('/login', [StudentController::class,'login'])->name('login');
Route::get('/login', [StudentController::class,'showlogin'])->name('showlogin')->missing(function(){
    return view('pages.ereur');
});;
Route::get('/logout', [StudentController::class,'logout'])->name('logout')->missing(function(){
    return view('pages.ereur');
});;
//admin
Route::get('/admin', [AdminController::class,'index'])->name('indexadmin')->missing(function(){
    return view('pages.ereur');
});;

