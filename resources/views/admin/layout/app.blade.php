<!doctype html>
<html class="no-js" lang="en">
@php($user = Auth::User())
<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>Haullers Admin Dashboard</title>
    
    <!-- Fav icon -->
      <link rel="shortcut icon" href="{{ asset('public/favicon.png') }}" />
      
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="shortcut icon" type="image/png" href="{{asset('dashboard/images/icon/favicon.ico ') }}">
    <link rel="stylesheet" href="{{asset('public/dashboard/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{asset('public/dashboard/css/font-awesome.min.css') }}">
    <link rel="stylesheet" href="{{asset('public/dashboard/css/themify-icons.css') }}">
    <link rel="stylesheet" href="{{asset('public/dashboard/css/metisMenu.css') }}">
    <link rel="stylesheet" href="{{asset('public/dashboard/css/owl.carousel.min.css') }}">
    <link rel="stylesheet" href="{{asset('public/dashboard/css/slicknav.min.css') }}">
    <!-- amchart css -->
    <link rel="stylesheet" href="https://www.amcharts.com/lib/3/plugins/export/export.css" type="text/css" media="all" />
    <!-- others css -->
    <link rel="stylesheet" href="{{asset('public/dashboard/css/typography.css') }}">
    <link rel="stylesheet" href="{{asset('public/dashboard/css/default-css.css') }}">
    <link rel="stylesheet" href="{{asset('public/dashboard/css/styles.css') }}">
    <link rel="stylesheet" href="{{asset('public/dashboard/css/responsive.css') }}">
    <!-- modernizr css -->

    <!-- Start datatable css -->
    <link rel="stylesheet" href="{{asset('public/dashboard/datatables/css/app.min.css') }}">
    <link rel="stylesheet" href="{{asset('public/dashboard/datatables/datatables.min.css') }}">
    <link rel="stylesheet" href="{{asset('public/dashboard/datatables/DataTables-1.10.16/css/dataTables.bootstrap4.min.css') }}">

    <style>
        .moreinfo{
            padding-left: 5px;
            padding-right: 5px;
        }

        .single-report{
            padding: 10px;
        }

        .delbtn-float{
            position: absolute;
            bottom:0px;
            right:15px;
        }
        .bg-icon{
            font-size:8vw;
        }
    </style>
</head>

<body>
    <!--[if lt IE 8]>
            <p class="browserupgrade">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> to improve your experience.</p>
        <![endif]-->
    <!-- preloader area start -->
    <!-- <div id="preloader">
            <div class="loader"></div>
        </div> -->
    <!-- preloader area end -->
    <!-- page container area start -->
    <div class="page-container">
        <!-- sidebar menu area start -->
        <div class="sidebar-menu">
            <div class="sidebar-header">
                <div class="logo" style="color:white">
                   Haullers Admin Dashboard
                </div>
            </div>
            <div class="main-menu">
                <div class="menu-inner">
                    <nav>
                        <ul class="metismenu" id="menu">
                            <li class="">
                                <a href="{{ url('/') }}"><i class="ti-home"></i><span>Homepage</span></a>
                            </li>
                            <li class="">
                                <a href="{{ route('home') }}"><i class="ti-dashboard"></i><span>Dashboard</span></a>
                            </li>
                            
                            <li class="">
                                <a href="{{ route('admin.users.index') }}"><i class="ti-face-smile"></i><span>Registered Users</span></a>
                            </li>
                            
                            <li class="">
                                <a href="{{ route('admin.customers.index') }}"><i class="ti-comments-smiley"></i><span>Unregistered Users</span></a>
                            </li>
                            
                            <li class="">
                                <a href="{{ url('/admin/view-companies') }}"><i class="ti-id-badge"></i><span>Companies</span></a>
                            </li>
                            
                            <li class="">
                                <a href="{{ url('/admin/view-categories') }}"><i class="ti-comments"></i><span>Vehicle Categories</span></a>
                            </li>
                            
                            <li class="">
                                <a href="{{ route('admin.route-category.index') }}"><i class="ti-flag-alt-2"></i><span>Route Categories</span></a>
                            </li>
                            
                            <li class="">
                                <a href="{{ route('admin.routes.index') }}"><i class="ti-layout-list-thumb-alt"></i><span>Routes</span></a>
                            </li>
                            
                            <li class="">
                                <a href="{{ url('/admin/view-vehicles') }}"><i class="ti-truck"></i><span>Vehicles</span></a>
                            </li>
                            
                            <li class="">
                                <a href="{{ route('admin.orders.index') }}"><i class="ti-receipt"></i><span>Order</span></a>
                            </li>
                            
                            <li class="">
                                <a href="{{ route('admin.payments.index') }}"><i class="ti-credit-card"></i><span>Payments</span></a>
                            </li>
                            
                            <li class="">
                                <a href="{{ route('admin.contactmails.index') }}"><i class="ti-headphone-alt"></i><span>Contact Mails</span></a>
                            </li>
                            
                            <li class="">
                                <a href="{{ url('/admin/view-newsletter-subscribers') }}"><i class="ti-rss"></i><span>Newsletter Subscribers</span></a>
                            </li>
                            
                        </ul>
                    </nav>
                </div>
            </div>
        </div>
        <!-- sidebar menu area end -->

        <div class="main-content">
            <!-- header area start -->
            <div class="header-area">
                <div class="row align-items-center">
                    <!-- nav and search button -->
                    <div class="col-2 ">
                        <div class="nav-btn pull-left">
                            <span></span>
                            <span></span>
                            <span></span>
                        </div>
                        
                    </div>
                    <!-- profile info & task notification -->
                    <div class="col-10">
                        <ul class="notification-area pull-right">
                            <!-- <li id="full-view"><i class="ti-fullscreen"></i></li>
                            <li id="full-view-exit"><i class="ti-zoom-out"></i></li> -->
                            <!--<li id="full-view-exit"><i class="ti-face-smile"></i></li>-->
                            <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    {{ Auth::user()->name }} <span class="caret"></span>
                                </a>

                                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" title="" href="{{ url('/users/profile') }}"> <span class="text">My Profile</span></a>
                                    <a class="dropdown-item" title="" href="{{ url('/users/settings') }}"> <span class="text">Change Password</span></a>
                                    <a class="dropdown-item" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        {{ __('Logout') }}
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                        @csrf
                                    </form>
                                </div>
                            </li>
                            <li class="dropdown">
                                <!--<i class="ti-bell dropdown-toggle" data-toggle="dropdown">-->
                                <!--    <span>2</span>-->
                                <!--</i>-->
                                <div class="dropdown-menu bell-notify-box notify-box">
                                    <span class="notify-title">You have 3 new notifications <a href="#">view all</a></span>
                                    <div class="nofity-list">
                                        <a href="#" class="notify-item">
                                            <div class="notify-thumb"><i class="ti-key btn-danger"></i></div>
                                            <div class="notify-text">
                                                <p>You have Changed Your Password</p>
                                                <span>Just Now</span>
                                            </div>
                                        </a>
                                        <a href="#" class="notify-item">
                                            <div class="notify-thumb"><i class="ti-comments-smiley btn-info"></i></div>
                                            <div class="notify-text">
                                                <p>New Commetns On Post</p>
                                                <span>30 Seconds ago</span>
                                            </div>
                                        </a>
                                        <a href="#" class="notify-item">
                                            <div class="notify-thumb"><i class="ti-key btn-primary"></i></div>
                                            <div class="notify-text">
                                                <p>Some special like you</p>
                                                <span>Just Now</span>
                                            </div>
                                        </a>
                                        <a href="#" class="notify-item">
                                            <div class="notify-thumb"><i class="ti-comments-smiley btn-info"></i></div>
                                            <div class="notify-text">
                                                <p>New Commetns On Post</p>
                                                <span>30 Seconds ago</span>
                                            </div>
                                        </a>
                                        <a href="#" class="notify-item">
                                            <div class="notify-thumb"><i class="ti-key btn-primary"></i></div>
                                            <div class="notify-text">
                                                <p>Some special like you</p>
                                                <span>Just Now</span>
                                            </div>
                                        </a>
                                        <a href="#" class="notify-item">
                                            <div class="notify-thumb"><i class="ti-key btn-danger"></i></div>
                                            <div class="notify-text">
                                                <p>You have Changed Your Password</p>
                                                <span>Just Now</span>
                                            </div>
                                        </a>
                                        <a href="#" class="notify-item">
                                            <div class="notify-thumb"><i class="ti-key btn-danger"></i></div>
                                            <div class="notify-text">
                                                <p>You have Changed Your Password</p>
                                                <span>Just Now</span>
                                            </div>
                                        </a>
                                    </div>
                                </div>
                            </li>
                            
                            <li class="settings-btn">
                                                                
                                    <!-- <img class="avatar user-thumb" src="{{ asset('user.png') }}" alt="avatar"> -->
                                
                            </li>
                        
                        </ul>
                    </div>
                </div>
            </div>
            <!-- header area end -->

    @yield('content')

       
    <div class="offset-area">
        <div class="offset-close"><i class="ti-close"></i></div>
        <ul class="nav offset-menu-tab">
            <li><a class="active" data-toggle="tab" href="#activity">Profile</a></li>
            <li><a data-toggle="tab" href="#settings">Edit</a></li>

        </ul>
        <div class="offset-content tab-content">
            <div id="activity" class="tab-pane fade in show active">
                    <div class="user-avatar-name">
                       
                        <h6 class="text-center mt-2" id="username"><b></b></h6>

                    </div>
                <div class="recent-activity">
                    
                    
                    <div class="timeline-task">
                        <div class="icon bg2">
                            <i class="fa fa-envelope"></i>
                        </div>
                        <div class="tm-title">
                            <p id="useremail"></p>
                        </div>
                    </div>
                    <div class="timeline-task">
                        <div class="icon bg2">
                            <i class="fa fa-envelope"></i>
                        </div>
                    </div>
                    <div class="timeline-task">
                        <div class="icon bg3">
                            <i class="ti-signal"></i>
                        </div>
                        <div class="tm-title">
                            <p>Reg Date</p>
                            <p class="time mt-3 "><i class="ti-time"></i> </p>
                        </div>
                    </div>
                    <div class="timeline-task">
                        <div class="icon bg3">
                            <i class="ti-arrow"></i>
                        </div>
                        <div class="tm-title">
                             <p><a href="" class="logoutbtn">Logout</a></p>
                            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;"> @csrf
                            </form>
                        </div>
                    </div>
                    
                </div>
            </div>
            <div id="settings" class="tab-pane fade">
                <div class="offset-settings">
                    <h4>Edit Profile</h4>
                    <div class="settings-list">
                            
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- offset area end -->
    
           
                    
                    </div>
@if (Session::has('error_msg'))
    <p id="alert_error" style="display:none">{!! session('error_msg') !!}</p>
@endif
@if (Session::has('success_msg'))
    <p id="alert_success" style="display:none">{!! session('success_msg') !!}</p>
@endif
@if (Session::has('notify_msg'))
    <p id="notify_msg" style="display:none">{!! session('notify_msg') !!}</p>
@endif

<!-- The actual snackbar -->
<div id="snackbar"></div>
<!-- footer area start-->
<footer>
    <div class="footer-area">
         <p>© Copyright 2020. All right reserved. Haullers Online.</p>
    </div>
</footer>
<!-- footer area end-->
</div>
<!-- page container area end -->
<!-- offset area start -->

    <!-- jquery latest version -->
    <script src="{{asset('public/dashboard/js/vendor/jquery-2.2.4.min.js') }}"></script>
    <!-- <script src="{{asset('dashboard/js/jquery-3.3.1.js') }}"></script> -->
    <!-- bootstrap 4 js -->
    <script src="{{asset('public/dashboard/js/popper.min.js') }}"></script>
    <script src="{{asset('public/dashboard/js/bootstrap.min.js') }}"></script>
    <script src="{{asset('public/dashboard/js/owl.carousel.min.js') }}"></script>
    <script src="{{asset('public/dashboard/js/metisMenu.min.js') }}"></script>
    <script src="{{asset('public/dashboard/js/jquery.slimscroll.min.js') }}"></script>
    <script src="{{asset('public/dashboard/js/jquery.slicknav.min.js') }}"></script>

    <!-- others plugins -->
    <script src="{{asset('public/dashboard/js/plugins.js') }}"></script>
    <script src="{{asset('public/dashboard/js/vendor/modernizr-2.8.3.min.js') }}"></script>
    <script src="{{asset('public/dashboard/js/scripts.js') }}"></script>
    <script src="https://js.paystack.co/v1/inline.js') }}"></script>

     <!-- Start datatable js -->
  <script src="{{asset('public/dashboard/datatables/datatables.min.js') }}"></script>
  <script src="{{asset('public/dashboard/datatables/DataTables-1.10.16/js/dataTables.bootstrap4.min.js') }}"></script>
  <script src="{{asset('public/dashboard/jquery-ui/jquery-ui.min.js') }}"></script>
  <script src="{{asset('public/dashboard/datatables/js/page/datatables.js') }}"></script>

</body>

</html>
