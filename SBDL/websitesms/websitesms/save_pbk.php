<?php 
session_start();

if (!isset($_SESSION["username"])) {
    header("Location: login.php");
    exit;
}
 include 'koneksi.php';
  $id         = $_POST['id']; 
  $group_id    = $_POST['group_id'];
  $name       = $_POST['name'];
  $nomer      = $_POST['nomer']; 
  $is_public  = $_POST['is_public'];


  $mysqli   = "INSERT INTO pbk ( id,group_id,name,nomer,is_public) VALUES ('$id', '$group_id', '$name', '$nomer', '$is_public')";
  $result  = mysqli_query($con, $mysqli);
  if ($result) {

    echo "<script> alert('Input Berhasil'); </script>";
    echo "<meta http-equiv='refresh' content='1; url=input_pbk.php'>";
  } else {
    echo "Input gagal";
  }
  mysqli_close($con);
?>