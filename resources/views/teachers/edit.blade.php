@extends('admin.dashboard')
@section('main')
<div class="pcoded-main-container">
    <div class="pcoded-content">
        <div class="card">

            @if (session('success'))
            <div class="alert alert-success" role="alert">
                <button type="button" class="close" data-dismiss="alert">×</button>
                {{ session('success') }}
            </div>
            @endif
      <div class="row mt-5 justify-content-center aos-init aos-animate" data-aos="fade-up">
        <div class="col-lg-10">
            @foreach ($techs as $tech)
          <form action="{{ url('update/teacher'.$tech->id) }}" method="post" role="form" class="php-email-form" enctype="multipart/form-data">
            @csrf

            <input type="hidden" name="olde_image" value="{{ $tech->image }}">
            <div class="form-row">
              <div class="col-md-6 form-group">
                <label for="position"><strong>Name</strong></label>
                <input type="text" name="name" value="{{ $tech->name }}" class="form-control" id="name" placeholder="Your Name">
                @error('name')
                    <span class=" text-danger">{{ $message }}</span>
                @enderror
              </div>
              <div class="col-md-6 form-group">
                <label for="position"><strong>Last Name</strong></label>
                <input type="text" class="form-control" value="{{ $tech->l_name }}" name="l_name" id="email" placeholder="Your Email">
                @error('l_name')
                <span class=" text-danger">{{ $message }}</span>
                @enderror
              </div>
            </div>
            <div class="form-row">
                <div class="col-md-6 form-group">
                    <label for="position"><strong>Father Name</strong></label>
                    <input type="text" class="form-control" value="{{ $tech->f_name }}" name="f_name" placeholder="Father name">
                    @error('f_name')
                    <span class=" text-danger">{{ $message }}</span>
                @enderror
                </div>

                <div class="col-md-6 form-group">
                    <label for="position"><strong>Date Of Birth</strong></label>
                    <input type="date" class="form-control" value="{{ $tech->dob }}" name="dob" placeholder="Date od birth">
                    @error('dob')
                    <span class=" text-danger">{{ $message }}</span>
                @enderror
                </div>
            </div>

            <div class="form-row">
                <div class="col-md-4 form-group">
                    <label for="position"><strong>Phone Number</strong></label>
                        <input type="text" class="form-control" name="phone" value="{{ $tech->phone }}" placeholder="Phone #">
                        @error('phone')
                        <span class=" text-danger">{{ $message }}</span>
                    @enderror
                    </div>
                <div class="col-md-4 form-group">
                    <label for="position"><strong>Province</strong></label>
                    <input  type="text" class="form-control"  name="province" value="{{ $tech->province }}" placeholder="">
                    @error('province')
                    <span class=" text-danger">{{ $message }}</span>
                @enderror
                </div>
                <div class="col-md-4 form-group">
                    <label for="position"><strong>District</strong></label>
                    <input  type="text" class="form-control"  name="district" value="{{ $tech->district }}" placeholder="">
                    @error('district')
                    <span class=" text-danger">{{ $message }}</span>
                @enderror
                </div>
            </div>
            <div class="form-row">

                <div class="col-md-6 form-group">
                    <label for="department"><strong>Departments</strong></label>
                    <select name="department" class="form-control" id="" value="{{ $tech->department_id }}" aria-placeholder="Departments">
                        @foreach ($deps as $dep)
                        <option value="{{ $dep->id }}">{{ $dep->name }}</option>

                        @endforeach


                    </select>
                    @error('department')
                    <span class=" text-danger">{{ $message }}</span>
                @enderror
                </div>
            </div>
            <div class="form-row">
                <div class="form-group col-md-8">
                    <label for="position"><strong>Rank<strong></label>
                    <select name="rank" class="form-control" id="" value="{{ $tech->rank }}">
                        <option value="Bachelore">Bachelore</option>
                        <option value="Master">Master</option>
                        <option value="PHD">PHD</option>

                    </select>
                    @error('rank')
                    <span class=" text-danger">{{ $message }}</span>
                @enderror
                </div>
            </div>
            <div class="form-row">
                <div class="col-md-12 form-group">
                    <label for="position"><strong>Choose Image</strong></label>
                        <input type="file" class="form-control" value="{{ $tech->image }}" name="image">
                        @error('image')
                        <span class=" text-danger">{{ $message }}</span>
                        @enderror
                </div>
            </div>

            <div class="text-center"><button class="btn btn-success" type="submit">Update</button></div>
            @endforeach
          </form>
        </div>

      </div>
    </div>
    </div>
</div>
@endsection
