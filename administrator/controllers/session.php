<?php
if(!isset($_SESSION))
{
	session_start();

}
if(($_SESSION["userid"])==null){
	echo "Null session.<br>";
	header("Location: ../index.php");
	//exit();
}else{
	


// echo "starting session <br>";
// echo "sess status: ".session_status()."<br>";
 $curidb4=$_SESSION["userid"];
 //echo "Cur user id b4:".$curidb4."<br>";

 $curid="";
 $curid=$_SESSION["userid"];
 //echo "Cur user id:".$curid."<br>";
 include('database.php');
 $query = "SELECT adminid AS userid,role,active,profilepicture from administrators WHERE `adminid`=$curid";

 $statement = $db->prepare($query);
 $statement->execute();
 $FtchededCompanydetails = $statement->fetchAll();
 $statement->closeCursor();
 
 if($FtchededCompanydetails==null){
 	header("Location: ../index.php");
 	//echo "<br>bad 1";
 }
 else{
 	//echo "<br>Managed to fetch<br>";
 	foreach ($FtchededCompanydetails as $post) :
 	$userid1=$post['userid'];
 	$role=$post['role'];
 	$active=$post['active'];
 	$picture=$post['profilepicture'];
 	endforeach;
	
 	//echo $userid1.",".$role.",".$active.",".$picture;
 	
 	if($userid1!=$curid||$role!=1||$active!=1){
 		$_SESSION['$errorMessage']="Please renew your subscription";
 		
 		header("Location: ../index.php");
 	}
 }
 $usernamee=$_SESSION["username"];
 $userid=$_SESSION["userid"];
 $salutation=$_SESSION['serverFeedback'];
 if($picture==null){
 	$picture="../dist/img/profilepictures/me.jpg";
 }
 $_SESSION['userrole']=$role;
 $_SESSION['userpic']=$picture;
 $_SESSION['AppName']="Ngera";
}
// session_start();
// if(!isset($_SESSION['userid']))
// {
// 	header("location: ../index.php");
// }

//$userid=$_SESSION['userid'];
//echo "User id: ".$userid."<br>";
?>
