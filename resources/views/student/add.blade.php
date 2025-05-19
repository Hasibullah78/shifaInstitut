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
              <div class="col-md-8 form-group">
                <label for="position"><strong>Name</strong></label>
                <input type="text" name="name" class="form-control" id="name" placeholder="Ahmad">
                @error('name')
                    <span class=" text-danger">{{ $message }}</span>
                @enderror
              </div>


                <div class="col-md-8 form-group">
                    <label for="position"><strong>Father Name</strong></label>
                    <input type="text" class="form-control" name="f_name" placeholder="Mahmood">
                    @error('f_name')
                    <span class=" text-danger">{{ $message }}</span>
                @enderror
                </div>

                <div class="col-md-8 form-group">
                    <label for="position"><strong>Grand Father Name</strong></label>
                    <input type="text" class="form-control" name="g_f_nam" placeholder="Ali">
                    @error('g_f_name')
                    <span class=" text-danger">{{ $message }}</span>
                @enderror
                </div>
            </div>
            <div class="form-row">
                <div class="col-md-12 form-group">
                    <div class="card">
                        <div class="card-header">
                        <strong>Real Residence </strong>
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    <div class="col-md-8 form-group">
                        <label for="position"><strong>Province</strong></label>
                            <input type="text" class="form-control" name="o_province" placeholder="Laghman">
                            @error('o_province')
                            <span class=" text-danger">{{ $message }}</span>
                            @enderror
                    </div>
                    <div class="col-md-8 form-group">
                        <label for="position"><strong>District</strong></label>
                            <input type="text" class="form-control" name="o_district" placeholder="Qarghayee">
                            @error('o_district')
                            <span class=" text-danger">{{ $message }}</span>
                            @enderror
                    </div> <div class="col-md-8 form-group">
                        <label for="position"><strong>Village</strong></label>
                            <input type="text" class="form-control" name="o_village" placeholder="Chaharbagh">
                            @error('o_village')
                            <span class=" text-danger">{{ $message }}</span>
                            @enderror
                    </div>
                </div>
            </div>
            <div class="form-row">
                <div class="col-md-12 form-group">
                    <div class="card">
                        <div class="card-header">
                        <strong>Current Residence </strong>
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    <div class="col-md-8 form-group">
                        <label for="position"><strong>Province</strong></label>
                            <input type="text" class="form-control" name="c_province" placeholder="Laghman">
                            @error('c_province')
                            <span class=" text-danger">{{ $message }}</span>
                            @enderror
                    </div>
                    <div class="col-md-8 form-group">
                        <label for="position"><strong>District</strong></label>
                            <input type="text" class="form-control" name="c_district" placeholder="Qarghayee">
                            @error('c_district')
                            <span class=" text-danger">{{ $message }}</span>
                            @enderror
                    </div> <div class="col-md-8 form-group">
                        <label for="position"><strong>Village</strong></label>
                            <input type="text" class="form-control" name="c_village" placeholder="Chaharbagh">
                            @error('c_village')
                            <span class=" text-danger">{{ $message }}</span>
                            @enderror
                    </div>
                </div>
            </div>

            <div class="form-row">
                <div class="col-md-8 form-group">
                    <label for="position"><strong>NIC</strong></label>
                        <input type="text" class="form-control" name="nic">
                        @error('nic')
                        <span class=" text-danger">{{ $message }}</span>
                        @enderror
                </div>
                <div class="col-md-8 form-group">
                    <label for="school"><strong>School</strong></label>
                        <input type="text" class="form-control" name="school" placeholder="Rokhan High School">
                        @error('school')
                        <span class=" text-danger">{{ $message }}</span>
                    @enderror
                    </div>
                <div class="col-md-8 form-group">
                    <label for="position"><strong>Graduation Date</strong></label>
                    <input type="date" class="form-control" name="g_date" placeholder="2023">
                    @error('g_date')
                    <span class=" text-danger">{{ $message }}</span>
                @enderror
                </div>

            </div>
            <div class="form-row">
                <div class="col-md-8 form-group">
                    <label for="Department"><strong>Choose Department</strong></label>
                    <select name="department" class="form-control select" id="" aria-placeholder="Position">
                        @foreach ($departments as $department)
                        <option value="{{ $department->name }}">{{ $department->name }}</option>
                        @endforeach


                    </select>
                    @error('department')
                    <span class=" text-danger">{{ $message }}</span>
                @enderror
                </div>
                <div class="col-md-8 form-group" id="div111">
                    <label for="department"><strong id="exe">Exam Code Number#</strong></label>
                        <input type="text"  class="form-control" name="e_code" placeholder="M-20-473">
                        @error('e_code')
                        <span class=" text-danger">{{ $message }}</span>
                    @enderror
                </div>
            </div>
            <div class="form-row">

                <div class="col-md-8 form-group">
                    <label for="position"><strong>Choose Shift</strong></label>
                    <select  id="list" class="form-control byee" id="" aria-placeholder="Position">


                        @foreach ($shifts as $shift)
                        <option id="shift1" value="{{ $shift->shift_category}}">{{ $shift->shift_category }}</option>

                       @endforeach
                    </select>
                    <label for="Time" class="mt-3"><strong>Time Session Start Time & End Time</strong></label>
                    @foreach ($shifts as $shift)


                    @if($a==1)


                    <div class="col-md-8 form-group mt-3" >

                        <input type="text" id="start" class="form-control" readonly name="" value="    {{  $shift->shift_start_time }}">

                    </div>

                    <div class="col-md-8 form-group">

                        <input type="text" id="end" class="form-control" readonly name="" value="     {{  $shift->shift_end_time }}">
                         <input type="text" hidden value="{{ $a++ }}">
                    </div>

                    @endif
                    @endforeach
                    <div class="col-md-8 form-group" >
                        <input type="text" style="display: none"   id="start1" class="form-control" readonly name="" value="   {{   $shift->shift_start_time }}">
                    </div>

                    <div class="col-md-8 form-group">
                        <input type="text" style="display: none" id="end1" class="form-control" readonly name="" value="   {{   $shift->shift_end_time }}">
                    </div>

                    @error('position')
                    <span class=" text-danger">{{ $message }}</span>
                @enderror
                </div>


                <div class="col-md-8 form-group">
                    <div class="form-group row">

                        <label for="Fees" class=" mb-2">Student Image</label>
                        <input type="file" name="std_img" class="form-control">
                    </div>

                    <div class="form-group row">
                        <label class="col-3 col-form-label">Gender</label>
                        <div class="col-9">
                            <div class="">
                                <input class="" id="male" name="gender" type="radio" value="male"
                                    id="defaultCheck1" checked>
                                <label class="" for="defaultCheck1">
                                    Male
                                </label>
                            </div>
                            <div class="">
                                <input class="" id="female" name="gender" type="radio" value="female"
                                    id="defaultCheck2" >
                                <label class="" for="defaultCheck2">
                                    Female
                                </label>
                            </div>
                    </div>
                    <div class="form-group row">
                        <p id="show">
                        <label for="Fees" class=" mb-2">Registeration Fess</label>
                        <input type="text" name="reg_fees" class="form-control">
                         </p>
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
<script src="/jquery-3.6.3.js"></script>
<script src="{{ asset('backend/assets/jQuery/jquery-3.6.3.js') }}"></script>
<script src="{{ asset('backend/assets/javascript/js.js') }}"></script>
<script src="../jQuery/jquery-3.6.3.js" type="text/javascript"></script>
<script src="../javascript/js.js" type="text/javascript"></script>
<script>
    $(document).ready(function(){

        // $(window).load(function(){
        //     $('#start1').fadeIn();
        //     $('#end1').fadeOut();

        // });
        $('#male').click(function(){
            $('#show').fadeIn();
        });
        $('#female').click(function(){
            $('#show').fadeOut();
        });


        $('.byee').on('change',function(){
            var d=$(this).val();
           if(d=='Morning'){
            $('#start').fadeIn();
            $('#end').fadeIn();
            $('#start1').fadeOut();
            $('#end1').fadeOut();
           }
           else
           {
            $('#start1').css('display','block');
            $('#end1').css('display','block');
            $('#start').fadeOut();
            $('#end').fadeOut();
           }
        })
    })
</script>
@endsection
