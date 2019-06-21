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
	<title>Input sms Outbox</title>
	<link rel="stylesheet" type="text/css" href="css/bootstrap.css">
	<script type="text/javascript" src="js/bootstrap.js" ></script>
</head>
<body>
<form method="post" action="save_sms_setting.php">

<input type="text" name="id_user" placeholder="ID User">
<input type="text" name="tema" placeholder="Tema">
<input type="text" name="laporan_pengiriman" placeholder="Laporan Pengiriman (Yes, No)">
<input type="text" name="language" placeholder="Bahasa">
<input type="text" name="conversation_sort" placeholder="Hasil Diskusi (Asc, Desc)">
<input type="text" name="country_code" placeholder="Kode">


<input type="submit" name="simpan" value="simpan">
</form>
<hr>
<?php 
// include 'view_rel_fak.php';
?>
<hr>
<a href="view_usersetting.php" class="btn btn-Success">List Data</a>
</body>
</html>