@php
use App\Models\Department;
use App\Models\Student;
@endphp

@extends('admin.dashboard')
@section('main')
<div class="pcoded-main-container">
    <div class="pcoded-content">
        <div class="card">
            <div class="card-header" style="text-align: center">
                <div class="row">
                 <table class="table table-hover">
                 <tr>
                   <td class="w-25">
                      <div>
                       <img src="{{ asset('frontend/assets/logoes/logo2.jpg') }}" width="80" height="80" alt="">
                      </div>
                  </td>
                      <td class="w-50">
                          <div  style="text-align: center">
                              <b>د عامی روغتیا وزارت</b><br>
                              <b>د خصوصی صحی علومو انستیتیوټونو ریاست</b><br>
                              <b>شفاء د روغتیایی علومو خصوصی انستیتیوت</b>
                              <b>د ۱۴۰۱ کال د جدید الشمول کانکور ازموینی بریالیو محصلینو لیست</b>
                              <br>
                              <br>
                              <br>
                          </div>
                      </td>
                      <td class="w-50">
                          <img style="float: right" src="{{ asset('frontend/assets/logoes/logo1.png') }}" width="80" height="80" alt="">
                      </td>

                  </tr>
             </div>
            </div>
            <div class="card-body">


             </table>
               <form action="{{ url('record/search') }}" method="post">
                @csrf
                <div class="row">
                    <div class="col-md-9">

                    </div>
                    <div class="col-md-3" >
                        <div class="form-group">
                            <input  type="text" name="r_date" placeholder="2023" class="form-control notprint" style="">
                            <button type="submit" style="" class="btn btn-primary mt-2 ml-4 notprint">Search by Year</button>
                        </div>
                    </div>
                </div>

               </form>


               <table class="table border-1 table-sm table-hover table-stripped d-print-table-row" style="font-size:12px;line-height: 1rem;s" dir="rtl">
                <thead class="bg-success text-bold">
                    {{-- <a href="{{ route('show.dep') }}">All</a> --}}
                    <tr>
                        <th scope="col tableTitles"  style="text-align: center" id="center" >شماره</th>
                        <th scope="col tableTitles" style="text-align: center" id="center" >نوم</th>
                        <th scope="col tableTitles" style="text-align: center" id="center">د پلار نوم</th>
                        <th scope="col tableTitles" style="text-align: center" id="center">ولایت</th>
                        <th scope="col tableTitles" style="text-align: center" id="center">ولسوالی</th>
                        <th scope="col tableTitles" style="text-align: center" id="center" >فراغت لیسه</th>
                        <th scope="col tableTitles" style="text-align: center" id="center">فراغت کال</th>
                        <th scope="col tableTitles" style="text-align: center" id="center">ID NO</th>
                        <th scope="col tableTitles" style="text-align: center" id="center">اخسبی نمری</th>
                        <th scope="col tableTitles" style="text-align: center" id="center">پایله</th>
                        <th scope="col tableTitles" style="text-align: center" id="center">څانګه</th>
                        <th scope="col tableTitles" style="text-align: center" id="center">کتنی</th>
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
                    <td style="text-align: center"  id="center"  style="text-align: center">
                        {{ $student->school }}
                    </td>
                    <td style="text-align: center"  id="center">
                        {{ $student->g_date }}
                    </td>
                    <td id="center" >
                        {{ $student->exam_id }}
                    </td>
                    <td style="text-align: center" id="center">
                        @if($student->marks)
                        {{ $student->marks }}
                        @endif
                        @if(!$student->marks)
                            <span class="text-danger">No Marks</span>
                        @endif
                    </td>
                    <td style="text-align: center" id="center">
                        @if($student->marks)
                            @if($student->marks>=50)
                                کامیاب
                            @endif
                            @if($student->marks<50)
                               @php
                                   Student::find($student->id)->delete();
                               @endphp
                               <span class="text-danger"> <small>Record is deleted</small> </span>
                            @endif
                        @endif
                    </td>
                    @php
                        $depart=Department::find($student->department_id);
                    @endphp
                    <td style="text-align: center" id="center">
                        {{ $depart->name}}
                    </td>
                       <td style="text-align: center" id="center">
                        @if(!$student->marks)
                        <form action="{{ url('register/student'.$student->id) }}" method="post" role="form" class="php-email-form" enctype="multipart/form-data">
                            @csrf
                            <a href="{{ url('fill/mark'.$student->id) }}" class="btn btn-primary notprint"><small>Fill Marks</small> </a>
                        @endif
                        </form>
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
