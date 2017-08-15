<?php
if (! isset($_SESSION)) {
    session_start();
}

$pageindx = 2;
?>
<!DOCTYPE html>
<html>
<head>
<?php

include 'includes/htmlhead.php';
?>
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
About <span>Us </span>
</h3>
<div class=services-breadcrumb>
<div class=agile_inner_breadcrumb>
<ul class=w3_short>
<li><a href=index.php>Home</a><i>|</i></li>
<li>About</li>
</ul>
</div>
</div>
</div>
</div>
<div class=banner_bottom_agile_info>
<div class=container>
<div class=agile_ab_w3ls_info>
<div class="col-md-6 ab_pic_w3ls">
<img src=images/ab_pic.jpg alt=" " class=img-responsive />
</div>
<div class="col-md-6 ab_pic_w3ls_text_info">
<h5>
About Ngera Computer Garage <span></span>
</h5>
<p>Ngera Computer Garage is located in Nakuru Town at Uchumi Business Centre opposite Muthaiti.</p>
<p>We sell printers, photocopiers, computer accessories and stationery.</p>
<p>We also have kyocera, ricoh and sharp toners.</p>
<p>You can buy new original toners and ink cartridges or you can refill.</p>
<p>We offer quality services to our customers</p>
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
<script src=js/modernizr.custom.js type=text/javascript></script>
<script src=js/easy-responsive-tabs.js type=text/javascript></script>
<script type=text/javascript>$(document).ready(function(){$("#horizontalTab").easyResponsiveTabs({type:"default",width:"auto",fit:true,closed:"accordion",activate:function(b){var c=$(this);var a=$("#tabInfo");var d=$("span",a);d.text(c.text());a.show()}});$("#verticalTab").easyResponsiveTabs({type:"vertical",width:"auto",fit:true})});</script>
<script src=js/jquery.waypoints.min.js type=text/javascript></script>
<script src=js/jquery.countup.js type=text/javascript></script>
<script type=text/javascript>$(".counter").countUp();</script>
<script type=text/javascript src=js/move-top.js></script>
<script type=text/javascript src=js/jquery.easing.min.js></script>
<script type=text/javascript>jQuery(document).ready(function(a){a(".scroll").click(function(b){b.preventDefault();a("html,body").animate({scrollTop:a(this.hash).offset().top},1000)})});</script>
<script type=text/javascript>$(document).ready(function(){$().UItoTop({easingType:"easeOutQuart"})});</script>
</body>
</html>