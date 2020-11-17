<!--Header-part-->
<div id="header">
  <h1><a href="{{ route('home') }}">Customer Dashboard</a></h1>
</div>
<!--close-Header-part--> 


<!--top-Header-menu-->
<div id="user-nav" class="navbar navbar-inverse">
  <ul class="nav">
    <li  class="" ><a title="" href="#"><i class="icon icon-user"></i>  <span class="text">Welcome </span><b class="caret"></b></a>
    <li class=""><a title="" href="{{ url('/users/profile') }}"><i class="icon-user"></i> <span class="text">My Profile</span></a></li>
    <li class=""><a title="" href="{{ url('/users/settings') }}"><i class="icon icon-cog"></i> <span class="text">Change Password</span></a></li>
    <li class=""><a title="" href="{{ url('/logout') }}"><i class="icon-key"></i> <span class="text">Logout</span></a></li>
  </ul>
</div>
<!--close-top-Header-menu-->
<!--start-top-serch-->
<div id="search">
  <input type="text" placeholder="Search here..."/>
  <button type="submit" class="tip-bottom" title="Search"><i class="icon-search icon-white"></i></button>
</div>


<!--close-top-serch-->