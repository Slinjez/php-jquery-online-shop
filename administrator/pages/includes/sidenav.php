<?php
?>
<aside class="main-sidebar">
<section class="sidebar">
<div class="user-panel">
<div class="pull-left image">
<img src="<?php echo $_SESSION['userpic'];?>" class="img-circle" alt="User Image">
</div>
<div class="pull-left info">
<p><?php echo $_SESSION["username"];?></p>
<a href="#"><i class="fa fa-circle text-success"></i> Online</a>
</div>
</div>
<ul class="sidebar-menu">
<li class="header">MAIN NAVIGATION</li>
<li class="treeview">
<a href="index.php">
<i class="fa fa-dashboard"></i> <span>Dashboard</span>
</a>
</li>
<li class="treeview">
<a href="#">
<i class="fa fa-gift"></i> <span>Products</span>
<span class="pull-right-container">
<i class="fa fa-angle-left pull-right"></i>
</span>
</a>
<ul class="treeview-menu">
<li><a href="newproductcategory.php"><i class="fa fa-tags"></i> Categories</a></li>
<li><a href="newproduct.php"><i class="fa fa-tags"></i> Items</a></li>
</ul>
</li>
<li class="treeview">
<a href="#">
<i class="fa fa-shopping-cart"></i> <span>Orders</span>
<span class="pull-right-container">
<i class="fa fa-angle-left pull-right"></i>
</span>
</a>
<ul class="treeview-menu">
<li><a href="orders.php"><i class="fa fa-tags"></i> All orders</a></li>
</ul>
</li>
</ul>
</section>
</aside>