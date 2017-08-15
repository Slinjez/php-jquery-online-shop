<?php
$query = "SELECT `categoryid`, `categoryname` FROM `categories`;";

require ('../controllers/database.php');
$statement = $db->prepare($query);
$statement->execute();
$packages = $statement->fetchAll();
$statement->closeCursor();
?>
<!DOCTYPE html>
<html>
<head>
<?php include 'includes/htmlhead.php';?>
</head>
<body class="hold-transition skin-blue sidebar-mini">
<div class=wrapper>
<header class=main-header>
<?php include 'includes/header.php';?>
</header>
<?php include 'includes/sidenav.php';?>
<div class=content-wrapper>
<section class=content-header>
<h1>
New Product <small>Register new product</small>
</h1>
<ol class=breadcrumb>
<li><a href=index.php><i class="fa fa-dashboard"></i> Home</a></li>
<li class=active>Product Registration</li>
</ol>
</section>
<section class=content>
<div class=col-md-12>
<div class="box box-primary">
<div class="box-header with-border">
<i class="fa fa-pencil"></i>
<h3 class=box-title>New Product</h3>
</div>
<div class=row>
<div class=col-md-1></div>
<div class=col-md-10>
<div class=removeMessages></div>
<div class=ajax-loader></div>
</div>
<div class=col-md-1></div>
</div>
<div class=box-body>
<form id=productregistrationform data-parsley-validate enctype=multipart/form-data class="form-horizontal form-label-left" novalidate method=post action=controllers/uploadproductimage.php>
<div class=box-body>
<div class=form-group>
<label class="control-label col-md-12 col-sm-12 col-xs-12" for=first-name>Product Category <span class=required>*</span>
</label>
<div class="col-md-12 col-sm-12 col-xs-12">
<select class=form-control id=category name=category required>
<option value>Choose category</option>
<?php
                                            foreach ($packages as $package) :
                                                $categoryid = $package["categoryid"];
                                                $categoryname = $package["categoryname"];
                                                echo '<option value="' . $categoryid . '">' . $categoryname . '</option>';
                                            endforeach
                                            ;
                                            ?>
</select>
</div>
</div>
<div class=form-group>
<label class="control-label col-md-12 col-sm-12 col-xs-12" for=first-name>Product Name <span class=required>*</span>
</label>
<div class="col-md-12 col-sm-12 col-xs-12">
<input type=text id=productname required=required placeholder="Product Name" class="form-control col-md-12 col-xs-12" name=productname>
<ul></ul>
</div>
</div>
<div class=form-group>
<label class="control-label col-md-12 col-sm-12 col-xs-12" for=first-name>Product Price <span class=required>*</span>
</label>
<div class="col-md-12 col-sm-12 col-xs-12">
<input type=number id=productprice required=required placeholder="Product Price" class="form-control col-md-12 col-xs-12" name=productprice>
<ul></ul>
</div>
</div>
<div class=form-group>
<label class="control-label col-md-12 col-sm-12 col-xs-12" for=first-name>Product Description <span class=required>*</span>
</label>
</div>
<div class=pad>
<textarea class=textarea id=newproddescription placeholder="Place some text here" style="width:100%;height:200px;font-size:14px;line-height:18px;border:1px solid #ddd;padding:10px" cols rows></textarea>
</div>
<div class=form-group></div>
<div class=form-group>
<label>Product Image</label> <br> <br> <input type=file id=image_file name=upload_images[] class="input_photo btn btn-primary" />
<p class=help-block>Pref 1280X945px.</p>
</div>
<div id=uploaded_images_preview></div>
</div>
<div class=box-footer>
<button type=submit id=submitnewprod class="btn btn-success btn-block">Submit</button>
</div>
</form>
</div>
</div>
</div>
</section>
</div>
<footer class=main-footer>
<?php include 'includes/footer.php';?>
</footer>
</div>
<?php include 'includes/scripts.php';?>
</body>
</html>