@extends('admin.dashboard')
@section('main')
<div class="pcoded-main-container">
    <div class="pcoded-content">
            <div class="card">
                <div class="card-header" style="text-align: center">
                   <h3 style="color: rgb(68, 125, 247)"> Teacher Detailes</h3>
                </div>
               </div>
            <div class="row ">
                <div class="card col-md-3" >
                    <div class="card-body" style="text-align: center">


                @foreach ($techs as $tech)
                    <img style="border-radius:100%; " class="card-img-top" width="750" src="{{ asset($tech->image) }}" alt="Card image">

                      <h5 class="card-title"><strong>Name: </strong>{{ $tech->name }}</h5>
                      <h5 class="card-text"><strong>Last Name: </strong>{{ $tech->l_name }}</h5>
                      {{-- <h5 class="card-text"><strong>Father Name: </strong>{{ $tech->f_name }}</h5> --}}

                      {{-- <h5 class="card-text"><strong>Department: </strong>{{ $tech->department_id }}</h5> --}}

                      <a href="{{ url('teach/edit'.$tech->id) }}" class="btn btn-primary ml-10">Edit</a>
                      <a href="{{ url('teach/delete'.$tech->id) }}" class="btn btn-danger ml-10">Delete</a>

                </div>

                </div>









                  @endforeach
                </div>
            </div>
        </div>
    </div>

@endsection
