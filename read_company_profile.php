<?php
session_start();
if(!isset($_SESSION['id']))
{
  header('location:login.php');
}
else{
  // var_dump($_SESSION['id']);
  ?>
<?php
include 'connection.php';
$id=$_SESSION["id"];
$sql=mysqli_query($conn,"SELECT * FROM `companies` WHERE `company_id`='$id'");
$row=mysqli_fetch_assoc($sql);


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
          <!-- <li><a class="nav-link scrollto active" href="index.php">Index</a></li> -->
          <li><a class="nav-link scrollto active" href=" company_home.php">Home</a></li>
          <!-- <li><a class="nav-link scrollto" href="#about">About</a></li> -->
          <!-- <li><a class="nav-link scrollto" href="#services">Services</a></li> -->
          <!-- <li><a class="nav-link scrollto " href="#portfolio">Portfolio</a></li> -->
          <!-- <li><a class="nav-link scrollto" href="login.php">Login</a></li> -->
          <!-- <li class="dropdown"><a href="#"><span>Register</span> <i class="bi bi-chevron-down"></i></a>
            <ul>
              <li><a href="company_register.php">Company Register</a></li>
              <li><a href="candidate-register.php">Candidate Register</a></li>
            </ul>
          </li> -->
          <!-- <li><a class="nav-link scrollto" href="logout.php">Logout</a></li> -->
        </ul>
        <i class="bi bi-list mobile-nav-toggle"></i>
      </nav><!-- .navbar -->

    </div>
  </header><!-- End Header -->

<section id="sss">

  <div class="container"> 
    <h1 style="color: #222222; font-family: sans-serif;" ><b>Welcome to </b><spa style="color: #106eea;">IT_JPS</span></h1><br>
      <h2><u>How this Helpful!</u></h2><br>
      <div class="row">     
      <div class="col-4 mt-5">
        <form method="POST">
        <table class="table table-boadered table">
         <tr>
            <th>Company Name</th>
            <td><?php echo $row['company_name'];?></td>
        </tr>
        <tr>
            <th>Location</th>
            <td><?php echo $row['location'];?></td>
        </tr>
        <tr>
            <th>Email</th>
            <td><?php echo $row['email'];?></td>
        </tr>
        <tr>
            <th>Phone</th>
            <td><?php echo $row['phone'];?></td>
        </tr>
        <tr>
            <td colspan="2" style="text-align: center; "><a href="edit_company.php ?id=<?php echo $row['company_id'];?>" class="btn btn-primary">Edit</a></td>
        </tr>
      </table>
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

</body>

</html>
<?php
}
?>