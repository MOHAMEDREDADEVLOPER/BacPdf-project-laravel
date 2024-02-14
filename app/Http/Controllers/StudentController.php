<?php

namespace App\Http\Controllers;

use App\Models\Student;
use App\Models\Fichier;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\ValidRequest;
use Illuminate\Support\Facades\Hash ;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Cookie;

class StudentController extends Controller
{
    public function __construct()
    {
        // $this->middleware('auth')->only('showw','destroy');
    }
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $query = $request->input('query');
        $fichier = Fichier::latest()->paginate(10);
        if ($query) {
            $fichier = Fichier::where('titre', 'LIKE', "%$query%")
                                ->orWhere('description', 'LIKE', "%$query%")
                                ->paginate(10);
        }
        return view('pages.index', compact('fichier'));
    }
    

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('pages.inscription');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function storee(Request $request)
    {
        // Validate incoming request data
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:students,email',
            'password' => 'required|string|min:8',
            
        ]);
    
        try {
            // Hash the password
            $validatedData['password'] = Hash::make($validatedData['password']);
    
            
            $student = Student::create($validatedData);
    
            
            // $imagePath = $request->file('image')->store("profiles","public");
            // $student->image = $imagePath;
            // $student->save();
    
            return redirect()->route('login')->with('success', 'New user has been added successfully');
        } catch (\Exception $e) {
            // Log the error for debugging
            \Log::error('Error storing student: ' . $e->getMessage());
    
            // Redirect back with error message
            return redirect()->back()->withInput()->with('message', 'Failed to add new user. Please try again later.');
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(Student $student)
    {
       //
    }
    public function showw(){
        $id=Auth()->user()->id;
        // dd($id);
        $folder=Fichier::where('id_student' , $id)->get();
        // dd($folder);
        return view('pages.show',compact('folder'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Student $student)
    {
        // return view('payments.payment')
            return view('pages.modifierprofile', compact('student'));
        
    }
    
    
    public function update(Request $request, Student $student)
    {
        // Validate incoming request data
        $request->validate([
            'name' => 'required',
            'email' => 'required|email',
        ]);
    
        try {
            // Update the student's name and email
            $student->update([
                'name' => $request->name,
                'email' => $request->email,
            ]);
    
            return redirect()->route('student.index')->with('message', 'Profile updated successfully');
        } catch (\Exception $e) {
            // Log the error for debugging
            \Log::error('Error updating student profile: ' . $e->getMessage());

            return redirect()->back()->withInput()->with('error', 'Failed to update profile. Please try again later.');
        }
    }
    
    
    

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Student $student)
    {
        $student->delete();
        return to_route('student.index')->with('message',"Students was deleted");
    }

    public function showlogin(){
        return view('pages.login');
    }
    public function login(request $request){
        $form=$request->validate([
            'email' => 'required|email',
            'password' => 'required|min:6',
        ]);
    
        if (Auth::attempt($form)) {
            request()->session()->regenerate();
            $cookiesEmail = cookie()->forever('email', $form['email']);
            $cookiesPassword = cookie()->forever('password', $form['password']);
            return redirect()->route('student.index');
        } else {
            return redirect()->back()->with('message','email or password Invalid credentials');
        }
    }
    
    public function logout(){
        request()->session()->flush();
        // session::lush();
        Auth::logout();
        return to_route('student.index');
    }
    
    
}
