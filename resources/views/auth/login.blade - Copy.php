<!DOCTYPE html>
<html lang="en">

<head>
     <meta charset="UTF-8">
     <meta name="viewport" content="width=device-width, initial-scale=1.0">
     <meta http-equiv="X-UA-Compatible" content="ie=edge">
     <!-- Exteranl stylesheets -->
     <link rel="stylesheet" href="{{ asset('web/sass/main.css') }}">
     <link rel="stylesheet" href="{{ asset('web/css/hover.css') }}">
     <link rel="stylesheet" href="{{ asset('web/fontawesome/css/all.css') }}">
     <!-- Font family -->
     <link
        href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700%7CRoboto%7CJosefin+Sans:100,300,400,500"
        rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Open+Sans&amp;display=swap" rel="stylesheet">
     <!-- link for boostrap -->
     <link rel="stylesheet" href="{{ asset('web/sass/vendours/boostrap/css/bootstrap.css') }}">
    <link rel="icon" type="text/css" href="{{ asset('web/images/about-1.png') }}">
     <!-- Link for Flickity -->
     <link rel="stylesheet" href="{{ asset('web/flickity/flickity.css') }}" media="screen">
     <script src="https://unpkg.com/flickity@2/dist/flickity.pkgd.min.js"></script>
     <!-- Script for flickity -->
     <script src="{{ asset('web/flickity/flickity.pkgd.min.js') }}" charset="utf-8"></script>
     <title>Login</title>
 </head>

<body>  

<div class="form form__login">
        <div class="form__box form__login--box form__box--2">
            <div class="row">
                <div class="col-md-6 form__box--item">
                    <h1><a href="{{ route('index') }}"><i class="fal fa-home"></i>Home</h1></a>
                    <img src="{{ asset('web/images/login-bg3.png') }}" alt="Sign up" class="form__login--img">
                </div>
                <div class="col-md-6 form__box--item form__box--item--1">
                    <div class="form__logo">
                      
                        <p>Become a member of the <b style="color: #e41111">Hauling</b> transportation system!</p><br>
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
                    <form id="loginForm" name="loginForm" method="POST" action="{{ route('login') }}" class="form__input-box">
                    @csrf

                        <div class="form__input--container form__login__input--container">
                            <input type="email" placeholder="Email address" id="email" name="email" required autocomplete="email" autofocus
                                class="form__input form__login__input" />
                            <label for="email" class="form__input--label">Email Address</label>
                           </div>
                        <div class="form__input--container">
                            <input type="password" placeholder="Password" id="password"
                                class="form__input form__login__input" name="password" required autocomplete="current-password" />
                            <label for="password" class="form__input--label">Password</label>
                            </div>
                        <input type="submit" value="Login" class="form__btn" />
                        <br>
                        <br>
                        <br>
                        @if (Route::has('password.request'))
                                    <a class="btn btn-link" href="{{ route('password.request') }}">
                                        {{ __('Forgot Your Password?') }}
                                    </a>
                        @endif
                        <p class="redirect"><font size="3px">Don't have an account? <a href="{{ url('/register') }}">Sign up</a></p></font>
                    </form>
                </div>
            </div>
        </div>
    </div>



     <!-- Script for boostrap -->
     <script src="{{ asset('web/sass/vendours/boostrap/js/bootstrap.js') }}"></script>

     <!-- External Script -->
     <script src="{{ asset('web/script/main.js') }}"></script>
     
 </body>

 </html>