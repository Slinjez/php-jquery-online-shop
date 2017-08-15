<?php
$validator = array(
    'success' => false,
    'messages' => array()
);
$lastid=0;
$catname = filter_input(INPUT_POST, 'catname');

if (empty($catname) == true) {
    
    $determiner = 1;
   // encode($determiner, $productname,$lastid);
    exit();
} else {
    
    $new = checkIfNew($catname);
    
    if ($new == 1) {
        $count = saveproduct($catname);
        
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
    $check=saveimages($determiner,$lastid);
   // echo "Saved!";
    if($check==0){
        $validator['success'] = false;
        $validator['messages'] = "Check data then try again. Error #1.";
    }else if($check==1){
        $validator['success'] = true;
        $validator['messages'] = "Product category saved successfuly.<strong><strong> ";
   }
   echo json_encode($validator, JSON_HEX_TAG | JSON_HEX_APOS | JSON_HEX_QUOT | JSON_HEX_AMP | JSON_UNESCAPED_UNICODE | JSON_FORCE_OBJECT | JSON_PRESERVE_ZERO_FRACTION);
    //encode($determiner, $productname,$lastid);
}

function checkIfNew($catname)
{
    $determiner = 0;
    require ('database.php');
    $query = "SELECT `categoryid` FROM `categories` WHERE `categoryname` LIKE LOWER('%$catname%')";
    // echo $query;
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

function saveproduct($catname)
{
    require ('database.php');
    //echo $description;
    //$description=$db->quote($description);
    $query = "INSERT INTO `categories`(`categoryname`) VALUES ('$catname');";
   
    $statement = $db->prepare($query);
    $statement->execute();
    $count = $statement->rowCount();
    $lastid=$db->lastInsertId();
    $statement->closeCursor();
    
    $retun=array("count"=>$count,"lastid"=>$lastid);
    
    return $retun;
}


function saveimages($determiner,$lastid) {
  //  echo "in save img";
  $check=0;
    include("database.php");
    $uploaded_images = array();
    foreach($_FILES['upload_images']['name'] as $key=>$val){
        $pathholder="../../images/categories/";
        $dbpath="images/categories/";
        if (!file_exists($pathholder)) {
            mkdir($pathholder, 0777, true);
        }
        $upload_dir = $pathholder;
        $upload_file = $upload_dir.$_FILES['upload_images']['name'][$key];
        $dbpath=$dbpath.$_FILES['upload_images']['name'][$key];
        $filename = $_FILES['upload_images']['name'][$key];
        //echo $filename;
        if(move_uploaded_file($_FILES['upload_images']['tmp_name'][$key],$upload_file)){
            $query = "UPDATE `categories` SET `categoryimage`='$dbpath' WHERE `categoryid`=$lastid";
            //echo $query;
            $statement = $db->prepare($query);
            $statement->execute();
            $statement->closeCursor();
            $check=1;
        }else{
            $check=0;
        }
    }
  
    return $check;
    
}

?>