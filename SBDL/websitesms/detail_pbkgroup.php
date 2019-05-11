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
    <nav class="navbar navbar-default">
    <div class="table-responsive">
    <table class="table table-bordered table-hover">

    <tr>
    <div class="jumbotron jumbotron-fluid">
  <div class="container">
    <a href="view_pbkgroup.php" class="btn btn-Dark">Back</a>
    <a href="index.php" class="btn btn-Secondary">Home</a>
        <th>No.</th>
        <th>Nama</th>
        <th>ID</th>
        <th>ID User</th>
        <th>Is Public</th> 
    </div>
</div>          
    </tr>
<?php
    $no=1;
    $query=("SELECT * FROM pbk_group WHERE id='$_GET[id]'");
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
            
    </tr>
<?php 
$no++;
} ?>
</table>

</div>
