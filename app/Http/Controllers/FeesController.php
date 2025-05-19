<?php

namespace App\Http\Controllers;

use App\Models\Fees;
use Illuminate\Http\Request;

class FeesController extends Controller
{
    public function Add(){
        if(!session('user')){
            return view('login.login');
        }
        return view('feeses.add');
    }
    public function Save(Request $request){
        if(!session('user')){
            return view('login.login');
        }
        $fees=new Fees();
        $fees->fees_type=$request->fees_category;
        $fees->fees_amount=$request->fees_amount;
        $fees->save();
        return redirect()->back()->with('success','Fees Category Created Successfully');
    }
    public function View_Fees()
    {
        if(!session('user')){
            return view('login.login');
        }
        $feeses=Fees::all();
        return view('feeses.view',compact('feeses'));
    }

}
