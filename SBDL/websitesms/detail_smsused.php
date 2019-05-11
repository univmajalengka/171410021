<?php
session_start();

if (!isset($_SESSION["username"])) {
    header("Location: login.php");
    exit;
}
include("koneksi.php");
?>
<link rel="stylesheet" type="text/css" href="css/bootstrap.css">

<h3 align="center">Data Pemesanan SMS PBK</h3>
<nav class="navbar navbar-default">
<div class="table-responsive">
    <table class="table table-bordered table-hover">
    <tr>
        <div class="jumbotron jumbotron-fluid">
  <div class="container">
    <a href="view_sms_used.php" class="btn btn-Dark">Back</a>
    <a href="index.php" class="btn btn-Secondary">Home</a>
        <th>No.</th>
        <th>ID Pemesan</th>
        <th>Tanggal</th>
        <th>ID User</th>
        <th>Pesan Keluar</th>
        <th>Pesan Masuk</th>       
        </div>
    </div>    
    </tr>
<?php
    $no=1;
    $query=("SELECT * FROM sms_used WHERE id_sms_used='$_GET[id_sms_used]'");
    $lihat = mysqli_query($con, $query) or die('Error, query failed. ' . mysqli_error());
    $jml_data=mysqli_num_rows($lihat);
    while($r=mysqli_fetch_array($lihat)){
?>
    <tr>
        <td><?php echo"$no.";?></td>
        <td><?php echo"$r[id_sms_used]";?></td>
        <td><?php echo"$r[sms_date]";?></td>
        <td><?php echo"$r[id_user]";?></td>
        <td><?php echo"$r[out_sms_count]";?></td>
        <td><?php echo"$r[in_sms_count]";?></td>
            
    </tr>
<?php 
$no++;
} ?>
</table>

</div>
