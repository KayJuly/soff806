//<?php
ob_start();
session_start();
if( isset($_SESSION['user']) != "") {
	header("Location: main.php");
}
include_once 'connect.php';
//?>

<?php
if(isset($_POST['login'])) {

	$email = $mysqli->real_escape_string($_POST['email']);
	$password = $mysqli->real_escape_string($_POST['password']);

	$query = "SELECT * FROM users WHERE email='$email'";
	$result = $mysqli->query($query);
	if (!$result) {
		print('sql error' . $mysqli->error);
		$mysqli->close();
		exit();
	}

	while ($row = $result->fetch_assoc()) {
		$pwd = $row['password'];
		$user_id = $row['user_id'];
	}

	$result->close();

	if ($password = $pwd) {
		$_SESSION['user'] = $user_id;
		header("Location: main.php");
		exit;
	} else { ?>
		<div class="alert alert-danger" role="alert">MailAdress and password don't match. </div>
	<?php }
} ?>


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
		<form method="post">
			<h1>Sign In</h1>
			<div class="form-group">
				<input type="email"  class="form-control" name="email" placeholder="MailAdress" required />
			</div>
			<div class="form-group">
				<input type="password" class="form-control" name="password" placeholder="password" required />
			</div>
			<button type="submit" class="btn btn-default" name="login">Sign In</button>
			<a href="register.php">Please register here.</a>
		</form>
	</div>
</div>

</body>
</html>
