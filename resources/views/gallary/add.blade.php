@extends('admin.dashboard')
@section('main')

<div class="pcoded-main-container">
    <div class="pcoded-content">
        <div class="row">


            <div class="col-md-2"  >
                <div class="d-flex aligns-items-center justify-content-center card text-center w-75">



                </div>

            </div>
            <div class="col-md-6 mt-5">
                @if(session('success'))
                <div class="alert alert-success alert-dismissible fade show d-flex align-items-center justify-content-center" id="alert" style="display:none;">
                    <span id="msg">{{ session('success') }}</span>
                </div>
                @endif
                <div class="d-flex aligns-items-center justify-content-center card text-center">
                    <div style="background-color:  rgb(55, 120, 249); text-align:center" class="card-header">
                     <strong> Add Picture</strong>
                    </div>
                    <div class="card-body">
                        <form action="{{ route('add.gallary') }}" method="post" enctype="multipart/form-data">
                            @csrf
                            <div class="form-group">
                              <input type="file" name="gallary_image" class="form-control" id="exampleFormControlInput1">
                           @error('gallary_image')
                               <span class=" text-danger">{{ $message }}</span>
                           @enderror
                            </div>

                            <div class="form-group">
                              <label for="exampleFormControlTextarea1"><b>Description</b></label>
                              <textarea class="form-control" id="exampleFormControlTextarea1" name="description" rows="2" placeholder=""></textarea>
                              @error('description')
                              <span class="text-danger">{{ $message }}</span>
                          @enderror
                            </div>

                                <input  type="submit" value="Add Picture" class="btn btn-primary" style="float: right">

                          </form>
                    </div>


                </div>
            </div>

        </div>
    </div>
</div>
    <script src="{{ asset('frontend/assets/bootstrap-4.0.0-dist/js/bootstrap.min.js') }}"></script>
@endsection
