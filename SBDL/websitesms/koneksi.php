<?php
	$server = "localhost";
	$username = "root";
	$password = "";
	$database = "sms_gateway";

	$con = mysqli_connect($server,$username,$password,$database);

	if (! $con) {
		echo "gagal konek";
		mysqli_error();

	}
	else{

	}

?>