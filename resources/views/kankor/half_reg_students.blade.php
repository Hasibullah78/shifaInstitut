@php
use App\Models\Student;
use App\Models\Department;

use App\Models\RegisteredStudent as ModelsRegisteredStudent;
@endphp

@extends('admin.dashboard')
@section('main')
<div class="pcoded-main-container">
    <div class="pcoded-content">
        <div class="card">
            <div class="card-header" style="text-align: center">
               <h5 style="color: rgb(68, 125, 247)"><b>Registered Students For Kankor Exam</b></h5>
            </div>
         </div>
<div class="row mt-0">

    <div class="col-md-12" >
        <div class="card">
            <table class="table border-1 table-sm table-hover table-stripped d-print-table-row" style="font-size:12px;line-height: 1rem;s" dir="rtl">
                <thead class="bg-success text-bold">
                    {{-- <a href="{{ route('show.dep') }}">All</a> --}}
                    <tr>
                        <th scope="col tableTitles" id="center" >شماره</th>
                        <th scope="col tableTitles" id="center" >نوم</th>
                        <th scope="col tableTitles" id="center">پلار نوم</th>
                        <th scope="col tableTitles" id="center">تیلیفون شماره</th>
                        <th scope="col tableTitles" id="center">زیږیدنی تاریخ</th>
                        <th scope="col tableTitles" id="center">څانګه</th>

                        <th scope="col tableTitles" id="center" >تصویر</th>

                        <th scope="col tableTitles" id="center" style="text-align: center">Action</th>

                    </tr>
                </thead>
                <tbody>
@php
    $a=1;
@endphp
                    @foreach ($students as $student)
                    <tr >
                        <td  class="tableTitles w-12" id="center">
                            <div class="form-group mt-4">

                            {{ $a++ }}
                            </div>
                           </td>



                        <td  class="tableTitles w-12" id="center">
                            <div class="form-group mt-4">
                              {{ $student->std_name }}
                           @error('session_category')
                               <span class=" text-danger">{{ $message }}</span>
                           @enderror
                            </div>
                    </td>
                        <td  class="tableTitles w-12" id="center">
                            <div class="form-group mt-4">
                              {{-- <input type="time" disabled style="text-align: center" name="session_category" value="{{ $session->session_end_time }}" class="form-control" id="exampleFormControlInput1"> --}}
                              {{ $student->std_f_name }}

                            </div>
                    </td>
                    <td class="tableTitles w-12 mt-4" id="center">
                        <div class="form-group mt-4">

                        {{ $student->phone }}
                        </div>
                    </td>
                    <td class="tableTitles w-12 mt-4" id="center">
                        <div class="form-group mt-4">

                        {{ $student->dob }}
                        </div>
                    </td>
                    <td class="tableTitles w-12 mt-4" id="center">
                        <div class="form-group mt-4">
@php

$dep=Department::find($student->department_id);

@endphp
                        {{ $dep->name }}
                        </div>
                    </td>
                    <td  class="tableTitles w-12" id="center">
                        <img src="{{ asset($student->image) }}" alt="Student Image" height="95" width="90">
                         </td>

                    @if($student->exam_id==0)


                    <td class="tableTitles w-12" id="center" style="text-align: center">
                            <a href="{{ url('prove/students'.$student->id) }}" class="btn btn-primary mt-4" id="center"> Prove</a>
                    {{-- <a href="{{ url('delete/session'.$student->id) }}" onclick="return confirm('Do you agree to delete this record')"; class="btn btn-danger" id="center">Delete</a> --}}
                    </td>
                    @endif
                    @if($student->exam_id!=0)
                    <td class="tableTitles w-12" id="center" style="text-align: center">

                            <a href="{{ url('prove/students'.$student->id) }}" class="disabled btn btn-secondary mt-4" id="center"> Proved</a>

                            {{-- <li class="nav-item"><a class="nav-link disabled btn btn-secondary text-white" href="{{ url('prove/students'.$student->id) }}"  class="btn btn-success mt-4" id="center"> Proved</a></li> --}}
                        </ul>
                {{-- <a href="{{ url('delete/session'.$student->id) }}" onclick="return confirm('Do you agree to delete this record')"; class="btn btn-danger" id="center">Delete</a> --}}
                </td>
                    @endif


                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
</div>
</div>
@endsection
