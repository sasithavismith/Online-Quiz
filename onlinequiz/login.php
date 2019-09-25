<?php include('server.php') ?>
<!DOCTYPE html>
<html>
<head>
	<title>LOGIN</title>
	<link rel="stylesheet" type="text/css" href="style.css">

	<link href="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
<script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
</head>
<body>
	
		<div class="header">
			<h2>Login here</h2>
		</div>
		<form method="post" action="login.php">

<?php echo display_error() ?>

<h2>Login Here</h2>

		<div class="form-group">
			<label>Username</label>
			<input type="text" name="username" class="form-control" placeholder="Enter Username">
		</div>
		<div class="form-group">
			<label>Password </label>
			<input type="password" name="password" class="form-control" placeholder="Enter Password">
		</div>
		<div class="form-group">
			<button type="submit" class="btn btn-primary"  name="login_btn">Login</button>
		</div>
		
		<input type="checkbox" checked="check" name="remember">Remember me
		<p>
			Not yet a member? <a href="registration.php">Sign up</a>
		</p>
	</form




	

</body>
</html>