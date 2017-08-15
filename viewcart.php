<?php
?>
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
<input type=hidden id=info value>
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
Check Out <span> </span>
</h3>
<div class=services-breadcrumb>
<div class=agile_inner_breadcrumb>
<ul class=w3_short>
<li><a href=index.php>Home</a><i>|</i></li>
<li>Check Out</li>
</ul>
</div>
</div>
</div>
</div>
<div class=banner_bottom_agile_info>
<div class=container>
<div class=row>
<div class=col-md-1></div>
<div class=col-md-10>
<div class=removeMessages></div>
<div class=ajax-loader></div>
</div>
<div class=col-md-1></div>
</div>
<div class=row>
<?php
$shipping_cost = 0;
if (isset($_SESSION["products"]) && count($_SESSION["products"]) > 0) {
    $total = 0;
    $list_tax = '';
    $cart_box = '<ul class="view-cart">';
    $counter = 1;
    echo '<div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                  <div class="x_title">
                    <h2>My Cart <small>Click on the cart button to edit</small></h2>

                    <div class="clearfix"></div>
                  </div>
                  <div class="x_content">
                    <table class="table table-hover table-responsive">
                      <thead>
                        <tr>
                          <th>#</th>
                          <th>Item</th>
                          <th>Quantity</th>
                          <th>Price</th>
                        </tr>
                      </thead>
                      <tbody>';
    foreach ($_SESSION["products"] as $product) {
        $product_name = $product["productname"];
        $product_price = $product["price"];
        $product_code = $product["product_code"];
        $product_qty = $product["product_qty"];
        $product_img = $product["imgpath"];

        $item_price = sprintf("%01.2f", ($product_price * $product_qty)); // price x qty = total item price

        echo '<tr><th scope="row">' . $counter . '</th>  <td>' . $product_name . '</td> <td>' . $product_qty . '</td> <td>' . $currency . $item_price . '</td></tr>';

        $subtotal = ($product_price * $product_qty); // Multiply item quantity * price
        $total = ($total + $subtotal); // Add up to total price
        $counter ++;
    }
    echo '</tbody>
                    </table>

                  </div>
                </div>
              </div>';
    ?>
</div>
<div class=row>
<div class="col-md-12 col-sm-12 col-xs-12">
<?php
    $checkoutbut = "";
    $grand_total = $total + $shipping_cost; // grand total

    foreach ($taxes as $key => $value) { // list and calculate all taxes in array
        $tax_amount = round($total * ($value / 100));
        $tax_item[$key] = $tax_amount;
        $grand_total = $grand_total + $tax_amount;
    }

    foreach ($tax_item as $key => $value) { // taxes List
        $list_tax .= $key . ' ' . $currency . sprintf("%01.2f", $value) . '<br />';
    }

    $shipping_cost = ($shipping_cost) ? '<shipper>Shipping Cost :</shipper> <importantcosts>' . $currency . sprintf("%01.2f", $shipping_cost) . ' (Per Kilometer)</importantcosts><br />' : '';

    $cart_box .= "<li class=\"view-cart-total\">$shipping_cost  <hr><shipper>Payable Amount :</shipper><importantcosts> $currency " . sprintf("%01.2f", $grand_total) . "</importantcosts></li>";
    $cart_box .= "</ul>";

    echo $cart_box;
} else {
    $checkoutbut = "disabled";
    echo "<importantcosts style=\"color:red\">Your Cart is empty</importantcosts> Click <a href=\"gencategory.php\"><importantcosts>HERE</importantcosts></a> to shop.<br>";
}
?>
</div>
<?php
if (isset($_SESSION['userid']) == true) {
    $butstat = "";
    $buttext = '<span class="fa fa-truck"></span>&nbsp;Check Out';
    $butmodal = "";
    $butid = "submitBtnchckout";
} else {
    $butstat = "";
    $buttext = '<span class="fa fa-user"></span>&nbsp;Login to checkout';
    $butmodal = 'data-toggle="modal" data-target="#myModal"';
    $butid = "";
}

?>
<div class="col-md-12 col-sm-12 col-xs-12">
<button type=submit id=<?php

echo $butid;
?> <?php

echo $butmodal;
?> class="btn btn-success btn-block <?php

echo $checkoutbut;
?>" style=background-color:#2fdab8>
<?php

echo $buttext;
?>
</button>
</div>
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
<script type=text/javascript>$(document).ready(function(){$("#submitBtnchckout").click(function(c){var a=document.getElementById("info").value;var b={coordz:a};$.ajax({type:"post",beforeSend:function(){$(".ajax-loader").html('<h4 class="modal-title"><span class="fa fa-spinner fa-spin"></span> Working...</h4>');$(".ajax-loader").css("visibility","visible");$(".removeMessages").html("");$(".removeMessages").css("visibility","hidden");jQuery("#submitBtnchckout").addClass("disabled").show();$("#submitBtnchckout").text("Sending...")},url:"controllers/checkout.php",data:b,dataType:"json",success:function(d){if(d.success==true){$(".ajax-loader").html("");$(".ajax-loader").css("visibility","hidden");$(".removeMessages").html('<div class="alert alert-success alert-dismissible" role="alert"><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button><strong> <span class="glyphicon glyphicon-ok-sign"></span> </strong>'+d.messages+"</div>")}else{$(".ajax-loader").html("");$(".ajax-loader").css("visibility","hidden");$(".removeMessages").html('<div class="alert alert-warning alert-dismissible" role="alert"><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button><strong> <span class="glyphicon glyphicon-exclamation-sign"></span> </strong>'+d.messages+"</div>")}},complete:function(){$(".ajax-loader").html("");$(".ajax-loader").css("visibility","hidden");$(".removeMessages").css("visibility","visible");jQuery("#submitBtnchckout").removeClass("disabled").show();$("#submitBtnchckout").text("Replace Order")}});c.preventDefault()})});</script>
</body>
</html>