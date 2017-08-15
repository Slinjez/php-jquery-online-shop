<?php
session_start();

$determiner   = 0;
$errorMessage = "";
$validator    = array(
    'success' => false,
    'messages' => array()
);

$userMail  = "";
$plainPs   = "";
$lginemail = filter_input(INPUT_POST, 'lginemail');
$lginps    = filter_input(INPUT_POST, 'lginps');

if (empty($lginemail) == true) {
    $determiner = 1;
    encode($determiner, 0);
    exit();
}
if (empty($lginps) == true) {
    $determiner = 2;
    encode($determiner, 0);
    exit();
} else {
    $nw = 1;
    if ($nw == 1) {
        $determinerd = array();
        
        $determinerd = process($lginemail, $lginps);
        
        $determiner = $determinerd["determiner"];
        $sendto     = 1;
        
        encode($determiner, $sendto);
    } else {
        $determiner = 6;
        encode($determiner, 0);
    }
}

function cheknew($lginemail)
{
    $nswtat = 0;
    require('database.php');
    $query     = "SELECT `userid` FROM `users` WHERE `email`='$lginemail'";
    $statement = $db->prepare($query);
    $statement->execute();
    $Ftchededsr = $statement->fetchAll();
    $statement->closeCursor();
    
    if ($Ftchededsr == null) {
        $nswtat = 1;
    } else {
        $nswtat = 0;
    }
    return $nswtat;
}

function process($lginemail, $lginps)
{
    $returnme   = array();
    $role       = 1;
    $determiner = 0;
    $ps2        = hash('sha256', $lginps);
    require('database.php');
    $query = 'SELECT `userid`, `name`, `email`, `password` FROM `users` WHERE `email`="' . $lginemail . '";';
    
    $statement = $db->prepare($query);
    $statement->execute();
    $FtchededUserdetails = $statement->fetchAll();
    
    $myid = $db->lastInsertId();
    $statement->closeCursor();
    
    if ($FtchededUserdetails != NULL) {
        foreach ($FtchededUserdetails as $post):
        $userid    = $post['userid'];
        $mail      = $post['email'];
        $password  = $post['password'];
        $sgnupname = $post['name'];
        endforeach;
        
        if ($password == $ps2) {
            $username                   = $sgnupname;
            $_SESSION["userid"]         = $userid;
            $_SESSION["username"]       = $sgnupname;
            $_SESSION['serverFeedback'] = "Welcome " . $username;
            
            $determiner = 5;
        } else {
            $determiner = 4;
        }
    } else {
        $determiner = 6;
    }
    
    $returnme = array(
        'determiner' => $determiner,
        'role' => 1
    );
    return $returnme;
}

function utf8ize($d)
{
    if (is_array($d)) {
        foreach ($d as $k => $v) {
            $d[$k] = utf8ize($v);
        }
    } else if (is_string($d)) {
        return utf8_encode($d);
    }
    return $d;
}

function encode($determiner, $sendto)
{
    if ($determiner == 5) {
        $validator['success']  = true;
        $validator['messages'] = "Successful. Please wait... ";
        $validator['sendto']   = $sendto;
    } else if ($determiner == 1) {
        $validator['success']  = false;
        $validator['messages'] = "Enter your EMAIL.";
    } else if ($determiner == 2) {
        $validator['success']  = false;
        $validator['messages'] = "Enter your PASSWORD.";
    } else if ($determiner == 3) {
        $validator['success']  = false;
        $validator['messages'] = "Error ##3.";
    } else if ($determiner == 4) {
        $validator['success']  = false;
        $validator['messages'] = "Invalid credentials.";
    } else if ($determiner == 6) {
        $validator['success']  = false;
        $validator['messages'] = "Invalid credentials.New here? Please <a style=\"color: #26b99a;\" href=\"#\" data-toggle=\"modal\" data-target=\"#myModal2\"><strong>Click Here</strong></a>.";
    } else {
        $validator['success']  = false;
        $validator['messages'] = "Error while contacting server. Try again.";
    }
    
    echo json_encode($validator);
}

function isJson($str)
{
    $json = json_decode($str);
    return $json && $str != $json;
}

?>