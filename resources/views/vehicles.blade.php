@extends('web.layouts.app')
@section('title')
Our Vehicles
@endsection
@section('content')
@include('web.includes.nav2')
    <main class="main">
        <section class="section__car-gallery section-padding">
            <div class="section__cars--heading section__cars--heading--2">
                <h1>Our Vehicles</h1>
                <div class="line__container"><span></span> <i class="fal fa-car"></i></div>
                <p>Top Transportation Vehicles</p>
            </div>

            <div class="container">
            <div class="search__box">
                <form action="{{ route('vehicle_search') }}" method="get" class="filter__box" id="vehicle_search_box">@csrf
                    <div class="filter__inputBox">
                        <i class="fa fa-search btn" onclick="document.getElementById('vehicle_search_box').submit();"></i>
                        <input type="text" placeholder="Search for vehicles" id="search" value="{{$keyword ?? ''}}" name="keyword"  class="filter__input" required/>
                    </div>
                </form>
                
                
                <label class="dropdown">

                      <div class="dd-button">Sort By: <span>Type</span></div>
                      <input type="checkbox" class="dd-input" id="test">
                    
                      <ul class="dd-menu">
                        <li><a href="#">Most used</a></li>
                        <li><a href="#">Newest</a></li>
                        <li><a href="#">Oldest</a></li>
                        <li><a href="#">Price</a></li>
                        <li><a href="#">Location</a></li>
                        <li><a href="#">Weight</a></li>
                      </ul>
                  
                </label>
            </div>
                
                <div class="row">
                    <div class="col-lg-12 car-8">
                        <div class="tab__item-box">

                            <div class="row-box">
                            @if($vehiclesAll->count() > 0)
                                @foreach($vehiclesAll as $vehicle)
                                    <div class="col-lg-3">
                                        <figure class="image-container">
                                            <img src="{{ asset('public/images/backend_images/products/medium/'.$vehicle->image) }}" alt="" />
                                        </figure>
                                        <div class="car__item car__item--2">
                                            <div class="car__item--name"><i class="fa fa-truck-container"></i>
                                             {{$vehicle->vehicle_name}}
                                            </div>
                                            <div class="car__item--description">
                                                <p><span>Status:</span> {{$vehicle->vehicle_status}} </p>
                                                <p><span>Capacity:</span> {{$vehicle->capacity.' '.$vehicle->unit}}</p>
                                                <p><span>Routes:</span> {{$vehicle->routecategory_name}}</p>
                                                <p><span>Use Count:</span> {{$vehicle->use_count}} </p>
                                                <p><span>Price per day:</span> ₦ {{$vehicle->price}}</p>                                        </div>
                                            <a href="{{ route('vehicle_info',$vehicle->id) }}" class="car__item--btn">Vehicle Info</a>
                                        </div>
                                    </div>
                                @endforeach
                            @else
                                <div class=" mb-5 mt-5 h1 text-center">No vehicle found</div>
                            @endif
                            </div>
                        </div>
                </div>
        </section>
        </div>
        </div>
        </div>
        </div>

        </section>

    </main>
@endsection