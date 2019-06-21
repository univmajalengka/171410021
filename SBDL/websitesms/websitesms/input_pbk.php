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
	<title>Input pbk</title>
	<link rel="stylesheet" type="text/css" href="css/bootstrap.css">
	<script type="text/javascript" src="js/bootstrap.js" ></script>
</head>
<body>
<form method="post" action="save_pbk.php">
<input type="text" name="id" placeholder="ID">
<input type="text" name="group_id" placeholder="Group ID">
<input type="text" name="name" placeholder="Nama">
<input type="text" name="nomer" placeholder="Nomor">
<input type="text" name="is_public" placeholder="Public (Yes, No)">

<input type="submit" name="simpan" value="simpan">	
</form>
<hr>
<?php 
// include 'view_rel_fak.php';
?>
<hr>
<a href="view_pbk.php" class="btn btn-Success">List Data</a>
</body>
</html>