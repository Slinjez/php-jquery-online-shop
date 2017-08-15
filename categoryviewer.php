<?php
if (! isset($_SESSION)) {
    session_start();
}

$pageindx = 3;

if ($_GET["itm"] == null) {
    header("Location: index.php");
} else {
    $itm = $_GET["itm"];
    $featurecode = $itm;
}

include ('controllers/database.php');

$query = "SELECT products.productid, products.productcategory, products.productname,products.productdescription, products.imgpath,categories.categoryname,productprices.price

FROM `products`

JOIN categories ON products.productcategory=categories.categoryid
JOIN productprices ON products.productid=productprices.productid

WHERE products.productcategory=$itm
";

$statement = $db->prepare($query);
$statement->execute();
$productsinfos = $statement->fetchAll();
$statement->closeCursor();

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
<?php
$querycat = "SELECT `categoryid`, `categoryname` FROM `categories` WHERE `categoryid`=$itm";

$statement1 = $db->prepare($querycat);
$statement1->execute();
$catinfos = $statement1->fetchAll();
$statement1->closeCursor();

if ($catinfos == null) {
    header("Location: index.php");
}

foreach ($catinfos as $catinfo) :
    $catid = $catinfo['categoryid'];
    $categoryname = $catinfo['categoryname'];
endforeach
;
?>
<div class=page-head_agile_info_w3l>
<div class=container>
<h3><?php

echo $categoryname;
?></h3>
<div class=services-breadcrumb>
<div class=agile_inner_breadcrumb>
<ul class=w3_short>
<li><a href=index.php>Home</a><i>|</i></li>
<li><?php

echo $categoryname;
?></li>
</ul>
</div>
</div>
</div>
</div>
<div class=banner-bootom-w3-agileits>
<div class=container>
<div class="col-md-12 products-right">
<h5><?php

echo $categoryname;
?><span></span>
</h5>
<div class=sort-grid>
<?php
if ($productsinfos == null) {

    echo '<div class="col-md-4 product-men"><h2>We are stocking this category. Check again soon.</h2></div>';
}
?>
</div>
<?php

foreach ($productsinfos as $productsinfo) :
    $productid = $productsinfo['productid'];
    $productcategory = $productsinfo['productcategory'];
    $productname = $productsinfo['productname'];
    $description = $productsinfo['productdescription'];
    $imgpath = $productsinfo['imgpath'];
    $categoryname = $productsinfo['categoryname'];
    $price = $productsinfo['price'];

    ?>
<div class="col-md-4 product-men">
<div class="men-pro-item simpleCart_shelfItem">
<div class=men-thumb-item>
<img height=250px src=<?php

    echo $imgpath?> alt class=pro-image-front> <img height=250px src=<?php

    echo $imgpath?> alt class=pro-image-back>
<div class=men-cart-pro>
<div class=inner-men-cart-pro>
<a href="info.php?itm=<?php

    echo $productid?>" class=link-product-add-cart>Quick View</a>
</div>
</div>
<span class=product-new-top>New</span>
</div>
<div class=item-info-product>
<h4>
<a href="info.php?itm=<?php

    echo $productid?>"><?php

    echo $productname?></a>
</h4>
<div class=info-product-price>
<span class=item_price>Kes<?php

    echo $price?></span>
<del></del>
</div>
<form class=form-item action>
<div class=input-group>
<span class=input-group-addon>Order</span> <input type=number id=productname required=required value=1 min=1 name=product_qty class=form-control aria-label="Order Quantity"> <span class=input-group-addon>Unit(s)</span>
</div>
<div class="snipcart-details top_brand_home_details item_add single-item hvr-outline-out button2">
<fieldset>
<input name=product_code type=hidden value=<?php

    echo $productid;
    ?>>
<input type=submit name=submit value="Add to cart" class=button />
</fieldset>
</div>
</form>
</div>
</div>
</div>
<?php
endforeach
;
?>
<div class=clearfix></div>
</div>
<div class=clearfix></div>
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
<script src=js/responsiveslides.min.js type=text/javascript></script>
<script type=text/javascript>$(function(){$("#slider3").responsiveSlides({auto:true,pager:true,nav:false,speed:500,namespace:"callbacks",before:function(){$(".events").append("<li>before event fired.</li>")},after:function(){$(".events").append("<li>after event fired.</li>")}})});</script>
<script src=js/modernizr.custom.js type=text/javascript></script>
<script src=js/minicart.min.js type=text/javascript></script>
<script type=text/javascript>paypal.minicart.render({action:"#"});if(~window.location.search.indexOf("reset=true")){paypal.minicart.reset()}</script>
<script type=text/javascript>$(window).load(function(){$("#slider-range").slider({range:true,min:0,max:9000,values:[1000,7000],slide:function(a,b){$("#amount").val("$"+b.values[0]+" - $"+b.values[1])}});$("#amount").val("$"+$("#slider-range").slider("values",0)+" - $"+$("#slider-range").slider("values",1))});</script>
<script type=text/javascript src=js/jquery-ui.js></script>
<script type=text/javascript src=js/move-top.js></script>
<script type=text/javascript src=js/jquery.easing.min.js></script>
<script type=text/javascript>jQuery(document).ready(function(a){a(".scroll").click(function(b){b.preventDefault();a("html,body").animate({scrollTop:a(this.hash).offset().top},1000)})});</script>
<script type=text/javascript>$(document).ready(function(){$().UItoTop({easingType:"easeOutQuart"})});</script>
</body>
</html>