@php
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
            <table class="table border-1">
                <thead>
                    {{-- <a href="{{ route('show.dep') }}">All</a> --}}
                    <tr>
                        <th scope="col tableTitles" id="center" >#No</th>
                        <th scope="col tableTitles" id="center" >Photo</th>
                        <th scope="col tableTitles" id="center" >Name</th>
                        <th scope="col tableTitles" id="center">F/Name</th>
                        <th scope="col tableTitles" id="center">Phon#</th>


                        <th scope="col tableTitles" id="center" style="text-align: center">Action</th>

                    </tr>
                </thead>
                <tbody>

                    @foreach ($reg_stds as $student)
                    <tr >
                        <td  class="tableTitles " id="center">
                            {{ $student->id }}
                           </td>

                        <td  class="tableTitles " id="center">
                       <img src="{{ asset($student->image) }}" alt="Student Image" height="100px" width="150px">
                        </td>

                        <td  class="tableTitles" id="center">
                            <div class="form-group">
                              {{ $student->std_name }}
                           @error('session_category')
                               <span class=" text-danger">{{ $message }}</span>
                           @enderror
                            </div>
                    </td>
                        <td  class="tableTitles " id="center">
                            <div class="form-group">
                              {{-- <input type="time" disabled style="text-align: center" name="session_category" value="{{ $session->session_end_time }}" class="form-control" id="exampleFormControlInput1"> --}}
                              {{ $student->std_f_name }}

                            </div>
                    </td>
                    <td class="tableTitles " id="center">
                        {{ $student->phone }}

                                <td class="tableTitles w-32" id="center">
                                        {{-- <a href="{{ url('student/profile'.$student->id) }}" class="btn btn-primary" id="center">View</a> --}}
                                        <a href="{{ url('student/card'.$student->id) }}" class="btn btn-primary" id="center"> Generate Card</a>
                                        {{-- <a href="{{ url('student/profile'.$student->id) }}" class="btn btn-primary" id="center">Save</a> --}}
                                {{-- <a href="{{ url('delete/session'.$student->id) }}" onclick="return confirm('Do you agree to delete this record')"; class="btn btn-danger" id="center">Delete</a> --}}
                                </td>
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
