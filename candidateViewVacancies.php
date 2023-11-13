<?php
session_start();
if(!isset($_SESSION['id']))
{
  header('location:login.php');
}
else
{  
  include 'connection.php';
  $sql=mysqli_query($conn,"SELECT * FROM `vacancies`");    
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
          <form method="GET" action="">
            <input type="text" name="search" value="<?php if(isset($_GET['search'])){ echo $_GET['search']; } ?>"  placeholder="Enter search term">
            <input type="submit" value="Search" name="submit">
          </form>
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
        <div class="dis col-12">
          <?php
          if (isset($_GET['search']))
          {
            $filtervalues=$_GET['search'];
            $query=mysqli_query($conn,"SELECT * FROM `vacancies` WHERE job_name LIKE'%$filtervalues%'");
            if(mysqli_num_rows($query)>0)
            {
              foreach($query as $row)
              {
                ?>
                <form method="POST" action="">
                  <div class="card mx-2" style="width:400px;">
                    <div class="card-body">
                      <div><h5 class="card-title" style="text-align: center;"><?=$row['job_name']; ?></h5></div>
                      <div><h6 class="card-subtitle mb-2 text-muted"><b><?=$row['company_id']; ?></b></h6> </div>
                      <div><h6 class="card-subtitle mb-2 text-muted"><b><?=$row['company_name']; ?></b></h6> </div>
                      <div><p class="card-text"><b>Qualification: </b><?=$row['qulification']; ?></p></div>
                      <div><p class="card-text"><b>Location: </b><?= $row['location']; ?></p></div>
                      <div><p class="card-text" ><b>Shedule: </b><?= $row['job_type']; ?></p></div>
                      <div><p class="card-text"><b>Salary: </b><?=$row['salary_scale']; ?></p></div>
                      <div><p class="card-text" ><b>Experience: </b><?= $row['experience']; ?></p></div>
                      <div ><p class="card-text"><b>Last date of submission: </b><?=$row['last_date']; ?></p></div>
                    </div>
                    <div style="margin-bottom: 10px;">
                    
            <a href="apply.php?id=<?php echo $row['id']; ?>&cid=<?php echo $row['company_id']; ?>" class="btn btn-primary" style="margin-left:300px">apply</a>
                    </div>
                  </div>
                </form><br>
                <?php 
              }
            }
          }
          ?>    
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
  </div>/
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