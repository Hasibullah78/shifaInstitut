<?php

namespace App\Http\Controllers;

use App\Models\RegisteredStudent as ModelsRegisteredStudent;
use App\Models\Student;
use Illuminate\Http\Request;
use Intervention\Image\Facades\Image;

use Illuminate\Support\Facades\File;

class RegisteredStudent extends Controller
{
    // public function Register(Request $request,$id)
    // {

    //     Student::find($id)->Update([
    //         'std_name'=>$request->name,
    //         'std_f_name'=>$request->f_name,
    //        'std_g_f_name'=>$request->g_f_name,
    //       'o_province'=>$request->o_province,
    //       'o_district'=>$request->o_district,
    //        'o_vallage'=>$request->o_vallage,
    //        'c_province'=>$request->c_province,
    //       'c_district'=>$request->c_district,
    //        'c_vallage'=>$request->c_vallage,
    //         'nic'=>$request->nic,
    //        'school'=>$request->school,
    //        'g_date'=>$request->g_date,
    //        'dob'=>$request->dob,
    //        'gender'=>$request->gender,
    //        'm_state'=>$request->state,
    //        'phone'=>$request->phone,
    //        'email'=>$request->email,
    //         'image'=>$request->old_img,
    //         'exam_register_number'=>$request->kankor_reg_number,
    //         'exam_id'=>$request->kankor_exam_id,
    //         'exam_date'=>$request->exam_date
    //     ]);




    //     // $student_img=$request->file('std_img');
    //     // $name_gen=$request->name.time().".".$student_img->getClientOriginalExtension();
    //     //  Image::make($student_img)->resize(6000,4000)->save('student/image/'.$name_gen);
    //     // $location_Path="student/image/".$name_gen;
    //         // $student=new ModelsRegisteredStudent();
    //         // $student->std_name=$request->name;
    //         // $student->std_f_name=$request->f_name;
    //         // $student->std_g_f_name=$request->g_f_name;
    //         // $student->o_province=$request->o_province;
    //         // $student->o_district=$request->o_district;
    //         // $student->o_vallage=$request->o_vallage;
    //         // $student->c_province=$request->c_province;
    //         // $student->c_district=$request->c_district;
    //         // $student->c_vallage=$request->c_vallage;
    //         // $student->nic=$request->nic;
    //         // $student->school=$request->school;
    //         // $student->g_date=$request->g_date;
    //         // $student->dob=$request->dob;
    //         // $student->gender=$request->gender;
    //         // $student->m_state=$request->state;
    //         // $student->phone=$request->phone;
    //         // $student->email=$request->email;
    //         // $student->image=$location_Path;
    //         // $student->exam_register_number=$request->kankor_reg_number;
    //         // $student->exam_id=$request->kankor_exam_id;
    //         // $student->exam_date=$request->exam_date;
    //         // $student->department_id=$request->department_id;
    //         // $student->session_id=$request->session_id;
    //         // $student->save();
    //     //   $std_delete= Student::all();
    //     //   foreach ($std_delete as $std) {
    //     //     if($std->phone==$request->phone) {
    //     //    Student::all()->where('phone',$request->phone)->first()->delete();
    //     //     }

    //     //   }
    //       return redirect()->to('student/view')->with('success','Registeration done Successfully');
    // }
    // public function View(){
    //     $reg_stds=ModelsRegisteredStudent::all();
    //     return view('kankor.registered_std_view',compact('reg_stds'));

    // }
    // public function Profile($id){
    //     $std_profile=ModelsRegisteredStudent::find($id);
    //     return view('kankor.student_profile',compact('std_profile'));
    // }

}
