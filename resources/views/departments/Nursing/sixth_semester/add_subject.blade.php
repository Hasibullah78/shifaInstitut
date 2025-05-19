@extends('admin.dashboard')
@section('main')
<div class="pcoded-main-container">
    <div class="pcoded-content">

        <div class="row">

            <div class="col-md-4">

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

                    <div class="card-body">
                        <form action="{{ route('add.subject.nursing.sixth') }}" method="post">
                            @csrf
                            <div class="form-group">
                              <h4 style="text-align: center">مضمون</h4>
                              <input type="text" dir="rtl" name="name" class="form-control" id="exampleFormControlInput1" placeholder="">
                           @error('name')
                               <span class=" text-danger">{{ $message }}</span>
                           @enderror
                            </div>
                            <div class="form-group">
                              <h4 style="text-align: center"> مضمون کوډ نمبر</h4>

                                <input type="text" name="subject_code" class="form-control" id="exampleFormControlInput1" placeholder="">
                             @error('subject_code')
                                 <span class=" text-danger">{{ $message }}</span>
                             @enderror
                              </div>
                              <div class="form-group">
                              <h4 style="text-align: center">کریډیټونو شمیر</h4>

                                <input type="text" name="credit" class="form-control" id="exampleFormControlInput1" placeholder="">
                             @error('credit')
                                 <span class=" text-danger">{{ $message }}</span>
                             @enderror
                              </div>

                              <div class="form-group" >
                                <input type="text" hidden  name="semester" value="sixth" class="form-control" id="exampleFormControlInput1" placeholder="">
                             @error('semester')
                                 <span class=" text-danger">{{ $message }}</span>
                             @enderror
                              </div>

                            <div class="form-group">
                                    @foreach ($departments as $department)
                                    <input value="{{ $department->id }}" name="department_id" hidden class="form-control">
                                    @endforeach
                                </select>
                            </div>

                                <input  type="submit" value="مضمون اضافه کړی" class="btn btn-primary" style="float: right">

                          </form>
                    </div>


                </div>
            </div>
        </div>
    </div>
      </div>
    <script src="{{ asset('frontend/assets/bootstrap-4.0.0-dist/js/bootstrap.min.js') }}"></script>
@endsection
