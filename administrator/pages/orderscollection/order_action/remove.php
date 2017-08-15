<?php

require_once 'database.php';

$output = array('success' => false, 'messages' => array());

$memberId = $_POST['member_id'];

$sql = "DELETE FROM `ordertable` WHERE `orderid`= {$memberId}";

$statement = $db->prepare($sql);
$statement->execute();
$rowsaffcted=$statement->rowCount();
$statement->closeCursor();
if($rowsaffcted >= 1) {
    $output['success'] = true;
    $output['messages'] = 'Successfully removed order Info';
} else {
    $output['success'] = false;
    $output['messages'] = 'Error while removing the order information';
}

echo json_encode($output);