<?php

namespace App\Http\Controllers;

use App\Models\Department;
use App\Models\ExamChances;
use App\Models\ExamMark;
use App\Models\Fees;

use Illuminate\Support\Facades\DB;
use App\Models\RegisteredStudent;
use Intervention\Image\Facades\Image;

use App\Models\Student;
use App\Models\Subject;
use App\Models\Teacher;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Console\View\Components\Alert;
use Illuminate\Http\Request;
use PhpParser\Node\Expr\FuncCall;

class StudentController extends Controller
{
    public function Add(Request $request){
            $student_img=$request->file('std_img');
            $name_gen=time().".".$student_img->getClientOriginalExtension();
             Image::make($student_img)->resize(720,890)->save('student/image/'.$name_gen);
            $location_Path="student/image/".$name_gen;
                $student=new Student();
                $student->std_name=$request->name;
                $student->std_e_name=$request->e_name;
                $student->std_f_name=$request->f_name;
                $student->std_f_e_name=$request->e_f_name;
                $student->std_g_f_name=$request->g_f_name;
                $student->o_province=$request->o_province;
                $student->o_district=$request->o_district;
                $student->o_vallage=$request->o_vallage;
                $student->c_province=$request->c_province;
                $student->c_district=$request->c_district;
                $student->c_vallage=$request->c_vallage;
                $student->nic=$request->nic;
                $student->school=$request->school;
                $student->g_date=$request->g_date;
                 $student->r_date=$request->r_date;
                $student->dob=$request->dob;
                $student->gender=$request->gender;
                $student->m_state=$request->state;
                $student->phone=$request->phone;
                $student->email=$request->email;
                $student->blood_group=$request->b_group;
                $student->image=$location_Path;
                $student->reg_fees=0;
                $student->serial_number=0;
                $student->exam_id=0;
                $student->exam_date=date(now());
                $student->semester="first";
                $student->passing_state="pass";
                $student->department_id=$request->department_id;
                $student->session_id=$request->session_id;


                $student->save();

             return redirect()->back()->with('success','Registeration done Successfully');

    }
    public function View()
    {
        if(!session('user')){
            return view('login.login');
        }
        $students=Student::all()->where('semester','first');

        return view('kankor.half_reg_students',compact('students'));
    }
    public function Prove($id){
        if(!session('user')){
            return view('login.login');
        }
        $student=Student::find($id);
        $departments=Department::all();
        $feeses=Fees::all();

        return view('kankor.full_reg_students',compact('student','departments','feeses'));
    }
    public function Card($id)
    {
        if(!session('user')){
            return view('login.login');
        }
        $std_card=Student::find($id);
        return view('student.std_card_info',compact('std_card'));

    }

    public function Generate_Card(Request $request,$id){
        if(!session('user')){
            return view('login.login');
        }
        $std_card=Student::find($id);
        $std_dep_id=$std_card->department_id;
        $std_department=Department::find($std_dep_id);
        $std_p_name=$request->std_e_name;
        $std_b_group=$request->std_b_group;
        $card_e_date=$request->card_e_date;
        $std_p_f_name=$request->std_f_e_name;
         return view('student.std_card',compact('std_card','std_department','std_p_name','std_b_group','card_e_date','std_p_f_name'));
    }
    public function View_PDF(){
        if(!session('user')){
            return view('login.login');
        }
       $pdf= PDF::loadView('student.viewpdf');
        return $pdf->download();
    }
    public function Register(Request $request,$id)
    {
        if(!session('user')){
            return view('login.login');
        }

     if($request->gender=='ښځینه')
    {
    Student::find($id)->update([
        'std_name'=>$request->std_name,
        'std_e_name'=>$request->std_e_name,
        'std_f_name'=>$request->std_f_name,
        'std_f_e_name'=>$request->std_f_e_name,
       'std_g_f_name'=>$request->std_g_f_name,
      'o_province'=>$request->o_province,
      'o_district'=>$request->o_district,
       'o_vallage'=>$request->o_vallage,
       'c_province'=>$request->c_province,
      'c_district'=>$request->c_district,
       'c_vallage'=>$request->c_vallage,
        'nic'=>$request->nic,
       'school'=>$request->school,
       'g_date'=>$request->g_date,
       'dob'=>$request->dob,
       'gender'=>$request->gender,
       'm_state'=>$request->state,
       'phone'=>$request->phone,
       'email'=>$request->email,
        'image'=>$request->old_img,
        'blood_group'=>$request->b_group,
        'exam_id'=>$request->exam_id,
        'exam_date'=>$request->exam_date,
        'reg_fees'=>0,
        'serial_number'=>$request->serial_number
    ]
 );
 }
else
        Student::find($id)->update([
            'std_name'=>$request->std_name,
            'std_e_name'=>$request->std_e_name,
            'std_f_name'=>$request->std_f_name,
            'std_f_e_name'=>$request->std_f_e_name,
           'std_g_f_name'=>$request->std_g_f_name,
          'o_province'=>$request->o_province,
          'o_district'=>$request->o_district,
           'o_vallage'=>$request->o_vallage,
           'c_province'=>$request->c_province,
          'c_district'=>$request->c_district,
           'c_vallage'=>$request->c_vallage,
            'nic'=>$request->nic,
           'school'=>$request->school,
           'g_date'=>$request->g_date,
           'dob'=>$request->dob,
           'gender'=>$request->gender,
           'm_state'=>$request->state,
           'phone'=>$request->phone,
           'email'=>$request->email,
            'image'=>$request->old_img,
            'blood_group'=>$request->b_group,
            'exam_id'=>$request->exam_id,
            'exam_date'=>$request->exam_date,
            'reg_fees'=>$request->reg_fees,
            'serial_number'=>$request->serial_number
        ]
    );
    $student=Student::find($id);
    if(!session('user')){
        return view('login.login');
    }
          return view('kankor.next',compact('student'));
    }
    public function View1(){
        if(!session('user')){
            return view('login.login');
        }
        $reg_stds=Student::all();
        return view('kankor.registered_std_view',compact('reg_stds'));

    }
    public function Profile($id){
        if(!session('user')){
            return view('login.login');
        }
        $std_profile=Student::find($id);
        return view('kankor.student_profile',compact('std_profile'));
    }
    public function View_Student(){
        if(!session('user')){
            return view('login.login');
        }
        $students=DB::table('students')->where('exam_id','!=',0)->where('semester','first')->paginate(15);
        return view('kankor.kankor_mark',compact('students'));
    }
    public function Fill_Mark($id)
    {
        if(!session('user')){
            return view('login.login');
        }
        $students=Student::all()->where('id',$id);
        return view('kankor.fill_mark',compact('students'));
    }
    public function Save_Mark(Request $request,$id){
        if(!session('user')){
            return view('login.login');
        }
        Student::where('id', $id)->update
        (['marks' => $request->obtain_marks]);
        return redirect()->to(url('student/mark'));
    }

    public function Find(Request $request){
        if(!session('user')){
            return view('login.login');
        }
        $r_date=$request->r_date;
        $students=Student::all()->where('r_date','==',$r_date)->where('exam_id','!=',0)->where('semester','first');
        return view('kankor.kankor_mark_search',compact('students'));
    }

////           Departments



    // public function P_Index(){

    //     return view('departments.Pharmicy.index');
    // }
    public function T_Index(){
        if(!session('user')){
            return view('login.login');
        }
        $tec_teachers=Teacher::all()->where('department_id',3);
        $tec_students=Student::all()->where('marks','>',50)->where('department_id',3)->where('semester','!=','graduated');

    //    return view("admin.welcome",compact('tec_teachers','tec_students'));
        return view('departments.technology.index',compact('tec_teachers','tec_students'));
    }
    // public function Q_Index(){
    //     return view('departments.midwifery.index');
    // }
    // public function Pr_Index(){
    //     return view('departments.prothess.index');
    // }
    // public function A_Index(){
    //     return view('departments.anastizy.index');
    // }
    /// Midwifery Departments
    // public function M_Teachers(){
    //     $teachers=Teacher::all()->where('department_id','==',4);
    //     return view('departments.midwifery.teachers',compact('teachers'));
    // }
    // public function M_Search(Request $request)
    // {
    // $data=$request->name;
    // $teachers=Teacher::all()->where('department_id','==',4)->where('name','==',$data);
    // return view('departments.midwifery.teachers',compact('teachers'));

    // }

    //  Anastizy Department
    // public function A_Teachers(){
    //     $teachers=Teacher::all()->where('department_id','==',6);
    //     return view('departments.anastizy.teachers',compact('teachers'));
    // }
//     public function A_Search(Request $request)
//     {
//     $data=$request->name;
//     $teachers=Teacher::all()->where('department_id','==',6)->where('name','==',$data);
//     return view('departments.anastizy.teachers',compact('teachers'));

//     }
//     //   Pharmicy

//  public function P_Teachers(){
//         $teachers=Teacher::all()->where('department_id','==',2);
//         return view('departments.pharmicy.teachers',compact('teachers'));
//     }
//     public function P_Search(Request $request)
//     {
//     $data=$request->name;
//     $teachers=Teacher::all()->where('department_id','==',2)->where('name','==',$data);
//     return view('departments.pharmicy.teachers',compact('teachers'));

//     }
//     //         Prothess
//     public function Pr_Teachers(){
//         $teachers=Teacher::all()->where('department_id','==',5);
//         return view('departments.prothess.teachers',compact('teachers'));
//     }
//     public function Pr_Search(Request $request)
//     {
//     $data=$request->name;
//     $teachers=Teacher::all()->where('department_id','==',5)->where('name','==',$data);
//     return view('departments.prothess.teachers',compact('teachers'));

//     }
        //         Technology Department
        public function T_Teachers(){
            if(!session('user')){
                return view('login.login');
            }
            $teachers=Teacher::all()->where('department_id','==',3);
            return view('departments.technology.teachers',compact('teachers'));
        }
        public function T_Search(Request $request)
        {
            if(!session('user')){
                return view('login.login');
            }
        $data=$request->name;
        $teachers=Teacher::all()->where('department_id','==',3)->where('name','==',$data);
        return view('departments.technology.teachers',compact('teachers'));

        }
        //   First Semester Students
        public function First_Semester(){
            if(!session('user')){
                return view('login.login');
            }
            $students=Student::all()->where('department_id','==',3)->where('semester','==','first')->where('marks','>',50);
            return view('departments.technology.f_student',compact('students'));
        }
        public function First_Semester_Student(Request $request){
            if(!session('user')){
                return view('login.login');
            }
            $students=Student::all()->where('department_id','==',3)->where('semester','==','first')->where('marks','>',50)->where('std_name','==',$request->name);
            return view('departments.technology.f_student',compact('students'));


        }
        public function View_Profile($id){
            if(!session('user')){
                return view('login.login');
            }
            $std_profile=Student::find($id);
            return view('departments.technology.student_profile',compact('std_profile'));
        }
        public function F_T_M_Exam_Marks()
        {
            if(!session('user')){
                return view('login.login');
            }

            $students=Student::all()->where('department_id','==',3)->where('semester','==','first')->where('marks','>',50);
            $subjects=Subject::all()->where('department_id','==',3)->where('semester','==','first');
            $marks=ExamMark::all();
            return view('departments.technology.mideterm_exam_marks',compact('students','marks','subjects'));

        }
        public function F_T_F_Exam_Marks(){
            if(!session('user')){
                return view('login.login');
            }
            $subjects=Subject::all()->where('department_id','==',3)->where('semester','==','first');
            $students=Student::all()->where('department_id','==',3)->where('semester','==','first')->where('marks','>',50);
            $marks=ExamMark::all();
            return view('departments.technology.final_exam_marks',compact('students','marks','subjects'));
        }
        public function Subjects()
        {
            if(!session('user')){
                return view('login.login');
            }
            $subjects=Subject::all()->where('department_id','==',3)->where('semester','==','first');
            return view('departments.technology.subjects',compact('subjects'));
        }
        public function Subject_Add()
        {  if(!session('user')){
            return view('login.login');
        }
            $departments=Department::all()->where('id','==',3);
            return view('departments.technology.add_subject',compact('departments'));
        }
        public function Subject_Add_New(Request $request){
            if(!session('user')){
                return view('login.login');
            }
            DB::table('subjects')->insert([
                'name'=>$request->name,
                'subject_code'=>$request->subject_code,
                'semester'=>$request->semester,
                'credit'=>$request->credit,
                'department_id'=>$request->department_id,
            ]);
            return redirect()->to(url('technology/subjects'))->with('success','Subject Added Successfully');
        }
        public function Fill_M_E_Marks($student_id,$subject_id){
            if(!session('user')){
                return view('login.login');
            }
            $student=Student::find($student_id);
            $subject=Subject::find($subject_id);
            // $subjects=Subject::all()->where('department_id','==',3)->where('semester','==','first');
            $chances=ExamChances::all();
            return view('departments.technology.fill_mideterm_exam',compact('student','subject','chances'));

        }
        public function Save_M_E_Marks(Request $request,$id)
        {
            if(!session('user')){
                return view('login.login');
            }

            if($request->mideterm_exam_marks>20){
                return redirect()->back()->with('success','Greater Then 20 Marks is not Allowed');
            }
            $marks=ExamMark::all()->where('student_id','==',$request->student_id)->where('subject_id','==',$id);
           foreach($marks as $mark)

            if($mark->id){
                return redirect()->back()->with('success','Record is Already Available');
            }
            DB::table('exam_marks')->insert([
                'mideterm_exam_marks'=>$request->mideterm_exam_marks,
                'semester'=>'first',
                'student_id'=>$request->student_id,
                'subject_id'=>$request->subject_id,
            ]);

             return redirect()->to(url('select/subject'.$id))->with('success','Record inserted succefully');
            // return redirect()->back()->with('success','Record inserted succefully');

        }
        public function Select_subject($id)
        {
            if(!session('user')){
                return view('login.login');
            }
            $subjects=Subject::all()->where('department_id','==',3)->where('semester','==','first');
            $subject=Subject::find($id);
            $students=Student::all()->where('department_id','==',3)->where('semester','==','first')->where('marks','>',50);

            return view('departments.technology.select_subject',compact('subject','students','subjects'));
        }
        public function Select_subject_final($id)
        {
            if(!session('user')){
                return view('login.login');
            }
            $subject=Subject::find($id);
            $students=Student::all()->where('department_id','==',3)->where('semester','==','first')->where('marks','>',50);
            return view('departments.technology.fill_final_exam_marks',compact('subject','students'));

        }
        public function Fill_F_Marks($student_id,$subject_id){
            if(!session('user')){
                return view('login.login');
            }
           $student=Student::find($student_id);
            $subject=Subject::find($subject_id);
            $chances=ExamChances::all();
            // $students=Student::all()->where('department_id','==',3)->where('semester','==','first')->where('marks','>',50);
            return view('departments.technology.fill_final_exam_marks_seperate',compact('subject','student','chances'));
        }
        public function Save_F_Marks(Request $request,$student_id,$subject_id){
            if(!session('user')){
                return view('login.login');
            }
             if($request->final_exam_marks+$request->attendence+$request->class_talent+$request->mideterm_exam_marks>=50){

            DB::table('exam_marks')->where('student_id',$student_id)->where('subject_id',$subject_id)->update([
                'final_exam_marks'=>$request->final_exam_marks,
                    'attendence_marks'=>$request->attendence,
                    'class_talent_marks'=>$request->class_talent,
                    'totale_marks'=>$request->final_exam_marks+$request->attendence+$request->class_talent+$request->mideterm_exam_marks,
                    'passing_state'=>'کامیاب',
                    'exam_chance_id'=>$request->chance_id,


            ]);
            return redirect()->to(url('select/subject/final'.$subject_id))->with('success','Student Passed To Next Semester Successfully');
        } if($request->final_exam_marks+$request->attendence+$request->class_talent+$request->mideterm_exam_marks<50){

            DB::table('exam_marks')->where('student_id',$student_id)->where('subject_id',$subject_id)->update([
                'final_exam_marks'=>$request->final_exam_marks,
                    'attendence_marks'=>$request->attendence,
                    'class_talent_marks'=>$request->class_talent,
                    'totale_marks'=>$request->final_exam_marks+$request->attendence+$request->class_talent+$request->mideterm_exam_marks,
                    'passing_state'=>'ناکام',

            ]);
            return redirect()->to(url('select/subject/final'.$subject_id))->with('success','Student Failed To Pass Next Semester');
        }
        }
        public function Final_Results($id)
        {  if(!session('user')){
            return view('login.login');
        }
            // $student_id=Student::find($id);

            // $marks=ExamMark::all()->where('student_id',$id);
            // foreach($marks as $mark)
            // {
            //     return $mark->id;
            // }

        //  $Results=ExamMark::join('exam_marks.student_id','=',$student_id)
        //                     ->join('subjects.id','=','exam_marks.subject_id')
        //                     ->get(['students.std_name','students.std_f_name','subjects.name','marks.*']);
        $subjects=Subject::all()->where('department_id','==',3)->where('semester','==','first');
        $marks=DB::table('students')
        ->join('exam_marks','exam_marks.student_id','=','students.id')->where('students.id',$id)
        ->join('subjects','subjects.id','=','exam_marks.subject_id')->where('subjects.semester','first')->where('subjects.department_id',3)
        ->select('subjects.*','exam_marks.*','students.std_name','students.std_f_name','students.id as student_id','students.semester as std_semester')
        ->get();
            return view('departments.technology.final_result',compact('marks','subjects'));



        }
        public function Final_Results_All(){
            if(!session('user')){
                return view('login.login');
            }
        $subjects=Subject::all()->where('department_id','==',3)->where('semester','==','first');

            $marks=DB::table('exam_marks')
            ->join('students','exam_marks.student_id','=','students.id')
            ->join('subjects','subjects.id','=','exam_marks.subject_id')
            ->select('students.std_name','students.std_f_name','exam_marks.totale_marks','exam_marks.student_id','exam_marks.exam_chance_id','exam_marks.subject_id')
            ->get();
            return view('departments.technology.final_result_all',compact('marks','subjects'));
        }
        public function Pass_Second($id)
        {
            if(!session('user')){
                return view('login.login');
            }
            DB::table('students')->where('id',$id)->update([
                    'semester'=>'second',
            ]);
            return redirect()->to(url('student/final_exam'));
        }
        public function Pass_Third($id)
        {
            if(!session('user')){
                return view('login.login');
            }
            DB::table('students')->where('id',$id)->update([
                    'semester'=>'third',
            ]);
            return redirect()->to(url('student/final_exam'));
        } public function Pass_Fourth($id)
        {
            if(!session('user')){
                return view('login.login');
            }
            DB::table('students')->where('id',$id)->update([
                    'semester'=>'fourth',
            ]);
            return redirect()->to(url('student/final_exam'));
        }
         public function Graduate($id)
        {
            if(!session('user')){
                return view('login.login');
            }
            $r_date=DB::table('students')->where('id',$id)->select('students.r_date')->value('r_date');

    DB::table('students')->where('id',$id)->update([
            'semester'=>'graduated',
            'r_date'=>$r_date+2

            ]);
            return redirect()->to(url('student/final_exam'));

        }
        // Second Semester Students
        public function Second_Semester(){
            if(!session('user')){
                return view('login.login');
            }
            $students=Student::all()->where('department_id','==',3)->where('semester','==','second')->where('marks','>',50);
            return view('departments.technology.second_semester.second_semester_students',compact('students'));
        }
        public function Second_Semester_Subjects()
        {
            if(!session('user')){
                return view('login.login');
            }
            $subjects=Subject::all()->where('department_id','==',3)->where('semester','==','second');
            return view('departments.technology.second_semester.subjects',compact('subjects'));
        }
        public function Second_Semester_Subject_Add()
        {
            if(!session('user')){
                return view('login.login');
            }
            $departments=Department::all()->where('id','==',3);
            return view('departments.technology.second_semester.add_subject',compact('departments'));
        }
        public function Second_Semester_Subject_Add_New(Request $request){
            if(!session('user')){
                return view('login.login');
            }
            DB::table('subjects')->insert([
                'name'=>$request->name,
                'subject_code'=>$request->subject_code,
                'semester'=>$request->semester,
                'credit'=>$request->credit,
                'department_id'=>$request->department_id,
            ]);
            return redirect()->to(url('technology/subjects/second'))->with('success','Subject Added Successfully');
        }
        public function S_T_M_Exam_Marks()
        {
            if(!session('user')){
                return view('login.login');
            }
            $students=Student::all()->where('department_id','==',3)->where('semester','==','second')->where('marks','>',50);
            $subjects=Subject::all()->where('department_id','==',3)->where('semester','==','second');
            $marks=ExamMark::all();
            return view('departments.technology.second_semester.mideterm_exam_marks',compact('students','marks','subjects'));

        }
        public function S_T_F_Exam_Marks(){
            if(!session('user')){
                return view('login.login');
            }

            $subjects=Subject::all()->where('department_id','==',3)->where('semester','==','second');
            $students=Student::all()->where('department_id','==',3)->where('semester','==','second')->where('marks','>',50);
            $marks=ExamMark::all();
            return view('departments.technology.second_semester.final_exam_marks',compact('students','marks','subjects'));
        }
        public function Second_Select_subject($id)
        {
            if(!session('user')){
                return view('login.login');
            }
            $subjects=Subject::all()->where('department_id','==',3)->where('semester','==','second');
            $subject=Subject::find($id);
            $students=Student::all()->where('department_id','==',3)->where('semester','==','second')->where('marks','>',50);

            return view('departments.technology.second_semester.select_subject',compact('subject','students','subjects'));
        }
        public function Second_S_Fill_M_E_Marks($student_id,$subject_id){
            if(!session('user')){
                return view('login.login');
            }
            $student=Student::find($student_id);
            $subject=Subject::find($subject_id);
            // $subjects=Subject::all()->where('department_id','==',3)->where('semester','==','first');
            $chances=ExamChances::all();
            return view('departments.technology.second_semester.fill_mideterm_exam',compact('student','subject','chances'));

        }
        public function Second_Semester_Save_M_E_Marks(Request $request,$id)
        {
            if(!session('user')){
                return view('login.login');
            }

            if($request->mideterm_exam_marks>20){
                return redirect()->back()->with('success','Greater Then 20 Marks is not Allowed');
            }
            $marks=ExamMark::all()->where('student_id','==',$request->student_id)->where('subject_id','==',$id);
           foreach($marks as $mark)

            if($mark->id){
                return redirect()->back()->with('success','Record is Already Available');
            }
            DB::table('exam_marks')->insert([
                'mideterm_exam_marks'=>$request->mideterm_exam_marks,
                'semester'=>'second',
                'student_id'=>$request->student_id,
                'subject_id'=>$request->subject_id,
            ]);

             return redirect()->to(url('select/subject/second'.$id))->with('success','Record inserted succefully');
            // return redirect()->back()->with('success','Record inserted succefully');

        }
        public function Second_Semester_Select_subject_final($id)
        {
            if(!session('user')){
                return view('login.login');
            }
            $subject=Subject::find($id);
            $students=Student::all()->where('department_id','==',3)->where('semester','==','second')->where('marks','>',50);
            return view('departments.technology.second_semester.fill_final_exam_marks',compact('subject','students'));

        }
        public function Second_Semester_Fill_F_Marks($student_id,$subject_id){
            if(!session('user')){
                return view('login.login');
            }
            $student=Student::find($student_id);
             $subject=Subject::find($subject_id);
            $chances=ExamChances::all();

             // $students=Student::all()->where('department_id','==',3)->where('semester','==','first')->where('marks','>',50);
             return view('departments.technology.second_semester.fill_final_exam_marks_seperate',compact('subject','student','chances'));
         }
         public function Second_Semester_Save_F_Marks(Request $request,$student_id,$subject_id){
            if(!session('user')){
                return view('login.login');
            }
            if($request->final_exam_marks+$request->attendence+$request->class_talent+$request->mideterm_exam_marks>=50){

           DB::table('exam_marks')->where('student_id',$student_id)->where('subject_id',$subject_id)->update([
               'final_exam_marks'=>$request->final_exam_marks,
                   'attendence_marks'=>$request->attendence,
                   'class_talent_marks'=>$request->class_talent,
                   'totale_marks'=>$request->final_exam_marks+$request->attendence+$request->class_talent+$request->mideterm_exam_marks,
                   'passing_state'=>'کامیاب',
                   'exam_chance_id'=>$request->chance_id,

           ]);
           return redirect()->to(url('select/subject/final/second'.$subject_id))->with('success','Student Passed Successfully');
       } if($request->final_exam_marks+$request->attendence+$request->class_talent+$request->mideterm_exam_marks<50){

           DB::table('exam_marks')->where('student_id',$student_id)->where('subject_id',$subject_id)->update([
               'final_exam_marks'=>$request->final_exam_marks,
                   'attendence_marks'=>$request->attendence,
                   'class_talent_marks'=>$request->class_talent,
                   'totale_marks'=>$request->final_exam_marks+$request->attendence+$request->class_talent+$request->mideterm_exam_marks,
                   'passing_state'=>'ناکام',

           ]);
           return redirect()->to(url('select/subject/final/second'.$subject_id))->with('success','Student Failed To Pass');
       }
       }
       public function Second_Semester_Final_Results($id)
       {  if(!session('user')){
        return view('login.login');
    }
       $subjects=Subject::all()->where('department_id','==',3)->where('semester','==','second');

       $marks=DB::table('students')
       ->join('exam_marks','exam_marks.student_id','=','students.id')->where('students.id',$id)
       ->join('subjects','subjects.id','=','exam_marks.subject_id')->where('subjects.semester','second')->where('subjects.department_id',3)
       ->select('subjects.*','exam_marks.*','students.std_name','students.std_f_name','students.id as student_id','students.semester as std_semester')
       ->get();
           return view('departments.technology.second_semester.final_result',compact('marks','subjects'));
       }

       //Third Semester Technology
       public function Third_Semester(){
        if(!session('user')){
            return view('login.login');
        }
        $students=Student::all()->where('department_id','==',3)->where('semester','==','third')->where('marks','>',50);
        return view('departments.technology.third_semester.third_semester_students',compact('students'));
        }


        public function T_T_M_Exam_Marks()
        {
            if(!session('user')){
                return view('login.login');
            }
            $students=Student::all()->where('department_id','==',3)->where('semester','==','third')->where('marks','>',50);
            $subjects=Subject::all()->where('department_id','==',3)->where('semester','==','third');
            $marks=ExamMark::all();
            return view('departments.technology.third_semester.mideterm_exam_marks',compact('students','marks','subjects'));

        }
        public function T_T_F_Exam_Marks(){
            if(!session('user')){
                return view('login.login');
            }
            $subjects=Subject::all()->where('department_id','==',3)->where('semester','==','third');
            $students=Student::all()->where('department_id','==',3)->where('semester','==','third')->where('marks','>',50);
            $marks=ExamMark::all();
            return view('departments.technology.third_semester.final_exam_marks',compact('students','marks','subjects'));
        }
        public function Third_Semester_Subjects()
        {  if(!session('user')){
            return view('login.login');
        }
            $subjects=Subject::all()->where('department_id','==',3)->where('semester','==','third');
            return view('departments.technology.third_semester.subjects',compact('subjects'));
        }
        public function Third_Semester_Subject_Add()
        {  if(!session('user')){
            return view('login.login');
        }
            $departments=Department::all()->where('id','==',3);
            return view('departments.technology.third_semester.add_subject',compact('departments'));
        }
        public function Third_Semester_Subject_Add_New(Request $request){
            if(!session('user')){
                return view('login.login');
            }
            DB::table('subjects')->insert([
                'name'=>$request->name,
                'subject_code'=>$request->subject_code,
                'semester'=>$request->semester,
                'credit'=>$request->credit,
                'department_id'=>$request->department_id,
            ]);
            return redirect()->to(url('technology/subjects/third'))->with('success','Subject Added Successfully');
        }
        public function Third_Select_subject($id)
        {
            if(!session('user')){
                return view('login.login');
            }
            $subjects=Subject::all()->where('department_id','==',3)->where('semester','==','third');
            $subject=Subject::find($id);
            $students=Student::all()->where('department_id','==',3)->where('semester','==','third')->where('marks','>',50);

            return view('departments.technology.third_semester.select_subject',compact('subject','students','subjects'));
        }
        public function Third_S_Fill_M_E_Marks($student_id,$subject_id){
            if(!session('user')){
                return view('login.login');
            }
            $student=Student::find($student_id);
            $subject=Subject::find($subject_id);
            // $subjects=Subject::all()->where('department_id','==',3)->where('semester','==','first');
            $chances=ExamChances::all();
            return view('departments.technology.third_semester.fill_mideterm_exam',compact('student','subject','chances'));

        }
        public function Third_Semester_Save_M_E_Marks(Request $request,$id)
        {
            if(!session('user')){
                return view('login.login');
            }
            if($request->mideterm_exam_marks>20){
                return redirect()->back()->with('success','Greater Then 20 Marks is not Allowed');
            }
            $marks=ExamMark::all()->where('student_id','==',$request->student_id)->where('subject_id','==',$id);
           foreach($marks as $mark)

            if($mark->id){
                return redirect()->back()->with('success','Record is Already Available');
            }
            DB::table('exam_marks')->insert([
                'mideterm_exam_marks'=>$request->mideterm_exam_marks,
                'semester'=>'third',
                'student_id'=>$request->student_id,
                'subject_id'=>$request->subject_id,
            ]);

             return redirect()->to(url('select/subject/third'.$id))->with('success','Record inserted succefully');
            // return redirect()->back()->with('success','Record inserted succefully');
        }
        public function Third_Semester_Select_subject_final($id)
        {
            if(!session('user')){
                return view('login.login');
            }
            $subject=Subject::find($id);
            $students=Student::all()->where('department_id','==',3)->where('semester','==','third')->where('marks','>',50);
            return view('departments.technology.third_semester.fill_final_exam_marks',compact('subject','students'));

        }
        public function Third_Semester_Fill_F_Marks($student_id,$subject_id){
            if(!session('user')){
                return view('login.login');
            }
            $student=Student::find($student_id);
             $subject=Subject::find($subject_id);
            $chances=ExamChances::all();

             // $students=Student::all()->where('department_id','==',3)->where('semester','==','first')->where('marks','>',50);
             return view('departments.technology.third_semester.fill_final_exam_marks_seperate',compact('subject','student','chances'));
         }
         public function Third_Semester_Save_F_Marks(Request $request,$student_id,$subject_id){
            if(!session('user')){
                return view('login.login');
            }
            if($request->final_exam_marks+$request->attendence+$request->class_talent+$request->mideterm_exam_marks>=50){

           DB::table('exam_marks')->where('student_id',$student_id)->where('subject_id',$subject_id)->update([
               'final_exam_marks'=>$request->final_exam_marks,
                   'attendence_marks'=>$request->attendence,
                   'class_talent_marks'=>$request->class_talent,
                   'totale_marks'=>$request->final_exam_marks+$request->attendence+$request->class_talent+$request->mideterm_exam_marks,
                   'passing_state'=>'کامیاب',
                   'exam_chance_id'=>$request->chance_id,

           ]);
           return redirect()->to(url('select/subject/final/third'.$subject_id))->with('success','Student Passed Successfully');
       } if($request->final_exam_marks+$request->attendence+$request->class_talent+$request->mideterm_exam_marks<50){

           DB::table('exam_marks')->where('student_id',$student_id)->where('subject_id',$subject_id)->update([
               'final_exam_marks'=>$request->final_exam_marks,
                   'attendence_marks'=>$request->attendence,
                   'class_talent_marks'=>$request->class_talent,
                   'totale_marks'=>$request->final_exam_marks+$request->attendence+$request->class_talent+$request->mideterm_exam_marks,
                   'passing_state'=>'ناکام',

           ]);
           return redirect()->to(url('select/subject/final/third'.$subject_id))->with('success','Student Failed To Pass');
       }
       }
       public function Third_Semester_Final_Results($id)
       {
        if(!session('user')){
            return view('login.login');
        }
       $subjects=Subject::all()->where('department_id','==',3)->where('semester','==','third');

       $marks=DB::table('students')
       ->join('exam_marks','exam_marks.student_id','=','students.id')->where('students.id',$id)
       ->join('subjects','subjects.id','=','exam_marks.subject_id')->where('subjects.semester','third')->where('subjects.department_id',3)
       ->select('subjects.*','exam_marks.*','students.std_name','students.std_f_name','students.id as student_id','students.semester as std_semester')
       ->get();
           return view('departments.technology.third_semester.final_result',compact('marks','subjects'));
       }

       //   Fourth Semester
       public function Fourth_Semester(){
        if(!session('user')){
            return view('login.login');
        }
        $students=Student::all()->where('department_id','==',3)->where('semester','==','fourth')->where('marks','>',50);
        return view('departments.technology.fourth_semester.fourth_semester_students',compact('students'));
        }


        public function Fr_T_M_Exam_Marks()
        {
            if(!session('user')){
                return view('login.login');
            }
            $students=Student::all()->where('department_id','==',3)->where('semester','==','fourth')->where('marks','>',50);
            $subjects=Subject::all()->where('department_id','==',3)->where('semester','==','fourth');
            $marks=ExamMark::all();
            return view('departments.technology.fourth_semester.mideterm_exam_marks',compact('students','marks','subjects'));

        }
        public function Fr_T_F_Exam_Marks(){
            if(!session('user')){
                return view('login.login');
            }
            $subjects=Subject::all()->where('department_id','==',3)->where('semester','==','fourth');
            $students=Student::all()->where('department_id','==',3)->where('semester','==','fourth')->where('marks','>',50);
            $marks=ExamMark::all();
            return view('departments.technology.fourth_semester.final_exam_marks',compact('students','marks','subjects'));
        }
        public function Fourth_Semester_Subjects()
        {
            if(!session('user')){
                return view('login.login');
            }
            $subjects=Subject::all()->where('department_id','==',3)->where('semester','==','fourth');
            return view('departments.technology.fourth_semester.subjects',compact('subjects'));
        }
        public function Fourth_Semester_Subject_Add()
        {
            if(!session('user')){
                return view('login.login');
            }
            $departments=Department::all()->where('id','==',3);
            return view('departments.technology.fourth_semester.add_subject',compact('departments'));
        }
        public function Fourth_Semester_Subject_Add_New(Request $request){
            if(!session('user')){
                return view('login.login');
            }
            DB::table('subjects')->insert([
                'name'=>$request->name,
                'subject_code'=>$request->subject_code,
                'semester'=>$request->semester,
                'credit'=>$request->credit,
                'department_id'=>$request->department_id,
            ]);
            return redirect()->to(url('technology/subjects/fourth'))->with('success','Subject Added Successfully');
        }
        public function Fourth_Select_subject($id)
        {
            if(!session('user')){
                return view('login.login');
            }
            $subjects=Subject::all()->where('department_id','==',3)->where('semester','==','fourth');
            $subject=Subject::find($id);
            $students=Student::all()->where('department_id','==',3)->where('semester','==','fourth')->where('marks','>',50);

            return view('departments.technology.fourth_semester.select_subject',compact('subject','students','subjects'));
        }
        public function Fourth_S_Fill_M_E_Marks($student_id,$subject_id){
            if(!session('user')){
                return view('login.login');
            }
            $student=Student::find($student_id);
            $subject=Subject::find($subject_id);
            // $subjects=Subject::all()->where('department_id','==',3)->where('semester','==','first');
            $chances=ExamChances::all();
            return view('departments.technology.fourth_semester.fill_mideterm_exam',compact('student','subject','chances'));

        }
        public function Fourth_Semester_Save_M_E_Marks(Request $request,$id)
        {
            if(!session('user')){
                return view('login.login');
            }
            if($request->mideterm_exam_marks>20){
                return redirect()->back()->with('success','Greater Then 20 Marks is not Allowed');
            }
            $marks=ExamMark::all()->where('student_id','==',$request->student_id)->where('subject_id','==',$id);
           foreach($marks as $mark)

            if($mark->id){
                return redirect()->back()->with('success','Record is Already Available');
            }
            DB::table('exam_marks')->insert([
                'mideterm_exam_marks'=>$request->mideterm_exam_marks,
                'semester'=>'fourth',
                'student_id'=>$request->student_id,
                'subject_id'=>$request->subject_id,
            ]);

             return redirect()->to(url('select/subject/fourth'.$id))->with('success','Record inserted succefully');
            // return redirect()->back()->with('success','Record inserted succefully');
        }
        public function Fourth_Semester_Select_subject_final($id)
        {
            if(!session('user')){
                return view('login.login');
            }
            $subject=Subject::find($id);
            $students=Student::all()->where('department_id','==',3)->where('semester','==','fourth')->where('marks','>',50);
            return view('departments.technology.fourth_semester.fill_final_exam_marks',compact('subject','students'));

        }
        public function Fourth_Semester_Fill_F_Marks($student_id,$subject_id){
            if(!session('user')){
                return view('login.login');
            }
            $student=Student::find($student_id);
             $subject=Subject::find($subject_id);
            $chances=ExamChances::all();

             // $students=Student::all()->where('department_id','==',3)->where('semester','==','first')->where('marks','>',50);
             return view('departments.technology.fourth_semester.fill_final_exam_marks_seperate',compact('subject','student','chances'));
         }
         public function Fourth_Semester_Save_F_Marks(Request $request,$student_id,$subject_id){
            if(!session('user')){
                return view('login.login');
            }
            if($request->final_exam_marks+$request->attendence+$request->class_talent+$request->mideterm_exam_marks>=50){

           DB::table('exam_marks')->where('student_id',$student_id)->where('subject_id',$subject_id)->update([
               'final_exam_marks'=>$request->final_exam_marks,
                   'attendence_marks'=>$request->attendence,
                   'class_talent_marks'=>$request->class_talent,
                   'totale_marks'=>$request->final_exam_marks+$request->attendence+$request->class_talent+$request->mideterm_exam_marks,
                   'passing_state'=>'کامیاب',
                   'exam_chance_id'=>$request->chance_id,

           ]);
           return redirect()->to(url('select/subject/final/fourth'.$subject_id))->with('success','Student Passed Successfully');
       } if($request->final_exam_marks+$request->attendence+$request->class_talent+$request->mideterm_exam_marks<50){

           DB::table('exam_marks')->where('student_id',$student_id)->where('subject_id',$subject_id)->update([
               'final_exam_marks'=>$request->final_exam_marks,
                   'attendence_marks'=>$request->attendence,
                   'class_talent_marks'=>$request->class_talent,
                   'totale_marks'=>$request->final_exam_marks+$request->attendence+$request->class_talent+$request->mideterm_exam_marks,
                   'passing_state'=>'ناکام',

           ]);
           return redirect()->to(url('select/subject/final/fourth'.$subject_id))->with('success','Student Failed To Pass');
       }
       }
       public function Fourth_Semester_Final_Results($id)
       {
        if(!session('user')){
            return view('login.login');
        }
       $subjects=Subject::all()->where('department_id','==',3)->where('semester','==','fourth');

       $marks=DB::table('students')
       ->join('exam_marks','exam_marks.student_id','=','students.id')->where('students.id',$id)
       ->join('subjects','subjects.id','=','exam_marks.subject_id')->where('subjects.semester','fourth')->where('subjects.department_id',3)
       ->select('subjects.*','exam_marks.*','students.std_name','students.std_f_name','students.id as student_id','students.semester as std_semester')
       ->get();
           return view('departments.technology.fourth_semester.final_result',compact('marks','subjects'));
       }

       public function Graduated_Students(){
    if(!session('user')){
        return view('login.login');
    }
    $students=Student::all()->where('department_id',3)->where('semester','graduated');

    return view('departments.technology.graduated_students.index',compact('students'));
}

public function Find_Year(Request $request){
    if(!session('user')){
        return view('login.login');
    }
    $students=Student::all()->where('r_date',$request->name)->where('department_id',3)->where('semester','graduated');
    return view('departments.technology.graduated_students.index',compact('students'));

}
public function Find_Name(Request $request){
    if(!session('user')){
        return view('login.login');
    }
    $students=Student::all()->where('std_name',$request->name)->where('department_id',3)->where('semester','graduated');
    return view('departments.technology.graduated_students.index',compact('students'));

}

public function View_Student_Record($id)
{
    if(!session('user')){
        return view('login.login');
    }
    $students=Student::all()->where('id',$id);

    // $students=Student::find($id)->get();
     return view('departments.technology.graduated_students.view_record',compact('students'));
}
public function View_Record_First($id)
{
    if(!session('user')){
        return view('login.login');
    }
    $students=DB::table('students')->where('students.semester','graduated')
    ->join('exam_marks','exam_marks.student_id','=','students.id')->where('students.id',$id)
    ->join('subjects','subjects.id','=','exam_marks.subject_id')->where('subjects.semester','first')->where('subjects.department_id',3)
    ->select('subjects.*','exam_marks.*','students.std_name','students.std_f_name','students.id as student_id','students.semester as std_semester')
    ->get();
    return view('departments.technology.graduated_students.view_record_full',compact('students','id'));

}
public function View_Record_Second($id)
{
    if(!session('user')){
        return view('login.login');
    }
    $students=DB::table('students')->where('students.semester','graduated')
    ->join('exam_marks','exam_marks.student_id','=','students.id')->where('students.id',$id)
    ->join('subjects','subjects.id','=','exam_marks.subject_id')->where('subjects.semester','second')->where('subjects.department_id',3)
    ->select('subjects.*','exam_marks.*','students.std_name','students.std_f_name','students.id as student_id','students.semester as std_semester')
    ->get();
    return view('departments.technology.graduated_students.view_record_full',compact('students','id'));

}
public function View_Record_Third($id)
{
    if(!session('user')){
        return view('login.login');
    }
    $students=DB::table('students')->where('students.semester','graduated')
    ->join('exam_marks','exam_marks.student_id','=','students.id')->where('students.id',$id)
    ->join('subjects','subjects.id','=','exam_marks.subject_id')->where('subjects.semester','third')->where('subjects.department_id',3)
    ->select('subjects.*','exam_marks.*','students.std_name','students.std_f_name','students.id as student_id','students.semester as std_semester')
    ->get();
    return view('departments.technology.graduated_students.view_record_full',compact('students','id'));

}
public function View_Record_Fourth($id)
{
    if(!session('user')){
        return view('login.login');
    }
    $students=DB::table('students')->where('students.semester','graduated')
    ->join('exam_marks','exam_marks.student_id','=','students.id')->where('students.id',$id)
    ->join('subjects','subjects.id','=','exam_marks.subject_id')->where('subjects.semester','fourth')->where('subjects.department_id',3)
    ->select('subjects.*','exam_marks.*','students.std_name','students.std_f_name','students.id as student_id','students.semester as std_semester')
    ->get();
    return view('departments.technology.graduated_students.view_record_full',compact('students','id'));
}



}

