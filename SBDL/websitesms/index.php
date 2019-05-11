<?php 
session_start();

if (!isset($_SESSION["username"])) {
    header("Location: login.php");
    exit;
}
	require 'functions.php';

 ?>
<!DOCTYPE html>

<html lang="en">
<head>
	<meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

	<title>website SMS</title>
	<link rel="stylesheet" type="text/css" href="css/bootstrap.css">
	<script type="text/javascript" src="js/bootstrap.js" ></script>
</head>
<body>
	
    <nav class="navbar navbar-expand-sm bg-light navbar-light">
  <ul class="navbar-nav">
    <li class="nav-item active">
      <a class="nav-link" href="view_sms_used.php">Pemesanan Pelanggan</a>
    </li>
    <li class="nav-item active">
      <a class="nav-link" href="view_pbk.php">PBK</a>
    </li>
    <li class="nav-item active">
      <a class="nav-link" href="view_pbkgroup.php">Group PBK</a>
    </li>
    <li class="nav-item active">
      <a class="nav-link " href="view_smsinbox.php">SMS Inbox</a>
    </li>
    <li class="nav-item active">
      <a class="nav-link " href="view_smsoutbox.php">SMS Outbox</a>
    </li>
    <li class="nav-item active">
      <a class="nav-link " href="view_usersetting.php">Setting</a>
    </li>
  </ul>
</nav>
 
   <div class="jumbotron jumbotron-fluid">
  <div class="container">
    <h3 class="display-4">Selamat Datang <?= $_SESSION["username"] ?></h3>
    <p class="lead">Di Menu SMS Gateway</p>
  </div>
</div>
	
	
	<hr>
	<br>
		<a href="logout.php" class="btn btn-primary">Logout</a>
	
	
</body>
</html>