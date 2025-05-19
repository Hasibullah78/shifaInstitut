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
            <div class="col-md-3">
                <div class="card" style="align-content: center">
                    <div class="card-header" style="text-align: center">محصل دهویت تصویر</div>
                    <div class="card-body">
                        <img style="border-radius:100%;" src="{{ asset($std_profile->image) }}" alt="Student Image" height="250">
                    </div>
                </div>
            </div>
         </div>
<div class="row mt-0">

    <div class="col-md-12" >
        <div class="card">
            <table class="table border-1 table-sm table-hover table-stripped d-print-table-row" style="font-size:12px;line-height: 1rem;s" dir="rtl">
                <thead class="bg-success text-bold">

                    {{-- <a href="{{ route('show.dep') }}">All</a> --}}
                    <tr dir="">
                        <th scope="col tableTitles" id="center" >نوم</th>
                        <th scope="col tableTitles" id="center">پلار نوم</th>
                        <th scope="col tableTitles" id="center">زیږیدو نیټه</th>
                        <th scope="col tableTitles" id="center">موبایل شماره</th>
                        <th scope="col tableTitles" id="center">ولایت</th>
                        <th scope="col tableTitles" id="center">ولسوالی</th>
                        <th scope="col tableTitles" id="center">کلی</th>

                    </tr>
                </thead>
                <tbody>


                    <tr >


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
            <table class="table border-1 table-sm table-hover table-stripped d-print-table-row" style="font-size:12px;line-height: 1rem;s" dir="rtl">
                <thead class="bg-success text-bold">

                    {{-- <a href="{{ route('show.dep') }}">All</a> --}}
                    <tr>
                        <th scope="col tableTitles" id="center">تذکری نمبر</th>
                        <th scope="col tableTitles" id="center">مکتب</th>
                        <th scope="col tableTitles" id="center">مکتب څخه فراغت کال</th>
                        <th scope="col tableTitles" id="center">څانګه</th>
                        <th scope="col tableTitles" id="center">کانکو مسلسل شمیره</th>
                        <th scope="col tableTitles" id="center">کانکور ای ډی</th>


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
                        {{ $std_profile->serial_number }}
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
