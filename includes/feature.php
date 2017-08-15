<?php
$queryfeature = "SELECT products.productid, products.productcategory, products.productname,products.productdescription, products.imgpath,categories.categoryname,productprices.price

FROM `products`

JOIN categories ON products.productcategory=categories.categoryid
JOIN productprices ON products.productid=productprices.productid

WHERE products.productcategory=$featurecode

LIMIT 4;
";

$statementfeature = $db->prepare($queryfeature);
$statementfeature->execute();
$featureproductsinfos = $statementfeature->fetchAll();
$statementfeature->closeCursor();

?>
<div class="w3_agile_latest_arrivals">
<h3 class="wthree_text_info">
Featured <span>Products</span>
</h3>
<?php

foreach ($featureproductsinfos as $featureproductsinfo) :
    $featureproductid = $featureproductsinfo['productid'];
    $featureproductcategory = $featureproductsinfo['productcategory'];
    $featureproductname = $featureproductsinfo['productname'];
    $featuredescription = $featureproductsinfo['productdescription'];
    $featureimgpath = $featureproductsinfo['imgpath'];
    $featurecategoryname = $featureproductsinfo['categoryname'];
    $featureprice = $featureproductsinfo['price'];
    
    ?>
<div class="col-md-3 product-men single">
<div class="men-pro-item simpleCart_shelfItem">
<div class="men-thumb-item">
<img src="<?php echo $featureimgpath;?>" alt="" class="pro-image-front"> <img src="<?php echo $featureimgpath;?>" alt="" class="pro-image-back">
<div class="men-cart-pro">
<div class="inner-men-cart-pro">
<a href="info.php?itm=<?php echo $featureproductid;?>" class="link-product-add-cart">Quick View</a>
</div>
</div>
<span class="product-new-top">New</span>
</div>
<div class="item-info-product">
<h4>
<a href="info.php?itm=<?php echo $featureproductid;?>"><?php echo $featureproductname;?></a>
</h4>
<form class="form-item" action="">
<div class="info-product-price">
<span class="item_price">Kes<?php echo $featureprice;?></span>
<del></del>
<div class="input-group">
<span class="input-group-addon">Order</span> <input type="number" id="productname" required="required" value="1" min="1" name="product_qty" class="form-control" aria-label="Order Quantity"> <span class="input-group-addon">Unit(s)</span>
</div>
</div>
<div class="snipcart-details top_brand_home_details item_add single-item hvr-outline-out button2">
<fieldset>
<input name="product_code" type="hidden" value="<?php echo $featureproductid;?>"> <input type="submit" name="submit" value="Add to cart" class="button" />
</fieldset>
</div>
</form>
</div>
</div>
</div>
<?php endforeach;?>
<div class="clearfix"></div>
</div>