@extends('admin.dashboard')
@section('main')
@php
    use App\Models\Department;
use App\Models\Session;
@endphp
<div class="pcoded-main-container">
    <div class="pcoded-content">
<div class="row">

    <div class="col-md-12" >

    <div class="card" style="background-color:rgb(207, 218, 253)">

        @if (session('success'))
        <div class="alert alert-success" role="alert">
            <button type="button" class="close" data-dismiss="alert">×</button>
            {{ session('success') }}
        </div>
        @endif
    </div>

        <div class="card">
            <form action="{{ url('update/session'.$session->id) }}" method="post">
                @csrf


            <table class="table border-1">
                <thead>
                    {{-- <a href="{{ route('show.dep') }}">All</a> --}}
                    <tr>
                        <th scope="col tableTitles" id="center" >#No</th>
                        <th scope="col tableTitles" id="center" >Session Category</th>
                        <th scope="col tableTitles" id="center">Session Start Time</th>
                        <th scope="col tableTitles" id="center">Sesstion End Time</th>
                        <th scope="col tableTitles" id="center">Related Department</th>





                    </tr>
                </thead>
                <tbody>


                    <tr >
                        <td  class="tableTitles w-12" id="center">

                            {{ $session->id }}

                           </td>

                        <td  class="tableTitles w-12" id="center">

                                <div class="form-group">

                                  <input type="text" style="text-align: center" name="session_category" value="{{ $session->session_category }}" class="form-control" id="exampleFormControlInput1">
                               @error('session_category')
                                   <span class=" text-danger">{{ $message }}</span>
                               @enderror
                                </div>


                        </td>


                          <td class="tableTitles w-25" id="center">
                            @php
                            $id=$session->department_id;
                               $departments= Department::all();
                            @endphp

                             <select style="text-align: center"  name="department" id="list" class="form-control byee" aria-placeholder="Position">


                                 @foreach ($departments as $department)
                                 <option id="shift1" value="{{ $department->id}}">{{ $department->name }}</option>
                                @endforeach
                             </select>


                          </td>


                    </tr>
                </tbody>
            </table>
            <div class="form-row">
                <div class="form-group col-md-12">
                    <div class="text-center"><button class="btn" type="submit" style="background-color: rgb(58, 117, 255)">Update Session</button></div>
                </div>
            </div>
            </form>


        </div>
    </div>
</div>
</div>
</div>
    @endsection
