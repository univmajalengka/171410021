<?php

session_start();

if (!isset($_SESSION["username"])) {
    header("Location: login.php");
    exit;
}
include("koneksi.php");
?>
<link rel="stylesheet" type="text/css" href="css/bootstrap.css">

<h3 align="center">Data Pesan setting</h3>
<nav class="navbar navbar-default">
<div class="table-responsive">
    <table class="table table-bordered table-hover">
    <tr>
         <div class="jumbotron jumbotron-fluid">
  <div class="container">
    <a href="view_usersetting.php" class="btn btn-Dark">Back</a>
    <a href="index.php" class="btn btn-Secondary">Home</a>
        <th>No.</th>
        <th>ID User</th>
        <th>Tema</th>  
        <th>Laporan Pengiriman</th>
        <th>Bahasa</th>
        <th>Conversation Sort</th>         
    </tr>
<?php
    $no=1;
    $query=("SELECT * FROM user_setting WHERE id_user='$_GET[id_user]'");
    $lihat = mysqli_query($con, $query) or die('Error, query failed. ' . mysqli_error());
    $jml_data=mysqli_num_rows($lihat);
    while($r=mysqli_fetch_array($lihat)){
?>
    <tr>
        <td><?php echo"$no.";?></td>
        <td><?php echo"$r[id_user]";?></td>
        <td><?php echo"$r[tema]";?></td>
        <td><?php echo"$r[laporan_pengiriman]";?></td>
        <td><?php echo"$r[language]";?></td>
        <td><?php echo"$r[conversation_sort]";?></td>
    </tr>
<?php 
$no++;
} ?>
</table>

</div>
