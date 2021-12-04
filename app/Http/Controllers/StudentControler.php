<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\student;
class StudentControler extends Controller
{
   public function index()
   {
	
	    $studetdatas  = student::all();
	   return view('index',compact('studetdatas')); 
   }
   //store student record
   public function store(Request $request)
   {
	   //dd($request);
	   $students=new student();
	   $students->name=$request->name;
	   $students->email=$request->email;
	   $students->password=$request->password;
	   $students->mobile=$request->mobile;
	   $students->address=$request->address;
	   //dd(students);
	   $students->save();
	   //echo "data save";
	   return redirect()->route('home');
   }
}
