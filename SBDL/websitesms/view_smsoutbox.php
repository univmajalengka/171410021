<?php
session_start();

if (!isset($_SESSION["username"])) {
    header("Location: login.php");
    exit;
}
include("koneksi.php");
?>
<link rel="stylesheet" type="text/css" href="css/bootstrap.css">
<h3 align="center">Data SMS Outbox</h3>

    <a href="input_smsoutbox.php" class="btn btn-Warning">Input SMS Keluar</a>
<nav class="navbar navbar-default">
    <div class="table-responsive">
    <table class="table table-bordered table-hover">
        <div class="jumbotron jumbotron-fluid">
          <div class="container">
    <tr>
        <th>No.</th>
        <th>ID Outbox</th>
        <th>ID User</th>
        <th colspan="2">aksi</th>
       </tr>
    </div>
</div>
<?php
    $no=1;
    $query=("SELECT * FROM user_outbox");
    $lihat = mysqli_query($con, $query) or die('Error, query failed. ' . mysqli_error());
    $jml_data=mysqli_num_rows($lihat);
    while($r=mysqli_fetch_array($lihat)){
?>
    <tr>
        <td><?php echo"$no.";?></td>
        <td><?php echo"$r[id_outbox]";?></td>
        <td><?php echo"$r[id_user]";?></td>
        <td><a href="detail_smsoutbox.php?id_outbox=<?php echo "$r[id_outbox]";?>" class="btn btn-primary">Detail</a></td>
         <td><a href="delete_smsoutbox.php?id_outbox=<?= $r['id_outbox'];?>" class="btn btn-info">Delete</a></td>

    </tr>
<?php 
$no++;
} ?>
</table>
</div>
<br><br>
<hr>
<a href="index.php" class="btn btn-Secondary">Home</a>