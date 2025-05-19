@php
use App\Models\RegisteredStudent as ModelsRegisteredStudent;
use App\Models\Department;
@endphp

@extends('admin.dashboard')
@section('main')
<div class="pcoded-main-container">
    <div class="pcoded-content">
        <div class="card">
            <div class="card-header" style="text-align: center">
               <h4 style="color: rgb(68, 125, 247)"><b> Student Profile</b></h4>
            </div>
     </div>
         <div class="row mt-0">
            <div class="col-md-4">

            </div>
            <div class="col-md-4">
                <div class="card" style="align-content: center">
                    <div class="card-header">Student Image For for kankor Registeration </div>
                    <div class="card-body">
                        <img style="border-radius:100%;" src="{{ asset($std_profile->image) }}" alt="Student Image" height="250" width="290 ">
                    </div>
                </div>
            </div>
         </div>
<div class="row mt-0">

    <div class="col-md-12" >
        <div class="card">
            <table class="table border-1" >
                <thead>

                    {{-- <a href="{{ route('show.dep') }}">All</a> --}}
                    <tr>
                        <th scope="col tableTitles" id="center" >#No</th>
                        <th scope="col tableTitles" id="center" >Name</th>
                        <th scope="col tableTitles" id="center">F/Name</th>
                        <th scope="col tableTitles" id="center">Date of Birth</th>
                        <th scope="col tableTitles" id="center">Phone Number</th>
                        <th scope="col tableTitles" id="center">Province</th>
                        <th scope="col tableTitles" id="center">District</th>
                        <th scope="col tableTitles" id="center">Village</th>

                    </tr>
                </thead>
                <tbody>


                    <tr >
                        <td  class="tableTitles w-6" id="center">
                            {{ $std_profile->id }}
                        </td>

                        <td  class="tableTitles w-12" id="center">
                            <div class="form-group">
                              {{ $std_profile->std_name }}
                            </div>
                        </td>
                        <td  class="tableTitles w-12" id="center">
                            <div class="form-group">

                              {{ $std_profile->std_f_name }}

                            </div>
                    </td>
                    <td class="tableTitles w-12" id="center">
                        {{ $std_profile->dob }}
                    </td>
                    <td class="tableTitles w-12" id="center">
                        {{ $std_profile->phone }}
                    </td>
                    <td class="tableTitles w-12" id="center">
                          {{ $std_profile->o_province }}
                    </td>
                    <td class="tableTitles w-12" id="center">
                        {{ $std_profile->o_district }}
                   </td>
                   <td class="tableTitles w-12" id="center">
                    {{ $std_profile->o_vallage }}
                    </td>

                    </tr>

                </tbody>
            </table>
        </div>
    </div>
</div>
<div class="row mt-0">

    <div class="col-md-12" >
        <div class="card">
            <table class="table border-1">
                <thead>

                    {{-- <a href="{{ route('show.dep') }}">All</a> --}}
                    <tr>
                        <th scope="col tableTitles" id="center">NIC</th>
                        <th scope="col tableTitles" id="center">School</th>
                        <th scope="col tableTitles" id="center">Graduation Date</th>
                        <th scope="col tableTitles" id="center">Choosen Department</th>
                        <th scope="col tableTitles" id="center">Kankor-Reg_Number</th>
                        <th scope="col tableTitles" id="center">Kankor_ID</th>


                    </tr>
                </thead>
                <tbody>


                    <tr >
                        <td class="tableTitles w-12" id="center">
                            {{ $std_profile->nic }}
                         </td>

                        <td  class="tableTitles w-12" id="center">
                            <div class="form-group">
                              {{ $std_profile->school }}
                            </div>
                        </td>
                        <td  class="tableTitles w-12" id="center">
                            <div class="form-group">
                              {{ $std_profile->g_date }}

                            </div>
                    </td>
                    @php
                        $department=Department::find($std_profile->department_id);
                    @endphp
                    <td class="tableTitles w-12" id="center">
                        {{ $department->name}}
                    </td>
                    <td class="tableTitles w-12" id="center">
                        {{ $std_profile->exam_register_number }}
                    </td>
                    <td class="tableTitles w-12" id="center">
                          {{ $std_profile->exam_id }}
                    </td>
                    </tr>

                </tbody>
            </table>
        </div>
    </div>
</div>
</div>
</div>
@endsection
