@extends('admin.dashboard')
@section('main')
<div class="pcoded-main-container">
    <div class="pcoded-content">

        <div class="row">

            <div class="col-md-4" >

            </div>
            <div class="col-md-4">
                <div class="card" style="background-color:rgb(207, 218, 253)">

                    @if (session('success'))
                    <div class="alert alert-success" role="alert">
                        <button type="button" class="close" data-dismiss="alert">×</button>
                        {{ session('success') }}
                    </div>
                    @endif

                </div>
                <div class="card">
                    <div class="card-header" style="text-align:center">
                       <h4 style="text-align: center" class="text-c-blue"> Enter New User_Name && Password</h4>
                    </div>
                    <div class="card-body">
                        <form action="{{ route('add.user') }}" method="post" enctype="multipart/form-data">
                            @csrf
                            <div class="form-group">
                                <h5 style="text-align: center" class="text-c-blue">Name</h5>
                                <input type="text" required  autofocus name="name" class="form-control" id="exampleFormControlInput1" placeholder="">
                             @error('old_user_name')
                                 <span class=" text-danger">{{ $message }}</span>
                             @enderror
                              </div>
                            <div class="form-group">
                              <h5 style="text-align: center" class="text-c-blue">User-Name</h5>
                              <input type="text" required  autofocus name="user_name" class="form-control" id="exampleFormControlInput1" placeholder="">
                           @error('old_user_name')
                               <span class=" text-danger">{{ $message }}</span>
                           @enderror
                            </div>
                            <div class="form-group">
                              <h5 style="text-align: center" class="text-c-blue">Password </h5>

                                <input type="password" required name="password" class="form-control" id="exampleFormControlInput1" placeholder="">
                             @error('old_password')
                                 <span class=" text-danger">{{ $message }}</span>
                             @enderror
                              </div>
                              <div class="form-group">
                              <h5 style="text-align: center" class="text-c-blue">Image</h5>

                                <input type="file" required name="image" class="form-control" id="exampleFormControlInput1" placeholder="">
                             @error('new_user_name')
                                 <span class=" text-danger">{{ $message }}</span>
                             @enderror
                              </div>

                              {{-- <div class="form-group">
                                <h5 style="text-align: center" class=" text-c-blue">New Password</h5>

                                  <input type="password" required name="new_password" class="form-control" id="exampleFormControlInput1" placeholder="">
                               @error('new_password')
                                   <span class=" text-danger">{{ $message }}</span>
                               @enderror
                                </div> --}}




                                <input  type="submit" value="Create User" class="btn btn-primary" style="float: right">

                          </form>
                    </div>


                </div>
            </div>
        </div>
    </div>
      </div>
    <script src="{{ asset('frontend/assets/bootstrap-4.0.0-dist/js/bootstrap.min.js') }}"></script>
@endsection
