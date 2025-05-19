@php
use App\Models\Department;
use App\Models\RegisteredStudent as ModelsRegisteredStudent;
@endphp

@extends('admin.dashboard')
@section('main')
<div class="pcoded-main-container">
    <div class="pcoded-content">
        <div class="card">
            <div class="card-header" style="text-align: center">
               <h5 style="color: rgb(68, 125, 247)"><b>Kankor Exam Marks</b></h5>
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
                        <th scope="col tableTitles" id="center">د پلار نوم</th>
                        <th scope="col tableTitles" id="center">ولایت</th>
                        <th scope="col tableTitles" id="center">ولسوالی</th>
                        <th scope="col tableTitles" id="center">فراغت لیسه</th>
                        <th scope="col tableTitles" id="center">فراغت کال</th>
                        <th scope="col tableTitles" id="center">ID NO</th>
                        <th scope="col tableTitles" id="center" style="text-align:center">اخسبی نمری</th>
                        <th scope="col tableTitles" id="center">پایله</th>
                        <th scope="col tableTitles" id="center">څانګه</th>
                        <th scope="col tableTitles" id="center">کتنی</th>
                    </tr>
                </thead>
                <tbody>

                    @foreach ($students as $student)
                    <tr >
                        <td   id="center">
                            {{ $student->id }}
                           </td>
                           {{-- class="tableTitles w-12" --}}
                        <td   id="center">
                              {{ $student->std_name }}

                    </td>
                        <td  id="center">
                              {{ $student->std_f_name }}

                    </td>
                    <td id="center">
                        {{ $student->c_province }}
                    </td>
                     <td id="center">
                        {{ $student->c_district }}
                    </td>
                    <td id="center">
                        {{ $student->school }}
                    </td>
                    <td id="center">
                        {{ $student->g_date }}
                    </td>
                    <td id="center">
                        {{ $student->exam_id }}
                    </td>
                    <td id="center" style="text-align:center">
                        <form action="{{ url('save/mark'.$student->id) }}" method="post" role="form" class="php-email-form" enctype="multipart/form-data">
                            @csrf
                          <div class="form-group">
                            <input type="text" dir="ltr"  class="form-control text-center" name="obtain_marks">
                        </div>

                    </td>
                    <td id="center">

                    </td>
                    @php
                        $depart=Department::find($student->department_id);
                    @endphp
                    <td id="center">
                        {{ $depart->name}}
                    </td>
                       <td id="center">

                        <button type="submit" class="btn btn-primary">Save</button>

                </form>
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
