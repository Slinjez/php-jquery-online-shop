<?php
require 'database.php';

$output = array(
    'data' => array()
);

$ordid = $_POST['orderzid'];

$sql = "SELECT `ordid`, orders.orderid as orderingid, `placer`, `product` ,products.productname, productprices.price, `quantity`, `pickupcoord`, orders.attime, ordertable.paid

FROM `orders`

JOIN ordertable on orders.orderid=ordertable.orderid
JOIN products on orders.product=products.productid
INNER JOIN productprices ON products.productid=productprices.productid

WHERE ordertable.orderid=$ordid

ORDER BY `attime` DESC";

$statement = $db->prepare($sql);
$statement->execute();
$rowsaffcted = $statement->rowCount();
$datas = $statement->fetchAll();
$statement->closeCursor();

foreach ($datas as $data) :
    $ordid = $data['ordid'];
    $orderid = $data['orderingid'];
    $placer = $data['placer'];
    $product = $data['productname'] . ' (' . $data['product'] . ')';
    $productprice = $data['price'];
    $quantity = $data['quantity'];
    $attime = $data['attime'];
    $paid = $data['paid'];
    $amount = $productprice * $quantity;
    if (! isset($x)) {
        $x = 0;
    }
    $x ++;
    if ($paid == 1) {
        $active = '<label class="label label-success">Yes</label>';
    } else {
        $active = '<label class="label label-danger">No</label>';
    }
    
    $actionButton = '
	<div class="btn-group">
	  <button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
	    Action <span class="caret"></span>
	  </button>
	  <ul class="dropdown-menu">
	  </ul>
	</div>
		';
    
    $output['data'][] = array(
        $x,
        $orderid,
        $product,
        $quantity,
        $amount,
        $active,
        $attime
    );
    
    $x ++;
endforeach
;

echo json_encode($output);