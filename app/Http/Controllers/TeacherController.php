<?php

namespace App\Http\Controllers;

use App\Models\Department;
use App\Models\Teacher;
use Illuminate\Http\Request;
use Intervention\Image\Facades\Image;
use Illuminate\Support\Facades\DB;
class TeacherController extends Controller
{
    public function Add(Request $request)
    {

        if(!session('user')){
            return view('login.login');
        }


        $teacher_img=$request->file('image');
        $name_gen=$request->name.time().".".$teacher_img->getClientOriginalExtension();
         Image::make($teacher_img)->resize(720,890)->save('teacher/image/'.$name_gen);
        $location_Path="teacher/image/".$name_gen;

        DB::table('teachers')->insert(
            [
                'name'=>$request->name,
                'l_name'=>$request->l_name,
                'f_name'=>$request->f_name,
                'dob'=>$request->dob,
                'phone'=>$request->phone,
                'province'=>$request->province,
                'district'=>$request->district,
                'rank'=>$request->rank,
                'image'=>$location_Path,
                'department_id'=>$request->department
            ]);
        return redirect()->back()->with('success','Registeration Done Successfully');



    }
    public function View()
    {
        if(!session('user')){
            return view('login.login');
        }
        $teachers=Teacher::all();
        return view('teachers.view',compact('teachers'));
    }
    public function TDetailes($id)
    {

        if(!session('user')){
            return view('login.login');
        }
        $techs=Teacher::all()->where('id',$id);
         return view('teachers.detailes',compact('techs'));
    }
    public function Edit($id)
    {
        if(!session('user')){
            return view('login.login');
        }
        $techs=Teacher::all()->where('id',$id);
        $deps=Department::all();
        return view('teachers.edit',compact('techs','deps'));
    }
    public function Update(Request $request ,$id)
    {
        if(!session('user')){
            return view('login.login');
        }

            if(!$request->image){
            Teacher::find($id)->Update([
                'name'=>$request->name,
                'l_name'=>$request->l_name,
                'f_name'=>$request->f_name,
                // 'image'=>$request->image,
                'dob'=>$request->dob,
                'phone'=>$request->phone,
                'province'=>$request->province,
                'district'=>$request->district,
                'department_id'=>$request->department,
                'rank'=>$request->rank
            ]
            );
        }



        else{
            unlink($request->olde_image);
            $teacher_img=$request->file('image');
            $name_gen=$request->name.time().".".$teacher_img->getClientOriginalExtension();
             Image::make($teacher_img)->resize(720,890)->save('teacher/image/'.$name_gen);
            $location_Path="teacher/image/".$name_gen;
            Teacher::find($id)->Update([
                'name'=>$request->name,
                'l_name'=>$request->l_name,
                'f_name'=>$request->f_name,
                'image'=>$location_Path,
                'dob'=>$request->dob,
                'phone'=>$request->phone,
                'province'=>$request->province,
                'district'=>$request->district,
                'department_id'=>$request->department,
                'rank'=>$request->rank
            ]
            );

        }
            return redirect()->to('teacher/reg')->with('success','Record Update Successfully');
    }
    public function Delete($id){
        if(!session('user')){
            return view('login.login');
        }
        $teach=Teacher::find($id);
        unlink($teach->image);
        $teach->delete();
        return redirect()->route('teacher.view')->with('success','Record deleted Successfully');

    }
}
