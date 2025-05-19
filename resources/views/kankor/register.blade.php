@include('body.head')
<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header" style="text-align: center">
               <h3 style="color: rgb(68, 125, 247)">د کانکور امتحان لپاره د شاګرد ثبـــتــ نام</h3>
               @if (session('success'))
               <div class="alert alert-success" role="alert">

                 <h3> {{ session('success') }}</h3>
               </div>
               @endif
            </div>
         </div>

        </div>
    </div>
    </div>
    <form action="{{ url('student/admission') }}" method="post" role="form" class="php-email-form" enctype="multipart/form-data">
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
                    <input type="text" required class="form-control" name="e_name" class="form-control"  placeholder="Ahmad">
                    @error('name')
                        <span class=" text-danger">{{ $message }}</span>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="position"><strong>Father Name</strong></label>
                    <input type="text" required class="form-control" name="e_f_name" placeholder="Mohammad">
                    @error('e_f_name')
                    <span class=" text-danger">{{ $message }}</span>
                @enderror
                </div>
                <div class="form-group">
                    <label for="position"><strong>Blood Group</strong></label>
                    <input type="text" required class="form-control" name="b_group"  placeholder="B+">
                    @error('b_group')
                    <span class=" text-danger">{{ $message }}</span>
                @enderror
                </div>


            </div>
            <br><br><br><br>
        </div>
    </div>
    <div class="col-md-3">
        <div class="card">
            <div class="card-header">

            </div>

            <div class="card-body">

                <div class="form-group" style="">
                    <label for="position" style="float: right"><h4>نوم</h4></label>
                    <input type="text" required dir="rtl" class="form-control" name="name" class="form-control" placeholder="حسیب الله">
                    @error('name')
                        <span class=" text-danger">{{ $message }}</span>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="position" required style="float: right"><h4 dir="rtl">پلار نوم</h4></label>
                    <input type="text" required dir="rtl" class="form-control" name="f_name" placeholder="فضل الرحمن">
                    @error('f_name')
                    <span class=" text-danger">{{ $message }}</span>
                @enderror
                </div>
                <div class="form-group">
                    <label for="position"  style="float: right"><h4>نیکه نوم</h4></label>
                    <input type="text" required dir="rtl" class="form-control" name="g_f_name"  placeholder="خلیل الرحمن">
                    @error('g_f_name')
                    <span class=" text-danger">{{ $message }}</span>
                @enderror
                </div>


            </div>
            <br><br>
        </div>
    </div>
    <div class="col-md-3">
        <div class="card">
            <div class="card-header">

            </div>
            <div class="card-body">
                <div class="form-group">
                    <label for="position" style="float: right"><h4>تذکری نمبر</h4></label>
                    <input type="text" required dir="rtl" placeholder="1399-12-00-12342"  class="form-control" name="nic">
                    @error('nic')
                    <span class=" text-danger">{{ $message }}</span>
                    @enderror
                </div>
                <div class="from-group">
                    <label for="school" style="float: right"><h4>مکتب</h4></label>
                    <input type="text" required dir="rtl" class="form-control" name="school"  placeholder="روښان عالی لیسه">
                    @error('school')
                    <span class=" text-danger">{{ $message }}</span>
                     @enderror
               </div>
                <div class="form-group" style="margin-top: 10px">
                    <h4 style="text-align: center">جنسیت</h4>

                    <div class="col-12" style="">

                            <input  style="" required class="" id="male" name="gender" type="radio" value="نارینه"
                                id="defaultCheck1" checked>
                            <label class="" for="defaultCheck1">
                                نارینه
                            </label>

                        <div class="">
                            <input class="" required id="female" name="gender" type="radio" value="ښځینه"
                                id="defaultCheck2" >
                            <label class="" for="defaultCheck2">
                                ښځینه
                            </label>
                        </div>
                    </div>
                </div>


            </div>
            <br><br>
        </div>

    </div>
    <div class="col-md-3">
        <div class="card">
            <div class="card-header">

            </div>
            <div class="card-body">

                <h4 style="text-align: center">اصلی سکونت </h4>

                <div class="form-group">
                    <label for="position" style="float: right"><h4>ولایت</h4></label>
                    <input type="text" required dir="rtl" class="form-control"  name="o_province" placeholder="لغمان">
                    @error('o_province')
                    <span class=" text-danger">{{ $message }}</span>
                    @enderror
                </div>


                    <div class="form-group">
                        <label for="position" style="float: right"><h4>ولسوالی</h4></label>
                        <input type="text" required dir="rtl" class="form-control" name="o_district"  placeholder="مرکز">
                        @error('o_district')
                        <span class=" text-danger">{{ $message }}</span>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label for="position" style="float: right"><h4>کلی</h4></label>
                        <input type="text" required dir="rtl" class="form-control" name="o_vallage" placeholder="چهار باغ">
                        @error('o_vallage')
                        <span class=" text-danger">{{ $message }}</span>
                        @enderror
                    </div>


            </div>
        </div>

    </div>
</div>
    <div class="row">
        <div class="col-md-3">
            <div class="card">
                <div class="card-header">

                </div>
                <div class="card-body">
                    <h4 style="text-align: center">فعلی سکونت </h4>
                    <div class="form-group">
                        <label for="position" dir="rtl" style="float: right"><h4>ولایت</h4></label>
                        <input type="text" required dir="rtl" class="form-control" name="c_province"  placeholder="کابل">
                        @error('c_province')
                        <span class=" text-danger">{{ $message }}</span>
                        @enderror
                    </div>


                        <div class="form-group">
                            <label for="position" style="float: right"><h4>ولسوالی</h4></label>
                            <input type="text" required dir="rtl" class="form-control" name="c_district"  placeholder="پغمان">
                            @error('c_district')
                            <span class=" text-danger">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="position" style="float: right"><h4>کلی</h4></label>
                            <input type="text" required dir="rtl" class="form-control" name="c_vallage"  placeholder="اوریاخیل">
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
                    <h4 style="text-align: center"> مدنی حالت</h4>
                    <div class="col-9">
                        <div class="">
                            <input class="" required class="form-control" id="single" name="state" type="radio" value="مجرد"
                                id="defaultCheck1" checked>
                            <label class="" for="defaultCheck1">
                                مجرد
                            </label>
                        </div>
                        <div class="">
                            <input class="" required id="married" name="state" type="radio" value="متحل"
                                id="defaultCheck2" >
                            <label class="" for="defaultCheck2">
                                متحل
                            </label>
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <label for="position"  style="float: right"><h4>فراغت کال</h4></label>
                    <input type="text" required dir="rtl" class="form-control" name="g_date"  placeholder="2023">
                    @error('g_date')
                    <span class=" text-danger">{{ $message }}</span>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="position" style="float: right"><h4>زیږیدنی نیټه</h4></label>
                    <input type="date" required dir="rtl" class="form-control" name="dob"  placeholder="2023">
                    @error('dob')
                    <span class=" text-danger">{{ $message }}</span>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="position" style="float: right"><h4> اوسنی کال</h4></label>
                    <input type="text" required dir="rtl" class="form-control" name="r_date"  placeholder="2023">
                    @error('r_date')
                    <span class=" text-danger">{{ $message }}</span>
                    @enderror
                </div>




             </div>

    </div>
  </div>

   <div class="col-md-3">
    <div class="card">
        <div class="card-header"></div>
            <div class="card-body">
                <div class="form-group">
                    <label for="phone"  style="float: right"><h4>موبایل شماره</h4> </label>
                    <input type="text" required dir="rtl" class="form-control" name="phone" >
                </div>
                <div class="form-group">
                    <label for="phone" style="float: right"><h4>ایمیل ادرس</h4></label>
                    <input type="email" required  dir="rtl" class="form-control" name="email" >
                </div>
                <div class="form-group">

                    <label for="Image" class=" mb-2" style="float: right"><h4> شاګرد تصویر</h4></label>
                    <input type="file" required dir="rtl" name="std_img" class="form-control" >
                </div>
            </div>

        </div>
    </div>
    <div class="col-md-3">
        <div class="card">
            <div class="card-header"></div>
                <div class="card-body">
                    <div class="form-group">
                        <label for="phone"  style="float: right"><h4>څانګه</h4> </label>
                        <select name="department_id" id="" style="text-align: right" class="form-control">
                            @foreach ($departments as $department)
                            <option value="{{ $department->id }}">{{ $department->name }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="phone" style="float: right"><h4>وخت</h4></label>
                        <select name="session_id" id="" style="text-align: right" class="form-control">
                            @foreach ($sessions as $session)
                            <option value="{{ $session->id }}">{{ $session->session_category }}</option>
                            @endforeach
                        </select>
                    </div>

                </div>

            </div>
        </div>
    </div>
    <div class="row">
    <div class="form-group col-md-12">

        <div class="text-center"><button class="btn" type="submit" style="background-color: rgb(58, 117, 255)"> <h4>ثبت کړی</h4>  </button></div>

    </div>
    </div>
</form>


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



        //             $('.dropdown1').on('change',function(){
        //                 var category=$(this).val();
        //                 if (category=='Evening') {
        //                     $('#start').fadeIn();
        //                     $('#start').fadeIn();
        //                     $('#start').fadeOut();
        //                     $('#start').fadeOut();
        //                 }

        //             })

        // $('#male').click(function(){
        //     $('#show').fadeIn();
        // });
        // $('#female').click(function(){
        //     $('#show').fadeOut();
        // });


        $('.dropdown1').on('change',function(){
            var category=$(this).val();
           if(category=='Morning'){

            $('#startMorning').fadeIn();
            $('#startAfternoon').fadeOut();
            $('#endEvening').fadeOut();

           }
           if(category=='Evening'){

            $('#Morning').fadeOut();
            $('#Afternoon').fadeOut();
            $('#Evening').fadeIn();

            }
            if(category=='Afternoon'){

            $('#Morning').fadeOut();
            $('#Afternoon').fadeIn();
            $('#Evening').fadeOut();

            }

        //    {
        //     $('#start1').css('display','block');
        //     $('#end1').css('display','block');
        //     $('#start').fadeOut();
        //     $('#end').fadeOut();
        //    }
        })
    })
</script>
</body>
</html>

