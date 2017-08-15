<?php
session_start();

$determiner = 0;
$errorMessage = "";
$validator = array(
    'success' => false,
    'messages' => array()
);

$userMail = "";
$plainPs = "";
$userMail = filter_input(INPUT_POST, 'email');
$userPsIn = filter_input(INPUT_POST, 'ps');
if (empty($userMail) == true) {
    $determiner = 1;
    encode($determiner, 0);
    exit();
} else if (empty($userPsIn) == true) {
    $determiner = 2;
    encode($determiner, 0);
    exit();
} else {
    $determinerd = array();
    $determinerd = process($userMail, $userPsIn);
    $determiner = $determinerd["determiner"];
    $sendto = $determinerd["role"];
    encode($determiner, $sendto);
}

function process($userMail, $userPsIn)
{
    $returnme = array();
    $role = 0;
    $determiner = 0;
    $ps2 = hash('sha256', $userPsIn);
    require ('controllers/databaselogin.php');
    $query = 'SELECT `adminid`, `name`, `email`, `password`, `role`, `active`, `profilepicture` FROM `administrators` WHERE `email`="' . $userMail . '"';
    $statement = $db->prepare($query);
    $statement->execute();
    $FtchededCompanydetails = $statement->fetchAll();
    $statement->closeCursor();
    
    foreach ($FtchededCompanydetails as $post) :
        $userid = $post['adminid'];
        $firstname = $post['name'];
        $mail = $post['email'];
        $active = $post['active'];
        $role = $post['role'];
        $password = $post['password'];
        $profilepicture = $post['profilepicture'];
    endforeach
    ;
    
    if ($FtchededCompanydetails != null) {
        if ($userMail == $mail && $ps2 == $password) {
            $username = $firstname;
            $_SESSION["userid"] = $userid;
            $_SESSION["username"] = $username;
            $_SESSION['serverFeedback'] = "Welcome " . $username;
            
            if ($active == 0) {
                $determiner = 3;
            } else if ($active == 1) {
                $determiner = 5;
                // }
            }
        } else {
            $determiner = 4;
        }
    } else {
        $determiner = 6;
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

function encode($determiner, $sendto)
{
    $sendto = 1;
    
    if ($determiner == 5) {
        $validator['success'] = true;
        $validator['messages'] = "Successful. Please wait... ";
        $validator['sendto'] = $sendto;
    } else if ($determiner == 1) {
        $validator['success'] = false;
        $validator['messages'] = "Enter your email.";
    } else if ($determiner == 2) {
        $validator['success'] = false;
        $validator['messages'] = "Enter your password.";
    } else if ($determiner == 3) {
        $validator['success'] = false;
        $validator['messages'] = "Please activate your account. Check your email inbox for more details.";
    } else if ($determiner == 4) {
        $validator['success'] = false;
        $validator['messages'] = "Invalid id or password.";
    } else if ($determiner == 6) {
        $validator['success'] = false;
        $validator['messages'] = "Invalid credentials.";
    } else {
        $validator['success'] = false;
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