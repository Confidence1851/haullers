<!--sidebar-menu-->
@php($c = App\Company::count())
@php($Vc = App\VehicleCategory::count())
@php($V = App\Vehicle::count())
@php($Rc = App\RouteCategory::count())
@php($R = App\Route::count())
@php($O = App\Order::count())
@php($Cm = App\OrderContact::count())
@php($S = App\NewsletterSubscriber::count())
@php($U = App\User::count())
@php($P = App\Payment::count())
@php($UU = App\OrderContact::count())

<div id="sidebar"><a href="#" class="visible-phone"><i class="icon icon-home"></i> Dashboard</a>
  <ul>
    <li class="active"><a href="{{ url('/admin/dashboard') }}"><i class="icon icon-home"></i> <span>Dashboard</span></a> </li>
    <li class="submenu"> <a href="#"><i class="icon icon-th-list"></i> <span>Companies</span> <span class="label label-important">{{ $c }}</span></a>
      <ul>
        <li><a href="{{ url('/admin/add-company') }}">Add Company</a></li>
        <li><a href="{{ url('/admin/view-companies') }}">View Company</a></li>
      </ul>
    </li>
    <li class="submenu"> <a href="#"><i class="icon icon-th-list"></i> <span>Vehicle Categories</span> <span class="label label-important">{{ $Vc }}</span></a>
      <ul>
        <li><a href="{{ url('/admin/add-category') }}">Add Vehicle Category</a></li>
        <li><a href="{{ url('/admin/view-categories') }}">View Vehicle Categories</a></li>
      </ul>
    </li>
    <li class="submenu"> <a href="#"><i class="icon icon-th-list"></i> <span>Route Categories</span> <span class="label label-important">{{ $Rc }}</span></a>
      <ul>
        <li><a href="{{ route('admin.route-category.create') }}">Add Route Category</a></li>
        <li><a href="{{ route('admin.route-category.index') }}">View Route Categories</a></li>
      </ul>
    </li>
    <li class="submenu"> <a href="#"><i class="icon icon-th-list"></i> <span>Vehicles</span> <span class="label label-important">{{ $V }}</span></a>
      <ul>
        <li><a href="{{ url('/admin/add-vehicle') }}">Add Vehicle</a></li>
        <li><a href="{{ url('/admin/view-vehicles') }}">View Vehicles</a></li>
      </ul>
    </li>
    <li class="submenu"> <a href="#"><i class="icon icon-th-list"></i> <span>Route</span> <span class="label label-important">{{ $R }}</span></a>
      <ul>
        <li><a href="{{ route('admin.routes.create') }}">Add Route</a></li>
        <li><a href="{{ route('admin.routes.index') }}">View Routes</a></li>
      </ul>
    </li>

    <li  class=""><a href="{{ route('admin.orders.index') }}"><i class="icon icon-th-list"></i> Orders <span class="label label-important">{{ $O }}</span></a></li>
    <li  class=""><a href="{{ route('admin.payments.index') }}"><i class="icon icon-th-list"></i> Payments <span class="label label-important">{{ $P }}</span></a></li>
    <li  class=""><a href="{{ route('admin.contactmails.index') }}"><i class="icon icon-th-list"></i> Contact Mails <span class="label label-important">{{ $Cm }}</span></a></li>
    <li  class=""><a href="{{ url('/admin/view-newsletter-subscribers') }}"><i class="icon icon-th-list"></i>NewsLetter Subscribers <span class="label label-important">{{ $S }}</span></a></li>

    <li class="submenu"> <a href="#"><i class="icon icon-th-list"></i> <span>Users</span> <span class="label label-important">{{ $U + $UU }}</span></a>
      <ul>
        <li><a href="{{ route('admin.users.index') }}">View Registered Users <span class="label label-important"> {{ $U }}</span></a></li>
        <li><a href="{{ route('admin.customers.index') }}">View UnRegistered Users <span class="label label-important"> {{ $UU }}</span></a></li>
      </ul>
    </li>
  </ul>
</div>
<!--sidebar-menu-->