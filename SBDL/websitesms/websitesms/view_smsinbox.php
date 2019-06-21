<?php
session_start();

if (!isset($_SESSION["username"])) {
    header("Location: login.php");
    exit;
}
include("koneksi.php");
?>
 <link rel="stylesheet" type="text/css" href="css/bootstrap.css">
<h3 align="center">Data SMS Inbox</h3>
    <a href="input_smsinbox.php" class="btn btn-Warning">Input SMS Masuk</a>

 <nav class="navbar navbar-default">
    <div class="table-responsive">
    <table class="table table-bordered table-hover">
        <div class="jumbotron jumbotron-fluid">
  <div class="container">
    <tr>
        <th>No.</th>
        <th>ID Inbox</th>
        <th>ID User</th>
        <th>trash</th>
        <th colspan="2">aksi</th>
       </tr>
    </div>
</div>
<?php
    $no=1;
    $query=("SELECT * FROM user_inbox");
    $lihat = mysqli_query($con, $query) or die('Error, query failed. ' . mysqli_error());
    $jml_data=mysqli_num_rows($lihat);
    while($r=mysqli_fetch_array($lihat)){
?>
    <tr>
        <td><?php echo"$no.";?></td>
        <td><?php echo"$r[id_inbox]";?></td>
        <td><?php echo"$r[id_user]";?></td>
        <td><?php echo"$r[trash]";?></td>
        <td><a href="detail_smsinbox.php?id_inbox=<?php echo "$r[id_inbox]";?>" class="btn btn-primary">Detail</a></td>
         <td><a href="delete_smsinbox.php?id_inbox=<?= $r['id_inbox'];?>" class="btn btn-info">Delete</a></td>

    </tr>
<?php 
$no++;
} ?>
</table>
</div>
<br><br>
<hr>
<a href="index.php" class="btn btn-Secondary">Home</a>