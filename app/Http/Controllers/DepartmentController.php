<?php

namespace App\Http\Controllers;
use App\Models\Department;
// use Barryvdh\DomPDF\Facade\PDF;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Barryvdh\DomPDF\Facade\PDF;

class DepartmentController extends Controller
{
    public function AllDep(){
        if(!session('user')){
            return view('login.login');
        }
       $deps= Department::all();
       return view('departments.add',compact('deps'));
    }
    public function Add(Request $request)
    {
        if(!session('user')){
            return view('login.login');
        }
        $request->validate([
            'name'=>"required|unique:departments|min:3",

        ],
        [
            'name.required'=>"Department name is required",
            'name.unique'=>"This Department is already exist",
            'name.min'=>"Dempartment Name must be at least 3 characters",
        ]);

       DB::table('departments')->insert([
        'name'=>$request->name,
       ]);
       return redirect()->back()->with('success','Department added Successfully');
    }
    public function Edit($id){
        if(!session('user')){
            return view('login.login');
        }
        $dep=Department::find($id);
        return view('departments.edit',compact('dep'));

    }
    public function Update(Request $request,$id)
    {
        if(!session('user')){
            return view('login.login');
        }
        $request->validate([
            'name'=>"required|min:3",
        ],
        [
            'name.required'=>"Department name is required",
            'name.min'=>"Dempartment Name must be at least 3 characters",
        ]);

     Department::find($id)->update([
        'name'=>$request->name,
     ]);
     return redirect()->to('department/view')->with('success','Department Updated Successfully');

    }
    public function Delete($id){
        if(!session('user')){
            return view('login.login');
        }
        Department::find($id)->delete();
     return redirect()->to('department/view')->with('success','Department Deleted Successfully');


    }


}
