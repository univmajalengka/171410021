<?php
session_start();

if (isset($_SESSION["username"])) {
    header("Location: index.php");
    exit;
}

require 'functions.php';

if (isset($_POST["register"])) {
    if (registrasi($_POST) > 0) {
        ?>
        <!-- <meta http-equiv="refresh" content="0; url=login.php"> -->
        <script>
            alert("user baru berhasil ditambahkan");
            document.location.href = "login.php";
        </script>
    <?php
    //header('Location: login.php');
} else {
    echo mysqli_error($con);
}
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Halaman Registrasi</title>
    <link rel="stylesheet" type="text/css" href="css/bootstrap.css">
    <script type="text/javascript" src="js/bootstrap.js" ></script>
    <style>
        label {
            display: block;
        }
    </style>
</head>

<body>
    <h1 align="center">Halaman Registrasi</h1>

    <form action="" method="post">
        <div class="container">
            <form action ="/action_page.php">

    <div class="form-group" align="center">
        <label for="username">Username :</label>
        <input type="text" name="username" id="username">
  </div>

  <div class="form-group" align="center">
        <label for="password">Password :</label>
        <input type="password" name="password" id="password">
  </div>

  <div class="form-group" align="center">
        <label for="password2">Konfirmasi Password</label>
        <input type="password" name="password2" id="password2">
  </div>

        <div class="form-group form-check" align="center">
        <label class="form-check-label">
            <button type="submit" name="register" class="btn btn-warning">Register!</button>
                <a href="logout.php" class="btn btn-primary">Back</a>
    </label>
  </div>

</body>

</html>