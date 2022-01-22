
<footer class="footer section-padding">
    <div class="container">
        <div class="row">
            <div class="col-lg-4">
                <div class="footer__content">
                    <h1 class="footer__headings">About Us</h1>
                    <h1 class="footer__logo"><i class="fal fa-truck-container"></i> Haullers</h1>
                    <p class="footer__paragraph">Haullers Online is an online haulage platform that provides haulage services for businesses and individuals. We provide all kinds of haulage vehicles ranging from 40ft trucks of both covered and open/flatbed to the smallest capacity trucks. We also provide haulage services for sand and granite as well as petroleum products both interstate and within Lagos State.  
                    </p>
                </div>
            </div>
            <div class="col-lg-4">
                <div class="footer__content">
                    <h1 class="footer__headings">Follow Us</h1>
                    <p class="footer__paragraph--active"><span> <a href="https://facebook.com/haullersonline" class="text-grey" target="_blank"> <i class="fab fa-facebook"></i>  facebook   </a>  </span></p>
                    <p class="footer__paragraph--active"><span> <a href="https://instagram.com/haullersonline" class="text-grey" target="_blank"> <i class="fab fa-instagram"></i>  instagram  </a>   </span></p>
                    {{-- <p class="footer__paragraph--active"><span> <a href="https://twitter.com/haullersonline" class="text-grey" target="_blank"> <i class="fal fa-mobile"></i>  twitter.com/haullersonline   </a>  </span></p> --}}
                    <p class="footer__paragraph--active"><span> <a href="https://linkedIn.com/showcase/haullers-online" class="text-grey" target="_blank"> <i class="fab fa-linkedin"></i>  linkedIn   </a>  </span></p>
                </div>
            </div>
            <div class="col-lg-4">
                <div class="footer__content">
                    <h1 class="footer__headings">Get in touch</h1>
                    <p class="footer__paragraph">Check in with us at:</p>
                    <p class="footer__paragraph--active"><span><i class="fal fa-map-marker"></i> 7/9 Muritala Eletu Way, Osapa London, Lekki II, Lagos, Nigeria.
                            </span></p>
                    <p class="footer__paragraph--active"><span> <a href="tel:+234-8123282500" class="text-grey"> <i class="fal fa-mobile"></i> +234-8123282500  </a> </span>
                    </p>
                    <p class="footer__paragraph--active"><span><i class="fal fa-envelope"></i><a href="mailto:info@haullersonline.com" class="text-grey"> info@haullersonline.com</a></span></p>
                </div>
            </div>
        </div>
    </div>
    <div class="footer__copyright">
        <p>Copyright <i class="fal fa-copyright"></i> 2019 - 2022 All rights reserved</p>
    </div>
</footer>   
         <!-- Script for boostrap -->
    <script src="{{ asset('public/web/sass/vendours/boostrap/js/bootstrap.js') }}"></script>

    <!-- External Script -->
    <script src="{{ asset('public/web/script/main.js') }}"></script>

    <script>
        function checkSubscriber(){
            var subscriber_email = $("#subscriber_email").val();
            $.ajax({
                type:'post',
                url:'/check-subscriber-email',
                data:{subscriber_email:subscriber_email},
                success:function(resp){
                    if(resp == "exists"){
                        /*alert("Subscriber Email already exists!");*/
                        $("#statusSubscribe").show();
                        $("#btnSubmit").hide();
                        $("#statusSubscribe").html("<div style='margin-top:10px;'>&nbsp;</div><font color='red'><h4>Subscriber Email already exists!</font></h4>");
                    }
                },error:function(){
                    alert("Error");
                }
            });
        }

        function addSubscriber(){
            var subscriber_email = $("#subscriber_email").val();
            $.ajax({
                type:'post',
                url:'/add-subscriber-email',
                data:{subscriber_email:subscriber_email},
                success:function(resp){
                    if(resp == "exists"){
                        /*alert("Subscriber Email already exists!");*/
                        $("#statusSubscribe").show();
                        $("#btnSubmit").hide();
                        $("#statusSubscribe").html("<div style='margin-top:10px;'>&nbsp;</div><font color='red'><h4>Error: Subscriber Email already exists!</font></h4>");
                    }else if(resp=="saved"){
                        $("#statusSubscribe").show();
                        $("#statusSubscribe").html("<div style='margin-top:10px;'>&nbsp;</div><font color='green'><h4>Success: Thanks for Subscribing!</font></h4>");
                    }
                }
            });
        }

        function enableSubscriber(){
            $("#btnSubmit").show();
            $("#statusSubscribe").hide();
        }
        $(document).on('click','#moreBtn',function(e){
            e.preventDefault();
            $('#dots').css('display','none');
            $('#more').css('display','block');
            $('#readBtn').html('<a href="#" id="lessBtn">Read less</a>');
        });
        
        $(document).on('click','#lessBtn',function(e){
            e.preventDefault();
            $('#dots').css('display','block');
            $('#more').css('display','none');
            $('#readBtn').html('<a href="#" id="moreBtn">Read more</a>');
        });
    </script>