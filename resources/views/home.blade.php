@extends('users.layout.app')
@php($user = Auth::User())


@section('content')
 <div class="container">
        
       
            <div class="main-content-inner">
                
                    <div class="row">
                        
                         <div class="col-md-4 card  btn-primary ">
                                <div class="card-body">
                                    <a href="{{ url('/') }}" type="button" class="btn btn-success">
                                         <i class="ti-home bg-icon"></i>  Home-Page
                                    </a>
                                </div>
                            </div>
                            
                            <div class="col-md-4 card  btn-warning ">
                                <div class="card-body">
                                    <a href="{{ url('/users/orders/view') }}" type="button" class="btn btn-primary">
                                         <i class="ti-receipt bg-icon"></i>  Orders <span class="badge badge-light"></span>
                                    </a>
                                </div>
                            </div>
                            <div class="col-md-4 card  btn-success ">
                                <div class="card-body">
                                    <a href="{{ url('/users/payments/view') }}" type="button" class="btn btn-info">
                                         <i class="ti-credit-card bg-icon"></i>  Payments <span class="badge badge-light"></span>
                                    </a>
                                </div>
                            </div>
                            
                 
                     </div>
                </div>
            </div>
        <!-- main content area end -->


        <!-- Vertically centered modal start -->
           
        
@endsection