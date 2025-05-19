@extends('admin.dashboard')
@section('main')
   <div class="pcoded-main-container">
    <div class="pcoded-content">
        <div class="row justify-content-center">

            <div class="col-md-12">
                <div class="card">

                    <div class="card-body">
                        <form action="{{ url('update/depart'.$dep->id) }}" method="post">
                            @csrf
                            <div class="form-group">
                              <label for="exampleFormControlInput1"><b>Department Name</b></label>
                              <input type="text" name="name" value="{{ $dep->name }}" class="form-control" id="exampleFormControlInput1">
                           @error('name')
                               <span class=" text-danger">{{ $message }}</span>
                           @enderror
                            </div>



                                <input  type="submit" value="Update Department" class="btn btn-primary" style="float: right">

                          </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>
    <script src="{{ asset('frontend/assets/bootstrap-4.0.0-dist/js/bootstrap.min.js') }}"></script>
@endsection
