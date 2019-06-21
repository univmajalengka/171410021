<?php 
session_start();

if (!isset($_SESSION["username"])) {
    header("Location: login.php");
    exit;
}
 include 'koneksi.php';
  $id_outbox       = $_POST['id_outbox'];
  $id_user          = $_POST['id_user']; 

  $mysqli   = "INSERT INTO user_outbox (id_outbox, id_user) VALUES ('$id_outbox', '$id_user')";
  $result  = mysqli_query($con, $mysqli);
  if ($result) {

    echo "<script> alert('Input Berhasil'); </script>";
    echo "<meta http-equiv='refresh' content='1; url=input_smsoutbox.php'>";
  } else {
    echo "Input gagal";
  }
  mysqli_close($con);
?>