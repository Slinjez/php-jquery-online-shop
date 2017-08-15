<?php
if (! isset($_SESSION)) {
    session_start();
}

$pageindx = 4;
?>
<!DOCTYPE html>
<html>
<head>
<?php

include 'includes/htmlhead.php';
?>
<link rel=stylesheet type=text/css href=css/set1.css />
<style type=text/css></style>
</head>
<body>
<div class=header id=home>
<?php

include 'includes/header.php';
?>
</div>
<div class=header-bot>
<?php

include 'includes/searchform.php';
?>
</div>
<div class=ban-top>
<div class=container>
<?php

include 'includes/topnav.php';
?>
<div class=top_nav_right>
<?php

include 'includes/cartinfo.php';
?>
</div>
<div class=clearfix></div>
</div>
</div>
<div class=page-head_agile_info_w3l>
<div class=container>
<h3>
C<span>ontact Us </span>
</h3>
<div class=services-breadcrumb>
<div class=agile_inner_breadcrumb>
<ul class=w3_short>
<li><a href=index.html>Home</a><i>|</i></li>
<li>Contact</li>
</ul>
</div>
</div>
</div>
</div>
<div class=banner_bottom_agile_info>
<div class=container>
<div class=contact-grid-agile-w3s>
<div class="col-md-4 contact-grid-agile-w3">
<div class=contact-grid-agile-w31>
<i class="fa fa-map-marker" aria-hidden=true></i>
<h4>Address</h4>
<p>
Uchumi Business Centre, Opposite Muthaiti <span>Nakuru, Kenya.</span>
</p>
</div>
</div>
<div class="col-md-4 contact-grid-agile-w3">
<div class=contact-grid-agile-w32>
<i class="fa fa-phone" aria-hidden=true></i>
<h4>Call Us</h4>
<p>
0724 651265<span>0725 271327</span>
</p>
</div>
</div>
<div class="col-md-4 contact-grid-agile-w3">
<div class=contact-grid-agile-w33>
<i class="fa fa-envelope-o" aria-hidden=true></i>
<h4>Email</h4>
<p>
<a href=mailto:info@ngeracomputergarage.com>
info@ngeracomputergarage.com</a><span><a href="mailto: info@ngeracomputergarage.com">
support@ngeracomputergarage.com</a></span>
</p>
</div>
</div>
<div class=clearfix></div>
</div>
</div>
</div>
<div class="contact-w3-agile1 map" data-aos=flip-right>
<iframe width=450 height=250 frameborder=0 style=border:0 src="https://www.google.com/maps/embed/v1/search?key=AIzaSyCV0Ttizvdc-zZmSM2rWTb7BL6mzlHgmoM&q=Ngera+Computer+Garage+Geoffrey+Kamau+Avenue+Nakuru" allowfullscreen> </iframe>
</div>
<div class=banner_bottom_agile_info>
<div class=container>
<div class=agile-contact-grids>
<div class=agile-contact-left>
<div class="col-md-6 address-grid">
<h4>
For More <span>Information</span>
</h4>
<div class=mail-agileits-w3layouts>
<i class="fa fa-volume-control-phone" aria-hidden=true></i>
<div class=contact-right>
<p>Phone</p>
<span>0725 271327 | 0724 651265</span>
</div>
<div class=clearfix></div>
</div>
<div class=mail-agileits-w3layouts>
<i class="fa fa-envelope-o" aria-hidden=true></i>
<div class=contact-right>
<p>Mail</p>
<a href=mailto:info@ngeracomputergarage.com>info@ngeracomputergarage.com</a>
</div>
<div class=clearfix></div>
</div>
<div class=mail-agileits-w3layouts>
<i class="fa fa-map-marker" aria-hidden=true></i>
<div class=contact-right>
<p>Location</p>
<span>Uchumi Business Centre, Opposite Muthaiti, Nakuru, Kenya.</span>
</div>
<div class=clearfix></div>
</div>
<ul class="social-nav model-3d-0 footer-social w3_agile_social two contact">
<li class=share>SHARE ON :</li>
<li><a href=# class=facebook>
<div class=front>
<i class="fa fa-facebook" aria-hidden=true></i>
</div>
<div class=back>
<i class="fa fa-facebook" aria-hidden=true></i>
</div>
</a></li>
<li><a href=# class=twitter>
<div class=front>
<i class="fa fa-twitter" aria-hidden=true></i>
</div>
<div class=back>
<i class="fa fa-twitter" aria-hidden=true></i>
</div>
</a></li>
<li><a href=# class=instagram>
<div class=front>
<i class="fa fa-instagram" aria-hidden=true></i>
</div>
<div class=back>
<i class="fa fa-instagram" aria-hidden=true></i>
</div>
</a></li>
<li><a href=# class=pinterest>
<div class=front>
<i class="fa fa-linkedin" aria-hidden=true></i>
</div>
<div class=back>
<i class="fa fa-linkedin" aria-hidden=true></i>
</div>
</a></li>
</ul>
</div>
<div class="col-md-6 contact-form">
<h4 class=white-w3ls>
Contact <span>Form</span>
</h4>
<div class=row>
<div class=col-md-1></div>
<div class=col-md-10>
<div class=removeMessages></div>
<div class=ajax-loader></div>
</div>
<div class=col-md-1></div>
</div>
<form action>
<div class=row style=margin-right:0;margin-left:0;text-align:center>
<span class="input input--haruki"> <input class="input__field input__field--haruki" type=text id=name required> <label class="input__label input__label--haruki" for=input-1> <span class="input__label-content input__label-content--haruki">Your
Name</span>
</label>
</span> <span class="input input--haruki"> <input class="input__field input__field--haruki" type=email id=email required> <label class="input__label input__label--haruki" for=input-2> <span class="input__label-content input__label-content--haruki">Your
Email</span>
</label>
</span> <span class="input input--haruki"> <textarea id=message rows=4 cols=50 class="input__field input__field--haruki" style="border:.25em solid #2fdab8" required> Your Message
				</textarea>
</span>
<div class="agileinfo_more w3_agileits_more">
<input type=submit value="Send Message" id=submitBtn>
</div>
</div>
</form>
</div>
</div>
<div class=clearfix></div>
</div>
</div>
</div>
<div class=coupons>
<?php

include 'includes/bottominfo.php';
?>
</div>
<div class=footer>
<?php

include 'includes/footer.php';
?>
</div>
<?php

include 'includes/botmodals.php';
?>
<a href=#home class=scroll id=toTop style=display:block> <span id=toTopHover style=opacity:1> </span></a>
<?php

include 'includes/scripts.php';
?>
<script type=text/javascript>$(document).ready(function(){$("#submitBtn").click(function(e){var b=document.getElementById("name").value;var a=document.getElementById("email").value;var d=document.getElementById("message").value;var f="contactform";var c={name:b,email:a,message:d,action:f};$.ajax({type:"post",beforeSend:function(){$(".ajax-loader").html('<h4 class="modal-title"><span class="fa fa-spinner fa-spin"></span> Working...</h4>');$(".ajax-loader").css("visibility","visible");$(".removeMessages").html("");$(".removeMessages").css("visibility","hidden");jQuery("#submitBtn").addClass("disabled").show();$("#submitBtn").text("Sending...")},url:"controllers/msgreceiver.php",data:c,dataType:"json",success:function(g){if(g.success==true){$(".ajax-loader").html("");$(".ajax-loader").css("visibility","hidden");$(".removeMessages").html('<div class="alert alert-success alert-dismissible" role="alert"><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button><strong> <span class="glyphicon glyphicon-ok-sign"></span> </strong>'+g.messages+"</div>")}else{$(".ajax-loader").html("");$(".ajax-loader").css("visibility","hidden");$(".removeMessages").html('<div class="alert alert-warning alert-dismissible" role="alert"><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button><strong> <span class="glyphicon glyphicon-exclamation-sign"></span> </strong>'+g.messages+"</div>")}},complete:function(){$(".ajax-loader").html("");$("#formintro").html("");$(".ajax-loader").css("visibility","hidden");$(".removeMessages").css("visibility","visible");jQuery("#submitBtn").removeClass("disabled").show();$("#submitBtn").text("Sent")}});e.preventDefault()})});</script>
<script src=js/jquery.waypoints.min.js type=text/javascript></script>
<script src=js/jquery.countup.js type=text/javascript></script>
<script type=text/javascript>$(".counter").countUp();</script>
<script type=text/javascript src=js/move-top.js></script>
<script type=text/javascript src=js/jquery.easing.min.js></script>
<script type=text/javascript>jQuery(document).ready(function(a){a(".scroll").click(function(b){b.preventDefault();a("html,body").animate({scrollTop:a(this.hash).offset().top},1000)})});</script>
<script type=text/javascript>$(document).ready(function(){$().UItoTop({easingType:"easeOutQuart"})});</script>
</body>
</html>