<?php
require 'database.php';

$output = array(
    'data' => array()
);

$sql = "SELECT `ord`, `placerid`, `paid`, SUM(calculations) as totals,t.pickupcoord,t.collected,t.name,t.phone FROM(
SELECT ordertable.orderid as ord, `placerid`, ordertable.paid,SUM(orders.quantity*productprices.price) as calculations,orders.pickupcoord,ordertable.collected,users.name,users.phone
    
FROM `ordertable`
    
INNER JOIN orders on ordertable.orderid=orders.orderid
INNER JOIN products on orders.product=products.productid
INNER JOIN productprices ON orders.product=productprices.productid
INNER JOIN users ON orders.placer=users.userid
    
   WHERE orders.pickupcoord =''
    
GROUP BY orders.orderid,ordertable.orderid,orders.product,orders.quantity,orders.pickupcoord,users.name,users.phone)
as t
    
GROUP BY `ord`,`placerid`,`paid`,pickupcoord,name,phone";

$statement = $db->prepare($sql);
$statement->execute();
$rowsaffcted = $statement->rowCount();
$datas = $statement->fetchAll();
$statement->closeCursor();

foreach ($datas as $data) :
    $ord = $data['ord'];
    $placerid = $data['placerid'];
    $totals = $data['totals'];
    $paid = $data['paid'];
    $pickupcoord = $data['pickupcoord'];
    $collected = $data['collected'];
    
    $name = $data['name'];
    $phone = $data['phone'];
    if (! isset($x)) {
        $x = 0;
    }
    $x ++;
    if ($paid == 1) {
        $active = '<label class="label label-success">Confirmed</label>';
    } else {
        $active = '<label class="label label-danger">Not Confirmed</label>';
    }
    
    if ($pickupcoord != null) {
        $deliver = '<label class="label label-success">Shipping</label>';
    } else {
        $deliver = '<label class="label label-danger" style="background-color: #4f8ed9;">Collection</label>';
    }
    
    if ($collected != 0) {
        $collected = '<label class="label label-success">Yes</label>';
    } else {
        $collected = '<label class="label label-danger">On going</label>';
    }
    
    $actionButton = '
	<div class="btn-group">
	  <button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
	    Action <span class="caret"></span>
	  </button>
	  <ul class="dropdown-menu">
        <li><a type="button" href="orderdetails.php?itm=' . $ord . '"> <span class="glyphicon glyphicon-eye-open"></span> View</a></li>
		<li><a type="button" data-toggle="modal" data-target="#updateModal" onclick="updateMember(' . $ord . ')"> <span class="glyphicon glyphicon-edit"></span> Confirm</a></li>
		<li><a type="button" data-toggle="modal" data-target="#removeMemberModal" onclick="removeMember(' . $ord . ')"> <span class="glyphicon glyphicon-trash"></span> Remove</a></li>
	  </ul>
	</div>
		';
    
    $output['data'][] = array(
        $x,
        $ord,
        $placerid,
        $name,
        $phone,
        $totals,
        $active,
        $actionButton
    );
    
    $x ++;
endforeach
;

echo json_encode($output);