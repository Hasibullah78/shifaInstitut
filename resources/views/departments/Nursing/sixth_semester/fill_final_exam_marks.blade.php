@php
use App\Models\Subject;
use App\Models\Student;
use App\Models\ExamMark;
use Illuminate\Support\Facades\DB;
use App\Models\Department;
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


                <div class="row">
                    <div class="col-md-8">

                    </div>

                    <div class="col-md-4">


                        <div class="dropdown mb-3 notprint" id="list">
                            <button class="dropbtn btn btn-primary mt-3" ><h5 style="color: white">ازموینو کټګوری</h5> </button>
                            <div class="dropdown-content">
                                <a href="{{ url('nursing/sixth/mideterm_exam') }}">منځنی ازموینه</a>
                                <a href="{{ url('nursing/sixth/final_exam') }}">  وروستی ازموینه </a>
                            </div>

                            </div>

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


<div class="row">
<div class="col-md-2">

</div>
<div class="col-md-8">
    <table>

        <tr>

       <td class="w-25">
          <div >
           <img src="{{ asset('frontend/assets/logoes/logo2.jpg') }}" width="80" height="80" alt="">
          </div>
      </td>
          <td class="w-50">
              <div  style="text-align: center">
                  <b>د عامی روغتیا وزارت</b><br>
                  <b>د منابع بشری لوی ریاست</b><br>
                  <b>د خصوصی صحی علومو انستیتیوټونو ریاست</b><br>
                  <b>شفاء د طبی علومو انستیتیوت</b>

                  <br>
                  <br>
                  <br>



              </div>
          </td>

          <td class="w-50">
              <img style="float: right" src="{{ asset('frontend/assets/logoes/logo1.png') }}" width="80" height="80" alt="">

          </td>


          </div>

      </table>

</div>

</div>


  </div>
  <table>



  </table>
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

                        <th scope="col tableTitles"  style="text-align: center;" id="center"  rowspan="2">ګڼه</th>
                        <th scope="col tableTitles"  style="text-align: center;" id="center" colspan="2">پیژندنه</th>
                        <th scope="col tableTitles" style="text-align: center; padding-bottom:35px" id="center" rowspan="2" > 10%</th>
                        <th scope="col tableTitles" style="text-align: center; padding-bottom:35px" id="center" rowspan="2"> 10%</th>
                        <th scope="col tableTitles" style="text-align: center" id="center">20%</th>
                        <th scope="col tableTitles" style="text-align: center; padding-bottom:35px" id="center"  rowspan="2">60%</th>
                        <th scope="col tableTitles" style="text-align: center" id="center" colspan="2">100%</th>
                        <th scope="col tableTitles" style="text-align: center" id="center" rowspan="2">پایله</th>
                        <th scope="col tableTitles" style="text-align: center" id="center" rowspan="2">کتنی</th>


                        <tr>
                            <th scope="col tableTitles" style="text-align: center" id="center">نوم</th>
                            <th scope="col tableTitles" style="text-align: center" id="center" >د پلار نوم</th>
                            <th scope="col tableTitles" style="text-align: center" id="center">په عدد</th>
                            <th scope="col tableTitles" style="text-align: center" id="center">په عدد</th>
                            <th scope="col tableTitles" style="text-align: center" id="center">په تورو</th>




                        </tr>





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


                        <td style="text-align: center" >
                            @php
                            $markss=ExamMark::all()->where('student_id','==',$student->id)->where('subject_id','==',$subject->id);
                           @endphp
                           @foreach ($markss as $mark)
                               {{ $mark->attendence_marks }}
                           @endforeach
                      </td>

                      <td>

                        @foreach ($markss as $mark)
                        {{ $mark->class_talent_marks }}
                    @endforeach

                    </td>
                    <td style="text-align:center">

                        @php
                        $markss=ExamMark::all()->where('student_id','==',$student->id)->where('subject_id','==',$subject->id);
                       @endphp
                       @foreach ($markss as $mark)
                           {{ $mark->mideterm_exam_marks }}
                       @endforeach

                    </td>
                    <td style="text-align: center">
                         @foreach ($markss as $mark)
                        {{ $mark->final_exam_marks }}
                    @endforeach
                </td>
                    <td style="text-align: center">
                        @foreach ($markss as $mark)
                        {{ $mark->totale_marks }}

                    @endforeach
                    </td>
                    <td></td>
                    @php
                    $check_marks=ExamMark::all()->where('student_id',$student->id)->where('subject_id',$subject->id);
                @endphp
                <td style="text-align: center">
                    @foreach ($check_marks as $check)
                    @if($check->mideterm_exam_marks)
                    @if(!$check->final_exam_marks)
                    <a href="{{ url('fill/final/marks/nursing/sixth',['student_id'=>$student->id,'subject_id'=>$subject->id]) }}" class="btn btn-primary">Fill_Marks</a></td>
                    @endif

                    @if($check->final_exam_marks)

                    @if($check->totale_marks>=60)
                    <span class=" text-primary">{{ $mark->passing_state }}</span>
                   @endif
                   @if($check->totale_marks<60)
                   <span class=" text-danger" style="">{{ $mark->passing_state }}</span>
                </td>
                <td style="text-align: center">
                    <a href="{{ url('fill/final/marks/nursing/sixth',['student_id'=>$student->id,'subject_id'=>$subject->id]) }}" class="btn btn-primary">Fill_Marks</a></td>


                </td>
                   @endif

                    @endif
                    @endif
                    @endforeach
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
