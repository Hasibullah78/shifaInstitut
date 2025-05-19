@php
// $user_p_profile='';
// $user_p_name='';
// if (!$user_profile) {
//     $user_p_profile=$user_profile;
//     $user_p_name=$user_name;
// }
@endphp
<!DOCTYPE html>
<html lang="en">
<head>
    <title>Shefa Medical Institute</title>
    <!-- HTML5 Shim and Respond.js IE11 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 11]>
    	<script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    	<script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    	<![endif]-->
    <!-- Meta -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="description" content="" />
    <meta name="keywords" content="">
    <meta name="author" content="Codedthemes" />
    <!-- Favicon icon -->
    <link rel="stylesheet" href="{{ asset('backend//assets/css/style.css') }}">
    <link rel="stylesheet" href="{{ asset('frontend/assets/bootstrap-4.0.0-dist/css/bootstrap-grid.css') }}">
    <link rel="stylesheet" href="{{ asset('frontend/assets/js/plugins/bootstrap.min.js') }}">
    <link rel="stylesheet" href="{{ asset('frontend/assets/bootstrap-4.0.0-dist/css/bootstrap.min.css') }}">

    <link rel="icon" href=" {{ asset('frontend/assets/logoes/logo2.jpg') }}" type="image/x-icon">

<style>
@media print{
    .notprint{
        display: none;
    }
}

svg{
    width:20px;
}
#list{
   margin-left: 10px;
   float: right;
    display: inline;

}
.dropbtn {

  padding: 12px;
  font-size: 12px;
  border: none;
  cursor: pointer;
}

.dropdown {
  position: relative;
  display: inline-block;
}

.dropdown-content {
  display: none;
  position: absolute;
  background-color: #f9f9f9;
  min-width: 147px;
  box-shadow: 0px 8px 16px 0px rgba(0,0,0,0.2);
  z-index: 1;
}

.dropdown-content a {
  color: black;
  padding: 12px 16px;
  text-decoration: none;
  display: block;
}

.dropdown-content a:hover {background-color: #3b84f9;color: white}

.dropdown:hover .dropdown-content {
  display: block;
}

.dropdown:hover .dropbtn {
  background-color:  #3b84f9;
}
</style>

    <!-- vendor css -->

</head>
<body class="">
	<!-- [ Pre-loader ] start -->
	<div class="loader-bg">
		<div class="loader-track">
			<div class="loader-fill"></div>
		</div>
	</div>
	<!-- [ Pre-loader ] End -->
	<!-- [ navigation menu ] start -->

  @include('admin.sidebar')

	<!-- [ navigation menu ] end -->
	<!-- [ Header ] start -->
	{{-- <header class="navbar pcoded-header navbar-expand-lg navbar-light headerpos-fixed header-blue notprint"> --}}
        {{-- <a class="btn btn-danger" href="{{ route('admin.logout') }}">{{ $user_profile }}</a> --}}

        {{-- <img  src="{{ asset($user_profile) }}" width="30" height="30" alt=""><br> --}}
@if(session('user'))
  <img style="border-radius:100%;" src="{{ asset(session('image')) }}" alt="Student Image" height="60" width="50 "> &nbsp;
        <i class=" text-white">{{ session('user'); }}</i>
@endif








				<div class="m-header">
					<a class="mobile-menu" id="mobile-collapse" href="#"><span></span></a>
					<a href="#" class="b-brand">
						<!-- ========   change your logo hear   ============ -->
						<img src="" alt="" class="logo">
						<img src="" alt="" class="logo-thumb">
					</a>
					<a href="#" class="mob-toggler">
						<i class="feather icon-more-vertical"></i>
					</a>
				</div>
				<div class="collapse navbar-collapse">
					<ul class="navbar-nav me-auto">
						<li class="nav-item">
							<a href="#" type="" style="display: none" class="pop-search"><i class="feather icon-search"></i></a>
							<div class="search-bar">
								<input type="text" class="form-control border-0 shadow-none" placeholder="Search here">
								<button type="button" class="btn-close" aria-label="Close">
								</button>
							</div>
						</li>
						<li class="nav-item">
							<a href="#" class="full-screen" onclick="javascript:toggleFullScreen()"><i class="feather icon-maximize"></i></a>
						</li>
					</ul>
					<ul class="navbar-nav ms-auto">
						<li>

						</li>
						<li>
							<div class="dropdown" style="display: none">
								<a href="#" class="displayChatbox dropdown-toggle"><i class="icon feather icon-mail"></i><span class="badge bg-success"><span class="sr-only"></span></span></a>
							</div>
						</li>
						<li>
							<div class="dropdown drp-user">
								<a href="#" class="dropdown-toggle" data-bs-toggle="dropdown">

                                </a>
								{{-- <div class="dropdown-menu dropdown-menu-end profile-notification">
									<div class="pro-head">
										<img src="" class="img-radius" alt="User-Profile-Image">
										<span>John Doe</span>
										<a href="auth-signin.html" class="dud-logout" title="Logout">
											<i class="feather icon-log-out"></i>
										</a>
									</div>
									<ul class="pro-body">
										<li><a href="user-profile.html" class="dropdown-item"><i class="feather icon-user"></i> Profile</a></li>
										<li><a href="email_inbox.html" class="dropdown-item"><i class="feather icon-mail"></i> My Messages</a></li>
										<li><a href="auth-signin.html" class="dropdown-item"><i class="feather icon-lock"></i> Lock Screen</a></li>
									</ul>
								</div> --}}
							</div>
						</li>
					</ul>
				</div>

                <a class="btn btn-danger" style="float: right" href="{{ route('admin.logout') }}">Log Out</a>

	</header>
	<!-- [ Header ] end -->


	<!-- [ chat user list ] start -->
	<section class="header-user-list notprint">
		<a href="#" class="h-close-text" style="float: left"><i class="feather icon-x" style="float: left"></i></a>

		<div class="tab-content" id="chatTabContent">
			<div class="tab-pane fade show active" id="chat" role="tabpanel" aria-labelledby="chat-tab">
				<div class="h-list-header">
					<div class="input-group">
						<input type="text" id="search-friends" class="form-control" placeholder="Search Friend . . .">
					</div>
				</div>

			</div>
			<div class="tab-pane fade" id="user" role="tabpanel" aria-labelledby="user-tab">
				<div class="h-list-body">
					<div class="main-friend-cont scroll-div">
						<div class="main-friend-list">

							<div class="media userlist-box" data-id="2" data-status="online" data-username="Lary Doe">
								<a class="media-left" href="#"><img class="media-object img-radius" src="../assets/images/user/avatar-2.jpg" alt="Generic placeholder image"></a>
								<div class="media-body">
									<h6 class="chat-header">Lary Doe<small class="d-block text-muted">not send free msg</small></h6>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
			<div class="tab-pane fade" id="setting" role="tabpanel" aria-labelledby="setting-tab">

			</div>
		</div>
	</section>
	<!-- [ chat user list ] end -->

	<!-- [ chat message ] start -->
	<section class="header-chat notprint">
		<div class="h-list-header">
			<h6>Josephin Doe</h6>
			<a href="#" class="h-back-user-list"><i class="feather icon-chevron-left"></i></a>
		</div>
		<div class="h-list-body">
			<div class="main-chat-cont scroll-div">
				<div class="main-friend-chat">

				</div>
			</div>
		</div>
		<div class="h-list-footer">
			<div class="input-group">
				<input type="file" class="chat-attach" style="display:none">
				<a href="#" class="input-group-prepend btn rounded-circle btn-success btn-attach">
					<i class="feather icon-paperclip"></i>
				</a>
				<input type="text" name="h-chat-text" class="form-control h-auto h-send-chat" placeholder="Write hear . . ">
				<button type="submit" class="input-group-append btn-send btn btn-primary">
					<i class="feather icon-message-circle"></i>
				</button>
			</div>
		</div>
	</section>
	<!-- [ chat message ] end -->

<!-- [ Main Content ] start -->


@yield('main')

    <!-- Required Js -->
    <script src="{{ asset('backend/assets/js/plugins/popper.min.js') }}"></script>
    <script src="{{ asset('backend/assets/js/plugins/perfect-scrollbar.min.js') }}"></script>
    <script src="{{ asset('backend/assets/js/plugins/bootstrap.min.js') }}"></script>
    <script src="{{ asset('backend/assets/js/pcoded.js') }}"></script>
    <script src="{{ asset('backend/assets/jQuery/jquery-3.6.3.js') }}"></script>
    <script src="{{ asset('backend/assets/javascript/js.js') }}"></script>

<!-- Apex Chart -->
<script src="{{ asset('backend/assets/js/plugins/apexcharts.min.js') }}"></script>
{{-- <script src="{{ asset('backend/assets/js/menu-setting.js') }}"></script> --}}
<!-- custom-chart js -->
<script src="{{ asset('backend//assets/js/pages/dashboard-main.js') }}"></script>

