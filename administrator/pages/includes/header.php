<?php
?>
<a href="index.php" class="logo">
<span class="logo-mini"><b>Ngera</b></span>
<span class="logo-lg"><b>Admin</b>Ngera</span>
</a>
<nav class="navbar navbar-static-top">
<a href="#" class="sidebar-toggle" data-toggle="offcanvas" role="button">
<span class="sr-only">Toggle navigation</span>
<span class="icon-bar"></span>
<span class="icon-bar"></span>
<span class="icon-bar"></span>
</a>
<div class="navbar-custom-menu">
<ul class="nav navbar-nav">
<li class="dropdown messages-menu">
<a href="../../index.php" target="_blank">
<i class="fa fa-home"></i>
</a>
</li>
<li class="dropdown user user-menu">
<a href="#" class="dropdown-toggle" data-toggle="dropdown">
<img src="<?php echo $_SESSION['userpic'];?>" class="user-image" alt="<?php echo $_SESSION["username"];?>">
<span class="hidden-xs"><?php echo $_SESSION["username"];?></span>
</a>
<ul class="dropdown-menu">
<li class="user-header">
<img src="<?php echo $_SESSION['userpic'];?>" class="img-circle" alt="<?php echo $_SESSION['userpic'];?>">
<p>
<?php echo $_SESSION["username"];?> - Administrator
</p>
</li>
<li class="user-footer">
<div class="pull-left">
<a href="#" class="btn btn-default btn-flat">Profile</a>
</div>
<div class="pull-right">
<a href="../controllers/logoutManager.php" class="btn btn-default btn-flat">Sign out</a>
</div>
</li>
</ul>
</li>
</ul>
</div>
</nav>