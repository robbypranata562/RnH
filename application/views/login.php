<!DOCTYPE html>
<html>
<head>
	<title></title>
	<link rel="stylesheet" type="text/css" href="<?php  echo base_url()."assets/bootstrap/css/bootstrap.css" ?>" type="text/css">
	<link rel="stylesheet" type="text/css" href="<?php  echo base_url()."assets/dist/css/AdminLTE.min.css" ?>" type="text/css">
</head>
<body>

<div class="login-box">
  <div class="login-logo">
	<a href="#"><b>Admin</b>LTE</a>
  </div>
  <!-- /.login-logo -->
  <div class="login-box-body">
	<p class="login-box-msg">Sign in to start your session</p>
	<form method="post" class="form-horizontal" action="<?php  echo base_url().'Login/user_login' ?>">
	  <div class="form-group has-feedback">
		<input type="text" class="form-control" placeholder="Email" name="username">
		<span class="glyphicon glyphicon-envelope form-control-feedback"></span>
	  </div>
	  <div class="form-group has-feedback">
		<input type="password" class="form-control" placeholder="Password" name="password">
		<span class="glyphicon glyphicon-lock form-control-feedback"></span>
	  </div>
	  <div class="row">
		<div class="col-xs-8">
		  <div class="checkbox icheck">
			<label>
			  <input type="checkbox"> Remember Me
			</label>
		  </div>
		</div>
		<!-- /.col -->
		<div class="col-xs-4">
		  <button name="login" type="submit" class="btn btn-primary btn-block btn-flat">Sign In</button>
		</div>
		<!-- /.col -->
	  </div>
	</form>
	<!-- /.social-auth-links -->

	<a href="#">I forgot my password</a><br>
	<a href="register.html" class="text-center">Register a new membership</a>

  </div>
  <!-- /.login-box-body -->
</div>

</body>
</html>
