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
                                <li id="list"><a href="{{ url('technology/teachers') }}" class="btn btn-primary">استادان</a></li>

                                <div class="dropdown" id="list">
                                <button class="dropbtn btn btn-primary" ><h5 style="color: white">محصلین</h5> </button>
                                <div class="dropdown-content">
                                <a href="{{ url('student/firstsemester') }}">لومړی سمیستر</a>
                                <a href="#">دوهم سمیستر</a>
                                <a href="#">دریم سمیستر</a>
                                <a href="#">څلورم سمیستر</a>
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
               <form action="{{ url('student/t_search') }}" method="post">
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
                    <tr><th colspan="9" style="text-align:center" > د طبی تکنالوجی څانګی استادانو لیست</th></tr>
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
