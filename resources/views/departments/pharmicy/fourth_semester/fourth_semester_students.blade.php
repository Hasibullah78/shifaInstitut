
@php
use App\Models\Department;
use App\Models\Student;
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
                                <li id="list" class="notprint"><a  href="{{ url('pharmicy/teachers') }}" class="btn btn-primary notprint">استادان</a></li>

                                <div class="dropdown notprint" id="list">
                                <button class="dropbtn btn btn-primary notprint" ><h5 class="notprint" style="color: white">محصلین</h5> </button>
                                <div class="dropdown-content notprint">
                                    <a href="{{ url('pharmicy/first_semester') }}">لومړی سمیستر</a>
                                    <a href=" {{ url('pharmicy/second_semester') }}">دوهم سمیستر</a>
                                    <a href="{{ url('pharmicy/third_semester') }}">دریم سمیستر</a>
                                    <a href="{{ url('pharmicy/fourth_semester') }}">څلورم سمیستر</a>


                                </div>
                                </div>

                        </nav>
                    </div>
                    <div class="card-body" style="text-align: center">
                        <br>
                    <h3 class="text-c-blue">
                        فارمیسی څانګه
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
                            <a href="{{ url('pharmicy/fourth/mideterm_exam') }}">منځنی ازموینه</a>
                            <a href="{{ url('pharmicy/fourth/final_exam') }}">  وروستی ازموینه </a>
                            </div>

                            </div>
                            <div class="dropdown mb-3 notprint" id="list">
                                <button class="dropbtn btn btn-primary mt-3" ><h5 style="color: white">مضامین</h5> </button>
                                <div class="dropdown-content">
                                <a href="{{ url('pharmicy/subjects/fourth') }}">ټول مضامین</a>
                                <a href="{{ url('pharmicy/subjects/fourth/add') }}">اضافه کول</a>
                                </div>

                                </div>

                        {{-- <a href="{{ url('student/exam_marks') }}" class="btn btn-primary mt-5 mr-5">Exam_Marks</a> --}}
                    </div>
{{--
                    <div class="col-md-3" >
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
                        <th scope="col tableTitles"  style="text-align: center" id="center" >شماره</th>
                        <th scope="col tableTitles" style="text-align: center" id="center" >نوم</th>
                        <th scope="col tableTitles" style="text-align: center" id="center">د پلار نوم</th>
                        <th scope="col tableTitles" style="text-align: center" id="center">ولایت</th>
                        <th scope="col tableTitles" style="text-align: center" id="center">ولسوالی</th>
                        <th scope="col tableTitles" style="text-align: center" id="center" class="notprint">Action</th>

                    </tr>
                </thead>
                <tbody>
                    @php
                        $a=1;
                    @endphp
                    @foreach ($students as $student)
                    <tr >
                        <td style="text-align: center"   id="center">
                            {{ $a++ }}
                           </td>
                           {{-- class="tableTitles w-12" --}}
                        <td  style="text-align: center" id="center">
                              {{ $student->std_name }}

                    </td>
                        <td style="text-align:  center"  id="center">
                              {{ $student->std_f_name }}

                    </td>
                    <td style="text-align: center" id="center">
                        {{ $student->c_province }}
                    </td>
                     <td style="text-align: center" id="center">
                        {{ $student->c_district }}
                        </td>
                        <td style="text-align: center">
                            <a href="{{ url('student/f_semester_profile'.$student->id) }}" class="btn btn-primary notprint" style="text-align: center">View-Profile</a>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>


    <button class="notprint btn btn-primary mt-3"  onclick="print();">اسناد پرینټ کړی</button>

        </div>
    </div>

</div>
</div>
@endsection
