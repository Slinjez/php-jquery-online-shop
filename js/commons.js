function sleep(e,s){for(var a=(new Date).getTime(),t=0;t<1e7;t++)if((new Date).getTime()-a>e){window.location.href=s;break}}$(document).ready(function(){$(".form-item").submit(function(e){var s=$(this).serialize(),a=$(this).find("input[type=submit]");a.val("Adding..."),$.ajax({url:"controllers/cart_process.php",type:"POST",dataType:"json",data:s}).done(function(e){$("#cart-info").html('<i class="fa fa-shopping-cart"></i> '+e.items),a.val("Add to Cart"),$.Toast("Item added to Cart!",{duration:5e3},{align:"center"}),"block"==$(".shopping-cart-box").css("display")&&$(".cart-box").trigger("click")}),e.preventDefault()}),$(".cart-box").click(function(e){e.preventDefault(),$(".shopping-cart-box").fadeIn(),$("#shopping-cart-results").html('<i class="fa fa-spinner fa-spin fa-fw"></i>'),$("#shopping-cart-results").load("controllers/cart_process.php",{load_cart:"1"})}),$(".close-shopping-cart-box").click(function(e){e.preventDefault(),$(".shopping-cart-box").fadeOut()}),$("#shopping-cart-results").on("click","button.remove-item",function(e){e.preventDefault();var s=$(this).attr("data-code");$(this).parent().fadeOut(),$.getJSON("controllers/cart_process.php",{remove_code:s},function(e){$("#cart-info").html('<i class="fa fa-shopping-cart"></i> '+e.items),$(".cart-box").trigger("click"),$.Toast("Item removed from Cart!",{duration:5e3},{align:"center"})})})}),$(window).load(function(){$(".flexslider").flexslider({animation:"slide",controlNav:"thumbnails"})}),$(document).ready(function(){$("#submitBtn1").click(function(e){var s={sgnupname:document.getElementById("sgnupname").value,sgnupmail:document.getElementById("sgnupmail").value,sgnupps1:document.getElementById("sgnupps1").value,sgnupps2:document.getElementById("sgnupps2").value,signupphone:document.getElementById("signupphone").value};$.ajax({type:"post",beforeSend:function(){$(".ajax-loader").html('<h4 class="modal-title"><span class="fa fa-spinner fa-spin"></span> Working...</h4>'),$(".ajax-loader").css("visibility","visible"),$(".removeMessages").html(""),$(".removeMessages").css("visibility","hidden"),jQuery("#submitBtn1").addClass("disabled").show(),$("#submitBtn1").text("Sending...")},url:"controllers/login3.php",data:s,dataType:"json",success:function(e){if(1==e.success){$(".ajax-loader").html(""),$(".ajax-loader").css("visibility","hidden"),$(".removeMessages").html('<div class="alert alert-success alert-dismissible" role="alert"><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button><strong> <span class="glyphicon glyphicon-ok-sign"></span> </strong>'+e.messages+"</div>");1==e.sendto&&location.reload(),sleep(10,"#")}else $(".ajax-loader").html(""),$(".ajax-loader").css("visibility","hidden"),$(".removeMessages").html('<div class="alert alert-warning alert-dismissible" role="alert"><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button><strong> <span class="glyphicon glyphicon-exclamation-sign"></span> </strong>'+e.messages+"</div>")},complete:function(){$(".ajax-loader").html(""),$(".ajax-loader").css("visibility","hidden"),$(".removeMessages").css("visibility","visible"),jQuery("#submitBtn1").removeClass("disabled").show(),$("#submitBtn1").text("Submit")}}),e.preventDefault()})}),$(document).ready(function(){$("#submitBtn2").click(function(e){var s={lginemail:document.getElementById("lginemail").value,lginps:document.getElementById("lginps").value};$.ajax({type:"post",beforeSend:function(){$(".ajax-loader").html('<h4 class="modal-title"><span class="fa fa-spinner fa-spin"></span> Working...</h4>'),$(".ajax-loader").css("visibility","visible"),$(".removeMessages").html(""),$(".removeMessages").css("visibility","hidden"),jQuery("#submitBtn2").addClass("disabled").show(),$("#submitBtn2").text("Sending...")},url:"controllers/login1.php",data:s,dataType:"json",success:function(e){if(1==e.success){$(".ajax-loader").html(""),$(".ajax-loader").css("visibility","hidden"),$(".removeMessages").html('<div class="alert alert-success alert-dismissible" role="alert"><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button><strong> <span class="glyphicon glyphicon-ok-sign"></span> </strong>'+e.messages+"</div>");1==e.sendto&&location.reload(),sleep(10,"#")}else $(".ajax-loader").html(""),$(".ajax-loader").css("visibility","hidden"),$(".removeMessages").html('<div class="alert alert-warning alert-dismissible" role="alert"><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button><strong> <span class="glyphicon glyphicon-exclamation-sign"></span> </strong>'+e.messages+"</div>")},complete:function(){$(".ajax-loader").html(""),$(".ajax-loader").css("visibility","hidden"),$(".removeMessages").css("visibility","visible"),jQuery("#submitBtn2").removeClass("disabled").show(),$("#submitBtn2").text("Submit")}}),e.preventDefault()})});