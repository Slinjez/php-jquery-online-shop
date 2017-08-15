<?php
session_start(); // start session
include_once ("database.php"); // include config file
setlocale(LC_MONETARY, "en_US"); // US national format (see : http://php.net/money_format)
if (isset($_POST["product_code"])) {
    foreach ($_POST as $key => $value) {
        $new_product[$key] = filter_var($value, FILTER_SANITIZE_STRING); // create a new product array
    }
    $prdid = $new_product['product_code'];
    $statement = $mysqli_conn->prepare("SELECT products.productname,  productprices.price , products.imgpath
        
FROM `products`
        
JOIN productprices on products.productid=productprices.productid
        
WHERE products.productid=$prdid
        
LIMIT 1");
    $statement->execute();
    $statement->bind_result($product_name, $product_price, $product_img);
    
    while ($statement->fetch()) {
        $new_product["productname"] = $product_name; // fetch product name from database
        $new_product["price"] = $product_price; // fetch product price from database
        $new_product["imgpath"] = $product_img; // fetch product image from database
        
        if (isset($_SESSION["products"])) { // if session var already exist
            if (isset($_SESSION["products"][$new_product['productname']])) // check item exist in products array
{
                unset($_SESSION["products"][$new_product['product_code']]); // unset old item
            }
        }
        
        $_SESSION["products"][$new_product['product_code']] = $new_product; // update products with new item array
    }
    
    $total_items = count($_SESSION["products"]); // count total items
    die(json_encode(array(
        'items' => $total_items
    ))); // output json
}
if (isset($_POST["load_cart"]) && $_POST["load_cart"] == 1) {
    
    if (isset($_SESSION["products"]) && count($_SESSION["products"]) > 0) { // if we have session variable
        
        $cart_box = '<div class="col-md-12 col-sm-12 col-xs-12 text-center">';
        $total = 0;
        foreach ($_SESSION["products"] as $product) { // loop though items and prepare html content
            $product_name = $product["productname"];
            $product_price = $product["price"];
            $product_code = $product["product_code"];
            $product_qty = $product["product_qty"];
            $product_img = $product["imgpath"];
            
            $cart_box .= '<div class="col-md-6 col-sm-6 col-xs-12">
    <div class="thumbnail ">
        <div class="grow pic">
      <img src="' . $product_img . '" alt="' . $product_name . '" class="">
        </div>
      <div class="caption">
        <h3>' . $product_name . '</h3>
        <p class="card-description"><strong>Units</strong> ' . $product_qty . '</p>
        <p> <strong>Price</strong>. <br>' . $currency . '</h3><h2 style="color:red">' . sprintf("%01.2f", ($product_price * $product_qty)) . '</p>
        <p><button type="button" class="btn btn-danger btn-xs remove-item" data-code="' . $product_code . '">
                                <i class="fa fa-tines"> </i> Remove</button></p>
      </div>
    </div>
  </div>';
            $subtotal = ($product_price * $product_qty);
            $total = ($total + $subtotal);
        }
        $cart_box .= '<div class="col-md-12 col-sm-12 col-xs-12 text-center cart-products-total" style="border-color: aqua; border-width: thick;">
                        <div class="col-md-12 col-sm-12 col-xs-12 text-center cart-products-total">
                        <h4 class="brief"><strong>Total</strong> : ' . $currency . sprintf("%01.2f", $total) . '</h4> <u><br>
                      </div>
                    <div class="col-md-6 col-sm-6 col-xs-12 text-center cart-products-total">
                    <a class="btn btn-info btn-md btn-block" style="background-color: #26b99a;text-decoration: none;" href="viewcart.php" title="Review Cart and Check-Out">Check-out</a></u>
                    </div><br>
                    <div class="col-md-6 col-sm-6 col-xs-12 text-center cart-products-total">
                    <u><a class="btn btn-info btn-md btn-block" style="background-color: #26b99a;text-decoration: none;" href="gencategory.php" title="Add more items to cart">Continue Shopping</a></u>
                    </div>
                            
                        <br>
                    </div><br>';
        die($cart_box); // exit and output content
    } else {
        die("<h2 style=\"color:red\">My Cart is empty. &#x2639; </h2><u><br><a class=\"btn btn-danger btn-xs\" href=\"gencategory.php\" title=\"Start shopping\">Shop Now</a></u>"); // we have empty cart
    }
}
if (isset($_GET["remove_code"]) && isset($_SESSION["products"])) {
    $product_code = filter_var($_GET["remove_code"], FILTER_SANITIZE_STRING); // get the product code to remove
    
    if (isset($_SESSION["products"][$product_code])) {
        unset($_SESSION["products"][$product_code]);
    }
    
    $total_items = count($_SESSION["products"]);
    die(json_encode(array(
        'items' => $total_items
    )));
}
