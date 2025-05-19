@php
use App\Models\Department;
use App\Models\Student;
@endphp

@extends('admin.dashboard')
@section('main')
<div class="pcoded-main-container">
    <div class="pcoded-content">
        <div class="row notprint">
            <div class="col-md-12 notprint">
                <div class="card" >
                    <div class="card-header">
                        <nav class="notprint">
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
                    <div class="card-body notprint" style="text-align: center">
                        <br>
                    <h3 class="text-c-blue">
                         انستیزی څانګه
                    </h3>
                    </div>
                </div>
            </div>
        </div>
               <form action="{{ url('student/a_search') }}" method="post">
                @csrf
                <div class="row">
                    <div class="col-md-9">

                    </div>
                    <div class="col-md-3" >
                        <div class="form-group">
                            <input  type="text" name="name" placeholder="حسیب الله" class="form-control notprint" style="">
                            <button type="submit" style="" class="btn btn-primary mt-2 ml-4 notprint">په نوم وپلټی</button>

                        </div>
                    </div>
                </div>

               </form>


            <table class="table table-hover table-bordered"  dir="rtl">
                <thead>
                    <tr><th colspan="9" style="text-align:center" > د انستیزي څانګی استادانو لیست</th></tr>
                    {{-- <a href="{{ route('show.dep') }}">All</a> --}}
                    <tr>
                        <th scope="col tableTitles"  style="text-align: center" id="center" >شماره</th>
                        <th scope="col tableTitles" style="text-align: center" id="center" >نوم</th>
                        <th scope="col tableTitles" style="text-align: center" id="center" >تخلص</th>

                        <th scope="col tableTitles" style="text-align: center" id="center">د پلار نوم</th>

                        <th scope="col tableTitles" style="text-align: center" id="center">موبایل شماره</th>
                        <th scope="col tableTitles" style="text-align: center" id="center">زده کړو کچه</th>
                        <th scope="col tableTitles" style="text-align: center" id="center">ولایت</th>

                        <th scope="col tableTitles" style="text-align: center" id="center">څانګه</th>
                        <th scope="col tableTitles" style="text-align: center" id="center">تصویر</th>

                    </tr>
                </thead>
                <tbody>

                    @foreach ($teachers as $teacher)
                    <tr >
                        <td style="text-align: center"   id="center">
                            {{ $teacher->id }}
                           </td>
                           {{-- class="tableTitles w-12" --}}
                        <td  style="text-align: center" id="center">
                              {{ $teacher->name }}

                    </td>
                        <td style="text-align:  center"  id="center">
                              {{ $teacher->l_name }}

                    </td>
                    <td style="text-align: center" id="center">
                        {{ $teacher->f_name }}
                    </td>
                     <td style="text-align: center" id="center">
                        {{ $teacher->phone }}
                    </td>
                    <td style="text-align: center"  id="center"  style="text-align: center">
                        {{ $teacher->rank }}
                    </td>
                    <td style="text-align: center"  id="center">
                        {{ $teacher->province }}
                    </td>
                    @php

                        $deps=Department::find($teacher->department_id);
                    @endphp
                    <td id="center" style="text-align: center" >
                        {{ $deps->name }}
                    </td>
                    <td id="center" style="text-align: center" >
                    <a href="{{ asset($teacher->image)  }}">
                        <img src="{{ asset($teacher->image) }}" alt="" width="20px">
                    </a>
                    </td>

                    @endforeach


                    </tr>

                </tbody>

            </table>

    <button class="notprint btn btn-primary mt-3 mb-4"  onclick="print();">اسناد پرینټ کړی</button>
   <div class="notprint">


   </div>

        </div>

    </div>

</div>
</div>
@endsection
