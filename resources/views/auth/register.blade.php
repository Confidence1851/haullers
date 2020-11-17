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
     <title>Sign-Up</title>
 </head>

<body>

<div class="form">
        <div class="form__box">
            <div class="row">
                <div class="col-md-6 form__box--item">
                    <h1><a href="{{ route('index') }}"><i class="fal fa-home"></i>Home</h1></a>
                    <br>
                    <br>
                    <img src="{{ asset('public/web/images/sign-in.jpg') }}" alt="Sign up" />
                </div>
                <div class="col-md-6 form__box--item form__box--item--1">
                    <div class="form__logo">
                        <p>Become a member of the <b style="color: #e41111">Haullers</b> transportation system!</p>
                    </div>
                    <br>
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
                    <form id="registerForm" name="registerForm" method="POST" action="{{ route('register') }}" class="form__input-box">
                        {{ csrf_field() }}

                        <div class="form__input--container">
                            <input type="text" placeholder="Place your name" id="name" name="name" required class="form__input" autofocus/>
                            <label for="name" class="form__input--label">Name</label>
                        </div>

                        <div class="form__input--container ">
                            <input type="email" placeholder="Email address" id="email"  name="email" required  autofocus
                                class="form__input form__login__input" />
                            <label for="email" class="form__input--label">Email</label>
                           </div>

                           <div class="form__input--container ">
                            <input type="text" placeholder="Phone Number" id="phone"  name="phone" required  autofocus
                                class="form__input form__login__input" />
                            <label for="email" class="form__input--label">Phone Number</label>
                           </div>

                        <div class="form__input--container">
                            <input type="password" placeholder="Password" id="password" data-rule-equalTo="#password"
                                class="form__input form__login__input" name="password" required />
                            <label for="password" class="form__input--label">Password</label>
                        </div>

                        <div class="form__input--container">
                            <input type="password" placeholder="Confirm Password" id="confirm_pwd" data-rule-equalTo="#password"
                                class="form__input form__login__input" name="confirm_pwd" required />
                            <label for="password" class="form__input--label">Confirm Password</label>
                            <span id="message"></span>
                        </div>

                        <input type="submit" value="Sign up" class="form__btn" />

                         <p class="redirect" ><font size="3px">Already a user? <a href="{{ route('login') }}"> Login</a></p></font>
                    </form>
                </div>
            </div>
        </div>
    </div>



     <!-- Script for boostrap -->
     <script src="{{ asset('public/web/sass/vendours/boostrap/js/bootstrap.js') }}"></script>

     <!-- External Script -->
     <script src="{{ asset('public/web/script/main.js') }}"></script>
     <script src="{{ asset('public/web/script/jquery.validate.js') }}"></script>
      <script src="{{ asset('public/web/script/jquery.3.3.1.js') }}"></script>

     <script>
        $('#password, #confirm_pwd').on('keyup', function(){
            if($('#password').val() == $('#confirm_pwd').val()){
                $('#message').html('Matching').css('color','green');
            } else
              $('#message').html('Not Matching').css('color','red');
        });
     </script>
     
 </body>

 </html>