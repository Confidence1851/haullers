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
     <link rel="stylesheet" href="{{ asset('public/web/css/style.css') }}">
     <link rel="stylesheet" href="{{ asset('public/web/fontawesome/css/all.css') }}">
     <!-- Font family -->
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700;800&display=swap" rel="stylesheet">
     <link href="https://fonts.googleapis.com/css?family=Open+Sans&amp;display=swap" rel="stylesheet">
     <!-- link for boostrap -->
     <link rel="stylesheet" href="{{ asset('public/web/sass/vendours/boostrap/css/bootstrap.css') }}">
     
     <!-- Fav icon -->
      <link rel="shortcut icon" href="{{ asset('public/favicon.png') }}" />


     <!-- Link for Flickity -->
     <link rel="stylesheet" href="{{ asset('public/web/flickity/flickity.css') }}" media="screen">
     {{--  <script src="https://unpkg.com/flickity@2/dist/flickity.pkgd.min.js"></script>  --}}
         <!-- Start WOWSlider.com HEAD section -->
     <!-- add to the <head> of your page -->
     <link rel="stylesheet" type="text/css" href="{{ asset('public/web/engine4/style.css') }}" />
     <script type="text/javascript" src="{{ asset('public/web/engine4/jquery.js') }}"></script>
     <!-- End WOWSlider.com HEAD section -->
     <!-- Script for flickity -->
     <script src="{{ asset('public/web/flickity/flickity.pkgd.min.js') }}" charset="utf-8"></script>
     @yield('style')
     <title>@yield('title') - Haullers Online</title>
 </head>


 <body>
    <a href="#top" class="scroll-to-top"><i class="fal fa-arrow-up"></i></a>
     <header class="header" id="top">
        @yield('header')
     </header>



     <main class="main">
        @yield('content')
     </main>

     <footer class="footer section-padding">
        @include('web.includes.footer')
     </footer>



     <!-- Script for boostrap -->
     <script src="{{ asset('public/web/sass/vendours/boostrap/js/bootstrap.js') }}"></script>
     <script>
            var acc = document.getElementsByClassName("accordion");
        var i;
        
        for (i = 0; i < acc.length; i++) {
          acc[i].addEventListener("click", function() {
            this.classList.toggle("active");
            var panel = this.nextElementSibling;
            if (panel.style.maxHeight) {
              panel.style.maxHeight = null;
            } else {
              panel.style.maxHeight = panel.scrollHeight + "px";
            } 
          });
        }
     </script>

     <!-- External Script -->
     <script src="{{ asset('public/web/script/main.js') }}"></script>
     <script src="{{ asset('public/web/script/custom.js') }}"></script>
     

 </body>

 </html>