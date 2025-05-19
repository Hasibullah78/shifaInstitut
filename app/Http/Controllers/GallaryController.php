<?php

namespace App\Http\Controllers;
use Intervention\Image\Facades\Image;
use App\Models\Gallary;
use Illuminate\Http\Request;
use PDF;


class GallaryController extends Controller
{
    public function Add(){
        if(!session('user')){
            return view('login.login');
        }
        return view('gallary.add');
    }
    public function Save(Request $request){
        if(!session('user')){
            return view('login.login');
        }
        $request->validate([
            "gallary_image"=>"required|mimes:png,jpg,jpeg",
            "description"=>"required|min:5"
        ]);
        $gallary_image=$request->file('gallary_image');
        $name_gen=$request->description.time().".".$gallary_image->getClientOriginalExtension();
         Image::make($gallary_image)->resize(720,890)->save('gallary/image/'.$name_gen);
        $location_Path="gallary/image/".$name_gen;
        Gallary::create(['gallary_image' => $location_Path,
                        'description'=>$request->description]);
            return redirect()->back()->with('success','Gallary Image Added Successfully');

    }
    public function EidtGallary($id)
    {
        if(!session('user')){
            return view('login.login');
        }
        $gallaries=Gallary::all()->where('id',$id);
        return view('gallary.edit',compact('gallaries'));
    }

    public function Update(Request $request ,$id)
    {  if(!session('user')){
        return view('login.login');
    }

          $request->validate([
           'description'=>'required'

            ]);
            if(!$request->image){


            Gallary::find($id)->Update([
              'description'=>$request->description,
            ]
            );
        }
        else{

           unlink($request->olde_image);
            $gallary_img=$request->file('image');
            $name_gen=time().".".$gallary_img->getClientOriginalExtension();
             Image::make($gallary_img)->resize(720,890)->save('gallary/image/'.$name_gen);
            $location_Path="gallary/image/".$name_gen;
            Gallary::find($id)->Update([
               'description'=>$request->description,
                'gallary_image'=>$location_Path,
            ]
            );

        }
             return redirect()->back()->with('success','Record Update Successfully');
    }
    public function Delete($id){
        if(!session('user')){
            return view('login.login');
        }
        $gallary=Gallary::find($id);
        unlink($gallary->gallary_image);
        $gallary->delete();
        return redirect()->back()->with('success','Record Deleted Successfully');

        // return redirect()->route('teacher.view')->with('success','Record deleted Successfully');

    }
}
