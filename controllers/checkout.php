<?php
if (! isset($_SESSION)) {
    session_start();
}

$orderid = 0;
$userid = $_SESSION["userid"];
$determiner = 0;
$errorMessage = "";
$validator = array(
    'success' => false,
    'messages' => array()
);
$distance = 0;
$coordz = filter_input(INPUT_POST, 'coordz');
$distance = filter_input(INPUT_POST, 'distance');

require ('database.php');
$shipcost = $distance * $shipping_cost;

if (isset($_SESSION["products"]) && count($_SESSION["products"]) > 0) {
    $total = 0;
    $list_tax = '';
    $cart_box = '<ul class="view-cart">';
    $counter = 1;
    
    $query1 = "INSERT INTO `ordertable`(`placerid`,pickupcrds,distance,shipcost) VALUES ($userid,'$coordz','$distance','$shipcost');";
    $statement1 = $db->prepare($query1);
    $statement1->execute();
    $orderid = $db->lastInsertId();
    $statement1->closeCursor();
    
    foreach ($_SESSION["products"] as $product) { // loop though items and prepare html content
                                                  // set variables to use them in HTML content below
        $product_name = $product["productname"];
        $product_price = $product["price"];
        $product_code = $product["product_code"];
        $product_qty = $product["product_qty"];
        $product_img = $product["imgpath"];
        
        $product_name;
        $product_qty;
        $currency;
        $item_price;
        
        $subtotal = ($product_price * $product_qty); // Multiply item quantity * price
        $total = ($total + $subtotal); // Add up to total price
        
        $query = "INSERT INTO `orders`(`orderid`, `placer`, `product`, `quantity`, `pickupcoord`) VALUES ($orderid,$userid,$product_code,$product_qty,'$coordz');";
        $statement = $db->prepare($query);
        $statement->execute();
        $statement->closeCursor();
        
        $counter ++;
    }
    
    if ($distance != 0) {
        $query = "INSERT INTO `orders`(`orderid`, `placer`, `product`, `quantity`, `pickupcoord`) VALUES ($orderid,$userid,7,$distance,'$coordz');";
        $statement = $db->prepare($query);
        $statement->execute();
        $statement->closeCursor();
    }
    $determiner = 5;
    encode($determiner, $orderid);
    unset($_SESSION["products"]);
} else {
    $determiner = 1;
    encode($determiner, $orderid);
}

function encode($determiner, $orderid)
{
    if ($determiner == 5) {
        $validator['success'] = true;
        $validator['messages'] = "Order received successfuly. <strong>Order id: " . $orderid . "</strong> ";
    } else if ($determiner == 1) {
        $validator['success'] = false;
        $validator['messages'] = "Your cart is empty.";
    } else if ($determiner == 2) {
        $validator['success'] = false;
        $validator['messages'] = "Error #3.";
    } else if ($determiner == 3) {
        $validator['success'] = false;
        $validator['messages'] = "Error #3";
    } else if ($determiner == 4) {
        $validator['success'] = false;
        $validator['messages'] = "Error while placing order. Try again later.";
    } else if ($determiner == 6) {
        $validator['success'] = false;
        $validator['messages'] = "Invalid data.";
    } else {
        $validator['success'] = false;
        $validator['messages'] = "Error while contacting server. Try again.";
    }
    
    echo json_encode($validator, JSON_HEX_TAG | JSON_HEX_APOS | JSON_HEX_QUOT | JSON_HEX_AMP | JSON_UNESCAPED_UNICODE | JSON_FORCE_OBJECT | JSON_PRESERVE_ZERO_FRACTION);
}

?>