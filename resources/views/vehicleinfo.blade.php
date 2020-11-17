@extends('web.layouts.app')
@section('title')
{{$vehicle->vehicle_name}}
@endsection
@section('content')
@include('web.includes.nav2')
@section('style')
<style>
.selectlist{
    color:red;
    width:100%;
    height:30px;
    border-radius:20px;
    margin-top:10px;
    font-size:1.6em;

}

</style>
@endsection
@section('content')

<section class="section__car-gallery section__car-gallery--2 section-padding">
    <div class="container">
        <div class="row">
            <div class="col-lg-8 car-8">
                <div class="carousel__box--heading">
                    <h1>{{$vehicle->vehicle_name}} <br> <span>Rent : ₦{{$vehicle->price}}</span></h1>
                    <p>Custormers rating: <span><i class="fa fa-star"></i>
                            <i class="fa fa-star"></i>
                            <i class="fa fa-star"></i>
                            <i class="fa fa-star"></i>
                            <i class="fa fa-star"></i></p>
                </div>
                <div class="carousel__box">
                            <div class="main-carousel2" data-flickity='{ "cellAlign": "left", "contain": true }'>
                                <div class="carousel-cell">
                                    <img src="{{ asset('public/images/backend_images/products/medium/'.$vehicle->image) }}" alt="carousel-images"> 
                                </div>
                                @if(!empty($vehicle->image1))
                                <div class="carousel-cell">
                                    <img src="{{ asset('public/images/backend_images/products/medium/'.$vehicle->image1) }}" alt="carousel-images"> 
                                </div>
                                @endif
                                 @if(!empty($vehicle->image2))
                                <div class="carousel-cell">
                                    <img src="{{ asset('public/images/backend_images/products/medium/'.$vehicle->image2) }}" alt="carousel-images"> 
                                </div>
                                @endif
                                 @if(!empty($vehicle->image3))
                                <div class="carousel-cell">
                                    <img src="{{ asset('public/images/backend_images/products/medium/'.$vehicle->image3) }}" alt="carousel-images"> 
                                </div>
                                @endif
                                
                            </div>
                        </div>
                <div class="carousel__box--description">
                    <h1>Additional info</h1>
                     <p>{{$vehicle->vehicle_description}} </p> 
                </div>
                <div class="row">
                    <div class="col-lg-12">
                        <div class="table--box" style="margin-bottom: 3rem !important;">
                            <table class="table table-bordered">
                                <tr>
                                    <th>Name</th>
                                    <td>{{$vehicle->vehicle_name}}</td>
                                </tr>
                                <tr>
                                    <th>Capacity</th>
                                    <td>{{$vehicle->capacity}} Tonne(s)</td>
                                </tr>
                                <tr>
                                    <th>Availability</th>
                                    <td>{{$vehicle->quantity_available}} available</td>
                                </tr>
                                <tr>
                                    <th>Route</th>
                                    <td>{{$routecategory->name}}</td>
                                </tr>
                                <tr>
                                    <th>Time(s) Used</th>
                                    <td>{{$vehicle->use_count}}</td>
                                </tr>
                            </table>
                        </div>
                    </div>
                </div>
                   
            </div>
            <div class="col-lg-4">
                <div class="car__box car__box--side">
                    <div class="car__box--side--heading">
                        <h1>Book Now!</h1>
                    </div>
                    <div class="car__box--side--content">
                    <form  action="{{ route('bookVehicle') }}" method="post">
                        @csrf
                    <div class="review__box">
                        <div class="review__box--heading">
                            <h3 >Choose what suits <b>"your needs!"</b></h3>                                    
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="form__input--container">

                                <input type="text" name="VehicleID"  value="{{$vehicle->id}}" hidden required/>
                                <input type="text" name="price" id="inPrice" value="{{$vehicle->price}}" hidden required/>

                                <select type="select" class="selectlist" id="type" name="type">
                                    <option value="0" selected>Hire for a day</option>
                                    <option value="1">Hire by destination</option>
                                </select>
                                </div>
                            </div>
                            <div class="col-lg-12">
                                <div class="form__input--container routes" id="routes" style="display:none">
                                    <select type="select" class="selectlist" name="route_id" id="route-id" >
                                        
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-12">
                            <h3><b>Price :</b><span id="price" style="padding-left:10px;">₦ {{$vehicle->price}}</span></h3>
                        </div>

                        <div class="col-lg-12" style="margin-top:27px;">
                            <button type="submit" class="car__item--btn" >Proceed</button>
                        

                        </div>
                    </div>
                </form>
                    </div>
                    <div class="col-lg-12">
                        <div class="car__box car__box--side">
                            <div class="car__box--side--heading">
                                <h1>Related Vehicles</h1>
                            </div>
                            <div class="car__box--side--content">
                                @foreach($relatedVs as $rv)
                                    <div class="car__box--side--tips">
                                        <div class="row">
                                            <div class="col-lg-4">
                                                <img src="{{ asset('public/images/backend_images/products/medium/'.$rv->image) }}" alt="car-item">
                                            </div>
                                            <div class="col-lg-8">
                                                <a href="{{ route('vehicle_info',$rv->id) }}">{{$rv->vehicle_name}}</a>
                                                <br>
                                                <p>Capacity : {{$rv->capacity.' '.$rv->unit}}</p>
                                                <p>Price : {{$rv->price}}</p>
                                              
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                                
                            </div>
                        </div>
                </div>
                
            </div>
        </div>
    </div>
    </div>

</section>
<script src="{{ asset('public//js/jquery-3.3.1.js') }}"></script>
{{--  <script src="{{ asset('public/web/script/jquery.3.3.1.js') }}"></script>  --}}
<script>
$(document).ready(function () {
    let formatter = new Intl.NumberFormat('en-US', {style:'currency', currency:'NGN'});

    $.ajaxSetup({
             headers:{
                 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
             }
         });

    $('#type').change(function(){

        var t = $('#type').val();
        var d = $('.routes');
        var p = $('#price');
        var inP = $('#inPrice');
        var routeCats = $('#route-id');


      
        if(t == "0"){
            d.css('display','none');
            p.html(formatter.format({{$vehicle->price}}));
            inP.val({{$vehicle->price}});
        }
        
        
         if(t == "1"){
           
            p.html('');
            inP.val('');
            routeCats.html('<option disabled selected>Choose Pickup / Dropoff</option>');
             
        

            $.ajax({
                url: "{{ route('catRoutes',$routecategory->id ) }}",
                type: "GET",
                data:{},
                     success:function(data){
                          
                         $.each(data, function(index , values){
                            $.each(values, function(id,items){
                                routeCats.append(new Option(items.start+" - "+items.end, [items.id,items.price] ));
                            });
                         });
                      
                     }
                     
            });
            
             d.css('display','block');  
         }

    });

   
    $('#route-id').change(function(){
            var p = $('#route-id').val();
            var price = p.split(',');
            price = price[1];
            var weight = {{$vehicle->capacity}};
            var unit = "{{$vehicle->unit}}";
            console.log(price);

            if(unit == "Tonne(s)"){
                price = price * weight ;                
            }
            if(unit == "Kg"){
                price = (price/1000) * weight ;                
            }

            $('#price').html(formatter.format(price));
            $('#inPrice').val(price);
        });

});
    
</script>
@endsection

