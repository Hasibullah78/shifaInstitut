@php
use App\Models\Subject;
use App\Models\Student;
use App\Models\ExamMark;
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
                                <li id="list" class="notprint"><a  href="{{ url('midwifery/teachers') }}" class="btn btn-primary notprint">استادان</a></li>

                                <div class="dropdown notprint" id="list">
                                <button class="dropbtn btn btn-primary notprint" ><h5 class="notprint" style="color: white">محصلین</h5> </button>
                                <div class="dropdown-content notprint">
                                    <a href="{{ url('midwifery/first_semester') }}">لومړی سمیستر</a>
                                    <a href=" {{ url('midwifery/second_semester') }}">دوهم سمیستر</a>
                                    <a href="{{ url('midwifery/third_semester') }}">دریم سمیستر</a>
                                    <a href="{{ url('midwifery/fourth_semester') }}">څلورم سمیستر</a>

                                </div>
                                </div>

                        </nav>
                    </div>
                    <div class="card-body" style="text-align: center">
                        <br>
                    <h3 class="text-c-blue">
                         قابلګی څانګه
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
                                <a href="{{ url('select/subject/final/midwifery/first'.$subject->id) }}">{{ $subject->name }}</a>

                                    @endforeach

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
                        <th scope="col tableTitles"  style="text-align: center;" id="center">ګڼه</th>
                        <th scope="col tableTitles" style="text-align: center" id="center" >نوم</th>
                        <th scope="col tableTitles" style="text-align: center" id="center" >د پلار نوم</th>
                        <th scope="col tableTitles" style="text-align: center" id="center" >وروستی پایلی</th>


                    </tr>
                </thead>
                <tbody>
                    @php
                        $a=1;
                    @endphp

                    @foreach ($students as $student)
                    <tr>
                        <td style="width: 100px ; text-align:center">{{ $a++ }}</td>
                        <td style="text-align: center">{{ $student->std_name }}</td>
                        <td style="text-align: center">{{ $student->std_f_name }}</td>
                        <td style="text-align: center"><a href="{{ url('final/results/midwifery/first'.$student->id) }}" class="btn btn-primary">View</a></td>

                    @endforeach


                </tbody>
            </table>


    <button class="notprint btn btn-primary mt-3"  onclick="print();">اسناد پرینټ کړی</button>

        </div>
    </div>

</div>
</div>
@endsection
