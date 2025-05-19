@extends('admin.dashboard')
@section('main')
<div class="pcoded-main-container">
    <div class="pcoded-content">

        <div class="row">


            <div class="col-md-12">
                <div class="card" style="background-color:rgb(207, 218, 253)">

                    @if (session('success'))
                    <div class="alert alert-success" role="alert">
                        <button type="button" class="close" data-dismiss="alert">×</button>
                        {{ session('success') }}
                    </div>
                    @endif
                </div>
                <div class="card">

                    <div class="card-body">
                        <form action="{{ route('add.depart') }}" method="post">
                            @csrf
                            <div class="form-group">
                              <label for="exampleFormControlInput1"><b>څانګی نوم</b></label>
                              <input type="text" name="name" class="form-control" id="exampleFormControlInput1" placeholder="عالی نرسنګ">
                           @error('name')
                               <span class=" text-danger">{{ $message }}</span>
                           @enderror
                            </div>



                                <input  type="submit" value="Add Department" class="btn btn-primary" style="float: right">

                          </form>
                    </div>


                </div>
            </div>
        </div>
    </div>
      </div>
    <script src="{{ asset('frontend/assets/bootstrap-4.0.0-dist/js/bootstrap.min.js') }}"></script>
@endsection
