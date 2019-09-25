<?php include('server.php') ?>
<!DOCTYPE html>
<html>
<head>
	<title>Registration</title>
	<link rel="stylesheet" type="text/css" href="style.css">
	<link href="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
<script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
</head>
<body>
	<div class="container">
		<div class="header">
			<h2>Register here</h2>
		</div>
		<form method="post" action="registration.php">

<?php echo display_error(); ?>
<div class="form-group">
<label>Username</label>
<input type="text" name="username" class="form-control" placeholder="Enter Username" value="<?php echo $username; ?>">
</div>

<div class="form-group">
<label>Email</label>
<input type="email" name="email" class="form-control" placeholder="Enter email"  value="<?php echo $email; ?>">
</div>

<div class="form-group">
<label>Password</label>
<input type="password" class="form-control" placeholder="Enter Password" name="password_1">
</div>

<div class="form-group">
<label>Confirm password</label>
<input type="password" class="form-control" placeholder="Enter Password" name="password_2">
</div>

<div class="form-group">
<button type="submit" class="btn btn-primary"name="register_btn">Register</button>
</div>

<p>
	Already a member? <a href="login.php">Sign in</a>
</p>
</form>



	</div>

</body>
</html>