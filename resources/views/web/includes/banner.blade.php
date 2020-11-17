
         <nav class="header__nav">

              <div class="header__navbar" id="navbar">
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
                                 @include('web.includes.links')
                             </ul>
                         </div>
                     </div>
                 </div>
             </div>

             <div class="header__slider">
                 <div class="header__slider--box"></div>
                 <!-- Slider Caption -->
                 <div class="header__slider--caption">
                     <h1>Book a <span>truck</span> with ease.</h1>
                     <p>Whatever be your haulage requirement, we got you covered!!! </p>
                     <div class="header__slider--inputBox">
                         <form autocomplete="off" action="{{ route('vehicle_search') }}" method="get" class="autocomplete">@csrf
                         <input type="text" name="keyword" placeholder="Search for vehicles" class="header__slider--input" required/> 
                     
                     </div>
                     <button type="submit" href="{{ url('/vehicles') }}">Search</a>
                     </form>
                 </div>
                 <!-- Start WOWSlider.com BODY section -->
                 <!-- add to the <body> of your page -->
                 <div id="wowslider-container4">
                     <div class="ws_images">
                         <ul>
                             <li><img src="{{ asset('public/web/data4/images/backbg1.jpg') }}" alt="" title="" id="wows4_0" /></li>
                             <li><img src="{{ asset('public/web/data4/images/slider1.jpg') }}" alt="" title="" id="wows4_1" /></li>
                             <li><img src="{{ asset('public/web/data4/images/slider6.jpg') }}" alt="" title="" id="wows4_2" /></li>
                             <li><img src="{{ asset('public/web/data4/images/slider8.jpg') }}" alt="" title="" id="wows4_3" /></li>
                             <li><a href=""><img src="{{ asset('public/web/data4/images/slider13.jpg') }}" alt="html slideshow" title=""
                                         id="wows4_4" /></a></li>
                             <li><img src="{{ asset('public/web/data4/images/slider14.jpg') }}" alt="" title="" id="wows4_5" /></li>
                         </ul>
                     </div>
                     <div class="ws_script" style="position:absolute;left:-99%"><a href="http://wowslider.net">bootstrap
                             carousel example</a> by WOWSlider.com v8.8</div>
                     <div class="ws_shadow"></div>
                 </div>
                 <script type="text/javascript" src="{{ asset('public/web/engine4/wowslider.js') }}"></script>
                 <script type="text/javascript" src="{{ asset('public/web/engine4/script.js') }}"></script>
                 <!-- End WOWSlider.com BODY section -->
             </div>


         </nav>
