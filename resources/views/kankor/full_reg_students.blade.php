@php
use App\Models\Department;
use App\Models\Session;
use App\Models\Student;



@endphp
@extends('admin.dashboard')
@section('main')
<div class="pcoded-main-container">
    <div class="pcoded-content">

<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header" style="text-align: center">
               <h3 style="color: rgb(68, 125, 247)">Student Registeraion For Kankor Exam</h3>
            </div>
         </div>
         <div class="card" style="background-color:rgb(207, 218, 253)">

            @if (session('success'))
            <div class="alert alert-success" role="alert">
                <button type="button" class="close" data-dismiss="alert">×</button>
                {{ session('success') }}
            </div>
            @endif
        </div>
    </div>
</div>
<form action="{{ url('register/student'.$student->id) }}" method="post" role="form" class="php-email-form" enctype="multipart/form-data">
    @csrf
<div class="container">
<div class="row">
    <div class="col-md-3">
        <div class="card">
            <div class="card-header">

            </div>

            <div class="card-body">

                <div class="form-group">
                    <label for="position"><strong>Name</strong></label>
                    <input type="text" class="form-control" name="std_e_name" class="form-control"  value="{{ $student->std_e_name }}">
                    @error('std_e_name')
                        <span class=" text-danger">{{ $message }}</span>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="position"><strong>Father Name</strong></label>
                    <input type="text" class="form-control" name="std_f_e_name" value="{{ $student->std_f_e_name }}">
                    @error('std_f_e_name')
                    <span class=" text-danger">{{ $message }}</span>
                @enderror
                </div>
                <div class="form-group">
                    <label for="position"><strong>Blood Group</strong></label>
                    <input type="text" class="form-control" name="b_group" value="{{ $student->blood_group }}">
                    @error('b_group')
                    <span class=" text-danger">{{ $message }}</span>
                @enderror
                </div>
<br>
<br>
<br>


            </div>
        </div>
    </div>
    <div class="col-md-3">

        <div class="card">
            <div class="card-header">

            </div>

            <div class="card-body">
                {{-- <input type="hidden" name="student_id" value="{{ $student->id }}"> --}}
                <div class="form-group">
                    <h4  style="text-align: center">نوم</h4>
                    <input type="text" dir="rtl" value="{{ $student->std_name }}" class="form-control" name="std_name" class="form-control" id="name">
                    @error('std_name')
                        <span class=" text-danger">{{ $message }}</span>
                    @enderror
                </div>
                <div class="form-group">
                    <h4  style="text-align: center">پلار نوم</h4>

                    <input type="text" dir="rtl" class="form-control" value="{{ $student->std_f_name }}" name="std_f_name">
                    @error('std_f_name')
                    <span class=" text-danger">{{ $message }}</span>
                @enderror
                </div>
                <div class="form-group">
                    <h4  style="text-align: center">نیکه نوم</h4>

                    <input type="text" dir="rtl" class="form-control" value="{{ $student->std_g_f_name }}" name="std_g_f_name"  >
                    @error('std_g_f_name')
                    <span class=" text-danger">{{ $message }}</span>
                @enderror
                </div>


            </div>
        </div>
    </div>
    <div class="col-md-3">
        <div class="card">
            <div class="card-header">

            </div>
            <div class="card-body">
                <div class="form-group">
                    <p style="text-align: center"><strong>تذکری نمبر </strong></p>
                    <input type="text" dir="rtl"  value="{{ $student->nic }}" class="form-control" name="nic">
                    @error('nic')
                    <span class=" text-danger">{{ $message }}</span>
                    @enderror
                </div>
                <div class="from-group">
                    <p style="text-align: center"><strong>مکتب</strong></p>
                    <input type="text" dir="rtl" class="form-control" value="{{ $student->school }}" name="school"  placeholder="Rokhan High School">
                    @error('school')
                    <span class=" text-danger">{{ $message }}</span>
                     @enderror
               </div>
                <div class="form-group">
                    <p style="text-align: center"><strong>جنسیت</strong></p>
                    <div class="col-9">
                        <div class="">
                            @if($student->gender=='نارینه')
                            <input class="" id="male" name="gender" checked type="radio" value="نارینه"
                            id="defaultCheck1" checked>
                        <label class="" for="defaultCheck1">
                            نارینه
                        </label>
                        <input class="" id="female" name="gender" type="radio" value="ښځینه"
                        id="defaultCheck2" >
                    <label class="" for="defaultCheck2">
                        ښځینه
                    </label>
                            @endif

                        </div>
                        <div class="">
                            @if($student->gender=='ښځینه')
                            <input class="" id="female" checked name="gender" type="radio" value="ښځینه"
                            id="defaultCheck2" >
                        <label class="" for="defaultCheck2">
                            ښځینه
                        </label>
                        <input class="" id="male" name="gender" type="radio" value="نارینه"
                        id="defaultCheck1">
                    <label class="" for="defaultCheck1">
                        نارینه
                    </label>
                            @endif

                        </div>
                    </div>
                </div>


            </div>
        </div>

    </div>
    <div class="col-md-3">
        <div class="card">
            <div class="card-header">

            </div>
            <div class="card-body">

                 <h4>اصلی استوګنځی </h4>
                <div class="form-group">
                    <p style="text-align: center"><strong>ولایت</strong></p>
                    <input type="text" dir="rtl" class="form-control" value="{{ $student->o_province }}"  name="o_province">
                    @error('o_province')
                    <span class=" text-danger">{{ $message }}</span>
                    @enderror
                </div>


                    <div class="form-group">
                        <p style="text-align: center"><strong>ولسوالی</strong></p>
                        <input type="text" dir="rtl" class="form-control" value="{{ $student->o_district }}" name="o_district">
                        @error('o_district')
                        <span class=" text-danger">{{ $message }}</span>
                        @enderror
                    </div>

                    <div class="form-group">
                        <p style="text-align: center"><strong>کلی</strong></p>
                        <input type="text" dir="rtl" class="form-control" value="{{ $student->o_vallage }}" name="o_vallage" >
                        @error('o_vallage')
                        <span class=" text-danger">{{ $message }}</span>
                        @enderror
                    </div>


            </div>
        </div>

    </div>
</div>
    <div class="row">
        <div class="col-md-4">
            <div class="card">
                <div class="card-header">

                </div>
                <div class="card-body">
                     <h4>فعلی استوګنځی </h4>
                    <div class="form-group">
                        <p style="text-align: center"><strong>ولایت</strong></p>
                        <input type="text" dir="rtl" class="form-control" value="{{ $student->c_province }}" name="c_province" >
                        @error('c_province')
                        <span class=" text-danger">{{ $message }}</span>
                        @enderror
                    </div>


                        <div class="form-group">
                            <p style="text-align: center"><strong>ولسوالی</strong></p>
                            <input type="text" dir="rtl" class="form-control" value="{{ $student->c_district }}" name="c_district"  >
                            @error('c_district')
                            <span class=" text-danger">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="form-group">
                            <p style="text-align: center"><strong>کلی</strong></p>
                            <input type="text" dir="rtl" class="form-control" value="{{ $student->c_vallage }}" name="c_vallage"  placeholder="Chaharbagh">
                            @error('c_vallage')
                            <span class=" text-danger">{{ $message }}</span>
                            @enderror
                        </div>


                </div>
            </div>

        </div>



    <div class="col-md-3">
        <div class="card">
            <div class="card-header">

            </div>
            <div class="card-body">
                <div class="form-group">
                    <p style="text-align: center"><strong>مدنی حالت</strong></p>
                    <div class="" style="align-content: center">
                        <div class="">
                            @if($student->m_state=='مجرد')
                            <input class="" class="form-control" id="single" name="state" type="radio" value="مجرد"
                            id="defaultCheck1" checked>
                        <label class="" for="defaultCheck1">
                            مجرد
                        </label>
                        <input class="" id="متحل" name="state" type="radio" value="متحل"
                        id="defaultCheck2" >
                    <label class="" for="defaultCheck2">
                        متحل
                    </label>
                            @endif

                        </div>
                        <div class="">
                            @if($student->m_state=='متحل')
                            <input class="" id="married" name="state" type="radio" value="متحل"
                            id="defaultCheck2" checked>
                        <label class="" for="defaultCheck2">
                            متحل
                        </label>
                        <input class="" class="form-control" id="single" name="state" type="radio" value="مجرد"
                        id="defaultCheck1" >
                    <label class="" for="defaultCheck1">
                        مجرد
                    </label>
                            @endif

                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <p style="text-align: center"><strong>فراغت کال</strong></p>
                    <input type="text" class="form-control" value="{{ $student->g_date  }}" name="g_date"  dir="rtl">
                    @error('g_date')
                    <span class=" text-danger">{{ $message }}</span>
                    @enderror
                </div>
                <div class="form-group">
                    <p style="text-align: center"><strong  dir="rtl">زیږیدنی نیټه</strong></p>
                    <input type="date" dir="rtl" class="form-control" value="{{ $student->dob }}" name="dob"  >
                    @error('dob')
                    <span class=" text-danger">{{ $message }}</span>
                    @enderror
                </div>




             </div>

    </div>
  </div>


   <div class="col-md-5">
    <div class="card">
        <div class="card-header"></div>
            <div class="card-body">
                <div class="form-group">
                    <p style="text-align: center"><strong>تیلیفون شماره</strong></p>
                    <input type="text" dir="rtl" class="form-control" value="{{ $student->phone }}" name="phone" >
                    @error('phone')
                    <span class=" text-danger">{{ $message }}</span>
                    @enderror
                </div>
                <div class="form-group">
                    <p style="text-align: center"><strong>ایمیل ادرس</strong></p>
                    <input type="email" dir="rtl" class="form-control" value="{{ $student->email }}" name="email" >
                    @error('email')
                    <span class=" text-danger">{{ $message }}</span>
                    @enderror
                </div>
                <div class="form-group">


                    <img src="{{ asset($student->image) }}" alt="Student image"  width="110" height="120">
                    <input type="hidden" name="old_img" id="" value="{{ $student->image }}">
                    {{-- <input type="file" name="std_img" class="form-control"> --}}
                </div>
            </div>

        </div>
    </div>
    </div>
    <div class="row">
        <div class="card">
            <div class="card-header" style="text-align: center">
               <h3 style="color: rgb(68, 125, 247)">د اداری اړوند فورم</h3>
            </div>
         </div>
         <div class="col-md-4">

         </div>
 <div class="col-md-4">
    <div class="card">
        <div class="card-header"></div>
            <div class="card-body">
                <div class="form-group">
                    <p style="text-align: center"><strong>د مسلسل شماره</strong></p>
                    <input type="text" required dir="rtl" class="form-control" value=""  name="serial_number" >
                    @error('serial_number')
                    <span class=" text-danger">{{ $message }}</span>
                    @enderror
                </div>

                <div class="form-group">
                     <p style="text-align: center"><strong>د کانکور ای ډی</strong></p>
                    <input type="text" required dir="rtl" class="form-control" value="" name="exam_id" >
                    @error('exam_id')
                    <span class=" text-danger">{{ $message }}</span>
                    @enderror
                </div>


                <div class="form-group">

                    <p style="text-align: center"><strong>د ازموینی نیټه</strong></p>
                    <input type="date" required class="form-control" name="exam_date" value="" >
                    @error('exam_date')
                    <span class=" text-danger">{{ $message }}</span>
                    @enderror
                </div>
                <div class="form-group" id="fees">

                    <p style="text-align: center"><strong>د فیس رقم</strong></p>
                    <select name="reg_fees" id="" style="text-align: right" class="form-control">
                        @foreach ($feeses as $fees)
                        <option value="{{ $fees->id }}">{{ $fees->fees_type }}</option>
                        @endforeach
                    </select>

                </div>
            </div>

        </div>
    </div>
    </div>
    <div class="form-group col-md-12">

        <div class="text-center"><button class="btn" id="sub" type="submit" style="background-color: rgb(17, 97, 216)">Submit $ Next_Steps...</button></div>

    </div>
    </div>
</form>
    </div>
</div>

<script src="/jquery-3.6.3.js"></script>
<script src="{{ asset('backend/assets/jQuery/jquery-3.6.3.js') }}"></script>
<script src="{{ asset('backend/assets/javascript/js.js') }}"></script>
<script src="../jQuery/jquery-3.6.3.js" type="text/javascript"></script>
<script src="../javascript/js.js" type="text/javascript"></script>


<script>
    $(document).ready(function(){
    $('#male,#female').on('change', function(){
    if($('#male').is(':checked'))
    {
        $('#fees').fadeIn();
    }
    if($('#female').is(':checked'))
    {
        $('#fees').fadeOut();
    }

  })
});

</script>
@endsection
