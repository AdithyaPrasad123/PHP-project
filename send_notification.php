<?php
include 'connection.php';

$candidate_id = $_GET['cid'];
if(isset($_POST['submit']))
  {
      
      $date=$_POST['date'];
      $time=$_POST['time'];
      $place=$_POST['place'];
      
      $sql=mysqli_query($conn,"INSERT INTO `notification`( `candidate_id`,`date`,`time`,`place`) VALUES ('$candidate_id','$date','$time','$place')");
  
  
       if($sql)
       {
          echo '<script>alert("Notification Send");window.location.href="read_candidates.php";</script>';
       }
       else
       {
          echo '<script>alert("Something Went wrong");</script>';
       }
  }

?>