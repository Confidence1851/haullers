
(function($) {
    "use strict";

    let username = $('#username').text();
    let useremail = $('#useremail').text().trim();
    let userphone = $('#userphone').text().trim();
    var msg = $('.messagealert');
    let formatter = new Intl.NumberFormat('en-US', {style:'currency', currency:'NGN'});
    let success_msg = $('#alert_success').text().trim();
    let error_msg = $('#alert_error').text().trim();
    let notify_msg = $('#notify_msg').text().trim();
    let notification_bar = $('#snackbar');
    notification_bar.css('color','white');
    let searchbar = $('.searchbar');
    let wallet = $('.walletBal');
    let totalDep = 0;
    let notification_loading = 0;
    let last_id = 0;


    let curr_prod_id ,editThisproduct, curr_prod_features = 0, curr_prod_images = 0 , curr_prod_quantity = 0, curr_prod_type = 0;





    /*================================
    Preloader
    ==================================*/

    var preloader = $('#preloader');
    $(window).on('load', function() {
        preloader.fadeOut('slow', function() { $(this).remove(); });
    });

    /*================================
    sidebar collapsing
    ==================================*/
    $('.nav-btn').on('click', function() {
        $('.page-container').toggleClass('sbar_collapsed');
    });

    /*================================
    Start Footer resizer
    ==================================*/
    var e = function() {
        var e = (window.innerHeight > 0 ? window.innerHeight : this.screen.height) - 5;
        (e -= 67) < 1 && (e = 1), e > 67 && $(".main-content").css("min-height", e + "px")
    };
    $(window).ready(e), $(window).on("resize", e);

    /*================================
    sidebar menu
    ==================================*/
    $("#menu").metisMenu();

    /*================================
    slimscroll activation
    ==================================*/
    $('.menu-inner').slimScroll({
        height: 'auto'
    });
    $('.nofity-list').slimScroll({
        height: '435px'
    });
    $('.timeline-area').slimScroll({
        height: '500px'
    });
    $('.recent-activity').slimScroll({
        height: 'calc(100vh - 114px)'
    });
    $('.settings-list').slimScroll({
        height: 'calc(100vh - 158px)'
    });

    /*================================
    stickey Header
    ==================================*/
    $(window).on('scroll', function() {
        var scroll = $(window).scrollTop(),
            mainHeader = $('#sticky-header'),
            mainHeaderHeight = mainHeader.innerHeight();

        // console.log(mainHeader.innerHeight());
        if (scroll > 1) {
            $("#sticky-header").addClass("sticky-menu");
        } else {
            $("#sticky-header").removeClass("sticky-menu");
        }
    });

    /*================================
    form bootstrap validation
    ==================================*/
    $('[data-toggle="popover"]').popover()

    /*------------- Start form Validation -------------*/
    window.addEventListener('load', function() {
        // Fetch all the forms we want to apply custom Bootstrap validation styles to
        var forms = document.getElementsByClassName('needs-validation');
        // Loop over them and prevent submission
        var validation = Array.prototype.filter.call(forms, function(form) {
            form.addEventListener('submit', function(event) {
                if (form.checkValidity() === false) {
                    event.preventDefault();
                    event.stopPropagation();
                }
                form.classList.add('was-validated');
            }, false);
        });
    }, false);

    /*================================
    datatable active
    ==================================*/
    // if ($('#dataTable').length) {
    //     $('#dataTable').DataTable({
    //         responsive: true
    //     });
    // }
    // if ($('#dataTable2').length) {
    //     $('#dataTable2').DataTable({
    //         responsive: true
    //     });
    // }
    // if ($('#dataTable3').length) {
    //     $('#dataTable3').DataTable({
    //         responsive: true
    //     });
    // }


    /*================================
    Slicknav mobile menu
    ==================================*/
    $('ul#nav_menu').slicknav({
        prependTo: "#mobile_menu"
    });

    /*================================
    login form
    ==================================*/
    $('.form-gp input').on('focus', function() {
        $(this).parent('.form-gp').addClass('focused');
    });
    $('.form-gp input').on('focusout', function() {
        if ($(this).val().length === 0) {
            $(this).parent('.form-gp').removeClass('focused');
        }
    });

    /*================================
    slider-area background setting
    ==================================*/
    $('.settings-btn, .offset-close').on('click', function() {
        $('.offset-area').toggleClass('show_hide');
        $('.settings-btn').toggleClass('active');
    });

    /*================================
    Owl Carousel
    ==================================*/
    function slider_area() {
        var owl = $('.testimonial-carousel').owlCarousel({
            margin: 50,
            loop: true,
            autoplay: false,
            nav: false,
            dots: true,
            responsive: {
                0: {
                    items: 1
                },
                450: {
                    items: 1
                },
                768: {
                    items: 2
                },
                1000: {
                    items: 2
                },
                1360: {
                    items: 1
                },
                1600: {
                    items: 2
                }
            }
        });
    }
    slider_area();

    /*================================
    Fullscreen Page
    ==================================*/

    if ($('#full-view').length) {

        var requestFullscreen = function(ele) {
            if (ele.requestFullscreen) {
                ele.requestFullscreen();
            } else if (ele.webkitRequestFullscreen) {
                ele.webkitRequestFullscreen();
            } else if (ele.mozRequestFullScreen) {
                ele.mozRequestFullScreen();
            } else if (ele.msRequestFullscreen) {
                ele.msRequestFullscreen();
            } else {
                console.log('Fullscreen API is not supported.');
            }
        };

        var exitFullscreen = function() {
            if (document.exitFullscreen) {
                document.exitFullscreen();
            } else if (document.webkitExitFullscreen) {
                document.webkitExitFullscreen();
            } else if (document.mozCancelFullScreen) {
                document.mozCancelFullScreen();
            } else if (document.msExitFullscreen) {
                document.msExitFullscreen();
            } else {
                console.log('Fullscreen API is not supported.');
            }
        };

        var fsDocButton = document.getElementById('full-view');
        var fsExitDocButton = document.getElementById('full-view-exit');

        fsDocButton.addEventListener('click', function(e) {
            e.preventDefault();
            requestFullscreen(document.documentElement);
            $('body').addClass('expanded');
        });

        fsExitDocButton.addEventListener('click', function(e) {
            e.preventDefault();
            exitFullscreen();
            $('body').removeClass('expanded');
        });
    }



        $('.textbtn').click(function() {
            alert('hihhhh');
        });

    $(document).ready(function(){

            // console.log('loaded');

            if($('#editThisproduct').text() !== ''){
                curr_prod_id = $('#editThisproduct').text() ;
            };
            


            //Format wallet balance
            var walletVal = wallet.text();
            wallet.text(formatter.format(walletVal));

            if(success_msg != ""){
                alertNotify(success_msg,"green");
            }
            else if(error_msg != ""){
                alertNotify(error_msg,"red");
            }
            else if(notify_msg != ""){
                alertNotify(notify_msg,"blue");
            }

            $.ajaxSetup({
                     headers:{
                         'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                     }
                 });

                
 
    function alertNotify(msg,bgcolor){
        notification_bar.css('background_color',bgcolor);
        notification_bar.text(msg);
        notification_bar.addClass("show");

        setTimeout(function(){
             notification_bar.removeClass('show');
             }, 7000);
        console.log('Message shown!');
    }

    $.fn.isInViewport = function(){
        var elementTop = $(this).offset().top;
        var elementBottom = elementTop + $(this).outerHeight();
        var viewportTop = $(window).scrollTop();
        var viewportBottom = viewportTop + $(window).height();
        // console.log(elementTop);

        return (elementBottom > viewportTop) && (elementTop < viewportBottom - $(this).height());
    }

    $('.nofity-list').scroll(function(){
        var bot = $('.bottomcontent')
        console.log(notification_loading);

        if (bot.isInViewport()){

            if(notification_loading == 0){
                bot.css('display','block');
                notification_loading = 1;
                console.log(notification_loading);

                notifications(last_id);
            }
            
        }
        else{
            bot.css('display','none');
            console.log('im not here');
        }
    });

    function notifications(id){
        
        $.ajax({
            url: "/get-notifications",
            type: "GET",
            data: {last:id},
                success:function(data){
                    
                    console.log(data);
                    $('.notify-content').append('<a href="#" class="notify-item">'+
                                        '<div class="notify-thumb"><i class="ti-key btn-primary"></i></div>'+
                                        '<div class="notify-text">'+
                                            '<p>Added</p>'+
                                            '<span>Just Now</span>'+
                                        '</div>'+
                                    '</a>'+
                                    '<a href="#" class="notify-item">'+
                                        '<div class="notify-thumb"><i class="ti-key btn-primary"></i></div>'+
                                        '<div class="notify-text">'+
                                            '<p>Added</p>'+
                                            '<span>Just Now</span>'+
                                        '</div>'+
                                    '</a>'+
                                    '<a href="#" class="notify-item">'+
                                        '<div class="notify-thumb"><i class="ti-key btn-primary"></i></div>'+
                                        '<div class="notify-text">'+
                                            '<p>Added</p>'+
                                            '<span>Just Now</span>'+
                                        '</div>'+
                                    '</a>'+
                                    '<a href="#" class="notify-item">'+
                                        '<div class="notify-thumb"><i class="ti-key btn-primary"></i></div>'+
                                        '<div class="notify-text">'+
                                            '<p>Added</p>'+
                                            '<span>Just Now</span>'+
                                        '</div>'+
                                    '</a>'+
                                    '<a href="#" class="notify-item">'+
                                        '<div class="notify-thumb"><i class="ti-key btn-primary"></i></div>'+
                                        '<div class="notify-text">'+
                                            '<p>Added</p>'+
                                            '<span>Just Now</span>'+
                                        '</div>'+
                                    '</a>'+
                                    '<a href="#" class="notify-item">'+
                                        '<div class="notify-thumb"><i class="ti-key btn-primary"></i></div>'+
                                        '<div class="notify-text">'+
                                            '<p>Added</p>'+
                                            '<span>Just Now</span>'+
                                        '</div>'+
                                    '</a>'
                    );
                    setTimeout(function(){
                        notification_loading = 0;
                        console.log('Loaded');
                    }, 5000);
                bot.css('display','none');
                },
                error:function(){
                    notification_loading = 0;
                    console.log('error');
                }
        });
    }



    // start add product fucntion

    $('#addprod').click(function(e){
        e.preventDefault();
        add_edit_product("/add-product","add");
    });

    $('#editprod').click(function(e){
        e.preventDefault();
        add_edit_product("/update-product/"+curr_prod_id,"edit");
    });

    function add_edit_product(url,mode){
        var Pname = $('#prodname').val();
        var Ptype = $('#prodtype').val();
        var Pcat = $('#prodcat').val();

        if(Pname.length > 0 && Ptype != null){
        
            $.ajax({
                url: url,
                type: "POST",
                data: {name:Pname,type:Ptype,category:Pcat},
                    success:function(data){
                        curr_prod_id = data.id;
                        if(mode === 'add'){
                            $('#prodname').attr('disabled',true);
                            $('#prodtype').attr('disabled',true);
                            $('#addprod').attr('disabled',true);
                            $('#prodcat').attr('disabled',true);
                            $('#addprod').text('Added');
                            $('#addprod').css('background_color','green');
                        }
                        else{
                            $('#editprod').text('Edited');
                            $('#editprod').css('background_color','green');
                        }

                    },
                    error:function(){
                       alertNotify('Product name already exists','red');
                    }
            });

        }
        // else{
        //     console.log('empty');
        // }

    }

// end add product function

// add product images

    $('#new_img').click(function(e){
        e.preventDefault();
        $('#prodimage').trigger('click');
    });

    $('#prodimage:file').change(function(){
        var file = this.files[0];

        if(file.size > 3000000){
            alert('Image file too large');
        }
        else{
            var formdata = new FormData();
            formdata.append("product_id",curr_prod_id);
            formdata.append("image",file);

        $.ajax({
            url: "/add-product-image",
            type: "POST",
            enctype: 'multipart/form-data',
            cache: false,
            contentType: false,
            processData: false,
            data: formdata ,
                success:function(data){
                    $('.product_images').prepend('<div class="col-md-2"><img src="product_images/'+data.image+'" alt="" style="max-height: fit-content;"/><a href="#" class="btn btn-sm btn-danger fr delbtn-float del_img" id="'+data.id+'"><i class="ti-trash"></i></a></div> ');
                    curr_prod_images++;
                }

            });

        }
    });
// end add images

// del images

    $(document).on('click', '.del_img',function(e){
        e.preventDefault();
        var prt = $(this).parent();
        $.ajax({
            url: "/delete-product-image",
            type: "GET",
            data: {img_id:$(this).attr('id')},
                success:function(data){
                    prt.css('display','none');
                    alertNotify(data.msg,'green');
                    curr_prod_images--;
                }
            });

    });

// end del images

// add quantity

    $('#addprodquantity').click(function(e){

        var Pquan = $('#prodquantity').val();
        var Pdisc = $('#proddiscount').val();

        if(Pquan.length > 0 && Pdisc.length > 0){
        e.preventDefault();

            $.ajax({
                url: "/add-quantity",
                type: "POST",
                data: {product_id:curr_prod_id,quantity:Pquan,discount:Pdisc},
                    success:function(data){
                        $('.quantity_list').append('<div class="mb-2"> Quantity - <b> '+ data.quantity +' </b> <span class="moreinfo">Discount - <b> N'+data.discount +' </b></span> <a href="#" class="btn btn-sm btn-danger fr del_quantity" id="'+ data.id +'"><i class="ti-trash"></i></a></div>');
                        $('#prodquantity').val('');
                        $('#proddiscount').val('')
                        curr_prod_quantity++;
                    }

            });
        }

    });

//end add quantity

    
// del quantity

    $(document).on('click', '.del_quantity',function(e){
        e.preventDefault();
        console.log('click');
        var prt = $(this).parent();
        $.ajax({
            url: "/delete-quantity",
            type: "GET",
            data: {id:$(this).attr('id')},
                success:function(data){
                    prt.css('display','none');
                    alertNotify(data.msg,'green');
                    curr_prod_quantity--;
                }
            });

    });

// end del quantity


// add prod type
    $('#addprodtype').click(function(e){

        var Ptype = $('#prodtypename').val();
        var Pprice = $('#prodtypeprice').val();

        if(Ptype.length > 0 && Pprice.length > 0){
        e.preventDefault();

            $.ajax({
                url: "/add-producttype",
                type: "POST",
                data: {product_id:curr_prod_id,name:Ptype,price:Pprice},
                    success:function(data){
                        $('.pricetype_list').append('<div class="mb-2"> '+ data.name +' - <b> N'+data.price +' per 1 </b> </span> <a href="#" class="btn btn-sm btn-danger fr del_prodtype" id="'+ data.id +'"><i class="ti-trash"></i></a></div>');
                        $('#prodtypename').val('');
                        $('#prodtypeprice').val('');
                        curr_prod_type++;
                    }

            });
        }

    });
// end add type

        
    // del type

    $(document).on('click', '.del_prodtype',function(e){
        e.preventDefault();
        console.log('click');
        var prt = $(this).parent();
        $.ajax({
            url: "/delete-producttype",
            type: "GET",
            data: {id:$(this).attr('id')},
                success:function(data){
                    prt.css('display','none');
                    alertNotify(data.msg,'green');
                    curr_prod_type--;
                }
            });

    });

    // end del type


    // add prod type
    $('#addprodfeature').click(function(e){

        var Pfeature = $('#prodfeature').val();

        if(Pfeature.length > 0){
        e.preventDefault();

            $.ajax({
                url: "/add-feature",
                type: "POST",
                data: {product_id:curr_prod_id,text:Pfeature},
                    success:function(data){
                        $('.features_list').append('<li class="mb-2"> '+ data.text +' <a href="#" class="btn btn-sm btn-danger fr del_feature" id="'+ data.id +'"><i class="ti-trash"></i></a></li>');
                        $('#prodfeature').val('');
                        curr_prod_features++;
                    }

            });
        }

    });
    // end add type

        
    // del type

    $(document).on('click', '.del_feature',function(e){
        e.preventDefault();
        var prt = $(this).parent();
        $.ajax({
            url: "/delete-feature",
            type: "GET",
            data: {id:$(this).attr('id')},
                success:function(data){
                    prt.css('display','none');
                    alertNotify(data.msg,'green');
                    curr_prod_features--;
                }
            });

    });

    // end del type


    
    // add prod spec

    $('#newspecform').on('submit',function(e){
        e.preventDefault();
        var formdata = new FormData(this);

        formdata.append("product_id",curr_prod_id);

            $.ajax({
                url: "/add-spec",
                type: "POST",
                cache: false,
                contentType: false,
                processData: false,
                data: formdata ,
                        success:function(data){
                            $('.specs_list').append('<div class="row mb-2" id="spec-'+ data.id +'">'+
                                    '<div class="col-5"><img src="spec_images/'+data.img+'" alt=""></div>'+
                                    '<div class="col-7"><p><b>'+data.name+'</b> <a href="#" class="btn btn-sm btn-danger fr del_spec" id="'+ data.id +'"><i class="ti-trash"></i></a></p><p>'+data.caption+'</p></div>'+
                                '</div>');
                            $('#prodspecname').val('');
                            $('#prodspeccaption').val('');
                            $('#prodspecimage').val('');
                        }

                });

    });

    // end add type

        
    // del type

    $(document).on('click', '.del_spec',function(e){
        e.preventDefault();
        var prt = $('#spec-'+$(this).attr('id'));
        $.ajax({
            url: "/delete-spec",
            type: "GET",
            data: {id:$(this).attr('id')},
                success:function(data){
                    prt.css('display','none');
                    alertNotify(data.msg,'green');
                }
            });

    });

    // end del type


    // save product
    $('#saveproduct').click(function(){
        if(curr_prod_id == undefined){
            alertNotify('Add product name and type to proceed!','red');
        }
        else if(curr_prod_images < 1){
            alertNotify('Add product image!','red');
        }
        else if(curr_prod_quantity < 1){
            alertNotify('Add product quantity!','red');
        }
        else if(curr_prod_type < 1){
            alertNotify('Add product types!','red');
        }
        else if(curr_prod_features < 1){
            alertNotify('Add product feature!','red');
        }
        else{
            window.open('/save-product/'+curr_prod_id,'_self');
        }
    });




    

    $('.logoutbtn').click(function(e){
        e.preventDefault();
        document.getElementById('logout-form').submit();
    });
});


})(jQuery);
