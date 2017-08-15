<?php
if (! isset($_SESSION)) {
    session_start();
}

$pageindx = 3;

$featurecode = 1;

if ($_GET["itm"] == null) {
    header("Location: index.php");
} else {
    $itm = $_GET["itm"];
    $featurecode = $itm;
}

include ('controllers/database.php');

$queryinf = "SELECT products.productid, products.productcategory, products.productname,products.productdescription, products.imgpath,categories.categoryname,productprices.price

FROM `products`

JOIN categories ON products.productcategory=categories.categoryid
JOIN productprices ON products.productid=productprices.productid

WHERE products.productid=$itm
";

$statementinf = $db->prepare($queryinf);
$statementinf->execute();
$productsinfoz = $statementinf->fetchAll();
$statementinf->closeCursor();

foreach ($productsinfoz as $productsinfz) :
    $productid = $productsinfz['productid'];
    $productcategory = $productsinfz['productcategory'];
    $productname = $productsinfz['productname'];
    $description = $productsinfz['productdescription'];
    $imgpath2 = $productsinfz['imgpath'];
    $categoryname = $productsinfz['categoryname'];
    $price = $productsinfz['price'];
endforeach
;
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
<div class=page-head_agile_info_w3l>
<div class=container>
<h3><?php

echo $productname;
?></h3>
<div class=services-breadcrumb>
<div class=agile_inner_breadcrumb>
<ul class=w3_short>
<li><a href=index.php>Home</a><i>|</i></li>
<li><?php

echo $productname;
?></li>
</ul>
</div>
</div>
</div>
</div>
<div class=banner-bootom-w3-agileits>
<form class=form-item action>
<div class=container>
<div class="col-md-4 single-right-left">
<div class="grid images_3_of_2">
<div class=flexslider>
<ul class=slides>
<li data-thumb=<?php

echo $imgpath2;
?>>
<div class=thumb-image>
<img src=<?php

echo $imgpath2;
?> data-imagezoom=true class=img-responsive alt>
</div>
</li>
</ul>
<div class=clearfix></div>
</div>
</div>
</div>
<div class="col-md-8 single-right-left simpleCart_shelfItem">
<h3><?php

echo $productname;
?></h3>
<p>
<span class=item_price>Kes<?php

echo $price;
?></span>
<del></del>
</p>
<div class=color-quality>
<div class=color-quality-right>
<h5>Quality :</h5>
<div class="col-md-6 input-group frm-field required sect">
<span class=input-group-addon>Order</span> <input type=number id=productname required=required value=1 min=1 name=product_qty class=form-control aria-label="Order Quantity"> <span class=input-group-addon>Unit(s)</span>
</div>
</div>
</div>
<div class=occasion-cart>
<br>
<div class="snipcart-details top_brand_home_details item_add single-item hvr-outline-out button2">
<form action=# method=post>
<fieldset>
<input name=product_code type=hidden value=<?php

echo $productid;
?>> <input type=submit name=submit value="Add to cart" class=button />
</fieldset>
</form>
</div>
</div>
<ul class="social-nav model-3d-0 footer-social w3_agile_social single_page_w3ls">
<li class=share>Share On :</li>
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
</div>
</form>
</div>
<div class=clearfix></div>
<div class=responsive_tabs_agileits>
<div id=horizontalTab>
<ul class=resp-tabs-list>
<li>Description</li>
</ul>
<div class=resp-tabs-container>
<div class=tab1>
<div class=single_page_agile_its_w3ls>
<?php

echo $description;
?>
</div>
</div>
</div>
</div>
</div>
<?php

include 'includes/feature.php';
?>
<div></div>
<div></div>
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
<script src=js/imagezoom.js type=text/javascript></script>
<script src=js/easy-responsive-tabs.js type=text/javascript></script>
<script type=text/javascript>$(document).ready(function(){$("#horizontalTab").easyResponsiveTabs({type:"default",width:"auto",fit:true,closed:"accordion",activate:function(b){var c=$(this);var a=$("#tabInfo");var d=$("span",a);d.text(c.text());a.show()}});$("#verticalTab").easyResponsiveTabs({type:"vertical",width:"auto",fit:true})});</script>
<script src=js/jquery.flexslider.js type=text/javascript></script>
<script type=text/javascript>$(window).load(function(){$(".flexslider").flexslider({animation:"slide",controlNav:"thumbnails"})});</script>
<script type=text/javascript src=js/move-top.js></script>
<script type=text/javascript src=js/jquery.easing.min.js></script>
<script type=text/javascript>jQuery(document).ready(function(a){a(".scroll").click(function(b){b.preventDefault();a("html,body").animate({scrollTop:a(this.hash).offset().top},1000)})});</script>
<script type=text/javascript>$(document).ready(function(){$().UItoTop({easingType:"easeOutQuart"})});</script>
</body>
</html>