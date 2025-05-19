
<nav class="pcoded-navbar menupos-fixed menu-light notprint">
    <div class="navbar-wrapper  ">
        <div class="navbar-content scroll-div " >

                <ul class="nav pcoded-inner-navbar ">
                    <li class="nav-item pcoded-menu-caption">
                        <label> </label>
                    </li>
                    <li class="nav-item">
                        <a href="{{ url('home/dashboard') }}" class="nav-link "><span class="pcoded-micon"><i class="feather icon-home"></i></span><span
                                class="pcoded-mtext">کور پاڼه(Dashboard)</span></a>

                    </li>
                    <li data-username="form elements advance component validation masking wizard picker select" class="nav-item pcoded-hasmenu">
                        <a href="#" class="nav-link"><span class="pcoded-micon"><i class="feather icon-file-text"></i></span><span class="pcoded-mtext">ویب سایټ تنظیم</span></a>
                        <ul class="pcoded-submenu">
                            <li class="pcoded-hasmenu"><a href="#" class="">څانګی</a>
                                <ul class="pcoded-submenu">
                                 {{-- +   <li><a href="{{ url('department') }}">څانګه اضافه کول</a></li> --}}
                                    <li><a href="{{ url('department/view') }}">څانګو تنظیم</a></li>
                                </ul>
                            </li>
                            <li class="pcoded-hasmenu"><a href="#" class="">استادان</a>
                                <ul class="pcoded-submenu">
                                    <li><a href="{{ url('teacher/reg') }}">استاد اضافه کول</a></li>
                                    <li><a href="{{ url('teacher/view') }}">استادانو تنظیم</a></li>
                                </ul>
                            </li>
                            <li class="pcoded-hasmenu"><a href="#" class="">ګالری</a>
                                <ul class="pcoded-submenu">
                                    <li><a href="{{ url('add/gallary/image') }}">ګالری ته اضافه کول</a></li>
                                    <li><a href="{{ url('gallary/view') }}">ګالری تنظیم</a></li>
                                </ul>
                            </li>

                        </ul>
                    </li>

                    <li class="nav-item pcoded-hasmenu">
                        <a href="#" class="nav-link "><span class="pcoded-micon"><i class="feather icon-users"></i></span><span
                                class="pcoded-mtext">شاګردانو تنظیم</span></a>
                        <ul class="pcoded-submenu">
                            <li class="pcoded-hasmenu"><a href="#" class="">کانکور برخه</a>
                                <ul class="pcoded-submenu">
                                    <li><a href="{{ url('student/view') }}">ثبت شوی محصلین</a></li>
                                    <li><a href="{{ url('student/mark') }}">کانکور ازموینی نمری</a></li>
                                </ul>
                            </li>



                        </ul>
                    </li>
                    <li class="nav-item pcoded-menu-caption">
                        <label>څانګی </label>
                    </li>
                    <li class="nav-item ">
                        <a href="{{ url('student/nursing') }}" class="nav-link "><span class="pcoded-micon"><i class="feather icon-file-text"></i></span><span
                                class="pcoded-mtext">عالی نرسنګ</span></a>
                    </li>
                    <li class="nav-item ">
                        <a href="{{ url('student/pharmicy') }}" class="nav-link "><span class="pcoded-micon"><i class="feather icon-file-text"></i></span><span
                                class="pcoded-mtext">فارمیسی</span></a>
                    </li>
                    <li class="nav-item ">
                        <a href="{{ url('student/technology') }}" class="nav-link "><span class="pcoded-micon"><i class="feather icon-file-text"></i></span><span
                                class="pcoded-mtext">طبی تکنالوجی</span></a>
                    </li>
                    <li class="nav-item ">
                        <a href="{{ url('student/midwifery') }}" class="nav-link "><span class="pcoded-micon"><i class="feather icon-file-text"></i></span><span
                                class="pcoded-mtext">قابلګی</span></a>
                    </li>
                    <li class="nav-item ">
                        <a href="{{ url('student/prothess') }}" class="nav-link "><span class="pcoded-micon"><i class="feather icon-file-text"></i></span><span
                                class="pcoded-mtext"> پروتیز</span></a>
                    </li>
                    <li class="nav-item ">
                        <a href="{{ url('student/anastizy') }}" class="nav-link "><span class="pcoded-micon"><i class="feather icon-file-text"></i></span><span
                                class="pcoded-mtext">انستیزی</span></a>
                    </li>

                    <li class="nav-item pcoded-hasmenu">
                        <a href="#" class="nav-link "><span class="pcoded-micon"><i class="feather icon-users"></i></span><span
                                class="pcoded-mtext"> ټول شاګردان</span></a>
                        <ul class="pcoded-submenu">
                            <li class="pcoded-hasmenu"><a href="#" class="">فعلی </a>
                                <ul class="pcoded-submenu">
                                                    <li><a href="{{ url('student/nursing') }}">عالی نرسنګ </a></li>
                                                    <li><a href="{{ url('student/pharmicy') }}">فارمیسی</a></li>
                                                    <li><a href="{{ url('student/technology') }}">طبی تکنالوجی</a></li>
                                                    <li><a href="{{ url('student/midwifery') }}">قابلګی</a></li>
                                                    <li><a href="{{ url('student/prothess') }}">پروتیز</a></li>
                                                    <li><a href="{{ url('student/anastizy') }}">انستیزی</a></li>
                                </ul>
                                <li class="pcoded-hasmenu"><a href="#" class="">فارغ </a>
                                    <ul class="pcoded-submenu">

                                                        <li><a href="{{ url('student/graduated/nursing') }}">عالی نرسنګ </a></li>
                                                        <li><a href="{{ url('student/graduated/pharmicy') }}">فارمیسی</a></li>
                                                        <li><a href="{{ url('student/graduated/technology') }}">طبی تکنالوجی</a></li>
                                                        <li><a href="{{ url('student/graduated/midwifery') }}">قابلګی</a></li>
                                                        <li><a href="{{ url('student/graduated/prothess') }}">پروتیز</a></li>
                                                        <li><a href="{{ url('student/graduated/anastizy') }}">انستیزی</a></li>
                                    </ul>
                            </li>
                        </ul>
                    </li>
                    {{-- <li class="nav-item pcoded-hasmenu">
                        <a href="#" class="nav-link "><span class="pcoded-micon"><i class="feather icon-box"></i></span><span
                                class="pcoded-mtext">مصارف</span></a>
                        <ul class="pcoded-submenu">
                            <li><a href="{{ asset('') }}">Expense</a></li>
                            <li><a href="{{ asset('') }}">Expense History</a></li>

                        </ul>
                    </li> --}}

                    <li class="nav-item pcoded-hasmenu">
                        <a href="#" class="nav-link "><span class="pcoded-micon"><i class="feather icon-feather"></i></span><span
                                class="pcoded-mtext">شفټونه</span></a>
                        <ul class="pcoded-submenu">
                            <li><a href="{{ url('session/add') }}">شفټ اضافه کړی</a></li>
                            <li><a href="{{ url('session/view') }}">شفټونه وګوری</a></li>
                        </ul>
                    </li>
                    <li class="nav-item pcoded-hasmenu">
                        <a href="#" class="nav-link "><span class="pcoded-micon"><i class="feather icon-feather"></i></span><span
                                class="pcoded-mtext">فیسونه</span></a>
                        <ul class="pcoded-submenu">
                            <li><a href="{{ url('fees/add') }}">فیس اضافه کړی</a></li>
                            <li><a href="{{ url('fees/view') }}"> فیس کټګوری</a></li>
                        </ul>
                    </li>


                    <li class="nav-item ">
                        <a href="http://localhost:7882/phpmyadmin/index.php?route=/database/export&db=shifadb" class="nav-link "><span class="pcoded-micon"><i class="feather icon-server"></i></span><span
                                class="pcoded-mtext">Backup</span></a>

                    </li>

                    {{-- <li class="nav-item">
                        <a href="{{ url('change/password') }}" class="nav-link "><span class="pcoded-micon"><i class="feather icon-lock"></i></span><span
                                class="pcoded-mtext">پاسورډ تغیر کړی</span></a>

                    </li> --}}

                    <li class="nav-item pcoded-hasmenu">
                        <a href="#" class="nav-link "><span class="pcoded-micon"><i class="feather icon-feather"></i></span><span
                                class="pcoded-mtext">پاسورډ تنظیم</span></a>
                        <ul class="pcoded-submenu">
                            <li><a href="{{ url('add/new/user') }}">نوی کارن اضافه کړی</a></li>
                            <li><a href="{{ url('change/password') }}">پاسورډ تغیر کړی</a></li>
                            <li><a href="{{ url('all/users') }}">   ټول کارمندان</a></li>

                        </ul>
                    </li>
                             </ul>





        </div>
    </div>
</nav>
