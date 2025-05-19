@extends('admin.dashboard')
@section('main')
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



            <table class="table border-1">
                <thead>
                    {{-- <a href="{{ route('show.dep') }}">All</a> --}}
                    <tr>
                        <th scope="col tableTitles" id="center" >#No</th>
                        <th scope="col tableTitles" id="center" >Department Name</th>
                        {{-- <th scope="col tableTitles" id="center">Description</th> --}}
                        <th scope="col tableTitles" id="center">Action</th>

                    </tr>
                </thead>
                <tbody>

                    @foreach ($deps as $dep)
                    <tr >
                        <td  class="tableTitles w-25" id="center">
                            {{ $dep->id }}
                           </td>

                        <td  class="tableTitles w-25" id="center">
                         {{ $dep->name }}
                        </td>

                        {{-- <td class="tableTitles w-32" id="center">
                          {{ $dep->description }}
                        </td> --}}
                        <td class="tableTitles w-25" id="center">

                              <a href="{{ url('edit/dep'.$dep->id) }}" class="btn btn-primary" id="center"> Edit</a>
                                {{-- <a href="{{ url('delete/dep'.$dep->id) }}" onclick="return confirm('Do you agree to delete this record')"; class="btn btn-danger" id="center">Delete</a> --}}

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
