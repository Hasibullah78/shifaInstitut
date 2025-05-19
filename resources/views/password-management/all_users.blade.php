@extends('admin.dashboard')
@section('main')
<div class="pcoded-main-container">
    <div class="pcoded-content">

        <div class="row">

            <div class="col-md-2" >

            </div>
            <div class="col-md-8">
                <div class="card" style="background-color:rgb(207, 218, 253)">

                    @if (session('success'))
                    <div class="alert alert-success" role="alert">
                        <button type="button" class="close" data-dismiss="alert">×</button>
                        {{ session('success') }}
                    </div>
                    @endif

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
                                        <th scope="col tableTitles" id="center" >شماره</th>
                                        <th scope="col tableTitles" id="center" >نوم</th>
                                        <th scope="col tableTitles" id="center">User Name</th>


                                        <th scope="col tableTitles" id="center" >تصویر</th>

                                        <th scope="col tableTitles" id="center" style="text-align: center">Action</th>

                                    </tr>
                                </thead>
                                <tbody>
                @php
                    $a=1;
                @endphp
                                    @foreach ($users as $user)
                                    <tr >
                                        <td  class="tableTitles w-12" id="center">
                                            <div class="form-group mt-4">

                                            {{ $a++ }}
                                            </div>
                                           </td>



                                        <td  class="tableTitles w-12" id="center">
                                            <div class="form-group mt-4">
                                              {{ $user->name }}
                                           @error('session_category')
                                               <span class=" text-danger">{{ $message }}</span>
                                           @enderror
                                            </div>
                                    </td>
                                        <td  class="tableTitles w-12" id="center">
                                            <div class="form-group mt-4">
                                              {{-- <input type="time" disabled style="text-align: center" name="session_category" value="{{ $session->session_end_time }}" class="form-control" id="exampleFormControlInput1"> --}}
                                              {{ $user->email }}

                                            </div>
                                    </td>

                                    <td  class="tableTitles w-12" id="center">
                                        <img src="{{ asset($user->image) }}" alt="Student Image" height="95" width="90">
                                         </td>






                                         @if(session('id')==2)
                                            @if($a==2)
                                            <td class="tableTitles w-12" id="center" style="text-align: center">
                                                <a href="{{ url('student/f_semester_profile'.$user->id) }}" class="btn btn-primary mt-4 disabled" id="center">Admin</a>
                                        {{-- <a href="{{ url('delete/session'.$student->id) }}" onclick="return confirm('Do you agree to delete this record')"; class="btn btn-danger" id="center">Delete</a> --}}
                                        </td>
                                            @endif
                                            @if($a!=2)
                                            <td class="tableTitles w-12" id="center" style="text-align: center">
                                                <a href="{{ url('delete/user'.$user->id) }}" onclick="return confirm('Are you sure to delete?')" class="btn btn-primary mt-4" id="center">Delete</a>
                                        {{-- <a href="{{ url('delete/session'.$student->id) }}" onclick="return confirm('Do you agree to delete this record')"; class="btn btn-danger" id="center">Delete</a> --}}
                                              </td>
                                            @endif

                                         @endif


                                         @if(session('id')!=2)
                                            @if($a==2)
                                            <td class="tableTitles w-12" id="center" style="text-align: center">
                                                <a href="{{ url('student/f_semester_profile'.$user->id) }}" class="btn btn-primary mt-4 disabled" id="center">Admin</a>
                                        {{-- <a href="{{ url('delete/session'.$student->id) }}" onclick="return confirm('Do you agree to delete this record')"; class="btn btn-danger" id="center">Delete</a> --}}
                                        </td>
                                            @endif
                                            @if($a!=2)
                                            <td class="tableTitles w-12" id="center" style="text-align: center">
                                                <a href="{{ url('delete/user'.$user->id) }}" onclick="return confirm('Are you sure to delete?')" class="btn btn-primary mt-4 disabled" id="center">Delete</a>
                                        {{-- <a href="{{ url('delete/session'.$student->id) }}" onclick="return confirm('Do you agree to delete this record')"; class="btn btn-danger" id="center">Delete</a> --}}
                                              </td>
                                            @endif

                                         @endif




                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
            </div>

      </div>
    <script src="{{ asset('frontend/assets/bootstrap-4.0.0-dist/js/bootstrap.min.js') }}"></script>
@endsection
