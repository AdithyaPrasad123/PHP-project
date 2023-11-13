<?php
include 'connection.php';
$id=$_GET['id'];
$sql=mysqli_query($conn,"UPDATE `applications` SET `status`='REJECTED' WHERE application_id='$id'");


echo "<script>window.location.href='application.php';</script>";
?>