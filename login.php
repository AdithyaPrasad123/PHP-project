<?php
include 'connection.php';
session_start();
if(isset($_POST['submit']))
{
    $username=$_POST['username'];
    $password=$_POST['password'];
    $sql=mysqli_query($conn,"SELECT * FROM `login` WHERE username='$username'");
    if($sql)
    {
        $row=mysqli_fetch_assoc($sql);
        $hash=password_verify($password,$row['password']);
        $count=mysqli_num_rows($sql);
        $login_type=$row['login_type'];
        if($count==1 && $hash && $login_type=="Admin")
        {
          $_SESSION['id']=$row['login_id'];
          ?>
          <script>window.location.href="admin_home.php";</script>;
          <?php
        }   
        elseif($count==1 && $hash && $login_type == "Company"){
          $_SESSION['id']=$row['login_id'];
          $id=$_SESSION['id'];
          $sqlcom=mysqli_query($conn,"SELECT * FROM `companies` WHERE company_id='$id'");
          $sqlcom1=mysqli_fetch_assoc($sqlcom);
          if($sqlcom1['status']=="APPROVED"){
              ?>
          <script>window.location.href="company_home.php";</script>;
          <?php }
          }
        elseif($count==1 && $hash && $login_type == "Candidate"){
          $_SESSION['id']=$row['login_id'];

          ?>

           <script>window.location.href="candidate_home.php";</script>;
          <?php
            }
            
        else {
        echo "Invalid username or user type.";
         }
            
        }       
        
}
?>


<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>project_cad-reg</title>
  <meta content="" name="description">
  <meta content="" name="keywords">

  <!-- Favicons -->
  <link href="assets/img/favicon.png" rel="icon">
  <link href="assets/img/apple-touch-icon.png" rel="apple-touch-icon">

  <!-- Google Fonts -->
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Roboto:300,300i,400,400i,500,500i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">

  <!-- Vendor CSS Files -->
  <link href="assets/vendor/aos/aos.css" rel="stylesheet">
  <link href="assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
  <link href="assets/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
  <link href="assets/vendor/glightbox/css/glightbox.min.css" rel="stylesheet">
  <link href="assets/vendor/swiper/swiper-bundle.min.css" rel="stylesheet">

  <!-- Template Main CSS File -->
  <link href="assets/css/style.css" rel="stylesheet">

  <!-- =======================================================
  * Template Name: BizLand
  * Updated: Jul 27 2023 with Bootstrap v5.3.1
  * Template URL: https://bootstrapmade.com/bizland-bootstrap-business-template/
  * Author: BootstrapMade.com
  * License: https://bootstrapmade.com/license/
  ======================================================== -->

  <style>
    #sss
    {
      background-image: url(./assets/img/hero-bg.jpg);
      background-size: cover;
  background-position: center;
  background-repeat: no-repeat;
  background-attachment: fixed;
    }
  </style>
  
</head>

<body>
  <!-- ======= Header ======= -->
  <header id="header" class="d-flex align-items-center">
    <div class="container d-flex align-items-center justify-content-between">

      <h1 class="logo"><a href="index.php"><span>IT_JPS</span></a></h1>
      <!-- Uncomment below if you prefer to use an image logo -->
      <a href="index.php" class="logo"><img src="assets/img/logo.png" alt="" style="height: 1700px;"></a>

      <nav id="navbar" class="navbar">
        <ul>
          <li><a class="nav-link scrollto active" href="index.php">Index</a></li>
          <li><a class="nav-link scrollto" href="login.php">Login</a></li>
          
        </ul>
        <i class="bi bi-list mobile-nav-toggle"></i>
      </nav><!-- .navbar -->

    </div>
  </header><!-- End Header -->

<section id="sss">

  <div class="container"> 
    <h1 style="color: #222222; font-family: sans-serif;" ><b>Welcome to </b><spa style="color: #106eea;">IT_JPS</span></h1><br>
    <div class="row">
      <div class="col-4">
      <form  method="POST" class="bg-primary-subtle p-3" style="width: 500px;">
        <h3 style="text-align: center;">LOGIN</h3>
        <input type="email" name="username" id="email" class="form-control" placeholder="Enter Your Username" onkeyup="clearmsg('span1')"></textarea>
          <span style="color: red;" id="span1"></span><br>

        <input type="password" name="password" id="password" class="form-control" placeholder="Enter Your password" onkeyup="clearmsg('span2')"></textarea>
          <span style="color: red;" id="span2"></span><br>


        <input type="submit" name="submit" class="btn btn-secondary" value="SUBMIT" style="margin-left: 200px; font-weight: bold;" onclick="return valid(); return false;">
      </form>
       
      </div>
    </div>
  </div>
</section>

 

  
  <footer id="footer">
 <div class="footer-top">
      <div class="container">
        <div class="row">

          <div class="col-lg-3 col-md-6 footer-contact">
            <h3><span>IT_JPS</span></h3>
            <p>
              <strong>Phone:</strong> +1 5589 55488 55<br>
              <strong>Email:</strong> info@example.com<br>
            </p>
          </div>

          <!-- <div class="col-lg-3 col-md-6 footer-links">
            <h4>Useful Links</h4>
            <ul>
              <li><i class="bx bx-chevron-right"></i> <a href="#">Home</a></li>
              <li><i class="bx bx-chevron-right"></i> <a href="#">About us</a></li>
             
            </ul>
          </div> -->

          

          <div class="col-lg-3 col-md-6 footer-links" style="margin-left: 600px;">
            <h4>Our Social Networks</h4>
            
            <div class="social-links mt-3">
              <a href="#" class="twitter"><i class="bx bxl-twitter"></i></a>
              <a href="#" class="facebook"><i class="bx bxl-facebook"></i></a>
              <a href="#" class="instagram"><i class="bx bxl-instagram"></i></a>
              <a href="#" class="google-plus"><i class="bx bxl-skype"></i></a>
              <a href="#" class="linkedin"><i class="bx bxl-linkedin"></i></a>
            </div>
          </div>

        </div>
      </div>
    </div>

    
  </footer> 

  <!-- <div id="preloader"></div>
  <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a> -->

  <!-- Vendor JS Files -->
  <script src="assets/vendor/purecounter/purecounter_vanilla.js"></script>
  <script src="assets/vendor/aos/aos.js"></script>
  <script src="assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="assets/vendor/glightbox/js/glightbox.min.js"></script>
  <script src="assets/vendor/isotope-layout/isotope.pkgd.min.js"></script>
  <script src="assets/vendor/swiper/swiper-bundle.min.js"></script>
  <script src="assets/vendor/waypoints/noframework.waypoints.js"></script>
  <script src="assets/vendor/php-email-form/validate.js"></script>

  <!-- Template Main JS File -->
  <script src="assets/js/main.js"></script>
  <script>
    function valid()
    {
       
        var email=document.getElementById("email").value;
        var password=document.getElementById("password").value;
        
        
       
        if(email=="")
        {
            document.getElementById("span1").innerHTML="please enter email id as username";
            return false;
        }
        if(password=="")
        {
            document.getElementById("span2").innerHTML="please enter password";
            return false;
        }
        
        
        
        
        return true;
    }
    function clearmsg(sp)
    {
        document.getElementById(sp).innerHTML="";
    }
</script>

</body>

</html>