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
                        <form action="{{ route('add.fees') }}" method="post">
                            @csrf
                            <div class="form-group">
                              <label for="exampleFormControlInput1"><b>فیس کټګوری</b></label>
                              <input type="text" name="fees_category" class="form-control" id="exampleFormControlInput1" placeholder="">
                           @error('fees_category')
                               <span class=" text-danger">{{ $message }}</span>
                           @enderror
                            </div>
                            <div class="form-group">
                                <label for="exampleFormControlInput1"><b>فیس اندازه</b></label>
                                <input type="text" name="fees_amount" class="form-control" id="exampleFormControlInput1" placeholder="">
                             @error('fees_category')
                                 <span class=" text-danger">{{ $message }}</span>
                             @enderror
                              </div>
                   <input  type="submit" value="فیس اضافه کړی" class="btn btn-primary" style="float: right">
                 </form>
                    </div>


                </div>
            </div>
        </div>
    </div>
      </div>
    <script src="{{ asset('frontend/assets/bootstrap-4.0.0-dist/js/bootstrap.min.js') }}"></script>
@endsection
