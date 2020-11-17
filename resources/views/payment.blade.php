@extends('web.layouts.app')
@section('title')
Make Payment
@endsection
@section('content')
@include('web.includes.nav2')
<main class="main">

        <section class="section__car-gallery section__car-gallery--2 section-padding">
            <div class="container">
                <div class="row">
                    <div class="offset-md-1 col-lg-10 car-8">
                        


                    <div class="payment__form" style="position: relative; overflow:hidden;">
                            <h1 style="text-align: center;font-weight: 700;line-height: 2;color:#fff;">Payment
                                Details <br>
                                <p id="msgs" style="font-weight: 500;font-size: 1.4rem;color:#2d2d2d;">Complete to confirm booking
                                </p>
                            </h1>
                            <img src="{{ asset('public/web/images/pattern.png')}}" alt="pattern-bg" class="pattern">
                    
                        <div class="row">
                            <div class="col-lg-6">

                                <div id="response" style="display:none">
                                <h1 style="text-align: center;font-weight: 700;line-height: 2;color:#fff;">
                                        <p id="responseref" style="font-weight: 500;font-size: 1.4rem;color:#2d2d2d;">
                                        </p>
                                    </h1>
                                    <br>
                                    <p id="msgs" style="font-weight: 500;font-size: 1.4rem;color:grey;">Please save these details properly as it would be used to track your payment and order!
                                    </p>
                                    
                                </div>

                                <div class="viewForm" style="display:block">
                                <form id="bookingForm"  method="post">
                                    <div class="row">
                                    
                                    <input type="text" value="{{$values['mode']}}" name="mode"  id="mode" required hidden>
                                    <input type="text" value="{{$values['type']}}" name="mode"  id="type" required hidden>
                                    <input type="text" value="{{$vehicle->id}}" name="v_id" id="v_id" required hidden>
                                    <input type="text" value="{{$values['price']}}" name="price" id="price" required hidden>
                                    <input type="text" value="{{$route->id ?? ''}}" name="r_id"  id="r_id" hidden>
                                    
                                        <div class="col-lg-12">
                                            <div class="form__input--container">
                                                <input type="text" placeholder="Enter your first and last names" name="name" id="name" value="{{$values['name']}}" required
                                                    class="form__input" />
                                                <label for="name" class="form__input--label">Full Name</label>
                                            </div>
                                        </div>
                                        <div class="col-lg-12">
                                            <div class="form__input--container">
                                                <input type="email" placeholder="Email address" name="email" id="email" value="{{$values['email']}}"
                                                    class="form__input" required/>
                                                <label for="email" class="form__input--label">Email</label>
                                            </div>
                                        </div>
                                        <div class="col-lg-6">
                                            <div class="form__input--container">
                                                <input
                                                    oninput="javascript: if (this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);"
                                                    type="number" maxlength="11" placeholder="Phone number" name="phone" id="phone" value="{{$values['phone']}}"
                                                    class="form__input" required/>
                                                <label for="email" class="form__input--label">Phone number</label>
                                            </div>
                                        </div>
                                        <div class="col-lg-6">
                                            <div class="form__input--container">
                                                <input
                                                    oninput="javascript: if (this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);"
                                                    type="number" maxlength="11" placeholder="Alternative Phone number" value="{{$values['phone2']}}"
                                                    name="phone2" id="phone2" class="form__input"/>
                                                <label for="email" class="form__input--label">Alternative Phone number</label>
                                            </div>
                                        </div>
                                        <div class="offset-md-4">
                                            <div class="form__input--container">
                                                <input style="border: none;" type="submit" value="Submit" id="bookingBtn"
                                                    class="car__item--btn">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                </form>
                            </div>
                            <div class="col-lg-6">
                                <div class="container">
                                    <div class="row">
                                        <div class="offset-md-2 text-center">
                                            <br>
                                            <h4 class="text-center"><b>Or Call to Book Offline! </b></h4>
                                            <br>
                                            <p style="font-size:1.5em;">Vehicle Name : <b>{{$vehicle->vehicle_name}}</b></p>
                                            <p style="font-size:1.5em;">Vehicle ID : <b>{{$vehicle->id}}</b></p>
                                            <p style="font-size:1.5em;">Route : <b>{{ !empty($route) ? $route->start.' - '.$route->end : 'Full Day Booking'}}</b></p>
                                            <p style="font-size:1.5em;margin-bottom:30px;">Please note that calling hours are from <b> 8AM to 5PM</b></p>
                                            <p style="font-size:1.5em"><a href="tel:+2348123282500"><img src="{{ asset('public/images/tel.jpg') }}" style="height:40px;"></a> <b>+2348123282500</b></p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    </div>
                    
                    </div>
                </div>
            </div>
            </div>

        </section>

    </main>
    <script src="{{ asset('public//js/jquery-3.3.1.js') }}"></script>
<script src="https://js.paystack.co/v1/inline.js"></script>

<script>
$(document).ready(function(){
    $.ajaxSetup({
             headers:{
                 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
             }
         });

         $('#bookingForm').submit(function(e){
             e.preventDefault();
             
             var mode = $('#mode').val();
             var type = $('#type').val();
             var price = $('#price').val();
             var email = $('#email').val();
             var phone = $('#phone').val();
             var phone2 = $('#phone2').val();
             var name = $('#name').val();
             var r_id = $('#r_id').val();
             var v_id = $('#v_id').val();
             $('.viewForm').css('display','none');
             $('#msgs').html('Processing.....');

             if(type == '1'){
            //  alert('parttime');

                $.ajax({
                        url: "{{ route('notifyForBooking') }}",
                        type: "POST",
                        data: {mode:mode,name:name,
                                price:price,email:email,phone:phone,
                                phone2:phone2,r_id:r_id,v_id:v_id, },
                            success:function(data){
                                    $('#msgs').html('Booking successful.\n You would be contacted within the next 24 hours!');
                                     $('#responseref').append('<br> Order id is = #'+data.success);
                                
                            }
                        });
             }
             else{
                // alert('full');

                    // var handler = PaystackPop.setup({
                    // key: 'pk_test_62aac6cd7d661e9820dcaad9a510ab80315b5b56',
                    // email: email,
                    // amount: (price*100),
                    // currency: "NGN",
                    // ref: ''+Math.floor((Math.random() * 1000000000) + 1),
                    // metadata: {
                    //     custom_fields: [
                    //         {
                    //             display_name: name,
                    //             variable_name: name,
                    //             value: phone,
                    //         }
                    //     ]
                    // },
                    // callback: function(response){
                    //     // alert('success. transaction ref is ' + response.reference);
                    //     $('#response').css('display','block');
                    //     $('#responseref').append('Payment reference number = #'+response.reference);
                        // console.log('success');
                        $.ajax({
                            url: "{{ route('fulldayBooking') }}",
                            type: "POST",
                            data: {mode:mode,name:name,
                                   price:price,email:email,phone:phone,
                                   phone2:phone2,r_id:r_id,v_id:v_id,
                                   reference: 12345677 },   //response.reference
                                success:function(data){
                                    console.log(data);
                                        $('#msgs').html('Transaction successful.\n Please check your email or dashboard for payment and order details!');
                                        // $('#responseref').append('<br> Order id is = #'+data.success);
                                    
                                }
                        });
                    // },
                    // onClose: function(){
                    //     $('.viewForm').css('display','block');
                    //     $('#msgs').html('Transaction Cancelled');
                    // }
                    // });
                    // handler.openIframe();
                
         }
         });
});
</script>
@endsection