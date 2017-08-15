<?php
?>
<div class="wthreecartaits wthreecartaits2 cart cart box_1">
<a href="#" class="cart-box" data-toggle="modal" data-target="#cartModal" id="cart-info" title="View Cart">
<i class="fa fa-shopping-cart"></i>
<?php 
if(isset($_SESSION["products"])){
	echo count($_SESSION["products"]); 
}else{
	echo 0; 
}
?>
</a>
</div>
<div id="cartModal" class="modal fade" role="dialog">
<div class="modal-dialog">
<div class="modal-content">
<div class="modal-header">
<button type="button" class="close" data-dismiss="modal">&times;</button>
<h4 class="modal-title"><i class="fa fa-shopping-cart"></i> My Cart</h4>
</div>
<div class="modal-body" id="shopping-cart-results">
</div>
<div class="modal-footer">
<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
</div>
</div>
</div>
</div>