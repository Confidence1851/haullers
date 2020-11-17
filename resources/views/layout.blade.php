<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <!-- Exteranl stylesheets -->
     <link rel="stylesheet" href="{{ asset('public/web/sass/main.css') }}">
     <link rel="stylesheet" href="{{ asset('public/web/css/hover.css') }}">
     <link rel="stylesheet" href="{{ asset('public/web/fontawesome/css/all.css') }}">
    <!-- Font family -->
    <link
        href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700%7CRoboto%7CJosefin+Sans:100,300,400,500"
        rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Open+Sans&amp;display=swap" rel="stylesheet">
    <!-- link for boostrap -->
    <link rel="stylesheet" href="{{ asset('public/web/sass/vendours/boostrap/css/bootstrap.css') }}">
     <link rel="shortcut icon" href="{{ asset('public/favicon.png') }}" />

    <!-- Link for Flickity -->
    <link rel="stylesheet" href="{{ asset('public/web/flickity/flickity.css') }}" media="screen">
    <script src="https://unpkg.com/flickity@2/dist/flickity.pkgd.min.js"></script>
    <!-- Script for flickity -->
    <script src="{{ asset('public/web/flickity/flickity.pkgd.min.js') }}" charset="utf-8"></script>
    @yield('style')
    <title>@yield('title')</title>
</head>

<body>

    <a href="#top" class="scroll-to-top"><i class="fal fa-arrow-up"></i></a>

    <header class="header header--3">

        <nav class="header__nav">
        
            <div class="header__navbar header__navbar--2">
                <div class="container-fluid">
 <div class="row">
                         <div class="col-lg-4">
                             <h1 class="header__logo"><i class="fal fa-truck-container"></i> Haullers Online</h1>
                             <div class="header__icons">
                                <i class="fal fa-bars" onclick="openNav()"></i>
                             </div>
                         </div>
                         <div id="sideBar" class="col-lg-8 header__sidebar navbar-fixed-top">
                             <h3 class="header__logo sidebar--logo"><i class="fal fa-truck-container"></i> Haullers Online</h3>
                             <p class="sidebar--paragraph">The Transportation Site meant to satify your
                                 delivery
                                 needs</p>
                             <ul>
                                <li><a href="{{ route('index') }}" class="hvr-sweep-to-right"><i class="fal fa-home"></i> Home</a>
                                </li>
                                <li><a href="{{ url('/vehicles') }}" class="hvr-sweep-to-right"><i class="fal fa-car"></i>
                                        Vehicles</a></li>
                                <li><a href="{{ url('/contact') }}" class="hvr-sweep-to-right"><i class="fal fa-users"></i>
                                        Contact us</a>
                                </li>
                                @guest
                                <li><a href="{{ route('register') }}" class="hvr-sweep-to-right"><i class="fal fa-user"></i> Sign
                                        up</a></li>
                                <li><a href="{{ route('login') }}" class="hvr-sweep-to-right"><i class="fal fa-lock"></i>
                                        Login</a></li>
                                @else
                                <li><a href="{{ route('admin.dashboard') }}" class="hvr-sweep-to-right"><i class="fal fa-lock"></i>
                                        Dashboard</a></li>
                                @endguest
                             </ul>
                         </div>
                     </div>
                </div>
            </div>
        </nav>

    </header>
    
    @yield('content')
    
    
    <footer class="footer section-padding">
        @include('web.includes.footer')
     </footer>
         <!-- Script for boostrap -->
    <script src="{{ asset('public/web/sass/vendours/boostrap/js/bootstrap.js') }}"></script>

    <!-- External Script -->
    <script src="{{ asset('public/web/script/main.js') }}"></script>

    <script>
        function checkSubscriber(){
            var subscriber_email = $("#subscriber_email").val();
            $.ajax({
                type:'post',
                url:'/check-subscriber-email',
                data:{subscriber_email:subscriber_email},
                success:function(resp){
                    if(resp == "exists"){
                        /*alert("Subscriber Email already exists!");*/
                        $("#statusSubscribe").show();
                        $("#btnSubmit").hide();
                        $("#statusSubscribe").html("<div style='margin-top:10px;'>&nbsp;</div><font color='red'><h4>Subscriber Email already exists!</font></h4>");
                    }
                },error:function(){
                    alert("Error");
                }
            });
        }

        function addSubscriber(){
            var subscriber_email = $("#subscriber_email").val();
            $.ajax({
                type:'post',
                url:'/add-subscriber-email',
                data:{subscriber_email:subscriber_email},
                success:function(resp){
                    if(resp == "exists"){
                        /*alert("Subscriber Email already exists!");*/
                        $("#statusSubscribe").show();
                        $("#btnSubmit").hide();
                        $("#statusSubscribe").html("<div style='margin-top:10px;'>&nbsp;</div><font color='red'><h4>Error: Subscriber Email already exists!</font></h4>");
                    }else if(resp=="saved"){
                        $("#statusSubscribe").show();
                        $("#statusSubscribe").html("<div style='margin-top:10px;'>&nbsp;</div><font color='green'><h4>Success: Thanks for Subscribing!</font></h4>");
                    }
                }
            });
        }

        function enableSubscriber(){
            $("#btnSubmit").show();
            $("#statusSubscribe").hide();
        }
        $(document).on('click','#moreBtn',function(e){
            e.preventDefault();
            $('#dots').css('display','none');
            $('#more').css('display','block');
            $('#readBtn').html('<a href="#" id="lessBtn">Read less</a>');
        });
        
        $(document).on('click','#lessBtn',function(e){
            e.preventDefault();
            $('#dots').css('display','block');
            $('#more').css('display','none');
            $('#readBtn').html('<a href="#" id="moreBtn">Read more</a>');
        });
    </script>