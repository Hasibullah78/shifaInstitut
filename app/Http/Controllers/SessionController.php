<?php

namespace App\Http\Controllers;

use App\Models\Department;
use App\Models\Session;
use Illuminate\Http\Request;

class SessionController extends Controller
{

    public function Add(){
        if(!session('user')){
            return view('login.login');
        }
        $deps=Department::all();
        return view('sessions.add',compact('deps'));
    }
    public function Save(Request $request){
        if(!session('user')){
            return view('login.login');
        }
        $session=new Session();
        $session->session_category=$request->session_category;

        $session->department_id=$request->department_id;
        $session->save();
        return redirect()->back()->with('success','Session Created Successfully');
    }
    public function All(){
        if(!session('user')){
            return view('login.login');
        }
        $sessions=Session::all();
        return view('sessions.view',compact('sessions'));
    }
    public function Edit($id){
        if(!session('user')){
            return view('login.login');
        }
        $session=Session::find($id);
        return view('sessions.edit',compact('session'));
    }
    public function Update(Request $request,$id){
        if(!session('user')){
            return view('login.login');
        }
        Session::find($id)->update([
            'session_category'=>$request->session_category,
            'department_id'=>$request->department,
         ]);
         return redirect()->to('session/view')->with('success','Session Updated Successfully');
    }
    public function Delete($id){
        if(!session('user')){
            return view('login.login');
        }
        Session::find($id)->delete();
        return redirect()->to('session/view')->with('success','Session Deleted Successfully');

    }
}
