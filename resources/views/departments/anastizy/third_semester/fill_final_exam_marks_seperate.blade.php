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


                <div class="row">


                    <div class="col-md-12">


                        <div class="dropdown mb-3 notprint" id="list">
                            <button class="dropbtn btn btn-primary mt-3" ><h5 style="color: white">ازموینو کټګوری</h5> </button>
                            <div class="dropdown-content">
                                <a href="{{ url('anastizy/third/mideterm_exam') }}">منځنی ازموینه</a>
                                <a href="{{ url('anastizy/third/final_exam') }}">  وروستی ازموینه </a>
                            </div>

                     </div>
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
<table class="table table-hover table-bordered" dir="rtl">
    <thead>
        <tr>
            <th style="text-align: center">نوم</th>
            <th style="text-align: center">د پلار نوم</th>
            <th style="text-align: center">حاضری </th>
            <th style="text-align: center">صنفی لیاقت</th>

            <th style="text-align: center">20%</th>
            <th style="text-align: center">60%</th>
            <th style="text-align: center">چانس کټګوری</th>

            <th style="text-align: center">Action</th>
        </tr>
    </thead>
    <tbody>
        <tr>

            <form action="{{ url('save/student/final/marks/anastizy/third',['student_id'=>$student->id,'subject_id'=>$subject->id]) }}" method="POST">
                @csrf
            <td style="text-align: center">{{ $student->std_name }}</td>
            <td style="text-align: center">{{ $student->std_f_name }}</td>
            <td>
            <div class="form-group">
                <input type="text" name="attendence" required class="form-control">
            </div>
            </td>
<td>
    <div class="form-group">

        <input type="text" dir="rtl" class="form-control" required name="class_talent"  placeholder="">

    </div>
</td>
<td>
    @php
        $mideterm_marks=ExamMark::all()->where('student_id','==',$student->id)->where('subject_id','==',$subject->id);
    @endphp
@foreach ($mideterm_marks as $mark)
    {{ $mark->mideterm_exam_marks }}
    <input type="text" hidden value="{{ $mark->mideterm_exam_marks }}" name="mideterm_exam_marks">
@endforeach
</td>
<td>
<div class="form-group">

    <input type="text" dir="rtl" required class="form-control" name="final_exam_marks"  placeholder="">

</div>
</td>
  <td style="text-align: center" >
                                <div class="form-group">
                                    <select name="chance_id" style="text-align: center" id="" class="form-control">
                                        @foreach ($chances as $chance)

                                                <option value="{{ $chance->id }}">{{ $chance->chance_type }}</option>
                                        @endforeach

                                            </select>
                                </div>
   </td>

<td>
    <button type="submit" class="btn btn-primary">ثبت کړی</button>
</td>
        </tr>
    </tbody>
</table>
</form>



    <button class="notprint btn btn-primary mt-3"  onclick="print();">اسناد پرینټ کړی</button>

        </div>
    </div>

</div>
</div>
@endsection
