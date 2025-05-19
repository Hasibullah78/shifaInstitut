
@extends('admin.dashboard')
@section('main')

@php
    // $user_p_profile=$user_profile;
    // $user_p_name=$user_name;
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
<div class="pcoded-main-container">
    <div class="pcoded-content">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">

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




                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-4">
                    <div class="card " style="background-color: rgb(24, 255, 255,1.0)">
                        <div class="card-header" style="color: rgb(0, 0, 0); text-align:center">
                       <b>    عالي نرسنګ څانګه</b><br>
                            @foreach ($nur_teachers as $teach)
                              @php
                                  ++$nur_teacher;
                              @endphp
                            @endforeach
                            @foreach ($nur_students as $student)
                            @php
                                ++$nur_student;
                            @endphp
                          @endforeach

                    </div>
                        <div class="card-body" style="text-align: center">

                            <b> استادان    :       {{ $nur_teacher }}</b> <br>
                            <b>محصیلین : {{ $nur_student }}</b>

                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="card bg-danger">
                        <div class="card-header" style="color: rgb(255, 255, 255); text-align:center">
                       <b>   فارمیسي څانګه</b>
                       @foreach ($par_teachers as $teach)
                       @php
                           ++$par_teacher;
                       @endphp
                     @endforeach
                     @foreach ($par_students as $student)
                     @php
                         ++$par_student;
                     @endphp
                   @endforeach

             </div>
                 <div class="card-body" style="text-align: center">

                     <b> استادان    :       {{ $par_teacher }}</b> <br>
                     <b>محصیلین : {{ $par_student }}</b>


                        </div>
                    </div>
                </div>
                <div class="col-md-4">
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

            <div class="row">
                <div class="col-md-4">
                    <div class="card" style="background-color: rgb(255, 153, 0)">
                        <div class="card-header" style="color: rgb(255, 255, 255); text-align:center">
                       <b>   قابلګي څانګه</b>

                       @foreach ($mid_teachers as $teach)
                       @php
                           ++$mid_teacher;
                       @endphp
                     @endforeach
                     @foreach ($mid_students as $student)
                     @php
                         ++$mid_student;
                     @endphp
                   @endforeach

             </div>
                 <div class="card-body" style="text-align: center">

                     <b> استادان    :       {{ $mid_teacher }}</b> <br>
                     <b>محصیلین : {{ $mid_student }}</b>


                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="card" style="background-color: rgb(0, 106, 255)">
                        <div class="card-header" style="color: rgb(255, 255, 255); text-align:center">
                       <b>   پروتیز څانګه</b>

                       @foreach ($pro_teachers as $teach)
                       @php
                           ++$pro_teacher;
                       @endphp
                     @endforeach
                     @foreach ($pro_students as $student)
                     @php
                         ++$pro_student;
                     @endphp
                   @endforeach

             </div>
                 <div class="card-body" style="text-align: center">

                     <b> استادان    :       {{ $pro_teacher }}</b> <br>
                     <b>محصیلین : {{ $pro_student }}</b>


                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="card" style="background-color: rgb(4, 255, 0)">
                        <div class="card-header" style="color: rgb(255, 255, 255); text-align:center">
                       <b>      انستیزی څانګه</b>

                       @foreach ($ans_teachers as $teach)
                       @php
                           ++$ans_teacher;
                       @endphp
                     @endforeach
                     @foreach ($ans_students as $student)
                     @php
                         ++$ans_student;
                     @endphp
                   @endforeach

             </div>
                 <div class="card-body" style="text-align: center">

                     <b> استادان    :       {{ $ans_teacher }}</b> <br>
                     <b>محصیلین : {{ $ans_student }}</b>


                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
</div>
@endsection


