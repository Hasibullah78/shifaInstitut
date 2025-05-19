@php
    $nur_teacher=0;
    $nur_student=0;
    $par_teacher=0;
    $par_student=0;
    $tec_teacher=0;
    $tec_student=0;
    $mid_teacher=0;
    $mid_student=0;
    $pro_teacher=0;
    $pro_student=0;
    $ans_teacher=0;
    $ans_student=0;
@endphp
@extends('admin.dashboard')
@section('main')
<div class="pcoded-main-container">
    <div class="pcoded-content">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <nav>
                                <li id="list"><a href="{{ url('technology/teachers') }}" class="btn btn-primary">استادان</a></li>

                                <div class="dropdown" id="list">
                                <button class="dropbtn btn btn-primary" ><h5 style="color: white">محصلین</h5> </button>
                                <div class="dropdown-content">
                                <a href="{{ url('student/firstsemester') }}">لومړی سمیستر</a>
                                <a href=" {{ url('student/second_semester') }}">دوهم سمیستر</a>
                                <a href="{{ url('student/third_semester') }}">دریم سمیستر</a>
                                <a href="{{ url('student/fourth_semester') }}">څلورم سمیستر</a>
                                </div>
                                </div>

                        </nav>
                    </div>
                    <div class="card-body" style="text-align: center">
                        <br>
                    <h3 class="text-c-blue">
                        طبی تکنالوجی څانګه
                    </h3>
                    </div>
                </div>

                <div class="card-body">
                    <div class="row">
                        <div class="col-md-2">

                        </div>
                        <div class="col-md-8">
                            <table>

                                <tr>

                               <td class="w-25">
                                  <div >
                                   <img src="{{ asset('frontend/assets/logoes/logo2.jpg') }}" width="80" height="80" alt="">
                                  </div>
                              </td>
                                  <td class="w-50">
                                      <div  style="text-align: center">
                                          <b>د عامی روغتیا وزارت</b><br>
                                          <b>د منابع بشری لوی ریاست</b><br>
                                          <b>د خصوصی صحی علومو انستیتیوټونو ریاست</b><br>
                                          <b>شفاء د طبی علومو انستیتیوت</b>

                                          <br>
                                          <br>
                                          <br>



                                      </div>
                                  </td>

                                  <td class="w-50">
                                      <img style="float: right" src="{{ asset('frontend/assets/logoes/logo1.png') }}" width="80" height="80" alt="">

                                  </td>


                                  </div>

                              </table>

                        </div>
                </div>



                <div class="card">
                    <div class="card-body">
                    <div class="row">
                        <div class="col-md-2">

                        </div>
                        <div class="col-md-8">
                            <div class="card bg-primary"">
                                <div class="card-header" style="color: rgb(255, 255, 255); text-align:center">
                               <b> طبي تکنالوجی څانګه</b>


                               @foreach ($tec_teachers as $teach)
                               @php
                                   ++$tec_teacher;
                               @endphp
                             @endforeach
                             @foreach ($tec_students as $student)
                             @php
                                 ++$tec_student;
                             @endphp
                           @endforeach

                     </div>
                         <div class="card-body" style="text-align: center">

                             <b> استادان    :       {{ $tec_teacher }}</b> <br>
                             <b>محصیلین : {{ $tec_student }}</b>


                                </div>
                            </div>
                        </div>

                    </div>
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
