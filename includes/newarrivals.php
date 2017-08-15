<?php
include ('controllers/database.php');

$query = "SELECT products.productid, products.productcategory, products.productname, products.imgpath,categories.categoryname,productprices.price
    
FROM `products`
    
JOIN categories ON products.productcategory=categories.categoryid
JOIN productprices ON products.productid=productprices.productid
    
WHERE products.productcategory=1
    
LIMIT 12
    
";
// echo $query;
$statement = $db->prepare($query);
$statement->execute();
$productsinfos = $statement->fetchAll();
$statement->closeCursor();

//PRINTERS
$queryPRINT = "SELECT products.productid, products.productcategory, products.productname, products.imgpath,categories.categoryname,productprices.price
    
FROM `products`
    
JOIN categories ON products.productcategory=categories.categoryid
JOIN productprices ON products.productid=productprices.productid
    
WHERE products.productcategory=2
    
LIMIT 12
    
";
// echo $query;
$statement1 = $db->prepare($queryPRINT);
$statement1->execute();
$productsPRINTERS = $statement1->fetchAll();
$statement1->closeCursor();


//toners
$queryTONERS = "SELECT products.productid, products.productcategory, products.productname, products.imgpath,categories.categoryname,productprices.price
    
FROM `products`
    
JOIN categories ON products.productcategory=categories.categoryid
JOIN productprices ON products.productid=productprices.productid
    
WHERE products.productcategory=8
    
LIMIT 12
    
";
// echo $query;
$statement2 = $db->prepare($queryTONERS);
$statement2->execute();
$productstoners = $statement2->fetchAll();
$statement2->closeCursor();


//accessories
$queryaccesscs = "SELECT products.productid, products.productcategory, products.productname, products.imgpath,categories.categoryname,productprices.price
    
FROM `products`
    
JOIN categories ON products.productcategory=categories.categoryid
JOIN productprices ON products.productid=productprices.productid
    
WHERE products.productcategory=7
    
LIMIT 12
    
";
// echo $query;
$statement3 = $db->prepare($queryaccesscs);
$statement3->execute();
$productsaccecs = $statement3->fetchAll();
$statement3->closeCursor();

$div="No new items yet ";
$div1="No new items yet ";
$div2="No new items yet ";
$div3="No new items yet ";

?>
<div id="horizontalTab">
<ul class="resp-tabs-list">
<li>Laptops</li>
<li>Printers</li>
<li>Toners And Ink Cartridges</li>
<li>Accessories</li>
</ul>
<div class="resp-tabs-container">
<div class="tab1">
<?php 
		if($productsinfos!=null){
		foreach($productsinfos as $productsinfo):
		$productid=$productsinfo['productid'];
		$productcategory=$productsinfo['productcategory'];
		$productname=$productsinfo['productname'];
		$imgpath=$productsinfo['imgpath'];
		$categoryname=$productsinfo['categoryname'];
		$price=$productsinfo['price'];
		
		
		    $div='<div class="col-md-3 product-men">
				<div class="men-pro-item simpleCart_shelfItem">
					<div class="men-thumb-item">
						<img src="'.$imgpath.'" alt="" class="pro-image-front"> <img
							src="'.$imgpath.'" alt="" class="pro-image-back">
						<div class="men-cart-pro">
							<div class="inner-men-cart-pro">
								<a href="info.php?itm=' . $productid . '" class="link-product-add-cart">Quick View</a>
							</div>
						</div>
						<span class="product-new-top">New</span>
		    
					</div>
					<div class="item-info-product ">
						<form class="form-item" action="">
							<h4>
								<a href="info.php?itm=' . $productid . '">'.$productname.'</a>
							</h4>
							<div class="info-product-price form-group">
								<span class="item_price">Kes'.$price.'</span>
								<!-- <del>$69.71</del> -->
		    
		    
							</div>
		    
							<div class="input-group">
								<span class="input-group-addon">Order</span> <input
									type="number" id="productname" required="required" value="1"
									min="1" name="product_qty" class="form-control"
									aria-label="Order Quantity"> <span class="input-group-addon">Unit(s)</span>
							</div>
		    
							<div
								class="snipcart-details top_brand_home_details item_add single-item hvr-outline-out button2">
		    
								<fieldset>
		    
									<input name="product_code" type="hidden" value="'.$productid.'"> <input
										type="submit" name="submit" value="Add to cart" class="button" />
									<!-- <button class="button" type="submit"><i class="fa fa-shopping-cart"></i> Add to Cart</button> -->
								</fieldset>
		    
							</div>
						</form>
					</div>
				</div>
			</div>';
		    endforeach;
		}
		
		echo $div;
		
		
		?>
<div class="clearfix"></div>
</div>
<div class="tab2">
<?php 
			if($productsPRINTERS!=null){
			foreach($productsPRINTERS as $productsPRINTER):
			$productid=$productsPRINTER['productid'];
			$productcategory=$productsPRINTER['productcategory'];
			$productname=$productsPRINTER['productname'];
			$imgpath=$productsPRINTER['imgpath'];
			$categoryname=$productsPRINTER['categoryname'];
			$price=$productsPRINTER['price'];
		
			
		    $div1='<div class="col-md-3 product-men">
				<div class="men-pro-item simpleCart_shelfItem">
					<div class="men-thumb-item">
						<img src="'.$imgpath.'" alt="" class="pro-image-front"> <img
							src="'.$imgpath.'" alt="" class="pro-image-back">
						<div class="men-cart-pro">
							<div class="inner-men-cart-pro">
								<a href="info.php?itm=' . $productid . '" class="link-product-add-cart">Quick View</a>
							</div>
						</div>
						<span class="product-new-top">New</span>
		    
					</div>
					<div class="item-info-product ">
						<form class="form-item" action="">
							<h4>
								<a href="info.php?itm=' . $productid . '">'.$productname.'</a>
							</h4>
							<div class="info-product-price form-group">
								<span class="item_price">Kes'.$price.'</span>
								<!-- <del>$69.71</del> -->
		    
		    
							</div>
		    
							<div class="input-group">
								<span class="input-group-addon">Order</span> <input
									type="number" id="productname" required="required" value="1"
									min="1" name="product_qty" class="form-control"
									aria-label="Order Quantity"> <span class="input-group-addon">Unit(s)</span>
							</div>
		    
							<div
								class="snipcart-details top_brand_home_details item_add single-item hvr-outline-out button2">
		    
								<fieldset>
		    
									<input name="product_code" type="hidden" value="'.$productid.'"> <input
										type="submit" name="submit" value="Add to cart" class="button" />
									<!-- <button class="button" type="submit"><i class="fa fa-shopping-cart"></i> Add to Cart</button> -->
								</fieldset>
					    
							</div>
						</form>
					</div>
				</div>
			</div>';
		    endforeach;
		}
		
		echo $div1;
		
		
		?>
<div class="clearfix"></div>
</div>
<div class="tab3">
<?php 
			if($productstoners!=null){
			foreach($productstoners as $productstoner):
			$productid=$productstoner['productid'];
			$productcategory=$productstoner['productcategory'];
			$productname=$productstoner['productname'];
			$imgpath=$productstoner['imgpath'];
			$categoryname=$productstoner['categoryname'];
			$price=$productstoner['price'];
		
			
		    $div2='<div class="col-md-3 product-men">
				<div class="men-pro-item simpleCart_shelfItem">
					<div class="men-thumb-item">
						<img src="'.$imgpath.'" alt="" class="pro-image-front"> <img
							src="'.$imgpath.'" alt="" class="pro-image-back">
						<div class="men-cart-pro">
							<div class="inner-men-cart-pro">
								<a href="info.php?itm=' . $productid . '" class="link-product-add-cart">Quick View</a>
							</div>
						</div>
						<span class="product-new-top">New</span>
		    
					</div>
					<div class="item-info-product ">
						<form class="form-item" action="">
							<h4>
								<a href="info.php?itm=' . $productid . '">'.$productname.'</a>
							</h4>
							<div class="info-product-price form-group">
								<span class="item_price">Kes'.$price.'</span>
								<!-- <del>$69.71</del> -->
		    
		    
							</div>
		    
							<div class="input-group">
								<span class="input-group-addon">Order</span> <input
									type="number" id="productname" required="required" value="1"
									min="1" name="product_qty" class="form-control"
									aria-label="Order Quantity"> <span class="input-group-addon">Unit(s)</span>
							</div>
		    
							<div
								class="snipcart-details top_brand_home_details item_add single-item hvr-outline-out button2">
		    
								<fieldset>
		    
									<input name="product_code" type="hidden" value="'.$productid.'"> <input
										type="submit" name="submit" value="Add to cart" class="button" />
									<!-- <button class="button" type="submit"><i class="fa fa-shopping-cart"></i> Add to Cart</button> -->
								</fieldset>
					    
							</div>
						</form>
					</div>
				</div>
			</div>';
		
		endforeach;
			}
		
		echo $div2;
		
		
		?>
<div class="clearfix"></div>
</div>
<div class="tab4">
<?php 
				if($productsaccecs!=null){
				    foreach($productsaccecs as $productsaccec):
				    $productid=$productsaccec['productid'];
				    $productcategory=$productsaccec['productcategory'];
				    $productname=$productsaccec['productname'];
				    $imgpath=$productsaccec['imgpath'];
				    $categoryname=$productsaccec['categoryname'];
				    $price=$productsaccec['price'];
		
		
		    $div3='<div class="col-md-3 product-men">
				<div class="men-pro-item simpleCart_shelfItem">
					<div class="men-thumb-item">
						<img src="'.$imgpath.'" alt="" class="pro-image-front"> <img
							src="'.$imgpath.'" alt="" class="pro-image-back">
						<div class="men-cart-pro">
							<div class="inner-men-cart-pro">
								<a href="info.php?itm=' . $productid . '" class="link-product-add-cart">Quick View</a>
							</div>
						</div>
						<span class="product-new-top">New</span>
		    
					</div>
					<div class="item-info-product ">
						<form class="form-item" action="">
							<h4>
								<a href="info.php?itm=' . $productid . '">'.$productname.'</a>
							</h4>
							<div class="info-product-price form-group">
								<span class="item_price">Kes'.$price.'</span>
								<!-- <del>$69.71</del> -->
		    
		    
							</div>
		    
							<div class="input-group">
								<span class="input-group-addon">Order</span> <input
									type="number" id="productname" required="required" value="1"
									min="1" name="product_qty" class="form-control"
									aria-label="Order Quantity"> <span class="input-group-addon">Unit(s)</span>
							</div>
		    
							<div
								class="snipcart-details top_brand_home_details item_add single-item hvr-outline-out button2">
		    
								<fieldset>
		    
									<input name="product_code" type="hidden" value="'.$productid.'"> <input
										type="submit" name="submit" value="Add to cart" class="button" />
									<!-- <button class="button" type="submit"><i class="fa fa-shopping-cart"></i> Add to Cart</button> -->
								</fieldset>
					    
							</div>
						</form>
					</div>
				</div>
			</div>';
		    endforeach;
		}
		
		echo $div3;
		
		
		?>
<div class="clearfix"></div>
</div>
</div>
</div>