<?php
session_start();
include_once 'connect.php';
if(!isset($_SESSION['user'])) {
	header("Location: index.php");
}

$query = "SELECT * FROM users WHERE user_id=".$_SESSION['user']."";
$result = $mysqli->query($query);

$result = $mysqli->query($query);
if (!$result) {
	print('sql error' . $mysqli->error);
	$mysqli->close();
	exit();
}

while ($row = $result->fetch_assoc()) {
	$username = $row['username'];
	$email = $row['email'];
}

$result->close();

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

<!-- First Grid: Logo & About -->
<div class="w3-row">
<div class="w3-threequarter w3-container">
  <h1 class="w3-xxlarge w3-text-grey">We are</h1>
  <h1 class="w3-jumbo">Auckland Property Management</h1>
</div>
<div class="w3-quarter w3-container w3-text-grey">
	<p>User: <?php echo $username; ?></p>
	<p>Email: <?php echo $email; ?></p>
	<p>
    <a href="logout.php?logout">
      <button type="button" class="btn btn-default btn-sm">
        <span class="glyphicon glyphicon-log-out"></span> Log out
      </button>
    </a>
	</p>
</div>
</div>

<!-- Second Grid: Resent -->
<div class="w3-panel w3-text-grey">
<h4>MOST RECENT WORK:</h4>
</div>
<div class="w3-row">
<div class="w3-half w3-container">
  <img src="images/house1.jpg" style="width:100%;height:506px">
</div>
<div class="w3-half w3-container">
  <img src="images/house2.jpg" style="width:100%;height:506px">
</div>
</div>

<!-- Footer -->
<div class="w3-row w3-section">	
  <div class="w3-third w3-container w3-black w3-dark-grey" style="height:250px">
    <h2>Contact Info</h2>
    <p><i class="fa fa-map-marker" style="width:30px"></i> Auckland, NZ</p>
    <p><i class="fa fa-phone" style="width:30px"></i> Phone: 021 251515</p>
    <p><i class="fa fa-envelope" style="width:30px"> </i> Email: mail@mail.com</p>
  </div>
  <div class="w3-third w3-center w3-large w3-dark-grey w3-text-white" style="height:250px">
    <h2>Contact Us</h2>
    <p>Feel free to contact us.</p>
  </div>
  <div class="w3-third w3-center w3-large w3-dark-grey w3-text-white" style="height:250px">
    <h2>Like Us</h2>
    <i class="w3-xlarge fa fa-facebook-official"></i><br>
    <i class="w3-xlarge fa fa-twitter"></i><br>
  </div>
</div>

</body>
</html>
