<?php
include 'connection.php';
session_start();
UNSET($_SESSION['id']);
header("location:login.php");
?>