<?php
session_start();

if (!isset($_SESSION["username"])) {
    header("Location: login.php");
    exit;
}
include("koneksi.php");
?>
<link rel="stylesheet" type="text/css" href="css/bootstrap.css">
    
<h3 align="center">Data keseluruhan</h3>
    <nav class="navbar navbar-default">
    <div class="table-responsive">
    <table class="table table-bordered table-hover">


<div class="jumbotron jumbotron-fluid">
  <div class="container">
         <tr>
        <th>No.</th>
        <th>ID USER</th>
        <th>Nama</th>
        <th>Tema</th>
        <th>ID</th>
        <th>ID Inbox</th>
        <th>ID Outbox</th>
        <th>Tanggal</th>
        <th>ID Group</th>
        <th colspan="2">aksi</th>
       </tr>
  </div>
</div>
    
<?php
    $no=1;
    $query=("SELECT * FROM listdata");
    $lihat = mysqli_query($con, $query) or die('Error, query failed. ' . mysqli_error());
    $jml_data=mysqli_num_rows($lihat);
    while($r=mysqli_fetch_array($lihat)){
?>
    <tr>
        <td><?php echo"$no.";?></td>
        <td><?php echo"$r[id_user]";?></td>
        <td><?php echo"$r[nama]";?></td>
        <td><?php echo"$r[tema]";?></td>
        <td><?php echo"$r[id]";?></td>
        <td><?php echo"$r[id_inbox]";?></td>
        <td><?php echo"$r[id_outbox]";?></td>
        <td><?php echo"$r[sms_date]";?></td>
        <td><?php echo"$r[group_id]";?></td>
         <!-- <td width="100"><a href="detail_pbk.php?group_id=<?php echo "$r[group_id]";?>" class="btn btn-primary">Detail</a></td>
        <td width="100"><a href="delete_pbk.php?id=<?= $r['id'];?>" class="btn btn-info">Hapus</a></td> -->
        


    </tr>
<?php 
$no++;
} ?>
</table>
</div>
<br><br>
<hr>
<a href="index.php" class="btn btn-Secondary">Home</a>