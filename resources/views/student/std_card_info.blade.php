@extends('admin.dashboard')
@section('main')

<div class="pcoded-main-container">
    <div class="pcoded-content">
        <div class="row mt-0">
            <div class="col-md-2">

            </div>
            <div class="col-md-5">
            <div class="card" style="align-content: center">
             <div class="card-header">
                <div class="row">
                    <div class="col-md-3">

                    </div>
                    <div class="col-md-6" style="text-align: center">
                        <h4>SHIFA</h4>
                        <P>PRIVATE INSTITUTE OF HEALTH SCIENCES</P>
                    </div>
                    <div class="col-md-3">

                    </div>
                </div>
            </div>
            <div class="card-body">
                <div class="row">
                    <h3 style="text-align: center; color:red;">STUDENT IDENTITY CARD</h3>
                    <div class="col-md-5" style="text-align: center">

                     <strong>Name : </strong>
                    </div>
                    <div class="col-md-6" style="text-align: center">

                        <strong>{{ $std_card->std_e_name }}</strong>
                     </div>
                </div>
                <div class="row">
                    <div class="col-md-5" style="text-align: center">

                        <strong>F/Name : </strong>
                       </div>
                       <div class="col-md-6" style="text-align: center">

                           <strong>{{ $std_card->std_f_e_name }}</strong>
                        </div>
                </div>
                <div class="row">
                    <div class="col-md-12" style="text-align: center">




                       </div>

                </div>
                <form action="{{ url('generate/card'.$std_card->id) }}" method="post" role="form" class="php-email-form" enctype="multipart/form-data">
                    @csrf
                <div class="row form-group">

                    <div class="col-md-5" style="text-align: center">

                        <strong >شاګرد نوم : </strong>
                       </div>
                       <div class="col-md-6 " style="text-align: center">

                          <input dir="rtl" value="{{ $std_card->std_name }}" type="text" class="form-control" name="std_e_name">
                        </div>
                </div>
                <div class="row form-group">

                    <div class="col-md-5" style="text-align: center">

                        <strong >شاګرد پلار نوم : </strong>
                       </div>
                       <div class="col-md-6 " style="text-align: center">

                          <input dir="rtl" value="{{ $std_card->std_f_name }}" type="text" class="form-control" name="std_f_e_name">
                        </div>
                </div>
                <div class="row form-group">
                    <div class="col-md-5" style="text-align: center">

                        <strong>Blood Group : </strong>
                       </div>
                       <div class="col-md-6" style="text-align: center">

                          <input type="text" value="{{ $std_card->blood_group }}" class="form-control" name="std_b_group">
                        </div>
                </div><div class="row form-group">
                    <div class="col-md-5" style="text-align: center">

                        <strong>Card Expire Date : </strong>
                       </div>
                       <div class="col-md-6" style="text-align: center">

                         <input type="date" class="form-control" name="card_e_date">
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
                        <input type="submit" class="btn btn-primary" value="Generate Card">
                    </div>
                </div>
                </form>
            </div>
        </div>


        </div>
    </div>
</div>
@endsection
