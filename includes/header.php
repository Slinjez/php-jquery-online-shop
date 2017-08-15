<?php
?>
<div class="container">
<ul>
<?php 
		   if (isset($_SESSION['userid']) == true) {
		        ?>
<li><?php echo $_SESSION['username']?></li>
<li><a href="controllers/logoutmanager.php">Log Out</a></li>
<?php 
		   }
		   else{
		       //echo "<li>ouu</li>";
		       ?>
<li> <a href="#" data-toggle="modal" data-target="#myModal"><i class="fa fa-unlock-alt" aria-hidden="true"></i> Sign In </a></li>
<li> <a href="#" data-toggle="modal" data-target="#myModal2"><i class="fa fa-pencil-square-o" aria-hidden="true"></i> Sign Up </a></li>
<?php 
		   }
		   ?>
<li><i class="fa fa-phone" aria-hidden="true"></i> Call : 0724 651265 | 0725 271327</li>
<li><i class="fa fa-envelope-o" aria-hidden="true"></i> <a href="mailto:info@ngeracomputergarage.com">info@ngeracomputergarage.com</a></li>
</ul>
</div>