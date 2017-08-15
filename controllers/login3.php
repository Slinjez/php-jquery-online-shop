<?php
session_start();

$determiner   = 0;
$errorMessage = "";
$validator    = array(
    'success' => false,
    'messages' => array()
);

$userMail    = "";
$plainPs     = "";
$sgnupname   = filter_input(INPUT_POST, 'sgnupname');
$sgnupmail   = filter_input(INPUT_POST, 'sgnupmail');
$sgnupps1    = filter_input(INPUT_POST, 'sgnupps1');
$sgnupps2    = filter_input(INPUT_POST, 'sgnupps2');
$signupphone = filter_input(INPUT_POST, 'signupphone');
if (empty($sgnupname) == true) {
    $determiner = 1;
    encode($determiner);
    exit();
}
if (empty($sgnupmail) == true) {
    $determiner = 2;
    encode($determiner);
    exit();
}
if (empty($signupphone) == true) {
    $determiner = 7;
    encode($determiner);
    exit();
}
if (empty($sgnupps1) == true) {
    $determiner = 3;
    encode($determiner);
    exit();
}
if (empty($sgnupps2) == true) {
    $determiner = 3;
    encode($determiner);
    exit();
}
if ($sgnupps1 != $sgnupps2) {
    $determiner = 4;
    encode($determiner);
    exit();
} else {
    $nw = cheknew($sgnupmail);
    
    if ($nw == 1) {
        $determinerd = array();
        
        $determinerd = process($sgnupname, $sgnupmail, $sgnupps1, $signupphone);
        
        $determiner = $determinerd["determiner"];
        $sendto     = 1;
        
        encode($determiner, $sendto);
    } else {
        $determiner = 6;
        encode($determiner);
    }
}

function cheknew($sgnupmail)
{
    $nswtat = 0;
    require('database.php');
    $query     = "SELECT `userid` FROM `users` WHERE `email`='$sgnupmail'";
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
function process($sgnupname, $sgnupmail, $sgnupps1, $signupphone)
{
    $returnme   = array();
    $role       = 1;
    $determiner = 0;
    $ps2        = hash('sha256', $sgnupps1);
    require('database.php');
    $query     = "INSERT INTO `users`(`name`, `email`, `password`,phone) VALUES ('$sgnupname','$sgnupmail','$ps2','$signupphone');";
    $statement = $db->prepare($query);
    $statement->execute();
    $count = $statement->rowCount();
    $myid  = $db->lastInsertId();
    $statement->closeCursor();
    if ($count == 1) {
        $username                   = $sgnupname;
        $_SESSION["userid"]         = $myid;
        $_SESSION["username"]       = $sgnupname;
        $_SESSION['serverFeedback'] = "Welcome " . $username;
        
        $determiner = 5;
    } else {
        $determiner = 7;
    }
    $returnme = array(
        'determiner' => $determiner,
        'role' => $role
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

function encode($determiner)
{
    $sendto = 1;
    
    if ($determiner == 5) {
        $validator['success']  = true;
        $validator['messages'] = "Successful. Please wait... ";
        $validator['sendto']   = $sendto;
    } else if ($determiner == 1) {
        $validator['success']  = false;
        $validator['messages'] = "Enter your name.";
    } else if ($determiner == 2) {
        $validator['success']  = false;
        $validator['messages'] = "Enter your email.";
    } else if ($determiner == 3) {
        $validator['success']  = false;
        $validator['messages'] = "Enter your passwords.";
    } else if ($determiner == 4) {
        $validator['success']  = false;
        $validator['messages'] = "Your passwords mismatch.";
    } else if ($determiner == 6) {
        $validator['success']  = false;
        $validator['messages'] = "You have alredy registrerd with us. Please login.";
    } else if ($determiner == 7) {
        $validator['success']  = false;
        $validator['messages'] = "Enter your phone.";
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