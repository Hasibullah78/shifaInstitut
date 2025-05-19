@php
use App\Models\Student;
use App\Models\Subject;
use App\Models\ExamChances;
use App\Models\ExamMark;

use App\Models\Department;
use Illuminate\Support\Facades\DB;
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
                                <li id="list" class="notprint"><a  href="{{ url('technology/teachers') }}" class="btn btn-primary notprint">استادان</a></li>

                                <div class="dropdown notprint" id="list">
                                <button class="dropbtn btn btn-primary notprint" ><h5 class="notprint" style="color: white">محصلین</h5> </button>
                                <div class="dropdown-content notprint">
                                    <a href="{{ url('student/firstsemester') }}">لومړی سمیستر</a>
                                    <a href="{{ url('student/second_semester') }}">دوهم سمیستر</a>
                                    <a href="{{ url('student/third_semester') }}">دریم سمیستر</a>
                                    <a href="{{ url('student/fourth_semester') }}">څلورم سمیستر</a>
                                </div>
                                </div>

                        </nav>
                    </div>
                    <div class="card-body" style="text-align: center">
                        <br>
                    <h3 class="text-c-blue">
                        طبی تکنالوجی څانګه
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
                                <button class="dropbtn btn btn-primary mt-3" ><h5 style="color: white">مضــــــامـــــیــــــن</h5> </button>
                                <div class="dropdown-content" style="text-align: center">
                                    @foreach ($subjects as $subject)
                                <a href="{{ url('select/subject/final'.$subject->id) }}">{{ $subject->name }}</a>

                                    @endforeach

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
                        <th scope="col tableTitles"  style="text-align: center;" id="center">نوم</th>
                        <th scope="col tableTitles"  style="text-align: center;" id="center">پلار نوم</th>
                        <th scope="col tableTitles"  style="text-align: center;" id="center">د ازموینی چانس</th>


                      @foreach ($subjects as $subject)
                        <th scope="col tableTitles"  style="text-align: center;" id="center">{{ $subject->name }}</th>


                      @endforeach

                    </tr>
                </thead>
                <tbody>


@php
    $a=0;
@endphp
                        @foreach ($marks as $marke)

                        <tr>

                        <td style="text-align: center" rowspan="3">{{ $marke->std_name }} </td>
                        <td style="text-align: center" rowspan="3">{{ $marke->std_f_name }} </td>
                        @php
                        $chance= ExamChances::find($marke->exam_chance_id);
                      @endphp
                                              <td>{{ $chance->chance_type }}</td>
                        @php
                            $ex_mark=ExamMark::all()->where('student_id',$marke->student_id);
                        @endphp
                        @foreach ($ex_mark as $e_m)
                        <td style="text-align: center">{{ $e_m->totale_marks }}</td>


                        @endforeach


                  <tr>
                    <td></td>
                    <td></td>
                    <td></td>
                  </tr>
                  <tr>
                    <td></td>
                  </tr>

                    </tr>
                    @break
                        @endforeach

                </tbody>
            </table>


    <button class="notprint btn btn-primary mt-3"  onclick="print();">اسناد پرینټ کړی</button>

        </div>
    </div>

</div>
</div>
@endsection
