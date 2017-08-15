<?php
include ('controllers/database.php');
$query = "SELECT `categoryid`, `categoryname`, `categoryimage` FROM `categories`;
";
// echo $query;
$statement = $db->prepare($query);
$statement->execute();
$categoryinfos = $statement->fetchAll();
$statement->closeCursor();
?>
<div class="top_nav_left">
<nav class="navbar navbar-default">
<div class="container-fluid">
<div class="navbar-header">
<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
<span class="sr-only">Toggle navigation</span>
<span class="icon-bar"></span>
<span class="icon-bar"></span>
<span class="icon-bar"></span>
</button>
</div>
<div class="collapse navbar-collapse menu--shylock" id="bs-example-navbar-collapse-1">
<ul class="nav navbar-nav menu__list">
<li class="active menu__item <?php if($pageindx==1){echo "menu__item--current";}?>"><a class="menu__link" href="index.php">Home <span class="sr-only">(current)</span></a></li>
<li class="menu__item <?php if($pageindx==2){echo "menu__item--current";}?>"><a class="menu__link" href="about.php">About</a></li>
<li class="dropdown menu__item <?php if($pageindx==3){echo "menu__item--current";}?>">
<a href="#" class="dropdown-toggle menu__link" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Our Products <span class="caret"></span></a>
<ul class="dropdown-menu multi-column columns-3">
<div class="agile_inner_drop_nav_info">
<div class="col-sm-6 multi-gd-img1 multi-gd-text">
<a href="gencategory.php"><img src="images/defmenu.JPG" alt=" "/></a>
</div>
<div class="col-sm-6 multi-gd-img">
<ul class="multi-column-dropdown">
<?php 
										foreach ($categoryinfos as $categoryinfo) :
										$categoryid = $categoryinfo['categoryid'];
										$categoryname = $categoryinfo['categoryname'];
										$imgpath = $categoryinfo['categoryimage'];
										?>
<li><a href="categoryviewer.php?itm=<?php echo $categoryid;?>"><?php echo $categoryname;?></a></li>
<?php endforeach;?>
</ul>
</div>
<div class="clearfix"></div>
</div>
</ul>
</li>
<li class="menu__item <?php if($pageindx==4){echo "menu__item--current";}?>"><a class="menu__link" href="contactus.php">Contact Us</a></li>
</ul>
</div>
</div>
</nav>
</div>