<?php
$validator = array(
    'success' => false,
    'messages' => array()
);
$lastid = 0;
$productname = filter_input(INPUT_POST, 'productname');
$category = filter_input(INPUT_POST, 'category');
$productprice = filter_input(INPUT_POST, 'productprice');
$description = filter_input(INPUT_POST, 'description');

if (empty($productname) == true) {
    $determiner = 1;
    exit();
} else {
    
    $new = checkIfNew($productname);
    
    if ($new == 1) {
        $count = saveproduct($productname, $category, $productprice, $description);
        
        $successRate = $count['count'];
        $lastid = $count['lastid'];
        
        if ($successRate != 1) {
            $determiner = 4;
        } else {
            $determiner = 5;
        }
    } else {
        $determiner = 3;
    }
    $check = saveimages($determiner, $lastid);
    if ($check == 0) {
        $validator['success'] = false;
        $validator['messages'] = "Check data then try again. Error #1.";
    } else if ($check == 1) {
        $validator['success'] = true;
        $validator['messages'] = "Product saved successfuly.<strong><strong> ";
    }
    echo json_encode($validator);
}

function checkIfNew($productname)
{
    $determiner = 0;
    require ('database.php');
    $query = "SELECT `productid` FROM `products` WHERE `productname` LIKE LOWER('%$productname%')";
    $statement = $db->prepare($query);
    $statement->execute();
    $FtchededStationDetails = $statement->fetchAll();
    $statement->closeCursor();
    
    if ($FtchededStationDetails == null) {
        $determiner = 1;
    } else {
        $determiner = 2;
    }
    
    return $determiner;
}

function saveproduct($productname, $category, $productprice, $description)
{
    require ('database.php');
    $description = $db->quote($description);
    $query = "INSERT INTO `products`( `productcategory`, `productname`, `productdescription`) VALUES ($category,'$productname',$description)";
    $statement = $db->prepare($query);
    $statement->execute();
    $count = $statement->rowCount();
    $lastid = $db->lastInsertId();
    $statement->closeCursor();
    
    $queryprice = "INSERT INTO `productprices`(`productid`, `price`) VALUES ($lastid,$productprice)";
    $statement1 = $db->prepare($queryprice);
    $statement1->execute();
    $statement->closeCursor();
    
    $retun = array(
        "count" => $count,
        "lastid" => $lastid
    );
    
    return $retun;
}

function saveimages($determiner, $lastid)
{
    $check = 0;
    include ("database.php");
    $uploaded_images = array();
    foreach ($_FILES['upload_images']['name'] as $key => $val) {
        $pathholder = "../../images/products/$lastid/";
        $dbpath = "images/products/$lastid/";
        if (! file_exists($pathholder)) {
            mkdir($pathholder, 0777, true);
        }
        $upload_dir = $pathholder;
        $upload_file = $upload_dir . $_FILES['upload_images']['name'][$key];
        $dbpath = $dbpath . $_FILES['upload_images']['name'][$key];
        $filename = $_FILES['upload_images']['name'][$key];
        
        if (move_uploaded_file($_FILES['upload_images']['tmp_name'][$key], $upload_file)) {
            $query = "UPDATE `products` SET `imgpath`='$dbpath' WHERE `productid`=$lastid";
            $statement = $db->prepare($query);
            $statement->execute();
            $statement->closeCursor();
            $check = 1;
        } else {
            $check = 0;
        }
    }
    
    return $check;
}

?>