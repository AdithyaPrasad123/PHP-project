<?php
include 'connection.php';
$id=$_GET['id'];
$sql=mysqli_query($conn,"UPDATE `companies` SET `status`='REJECTED' WHERE company_id='$id'");

echo "<script>window.location.href='admin_read_company.php';</script>";
?>