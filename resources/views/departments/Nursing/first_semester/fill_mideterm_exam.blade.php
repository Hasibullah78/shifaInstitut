@php
use App\Models\Department;
use App\Models\Student;
use App\Models\ExamMark;
use App\Models\Subject;

@endphp

@extends('admin.dashboard')
@section('main')
<div class="pcoded-main-container">
    <div class="pcoded-content">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <nav>
                                <li id="list" class="notprint"><a  href="{{ url('nursing/teachers') }}" class="btn btn-primary notprint">استادان</a></li>

                                <div class="dropdown notprint" id="list">
                                <button class="dropbtn btn btn-primary notprint" ><h5 class="notprint" style="color: white">محصلین</h5> </button>
                                <div class="dropdown-content notprint">
                                    <a href="{{ url('nursing/first_semester') }}">لومړی سمیستر</a>
                                    <a href=" {{ url('nursing/second_semester') }}">دوهم سمیستر</a>
                                    <a href="{{ url('nursing/third_semester') }}">دریم سمیستر</a>
                                    <a href="{{ url('nursing/fourth_semester') }}">څلورم سمیستر</a>
                                    <a href="{{ url('nursing/fiveth_semester') }}">پنځم سمیستر</a>
                                    <a href="{{ url('nursing/sixth_semester') }}">شپږم سمیستر</a>
                                </div>
                                </div>

                        </nav>
                    </div>
                    <div class="card-body" style="text-align: center">
                        <br>
                    <h3 class="text-c-blue">
                       عالی نرسنګ څانکه
                    </h3>
                    </div>
                </div>
            </div>
        </div>
        <div class="card">
            <div class="card-header" style="text-align: center">

            </div>
            <div class="card-body">


             </table>


                <div class="row">
                    <div class="col-md-8">

                    </div>

                    <div class="col-md-4">

                        <div class="dropdown mb-3 notprint" id="list">
                            <button class="dropbtn btn btn-primary mt-3" ><h5 style="color: white">ازموینو کټګوری</h5> </button>
                            <div class="dropdown-content">
                            <a href="{{ url('nursing/first/mideterm_exam') }}">منځنی ازموینه</a>
                            <a href="{{ url('nursing/first/final_exam') }}">  وروستی ازموینه </a>
                            </div>

                            </div>
                            <div class="dropdown mb-3 notprint" id="list">
                                <button class="dropbtn btn btn-primary mt-3" ><h5 style="color: white">مضامین</h5> </button>
                                <div class="dropdown-content">
                                <a href="{{ url('nursing/subjects/first') }}">ټول مضامین</a>
                                <a href="{{ url('nursing/subjects/first/add') }}">اضافه کول</a>
                                </div>

                                </div>

                        {{-- <a href="{{ url('student/exam_marks') }}" class="btn btn-primary mt-5 mr-5">Exam_Marks</a> --}}
                    </div>

                    {{-- <div class="col-md-3" >
                        <form action="{{ url('student/first/semester/search') }}" method="post">
                            @csrf
                        <div class="form-group">
                            <input  type="text" name="name" placeholder="حسیب الله" class="form-control notprint ml-3" style="">
                            <button type="submit" style="" class="btn btn-primary mt-2 ml-3  notprint">په نوم وپلټی</button>
                        </div>
               </form>

                    </div> --}}
                </div>



            <table class="table table-hover table-bordered"  dir="rtl">
                <thead>
                    {{-- <a href="{{ route('show.dep') }}">All</a> --}}
                    <tr>
<div class="row">
    <div class="col-md-3">

    </div>
    @if (session('success'))

    <div  class="alert alert-danger col-md-5" style="text-align: center" role="alert">
        <button type="button" class="close" data-dismiss="alert">×</button>
        {{ session('success') }}
    </div>

    @endif
</div>

                        <th scope="col tableTitles" style="text-align: center" id="center" >نوم</th>
                        <th scope="col tableTitles" style="text-align: center" id="center" >د پلار نوم</th>
                        <th scope="col tableTitles" style="text-align: center" id="center" > مضمون</th>

                        <th scope="col tableTitles" style="text-align: center" id="center">20%</th>

                        <th scope="col tableTitles" style="text-align: center" id="center">Action</th>



                    </tr>
                </thead>
                <tbody>
                 <form action="{{ url('save/mideterm/marks/nursing/first'.$subject->id) }}" method="POST">
                    @csrf
                    <input type="text" hidden name="student_id" value="{{ $student->id }}">
                    <tr>
                        <td style="text-align: center">{{ $student->std_name }}</td>
                        <td style="text-align: center">{{ $student->std_f_name }}</td>


                        <td style="text-align: center" >

                            @php
                            $subject=Subject::find($subject->id);
                            @endphp

                            <div class="form-group">
                                <select name="subject_id" style="text-align: center" id="" class="form-control">


                                            <option value="{{ $subject->id }}">{{ $subject->name }}</option>


                                        </select>
                            </div>


                            </td>
                            <td class="">

                                <div class="form-group">
                                    <input type="text" required style="text-align: center" name="mideterm_exam_marks" class="form-control">

                                </div>
                            </td>

                        <td style="text-align: center">
                            <button type="submit" class="btn btn-primary">نمری ثبت کړی</button>
                        </td>

                    </tr>
                 </form>



                </tbody>
            </table>


    <button class="notprint btn btn-primary mt-3"  onclick="print();">اسناد پرینټ کړی</button>

        </div>
    </div>

</div>
</div>
@endsection
