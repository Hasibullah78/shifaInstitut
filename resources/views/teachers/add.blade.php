@extends('admin.dashboard')
@section('main')
<div class="pcoded-main-container">
    <div class="pcoded-content">
        <div class="card" style="background-color:rgb(207, 218, 253)">

            @if (session('success'))
            <div class="alert alert-success" role="alert">
                <button type="button" class="close" data-dismiss="alert">×</button>
                {{ session('success') }}
            </div>
            @endif
        </div>
    <div class="row mt-5 justify-content-center aos-init aos-animate" data-aos="fade-up">
        <div class="col-md-11">
          <form action="{{ route('add.teacher') }}" method="post" role="form" class="php-email-form" enctype="multipart/form-data">
            @csrf
            <div class="form-row">
              <div class="col-md-6 form-group">
                <label for="position"><strong>نوم</strong></label>
                <input type="text" required name="name" class="form-control" id="name" placeholder="Your Name">
                @error('name')
                    <span class=" text-danger">{{ $message }}</span>
                @enderror
              </div>
              <div class="col-md-6 form-group">
                <label for="position"><strong>تخلص </strong></label>
                <input type="text" required class="form-control" name="l_name" id="email" placeholder="">
                @error('l_name')
                <span class=" text-danger">{{ $message }}</span>
                @enderror
              </div>
            </div>
            <div class="form-row">
                <div class="col-md-6 form-group">
                    <label for="position"><strong>پلار نوم </strong></label>
                    <input type="text" required class="form-control" name="f_name" placeholder="Father name">
                    @error('f_name')
                    <span class=" text-danger">{{ $message }}</span>
                @enderror
                </div>

                <div class="col-md-6 form-group">
                    <label for="position"><strong>زیږیدنی نیټه</strong></label>
                    <input type="date" required class="form-control" name="dob" placeholder="Date od birth">
                    @error('dob')
                    <span class=" text-danger">{{ $message }}</span>
                @enderror
                </div>
            </div>

            <div class="form-row">
                <div class="col-md-4 form-group">
                    <label for="position"><strong>موبایل شماره</strong></label>
                        <input type="text" required class="form-control" name="phone" placeholder="Phone #">
                        @error('phone')
                        <span class=" text-danger">{{ $message }}</span>
                    @enderror
                    </div>
                <div class="col-md-4 form-group">
                    <label for="position"><strong>ولایت</strong></label>
                    <input type="text" required class="form-control" name="province" >
                    @error('province')
                    <span class=" text-danger">{{ $message }}</span>
                @enderror
                </div>
                <div class="col-md-4 form-group">
                    <label for="position"><strong>ولسوالی</strong></label>
                    <input type="text" required class="form-control" name="district" >
                    @error('district')
                    <span class=" text-danger">{{ $message }}</span>
                @enderror
                </div>
            </div>
            <div class="form-row">

                <div class="col-md-12 form-group">
                    <label for="department"><strong>څانګه</strong></label>
                    <select name="department" class="form-control" id="" aria-placeholder="Departments">
                       @foreach ($departments as $department)
                        <option value="{{ $department->id }}">{{ $department->name }}</option>

                       @endforeach


                    </select>
                    @error('department')
                    <span class=" text-danger">{{ $message }}</span>
                @enderror
                </div>
            </div>
            <div class="form-row">
                <div class="form-group col-md-12">
                    <label for="position"><strong>زده کړو کچه<strong></label>
                    <select name="rank" class="form-control" id="">
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
                    <label for="position"><strong> تصویر</strong></label>
                        <input type="file" required class="form-control" name="image">
                        @error('image')
                        <span class=" text-danger">{{ $message }}</span>
                        @enderror
                </div>
            </div>
                <div class="form-row">
                    <div class="form-group col-md-12">


                    </div>

                </div>
                <div class="form-row">
                    <div class="form-group col-md-12">

                        <div class="text-center"><button class="btn" type="submit" style="background-color: rgb(58, 117, 255)">Submit</button></div>

                    </div>

                </div>
          </form>
        </div>

      </div>
    </div>
    </div>
</div>
</div>
@endsection
