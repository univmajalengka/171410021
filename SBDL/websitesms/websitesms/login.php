<?php
session_start();

if (isset($_SESSION["username"])) {
    header("Location: index.php");
    exit;
}

require 'functions.php';

if (isset($_POST["login"])) {
    if (login($_POST) > 0) {
        echo "<script>
             alert('login sukses');
            </script>";
    } else {
        echo mysqli_error($conn);
    }
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Halaman Login</title>
    <link rel="stylesheet" type="text/css" href="css/bootstrap.css">
    <script type="text/javascript" src="js/bootstrap.js" ></script>
</head>

<body>
    <h1 align="center">Halaman Login</h1>
    <br>
    <br>

    <!-- pemberitahuan jika username atau password salah -->
    <?php
    if (isset($_SESSION["error"])) {
        echo $_SESSION["error"];
        unset($_SESSION["error"]);
    }
    ?>
    <!-- <p style="color:red; font-style:italic;">username / password salah</p> -->
    <form action="" method="post">
        <div class="container">
            <form action ="/action_page.php">

    <div class="form-group" align="center">
        <label for="username">Username :</label>
        <input type="text" name="username" id="username" required>
  </div>

  <div class="form-group" align="center">
        <label for="password" >Password :</label>
        <input type="password" name="password" id="password" required>
  </div>

        <div class="form-group form-check" align="center">
        <label class="form-check-label">
        
            <p>Belum punya akun ? <a href="registrasi.php" class="btn btn-info">Daftar</a></p>
      
      <br>
      <button type="submit" name="login" class="btn btn-primary" align="center">Login</button>
      <br>
    </label>
  </div>

  
</form>
</body>

</html>