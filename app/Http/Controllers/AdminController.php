<?php

namespace App\Http\Controllers;

use App\Models\Student;
use App\Models\Fichier;
use GeoIp2\Database\Reader;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash ;
use Maatwebsite\Excel\Facades\Excel;
use App\Imports\StudentsImport;



// use App\Providers\paginator;

class AdminController extends Controller
{
    public function index()
    {
        $students = Student::paginate(8);
        return view('pages.admin', compact('students'));
    }
    public function cretefromadmin(){
        return view('admin.cretefromadmin');
    }
    public function createstudentfromadmin(Request $request){

        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email',
            'password' => 'required|string|min:8',
        ]);
    
       
            $student = new Student;
    
            // Set the attributes of the student
            $student->name = $validatedData['name'];
            $student->email = $validatedData['email'];
            $student->password = Hash::make($validatedData['password']);
            $student->save();
    
            return redirect()->route('indexadmin')->with('message', 'New student has been created successfully');
        
    }
    public function createstudentfromadminwithexel(Request $request)
    {

        $request->validate([
            'excel' => 'required|file|mimes:xlsx,xls|max:2048', 
        ]);
        if ($request->hasFile('excel')) {
            try {
                Excel::import(new StudentsImport, $request->file('excel'));
                return redirect()->back()->with('message', 'Students have been created successfully from Excel.');
            } catch (\Exception $e) {
                return redirect()->back()->with('message', 'Error importing students from Excel. Please check the file format and try again.');
            }
        } else {

            return redirect()->back()->with('message', 'No Excel file uploaded. Please choose a file to upload.');
        }
    }
    public function destroy(Fichier $fichier)
    {
        // $id=Auth()->user()->id;
        $fichier->delete();
        return redirect()->route('student.index')->with('message','Fichier ete supprimer');

    }
    
    
    
}
