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
                        <form action="{{ route('add.session') }}" method="post">
                            @csrf
                            <div class="form-group">
                              <label for="exampleFormControlInput1"><b>Session Category</b></label>
                              <input type="text" name="session_category" class="form-control" id="exampleFormControlInput1" placeholder="Morning">
                           @error('session_category')
                               <span class=" text-danger">{{ $message }}</span>
                           @enderror
                            </div>


                              <div class="form-group">
                                <label for="position"><strong>Choose Department</strong></label>
                                <select  id="list" class="form-control byee" name="department_id" aria-placeholder="Position">
                                    @foreach ($deps as $dep)
                                    <option id="shift1"  value="{{ $dep->id}}">{{ $dep->name }}</option>

                                   @endforeach
                                </select>
                              </div>

                                <input  type="submit" value="Create Session" class="btn btn-primary" style="float: right">

                          </form>
                    </div>


                </div>
            </div>
        </div>
    </div>
      </div>
    <script src="{{ asset('frontend/assets/bootstrap-4.0.0-dist/js/bootstrap.min.js') }}"></script>
@endsection
