<?php
session_start();
if (!isset($_SESSION['id'])) {
    header('location: login.php');
  
}
else{
include 'connection.php';

$vid = $_GET['id'];
$company_id = $_GET['cid'];
$cid = $_SESSION['id'];

// Fetch candidate data
$sql2 = mysqli_query($conn, "SELECT * FROM `candidates` WHERE candidate_id= $cid");

if ($sql2) {
    $row = mysqli_fetch_assoc($sql2);
} else {
    echo '<script>alert("Error fetching candidate data");</script>';
    
}

// Fetch vacancy data
$sql = mysqli_query($conn, "SELECT * FROM `vacancies` WHERE id = $vid");

if ($sql) {
    $row1 = mysqli_fetch_assoc($sql);
  
    
} else {
    echo '<script>alert("Error fetching vacancy data");</script>';
    
}

if (isset($_POST['apply'])) {
    $apply_date = date("Y-m-d");
    $sql1 = "INSERT INTO applications (`candidate_id`,`id`,`company_id`,`apply_date`,`status`)
              VALUES ('$cid','$vid','$company_id','$apply_date','PENDING')";

    if (mysqli_query($conn, $sql1)) {
        echo '<script>alert("Application submitted successfully!");window.location.href="candidateViewVacancies.php"</script>';
    } else {
        echo '<script>alert("Error");</script>';
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

  <link rel="stylesheet" href="bootstrap.css" crossorigin="anonymous">
      <!-- Optional theme -->
      <link rel="stylesheet" href="bootstrap-theme.css" crossorigin="anonymous">

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
    .dis
    {
      display:flex;
      flex-direction: row;
    } 
    .container
    {
      width:90%;
      height:50%;
      padding:20px;
    }
  </style>
  
 </head>

 <body>
  <!-- ======= Header ======= -->
  <header id="header" class="d-flex align-items-center">
    <div class="container d-flex align-items-center justify-content-between">
      <h1 class="logo"><a href="index.php"><span>IT_JPS</span></a></h1>
      <a href="index.php" class="logo"><img src="assets/img/logo.png" alt="" style="height: 1700px;"></a>
      <nav id="navbar" class="navbar">
        <ul>
          <li><a class="nav-link scrollto active" href=" candidate_home.php">Home</a></li>&nbsp;&nbsp;&nbsp;&nbsp;
          
          </li> 
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
        <form method="POST" action="">
        
       
        <input type="hidden" name="company_id" value="<?php echo $company_id ?>" class="form-control"> <br> 
       
        <input type="hidden" name="candidate_id" value="<?php echo $row["candidate_id"]; ?>" class="form-control" required ><br>
        <label for="">Candidate Name</label>
        <input type="text" name="name" value="<?php echo $row["name"]; ?>" class="form-control" required><br> 
        <label for="">Applied For</label>
        <input type="text" name="job_name" value="<?php echo $row1["job_name"]; ?>" class="form-control" required><br>
        <input type="submit" name="apply" class="btn btn-primary" value="Apply" >
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
        <div class="col-lg-3 col-md-6 footer-links">
          <h4>Useful Links</h4>
            <ul>
              <li><i class="bx bx-chevron-right"></i> <a href="#">Home</a></li>
              <li><i class="bx bx-chevron-right"></i> <a href="#">About us</a></li>
            </ul>
        </div>
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
  <script src="jquery-3.2.1.min.js"></script>
  <script src="bootstrap.min.js"></script>
 </body>

 </html>
 <?php
}
?>