@extends('admin.dashboard')
@section('main')
<style>

#print-page{
    outprint:none;


}

</style>
<div class="pcoded-main-container">
    <div class="pcoded-content">
        <div class="row mt-0" id="">
            <div class="col-md-3">

            </div>
            <div class="col-md-5" id="print-page">
            <div class="card" style="align-content: center" id="printpage1">
             <div class="card-header">

                <div class="row">

                    <div class="col-md-12">
                        <table>

                            <tr>

                           <td>
                              <div >
                               <img src="{{ asset('frontend/assets/logoes/logo2.jpg') }}" width="80" height="80" alt="">
                              </div>
                          </td>
                              <td >
                                <div class="col-md-12" style="text-align: center">
                                    <h4>SHIFA</h4>
                                    <P>PRIVATE INSTITUTE OF HEALTH SCIENCES</P>
                                </div>
                              </td>

                              <td>
                                  <img style="float: right" src="{{ asset('frontend/assets/logoes/logo1.png') }}" width="80" height="80" alt="">

                              </td>


                              </div>

                          </table>

                    </div>

                    </div>





                {{-- <div class="row">
                    <div class="col-md-3">
                     <img src="{{ asset('frontend/assets/logoes/logo2.jpg') }}" width="80" height="80" alt="">
                    </div>
                    <div class="col-md-6" style="text-align: center">
                        <h4>SHIFA</h4>
                        <P>PRIVATE INSTITUTE OF HEALTH SCIENCES</P>
                    </div>
                    <div class="col-md-3">
                        <img src="{{ asset('frontend/assets/logoes/logo1.png') }}" width="80" height="80" alt="">

                    </div>
                </div> --}}
            </div>
            <div class="card-body">
                <div class="row">
                    <h3 style="text-align: center; color:red;">STUDENT IDENTITY CARD</h3>
                    <div class="col-md-5" style="text-align: center">

                     <strong><i> Name : </i></strong>
                    </div>
                    <div class="col-md-6" style="text-align: center">

                        <strong> <i>{{ $std_card->std_e_name }}</i> </strong>
                     </div>
                </div>
                <div class="row">
                    <div class="col-md-5" style="text-align: center">

                        <strong><i>F/Name : </i> </strong>
                       </div>
                       <div class="col-md-6" style="text-align: center">

                           <strong><i>{{ $std_card->std_f_e_name }}</i></strong>
                        </div>
                </div>
                <div class="row">
                    <div class="col-md-5" style="text-align: center">

                        <strong><i> Field : </i></strong>
                       </div>
                       <div class="col-md-6" style="text-align: center">

                           <strong><i>{{ $std_department->name }}</i></strong>
                        </div>
                </div><div class="row">
                    <div class="col-md-5" style="text-align: center">

                        <strong><i>B.Group</i></strong>
                       </div>
                       <div class="col-md-6" style="text-align: center">

                           <strong><i>{{ $std_b_group }}</i></strong>
                        </div>
                </div><div class="row">
                    <div class="col-md-5" style="text-align: center">

                        <strong><i>Cell No: </i></strong>
                       </div>
                       <div class="col-md-6" style="text-align: center">

                           <strong><i>{{ $std_card->phone }}</i></strong>
                        </div>
                </div><div class="row">
                    <div class="col-md-5" style="text-align: center">

                        <strong><i>Card Expire Date: </i></strong>
                       </div>
                       <div class="col-md-6" style="text-align: center">

                           <strong><i>{{ $card_e_date }}</i></strong>
                        </div>
                </div>



                <div class="row mt-2" >
                    <div class="col-md-12" style="text-align: center">

                        <span style="text-align: center">Office Contact No:0786434083\0781342254</span>
                    </div>
                </div>
                <div class="row" >
                    <div class="col-md-12">
                        <p style="text-align: center">Shifa institute of Health science</p>
                    </div>
                </div>
                <div class="row" >
                    <div class="col-md-12">
                        <h5 style="text-align:center">پته:لغمان ولابت کابل،جلال اباد پخوانی هډی ترڅنګ شفاء د روغتیایی علومو خصوصی انستیتیوت</h5>

                    </div>
                </div>
            </div>
        </div>
     </div>

     {{-- Second Card In Pashto Language --}}

<div class="row">
<div class="col-md-3">

</div>
        <div class="col-md-5">
            <div class="card" style="align-content: center">
             <div class="card-header">

                <div class="row">

                    <div class="col-md-12">
                        <table>

                            <tr>

                           <td>
                              <div >
                               <img src="{{ asset('frontend/assets/logoes/logo2.jpg') }}" width="80" height="80" alt="">
                              </div>
                          </td>
                              <td >
                                <div class="col-md-12 "  style="text-align: center">
                                    <h3>شفا‌ء</h3>
                                    <h5 dir="rtl">د روغتیایی علومو خصوصي انسټیټیوت</h5>
                                </div>
                              </td>

                              <td>
                                  <img style="float: right" src="{{ asset('frontend/assets/logoes/logo1.png') }}" width="80" height="80" alt="">

                              </td>


                              </div>

                          </table>

                    </div>

                    </div>


            </div>
            <div class="card-body">
                <div class="row">
                    <h3 style="text-align: center; color:red;" dir="rtl">د محصل پیژندنی کارت</h3>

                    <div class="col-md-12 mt-4" style="text-align: center">

                        <img style="border-image: 1px; " src="{{ asset($std_card->image) }}" alt="student image" height="150" width="130" >
                   </div>
                </div>
                <div class="row mt-5">
                    <div class="col-md-5" style="text-align: center" dir="rtl">
                        <strong>{{ $std_p_name }}</strong>

                       </div>
                       <div class="col-md-6" style="text-align: center">
                        <strong dir="rtl">نوم :  </strong>

                        </div>
                </div>
                <div class="row">
                    <div class="col-md-5" style="text-align: center" dir="rtl">
                        <strong> {{ $std_p_f_name }}</i></strong>

                       </div>
                       <div class="col-md-6" style="text-align: center">
                        <strong dir="rtl"> د پلار نوم : </strong>

                        </div>

            </div>
        </div>

        </div>
        <button class="notprint btn btn-primary mt-3"  onclick="print();">Print</button>

        {{-- <a href="{{ url('view/pdf') }}" class="btn btn-primary">viewpdf</a> --}}
    </div>

        </div>
     </div>
    </div>
</div>
<script>
const printBtn=document.getElementById('print1');
printBtn.addEventListener('click',function(){
    window.print();
})
</script>
@endsection
