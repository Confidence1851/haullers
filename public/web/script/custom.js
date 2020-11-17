
// // Accordion
try{
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
    
    // var accd = document.getElementById('accodionBox');
    // console.log(accd);
    // accordion.style.display= 'none';
}
catch(e){
    
}


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
        
       $(document).ready(function(){
          $('.post_body').each(function(){
              console.log($(this).text());
              var raw_text = $(this).text();
              $(this).text(raw_text.substr(0,200)+' . . . . . . . read more');
          });
       });
          