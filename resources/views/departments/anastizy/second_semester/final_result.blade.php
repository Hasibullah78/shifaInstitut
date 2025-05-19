@php
use App\Models\Subject;
use App\Models\ExamChances;
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
                                <li id="list" class="notprint"><a  href="{{ url('anastizy/teachers') }}" class="btn btn-primary notprint">استادان</a></li>

                                <div class="dropdown notprint" id="list">
                                <button class="dropbtn btn btn-primary notprint" ><h5 class="notprint" style="color: white">محصلین</h5> </button>
                                <div class="dropdown-content notprint">
                                    <a href="{{ url('anastizy/first_semester') }}">لومړی سمیستر</a>
                                    <a href=" {{ url('anastizy/second_semester') }}">دوهم سمیستر</a>
                                    <a href="{{ url('anastizy/third_semester') }}">دریم سمیستر</a>
                                    <a href="{{ url('anastizy/fourth_semester') }}">څلورم سمیستر</a>

                                </div>
                                </div>

                        </nav>
                    </div>
                    <div class="card-body" style="text-align: center">
                        <br>
                    <h3 class="text-c-blue">
                         پروتیز څانګه
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
                    {{-- <div class="col-md-2 mt-4 ">
                        <a href="{{ url('final/results/all') }}" class="btn btn-primary  ">وروستی پایلی</a>
                    </div> --}}

                    <div class="col-md-4">


                            <div class="dropdown mb-3 notprint" id="list">
                                <button class="dropbtn btn btn-primary mt-3" ><h5 style="color: white">مضــــــامـــــیــــــن</h5> </button>
                                <div class="dropdown-content" style="text-align: center">
                                    @foreach ($subjects as $subject)
                                <a href="{{ url('select/subject/final/anastizy/second'.$subject->id) }}">{{ $subject->name }}</a>

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
                        <th scope="col tableTitles" style="text-align: center" id="center" >د پلار نوم</th>
                        <th scope="col tableTitles" style="text-align: center" id="center" >سمیستر</th>
                        <th scope="col tableTitles" style="text-align: center" id="center" >څانګه</th>

                    </tr>
                </thead>
                <tbody>
@php
    $semester='';
    $student_id='';
@endphp
                    @foreach ($marks as $mark)
                    <tr>
                        <td style="text-align: center">{{ $mark->std_name}}</td>
                        <td style="text-align: center">{{ $mark->std_f_name}}</td>

                        <td style="text-align: center">{{ $mark->std_semester }}</td>
                        @php
                        $semester=$mark->std_semester;
                        $student_id=$mark->student_id;
                            $department=Department::find($mark->department_id);
                        @endphp
                        <td style="text-align: center">{{ $department->name }}</td>
                    </tr>
                    @break
                    @endforeach


                </tbody>
            </table>
            <table class="table table-hover table-bordered mt-5"  dir="rtl">
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
                        <th scope="col tableTitles"  style="text-align: center;" id="center"  rowspan="2">ګڼه</th>
                        <th scope="col tableTitles"  style="text-align: center;" id="center"  rowspan="2">مضمون</th>
                        <th scope="col tableTitles"  style="text-align: center;" id="center" >مضمون کوډ</th>
                        <th scope="col tableTitles"  style="text-align: center;" id="center" >کریډیتونو شمیر</th>

                        <th scope="col tableTitles" style="text-align: center; padding-bottom:35px" id="center" rowspan="2" > 10%</th>
                        <th scope="col tableTitles" style="text-align: center; padding-bottom:35px" id="center" rowspan="2"> 10%</th>
                        <th scope="col tableTitles" style="text-align: center" id="center">20%</th>
                        <th scope="col tableTitles" style="text-align: center; padding-bottom:35px" id="center"  rowspan="2">60%</th>
                        <th scope="col tableTitles" style="text-align: center" id="center" >100%</th>
                        <th scope="col tableTitles" style="text-align: center" id="center" >چانس</th>
                        <th scope="col tableTitles" style="text-align: center" id="center" rowspan="2">پایله</th>
                        <th scope="col tableTitles" style="text-align: center" id="center" rowspan="2">Grad</th>



                    </tr>
                </thead>
                <tbody>
                    @php
                        $a=1;
                        $final_marks=0;
                    @endphp

                    @foreach ($marks as $mark)

                    <tr>
                        <td style="text-align: center">{{ $a++ }}</td>
                        <td style="text-align: center">{{ $mark->name }}</td>
                        <td style="text-align: center">{{ $mark->subject_code }}</td>
                        <td style="text-align: center">{{ $mark->credit }}</td>



                        <td style="text-align: center" >
                         {{$mark->attendence_marks}}
                      </td>

                      <td>

                       {{$mark->class_talent_marks}}

                    </td>
                    <td style="text-align:center">


                           {{ $mark->mideterm_exam_marks }}

                    </td>
                    <td style="text-align: center">
                        {{ $mark->final_exam_marks }}
                    </td>
                    <td style="text-align: center">

                        {{ $mark->totale_marks }}


                    </td>
                    <td>
                        @php
                            $exam_chance=ExamChances::find($mark->exam_chance_id);
                        @endphp
                        {{ $exam_chance->chance_type }}
                    </td>

                <td style="text-align: center">





                    @if($mark->totale_marks>=50)
                    <span class=" text-primary">{{ $mark->passing_state }}</span>
                   @endif
                   @if($mark->totale_marks<50)
                   <span class=" text-danger" style="">{{ $mark->passing_state }}</span>

                   @endif


                </td>


                <td >

                     @if($mark->totale_marks>=90)
                    <span class=" text-primary">A</span>
                   @endif
                   @if($mark->totale_marks>=80 && $mark->totale_marks <90)
                   <span class=" text-primary" style="">B</span>

                   @endif
                   @if($mark->totale_marks>=70 && $mark->totale_marks <80)
                   <span class=" text-primary" style="">C</span>

                   @endif
                   @if($mark->totale_marks>=60 && $mark->totale_marks <70)
                   <span class=" text-primary" style="">D</span>

                   @endif
                   @if($mark->totale_marks>=50 && $mark->totale_marks <60)
                   <span class=" text-primary" style="">E</span>

                   @endif
                   @if($mark->totale_marks<50)
                   <span class=" text-danger" style="">F</span>

                   @endif

                </td>

                @php
                    $final_marks=$final_marks+$mark->totale_marks;

                @endphp

                 @endforeach
<tr>
    <td></td>
</tr>
<tr>
    <th colspan="3" style="text-align:center">ټولی نمری</th>
    <td colspan="2" style="text-align: center">{{ $final_marks }}</td>
    <th style="text-align: center " colspan="4">فیصدی</th>
    <td style="text-align: center" colspan="3">
   @if($final_marks==0)
   <span style="text-align: center" class=" text-c-red">No Result
</span>
   @endif
   @if($final_marks>0)
   {{
    $result=round($final_marks/--$a,1);
    }} <span style="">%
        </span>



</td>
</tr>
<tr>
    <td colspan="12" style="text-align: center">
        @if($result>=50)
        @if($semester=='first')
        <a href="{{ url('anastizy/pass/second'.$student_id) }}" class="btn btn-primary">Pass to second</a>
        @endif
        @if($semester=='second')
        <a href="{{ url('anastizy/pass/third'.$student_id) }}" class="btn btn-primary">Pass to Third</a>
        @endif
        @if($semester=='third')
        <a href="{{ url('anastizy/pass/fourth'.$student_id) }}" class="btn btn-primary">Pass to Fourth</a>
        @endif
        @if($semester=='fourth')
        <a href="{{ url('anastizy/pass/graduate'.$student_id) }}" class=" btn btn-primary">Graduate Student</a>
        @endif
        @endif
    @if($result<50)
        <span class=" text-danger">Impossible to pass next Semester</span>
    @endif
    @endif
    </td>
</tr>
                </tbody>
            </table>


    <button class="notprint btn btn-primary mt-3"  onclick="print();">اسناد پرینټ کړی</button>

        </div>
    </div>

</div>
</div>
@endsection
