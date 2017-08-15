<!DOCTYPE html>
<html>
<head>
<meta charset=utf-8>
<meta http-equiv=X-UA-Compatible content="IE=edge">
<title>Ngera | Administration</title>
<meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name=viewport>
<link rel=stylesheet href=bootstrap/css/bootstrap.min.css>
<link rel=stylesheet href=https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.5.0/css/font-awesome.min.css>
<link rel=stylesheet href=https://cdnjs.cloudflare.com/ajax/libs/ionicons/2.0.1/css/ionicons.min.css>
<link rel=stylesheet href=dist/css/AdminLTE.min.css>
<link rel=stylesheet href=plugins/iCheck/square/blue.css>
<!--[if lt IE 9]>
<script src=https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js></script>
<script src=https://oss.maxcdn.com/respond/1.4.2/respond.min.js></script>
<![endif]-->
</head>
<body class="hold-transition login-page">
<div class=login-box>
<div class=login-logo>
<a href=index.php><b>Ngera Computer Garage</b></a>
</div>
<div class=login-box-body>
<div class=row>
<div class=col-md-1></div>
<div class=col-md-10>
<div class=removeMessages></div>
<div class=ajax-loader></div>
</div>
<div class=col-md-1></div>
</div>
<p class=login-box-msg>Sign in to start your session</p>
<form action=index.php method=post>
<div class="form-group has-feedback">
<input type=email class=form-control placeholder=Email required id=mail> <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
</div>
<div class="form-group has-feedback">
<input type=password class=form-control placeholder=Password required id=ps> <span class="glyphicon glyphicon-lock form-control-feedback"></span>
</div>
<div class=row>
<div class=col-xs-4>
<button type=submit class="btn btn-primary btn-block btn-flat" id=submitBtn>Sign In</button>
</div>
</div>
</form>
</div>
</div>
<script src=plugins/jQuery/jquery-2.2.3.min.js type=text/javascript></script>
<script src=bootstrap/js/bootstrap.min.js type=text/javascript></script>
<script type=text/javascript>$(document).ready(function(){$("#submitBtn").click(function(c){var a=document.getElementById("mail").value;var d=document.getElementById("ps").value;var b={email:a,ps:d};$.ajax({type:"post",beforeSend:function(){$(".ajax-loader").html('<h4 class="modal-title"><span class="fa fa-spinner fa-spin"></span> Working...</h4>');$(".ajax-loader").css("visibility","visible");$(".removeMessages").html("");$(".removeMessages").css("visibility","hidden");jQuery("#submitBtn").addClass("disabled").show();$("#submitBtn").text("Sending...")},url:"login.php",data:b,dataType:"json",success:function(e){if(e.success==true){$(".ajax-loader").html("");$(".ajax-loader").css("visibility","hidden");$(".removeMessages").html('<div class="alert alert-success alert-dismissible" role="alert"><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button><strong> <span class="glyphicon glyphicon-ok-sign"></span> </strong>'+e.messages+"</div>");var f="#";if(e.sendto==1){f="pages/index.php"}sleep(1000,f)}else{$(".ajax-loader").html("");$(".ajax-loader").css("visibility","hidden");$(".removeMessages").html('<div class="alert alert-warning alert-dismissible" role="alert"><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button><strong> <span class="glyphicon glyphicon-exclamation-sign"></span> </strong>'+e.messages+"</div>")}},complete:function(){$(".ajax-loader").html("");$(".ajax-loader").css("visibility","hidden");$(".removeMessages").css("visibility","visible");jQuery("#submitBtn").removeClass("disabled").show();$("#submitBtn").text("Submit")}});c.preventDefault()})});function sleep(a,c){var d=new Date().getTime();for(var b=0;b<10000000;b++){if((new Date().getTime()-d)>a){window.location.href=c;break}}};</script>
</body>
</html>