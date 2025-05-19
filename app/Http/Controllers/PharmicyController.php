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

use Illuminate\Http\Request;

class PharmicyController extends Controller
{

    public function P_Index(){
        if(!session('user')){
            return view('login.login');
        }
        $par_teachers=Teacher::all()->where('department_id',2);
        $par_students=Student::all()->where('marks','>',50)->where('department_id',2)->where('semester','!=','graduated');

    //    return view("admin.welcome",compact('par_teachers','par_students'));
        return view('departments.pharmicy.index',compact('par_teachers','par_students'));
    }

    public function P_Teachers(){
        if(!session('user')){
            return view('login.login');
        }
        $teachers=Teacher::all()->where('department_id','==',2);
        return view('departments.pharmicy.teachers',compact('teachers'));
    }
    public function P_Search(Request $request)
    {
        if(!session('user')){
            return view('login.login');
        }
    $data=$request->name;
    $teachers=Teacher::all()->where('department_id','==',2)->where('name','==',$data);
    return view('departments.pharmicy.teachers',compact('teachers'));
    }
    public function First_Semester()
    {
        if(!session('user')){
            return view('login.login');
        }
    $students=Student::all()->where('department_id','==',2)->where('semester','==','first')->where('marks','>',50);
    return view('departments.pharmicy.first_semester.first_semester_students',compact('students'));

    }
    public function First_Semester_M_Exam_Marks()
    {
        if(!session('user')){
            return view('login.login');
        }
        $students=Student::all()->where('department_id','==',2)->where('semester','==','first')->where('marks','>',50);
        $subjects=Subject::all()->where('department_id','==',2)->where('semester','==','first');
        $marks=ExamMark::all();
        return view('departments.pharmicy.first_semester.mideterm_exam_marks',compact('students','marks','subjects'));

    }
    public function First_Semester_F_Exam_Marks(){
        if(!session('user')){
            return view('login.login');
        }
        $subjects=Subject::all()->where('department_id','==',2)->where('semester','==','first');
        $students=Student::all()->where('department_id','==',2)->where('semester','==','first')->where('marks','>',50);
        $marks=ExamMark::all();
        return view('departments.pharmicy.first_semester.final_exam_marks',compact('students','marks','subjects'));
    }
    public function First_Semester_Subjects()
    {
        if(!session('user')){
            return view('login.login');
        }
        $subjects=Subject::all()->where('department_id','==',2)->where('semester','==','first');
        return view('departments.pharmicy.first_semester.subjects',compact('subjects'));
    }
    public function First_Semester_Subject_Add()
    {
        if(!session('user')){
            return view('login.login');
        }
        $departments=Department::all()->where('id','==',2);
        return view('departments.pharmicy.first_semester.add_subject',compact('departments'));
    }
    public function First_Semester_Subject_Add_New(Request $request){
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
        return redirect()->to(url('pharmicy/subjects/first'))->with('success','Subject Added Successfully');
    }
    public function First_Select_subject($id)
    {
        if(!session('user')){
            return view('login.login');
        }
        $subjects=Subject::all()->where('department_id','==',2)->where('semester','==','first');
        $subject=Subject::find($id);
        $students=Student::all()->where('department_id','==',2)->where('semester','==','first')->where('marks','>',50);

        return view('departments.pharmicy.first_semester.select_subject',compact('subject','students','subjects'));
    }
    public function First_S_Fill_M_E_Marks($student_id,$subject_id){
        if(!session('user')){
            return view('login.login');
        }
        $student=Student::find($student_id);
        $subject=Subject::find($subject_id);
        // $subjects=Subject::all()->where('department_id','==',3)->where('semester','==','first');
        $chances=ExamChances::all();
        return view('departments.pharmicy.first_semester.fill_mideterm_exam',compact('student','subject','chances'));

    }
    public function First_Semester_Save_M_E_Marks(Request $request,$id)
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

         return redirect()->to(url('select/subject/pharmicy/first'.$id))->with('success','Record inserted succefully');
        // return redirect()->back()->with('success','Record inserted succefully');
    }
    public function First_Semester_Select_subject_final($id)
    {
        if(!session('user')){
            return view('login.login');
        }
        $subject=Subject::find($id);
        $students=Student::all()->where('department_id','==',2)->where('semester','==','first')->where('marks','>',50);
        return view('departments.pharmicy.first_semester.fill_final_exam_marks',compact('subject','students'));

    }
    public function First_Semester_Fill_F_Marks($student_id,$subject_id){
        if(!session('user')){
            return view('login.login');
        }
        $student=Student::find($student_id);
         $subject=Subject::find($subject_id);
        $chances=ExamChances::all();

         // $students=Student::all()->where('department_id','==',3)->where('semester','==','first')->where('marks','>',50);
         return view('departments.pharmicy.first_semester.fill_final_exam_marks_seperate',compact('subject','student','chances'));
     }
     public function First_Semester_Save_F_Marks(Request $request,$student_id,$subject_id){
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
       return redirect()->to(url('select/subject/final/pharmicy/first'.$subject_id))->with('success','Student Passed Successfully');
   } if($request->final_exam_marks+$request->attendence+$request->class_talent+$request->mideterm_exam_marks<50){

       DB::table('exam_marks')->where('student_id',$student_id)->where('subject_id',$subject_id)->update([
           'final_exam_marks'=>$request->final_exam_marks,
               'attendence_marks'=>$request->attendence,
               'class_talent_marks'=>$request->class_talent,
               'totale_marks'=>$request->final_exam_marks+$request->attendence+$request->class_talent+$request->mideterm_exam_marks,
               'passing_state'=>'ناکام',

       ]);
       return redirect()->to(url('select/subject/final/pharmicy/first'.$subject_id))->with('success','Student Failed To Pass');
   }
   }
   public function First_Semester_Final_Results($id)
   { if(!session('user')){
    return view('login.login');
}
   $subjects=Subject::all()->where('department_id','==',2)->where('semester','==','first');

   $marks=DB::table('students')
   ->join('exam_marks','exam_marks.student_id','=','students.id')->where('students.id',$id)
   ->join('subjects','subjects.id','=','exam_marks.subject_id')->where('subjects.semester','first')->where('subjects.department_id',2)
   ->select('subjects.*','exam_marks.*','students.std_name','students.std_f_name','students.id as student_id','students.semester as std_semester')
   ->get();
       return view('departments.pharmicy.first_semester.final_result',compact('marks','subjects'));
   }
   public function Pharmicy_Pass_Second($id){
    if(!session('user')){
        return view('login.login');
    }
        DB::table('students')->where('id',$id)->update([
                'semester'=>'second',
        ]);
        return redirect()->to(url('pharmicy/first/final_exam'));

   }
   public function Edit_Subject_First_Semester_View($id)
   {
    $subject=Subject::find($id);
    return view('departments.pharmicy.first_semester.edit_subject',compact('subject'));
   }
   public function Edit_Subject_First_Semester(Request $request,$id)
   {
    DB::table('subjects')->where('id',$id)->update([
        'name'=>$request->name,
            'subject_code'=>$request->subject_code,
            'credit'=>$request->credit,
    ]);
    return redirect()->to(url('pharmicy/subjects/first'))->with('success','Subject Updated Successfully!');

   }
// Second Semester Students
   public function Second_Semester()
   {
    if(!session('user')){
        return view('login.login');
    }
   $students=Student::all()->where('department_id','==',2)->where('semester','==','second')->where('marks','>',50);
   return view('departments.pharmicy.second_semester.second_semester_students',compact('students'));

   }
   public function Second_Semester_M_Exam_Marks()
   {
    if(!session('user')){
        return view('login.login');
    }
       $students=Student::all()->where('department_id','==',2)->where('semester','==','second')->where('marks','>',50);
       $subjects=Subject::all()->where('department_id','==',2)->where('semester','==','second');
       $marks=ExamMark::all();
       return view('departments.pharmicy.second_semester.mideterm_exam_marks',compact('students','marks','subjects'));

   }
   public function Second_Semester_F_Exam_Marks(){
    if(!session('user')){
        return view('login.login');
    }
       $subjects=Subject::all()->where('department_id','==',2)->where('semester','==','second');
       $students=Student::all()->where('department_id','==',2)->where('semester','==','second')->where('marks','>',50);
       $marks=ExamMark::all();

       return view('departments.pharmicy.second_semester.final_exam_marks',compact('students','marks','subjects'));
   }
   public function Second_Semester_Subjects()
   {
    if(!session('user')){
        return view('login.login');
    }
       $subjects=Subject::all()->where('department_id','==',2)->where('semester','==','second');
       return view('departments.pharmicy.second_semester.subjects',compact('subjects'));
   }
   public function Second_Semester_Subject_Add()
   {
    if(!session('user')){
        return view('login.login');
    }
       $departments=Department::all()->where('id','==',2);
       return view('departments.pharmicy.second_semester.add_subject',compact('departments'));
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
       return redirect()->to(url('pharmicy/subjects/second'))->with('success','Subject Added Successfully');
   }
   public function Second_Select_subject($id)
   {
    if(!session('user')){
        return view('login.login');
    }
       $subjects=Subject::all()->where('department_id','==',2)->where('semester','==','second');
       $subject=Subject::find($id);
       $students=Student::all()->where('department_id','==',2)->where('semester','==','second')->where('marks','>',50);

       return view('departments.pharmicy.second_semester.select_subject',compact('subject','students','subjects'));
   }
   public function Second_S_Fill_M_E_Marks($student_id,$subject_id){
    if(!session('user')){
        return view('login.login');
    }
       $student=Student::find($student_id);
       $subject=Subject::find($subject_id);
       // $subjects=Subject::all()->where('department_id','==',3)->where('semester','==','first');
       $chances=ExamChances::all();
       return view('departments.pharmicy.second_semester.fill_mideterm_exam',compact('student','subject','chances'));

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

        return redirect()->to(url('select/subject/pharmicy/second'.$id))->with('success','Record inserted succefully');
       // return redirect()->back()->with('success','Record inserted succefully');
   }
   public function Second_Semester_Select_subject_final($id)
   {
    if(!session('user')){
        return view('login.login');
    }
       $subject=Subject::find($id);
       $students=Student::all()->where('department_id','==',2)->where('semester','==','second')->where('marks','>',50);
       return view('departments.pharmicy.second_semester.fill_final_exam_marks',compact('subject','students'));

   }
   public function Second_Semester_Fill_F_Marks($student_id,$subject_id){
    if(!session('user')){
        return view('login.login');
    }
       $student=Student::find($student_id);
        $subject=Subject::find($subject_id);
       $chances=ExamChances::all();

        // $students=Student::all()->where('department_id','==',3)->where('semester','==','first')->where('marks','>',50);
        return view('departments.pharmicy.second_semester.fill_final_exam_marks_seperate',compact('subject','student','chances'));
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
      return redirect()->to(url('select/subject/final/pharmicy/second'.$subject_id))->with('success','Student Passed Successfully');
  } if($request->final_exam_marks+$request->attendence+$request->class_talent+$request->mideterm_exam_marks<50){

      DB::table('exam_marks')->where('student_id',$student_id)->where('subject_id',$subject_id)->update([
          'final_exam_marks'=>$request->final_exam_marks,
              'attendence_marks'=>$request->attendence,
              'class_talent_marks'=>$request->class_talent,
              'totale_marks'=>$request->final_exam_marks+$request->attendence+$request->class_talent+$request->mideterm_exam_marks,
              'passing_state'=>'ناکام',

      ]);
      return redirect()->to(url('select/subject/final/pharmicy/second'.$subject_id))->with('success','Student Failed To Pass');
  }
  }
  public function Second_Semester_Final_Results($id)
  {
    if(!session('user')){
        return view('login.login');
    }
  $subjects=Subject::all()->where('department_id','==',2)->where('semester','==','second');

  $marks=DB::table('students')
  ->join('exam_marks','exam_marks.student_id','=','students.id')->where('students.id',$id)
  ->join('subjects','subjects.id','=','exam_marks.subject_id')->where('subjects.semester','second')->where('subjects.department_id',2)
  ->select('subjects.*','exam_marks.*','students.std_name','students.std_f_name','students.id as student_id','students.semester as std_semester')
  ->get();
      return view('departments.pharmicy.second_semester.final_result',compact('marks','subjects'));
  }
  public function Pharmicy_Pass_Third($id){
    if(!session('user')){
        return view('login.login');
    }
       DB::table('students')->where('id',$id)->update([
               'semester'=>'third',
       ]);
       return redirect()->to(url('pharmicy/second/final_exam'));

  }

  //Third Semester Students

  public function Third_Semester()
  {
    if(!session('user')){
        return view('login.login');
    }
  $students=Student::all()->where('department_id','==',2)->where('semester','==','third')->where('marks','>',50);
  return view('departments.pharmicy.third_semester.third_semester_students',compact('students'));

  }
  public function Third_Semester_M_Exam_Marks()
  {
    if(!session('user')){
        return view('login.login');
    }
      $students=Student::all()->where('department_id','==',2)->where('semester','==','third')->where('marks','>',50);
      $subjects=Subject::all()->where('department_id','==',2)->where('semester','==','third');
      $marks=ExamMark::all();
      return view('departments.pharmicy.third_semester.mideterm_exam_marks',compact('students','marks','subjects'));

  }
  public function Third_Semester_F_Exam_Marks(){
    if(!session('user')){
        return view('login.login');
    }
      $subjects=Subject::all()->where('department_id','==',2)->where('semester','==','third');
      $students=Student::all()->where('department_id','==',2)->where('semester','==','third')->where('marks','>',50);
      $marks=ExamMark::all();
      return view('departments.pharmicy.third_semester.final_exam_marks',compact('students','marks','subjects'));
  }
  public function Third_Semester_Subjects()
  {
    if(!session('user')){
        return view('login.login');
    }
      $subjects=Subject::all()->where('department_id','==',2)->where('semester','==','third');
      return view('departments.pharmicy.third_semester.subjects',compact('subjects'));
  }
  public function Third_Semester_Subject_Add()
  {
    if(!session('user')){
        return view('login.login');
    }
      $departments=Department::all()->where('id','==',2);
      return view('departments.pharmicy.third_semester.add_subject',compact('departments'));
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
      return redirect()->to(url('pharmicy/subjects/third'))->with('success','Subject Added Successfully');
  }
  public function Third_Select_subject($id)
  {
    if(!session('user')){
        return view('login.login');
    }
      $subjects=Subject::all()->where('department_id','==',2)->where('semester','==','third');
      $subject=Subject::find($id);
      $students=Student::all()->where('department_id','==',2)->where('semester','==','third')->where('marks','>',50);

      return view('departments.pharmicy.third_semester.select_subject',compact('subject','students','subjects'));
  }
  public function Third_S_Fill_M_E_Marks($student_id,$subject_id){
    if(!session('user')){
        return view('login.login');
    }
      $student=Student::find($student_id);
      $subject=Subject::find($subject_id);
      // $subjects=Subject::all()->where('department_id','==',3)->where('semester','==','first');
      $chances=ExamChances::all();
      return view('departments.pharmicy.third_semester.fill_mideterm_exam',compact('student','subject','chances'));

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

       return redirect()->to(url('select/subject/pharmicy/third'.$id))->with('success','Record inserted succefully');
      // return redirect()->back()->with('success','Record inserted succefully');
  }
  public function Third_Semester_Select_subject_final($id)
  {
    if(!session('user')){
        return view('login.login');
    }
      $subject=Subject::find($id);
      $students=Student::all()->where('department_id','==',2)->where('semester','==','third')->where('marks','>',50);
      return view('departments.pharmicy.third_semester.fill_final_exam_marks',compact('subject','students'));

  }
  public function third_Semester_Fill_F_Marks($student_id,$subject_id){
    if(!session('user')){
        return view('login.login');
    }
      $student=Student::find($student_id);
       $subject=Subject::find($subject_id);
      $chances=ExamChances::all();

       // $students=Student::all()->where('department_id','==',3)->where('semester','==','first')->where('marks','>',50);
       return view('departments.pharmicy.third_semester.fill_final_exam_marks_seperate',compact('subject','student','chances'));
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
     return redirect()->to(url('select/subject/final/pharmicy/third'.$subject_id))->with('success','Student Passed Successfully');
 } if($request->final_exam_marks+$request->attendence+$request->class_talent+$request->mideterm_exam_marks<50){

     DB::table('exam_marks')->where('student_id',$student_id)->where('subject_id',$subject_id)->update([
         'final_exam_marks'=>$request->final_exam_marks,
             'attendence_marks'=>$request->attendence,
             'class_talent_marks'=>$request->class_talent,
             'totale_marks'=>$request->final_exam_marks+$request->attendence+$request->class_talent+$request->mideterm_exam_marks,
             'passing_state'=>'ناکام',

     ]);
     return redirect()->to(url('select/subject/final/pharmicy/third'.$subject_id))->with('success','Student Failed To Pass');
 }
 }
 public function Third_Semester_Final_Results($id)
 {
    if(!session('user')){
        return view('login.login');
    }
 $subjects=Subject::all()->where('department_id','==',2)->where('semester','==','third');

 $marks=DB::table('students')
 ->join('exam_marks','exam_marks.student_id','=','students.id')->where('students.id',$id)
 ->join('subjects','subjects.id','=','exam_marks.subject_id')->where('subjects.semester','third')->where('subjects.department_id',2)
 ->select('subjects.*','exam_marks.*','students.std_name','students.std_f_name','students.id as student_id','students.semester as std_semester')
 ->get();
     return view('departments.pharmicy.third_semester.final_result',compact('marks','subjects'));
 }
 public function Pharmicy_Pass_Fourth($id){
    if(!session('user')){
        return view('login.login');
    }
      DB::table('students')->where('id',$id)->update([
              'semester'=>'fourth',
      ]);
      return redirect()->to(url('pharmicy/third/final_exam'));

 }
 //Fourth Semester Students

 public function Fourth_Semester()
 {
    if(!session('user')){
        return view('login.login');
    }
 $students=Student::all()->where('department_id','==',2)->where('semester','==','fourth')->where('marks','>',50);
 return view('departments.pharmicy.fourth_semester.fourth_semester_students',compact('students'));

 }
 public function Fourth_Semester_M_Exam_Marks()
 {
    if(!session('user')){
        return view('login.login');
    }

     $students=Student::all()->where('department_id','==',2)->where('semester','==','fourth')->where('marks','>',50);
     $subjects=Subject::all()->where('department_id','==',2)->where('semester','==','fourth');
     $marks=ExamMark::all();
     return view('departments.pharmicy.fourth_semester.mideterm_exam_marks',compact('students','marks','subjects'));

 }
 public function Fourth_Semester_F_Exam_Marks(){
    if(!session('user')){
        return view('login.login');
    }
     $subjects=Subject::all()->where('department_id','==',2)->where('semester','==','fourth');
     $students=Student::all()->where('department_id','==',2)->where('semester','==','fourth')->where('marks','>',50);
     $marks=ExamMark::all();
     return view('departments.pharmicy.fourth_semester.final_exam_marks',compact('students','marks','subjects'));
 }
 public function Fourth_Semester_Subjects()
 {
    if(!session('user')){
        return view('login.login');
    }
     $subjects=Subject::all()->where('department_id','==',2)->where('semester','==','fourth');
     return view('departments.pharmicy.fourth_semester.subjects',compact('subjects'));
 }
 public function Fourth_Semester_Subject_Add()
 {
    if(!session('user')){
        return view('login.login');
    }
     $departments=Department::all()->where('id','==',2);
     return view('departments.pharmicy.fourth_semester.add_subject',compact('departments'));
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
     return redirect()->to(url('pharmicy/subjects/fourth'))->with('success','Subject Added Successfully');
 }
 public function Fourth_Select_subject($id)
 {
    if(!session('user')){
        return view('login.login');
    }
     $subjects=Subject::all()->where('department_id','==',2)->where('semester','==','fourth');
     $subject=Subject::find($id);
     $students=Student::all()->where('department_id','==',2)->where('semester','==','fourth')->where('marks','>',50);

     return view('departments.pharmicy.fourth_semester.select_subject',compact('subject','students','subjects'));
 }
 public function Fourth_S_Fill_M_E_Marks($student_id,$subject_id){
    if(!session('user')){
        return view('login.login');
    }
     $student=Student::find($student_id);
     $subject=Subject::find($subject_id);
     // $subjects=Subject::all()->where('department_id','==',3)->where('semester','==','first');
     $chances=ExamChances::all();
     return view('departments.pharmicy.fourth_semester.fill_mideterm_exam',compact('student','subject','chances'));

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

      return redirect()->to(url('select/subject/pharmicy/fourth'.$id))->with('success','Record inserted succefully');
     // return redirect()->back()->with('success','Record inserted succefully');
 }
 public function Fourth_Semester_Select_subject_final($id)
 {
    if(!session('user')){
        return view('login.login');
    }
     $subject=Subject::find($id);
     $students=Student::all()->where('department_id','==',2)->where('semester','==','fourth')->where('marks','>',50);
     return view('departments.pharmicy.fourth_semester.fill_final_exam_marks',compact('subject','students'));

 }
 public function Fourth_Semester_Fill_F_Marks($student_id,$subject_id){
    if(!session('user')){
        return view('login.login');
    }
     $student=Student::find($student_id);
      $subject=Subject::find($subject_id);
     $chances=ExamChances::all();

      // $students=Student::all()->where('department_id','==',3)->where('semester','==','first')->where('marks','>',50);
      return view('departments.pharmicy.fourth_semester.fill_final_exam_marks_seperate',compact('subject','student','chances'));
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
    return redirect()->to(url('select/subject/final/pharmicy/fourth'.$subject_id))->with('success','Student Passed Successfully');
} if($request->final_exam_marks+$request->attendence+$request->class_talent+$request->mideterm_exam_marks<50){

    DB::table('exam_marks')->where('student_id',$student_id)->where('subject_id',$subject_id)->update([
        'final_exam_marks'=>$request->final_exam_marks,
            'attendence_marks'=>$request->attendence,
            'class_talent_marks'=>$request->class_talent,
            'totale_marks'=>$request->final_exam_marks+$request->attendence+$request->class_talent+$request->mideterm_exam_marks,
            'passing_state'=>'ناکام',

    ]);
    return redirect()->to(url('select/subject/final/pharmicy/fourth'.$subject_id))->with('success','Student Failed To Pass');
}
}
public function Fourth_Semester_Final_Results($id)
{
    if(!session('user')){
        return view('login.login');
    }
$subjects=Subject::all()->where('department_id','==',2)->where('semester','==','fourth');

$marks=DB::table('students')
->join('exam_marks','exam_marks.student_id','=','students.id')->where('students.id',$id)
->join('subjects','subjects.id','=','exam_marks.subject_id')->where('subjects.semester','fourth')->where('subjects.department_id',2)
->select('subjects.*','exam_marks.*','students.std_name','students.std_f_name','students.id as student_id','students.semester as std_semester')
->get();
    return view('departments.pharmicy.fourth_semester.final_result',compact('marks','subjects'));
}
public function Pharmicy_Pass_Graduate($id){
    if(!session('user')){
        return view('login.login');
    }
    $r_date=DB::table('students')->where('id',$id)->select('students.r_date')->value('r_date');

     DB::table('students')->where('id',$id)->update([
        'semester'=>'graduated',
        'r_date'=>$r_date+2
     ]);
     return redirect()->to(url('pharmicy/fourth/final_exam'));

}


public function Graduated_Students()
{
    if(!session('user')){
        return view('login.login');
    }
    $students=Student::all()->where('department_id',2)->where('semester','graduated');

    return view('departments.pharmicy.graduated_students.index',compact('students'));
}

public function Find_Year(Request $request){
    if(!session('user')){
        return view('login.login');
    }

    $students=Student::all()->where('r_date',$request->name)->where('department_id',2)->where('semester','graduated');
    return view('departments.pharmicy.graduated_students.index',compact('students'));

}
public function Find_Name(Request $request){
    if(!session('user')){
        return view('login.login');
    }
    $students=Student::all()->where('std_name',$request->name)->where('department_id',2)->where('semester','graduated');
    return view('departments.pharmicy.graduated_students.index',compact('students'));

}
public function View_Student_Record($id)
{
    if(!session('user')){
        return view('login.login');
    }
    $first_semester=DB::table('students')->where('students.semester','graduated')
    ->join('exam_marks','exam_marks.student_id','=','students.id')->where('students.id',$id)
    ->join('subjects','subjects.id','=','exam_marks.subject_id')->where('subjects.semester','first')->where('subjects.department_id',2)
    ->select('subjects.*','exam_marks.*','students.std_name','students.std_f_name','students.id as student_id','students.semester as std_semester')
    ->get();
    // return view('departments.pharmicy.graduated_students.view_record_full',compact('students','id'));

    $second_semester=DB::table('students')->where('students.semester','graduated')
    ->join('exam_marks','exam_marks.student_id','=','students.id')->where('students.id',$id)
    ->join('subjects','subjects.id','=','exam_marks.subject_id')->where('subjects.semester','second')->where('subjects.department_id',2)
    ->select('subjects.*','exam_marks.*','students.std_name','students.std_f_name','students.id as student_id','students.semester as std_semester')
    ->get();
    // return view('departments.pharmicy.graduated_students.view_record_full',compact('students','id'));

    $third_semester=DB::table('students')->where('students.semester','graduated')
    ->join('exam_marks','exam_marks.student_id','=','students.id')->where('students.id',$id)
    ->join('subjects','subjects.id','=','exam_marks.subject_id')->where('subjects.semester','third')->where('subjects.department_id',2)
    ->select('subjects.*','exam_marks.*','students.std_name','students.std_f_name','students.id as student_id','students.semester as std_semester')
    ->get();
    // return view('departments.pharmicy.graduated_students.view_record_full',compact('students','id'));

   $fourth_semester=DB::table('students')->where('students.semester','graduated')
   ->join('exam_marks','exam_marks.student_id','=','students.id')->where('students.id',$id)
   ->join('subjects','subjects.id','=','exam_marks.subject_id')->where('subjects.semester','fourth')->where('subjects.department_id',2)
   ->select('subjects.*','exam_marks.*','students.std_name','students.std_f_name','students.id as student_id','students.semester as std_semester')
   ->get();

   $students=Student::all()->where('id',$id);

   return view('departments.pharmicy.graduated_students.view_record',compact('first_semester','second_semester','third_semester','fourth_semester','students','id','students'));


    // $students=Student::find($id)->get();
    //  return view('departments.pharmicy.graduated_students.view_record',compact('students'));
}
public function View_Record_First($id)
{
    if(!session('user')){
        return view('login.login');
    }
    $students=DB::table('students')->where('students.semester','graduated')
    ->join('exam_marks','exam_marks.student_id','=','students.id')->where('students.id',$id)
    ->join('subjects','subjects.id','=','exam_marks.subject_id')->where('subjects.semester','first')->where('subjects.department_id',2)
    ->select('subjects.*','exam_marks.*','students.std_name','students.std_f_name','students.id as student_id','students.semester as std_semester')
    ->get();
    return view('departments.pharmicy.graduated_students.view_record_full',compact('students','id'));

}
public function View_Record_Second($id)
{
    if(!session('user')){
        return view('login.login');
    }
    $students=DB::table('students')->where('students.semester','graduated')
    ->join('exam_marks','exam_marks.student_id','=','students.id')->where('students.id',$id)
    ->join('subjects','subjects.id','=','exam_marks.subject_id')->where('subjects.semester','second')->where('subjects.department_id',2)
    ->select('subjects.*','exam_marks.*','students.std_name','students.std_f_name','students.id as student_id','students.semester as std_semester')
    ->get();
    return view('departments.pharmicy.graduated_students.view_record_full',compact('students','id'));

}
public function View_Record_Third($id)
{
    if(!session('user')){
        return view('login.login');
    }
    $students=DB::table('students')->where('students.semester','graduated')
    ->join('exam_marks','exam_marks.student_id','=','students.id')->where('students.id',$id)
    ->join('subjects','subjects.id','=','exam_marks.subject_id')->where('subjects.semester','third')->where('subjects.department_id',2)
    ->select('subjects.*','exam_marks.*','students.std_name','students.std_f_name','students.id as student_id','students.semester as std_semester')
    ->get();
    return view('departments.pharmicy.graduated_students.view_record_full',compact('students','id'));

}
public function View_Record_Fourth($id)
{
    if(!session('user')){
        return view('login.login');
    }
    $students=DB::table('students')->where('students.semester','graduated')
    ->join('exam_marks','exam_marks.student_id','=','students.id')->where('students.id',$id)
    ->join('subjects','subjects.id','=','exam_marks.subject_id')->where('subjects.semester','fourth')->where('subjects.department_id',2)
    ->select('subjects.*','exam_marks.*','students.std_name','students.std_f_name','students.id as student_id','students.semester as std_semester')
    ->get();
    return view('departments.pharmicy.graduated_students.view_record_full',compact('students','id'));

}


}
