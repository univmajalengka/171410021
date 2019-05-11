<?php 
session_start();

if (!isset($_SESSION["username"])) {
    header("Location: login.php");
    exit;
}
?>
<!DOCTYPE html>
<html>
<head>
	<title>Input sms inbox</title>
	<link rel="stylesheet" type="text/css" href="css/bootstrap.css">
	<script type="text/javascript" src="js/bootstrap.js" ></script>
</head>
<body>
<form method="post" action="save_smsinbox.php">

<input type="text" name="id_inbox" placeholder="ID Inbox">
<input type="text" name="id_user" placeholder="ID User">
<input type="text" name="trash" placeholder="Sampah">

<input type="submit" name="simpan" value="simpan">
</form>
<hr>
<?php 
// include 'view_rel_fak.php';
?>
<hr>
<a href="view_smsinbox.php" class="btn btn-Warning">List Data</a>
</body>
</html>