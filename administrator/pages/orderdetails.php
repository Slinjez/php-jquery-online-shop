<?php
if ($_GET["itm"] == null) {
    header("Location: orders.php");
} else {
    $orderid = $_GET["itm"];
}
?>
<!DOCTYPE html>
<html>
<head>
<?php include 'includes/htmlhead.php';?>
</head>
<body class="hold-transition skin-blue sidebar-mini">
<input type=hidden id=orderid value=<?php echo $orderid?>>
<div class=wrapper>
<header class=main-header>
<?php include 'includes/header.php';?>
</header>
<?php include 'includes/sidenav.php';?>
<div class=content-wrapper>
<section class=content-header>
<h1>
Order <?php echo $orderid?>
<small>Order Details</small>
</h1>
<ol class=breadcrumb>
<li><a href=index.php><i class="fa fa-dashboard"></i> Home</a></li>
<li class=active>Order <?php echo $orderid?> Details</li>
</ol>
</section>
<section class=content>
<div class=col-md-12>
<div class=row>
<div class=col-md-1></div>
<div class=col-md-10>
<div class=removeMessages></div>
<div class=ajax-loader></div>
</div>
<div class=col-md-1></div>
</div>
<div class="box box-primary">
<div class="box-header with-border">
<h3 class=box-title>All Orders</h3>
</div>
<table class="table table-striped table-bordered dt-responsive nowrap" id=ordersTable>
<thead>
<tr>
<th>S.no</th>
<th>Order Id</th>
<th>Product</th>
<th>Units</th>
<th>Amount</th>
<th>Payed</th>
<th>Date</th>
</tr>
</thead>
</table>
</div>
</div>
</section>
<div class="modal fade" tabindex=-1 role=dialog id=removeMemberModal>
<div class=modal-dialog role=document>
<div class=modal-content>
<div class=modal-header>
<button type=button class=close data-dismiss=modal aria-label=Close>
<span aria-hidden=true>&times;</span>
</button>
<h4 class=modal-title>
<span class="glyphicon glyphicon-trash"></span> Remove Member
</h4>
</div>
<div class=modal-body>
<p>Do you really want to remove this?</p>
</div>
<div class=modal-footer>
<button type=button class="btn btn-default" data-dismiss=modal>Close</button>
<button type=button class="btn btn-primary" id=removeBtn>Remove</button>
</div>
</div>
</div>
</div>
<div class="modal fade" tabindex=-1 role=dialog id=updateModal>
<div class=modal-dialog role=document>
<div class=modal-content>
<div class=modal-header>
<button type=button class=close data-dismiss=modal aria-label=Close>
<span aria-hidden=true>&times;</span>
</button>
<h4 class=modal-title>
<span class="glyphicon glyphicon-trash"></span> Update Member1
</h4>
</div>
<div class=modal-body>
<p>Do you really want to Update ?</p>
</div>
<div class=modal-footer>
<button type=button class="btn btn-default" data-dismiss=modal>Close</button>
<button type=button class="btn btn-primary" id=updatebutton>Save
changes</button>
</div>
</div>
</div>
</div>
</div>
<footer class=main-footer>
<?php include 'includes/footer.php';?>
</footer>
</div>
<?php include 'includes/scripts.php';?>
<script src=../plugins/datatables/jquery.dataTables.min.js type=text/javascript></script>
<script src=../plugins/datatables/dataTables.bootstrap.min.js type=text/javascript></script>
<script type=text/javascript src=js/orders.js></script>
</body>
</html>