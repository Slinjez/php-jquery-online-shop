<?php

class Operations
{
    
    function saveContactUsMessage($name, $userMail, $today, $message)
    {
        require ('database.php');
        $message = $db->quote($message);
        $query = "INSERT INTO `contactus_messages`( `name`, `email`, `date_sent`, `message`, `is_served`) VALUES ('$name','$userMail','$today',$message,0)";
        $statement = $db->prepare($query);
        $statement->execute();
        $count = $statement->rowCount();
        $statement->closeCursor();
        
        return $count;
    }
    
    function saveRealtorMessage($realtorid, $propertyid, $name, $userMail, $today, $message)
    {
        require ('database.php');
        $message = $db->quote($message);
        $query = "INSERT INTO `realtor_messages`(`torealtorid`,`propertyid`,`name`, `email`, `date_sent`, `message`, `is_served`) VALUES ($realtorid,$propertyid,'$name','$userMail','$today',$message,0)";
        $statement = $db->prepare($query);
        $statement->execute();
        $count = $statement->rowCount();
        $statement->closeCursor();
        
        return $count;
    }
    
    function encode($determiner)
    {
        if ($determiner == 5) {
            $validator['success'] = true;
            $validator['messages'] = "Successful. We will contact you soon. ";
        } else if ($determiner == 1) {
            $validator['success'] = false;
            $validator['messages'] = "Enter your email address.";
        } else if ($determiner == 2) {
            $validator['success'] = false;
            $validator['messages'] = "Enter your name.";
        } else if ($determiner == 3) {
            $validator['success'] = false;
            $validator['messages'] = "Error #3.";
        } else if ($determiner == 4) {
            $validator['success'] = false;
            $validator['messages'] = "Error #4.";
        } else if ($determiner == 6) {
            $validator['success'] = false;
            $validator['messages'] = "Error #6.";
        } else {
            $validator['success'] = false;
            $validator['messages'] = "Error while contacting server. Try again.";
        }
        
        echo json_encode($validator, JSON_HEX_TAG | JSON_HEX_APOS | JSON_HEX_QUOT | JSON_HEX_AMP | JSON_UNESCAPED_UNICODE | JSON_FORCE_OBJECT | JSON_PRESERVE_ZERO_FRACTION);
    }
}
?>