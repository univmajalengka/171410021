<?php 
session_start();

if (!isset($_SESSION["username"])) {
    header("Location: login.php");
    exit;
}
 include 'koneksi.php';
  $id_sms_used       = $_POST['id_sms_used'];
  $sms_date          = $_POST['sms_date']; 
  $id_user           = $_POST['id_user'];
  $out_sms_count     = $_POST['out_sms_count'];
  $in_sms_count      = $_POST['in_sms_count'];


  $mysqli   = "INSERT INTO sms_used (id_sms_used, sms_date, id_user, out_sms_count, in_sms_count) VALUES ('$id_sms_used', '$sms_date', '$id_user', '$out_sms_count', 'in_sms_count')";
  $result  = mysqli_query($con, $mysqli);
  if ($result) {

    echo "<script> alert('Input Berhasil'); </script>";
    echo "<meta http-equiv='refresh' content='1; url=input_smsused.php'>";
  } else {
    echo "Input gagal";
  }
  mysqli_close($con);
?>