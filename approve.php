<?php
include 'connection.php';
$id1=$_GET['id'];
$sql=mysqli_query($conn,"UPDATE `companies` SET `status`='APPROVED' WHERE company_id='$id1'");
echo "<script>window.location.href='admin_read_company.php';</script>";
?>

