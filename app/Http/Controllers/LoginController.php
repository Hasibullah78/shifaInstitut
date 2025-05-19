<?php

namespace App\Http\Controllers;

use App\Models\Login;
use App\Models\Student;
use App\Models\Teacher;
use Intervention\Image\Facades\Image;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use PhpParser\Node\Expr\FuncCall;
use PHPUnit\TextUI\XmlConfiguration\CodeCoverage\Report\Php;

class LoginController extends Controller
{
    public $user_profile='';
    public $user_name='';
    public function Login()
    {
        return view('login.login');
    }
    public function LogOut()
    {
        if(session()->has('image')){
            session()->pull('image');
            session()->pull('id');
        }
        if(session()->has('user')){
            session()->pull('user');
        }
        return view('login.login');
    }
    public function Check()
    {
        if(!session('user')){
            return view('login.login');
        }
        if(session('user')){
            $nur_teachers=Teacher::all()->where('department_id',1);
            $nur_students=Student::all()->where('marks','>',50)->where('department_id',1)->where('semester','!=','graduated');
            $par_teachers=Teacher::all()->where('department_id',2);
            $par_students=Student::all()->where('marks','>',50)->where('department_id',2)->where('semester','!=','graduated');
            $tec_teachers=Teacher::all()->where('department_id',3);
            $tec_students=Student::all()->where('marks','>',50)->where('department_id',3)->where('semester','!=','graduated');
            $mid_teachers=Teacher::all()->where('department_id',4);
            $mid_students=Student::all()->where('marks','>',50)->where('department_id',4)->where('semester','!=','graduated');
            $pro_teachers=Teacher::all()->where('department_id',5);
            $pro_students=Student::all()->where('marks','>',50)->where('department_id',5)->where('semester','!=','graduated');
            $ans_teachers=Teacher::all()->where('department_id',6);
            $ans_students=Student::all()->where('marks','>',50)->where('department_id',6)->where('semester','!=','graduated');

           return view("admin.welcome",compact('nur_teachers','nur_students','par_teachers','par_students','tec_teachers','tec_students','mid_teachers','mid_students','pro_teachers','pro_students','ans_teachers','ans_students'));
        }


    }
    public function CredintialCheck(Request $request)
    {

       $users=Login::all();
       foreach($users as $user){
        if($request->email==$user->email && $request->password==$user->password)
        {
            $image=$user->image;
            $user_name=$user->name;
            $id=$user->id;

            $request->session()->put('user',$user_name);
            $request->session()->put('image',$image);
            $request->session()->put('id',$id);
            // return session('id');

            $nur_teachers=Teacher::all()->where('department_id',1);
            $nur_students=Student::all()->where('marks','>',50)->where('department_id',1)->where('semester','!=','graduated');
            $par_teachers=Teacher::all()->where('department_id',2);
            $par_students=Student::all()->where('marks','>',50)->where('department_id',2)->where('semester','!=','graduated');
            $tec_teachers=Teacher::all()->where('department_id',3);
            $tec_students=Student::all()->where('marks','>',50)->where('department_id',3)->where('semester','!=','graduated');
            $mid_teachers=Teacher::all()->where('department_id',4);
            $mid_students=Student::all()->where('marks','>',50)->where('department_id',4)->where('semester','!=','graduated');
            $pro_teachers=Teacher::all()->where('department_id',5);
            $pro_students=Student::all()->where('marks','>',50)->where('department_id',5)->where('semester','!=','graduated');
            $ans_teachers=Teacher::all()->where('department_id',6);
            $ans_students=Student::all()->where('marks','>',50)->where('department_id',6)->where('semester','!=','graduated');

           return view("admin.welcome",compact('nur_teachers','nur_students','par_teachers','par_students','tec_teachers','tec_students','mid_teachers','mid_students','pro_teachers','pro_students','ans_teachers','ans_students'));
        }
    }

    return redirect()->to(Route('admin.login'))->with('success','Incorrect Password Or User_Name!');


}


    public function Dashboard(){
        if(!session('user')){
            return view('login.login');
        }
        $nur_teachers=Teacher::all()->where('department_id',1);
        $nur_students=Student::all()->where('marks','>',50)->where('department_id',1)->where('semester','!=','graduated');
        $par_teachers=Teacher::all()->where('department_id',2);
        $par_students=Student::all()->where('marks','>',50)->where('department_id',2)->where('semester','!=','graduated');
        $tec_teachers=Teacher::all()->where('department_id',3);
        $tec_students=Student::all()->where('marks','>',50)->where('department_id',3)->where('semester','!=','graduated');
        $mid_teachers=Teacher::all()->where('department_id',4);
        $mid_students=Student::all()->where('marks','>',50)->where('department_id',4)->where('semester','!=','graduated');
        $pro_teachers=Teacher::all()->where('department_id',5);
        $pro_students=Student::all()->where('marks','>',50)->where('department_id',5)->where('semester','!=','graduated');
        $ans_teachers=Teacher::all()->where('department_id',6);
        $ans_students=Student::all()->where('marks','>',50)->where('department_id',6)->where('semester','!=','graduated');

       return view("admin.welcome",compact('nur_teachers','nur_students','par_teachers','par_students','tec_teachers','tec_students','mid_teachers','mid_students','pro_teachers','pro_students','ans_teachers','ans_students'));
    }

    public function Change()
    {
        if(!session('user')){
            return view('login.login');
        }
        return view('password-management.change_password');
    }
    public function Change_Old(Request $request,$name)
    {
        if(!session('user')){
            return view('login.login');
        }
        $users=Login::all()->where('name',$name);
        foreach($users as $user){
        if($request->old_password==$user->password)
        {
            DB::table('logins')->where('name',$name)->update([
                'password'=>$request->new_password,
        ]);
           return redirect()->back()->with('success','User Credintial Updated Successfully');
        }
        }

        return redirect()->back()->with('success','Incorrect Password');

    }
    public function Add_New_User()
    {
        return view('password-management.add_user');
    }
    public function Create_User(Request $request){

        if(!session('user')){
            return view('login.login');
        }


        $user_img=$request->file('image');
        $name_gen=$request->name.time().".".$user_img->getClientOriginalExtension();
         Image::make($user_img)->resize(720,890)->save('user/image/'.$name_gen);
        $location_Path="user/image/".$name_gen;

        DB::table('logins')->insert(
            [
                'name'=>$request->name,
                'email'=>$request->user_name,
                'password'=>$request->password,
                'image'=>$location_Path,

            ]);
        return redirect()->back()->with('success','Registeration Done Successfully');

        // return 'User Created Successfully';
    }
    public function All_Users(){
        $users=Login::all();
        return view('password-management.all_users',compact('users'));
    }
    public function Delete_User($id)
    {
        $delete=Login::all()->find($id)->delete();
        return redirect()->to(Route('admin.login'))->with('success','User Deleted Successfully and Login Again');
    }
    public function Reset_View()
    {
        return view('password-management.reset_password');
    }

    public function Check_Email(Request $request)
    {


        $users=Login::all()->where('email',$request->email);
      $email=$request->email;
        if(!$users->isEmpty()){
            return view('password-management.reset_password_form',compact('email'));

            // return redirect()->to(Route('admin.login'))->with('success','This Email is not found!');

        }
        else
            return redirect()->to(Route('admin.login'))->with('success','This Email is not found!');
    }
    public function Update_Password(Request $request)
    {


        DB::table('logins')->where('email',$request->email)->update([
            'password'=>$request->password,
        ]);

         return redirect()->to(Route('admin.login'))->with('success','Password Updated Successfully!');

    }

}
