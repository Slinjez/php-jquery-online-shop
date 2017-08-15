<?php
if (! isset($_SESSION)) {
    session_start();
}

$pageindx = 3;

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
Ngera Computer Garage <span> </span>
</h3>
<div class=services-breadcrumb>
<div class=agile_inner_breadcrumb>
<ul class=w3_short>
<li><a href=index.php>Home</a><i>|</i></li>
<li>Product Category</li>
</ul>
</div>
</div>
</div>
</div>
<div class=banner_bottom_agile_info>
<div class=container>
<div class=banner_bottom_agile_info_inner_w3ls>
<?php
foreach ($categoryinfos as $categoryinfo) :
    $categoryid = $categoryinfo['categoryid'];
    $categoryname = $categoryinfo['categoryname'];
    $imgpath = $categoryinfo['categoryimage'];
    ?>
<div class="col-md-6 wthree_banner_bottom_grid_three_left1 grid">
<a href="categoryviewer.php?itm=<?php

    echo $categoryid?>">
<figure class=effect-roxy>
<img src=<?php

    echo $imgpath?> alt=" " class=img-responsive />
<figcaption>
<h3>
<span><?php

    echo $categoryname?></span>
</h3>
<p>Click To View</p>
</figcaption>
</figure>
</a>
</div>
<?php
endforeach
;
?>
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