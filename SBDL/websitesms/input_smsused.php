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
	<title>Input sms used</title>
	<link rel="stylesheet" type="text/css" href="css/bootstrap.css">
	<script type="text/javascript" src="js/bootstrap.js" ></script>
</head>
<body>
<form method="post" action="save_smsused.php">

<input type="text" name="id_sms_used" placeholder="ID SMS bekas">
<input type="date" name="sms_date" placeholder="Tanggal">
<input type="text" name="id_user" placeholder="ID User">
<input type="text" name="out_sms_count" placeholder="jumlah sms keluar">
<input type="text" name="in_sms_count" placeholder="jumlah sms masuk">


<input type="submit" name="simpan" value="simpan">
</form>
<hr>
<?php 
// include 'view_rel_fak.php';
?>
<hr>
<a href="view_sms_used.php" class="btn btn-Success">List Data</a>
</body>
</html>