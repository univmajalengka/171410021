<?php
session_start();

if (!isset($_SESSION["username"])) {
    header("Location: login.php");
    exit;
}
include("koneksi.php");
?>
    <link rel="stylesheet" type="text/css" href="css/bootstrap.css">
<h3 align="center">Data Pemesanan SMS</h3>

    <a href="input_smsused.php" class="btn btn-Warning">Input Data Pesanan</a>
    <nav class="navbar navbar-default">
    <div class="table-responsive">
    <table class="table table-bordered table-hover">
        <div class="jumbotron jumbotron-fluid">
  <div class="container">
    <tr>
        <th>No.</th>
        <th>ID Pemesan</th>
        <th>Tanggal</th>
        <th>ID User</th>
        <th>Banyak Pesan Keluar</th>
        <th>Banyak Pesan Masuk</th>
        <th colspan="2">aksi</th>
       </tr>
    </div>
</div>
<?php
    $no=1;
    $query=("SELECT * FROM sms_used");
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
        <td><a href="detail_smsused.php?id_sms_used=<?php echo "$r[id_sms_used]";?>" class="btn btn-primary">Detail</a></td>
         <td><a href="delete_sms_used.php?id_sms_used=<?= $r['id_sms_used'];?>" class="btn btn-info">Delete</a></td>

    </tr>
<?php 
$no++;
} ?>
</table>
</div>
<br><br>
<hr>
<a href="index.php" class="btn btn-Secondary">Home</a>