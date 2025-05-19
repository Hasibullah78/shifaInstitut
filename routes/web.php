<?php

use App\Http\Controllers\AnastizyController;
use App\Http\Controllers\DepartmentController;
use App\Http\Controllers\FeesController;
use App\Http\Controllers\GallaryController;
use App\Http\Controllers\KankorController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\MidwiferyController;
use App\Http\Controllers\NursingController;
use App\Http\Controllers\PharmicyController;
use App\Http\Controllers\ProthessController;
use App\Http\Controllers\RegisteredStudent;
use App\Http\Controllers\SessionController;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\TeacherController;
use App\Models\Department;
use App\Models\District;
use App\Models\Fees;
use App\Models\Gallary;
use App\Models\Province;
use App\Models\RegisteredStudent as ModelsRegisteredStudent;
use App\Models\Session;
use App\Models\Shift;
use App\Models\Student;
use App\Models\Teacher;
use FontLib\Table\Type\name;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    $deps = Department::all();
    $techs = Teacher::all();
    $gallaries = Gallary::all();

    return view('master_index', compact('deps', 'techs', 'gallaries'));
});

Route::get('/al', function () {
    // $department= new Department();
    //  $department->name="Technology";
    //  $department->description="It is good";
    //  $department->save();
    $dep = Department::find(1);

    $student = new Student();

    // $student->std_name="Ahmad";
    // $student->std_f_name="Mirwise";
    // $student->std_g_f_name="Wali";
    // $student->c_province="Laghman";
    // $student->c_district="mihtarlam";
    // $student->c_vallage="Badiabad";
    // $student->o_province="Laghman";
    // $student->o_district="mihtarlam";
    // $student->o_vallage="Badiabad";
    // $student->nic="17144198";
    // $student->school="Bady Abad";
    // $student->phone="0789515950";
    // $student->g_date="2019-2-2";
    // $student->gender="male";
    // $student->reg_fees=1000;
    // $student->image="image/store";
    // $student->department_id=$dep->id;

    // $student->save();

    $shift = new Session();
    // $shift->shift_category="Morning";
    // $shift->shift_start_time="08:00";
    // $shift->shift_end_time="12:00";
    // $shift->department_id=$dep->id;
    // $shift->save();
    $fees = new Fees();
    // $fees->fees_amount=5000;
    // $fees->department_id=$dep->id;
    // $fees->save();

    $student = Department::find(1)->student;
    $shift = Department::find(1)->shift;
    $fees = Department::find(3)->fees;

    return 'Department is '.$dep->name.' Student name is '.$student->std_name.' Shift is '.$shift->shift_category.' Fess is '.$fees->fees_amount;
});
// Route::get('/', function () {

//     return view('');
// });

//Login Routes
// Route::get('login/dashboard', [LoginController::class, 'Login'])->name('admin.login');

Route::post('login/dashboard', [LoginController::class, 'Login'])->name('admin.login');
// Route::get('login/dashboard', [LoginController::class, 'Login'])->name('admin.login');

 Route::get('login/dashboard', [LoginController::class, 'LogOut'])->name('admin.logout');

//  Route::get('login/dashboard',function()
//  {
//     return view('login.login');
//  });
Route::get('login/dashboard/check', [LoginController::class, 'Check'])->name('user.check');

Route::post('login/dashboard/check', [LoginController::class, 'CredintialCheck'])->name('user.check');


Route::get('home/dashboard',[LoginController::class,'Dashboard']);

// //Department Routes
Route::get('department/', function () {
    return view('departments.add');
});
Route::post('add/department', [DepartmentController::class, 'Add'])->name('add.depart');
Route::get('department/view', function () {
    $deps = Department::all();

    return view('departments.view', compact('deps'));
});
Route::get('edit/dep{id}', [DepartmentController::class, 'Edit']);
Route::post('update/depart{id}', [DepartmentController::class, 'Update']);
Route::get('delete/dep{id}', [DepartmentController::class, 'Delete']);

Route::get('show/department', [DepartmentController::class, 'AllDep'])->name('all.dep');
Route::get('print/pdf', [DepartmentController::class, 'Print'])->name('print.form');

//Teachers Route
Route::get('teacher/reg', function () {
    $departments=Department::all();
    if(!session('user')){
        return view('login.login');
    }
    return view('teachers.add',compact('departments'));
});
Route::post('add/teacher', [TeacherController::class, 'Add'])->name('add.teacher');
Route::get('teacher/view', [TeacherController::class, 'View'])->name('teacher.view');
//Route::get('edit/teacher',[TeacherController::class,'Edit'])->name('edit.teacher');
Route::get('view/profile{id}', [TeacherController::class, 'TDetailes']);
Route::get('teach/edit{id}', [TeacherController::class, 'Edit']);
Route::post('update/teacher{id}', [TeacherController::class, 'Update'])->name('update.tech');
Route::get('teach/delete{id}', [TeacherController::class, 'Delete'])->name('update.tech');

//Gallary Images
Route::get('add/gallary/image', [GallaryController::class, 'Add']);
Route::post('Add/gallary', [GallaryController::class, 'Save'])->name('add.gallary');

Route::get('gallary/view', function () {
    $gallaries = Gallary::all();

    return view('gallary.view', compact('gallaries'));
});
Route::get('gallary/edit{id}',[GallaryController::class,'EidtGallary']);
Route::post('update/gallary{id}',[GallaryController::class,'Update']);
Route::get('gallary/delete{id}',[GallaryController::class,'Delete']);

//Student Routes
// Route::get('add/student', function () {
//     $departments = Department::all();
//     $shifts = Session::all();
//     $feeses = Fees::all();
//     $a = 1;

//     return view('student.add', compact('departments', 'shifts', 'feeses', 'a'));
// });
        //Kankor Registeration
        Route::get('reg/kankor', function () {
            $departments=Department::all();
            $sessions=Session::all();
            return view('kankor.register',compact('departments','sessions'));
        });
        Route::get('kankor/results', [KankorController::class, 'Search'])->name('kankor.results');

//              STudent Registeration for Knakor Exam
Route::post('student/admission',[StudentController::class,'Add'])->name('std.admission');
Route::get('student/view',[StudentController::class,'View']);
Route::get('prove/students{id}',[StudentController::class,'Prove']);
Route::post('register/student{id}',[StudentController::class,'Register']);
Route::get('student/reg/view1',[StudentController::class,'View']);
Route::get('student/profile{id}',[StudentController::class,'Profile']);

Route::get('student/card{id}',[StudentController::class,'Card']);
Route::post('generate/card{id}',[StudentController::class,'Generate_Card']);
Route::get('view/pdf',[StudentController::class,'View_PDF']);
Route::get('student/mark',[StudentController::class,'View_Student']);
Route::get('fill/mark{id}',[StudentController::class,'Fill_Mark']);
Route::post('save/mark{id}',[StudentController::class,'Save_Mark']);
Route::post('record/search',[StudentController::class,'Find']);

//             Departments
Route::get('student/pharmicy',[StudentController::class,'P_Index']);
Route::get('student/midwifery',[StudentController::class,'Q_Index']);
Route::get('student/prothess',[StudentController::class,'Pr_Index']);
Route::get('student/anastizy',[StudentController::class,'A_Index']);

//              MidWifery
Route::get('midwifery/teachers',[StudentController::class,'M_Teachers']);
Route::post('student/m_search',[StudentController::class,'M_Search']);

//            Nursing



//            Anastizy

Route::get('anastizy/teachers',[StudentController::class,'A_Teachers']);
Route::post('student/a_search',[StudentController::class,'A_Search']);

//      Pharmicy
Route::get('pharmicy/teachers',[StudentController::class,'P_Teachers']);
Route::post('student/p_search',[StudentController::class,'P_Search']);

//     Prothess
Route::get('prothess/teachers',[StudentController::class,'Pr_Teachers']);
Route::post('student/pr_search',[StudentController::class,'Pr_Search']);
//Nursing Department
//    First_Semester_Students
Route::get('student/nursing',[NursingController::class,'N_Index']);
Route::get('nursing/teachers',[NursingController::class,'N_Teachers']);
Route::post('student/n_search',[NursingController::class,'N_Search']);
Route::get('nursing/first_semester',[NursingController::class,'First_Semester']);
Route::get('nursing/first/mideterm_exam',[NursingController::class,'First_Semester_M_Exam_Marks']);
Route::get('nursing/first/final_exam',[NursingController::class,'First_Semester_F_Exam_Marks']);
Route::get('nursing/subjects/first',[NursingController::class,'First_Semester_Subjects']);
Route::get('nursing/subjects/first/add',[NursingController::class,'First_Semester_Subject_Add']);
Route::post('nursing/add/subject/first',[NursingController::class,'First_Semester_Subject_Add_New'])->name('add.subject.nursing.first');
Route::get('select/subject/nursing/first{id}',[NursingController::class,'First_Select_subject']);
Route::get('AddMideterm/nursing/first/{student_id}/{subject_id}',[NursingController::class,'First_S_Fill_M_E_Marks'])->name('AddMideterm.nursing.first');
Route::post('save/mideterm/marks/nursing/first{id}',[NursingController::class,'First_Semester_Save_M_E_Marks']);
Route::get('select/subject/final/nursing/first{id}',[NursingController::class,'First_Semester_Select_subject_final']);
Route::get('fill/final/marks/nursing/first/{student_id}/{subject_id}',[NursingController::class,'First_Semester_Fill_F_Marks']);
Route::post('save/student/final/marks/nursing/first/{student_id}/{subject_id}',[NursingController::class,'First_Semester_Save_F_Marks']);
Route::get('final/results/nursing/first{id}',[NursingController::class,'First_Semester_Final_Results']);
Route::get('nursing/pass/second{id}',[NursingController::class,'Nursing_Pass_Second']);
//     Second_Semester_students

Route::get('nursing/second_semester',[NursingController::class,'Second_Semester']);
Route::get('nursing/second/mideterm_exam',[NursingController::class,'Second_Semester_M_Exam_Marks']);
Route::get('nursing/second/final_exam',[NursingController::class,'Second_Semester_F_Exam_Marks']);
Route::get('nursing/subjects/second',[NursingController::class,'Second_Semester_Subjects']);
Route::get('nursing/subjects/second/add',[NursingController::class,'Second_Semester_Subject_Add']);
Route::post('nursing/add/subject/second',[NursingController::class,'Second_Semester_Subject_Add_New'])->name('add.subject.nursing.second');
Route::get('select/subject/nursing/second{id}',[NursingController::class,'Second_Select_subject']);
Route::get('AddMideterm/nursing/second/{student_id}/{subject_id}',[NursingController::class,'Second_S_Fill_M_E_Marks'])->name('AddMideterm.nursing.second');
Route::post('save/mideterm/marks/nursing/second{id}',[NursingController::class,'Second_Semester_Save_M_E_Marks']);
Route::get('select/subject/final/nursing/second{id}',[NursingController::class,'Second_Semester_Select_subject_final']);
Route::get('fill/final/marks/nursing/second/{student_id}/{subject_id}',[NursingController::class,'Second_Semester_Fill_F_Marks']);
Route::post('save/student/final/marks/nursing/second/{student_id}/{subject_id}',[NursingController::class,'Second_Semester_Save_F_Marks']);
Route::get('final/results/nursing/second{id}',[NursingController::class,'Second_Semester_Final_Results']);
Route::get('nursing/pass/third{id}',[NursingController::class,'Nursing_Pass_Third']);
// Third_Semester_Students

Route::get('nursing/third_semester',[NursingController::class,'Third_Semester']);
Route::get('nursing/third/mideterm_exam',[NursingController::class,'Third_Semester_M_Exam_Marks']);
Route::get('nursing/third/final_exam',[NursingController::class,'Third_Semester_F_Exam_Marks']);
Route::get('nursing/subjects/third',[NursingController::class,'Third_Semester_Subjects']);
Route::get('nursing/subjects/third/add',[NursingController::class,'Third_Semester_Subject_Add']);
Route::post('nursing/add/subject/third',[NursingController::class,'Third_Semester_Subject_Add_New'])->name('add.subject.nursing.third');
Route::get('select/subject/nursing/third{id}',[NursingController::class,'Third_Select_subject']);
Route::get('AddMideterm/nursing/third/{student_id}/{subject_id}',[NursingController::class,'Third_S_Fill_M_E_Marks'])->name('AddMideterm.nursing.third');
Route::post('save/mideterm/marks/nursing/third{id}',[NursingController::class,'Third_Semester_Save_M_E_Marks']);
Route::get('select/subject/final/nursing/third{id}',[NursingController::class,'Third_Semester_Select_subject_final']);
Route::get('fill/final/marks/nursing/third/{student_id}/{subject_id}',[NursingController::class,'Third_Semester_Fill_F_Marks']);
Route::post('save/student/final/marks/nursing/third/{student_id}/{subject_id}',[NursingController::class,'Third_Semester_Save_F_Marks']);
Route::get('final/results/nursing/third{id}',[NursingController::class,'Third_Semester_Final_Results']);
Route::get('nursing/pass/fourth{id}',[NursingController::class,'Nursing_Pass_Fourth']);
//Fourth_Semester
Route::get('nursing/fourth_semester',[NursingController::class,'Fourth_Semester']);
Route::get('nursing/fourth/mideterm_exam',[NursingController::class,'Fourth_Semester_M_Exam_Marks']);
Route::get('nursing/fourth/final_exam',[NursingController::class,'Fourth_Semester_F_Exam_Marks']);
Route::get('nursing/subjects/fourth',[NursingController::class,'Fourth_Semester_Subjects']);
Route::get('nursing/subjects/fourth/add',[NursingController::class,'Fourth_Semester_Subject_Add']);
Route::post('nursing/add/subject/fourth',[NursingController::class,'Fourth_Semester_Subject_Add_New'])->name('add.subject.nursing.fourth');
Route::get('select/subject/nursing/fourth{id}',[NursingController::class,'Fourth_Select_subject']);
Route::get('AddMideterm/nursing/fourth/{student_id}/{subject_id}',[NursingController::class,'Fourth_S_Fill_M_E_Marks'])->name('AddMideterm.nursing.fourth');
Route::post('save/mideterm/marks/nursing/fourth{id}',[NursingController::class,'Fourth_Semester_Save_M_E_Marks']);
Route::get('select/subject/final/nursing/fourth{id}',[NursingController::class,'Fourth_Semester_Select_subject_final']);
Route::get('fill/final/marks/nursing/fourth/{student_id}/{subject_id}',[NursingController::class,'Fourth_Semester_Fill_F_Marks']);
Route::post('save/student/final/marks/nursing/fourth/{student_id}/{subject_id}',[NursingController::class,'Fourth_Semester_Save_F_Marks']);
Route::get('final/results/nursing/fourth{id}',[NursingController::class,'Fourth_Semester_Final_Results']);
Route::get('nursing/pass/fiveth{id}',[NursingController::class,'Nursing_Pass_Fiveth']);
  //Fiveth Semester Students
  Route::get('nursing/fiveth_semester',[NursingController::class,'Fiveth_Semester']);
  Route::get('nursing/fiveth/mideterm_exam',[NursingController::class,'Fiveth_Semester_M_Exam_Marks']);
  Route::get('nursing/fiveth/final_exam',[NursingController::class,'Fiveth_Semester_F_Exam_Marks']);
  Route::get('nursing/subjects/fiveth',[NursingController::class,'Fiveth_Semester_Subjects']);
  Route::get('nursing/subjects/fiveth/add',[NursingController::class,'Fiveth_Semester_Subject_Add']);
  Route::post('nursing/add/subject/fiveth',[NursingController::class,'Fiveth_Semester_Subject_Add_New'])->name('add.subject.nursing.fiveth');
  Route::get('select/subject/nursing/fiveth{id}',[NursingController::class,'Fiveth_Select_subject']);
  Route::get('AddMideterm/nursing/fiveth/{student_id}/{subject_id}',[NursingController::class,'Fiveth_S_Fill_M_E_Marks'])->name('AddMideterm.nursing.fiveth');
  Route::post('save/mideterm/marks/nursing/fiveth{id}',[NursingController::class,'Fiveth_Semester_Save_M_E_Marks']);
  Route::get('select/subject/final/nursing/fiveth{id}',[NursingController::class,'Fiveth_Semester_Select_subject_final']);
  Route::get('fill/final/marks/nursing/fiveth/{student_id}/{subject_id}',[NursingController::class,'Fiveth_Semester_Fill_F_Marks']);
  Route::post('save/student/final/marks/nursing/fiveth/{student_id}/{subject_id}',[NursingController::class,'Fiveth_Semester_Save_F_Marks']);
  Route::get('final/results/nursing/fiveth{id}',[NursingController::class,'Fiveth_Semester_Final_Results']);
  Route::get('nursing/pass/sixth{id}',[NursingController::class,'Nursing_Pass_Sixth']);

  //Sixth Semester Students
  Route::get('nursing/sixth_semester',[NursingController::class,'Sixth_Semester']);
  Route::get('nursing/sixth/mideterm_exam',[NursingController::class,'Sixth_Semester_M_Exam_Marks']);
  Route::get('nursing/sixth/final_exam',[NursingController::class,'Sixth_Semester_F_Exam_Marks']);
  Route::get('nursing/subjects/sixth',[NursingController::class,'Sixth_Semester_Subjects']);
  Route::get('nursing/subjects/sixth/add',[NursingController::class,'Sixth_Semester_Subject_Add']);
  Route::post('nursing/add/subject/sixth',[NursingController::class,'Sixth_Semester_Subject_Add_New'])->name('add.subject.nursing.sixth');
  Route::get('select/subject/nursing/sixth{id}',[NursingController::class,'Sixth_Select_subject']);
  Route::get('AddMideterm/nursing/sixth/{student_id}/{subject_id}',[NursingController::class,'Sixth_S_Fill_M_E_Marks'])->name('AddMideterm.nursing.sixth');
  Route::post('save/mideterm/marks/nursing/sixth{id}',[NursingController::class,'Sixth_Semester_Save_M_E_Marks']);
  Route::get('select/subject/final/nursing/sixth{id}',[NursingController::class,'Sixth_Semester_Select_subject_final']);
  Route::get('fill/final/marks/nursing/sixth/{student_id}/{subject_id}',[NursingController::class,'Sixth_Semester_Fill_F_Marks']);
  Route::post('save/student/final/marks/nursing/sixth/{student_id}/{subject_id}',[NursingController::class,'Sixth_Semester_Save_F_Marks']);
  Route::get('final/results/nursing/sixth{id}',[NursingController::class,'Sixth_Semester_Final_Results']);
  Route::get('nursing/pass/graduate{id}',[NursingController::class,'Nursing_Pass_Graduate']);

//  Pharmicy Department Students
//First Semester Students
Route::get('student/pharmicy',[PharmicyController::class,'P_Index']);
Route::get('pharmicy/teachers',[PharmicyController::class,'P_Teachers']);
Route::post('student/p_search',[PharmicyController::class,'P_Search']);
Route::get('pharmicy/first_semester',[PharmicyController::class,'First_Semester']);
Route::get('pharmicy/first/mideterm_exam',[PharmicyController::class,'First_Semester_M_Exam_Marks']);
Route::get('pharmicy/first/final_exam',[PharmicyController::class,'First_Semester_F_Exam_Marks']);
Route::get('pharmicy/subjects/first',[PharmicyController::class,'First_Semester_Subjects']);
Route::get('pharmicy/subjects/first/add',[PharmicyController::class,'First_Semester_Subject_Add']);
Route::post('pharmicy/add/subject/first',[PharmicyController::class,'First_Semester_Subject_Add_New'])->name('add.subject.pharmicy.first');
Route::get('select/subject/pharmicy/first{id}',[PharmicyController::class,'First_Select_subject']);
Route::get('AddMideterm/pharmicy/first/{student_id}/{subject_id}',[PharmicyController::class,'First_S_Fill_M_E_Marks'])->name('AddMideterm.pharmicy.first');
Route::post('save/mideterm/marks/pharmicy/first{id}',[PharmicyController::class,'First_Semester_Save_M_E_Marks']);
Route::get('select/subject/final/pharmicy/first{id}',[PharmicyController::class,'First_Semester_Select_subject_final']);
Route::get('fill/final/marks/pharmicy/first/{student_id}/{subject_id}',[PharmicyController::class,'First_Semester_Fill_F_Marks']);
Route::post('save/student/final/marks/pharmicy/first/{student_id}/{subject_id}',[PharmicyController::class,'First_Semester_Save_F_Marks']);
Route::get('final/results/pharmicy/first{id}',[PharmicyController::class,'First_Semester_Final_Results']);
Route::get('pharmicy/pass/second{id}',[PharmicyController::class,'Pharmicy_Pass_Second']);
Route::get('pharmicy/fisrt_semester/edit/subject{id}',[PharmicyController::class,'Edit_Subject_First_Semester_View']);
Route::post('pharmicy/add/subject/first{id}',[PharmicyController::class,'Edit_Subject_First_Semester'])->name('edit.subject.pharmicy.first');

//Second Semester Students

Route::get('pharmicy/second_semester',[PharmicyController::class,'Second_Semester']);
Route::get('pharmicy/second/mideterm_exam',[PharmicyController::class,'Second_Semester_M_Exam_Marks']);
Route::get('pharmicy/second/final_exam',[PharmicyController::class,'Second_Semester_F_Exam_Marks']);
Route::get('pharmicy/subjects/second',[PharmicyController::class,'Second_Semester_Subjects']);
Route::get('pharmicy/subjects/second/add',[PharmicyController::class,'Second_Semester_Subject_Add']);
Route::post('pharmicy/add/subject/second',[PharmicyController::class,'Second_Semester_Subject_Add_New'])->name('add.subject.pharmicy.second');
Route::get('select/subject/pharmicy/second{id}',[PharmicyController::class,'Second_Select_subject']);
Route::get('AddMideterm/pharmicy/second/{student_id}/{subject_id}',[PharmicyController::class,'Second_S_Fill_M_E_Marks'])->name('AddMideterm.pharmicy.second');
Route::post('save/mideterm/marks/pharmicy/second{id}',[PharmicyController::class,'Second_Semester_Save_M_E_Marks']);
Route::get('select/subject/final/pharmicy/second{id}',[PharmicyController::class,'Second_Semester_Select_subject_final']);
Route::get('fill/final/marks/pharmicy/second/{student_id}/{subject_id}',[PharmicyController::class,'Second_Semester_Fill_F_Marks']);
Route::post('save/student/final/marks/pharmicy/second/{student_id}/{subject_id}',[PharmicyController::class,'Second_Semester_Save_F_Marks']);
Route::get('final/results/pharmicy/second{id}',[PharmicyController::class,'Second_Semester_Final_Results']);
Route::get('pharmicy/pass/third{id}',[PharmicyController::class,'Pharmicy_Pass_Third']);

//Third Semester Students

Route::get('pharmicy/third_semester',[PharmicyController::class,'Third_Semester']);
Route::get('pharmicy/third/mideterm_exam',[PharmicyController::class,'Third_Semester_M_Exam_Marks']);
Route::get('pharmicy/third/final_exam',[PharmicyController::class,'Third_Semester_F_Exam_Marks']);
Route::get('pharmicy/subjects/third',[PharmicyController::class,'Third_Semester_Subjects']);
Route::get('pharmicy/subjects/third/add',[PharmicyController::class,'Third_Semester_Subject_Add']);
Route::post('pharmicy/add/subject/third',[PharmicyController::class,'Third_Semester_Subject_Add_New'])->name('add.subject.pharmicy.third');
Route::get('select/subject/pharmicy/third{id}',[PharmicyController::class,'Third_Select_subject']);
Route::get('AddMideterm/pharmicy/third/{student_id}/{subject_id}',[PharmicyController::class,'Third_S_Fill_M_E_Marks'])->name('AddMideterm.pharmicy.third');
Route::post('save/mideterm/marks/pharmicy/third{id}',[PharmicyController::class,'Third_Semester_Save_M_E_Marks']);
Route::get('select/subject/final/pharmicy/third{id}',[PharmicyController::class,'Third_Semester_Select_subject_final']);
Route::get('fill/final/marks/pharmicy/third/{student_id}/{subject_id}',[PharmicyController::class,'Third_Semester_Fill_F_Marks']);
Route::post('save/student/final/marks/pharmicy/third/{student_id}/{subject_id}',[PharmicyController::class,'Third_Semester_Save_F_Marks']);
Route::get('final/results/pharmicy/third{id}',[PharmicyController::class,'Third_Semester_Final_Results']);
Route::get('pharmicy/pass/fourth{id}',[PharmicyController::class,'Pharmicy_Pass_Fourth']);


//Fourth Semester Students


Route::get('pharmicy/fourth_semester',[PharmicyController::class,'Fourth_Semester']);
Route::get('pharmicy/fourth/mideterm_exam',[PharmicyController::class,'Fourth_Semester_M_Exam_Marks']);
Route::get('pharmicy/fourth/final_exam',[PharmicyController::class,'Fourth_Semester_F_Exam_Marks']);
Route::get('pharmicy/subjects/fourth',[PharmicyController::class,'Fourth_Semester_Subjects']);
Route::get('pharmicy/subjects/fourth/add',[PharmicyController::class,'Fourth_Semester_Subject_Add']);
Route::post('pharmicy/add/subject/fourth',[PharmicyController::class,'Fourth_Semester_Subject_Add_New'])->name('add.subject.pharmicy.fourth');
Route::get('select/subject/pharmicy/fourth{id}',[PharmicyController::class,'Fourth_Select_subject']);
Route::get('AddMideterm/pharmicy/fourth/{student_id}/{subject_id}',[PharmicyController::class,'Fourth_S_Fill_M_E_Marks'])->name('AddMideterm.pharmicy.fourth');
Route::post('save/mideterm/marks/pharmicy/fourth{id}',[PharmicyController::class,'Fourth_Semester_Save_M_E_Marks']);
Route::get('select/subject/final/pharmicy/fourth{id}',[PharmicyController::class,'Fourth_Semester_Select_subject_final']);
Route::get('fill/final/marks/pharmicy/fourth/{student_id}/{subject_id}',[PharmicyController::class,'Fourth_Semester_Fill_F_Marks']);
Route::post('save/student/final/marks/pharmicy/fourth/{student_id}/{subject_id}',[PharmicyController::class,'Fourth_Semester_Save_F_Marks']);
Route::get('final/results/pharmicy/fourth{id}',[PharmicyController::class,'Fourth_Semester_Final_Results']);
Route::get('pharmicy/pass/graduate{id}',[PharmicyController::class,'Pharmicy_Pass_Graduate']);

//      MidWifery Department
//   First Semester Students

Route::get('student/midwifery',[MidwiferyController::class,'Index']);
Route::get('midwifery/teachers',[MidwiferyController::class,'Teachers']);
Route::post('student/p_search',[MidwiferyController::class,'Search']);
Route::get('midwifery/first_semester',[MidwiferyController::class,'First_Semester']);
Route::get('midwifery/first/mideterm_exam',[MidwiferyController::class,'First_Semester_M_Exam_Marks']);
Route::get('midwifery/first/final_exam',[MidwiferyController::class,'First_Semester_F_Exam_Marks']);
Route::get('midwifery/subjects/first',[MidwiferyController::class,'First_Semester_Subjects']);
Route::get('midwifery/subjects/first/add',[MidwiferyController::class,'First_Semester_Subject_Add']);
Route::post('midwifery/add/subject/first',[MidwiferyController::class,'First_Semester_Subject_Add_New'])->name('add.subject.midwifery.first');
Route::get('select/subject/midwifery/first{id}',[MidwiferyController::class,'First_Select_subject']);
Route::get('AddMideterm/midwifery/first/{student_id}/{subject_id}',[MidwiferyController::class,'First_S_Fill_M_E_Marks'])->name('AddMideterm.midwifery.first');
Route::post('save/mideterm/marks/midwifery/first{id}',[MidwiferyController::class,'First_Semester_Save_M_E_Marks']);
Route::get('select/subject/final/midwifery/first{id}',[MidwiferyController::class,'First_Semester_Select_subject_final']);
Route::get('fill/final/marks/midwifery/first/{student_id}/{subject_id}',[MidwiferyController::class,'First_Semester_Fill_F_Marks']);
Route::post('save/student/final/marks/midwifery/first/{student_id}/{subject_id}',[MidwiferyController::class,'First_Semester_Save_F_Marks']);
Route::get('final/results/midwifery/first{id}',[MidwiferyController::class,'First_Semester_Final_Results']);
Route::get('midwifery/pass/second{id}',[MidwiferyController::class,'Midwifery_Pass_Second']);
//Second Semester Students


Route::get('midwifery/second_semester',[MidwiferyController::class,'Second_Semester']);
Route::get('midwifery/second/mideterm_exam',[MidwiferyController::class,'Second_Semester_M_Exam_Marks']);
Route::get('midwifery/second/final_exam',[MidwiferyController::class,'Second_Semester_F_Exam_Marks']);
Route::get('midwifery/subjects/second',[MidwiferyController::class,'Second_Semester_Subjects']);
Route::get('midwifery/subjects/second/add',[MidwiferyController::class,'Second_Semester_Subject_Add']);
Route::post('midwifery/add/subject/second',[MidwiferyController::class,'Second_Semester_Subject_Add_New'])->name('add.subject.midwifery.second');
Route::get('select/subject/midwifery/second{id}',[MidwiferyController::class,'Second_Select_subject']);
Route::get('AddMideterm/midwifery/second/{student_id}/{subject_id}',[MidwiferyController::class,'Second_S_Fill_M_E_Marks'])->name('AddMideterm.midwifery.second');
Route::post('save/mideterm/marks/midwifery/second{id}',[MidwiferyController::class,'Second_Semester_Save_M_E_Marks']);
Route::get('select/subject/final/midwifery/second{id}',[MidwiferyController::class,'Second_Semester_Select_subject_final']);
Route::get('fill/final/marks/midwifery/second/{student_id}/{subject_id}',[MidwiferyController::class,'Second_Semester_Fill_F_Marks']);
Route::post('save/student/final/marks/midwifery/second/{student_id}/{subject_id}',[MidwiferyController::class,'Second_Semester_Save_F_Marks']);
Route::get('final/results/midwifery/second{id}',[MidwiferyController::class,'Second_Semester_Final_Results']);
Route::get('midwifery/pass/third{id}',[MidwiferyController::class,'Midwifery_Pass_Third']);
//Third Semester Students

Route::get('midwifery/third_semester',[MidwiferyController::class,'Third_Semester']);
Route::get('midwifery/third/mideterm_exam',[MidwiferyController::class,'Third_Semester_M_Exam_Marks']);
Route::get('midwifery/third/final_exam',[MidwiferyController::class,'Third_Semester_F_Exam_Marks']);
Route::get('midwifery/subjects/third',[MidwiferyController::class,'Third_Semester_Subjects']);
Route::get('midwifery/subjects/third/add',[MidwiferyController::class,'Third_Semester_Subject_Add']);
Route::post('midwifery/add/subject/third',[MidwiferyController::class,'Third_Semester_Subject_Add_New'])->name('add.subject.midwifery.third');
Route::get('select/subject/midwifery/third{id}',[MidwiferyController::class,'Third_Select_subject']);
Route::get('AddMideterm/midwifery/third/{student_id}/{subject_id}',[MidwiferyController::class,'Third_S_Fill_M_E_Marks'])->name('AddMideterm.midwifery.third');
Route::post('save/mideterm/marks/midwifery/third{id}',[MidwiferyController::class,'Third_Semester_Save_M_E_Marks']);
Route::get('select/subject/final/midwifery/third{id}',[MidwiferyController::class,'Third_Semester_Select_subject_final']);
Route::get('fill/final/marks/midwifery/third/{student_id}/{subject_id}',[MidwiferyController::class,'Third_Semester_Fill_F_Marks']);
Route::post('save/student/final/marks/midwifery/third/{student_id}/{subject_id}',[MidwiferyController::class,'Third_Semester_Save_F_Marks']);
Route::get('final/results/midwifery/third{id}',[MidwiferyController::class,'Third_Semester_Final_Results']);
Route::get('midwifery/pass/fourth{id}',[MidwiferyController::class,'Midwifery_Pass_Fourth']);

//Fourth Semester Students


Route::get('midwifery/fourth_semester',[MidwiferyController::class,'Fourth_Semester']);
Route::get('midwifery/fourth/mideterm_exam',[MidwiferyController::class,'Fourth_Semester_M_Exam_Marks']);
Route::get('midwifery/fourth/final_exam',[MidwiferyController::class,'Fourth_Semester_F_Exam_Marks']);
Route::get('midwifery/subjects/fourth',[MidwiferyController::class,'Fourth_Semester_Subjects']);
Route::get('midwifery/subjects/fourth/add',[MidwiferyController::class,'Fourth_Semester_Subject_Add']);
Route::post('midwifery/add/subject/fourth',[MidwiferyController::class,'Fourth_Semester_Subject_Add_New'])->name('add.subject.midwifery.fourth');
Route::get('select/subject/midwifery/fourth{id}',[MidwiferyController::class,'Fourth_Select_subject']);
Route::get('AddMideterm/midwifery/fourth/{student_id}/{subject_id}',[MidwiferyController::class,'Fourth_S_Fill_M_E_Marks'])->name('AddMideterm.midwifery.fourth');
Route::post('save/mideterm/marks/midwifery/fourth{id}',[MidwiferyController::class,'Fourth_Semester_Save_M_E_Marks']);
Route::get('select/subject/final/midwifery/fourth{id}',[MidwiferyController::class,'Fourth_Semester_Select_subject_final']);
Route::get('fill/final/marks/midwifery/fourth/{student_id}/{subject_id}',[MidwiferyController::class,'Fourth_Semester_Fill_F_Marks']);
Route::post('save/student/final/marks/midwifery/fourth/{student_id}/{subject_id}',[MidwiferyController::class,'Fourth_Semester_Save_F_Marks']);
Route::get('final/results/midwifery/fourth{id}',[MidwiferyController::class,'Fourth_Semester_Final_Results']);
Route::get('midwifery/pass/graduate{id}',[MidwiferyController::class,'Midwifery_Pass_Graduate']);

// Prothess Department Students
//First Semester Students
Route::get('student/prothess',[ProthessController::class,'Index']);
Route::get('prothess/teachers',[ProthessController::class,'Teachers']);
Route::post('student/p_search',[ProthessController::class,'Search']);
Route::get('prothess/first_semester',[ProthessController::class,'First_Semester']);
Route::get('prothess/first/mideterm_exam',[ProthessController::class,'First_Semester_M_Exam_Marks']);
Route::get('prothess/first/final_exam',[ProthessController::class,'First_Semester_F_Exam_Marks']);
Route::get('prothess/subjects/first',[ProthessController::class,'First_Semester_Subjects']);
Route::get('prothess/subjects/first/add',[ProthessController::class,'First_Semester_Subject_Add']);
Route::post('prothess/add/subject/first',[ProthessController::class,'First_Semester_Subject_Add_New'])->name('add.subject.prothess.first');
Route::get('select/subject/prothess/first{id}',[ProthessController::class,'First_Select_subject']);
Route::get('AddMideterm/prothess/first/{student_id}/{subject_id}',[ProthessController::class,'First_S_Fill_M_E_Marks'])->name('AddMideterm.prothess.first');
Route::post('save/mideterm/marks/prothess/first{id}',[ProthessController::class,'First_Semester_Save_M_E_Marks']);
Route::get('select/subject/final/prothess/first{id}',[ProthessController::class,'First_Semester_Select_subject_final']);
Route::get('fill/final/marks/prothess/first/{student_id}/{subject_id}',[ProthessController::class,'First_Semester_Fill_F_Marks']);
Route::post('save/student/final/marks/prothess/first/{student_id}/{subject_id}',[ProthessController::class,'First_Semester_Save_F_Marks']);
Route::get('final/results/prothess/first{id}',[ProthessController::class,'First_Semester_Final_Results']);
Route::get('prothess/pass/second{id}',[ProthessController::class,'Prothess_Pass_Second']);
//Second Semester Students

Route::get('prothess/second_semester',[ProthessController::class,'Second_Semester']);
Route::get('prothess/second/mideterm_exam',[ProthessController::class,'Second_Semester_M_Exam_Marks']);
Route::get('prothess/second/final_exam',[ProthessController::class,'Second_Semester_F_Exam_Marks']);
Route::get('prothess/subjects/second',[ProthessController::class,'Second_Semester_Subjects']);
Route::get('prothess/subjects/second/add',[ProthessController::class,'Second_Semester_Subject_Add']);
Route::post('prothess/add/subject/second',[ProthessController::class,'Second_Semester_Subject_Add_New'])->name('add.subject.prothess.second');
Route::get('select/subject/prothess/second{id}',[ProthessController::class,'Second_Select_subject']);
Route::get('AddMideterm/prothess/second/{student_id}/{subject_id}',[ProthessController::class,'Second_S_Fill_M_E_Marks'])->name('AddMideterm.prothess.second');
Route::post('save/mideterm/marks/prothess/second{id}',[ProthessController::class,'Second_Semester_Save_M_E_Marks']);
Route::get('select/subject/final/prothess/second{id}',[ProthessController::class,'Second_Semester_Select_subject_final']);
Route::get('fill/final/marks/prothess/second/{student_id}/{subject_id}',[ProthessController::class,'Second_Semester_Fill_F_Marks']);
Route::post('save/student/final/marks/prothess/second/{student_id}/{subject_id}',[ProthessController::class,'Second_Semester_Save_F_Marks']);
Route::get('final/results/prothess/second{id}',[ProthessController::class,'Second_Semester_Final_Results']);
Route::get('prothess/pass/third{id}',[ProthessController::class,'Prothess_Pass_Third']);
//Third Semester Students

Route::get('prothess/third_semester',[ProthessController::class,'Third_Semester']);
Route::get('prothess/third/mideterm_exam',[ProthessController::class,'Third_Semester_M_Exam_Marks']);
Route::get('prothess/third/final_exam',[ProthessController::class,'Third_Semester_F_Exam_Marks']);
Route::get('prothess/subjects/third',[ProthessController::class,'Third_Semester_Subjects']);
Route::get('prothess/subjects/third/add',[ProthessController::class,'Third_Semester_Subject_Add']);
Route::post('prothess/add/subject/third',[ProthessController::class,'Third_Semester_Subject_Add_New'])->name('add.subject.prothess.third');
Route::get('select/subject/prothess/third{id}',[ProthessController::class,'Third_Select_subject']);
Route::get('AddMideterm/prothess/third/{student_id}/{subject_id}',[ProthessController::class,'Third_S_Fill_M_E_Marks'])->name('AddMideterm.prothess.third');
Route::post('save/mideterm/marks/prothess/third{id}',[ProthessController::class,'Third_Semester_Save_M_E_Marks']);
Route::get('select/subject/final/prothess/third{id}',[ProthessController::class,'Third_Semester_Select_subject_final']);
Route::get('fill/final/marks/prothess/third/{student_id}/{subject_id}',[ProthessController::class,'Third_Semester_Fill_F_Marks']);
Route::post('save/student/final/marks/prothess/third/{student_id}/{subject_id}',[ProthessController::class,'Third_Semester_Save_F_Marks']);
Route::get('final/results/prothess/third{id}',[ProthessController::class,'Third_Semester_Final_Results']);
Route::get('prothess/pass/fourth{id}',[ProthessController::class,'Prothess_Pass_Fourth']);
//Fourth Semester Students

Route::get('prothess/fourth_semester',[ProthessController::class,'Fourth_Semester']);
Route::get('prothess/fourth/mideterm_exam',[ProthessController::class,'Fourth_Semester_M_Exam_Marks']);
Route::get('prothess/fourth/final_exam',[ProthessController::class,'Fourth_Semester_F_Exam_Marks']);
Route::get('prothess/subjects/fourth',[ProthessController::class,'Fourth_Semester_Subjects']);
Route::get('prothess/subjects/fourth/add',[ProthessController::class,'Fourth_Semester_Subject_Add']);
Route::post('prothess/add/subject/fourth',[ProthessController::class,'Fourth_Semester_Subject_Add_New'])->name('add.subject.prothess.fourth');
Route::get('select/subject/prothess/fourth{id}',[ProthessController::class,'Fourth_Select_subject']);
Route::get('AddMideterm/prothess/fourth/{student_id}/{subject_id}',[ProthessController::class,'Fourth_S_Fill_M_E_Marks'])->name('AddMideterm.prothess.fourth');
Route::post('save/mideterm/marks/prothess/fourth{id}',[ProthessController::class,'Fourth_Semester_Save_M_E_Marks']);
Route::get('select/subject/final/prothess/fourth{id}',[ProthessController::class,'Fourth_Semester_Select_subject_final']);
Route::get('fill/final/marks/prothess/fourth/{student_id}/{subject_id}',[ProthessController::class,'Fourth_Semester_Fill_F_Marks']);
Route::post('save/student/final/marks/prothess/fourth/{student_id}/{subject_id}',[ProthessController::class,'Fourth_Semester_Save_F_Marks']);
Route::get('final/results/prothess/fourth{id}',[ProthessController::class,'Fourth_Semester_Final_Results']);
Route::get('prothess/pass/graduate{id}',[ProthessController::class,'Prothess_Pass_Graduate']);

//Anastizy Department Students
//First Semester Students
Route::get('student/anastizy',[AnastizyController::class,'Index']);
Route::get('anastizy/teachers',[AnastizyController::class,'Teachers']);
Route::post('student/p_search',[AnastizyController::class,'Search']);
Route::get('anastizy/first_semester',[AnastizyController::class,'First_Semester']);
Route::get('anastizy/first/mideterm_exam',[AnastizyController::class,'First_Semester_M_Exam_Marks']);
Route::get('anastizy/first/final_exam',[AnastizyController::class,'First_Semester_F_Exam_Marks']);
Route::get('anastizy/subjects/first',[AnastizyController::class,'First_Semester_Subjects']);
Route::get('anastizy/subjects/first/add',[AnastizyController::class,'First_Semester_Subject_Add']);
Route::post('anastizy/add/subject/first',[AnastizyController::class,'First_Semester_Subject_Add_New'])->name('add.subject.anastizy.first');
Route::get('select/subject/anastizy/first{id}',[AnastizyController::class,'First_Select_subject']);
Route::get('AddMideterm/anastizy/first/{student_id}/{subject_id}',[AnastizyController::class,'First_S_Fill_M_E_Marks'])->name('AddMideterm.anastizy.first');
Route::post('save/mideterm/marks/anastizy/first{id}',[AnastizyController::class,'First_Semester_Save_M_E_Marks']);
Route::get('select/subject/final/anastizy/first{id}',[AnastizyController::class,'First_Semester_Select_subject_final']);
Route::get('fill/final/marks/anastizy/first/{student_id}/{subject_id}',[AnastizyController::class,'First_Semester_Fill_F_Marks']);
Route::post('save/student/final/marks/anastizy/first/{student_id}/{subject_id}',[AnastizyController::class,'First_Semester_Save_F_Marks']);
Route::get('final/results/anastizy/first{id}',[AnastizyController::class,'First_Semester_Final_Results']);
Route::get('anastizy/pass/second{id}',[AnastizyController::class,'Anastizy_Pass_Second']);

//Second Semester Students


Route::get('anastizy/second_semester',[AnastizyController::class,'Second_Semester']);
Route::get('anastizy/second/mideterm_exam',[AnastizyController::class,'Second_Semester_M_Exam_Marks']);
Route::get('anastizy/second/final_exam',[AnastizyController::class,'Second_Semester_F_Exam_Marks']);
Route::get('anastizy/subjects/second',[AnastizyController::class,'Second_Semester_Subjects']);
Route::get('anastizy/subjects/second/add',[AnastizyController::class,'Second_Semester_Subject_Add']);
Route::post('anastizy/add/subject/second',[AnastizyController::class,'Second_Semester_Subject_Add_New'])->name('add.subject.anastizy.second');
Route::get('select/subject/anastizy/second{id}',[AnastizyController::class,'Second_Select_subject']);
Route::get('AddMideterm/anastizy/second/{student_id}/{subject_id}',[AnastizyController::class,'Second_S_Fill_M_E_Marks'])->name('AddMideterm.anastizy.second');
Route::post('save/mideterm/marks/anastizy/second{id}',[AnastizyController::class,'Second_Semester_Save_M_E_Marks']);
Route::get('select/subject/final/anastizy/second{id}',[AnastizyController::class,'Second_Semester_Select_subject_final']);
Route::get('fill/final/marks/anastizy/second/{student_id}/{subject_id}',[AnastizyController::class,'Second_Semester_Fill_F_Marks']);
Route::post('save/student/final/marks/anastizy/second/{student_id}/{subject_id}',[AnastizyController::class,'Second_Semester_Save_F_Marks']);
Route::get('final/results/anastizy/second{id}',[AnastizyController::class,'Second_Semester_Final_Results']);
Route::get('anastizy/pass/third{id}',[AnastizyController::class,'Anastizy_Pass_Third']);

//Third Semester Students


Route::get('anastizy/third_semester',[AnastizyController::class,'Third_Semester']);
Route::get('anastizy/third/mideterm_exam',[AnastizyController::class,'Third_Semester_M_Exam_Marks']);
Route::get('anastizy/third/final_exam',[AnastizyController::class,'Third_Semester_F_Exam_Marks']);
Route::get('anastizy/subjects/third',[AnastizyController::class,'Third_Semester_Subjects']);
Route::get('anastizy/subjects/third/add',[AnastizyController::class,'Third_Semester_Subject_Add']);
Route::post('anastizy/add/subject/third',[AnastizyController::class,'Third_Semester_Subject_Add_New'])->name('add.subject.anastizy.third');
Route::get('select/subject/anastizy/third{id}',[AnastizyController::class,'Third_Select_subject']);
Route::get('AddMideterm/anastizy/third/{student_id}/{subject_id}',[AnastizyController::class,'Third_S_Fill_M_E_Marks'])->name('AddMideterm.anastizy.third');
Route::post('save/mideterm/marks/anastizy/third{id}',[AnastizyController::class,'Third_Semester_Save_M_E_Marks']);
Route::get('select/subject/final/anastizy/third{id}',[AnastizyController::class,'Third_Semester_Select_subject_final']);
Route::get('fill/final/marks/anastizy/third/{student_id}/{subject_id}',[AnastizyController::class,'Third_Semester_Fill_F_Marks']);
Route::post('save/student/final/marks/anastizy/third/{student_id}/{subject_id}',[AnastizyController::class,'Third_Semester_Save_F_Marks']);
Route::get('final/results/anastizy/third{id}',[AnastizyController::class,'Third_Semester_Final_Results']);
Route::get('anastizy/pass/fourth{id}',[AnastizyController::class,'Anastizy_Pass_Fourth']);

//Fourth semester Students

Route::get('anastizy/fourth_semester',[AnastizyController::class,'Fourth_Semester']);
Route::get('anastizy/fourth/mideterm_exam',[AnastizyController::class,'Fourth_Semester_M_Exam_Marks']);
Route::get('anastizy/fourth/final_exam',[AnastizyController::class,'Fourth_Semester_F_Exam_Marks']);
Route::get('anastizy/subjects/fourth',[AnastizyController::class,'Fourth_Semester_Subjects']);
Route::get('anastizy/subjects/fourth/add',[AnastizyController::class,'Fourth_Semester_Subject_Add']);
Route::post('anastizy/add/subject/fourth',[AnastizyController::class,'Fourth_Semester_Subject_Add_New'])->name('add.subject.anastizy.fourth');
Route::get('select/subject/anastizy/fourth{id}',[AnastizyController::class,'Fourth_Select_subject']);
Route::get('AddMideterm/anastizy/fourth/{student_id}/{subject_id}',[AnastizyController::class,'Fourth_S_Fill_M_E_Marks'])->name('AddMideterm.anastizy.fourth');
Route::post('save/mideterm/marks/anastizy/fourth{id}',[AnastizyController::class,'Fourth_Semester_Save_M_E_Marks']);
Route::get('select/subject/final/anastizy/fourth{id}',[AnastizyController::class,'Fourth_Semester_Select_subject_final']);
Route::get('fill/final/marks/anastizy/fourth/{student_id}/{subject_id}',[AnastizyController::class,'Fourth_Semester_Fill_F_Marks']);
Route::post('save/student/final/marks/anastizy/fourth/{student_id}/{subject_id}',[AnastizyController::class,'Fourth_Semester_Save_F_Marks']);
Route::get('final/results/anastizy/fourth{id}',[AnastizyController::class,'Fourth_Semester_Final_Results']);
Route::get('anastizy/pass/graduate{id}',[AnastizyController::class,'Anastizy_Pass_Graduate']);






//   Technology Department
//////     First Semester Students
Route::get('student/technology',[StudentController::class,'T_Index']);
Route::get('technology/teachers',[StudentController::class,'T_Teachers']);
Route::post('student/t_search',[StudentController::class,'T_Search']);

Route::get('student/firstsemester',[StudentController::class,'First_Semester']);
Route::post('student/first/semester/search',[StudentController::class,'First_Semester_Student']);
Route::get('student/f_semester_profile{id}',[StudentController::class,'View_Profile']);
Route::get('student/mideterm_exam',[StudentController::class,'F_T_M_Exam_Marks']);
Route::get('student/final_exam',[StudentController::class,'F_T_F_Exam_Marks']);
Route::get('technology/subjects',[StudentController::class,'Subjects']);
Route::get('technology/subjects/add',[StudentController::class,'Subject_Add']);
Route::post('technology/add/subject',[StudentController::class,'Subject_Add_New'])->name('add.subject');
// Route::get('add/mideterm/marks{id}{idi}',[StudentController::class,'Fill_M_E_Marks'])->name('add.mideterm');
Route::get('AddMideterm/first/{student_id}/{subject_id}',[StudentController::class,'Fill_M_E_Marks'])->name('AddMideterm.First');
Route::post('save/mideterm/marks{id}',[StudentController::class,'Save_M_E_Marks']);
Route::get('select/subject{id}',[StudentController::class,'Select_subject']);
Route::get('select/subject/final{id}',[StudentController::class,'Select_subject_final']);
Route::get('fill/final/marks/{student_id}/{subject_id}',[StudentController::class,'Fill_F_Marks']);
Route::post('save/student/final/marks/{student_id}/{subject_id}',[StudentController::class,'Save_F_Marks']);
Route::get('final/results{id}',[StudentController::class,'Final_Results']);
Route::get('final/results/all',[StudentController::class,'Final_Results_All']);
Route::get('pass/second{id}',[StudentController::class,'Pass_Second']);
Route::get('pass/third{id}',[StudentController::class,'Pass_Third']);
Route::get('pass/fourth{id}',[StudentController::class,'Pass_Fourth']);
Route::get('pass/graduate{id}',[StudentController::class,'Graduate']);

/////////////Second Semester Students
Route::get('student/second_semester',[StudentController::class,'Second_Semester']);
Route::get('student/second/mideterm_exam',[StudentController::class,'S_T_M_Exam_Marks']);
Route::get('student/second/final_exam',[StudentController::class,'S_T_F_Exam_Marks']);
Route::get('technology/subjects/second',[StudentController::class,'Second_Semester_Subjects']);
Route::get('technology/subjects/second/add',[StudentController::class,'Second_Semester_Subject_Add']);
Route::post('technology/add/subject/second',[StudentController::class,'Second_Semester_Subject_Add_New'])->name('add.subject.second');
Route::get('select/subject/second{id}',[StudentController::class,'Second_Select_subject']);
Route::get('AddMideterm/{student_id}/{subject_id}',[StudentController::class,'Second_S_Fill_M_E_Marks'])->name('AddMideterm.Second');
Route::post('save/mideterm/marks/second{id}',[StudentController::class,'Second_Semester_Save_M_E_Marks']);
Route::get('select/subject/final/second{id}',[StudentController::class,'Second_Semester_Select_subject_final']);
Route::get('fill/final/marks/second/{student_id}/{subject_id}',[StudentController::class,'Second_Semester_Fill_F_Marks']);
Route::post('save/student/final/marks/second/{student_id}/{subject_id}',[StudentController::class,'Second_Semester_Save_F_Marks']);
Route::get('final/results/second{id}',[StudentController::class,'Second_Semester_Final_Results']);


//         Third Semester
Route::get('student/third_semester',[StudentController::class,'Third_Semester']);
Route::get('student/third/mideterm_exam',[StudentController::class,'T_T_M_Exam_Marks']);
Route::get('student/third/final_exam',[StudentController::class,'T_T_F_Exam_Marks']);
Route::get('technology/subjects/third',[StudentController::class,'Third_Semester_Subjects']);
Route::get('technology/subjects/third/add',[StudentController::class,'Third_Semester_Subject_Add']);
Route::post('technology/add/subject/third',[StudentController::class,'Third_Semester_Subject_Add_New'])->name('add.subject.third');
Route::get('select/subject/third{id}',[StudentController::class,'Third_Select_subject']);
Route::get('AddMideterm/third/{student_id}/{subject_id}',[StudentController::class,'Third_S_Fill_M_E_Marks'])->name('AddMideterm.Third');
Route::post('save/mideterm/marks/third{id}',[StudentController::class,'Third_Semester_Save_M_E_Marks']);
Route::get('select/subject/final/third{id}',[StudentController::class,'Third_Semester_Select_subject_final']);
Route::get('fill/final/marks/third/{student_id}/{subject_id}',[StudentController::class,'Third_Semester_Fill_F_Marks']);
Route::post('save/student/final/marks/third/{student_id}/{subject_id}',[StudentController::class,'Third_Semester_Save_F_Marks']);
Route::get('final/results/third{id}',[StudentController::class,'Third_Semester_Final_Results']);

//        Fourth Semester
Route::get('student/fourth_semester',[StudentController::class,'Fourth_Semester']);
Route::get('student/fourth/mideterm_exam',[StudentController::class,'Fr_T_M_Exam_Marks']);
Route::get('student/fourth/final_exam',[StudentController::class,'Fr_T_F_Exam_Marks']);
Route::get('technology/subjects/fourth',[StudentController::class,'Fourth_Semester_Subjects']);
Route::get('technology/subjects/fourth/add',[StudentController::class,'Fourth_Semester_Subject_Add']);
Route::post('technology/add/subject/fourth',[StudentController::class,'Fourth_Semester_Subject_Add_New'])->name('add.subject.fourth');
Route::get('select/subject/fourth{id}',[StudentController::class,'Fourth_Select_subject']);
Route::get('AddMideterm/fourth/{student_id}/{subject_id}',[StudentController::class,'Fourth_S_Fill_M_E_Marks'])->name('AddMideterm.Fourth');
Route::post('save/mideterm/marks/fourth{id}',[StudentController::class,'Fourth_Semester_Save_M_E_Marks']);
Route::get('select/subject/final/fourth{id}',[StudentController::class,'Fourth_Semester_Select_subject_final']);
Route::get('fill/final/marks/fourth/{student_id}/{subject_id}',[StudentController::class,'Fourth_Semester_Fill_F_Marks']);
Route::post('save/student/final/marks/fourth/{student_id}/{subject_id}',[StudentController::class,'Fourth_Semester_Save_F_Marks']);
Route::get('final/results/fourth{id}',[StudentController::class,'Fourth_Semester_Final_Results']);


//Graduated Students of Shifa institute Departments

//Graduated Students of Nursing Department

Route::get('student/graduated/nursing',[NursingController::class,'Graduated_Students']);
Route::post('student/graduated/nursing/y_search',[NursingController::class,'Find_Year']);
Route::post('student/graduated/nursing/n_search',[NursingController::class,'Find_Name']);
Route::get('student/nursing/view/record{id}',[NursingController::class,'View_Student_Record']);
Route::get('nursing/first_semester/record{id}',[NursingController::class,'View_Record_First']);
Route::get('nursing/second_semester/record{id}',[NursingController::class,'View_Record_Second']);
Route::get('nursing/third_semester/record{id}',[NursingController::class,'View_Record_Third']);
Route::get('nursing/fourth_semester/record{id}',[NursingController::class,'View_Record_Fourth']);
Route::get('nursing/fiveth_semester/record{id}',[NursingController::class,'View_Record_Fiveth']);
Route::get('nursing/sixth_semester/record{id}',[NursingController::class,'View_Record_Sixth']);

//Graduated Students of Technology Department

Route::get('student/graduated/technology',[StudentController::class,'Graduated_Students']);
Route::post('student/graduated/technology/y_search',[StudentController::class,'Find_Year']);
Route::post('student/graduated/technology/n_search',[StudentController::class,'Find_Name']);
Route::get('student/technology/view/record{id}',[StudentController::class,'View_Student_Record']);
Route::get('technology/first_semester/record{id}',[StudentController::class,'View_Record_First']);
Route::get('technology/second_semester/record{id}',[StudentController::class,'View_Record_Second']);
Route::get('technology/third_semester/record{id}',[StudentController::class,'View_Record_Third']);
Route::get('technology/fourth_semester/record{id}',[StudentController::class,'View_Record_Fourth']);
//Graduated Students of Prothess Department

Route::get('student/graduated/prothess',[ProthessController::class,'Graduated_Students']);
Route::post('student/graduated/prothess/y_search',[ProthessController::class,'Find_Year']);
Route::post('student/graduated/prothess/n_search',[ProthessController::class,'Find_Name']);
Route::get('student/prothess/view/record{id}',[ProthessController::class,'View_Student_Record']);
Route::get('prothess/first_semester/record{id}',[ProthessController::class,'View_Record_First']);
Route::get('prothess/second_semester/record{id}',[ProthessController::class,'View_Record_Second']);
Route::get('prothess/third_semester/record{id}',[ProthessController::class,'View_Record_Third']);
Route::get('prothess/fourth_semester/record{id}',[ProthessController::class,'View_Record_Fourth']);


//Graduated Students of Midwifery Department
Route::get('student/graduated/midwifery',[MidwiferyController::class,'Graduated_Students']);
Route::post('student/graduated/midwifery/y_search',[MidwiferyController::class,'Find_Year']);
Route::post('student/graduated/midwifery/n_search',[MidwiferyController::class,'Find_Name']);
Route::get('student/midwifery/view/record{id}',[MidwiferyController::class,'View_Student_Record']);
Route::get('midwifery/first_semester/record{id}',[MidwiferyController::class,'View_Record_First']);
Route::get('midwifery/second_semester/record{id}',[MidwiferyController::class,'View_Record_Second']);
Route::get('midwifery/third_semester/record{id}',[MidwiferyController::class,'View_Record_Third']);
Route::get('midwifery/fourth_semester/record{id}',[MidwiferyController::class,'View_Record_Fourth']);


//Graduated Students Of Anastizy Department
Route::get('student/graduated/anastizy',[AnastizyController::class,'Graduated_Students']);
Route::post('student/graduated/anastizy/y_search',[AnastizyController::class,'Find_Year']);
Route::post('student/graduated/anastizy/n_search',[AnastizyController::class,'Find_Name']);
Route::get('student/anastizy/view/record{id}',[AnastizyController::class,'View_Student_Record']);
Route::get('anastizy/first_semester/record{id}',[AnastizyController::class,'View_Record_First']);
Route::get('anastizy/second_semester/record{id}',[AnastizyController::class,'View_Record_Second']);
Route::get('anastizy/third_semester/record{id}',[AnastizyController::class,'View_Record_Third']);
Route::get('anastizy/fourth_semester/record{id}',[AnastizyController::class,'View_Record_Fourth']);


//Graduated Students Pharmicy Department
Route::get('student/graduated/pharmicy',[PharmicyController::class,'Graduated_Students']);
Route::post('student/graduated/pharmicy/y_search',[PharmicyController::class,'Find_Year']);
Route::post('student/graduated/pharmicy/n_search',[PharmicyController::class,'Find_Name']);
Route::get('student/pharmicy/view/record{id}',[PharmicyController::class,'View_Student_Record']);
Route::get('pharmicy/first_semester/record{id}',[PharmicyController::class,'View_Record_First']);
Route::get('pharmicy/second_semester/record{id}',[PharmicyController::class,'View_Record_Second']);
Route::get('pharmicy/third_semester/record{id}',[PharmicyController::class,'View_Record_Third']);
Route::get('pharmicy/fourth_semester/record{id}',[PharmicyController::class,'View_Record_Fourth']);

//          Session Routes

Route::get('session/add',[SessionController::class,'Add']);
Route::post('session/add',[SessionController::class,'Save'])->name('add.session');
Route::get('session/view',[SessionController::class,'All']);
Route::get('edit/session{id}',[SessionController::class,'Edit']);
Route::post('update/session{id}',[SessionController::class,'Update']);
Route::get('delete/session{id}',[SessionController::class,'Delete']);

//      Fees Routes
Route::get('fees/add',[FeesController::class,'Add']);
Route::post('fees/save',[FeesController::class,'Save'])->name('add.fees');
Route::get('fees/view',[FeesController::class,'View_Fees']);


//       Password Management
Route::get('change/password',[LoginController::class,'Change']);
Route::post('change/old/password{name}',[LoginController::class,'Change_Old']);
Route::get('add/new/user',[LoginController::class,'Add_New_User']);
Route::post('create/user',[LoginController::class,'Create_User'])->name('add.user');
Route::get('all/users',[LoginController::class,'All_Users']);
Route::get('delete/user{id}',[LoginController::class,'Delete_User']);
Route::get('reset/password',[LoginController::class,'Reset_View']);
Route::post('submit/email',[LoginController::class,'Check_Email']);
Route::post('submit/password',[LoginController::class,'Update_Password']);





