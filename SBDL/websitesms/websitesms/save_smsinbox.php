<?php 
session_start();

if (!isset($_SESSION["username"])) {
    header("Location: login.php");
    exit;
}
 include 'koneksi.php';
  $id_inbox       = $_POST['id_inbox'];
  $id_user          = $_POST['id_user']; 
  $trash           = $_POST['trash'];

  $mysqli   = "INSERT INTO user_inbox (id_inbox, id_user, trash) VALUES ('$id_inbox', '$id_user', '$trash')";
  $result  = mysqli_query($con, $mysqli);
  if ($result) {

    echo "<script> alert('Input Berhasil'); </script>";
    echo "<meta http-equiv='refresh' content='1; url=input_smsinbox.php'>";
  } else {
    echo "Input gagal";
  }
  mysqli_close($con);
?>