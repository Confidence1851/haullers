@extends('web.layouts.app')
@section('title')
Home
@endsection
@section('content')
@include('web.includes.banner')
<div class="loader">
         <div class="loader__logo">
             <h1><i class="fal fa-truck-container"></i> Haullersonline.com</h1>
             <p>The transportation site meant to satify your delivery needs</p>
             <div class="skip--btn">Skip</div>
         </div>
         <img src="{{ asset('public/web/images/Loader.gif') }}" alt="loader" />
     </div>

 <main class="main">
         <section class="section__about section-padding">
             <div class="container">
                 <div class="row">
                     <div class="col-lg-6">
                         <img src="{{ asset('public/web/images/pickup-.png') }}" alt="">
                     </div>
                     <div class="col-lg-6">
                         <div class="section__cars--heading">
                             <h1>About Us</h1>
                             <div class="line__container"><span></span> <i class="fal fa-car"></i></div>
                             <!--<p>Mutiple Transportation companies</p>-->

                             <div class="section__about--content">
                                 <p>Haullers Online is an online haulage platform that provides haulage services for businesses and individuals.
                                     We provide all kinds of haulage vehicles ranging from 40ft trucks of both covered and open/flatbed to the smallest capacity trucks.
                                     We also provide haulage services for sand and granite as well as petroleum products both interstate and within Lagos State.
                                 </p>
                                 <p>Some of the products that we offer haulage services for are: <span id="dots">....</span>
                                 </p>
                                 <p id="more" style="display:none">
                                     Petroleum products such as Kerosene, Liquefied Natural Gas, Premium Motor Spirit, Engine Oil, Diesel, and any other related petroleum products.
                                 
                                 <br>
                                    Consumer goods from the manufacturing companies. All consumable goods such as foods and drinks from the manufacturing plants to the distribution or retail destination.
                                    <br>Sand and stones from the dredging sites and quarry sites to the construction sites.
                                    <br>Building materials such as cements, woods, irons, ceiling boards, corrugated sheets, and every other construction materials of these kinds.
                                    <br>Containers from the seaport to the final destination or from destination to the seaport. There are thousands of other goods transported through our haulage services that are not mentioned here.

                                 </p>
                                 <p id="readBtn"><a href="#" id="moreBtn" class="readBtn">Read more <i class="fal fa-arrow-down"></i></a></p> 
                             </div>
                         </div>


                     </div>
                 </div>

                 <div class="brands">
                     <div class="col--3">
                         <h1><i class="fal fa-clock"></i> <br> <span>Always on time </span></h1>
                         <p>
                             Regardless of where you are, we are sure to have a haulage partner around you to attend to all your haulage needs. All you have to do is just send us a mail or give us a call.
                         </p>
                     </div>
                     <div class="col--3">
                         <h1><i class="fal fa-truck"></i> <br> <span>Quick delivery</span></h1>
                         <p>
                            All vehicles listed on our website has been properly examined and passed the FRSC and VIO Road Worthiness requirements making them safe to run on the Nigerian roads, so be rest assured of safe and On-Tome delivery of your goods.                         
                         </p>
                     </div>
                     <div class="col--3">
                         <h1><i class="fal fa-truck-container"></i> <br> <span>All Brands</span></h1>
                         <p>
                            Whatever special requirement you might have regarding hauling of your goods, be it vehicle make, model or size, we are sure to provide you with the best.
                         </p>
                     </div>
                 </div>
             </div>

             </div>
         </section>


         <section class="section__about section__about--2 section-padding">
             <div class="container">
                 <div class="row">
                     <div class="col-lg-6">
                         <div class="section__cars--heading">
                             <h1>Our vision</h1>
                             <div class="line__container"><span></span> <i class="fal fa-car"></i></div>

                             <div class="section__about--content">
                                 <p>
                                     To be recognized as one of the best logistics service providers in the industry offering fair and competitive pricing without compromising our core values, Safety, quality of service and commitment throughout delivery.
                                 </p>
                             </div>
                         </div>
                     </div>
                     <div style="overflow: hidden;" class="col-lg-6">
                         <img id="bg-banner" src="{{ asset('public/web/images/slider-12.png') }}" alt="info-banner">
                     </div>
                 </div>
             </div>

             </div>
         </section>
         
         <section class="section__about section-padding">
             <div class="container">
                 <div class="row">
                     <div class="col-lg-6">
                         <img src="{{ asset('public/web/images/section-bg.png') }}" alt="section-image" class="section-image" />
                     </div> 
                     <div class="col-lg-6">
                         <div class="section__cars--heading">
                             <h1>OUR CORE VALUES</h1>
                             <div class="line__container"><span></span> <i class="fal fa-car"></i></div>
                             <!--<p>Mutiple Transportation companies</p>-->

                             <div class="section__about--content" id="accodionBox">
                                 <p>We at the Haullers Online cherishes the following values: </p>
                                <button class="accordion">Quality</button>
                                    <div class="panel">
                                      <p> Providing value in all that we do. We ensure professionalism, safety and flexibility throughout our entire service and never say "NO" to customers.</p>
                                    </div>
                                    
                                    <button class="accordion">Honesty</button>
                                    <div class="panel">
                                      <p>At Haullers Online, honesty is our policy. It’s about being true to ourselves, to our customers and to society. We believe honesty builds trust, credibility and long-lasting relationships when fulfilling our duties and obligations.</p>
                                    </div>
                                    
                                    <button class="accordion">Intergrity</button>
                                    <div class="panel">
                                      <p>We at Haullers Online conduct our business with highest level of trust, honesty and ethical standards.</p>
                                    </div>
                                    
                                    <button class="accordion">Respect:</button>
                                    <div class="panel">
                                      <p>We respect the rights of all our staffs, customers and partners of Haullers Online and their contributions to the growth, development and success of our company.</p>
                                    </div>
                                    
                                    <button class="accordion">Relationship</button>
                                    <div class="panel">
                                      <p>At Haullers Online, we focus on our customers' need and always try to maintain trust worthy relationship with our customers and partners.</p>
                                    </div>
                                    
                                    <button class="accordion">Improvements</button>
                                    <div class="panel">
                                      <p>We consistently strive to improve our products and services according to the highest required standards and as per customer/partners requirements and that’s why Haullers Online is and will continue to be the best Online Haulage platform.</p>
                                    </div>
                                    
                                    <button class="accordion">Team work</button>
                                    <div class="panel">
                                      <p>At Haullers Online we believe in team work and respect our team members efforts and contribution in order to ensure productivity and promote positive work environment.</p>
                                    </div>
                                    
                                     <button class="accordion">Social Responsibility</button>
                                    <div class="panel">
                                      <p>We incessantly engage with our stakeholders and are committed to meeting the best standards through protecting the environment, safeguarding our employees and building trusted partnership with our communities and customers.</p>
                                    </div>
                             </div>
                         </div>


                     </div>
                 </div>
             </div>

             </div>
         </section>



         <section class="section__cars section-padding">
             <div class="container">
                 <div class="section__cars--heading">
                     <h1>Top Hired Vehicles </h1>
                     <div class="line__container"><span></span> <i class="fal fa-car"></i></div>
                     <p>Various Transportation Systems</p>
                 </div>
                 <div class="row section__cars--content">
                 @foreach($vehiclesAll as $vehicle)
                     <div class="col-lg-3">
                         <img src="{{ asset('public/images/backend_images/products/medium/'.$vehicle->image) }}" alt="">
                         <div class="car__item">
                             <div class="car__item--name"><i class="fa fa-truck-container"></i> {{$vehicle->vehicle_name}}</div>
                             <div class="car__item--description">
                                 <p><span>Status:</span> {{$vehicle->vehicle_status}} </p>
                                 <p><span>Capacity:</span> {{$vehicle->capacity.' '.$vehicle->unit}}</p>
                                 <p><span>Routes:</span> {{$vehicle->routecategory_name}}</p>
                                 <p><span>Use Count:</span> {{$vehicle->use_count}} </p>
                                 <p><span>Price per day:</span> ₦ {{$vehicle->price}}</p>
                             </div>
                         </div>
                         <a href="{{ route('vehicle_info',$vehicle->id) }}" class="car__item--btn">Vehicle Info</a>
                     </div>
                     @endforeach
                 </div>
             </div>

             <div class="row carousel">
                 <div class="main-carousel" data-flickity='{ "cellAlign": "left", "contain": true }'>
                     <div class="col-5 carousel-cell"><img src="{{ asset('public/web/images/logo-1.jpg') }}" alt=""></div>
                     <div class="col-5 carousel-cell"><img src="{{ asset('public/web/images/logo-4.jpg') }}" alt=""></div>
                     <div class="col-5 carousel-cell"><img src="{{ asset('public/web/images/logo-3.png') }}" alt=""></div>
                     <div class="col-5 carousel-cell"><img src="{{ asset('public/web/images/logo-4.png') }}" alt=""></div>
                     <div class="col-5 carousel-cell"><img src="{{ asset('public/web/images/logo-5.jpg') }}" alt=""></div>

                     <div class="col-5 carousel-cell"><img src="{{ asset('public/web/images/logo-1.jpg') }}" alt=""></div>
                     <div class="col-5 carousel-cell"><img src="{{ asset('public/web/images/logo-4.jpg') }}" alt=""></div>
                     <div class="col-5 carousel-cell"><img src="{{ asset('public/web/images/logo-3.png') }}" alt=""></div>
                     <div class="col-5 carousel-cell"><img src="{{ asset('public/web/images/logo-4.png') }}" alt=""></div>
                     <div class="col-5 carousel-cell"><img src="{{ asset('public/web/images/logo-5.jpg') }}" alt=""></div>
                 </div>
             </div>
         </section>

         <!--<section class="section__cars section-padding">-->
         <!--    <div class="container">-->
         <!--        <img src="{{ asset('public/web/images/iveco-seccion.jpg') }}" alt="info-banner" class="section__cars--info-banner">-->

         <!--        <div class="section__cars--heading">-->
         <!--            <h1>Testimonies</h1>-->
         <!--            <div class="line__container"><span></span> <i class="fal fa-car"></i></div>-->
         <!--        </div>-->

         <!--        <div class="testimonies">-->
         <!--            <div class="row">-->
         <!--                <div class="col-lg-12">-->
         <!--                    <div class="main-carousel3" data-flickity='{ "cellAlign": "center", "contain": true }'>-->
         <!--                        <div class="carousel-cell">-->
         <!--                            <img src="{{ asset('public/web/images/logo-1.jpg') }}" alt="testimonies-logo">-->
         <!--                            <p>-->
         <!--                                <span>"</span> Lorem ipsum, dolor sit amet consectetur adipisicing elit. Dicta-->
         <!--                                modi saepe perferendis quia commodi numquam mollitia cupiditate ex. Reiciendis-->
         <!--                                quidem, iusto eum consequuntur delectus aperiam in? Quos-->
         <!--                                reiciendis<span>"</span></p>-->
         <!--                        </div>-->
         <!--                        <div class="carousel-cell">-->
         <!--                            <img src="{{ asset('public/web/images/logo-4.png') }}" alt="testimonies-logo">-->
         <!--                            <p><span>"</span> Lorem ipsum, dolor sit amet consectetur adipisicing elit. Dicta-->
         <!--                                modi saepe perferendis quia commodi numquam mollitia cupiditate ex. Reiciendis-->
         <!--                                quidem, iusto eum consequuntur delectus aperiam in?<span>"</span></p>-->
         <!--                        </div>-->
         <!--                        <div class="carousel-cell">-->
         <!--                            <img src="{{ asset('public/web/images/logo-3.png') }}" alt="testimonies-logo">-->
         <!--                            <p><span>"</span> Lorem ipsum, dolor sit amet consectetur adipisicing elit. Dicta-->
         <!--                                modi saepe perferendis quia commodi numquam mollitia cupiditate ex. Reiciendis-->
         <!--                                quidem, iusto eum consequuntur . <span>"</span></p>-->
         <!--                        </div>-->
         <!--                        <div class="carousel-cell">-->
         <!--                            <img src="{{ asset('public/web/images/logo-1.jpg') }}" alt="testimonies-logo">-->
         <!--                            <p>-->
         <!--                                <span>"</span> Lorem ipsum, dolor sit amet consectetur adipisicing elit. Dicta-->
         <!--                                modi saepe perferendis quia commodi numquam mollitia cupiditate ex. Reiciendis-->
         <!--                                quidem, iusto eum consequuntur delectus aperiam in? Quos-->
         <!--                                reiciendis<span>"</span></p>-->
         <!--                        </div>-->
         <!--                        <div class="carousel-cell">-->
         <!--                            <img src="{{ asset('public/web/images/logo-4.png') }}" alt="testimonies-logo">-->
         <!--                            <p><span>"</span> Lorem ipsum, dolor sit amet consectetur adipisicing elit. Dicta-->
         <!--                                modi saepe perferendis quia commodi numquam mollitia cupiditate ex. Reiciendis-->
         <!--                                quidem, iusto eum consequuntur delectus aperiam in?<span>"</span></p>-->
         <!--                        </div>-->
         <!--                        <div class="carousel-cell">-->
         <!--                            <img src="{{ asset('public/web/images/logo-3.png') }}" alt="testimonies-logo">-->
         <!--                            <p><span>"</span> Lorem ipsum, dolor sit amet consectetur adipisicing elit. Dicta-->
         <!--                                modi saepe perferendis quia commodi numquam mollitia cupiditate ex. Reiciendis-->
         <!--                                quidem, iusto eum consequuntur . <span>"</span></p>-->
         <!--                        </div>-->
         <!--                    </div>-->
         <!--                </div>-->
         <!--            </div>-->
         <!--        </div>-->
         <!--    </div>-->
         <!--</section>-->


         <!--<section class="section__tabs section-padding">-->

         <!--    <div class="container">-->
         <!--        <div class="section__cars--heading">-->
         <!--            <h1>Our Core Values</h1>-->
         <!--            <div class="line__container"><span></span> <i class="fal fa-users"></i></div>-->
         <!--            <p>Various Transportation Systems</p>-->
         <!--            <p>Top hired vehicles are:</p>-->

         <!--               <p>1)	Tankers </p>-->
         <!--               <p>2)	Dyana Trucks  </p>-->
         <!--               <p>3)	Tepper Trucks(10 – 30 tons) carriers </p>-->
         <!--               <p>4)	Covered trucks  </p>-->
         <!--               <p>5)	Container Trailers (20Ft & 40Ft) </p>-->
         <!--               <p>6)	 Mini Trucks and many more.  </p>-->
         <!--               <p>Get in touch with us to check our fleet. </p>-->

         <!--        </div>-->

         <!--        <div class="row">-->
         <!--                <div class="row-box">-->
         <!--                    @foreach($mostuseds as $vehicle)-->
         <!--                       <div class="col-lg-3">-->
         <!--                           <figure class="image-container">-->
         <!--                               <img src="{{ asset('public/images/backend_images/products/large/'.$vehicle->image) }}" alt="">-->
         <!--                           </figure>-->
         <!--                           <div class="car__item car__item--2">-->
         <!--                               <div class="car__item--name"><i class="fa fa-truck-container"></i>-->
         <!--                                {{$vehicle->vehicle_name}}-->
         <!--                               </div>-->
         <!--                               <div class="car__item--description">-->
         <!--                                   <p><span>Status:</span> {{$vehicle->vehicle_status}} </p>-->
         <!--                                   <p><span>Capacity:</span> {{$vehicle->capacity.' '.$vehicle->unit}}</p>-->
         <!--                                   <p><span>Routes:</span> {{$vehicle->routecategory_name}}</p>-->
         <!--                                   <p><span>Use Count:</span> {{$vehicle->use_count}} </p>-->
         <!--                                   <p><span>Price per day:</span> ₦ {{$vehicle->price}}</p>-->
         <!--                               </div>-->
         <!--                               <a href="{{ url('/vehicleinfo/'.$vehicle->id) }}" class="car__item--btn">Vehicle Info</a>-->
         <!--                           </div>-->
         <!--                       </div>-->
         <!--                   @endforeach-->

         <!--                </div>-->

         <!--            </div>-->
         <!--        </div>-->
         <!--    </div>-->
         <!--</section>-->

         <section class="section__newsletter section-padding">

             <div class="container">
                 <div class="section__cars--heading">
                     <h1>Subscribe to our newsletter</h1>
                     <div class="line__container"><span></span> <i class="fal fa-car"></i></div>
                     <p>Monthly updates on new developments</p>
                 </div>
                 <div class="news__box">
                     <div class="row">
                         <div class="col-lg-5 news__content">
                             <div class="news__content--detail">
                                 <h1>Join Our monthly updates</h1>
                                 <p>And <span>50%</span> discount on daily booking. Try it out now</p>
                                 <p><span><i class="fa fa-arrow-down"></i></span></p>
                                 <form action="javascript:void(0);" type="post">{{ csrf_field() }}
                                     <input onfocus="enableSubscriber();" onfocusout="checkSubscriber();" type="email" name="subscriber_email" id="subscriber_email" placeholder="Email Address" required="" 
                                       class="news__content--detail-input">
                                     <button onclick="checkSubscriber(); addSubscriber();" id="btnSubmit" type="submit" class="news__content--detail-btn">Subscribe</button>
                                     <div id="statusSubscribe" style="display: none;"></div>
                                 </form>
                             </div>
                         </div>
                         <div class="col-lg-7 news__bg--box">
                             <img src="{{ asset('public/web/images/news-1.png') }}" alt="" class="news__bg">
                         </div>
                     </div>
                 </div>
             </div>

         </section>

     </main>
     
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

@endsection