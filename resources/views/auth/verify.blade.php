<!DOCTYPE html>
<html lang="en">

<head>
     <meta charset="UTF-8">
     <meta name="viewport" content="width=device-width, initial-scale=1.0">
     <meta http-equiv="X-UA-Compatible" content="ie=edge">
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
    <!-- Fav icon -->
      <link rel="shortcut icon" href="{{ asset('public/favicon.png') }}" />

     <!-- Link for Flickity -->
     <link rel="stylesheet" href="{{ asset('public/web/flickity/flickity.css') }}" media="screen">
     <script src="https://unpkg.com/flickity@2/dist/flickity.pkgd.min.js"></script>
     <!-- Script for flickity -->
     <script src="{{ asset('public/web/flickity/flickity.pkgd.min.js') }}" charset="utf-8"></script>
     <title>Verify Email</title>
 </head>

<body>  

<div class="form form__login">
        <div class="form__box form__login--box form__box--2">
            <div class="row">
                <div class="col-md-6 form__box--item">
                    <h1><a href="{{ route('index') }}"><i class="fal fa-home"></i>Home</h1></a>
                    <img src="{{ asset('public/web/images/login-bg3.png') }}" alt="Sign up" class="form__login--img">
                </div>
                <div class="col-md-6 form__box--item form__box--item--1">
                    <div class="form__logo">
                      
                        <p>Kindly check your inbox to <b style="color: #e41111"> verify</b></p><br>
                    </div>
                     <br>
                     @if (Session::has('flash_message_error'))
                        <h3><font color="red">
                            <button type="button" class="close" data-dismiss="alert"></button>
                                <strong>{!! session('flash_message_error') !!}</strong>
                        </font></h3>        
                    @endif
                    @if (Session::has('flash_message_success'))
                        <h3><font color-"green">
                            <button type="button" class="close" data-dismiss="alert"></button>
                                <strong>{!! session('flash_message_success') !!}</strong>
                        </font></h3>       
                    @endif
                    
                    @if (session('resent'))
                        <div class="alert alert-success" role="alert">
                            {{ __('A fresh verification link has been sent to your email address. i.e ') }} {{Auth::user()->email}}
                        </div>
                    @endif

                    {{ __('Before proceeding, please check your email for a verification link.') }}
                    {{ __('If you did not receive the email') }}, <a href="{{ route('verification.resend') }}">{{ __('click here to request another') }}</a>
                    
                    <div  style="width:100%;float:right;margin-top:15vw;padding-left:30vh">
                    <a class=""  href="{{ route('logout') }}"
                       onclick="event.preventDefault();
                                     document.getElementById('logout-form').submit();">
                        {{ __('Logout') }}
                    </a>
                   </div>
                </div>
                

                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                    @csrf
                </form>
            </div>
        </div>
    </div>



     <!-- Script for boostrap -->
     <script src="{{ asset('public/web/sass/vendours/boostrap/js/bootstrap.js') }}"></script>

     <!-- External Script -->
     <script src="{{ asset('public/web/script/main.js') }}"></script>
     
 </body>

 </html>