<?php
session_start();
if( isset($_SESSION['user']) != "") {
	header("Location: main.php");
}
include_once 'connect.php';
?>

<!DOCTYPE html>
<html>
<title>SOFT806 WebAPP -Kay Shoji -</title>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.0/css/bootstrap.min.css">
<body class="w3-content" style="max-width:1200px">

<div class="w3-panel w3-text-grey">
	<div class="col-xs-6 col-xs-offset-3">
	<?php
	if(isset($_POST['signup'])) {

	$username = $mysqli->real_escape_string($_POST['username']);
	$email = $mysqli->real_escape_string($_POST['email']);
	$password = $mysqli->real_escape_string($_POST['password']);

	$query = "INSERT INTO users(username,email,password) VALUES('$username','$email','$password')";

	if($mysqli->query($query)) {  ?>
		<div class="alert alert-success" role="alert">You have been registered.</div>
		<?php } else { ?>
		<div class="alert alert-danger" role="alert">An unkonw error occurred.</div>
		<?php
	}
} ?>

<form method="post">
	<h1>User information</h1>
	<div class="form-group">
		<input type="text" class="form-control" name="username" placeholder="user name" required />
	</div>
	<div class="form-group">
		<input type="email"  class="form-control" name="email" placeholder="mailaddress" required />
	</div>
	<div class="form-group">
		<input type="password" class="form-control" name="password" placeholder="password" required />
	</div>
	<button type="submit" class="btn btn-default" name="signup">Registration</button>
	<a href="index.php">Sign up</a>
</form>
</div>
</div>

</body>
</html>
