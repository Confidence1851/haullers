@extends('admin.layout.app')
@php($user = Auth::User())
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

@section('content')
 <div class="container">
        <!-- main content area start -->
        <ul class="breadcrumb">
           <li class="moreinfo"><i class="fa fa-home moreinfo"></i>Home</li> /
           <li class="moreinfo"><i class="fa fa-dashboard moreinfo"></i>Dashboard</li> 
        </ul>
       
            <div class="main-content-inner">
                
                    <div class="row">
                        
                         <div class="col-md-4 card  btn-primary ">
                                <div class="card-body">
                                    <a href="{{ url('/') }}" type="button" class="btn btn-success">
                                         <i class="ti-home bg-icon"></i>  Home-Page
                                    </a>
                                </div>
                            </div>
                            <div class="col-md-4 card  btn-success ">
                                <div class="card-body">
                                    <a href="{{ url('/admin/users') }}" type="button" class="btn btn-primary">
                                         <i class="ti-face-smile bg-icon"></i> Registered Users <span class="badge badge-light">{{ $U }}</span>
                                    </a>
                                </div>
                            </div>
                             <div class="col-md-4 card  btn-info ">
                                <div class="card-body">
                                    <a href="{{ route('admin.customers.index') }}" type="button" class="btn btn-success">
                                         <i class="ti-comments-smiley bg-icon"></i> Unregistered Users <span class="badge badge-light">{{ $UU }}</span>
                                    </a>
                                </div>
                            </div>
                            <div class="col-md-4 card  btn-success ">
                                <div class="card-body">
                                    <a href="{{ url('/admin/view-companies') }}" type="button" class="btn btn-primary">
                                         <i class="ti-id-badge bg-icon"></i>  Companies <span class="badge badge-light">{{ $c }}</span>
                                    </a>
                                </div>
                            </div>
                            <div class="col-md-4 card  btn-danger ">
                                <div class="card-body">
                                    <a href="{{ url('/admin/view-categories') }}" type="button" class="btn btn-success">
                                         <i class="ti-comments bg-icon"></i> Vehicle Categories <span class="badge badge-light">{{ $Vc }}</span>
                                    </a>
                                </div>
                            </div>
                        
                            <div class="col-md-4 card  btn-info ">
                                <div class="card-body">
                                    <a href="{{ route('admin.route-category.index') }}" type="button" class="btn btn-warning">
                                         <i class="ti-flag-alt-2 bg-icon"></i>  Route Categories <span class="badge badge-light">{{$Rc}}</span>
                                    </a>
                                </div>
                            </div>
                            <div class="col-md-4 card  btn-success ">
                                <div class="card-body">
                                    <a href="{{ route('admin.routes.index') }}" type="button" class="btn btn-info">
                                         <i class="ti-layout-list-thumb-alt bg-icon"></i>  Routes <span class="badge badge-light">{{ $R }}</span>
                                    </a>
                                </div>
                            </div>
                            <div class="col-md-4 card  btn-danger ">
                                <div class="card-body">
                                    <a href="{{ url('/admin/view-vehicles') }}" type="button" class="btn btn-success">
                                         <i class="ti-truck bg-icon"></i>  Vehicles <span class="badge badge-light">{{ $V }}</span>
                                    </a>
                                </div>
                            </div>
                            
                            <div class="col-md-4 card  btn-primary ">
                                <div class="card-body">
                                    <a href="{{ route('admin.orders.index') }}" type="button" class="btn btn-danger">
                                         <i class="ti-receipt bg-icon"></i>  Orders <span class="badge badge-light">{{ $O }}</span>
                                    </a>
                                </div>
                            </div>
                            <div class="col-md-4 card  btn-success ">
                                <div class="card-body">
                                    <a href="{{ route('admin.payments.index') }}" type="button" class="btn btn-info">
                                         <i class="ti-credit-card bg-icon"></i>  Payments <span class="badge badge-light">{{ $P }}</span>
                                    </a>
                                </div>
                            </div>
                            <div class="col-md-4 card  btn-primary ">
                                <div class="card-body">
                                    <a href="{{ route('admin.contactmails.index') }}" type="button" class="btn btn-danger">
                                         <i class="ti-headphone-alt bg-icon"></i>  Contact Mails <span class="badge badge-light">{{ $Cm }}</span>
                                    </a>
                                </div>
                            </div>
                            <div class="col-md-4 card  btn-warning ">
                                <div class="card-body">
                                    <a href="{{ url('/admin/view-newsletter-subscribers') }}" type="button" class="btn btn-success">
                                         <i class="ti-rss bg-icon"></i>  Subscribers <span class="badge badge-light">{{ $S }}</span>
                                    </a>
                                </div>
                            </div>
                 
                     </div>
                </div>
            </div>
        <!-- main content area end -->


        <!-- Vertically centered modal start -->
           
        
@endsection