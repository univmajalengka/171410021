<?php 
session_start();

if (!isset($_SESSION["username"])) {
    header("Location: login.php");
    exit;
}
 include 'koneksi.php';
  $nama         = $_POST['nama'];
  $id         = $_POST['id']; 
  $id_user    = $_POST['id_user'];
  $is_public       = $_POST['is_public'];


  $mysqli   = "INSERT INTO pbk_group (nama,id,id_user,is_public) VALUES ('$nama', '$id', '$id_user', '$is_public')";
  $result  = mysqli_query($con, $mysqli);
  if ($result) {

    echo "<script> alert('Input Berhasil'); </script>";
    echo "<meta http-equiv='refresh' content='1; url=input_pbkgrup.php'>";
  } else {
    echo "Input gagal";
  }
  mysqli_close($con);
?>