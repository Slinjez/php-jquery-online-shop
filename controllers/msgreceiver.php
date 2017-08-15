<?php
require('functions.php');
$Operations = new Operations();
$action     = filter_input(INPUT_POST, 'action');
if ($action == NULL) {
    
    $action = filter_input(INPUT_GET, 'action');
    
    if ($action == NULL) {
        
        $action = "";
    }
}

switch ($action) {
    case 'contactform':
        $validator = array(
        'success' => false,
        'messages' => array()
        );
        
        $name     = filter_input(INPUT_POST, 'name');
        $userMail = filter_input(INPUT_POST, 'email');
        $message  = filter_input(INPUT_POST, 'message');
        
        if (empty($userMail) == true) {
            
            $determiner  = 1;
            $determinerd = $Operations->encode($determiner);
            
            exit();
        } else if (empty($name) == true) {
            
            $determiner  = 2;
            $determinerd = $Operations->encode($determiner);
            exit();
        } else {
            
            $today = date("Y-m-d");
            
            $determinerd = $Operations->saveContactUsMessage($name, $userMail, $today, $message);
            
            if ($determinerd == 1) {
                $determiner = 5;
            } else {
                $determiner = 4;
            }
        }
        
        if ($determiner == 5) {
            $validator['success']  = true;
            $validator['messages'] = "Successful. We will contact you soon. ";
        } else if ($determiner == 1) {
            $validator['success']  = false;
            $validator['messages'] = "Enter your email address.";
        } else if ($determiner == 2) {
            $validator['success']  = false;
            $validator['messages'] = "Enter your name.";
        } else if ($determiner == 3) {
            $validator['success']  = false;
            $validator['messages'] = "Error #3.";
        } else if ($determiner == 4) {
            $validator['success']  = false;
            $validator['messages'] = "Error #4.";
        } else if ($determiner == 6) {
            $validator['success']  = false;
            $validator['messages'] = "Error #6.";
        } else {
            $validator['success']  = false;
            $validator['messages'] = "Error while contacting server. Try again.";
        }
        
        echo json_encode($validator, JSON_HEX_TAG | JSON_HEX_APOS | JSON_HEX_QUOT | JSON_HEX_AMP | JSON_UNESCAPED_UNICODE | JSON_FORCE_OBJECT | JSON_PRESERVE_ZERO_FRACTION);
        
        break;
        
    case 'contactrealtorform':
        $validator = array(
        'success' => false,
        'messages' => array()
        );
        
        $realtorid  = filter_input(INPUT_POST, 'realtorid');
        $propertyid = filter_input(INPUT_POST, 'propertyid');
        $name       = filter_input(INPUT_POST, 'name');
        $userMail   = filter_input(INPUT_POST, 'email');
        $message    = filter_input(INPUT_POST, 'message');
        
        if (empty($userMail) == true) {
            
            $determiner = 1;
        } else if (empty($name) == true) {
            
            $determiner = 2;
        } else {
            
            $today = date("Y-m-d");
            
            $Operations = new Operations();
            
            $determinerd = $Operations->saveRealtorMessage($realtorid, $propertyid, $name, $userMail, $today, $message);
            
            if ($determinerd == 1) {
                $determiner = 5;
            } else {
                $determiner = 4;
            }
        }
        
        if ($determiner == 5) {
            $validator['success']  = true;
            $validator['messages'] = "Successful. I will contact you soon. ";
        } else if ($determiner == 1) {
            $validator['success']  = false;
            $validator['messages'] = "Enter your email address.";
        } else if ($determiner == 2) {
            $validator['success']  = false;
            $validator['messages'] = "Enter your name.";
        } else if ($determiner == 3) {
            $validator['success']  = false;
            $validator['messages'] = "Error #3.";
        } else if ($determiner == 4) {
            $validator['success']  = false;
            $validator['messages'] = "Error #4.";
        } else if ($determiner == 6) {
            $validator['success']  = false;
            $validator['messages'] = "Error #6.";
        } else {
            $validator['success']  = false;
            $validator['messages'] = "Error while contacting server. Try again.";
        }
        
        echo json_encode($validator, JSON_HEX_TAG | JSON_HEX_APOS | JSON_HEX_QUOT | JSON_HEX_AMP | JSON_UNESCAPED_UNICODE | JSON_FORCE_OBJECT | JSON_PRESERVE_ZERO_FRACTION);
        
        break;
}
?> 