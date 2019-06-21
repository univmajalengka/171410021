<?php
session_start();

if (!isset($_SESSION["username"])) {
    header("Location: login.php");
    exit;
}
include("koneksi.php");
?>
<link rel="stylesheet" type="text/css" href="css/bootstrap.css">
<h3 align="center">Data Group PBK</h3>

     <a href="input_pbkgrup.php" class="btn btn-Warning">Input Data Group</a>
    <nav class="navbar navbar-default">
    <div class="table-responsive">
    <table class="table table-bordered table-hover">

        <div class="jumbotron jumbotron-fluid">
  <div class="container">
    <tr>
        <th>No.</th>
        <th>Nama</th>
        <th>ID</th>
        <th>ID User</th>
        <th>Is Public</th>
        <th colspan="2">aksi</th>
       </tr>
    </div>
</div>
<?php
    $no=1;
    $query=("SELECT * FROM pbk_group");
    $lihat = mysqli_query($con, $query) or die('Error, query failed. ' . mysqli_error());
    $jml_data=mysqli_num_rows($lihat);
    while($r=mysqli_fetch_array($lihat)){
?>
    <tr>
        <td><?php echo"$no.";?></td>
        <td><?php echo"$r[nama]";?></td>
        <td><?php echo"$r[id]";?></td>
        <td><?php echo"$r[id_user]";?></td>
        <td><?php echo"$r[is_public]";?></td> 
        <td><a href="detail_pbkgroup.php?id=<?php echo "$r[id]";?>" class="btn btn-primary">Detail</a></td>
         <td><a href="delete_pbkgroup.php?id=<?= $r['id'];?>" class="btn btn-info">Delete</a></td>
       

    </tr>
<?php 
$no++;
} ?>
</table>
</div>
<br><br>
<hr>
<a href="index.php" class="btn btn-Secondary">Home</a>