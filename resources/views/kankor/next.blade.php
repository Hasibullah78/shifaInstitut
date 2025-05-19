@php
use App\Models\Department;
use App\Models\Student;
@endphp

@extends('admin.dashboard')
@section('main')
<div class="pcoded-main-container">
    <div class="pcoded-content">
        <div class="card notprint">
            <div class="card-header" style="text-align: center">
               <h5 style="color: rgb(68, 125, 247)"><b>استعلام او تعهد نامه</b></h5>
            </div>
         </div>
<div class="row">
    <div class="col-md-1">

    </div>
    <div class="col-md-10" >
        <div class="row">
            <div class="card">
            <div class="card-header">
<br>
<br>
                <h4 dir="rtl"  style="text-align: center">د شفاء طبی علومو انستیتیوت ریاست محترم مقام ته !</h4>
            </div>
            <div class="card-body">

                <p style="float: right">!............السلام علیکم</p>
                <br>
                <p dir="rtl" style="float: right; text-align: center">محترما! زه     ({{ $student->std_name }}) د  ({{ $student->std_f_name }})    زوی چی په کال ({{ $student->g_date }}) د ({{ $student->school }}) لیسی څخه فارغ شوی یم. غواړم چی په دي انستیتیوت کی روغتیایی زده کړی وکړم،هیله ده چی په اړونده څانګه راته د کانکور د ازموینی د کارت دویش امر راکړي،   <p>
                <p  style="text-align: center">په درنښت</p>
                <br>
                <p  style="text-align: center"> د محصل لاسلیک</p>

                <br>
                <br>
                <br>

                <p style="float: right"> !تدریسی مدیریت ته  </p>
                <br>
                <p style="float: right"> .د عامی روغتیا وزارت دلایحی او مقرراتو سره سم ورته د کانکور دازموینی کارت ورکړی</p>
                <br>
                <br>
                <br>
                <p style="text-align: center">داکتر عبدالغنی خوشبین</p>
                <p style="text-align: center">شفاء د طبی علومو خصوصي انستیتیوت رئیس</p>
<br>
<br>
<br>
<br>
<br>
<br>

            </div>
            </div>
        </div>

    </div>
</div>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<div class="row">
    <div class="col-md-1">

    </div>
    <div class="col-md-10" >
        <div class="row">
            <div class="card">
            <div class="card-header">
                <div class="row">
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

                </tr>
                    </div>
                </table>

                </div>



            </div>


            <div class="card-body">
<table class="table table-bordered">
<thead>
    <tr>
        <th style="text-align: center"> ځواب</th>
        <th style="text-align: center">نیټه</th>
        <th style="text-align: center">استعلام</th>

    </tr>
</thead>
<tbody>
    <tr>
        <td class="w-50">

        </td>
        <td class="w-10">

        </td>
        <td class="w-50">
            <b style="float: right" dir="rtl" >د(.......     ........    ) ولایت پوهنی ریاست محترم مقام ته !</b>
            <br>
            <br>


            <p style="float: right">!............السلام علیکم</p>
            <br>
            <p dir="rtl" style="float: right; text-align: center"> ښاغلی/اغلی  ({{ $student->std_name }}) د  ({{ $student->std_f_name }})    ځوی/لور چی په  ({{ $student->g_date }}) کال د ({{ $student->school }}) عالی لیسی له دولسم ټولګی څخه ځان فارغ بولي ، غواړی د شفاء روغتیایی علومو خصوصي انسټیټیوټ کی روغتیایی زده کړی وکړي. هیله ده د فراغت په اړه یی راته معلومات راکړی.   <p>
            <p  style="text-align: center">په درنښت</p>
            <br>
            <br>
            <br>
            <br>
            <br>


            <p style="text-align: center">داکتر عبدالغنی خوشبین</p>
            <p style="text-align: center">شفاء د طبی علومو خصوصي انستیتیوت رئیس</p>
<br>
<br>
<br>
<br>
<br>
<br>
<br>


        </td>
    </tr>
</tbody>
</table>
<br>
<br>
<br>

            </div>
            </div>
        </div>

    </div>
</div>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<div class="row">
    <div class="col-md-1">

    </div>
    <div class="col-md-10" >
        <div class="row">
            <div class="card">
            <div class="card-header">
                <div class="row">
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
                        <b>د خصوصی روغتیایی علومو انستیتونو ریاست</b><br>
                        <b>د شفاء روغتیایی علومو خصوصی انسټیټیوټ</b><br>

                            <br>
                            <br>
                            <br>



                        </div>
                    </td>

                    <td class="w-50">
                        <img style="float: right" src="{{ asset('frontend/assets/logoes/logo1.png') }}" width="80" height="80" alt="">

                    </td>

                </tr>
                    </div>
                </table>

                </div>



            </div>


            <div class="card-body">
                <h4 dir="rtl"  style="text-align: center">تعهد نامه</h4>

                <br>
                <p dir="rtl" style="text-align: center"> زه     ({{ $student->std_f_name }}) د  ({{ $student->std_g_f_name }})    ځوی  د ({{ $student->c_district }})اوسیدونکی  تعهد کووم چی زما ځوی/لور  ({{ $student->std_name }}) په هغه صورت کی چی دشفاء روغتیایی علومو انسټیټیوټ په هر رشته کی بریالی شی، د اداری د ټولو اصولو او قواعدو اطاعت کوي، او د اداری د حکمونو څخه د سرکشی په صورت کی لکه،(دوامداره غیر حاضری، دیو نیفرم نه تطبیقول او داسی د اداری نور اصول) موافق یم جی رسماً اخراج شي او په هیڅ صورت کی د شکایت حق نلرم.   <p>
                    <br>
                    <br>
                    <br>
                    <br>
                    <br>

                    <p  style="text-align: center">په درنښت</p>
                <br>
                <br>
                <br>
                <br>

                <p  style="float: left" > د محصل لاسلیک</p>

                <p  style="float: right" > د محصل د پلار لاسلیک</p>
                <br>
                <br>
                <br>

                <br>
                <br>
                <br>

                <p style="float: right">:د کلی د ملک تصدیق</p>

            <br><br><br><br><br><br><br><br><br><br>


            </div>
            </div>
        </div>

    </div>
</div>


<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br><br><br><br><br><br><br>
<br><br><br><br><br><br><br>

<div class="row">
    <div class="col-md-1">

    </div>
    <div class="col-md-10" >
        <div class="row">
            <div class="card">
                <div class="card-header">


                <div class="row">
                    <table>

                    <tr>

                   <td class="w-25">

                       <img src="{{ asset($student->image) }}" width="100" height="120" alt="">

                  </td>
                  <td class="25">
                    <img src="{{ asset('frontend/assets/logoes/logo2.jpg') }}" width="80" height="80" alt="">

                  </td>
                      <td class="w-100">
                          <div  style="text-align: center">
                              <b>د عامی روغتیا وزارت</b><br>
                          <b>د خصوصی روغتیایی علومو انستیتونو ریاست</b><br>
                          <b>د شفاء روغتیایی علومو خصوصی انسټیټیوټ</b><br>

                              <br>
                              <br>
                              <br>



                          </div>
                      </td>

                      <td class="w-25">
                          <img style="float: right" src="{{ asset('frontend/assets/logoes/logo1.png') }}" width="80" height="80" alt="">

                      </td>

                  </tr>
                      </div>
                  </table>

                  </div>



              </div>
            <div class="card-body">

                <p style="float: right">نوم : {{ $student->std_name }} </p>
                <p class="ml-5" style="float: left">د پلار نوم : {{ $student->std_f_name }} </p>


                <br><br>&nbsp;&nbsp;

                <p style="float: right">ای ډی نمبر : {{ $student->exam_id }} </p>
                <br>
                <br>

                <p style="float: right"> نیټه : {{ $student->exam_date }} &nbsp;&nbsp;&nbsp; وخت : د سهار ۹:۰۰ بجی &nbsp;&nbsp;&nbsp; ځای : د شفاء انسټیټیوټ انګړ &nbsp;&nbsp;&nbsp;لاسلیک------------- ا : </p>
                {{-- <p style="float: right">نیټه : {{ $student->exam_date }}</p> <p>وخت : <input type="time"></p> <p>ځای : دشفاء انسټیټیوټ انګړ</p><p>لاسلیک : .............</p> --}}


            </div>
            </div>
        </div>

    </div>
</div>
<div style="text-align: center">
    <button class="notprint btn btn-primary"  onclick="print();">اسناد پرینټ کړی</button>

</div>

</div>
</div>

@endsection
