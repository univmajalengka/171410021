
<?php
session_start();

if (!isset($_SESSION["username"])) {
    header("Location: login.php");
    exit;
}
	require 'functions.php';
	$id = $_GET["id_sms_used"];

	if (hapusused($id) >0 ) {
		echo " 
			<script>
				alert('data berhasil dihapus !!');
				document.location.href = 'view_sms_used.php';
			</script>

		";
	} else {
		echo " 
			<script>
				alert('data gagal dihapus !!');
				document.location.href = 'view_sms_used.php';
			</script>
			";

	}
?>