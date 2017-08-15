<?php
if (! isset($_SESSION)) {
    session_start();
}

$pageindx = 1;
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
<div class=header-bot_inner_wthreeinfo_header_mid>
<?php

include 'includes/searchform.php';
?>
</div>
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
<?php

include 'includes/signupandlogin.php';
?>
<div id=myCarousel class="carousel slide" data-ride=carousel>
<ol class=carousel-indicators>
<li data-target=#myCarousel data-slide-to=0 class=active></li>
<li data-target=#myCarousel data-slide-to=1 class></li>
<li data-target=#myCarousel data-slide-to=2 class></li>
<li data-target=#myCarousel data-slide-to=3 class></li>
<li data-target=#myCarousel data-slide-to=4 class></li>
</ol>
<div class=carousel-inner role=listbox>
<div class="item active">
<div class=container>
<div class=carousel-caption>
<h3>
The Biggest <span>Sale</span>
</h3>
<p>Special for today</p>
<a class="hvr-outline-out button2" href=#>Shop Now </a>
</div>
</div>
</div>
<div class="item item2">
<div class=container>
<div class=carousel-caption>
<h3>
Best <span>Collection</span>
</h3>
<p>New Arrivals On Sale</p>
<a class="hvr-outline-out button2" href=#>Shop Now </a>
</div>
</div>
</div>
<div class="item item3">
<div class=container>
<div class=carousel-caption>
<h3>
The Biggest <span>Sale</span>
</h3>
<p>Special for today</p>
<a class="hvr-outline-out button2" href=#>Shop Now </a>
</div>
</div>
</div>
<div class="item item4">
<div class=container>
<div class=carousel-caption>
<h3>
Best <span>Collection</span>
</h3>
<p>New Arrivals On Sale</p>
<a class="hvr-outline-out button2" href=#>Shop Now </a>
</div>
</div>
</div>
<div class="item item5">
<div class=container>
<div class=carousel-caption>
<h3>
The Biggest <span>Sale</span>
</h3>
<p>Special for today</p>
<a class="hvr-outline-out button2" href=#>Shop Now </a>
</div>
</div>
</div>
</div>
<a class="left carousel-control" href=#myCarousel role=button data-slide=prev> <span class="glyphicon glyphicon-chevron-left" aria-hidden=true></span> <span class=sr-only>Previous</span>
</a> <a class="right carousel-control" href=#myCarousel role=button data-slide=next> <span class="glyphicon glyphicon-chevron-right" aria-hidden=true></span>
<span class=sr-only>Next</span>
</a>
</div>
<div class=new_arrivals_agile_w3ls_info>
<div class=container>
<h3 class=wthree_text_info>
New <span>Arrivals</span>
</h3>
<?php

// include 'includes/newarrivals.php';
?>
<br>
<?php

include 'includes/arrivalstab2.php';
?>
</div>
</div>
<div class=sale-w3ls>
<div class=container>
<h6>
We Offer Flat <span>40%</span> Discount
</h6>
<a class="hvr-outline-out button2" href=#>Shop Now </a>
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