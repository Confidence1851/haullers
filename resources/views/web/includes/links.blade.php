<ul>
<li><a href="{{ route('index') }}" class="hvr-sweep-to-right"><i class="fal fa-home"></i> Home</a>
</li>
<li><a href="{{ route('vehicles') }}" class="hvr-sweep-to-right"><i class="fal fa-car"></i>
        Vehicles</a></li>
<li><a href="{{ route('our_blog') }}" class="hvr-sweep-to-right"><i class="fas fa-blog"></i>
        Blog</a></li>
<li><a href="{{ route('contact_us') }}" class="hvr-sweep-to-right"><i class="fal fa-users"></i>
        Contact us</a>
</li>
@guest
<li><a href="{{ route('register') }}" class="hvr-sweep-to-right"><i class="fal fa-user"></i> Sign
        up</a></li>
<li><a href="{{ route('login') }}" class="hvr-sweep-to-right"><i class="fal fa-lock"></i>
        Login</a></li>
@else
<li><a href="{{ route('home') }}" class="hvr-sweep-to-right"><i class="fal fa-lock"></i>
        Dashboard</a></li>
@endguest