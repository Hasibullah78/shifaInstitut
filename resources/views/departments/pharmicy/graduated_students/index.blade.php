@extends('admin.dashboard')
@section('main')
<div class="pcoded-main-container">
    <div class="pcoded-content">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">


                                <div class="card">
                                    <div class="card-header">

                                    </div>
                                    <div class="card-body">
                                        <div class="row">
                                            <div class="col-md-6">
                                                <form action="{{ url('student/graduated/pharmicy/y_search') }}" method="post">
                                                    @csrf
                                                <div class="form-group">
                                                    <input  type="text" name="name" placeholder="2023" class="form-control notprint" style="">
                                                    <button type="submit" style="" class="btn btn-primary mt-2 ml-4 notprint">په کال وپلټی</button>

                                                </div>
                                                 </form>

                                            </div>
                                            <div class="col-md-6">
                                                <form action="{{ url('student/graduated/pharmicy/n_search') }}" method="post">
                                                    @csrf
                                                <div class="form-group">
                                                    <input  type="text" name="name" placeholder="حسیب الله" class="form-control notprint" style="">
                                                    <button type="submit" style="" class="btn btn-primary mt-2 ml-4 notprint">په نوم وپلټی</button>

                                                </div>
                                                 </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                    </div>
                    <div class="card-body" style="text-align: center">
                        <br>
                    <h3 class="text-c-blue">
                          فارمیسی څانګی فارغ محصلین
                    </h3>


                    <table class="table table-hover table-bordered"  dir="rtl">
                        <thead>
                            {{-- <a href="{{ route('show.dep') }}">All</a> --}}
                            <tr>
                                <th scope="col tableTitles"  style="text-align: center" id="center" >شماره</th>
                                <th scope="col tableTitles" style="text-align: center" id="center" >نوم</th>
                                <th scope="col tableTitles" style="text-align: center" id="center">د پلار نوم</th>
                                <th scope="col tableTitles" style="text-align: center" id="center">ولایت</th>
                                <th scope="col tableTitles" style="text-align: center" id="center">ولسوالی</th>
                                <th scope="col tableTitles" style="text-align: center" id="center">فراغت کال</th>

                                <th scope="col tableTitles" style="text-align: center" id="center" class="notprint" colspan="2">Action</th>

                            </tr>
                        </thead>
                        <tbody>
                            @php
                                $a=1;
                            @endphp
                            @foreach ($students as $student)
                            <tr >
                                <td style="text-align: center"   id="center">
                                    {{ $a++ }}
                                   </td>
                                   {{-- class="tableTitles w-12" --}}
                                <td  style="text-align: center" id="center">
                                      {{ $student->std_name }}

                            </td>
                                <td style="text-align:  center"  id="center">
                                      {{ $student->std_f_name }}

                            </td>
                            <td style="text-align: center" id="center">
                                {{ $student->c_province }}
                            </td>
                             <td style="text-align: center" id="center">
                                {{ $student->c_district }}
                                </td>
                                <td style="text-align: center">
                                {{ $student->r_date }}
                                </td>
                                <td style="text-align: center">
                                    <a href="{{ url('student/pharmicy/view/record'.$student->id) }}" class="btn btn-primary notprint" style="text-align: center">View-Record</a>
                                </td>
                                <td style="text-align: center">
                                    <a href="{{ url('student/f_semester_profile'.$student->id) }}" class="btn btn-primary notprint" style="text-align: center">View-Profile</a>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>



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
