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

<section>
				<div class="tabs tabs-style-topline">
					<nav>
						<ul>
							<li><a href="#section-topline-1" class="fa fa-desktop"><span> Computers</span></a></li>
							<li><a href="#section-topline-2" class=""><span><img src="data:image/svg+xml;utf8;base64,PD94bWwgdmVyc2lvbj0iMS4wIiBlbmNvZGluZz0iaXNvLTg4NTktMSI/Pgo8IS0tIEdlbmVyYXRvcjogQWRvYmUgSWxsdXN0cmF0b3IgMTkuMS4wLCBTVkcgRXhwb3J0IFBsdWctSW4gLiBTVkcgVmVyc2lvbjogNi4wMCBCdWlsZCAwKSAgLS0+CjxzdmcgeG1sbnM9Imh0dHA6Ly93d3cudzMub3JnLzIwMDAvc3ZnIiB4bWxuczp4bGluaz0iaHR0cDovL3d3dy53My5vcmcvMTk5OS94bGluayIgdmVyc2lvbj0iMS4xIiBpZD0iQ2FwYV8xIiB4PSIwcHgiIHk9IjBweCIgdmlld0JveD0iMCAwIDQ4Mi41IDQ4Mi41IiBzdHlsZT0iZW5hYmxlLWJhY2tncm91bmQ6bmV3IDAgMCA0ODIuNSA0ODIuNTsiIHhtbDpzcGFjZT0icHJlc2VydmUiIHdpZHRoPSIyNHB4IiBoZWlnaHQ9IjI0cHgiPgo8Zz4KCTxnPgoJCTxwYXRoIGQ9Ik0zOTkuMjUsOTguOWgtMTIuNFY3MS4zYzAtMzkuMy0zMi03MS4zLTcxLjMtNzEuM2gtMTQ5LjdjLTM5LjMsMC03MS4zLDMyLTcxLjMsNzEuM3YyNy42aC0xMS4zICAgIGMtMzkuMywwLTcxLjMsMzItNzEuMyw3MS4zdjExNWMwLDM5LjMsMzIsNzEuMyw3MS4zLDcxLjNoMTEuMnY5MC40YzAsMTkuNiwxNiwzNS42LDM1LjYsMzUuNmgyMjEuMWMxOS42LDAsMzUuNi0xNiwzNS42LTM1LjYgICAgdi05MC40aDEyLjVjMzkuMywwLDcxLjMtMzIsNzEuMy03MS4zdi0xMTVDNDcwLjU1LDEzMC45LDQzOC41NSw5OC45LDM5OS4yNSw5OC45eiBNMTIxLjQ1LDcxLjNjMC0yNC40LDE5LjktNDQuMyw0NC4zLTQ0LjNoMTQ5LjYgICAgYzI0LjQsMCw0NC4zLDE5LjksNDQuMyw0NC4zdjI3LjZoLTIzOC4yVjcxLjN6IE0zNTkuNzUsNDQ3LjFjMCw0LjctMy45LDguNi04LjYsOC42aC0yMjEuMWMtNC43LDAtOC42LTMuOS04LjYtOC42VjI5OGgyMzguMyAgICBWNDQ3LjF6IE00NDMuNTUsMjg1LjNjMCwyNC40LTE5LjksNDQuMy00NC4zLDQ0LjNoLTEyLjRWMjk4aDE3LjhjNy41LDAsMTMuNS02LDEzLjUtMTMuNXMtNi0xMy41LTEzLjUtMTMuNWgtMzMwICAgIGMtNy41LDAtMTMuNSw2LTEzLjUsMTMuNXM2LDEzLjUsMTMuNSwxMy41aDE5Ljl2MzEuNmgtMTEuM2MtMjQuNCwwLTQ0LjMtMTkuOS00NC4zLTQ0LjN2LTExNWMwLTI0LjQsMTkuOS00NC4zLDQ0LjMtNDQuM2gzMTYgICAgYzI0LjQsMCw0NC4zLDE5LjksNDQuMyw0NC4zVjI4NS4zeiIgZmlsbD0iIzAwMDAwMCIvPgoJCTxwYXRoIGQ9Ik0xNTQuMTUsMzY0LjRoMTcxLjljNy41LDAsMTMuNS02LDEzLjUtMTMuNXMtNi0xMy41LTEzLjUtMTMuNWgtMTcxLjljLTcuNSwwLTEzLjUsNi0xMy41LDEzLjVTMTQ2Ljc1LDM2NC40LDE1NC4xNSwzNjQuNCAgICB6IiBmaWxsPSIjMDAwMDAwIi8+CgkJPHBhdGggZD0iTTMyNy4xNSwzOTIuNmgtMTcyYy03LjUsMC0xMy41LDYtMTMuNSwxMy41czYsMTMuNSwxMy41LDEzLjVoMTcxLjljNy41LDAsMTMuNS02LDEzLjUtMTMuNVMzMzQuNTUsMzkyLjYsMzI3LjE1LDM5Mi42eiIgZmlsbD0iIzAwMDAwMCIvPgoJCTxwYXRoIGQ9Ik0zOTguOTUsMTUxLjloLTI3LjRjLTcuNSwwLTEzLjUsNi0xMy41LDEzLjVzNiwxMy41LDEzLjUsMTMuNWgyNy40YzcuNSwwLDEzLjUtNiwxMy41LTEzLjVTNDA2LjQ1LDE1MS45LDM5OC45NSwxNTEuOXoiIGZpbGw9IiMwMDAwMDAiLz4KCTwvZz4KPC9nPgo8Zz4KPC9nPgo8Zz4KPC9nPgo8Zz4KPC9nPgo8Zz4KPC9nPgo8Zz4KPC9nPgo8Zz4KPC9nPgo8Zz4KPC9nPgo8Zz4KPC9nPgo8Zz4KPC9nPgo8Zz4KPC9nPgo8Zz4KPC9nPgo8Zz4KPC9nPgo8Zz4KPC9nPgo8Zz4KPC9nPgo8Zz4KPC9nPgo8L3N2Zz4K" /></span><span> Printers</span></a></li>
							<li><a href="#section-topline-3" class=""><span height="20px"><img src="images/printing.png" /></span><span> Toners And Ink Cartridges</span></a></li>
							<li><a href="#section-topline-4" class=""><span><img src="data:image/svg+xml;utf8;base64,PD94bWwgdmVyc2lvbj0iMS4wIiBlbmNvZGluZz0iaXNvLTg4NTktMSI/Pgo8IS0tIEdlbmVyYXRvcjogQWRvYmUgSWxsdXN0cmF0b3IgMTkuMC4wLCBTVkcgRXhwb3J0IFBsdWctSW4gLiBTVkcgVmVyc2lvbjogNi4wMCBCdWlsZCAwKSAgLS0+CjxzdmcgeG1sbnM9Imh0dHA6Ly93d3cudzMub3JnLzIwMDAvc3ZnIiB4bWxuczp4bGluaz0iaHR0cDovL3d3dy53My5vcmcvMTk5OS94bGluayIgdmVyc2lvbj0iMS4xIiBpZD0iQ2FwYV8xIiB4PSIwcHgiIHk9IjBweCIgdmlld0JveD0iMCAwIDIzNyAyMzciIHN0eWxlPSJlbmFibGUtYmFja2dyb3VuZDpuZXcgMCAwIDIzNyAyMzc7IiB4bWw6c3BhY2U9InByZXNlcnZlIiB3aWR0aD0iMjRweCIgaGVpZ2h0PSIyNHB4Ij4KPHBhdGggZD0iTTIzNyw3Ny41aC0xNXYtMTJIMTIwdjEySDB2ODJoMTIwdjEyaDEwMnYtMTJoMTVWNzcuNXogTTQxLjY2NywxMjkuODcxYy02LjI4LDAtMTEuMzcxLTUuMDkxLTExLjM3MS0xMS4zNzEgIHM1LjA5MS0xMS4zNzEsMTEuMzcxLTExLjM3MXMxMS4zNzEsNS4wOTEsMTEuMzcxLDExLjM3MVM0Ny45NDcsMTI5Ljg3MSw0MS42NjcsMTI5Ljg3MXogTTk3LjY2NywxMjkuODcxICBjLTYuMjgsMC0xMS4zNzEtNS4wOTEtMTEuMzcxLTExLjM3MXM1LjA5MS0xMS4zNzEsMTEuMzcxLTExLjM3MXMxMS4zNzEsNS4wOTEsMTEuMzcxLDExLjM3MVMxMDMuOTQ3LDEyOS44NzEsOTcuNjY3LDEyOS44NzF6ICAgTTE5MiwxMDcuNWgtMjN2MjJoMjN2MTJoLTQydi00Nmg0MlYxMDcuNXoiIGZpbGw9IiMwMDAwMDAiLz4KPGc+CjwvZz4KPGc+CjwvZz4KPGc+CjwvZz4KPGc+CjwvZz4KPGc+CjwvZz4KPGc+CjwvZz4KPGc+CjwvZz4KPGc+CjwvZz4KPGc+CjwvZz4KPGc+CjwvZz4KPGc+CjwvZz4KPGc+CjwvZz4KPGc+CjwvZz4KPGc+CjwvZz4KPGc+CjwvZz4KPC9zdmc+Cg==" /></span><span>Accessories</span></a></li>
							
						</ul>
					</nav>
					<div class="content-wrap">
						<section id="section-topline-1"><?php 
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
			

			<div class="clearfix"></div></section>
						<section id="section-topline-2"><?php 
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
			<div class="clearfix"></div></section>
						<section id="section-topline-3"><?php 
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
			<div class="clearfix"></div></section>
						<section id="section-topline-4"><?php 
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

			<div class="clearfix"></div></section>
						
					</div><!-- /content -->
				</div><!-- /tabs -->
			</section>