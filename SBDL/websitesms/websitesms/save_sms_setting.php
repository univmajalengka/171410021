<?php 
session_start();

if (!isset($_SESSION["username"])) {
    header("Location: login.php");
    exit;
}
 include 'koneksi.php';
  $id_user       = $_POST['id_user'];
  $tema          = $_POST['tema']; 
  $laporan_pengiriman       = $_POST['laporan_pengiriman']; 
  $language                 = $_POST['language']; 
  $conversation_sort        = $_POST['conversation_sort']; 
  $country_code             = $_POST['country_code']; 

  $mysqli   = "INSERT INTO user_setting (id_user, tema,laporan_pengiriman,language,conversation_sort,country_code) VALUES ('$id_user', '$tema','$laporan_pengiriman','$language','$conversation_sort','$country_code')";
  $result  = mysqli_query($con, $mysqli);
  if ($result) {

    echo "<script> alert('Input Berhasil'); </script>";
    echo "<meta http-equiv='refresh' content='1; url=input_sms_setting.php'>";
  } else {
    echo "Input gagal";
  }
  mysqli_close($con);
?>