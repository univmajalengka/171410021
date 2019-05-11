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
	<title>Input pbk_group</title>
	<link rel="stylesheet" type="text/css" href="css/bootstrap.css">
	<script type="text/javascript" src="js/bootstrap.js" ></script>
</head>
<body>
<form method="post" action="save_pbkgrup.php">

<input type="text" name="nama" placeholder="Nama">
<input type="text" name="id" placeholder="ID Grup">
<input type="text" name="id_user" placeholder="ID User">
<input type="text" name="is_public" placeholder="Public (Yes, No)">

<input type="submit" name="simpan" value="simpan">
</form>
<hr>
<?php 
// include 'view_rel_fak.php';
?>
<hr>
<a href="view_pbkgroup.php" class="btn btn-Success">List Data</a>
</body>
</html>