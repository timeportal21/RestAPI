<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Login</title>
</head>
<body>
	<form action="<?php echo base_url() ?>api_login" method="post">
		<div>
			<label>Username</label>
			<input type="text" name="username">
		</div>
		<div>
			<label>Password</label>
			<input type="password" name="password">
		</div>
		<button type="submit" name="submit" class="btn btn-primary">Submit</button>
	</form>
	<a href="<?php echo base_url() ?>register">Register</a>

</body>
</html>