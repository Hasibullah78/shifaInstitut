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
                      عالی نرسنګ څانګه
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
               {{-- <form action="{{ url('student/first/semester/search') }}" method="post">
                @csrf --}}
                <div class="row">
                    <div class="col-md-8">

                    </div>

                    <div class="col-md-4">

                        <div class="dropdown mb-3 notprint" id="list">
                            <button class="dropbtn btn btn-primary mt-3" ><h5 style="color: white">ازموینو کټګوری</h5> </button>
                            <div class="dropdown-content">
                                <a href="{{ url('nursing/third/mideterm_exam') }}">منځنی ازموینه</a>
                                <a href="{{ url('nursing/third/final_exam') }}">  وروستی ازموینه </a>
                            </div>

                            </div>
                            <div class="dropdown mb-3 notprint" id="list">
                                <button class="dropbtn btn btn-primary mt-3" ><h5 style="color: white">مضامین</h5> </button>
                                <div class="dropdown-content">
                                <a href="{{ url('nursing/subjects/third') }}">ټول مضامین</a>
                                <a href="{{ url('nursing/subjects/third/add') }}">اضافه کول</a>
                                </div>

                                </div>

                        {{-- <a href="{{ url('student/exam_marks') }}" class="btn btn-primary mt-5 mr-5">Exam_Marks</a> --}}
                    </div>

                    {{-- <div class="col-md-3" >
                        <div class="form-group">
                            <input  type="text" name="name" placeholder="حسیب الله" class="form-control notprint ml-3" style="">
                            <button type="submit" style="" class="btn btn-primary mt-2 ml-3  notprint">په نوم وپلټی</button>
                        </div>
                    </div> --}}
                </div>

               {{-- </form> --}}


            <table class="table table-hover table-bordered"  dir="rtl">
                <thead>
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
                    {{-- <a href="{{ route('show.dep') }}">All</a> --}}
                    <tr>
                        <th scope="col tableTitles"  style="text-align: center" id="center" >شماره</th>
                        <th scope="col tableTitles" style="text-align: center" id="center" >مضمون</th>
                        <th scope="col tableTitles" style="text-align: center" id="center">مضمون کود</th>
                        <th scope="col tableTitles" style="text-align: center" id="center">کریدیت</th>
                        <th scope="col tableTitles" style="text-align: center" id="center">سمیستر</th>
                        <th scope="col tableTitles" style="text-align: center" id="center">څانګه</th>


                    </tr>
                </thead>
                <tbody>
                    @php
                        $a=1;
                    @endphp
                    @foreach ($subjects as $subject)
                    <tr >
                        <td style="text-align: center"   id="center">
                            {{ $a++ }}
                           </td>
                           {{-- class="tableTitles w-12" --}}
                        <td  style="text-align: center" id="center">
                              {{ $subject->name }}

                    </td>
                        <td style="text-align:  center"  id="center">
                              {{ $subject->subject_code }}

                    </td>
                    <td style="text-align: center" id="center">
                        {{ $subject->credit }}
                    </td>
                     <td style="text-align: center" id="center">
                        {{ $subject->semester }}
                        </td>
                        <td style="text-align: center" id="center">
                            @php
                                $department=Department::find($subject->department_id);
                            @endphp
                            {{ $department->name}}
                            </td>
                        <td style="text-align: center">
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
