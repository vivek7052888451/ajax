<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;
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
   public function Cache()
   {
	  //echo Cache::set("Item",student::all());
	  //echo Cache::get('Item');
	   //return  student::all();
	   
	  return $data=Cache::rememberForever('bigM',function(){
		   return  student::all();
	   });
   }
}
