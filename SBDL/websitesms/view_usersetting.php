<?php

session_start();

if (!isset($_SESSION["username"])) {
    header("Location: login.php");
    exit;
}

include("koneksi.php");
?>
<link rel="stylesheet" type="text/css" href="css/bootstrap.css">
<h3 align="center">Data User Setting</h3>

     <a href="input_sms_setting.php" class="btn btn-Warning">Input Pengaturan</a>
     <nav class="navbar navbar-default">
    <div class="table-responsive">
    <table class="table table-bordered table-hover">
        <div class="jumbotron jumbotron-fluid">
  <div class="container">
    <tr>
        <th>No.</th>
        <th>ID User</th>
        <th>Tema</th>
        <th>Laporan Pengiriman</th>
        <th>Bahasa</th>
        <th>Jenis Pesan</th>
        <th colspan="2">aksi</th>
       </tr>
    </div>
</div>
<?php
    $no=1;
    $query=("SELECT * FROM user_setting");
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
        <td><a href="detail_usersetting.php?id_user=<?php echo "$r[id_user]";?>" class="btn btn-primary">Detail</a></td>
         <td><a href="delet_seting.php?id_user=<?= $r['id_user'];?>" class="btn btn-info">Delete</a></td>
    </tr>
<?php 
$no++;
} ?>
</table>
</div>
<br><br>
<hr>
<a href="index.php" class="btn btn-Secondary">Home</a>