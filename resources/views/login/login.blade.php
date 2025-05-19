<!DOCTYPE html>
<html>

<head>

	<title>Sing in</title>
    <link rel="icon" href=" {{ asset('frontend/assets/logoes/logo2.jpg') }}" type="image/x-icon">

	<!-- vendor css -->
	<link rel="stylesheet" href="{{ asset('frontend/assets/css/style.css')}}">

</head>
<body>

<!-- [ auth-signin ] start -->



<div class="auth-wrapper">
	<div class="auth-content">
		<div class="card">
			<div class="row align-items-center text-center">
				<div class="col-md-12">
                    <div class="card-header">
                        <div class="row">
                            <div class="col-md-2">
                                {{-- <div class="card" style="background-color:rgb(207, 218, 253)"> --}}



                                {{-- </div> --}}
                            </div>
                            <div class="col-md-8">
                                <table>

                                    <tr>

                                   <td class="w-25">
                                      <div >
                                       <img src="{{ asset('frontend/assets/logoes/logo2.jpg') }}" width="80" height="80" alt="">
                                      </div>
                                  {{-- </td>
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
                                      </td> --}}

                                      {{-- <td class="w-50">
                                          <img style="float: right" src="{{ asset('frontend/assets/logoes/logo1.png') }}" width="80" height="80" alt="">

                                      </td> --}}


                                      </div>

                                  </table>
                                  <div class="col-md-12 mt-3">
                                    <h6 style="text-align: center">
                                        @if (session('success'))
                                        <div class="alert alert-success" role="alert">
                                            <button type="button" class="close" data-dismiss="alert">×</button>
                                            {{ session('success') }}
                                        </div>
                                        @endif
                                    </h6>
                                  </div>
                            </div>
                    </div>
					<div class="card-body">

                        <form action="{{  route('user.check')  }}" method="POST">
                            @csrf
						{{-- <img src="{{ asset('frontend/assets/images/logo-dark.png')}}" alt="" class="img-fluid mb-4"> --}}
						<h4 class="mb-3 f-w-400">Sign In</h4>
						<div class="input-group mb-3">
							<span class="input-group-text"><i class="feather icon-mail"></i></span>
							<input type="text" required autocomplete="fax" class="form-control" autofocus name="email" placeholder="User Name">
						</div>
						<div class="input-group mb-4">
							<span class="input-group-text"><i class="feather icon-lock"></i></span>
							<input type="password" required class="form-control" name="password" placeholder="Password">
						</div>
						{{-- <div class="form-group text-left mt-2">
							<div class="checkbox checkbox-primary d-inline">
								<input type="checkbox" name="checkbox-fill-1" id="checkbox-fill-a1" checked="">
								<label for="checkbox-fill-a1" class="cr"> Save credentials</label>
							</div>
						</div> --}}
                        <a href="{{ url('reset/password') }}" class="btn btn-block  mt-2 mb-4 text-danger" style="float: left">
                        <small>forgetton password</small>
                        </a>

                        <button type="submit" style="float: right" class="btn btn-block btn-primary mt-2 mb-4">Sign In</button>
						{{-- <p class="mb-2 text-muted">Forgot password? <a href="auth-reset-password.html" class="f-w-400">Reset</a></p>
						<p class="mb-0 text-muted">Don’t have an account? <a href="auth-signup.html" class="f-w-400">Signup</a></p> --}}


                    </form>
                    </div>
				</div>
                <div class="col-md-3">


                        {{-- <a class="btn btn-info" href="http://jetstream.com">Forget Password</a> --}}

                </div>
			</div>
		</div>
	</div>
</div>
<!-- [ auth-signin ] end -->

<!-- Required Js -->

<script src="{{ asset('frontend/assets/js/plugins/bootstrap.min.js')}}"></script>

{{-- <script src="{{ asset('frontend/assets/js/menu-setting.js')}}"></script> --}}

</body>

</html>
