<?php

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
Product Category
<small>Register new product category</small>
</h1>
<ol class=breadcrumb>
<li><a href=index.php><i class="fa fa-dashboard"></i> Home</a></li>
<li class=active>Product Category</li>
</ol>
</section>
<section class=content>
<div class=col-md-12>
<div class="box box-primary">
<div class="box-header with-border">
<i class="fa fa-pencil"></i>
<h3 class=box-title>New Product Category</h3>
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
<form role=form id=productcatregistrationform>
<div class=box-body>
<div class=form-group>
<label for=exampleInputEmail1>Category Name</label>
<input type=text class=form-control id=catname name=catname placeholder="e.g Laptops">
</div>
<div class=form-group>
<label>Category Image</label> <br> <br>
<input type=file id=image_file name=upload_images[] class="input_photo btn btn-primary" />
<p class=help-block>Pref 1680X700px.</p>
<label> </label>
</div>
<div id=uploaded_images_preview></div>
</div>
<div class=box-footer>
<button type=submit id=prodcatbut class="btn btn-primary btn-block">Submit</button>
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