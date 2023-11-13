<?php
session_start();
if(!isset($_SESSION['id']))
{
  header('location:login.php');
}
else
{
  include 'connection.php';
  $id=$_GET['id'];
  $sql=mysqli_query($conn,"SELECT * FROM candidates where candidate_id='$id'");
  $data=mysqli_fetch_assoc($sql);
  if(isset($_POST['update']))
  {      
    $name=$_POST['name'];
    $dob=$_POST['dob'];
    $gender=$_POST['gender'];
    $email=$_POST['email'];
    $phone=$_POST['phone'];
    $address=$_POST['address'];    
    $position=$_POST['position'];
    $shedule=$_POST['shedule'];
    $experience=$_POST['experience'];

    $image = ""; 
    $file_name = "";
    if (isset($_FILES['photo']['name'])) 
    {
      $filename=$_FILES["photo"]["name"];
      $tempname=$_FILES["photo"]["tmp_name"];
      $folder="./image/".$filename;
      $image=$filename;
      $uploadOk=1;
      $imageFileType=strtolower(pathinfo($folder,PATHINFO_EXTENSION));
      if($imageFileType!="png" && $imageFileType!="jpg" && $imageFileType!="jpeg" && $imageFileType!="gif")
      {
        echo "SORRY, Only PNG JPG JPEG GIF files are allowed";
        $uploadOk=0;
      }
      if($uploadOk==0)
      {
        echo "SORRY, Cannot upload photo";
      }
      else
      {
        move_uploaded_file($tempname,$folder);
      }
    }
    if (isset($_FILES['pdf_file']['name']))
    {
      $file_name = $_FILES['pdf_file']['name'];
      $file_tmp = $_FILES['pdf_file']['tmp_name'];
      move_uploaded_file($file_tmp,"./uploads/".$file_name);
    }

    $qualification =implode(',',$_POST['qualification']) ;
   
    $sql=mysqli_query($conn,"UPDATE `candidates` SET `name`='$name',`dob`='$dob',`gender`='$gender',`phone`='$phone',`address`='$address',
      `qualification`='$qualification',`position_apply_for`='$position',`shedule`='$shedule',`experience`='$experience' ,`email`='$email',
      `image`='$image',`resume`='$file_name' WHERE candidate_id='$id'");

      if ($sql) {
     // Get the last inserted ID
       echo '<script>alert("Updated"); window.location.href="read_candidate_profile.php";</script>';
      } else {
        echo '<script>alert("Something Went Wrong");</script>';
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
          
          <li><a class="nav-link scrollto active" href=" candidate_home.php">Home</a></li>
         
        </ul>
        <i class="bi bi-list mobile-nav-toggle"></i>
      </nav><!-- .navbar -->

    </div>
  </header><!-- End Header -->

<section id="sss">

  <div class="container"> 
    
    <div class="row">
      <div class="col-6">
      <form method="POST" class="bg-primary-subtle p-3" enctype="multipart/form-data" >
      <!-- <label for="name">Name</label> -->
          <input type="text" name="name" class="form-control" value="<?php echo $data['name']; ?>"><br>

          <!-- <label for="dob">DOB</label> -->
          <input type="date" name="dob" class="form-control" value="<?php echo $data['dob']; ?>"><br>

          <label for="gender">Gender</label><br>
          <input type="radio" id="male" name="gender" value="Male">
          <label for="male">Male</label>
          <input type="radio" id="female" name="gender" value="Female">
          <label for="female">Female</label><br><br>
          <input type="email" name="email" class="form-control" value="<?php echo $data['email'];?>"><br> 

          <input type="number" name="phone" class="form-control" value="<?php echo $data['phone']; ?>"><br>
          <input type="varcahr" name="address" class="form-control" value="<?php echo $data['address']; ?>"><br>

          <input type="file" name="photo"  ><br><br><br>

          

           <label for="qualification"><b>Qualification</b></label><br>
            <input type="checkbox" name="qualification[]" id="sslc" value="SSLC">
            <label for="sslc">SSLC</label><br>
            <input type="checkbox" name="qualification[]" id="plus two" value="PLUS TWO">
            <label for="sslc">PLUS TWO</label><br>
            <input type="checkbox" name="qualification[]" id="diploma" value="DIPLOMA">
            <label for="sslc">DIPLOMA</label><br>
            <input type="checkbox" name="qualification[]" id="btech" value="B-TECH">
            <label for="sslc">B.TECH</label><br>
            <input type="checkbox" name="qualification[]" id="degree" value="DEGREE">
            <label for="sslc">DEGREE</label><br><br><br>

            

            <label for="">What Position are You Apply for?</label>
            <select id="position" name="position">
              <option value="Select" >Select</option>
              <option value="flutter" name="flutter">FLUTTER</option>
              <option value="Marketing" name="marketing">MARKETING</option>
              <option value="ui/ux" name="ui/ux">UI/UX</option>
              <option value="php laravel" name="php_laravel">PHP-LARAVEL</option>
              <option value="python" name="python">PYTHON</option>
            </select><br><br>
            <label for="">What is your desired Employment?</label>
            <select id="shedule" name="shedule">
              <option value="Select" >Select</option>
              <option value="full time" name="fulltime">FULL TIME</option>
              <option value="part time" name="shift">SHIFT</option>
              
            </select><br><br>
            
            <input type="text" name="experience" class="form-control" value="<?php echo $data['experience']; ?>"><br><br>
            
            <label for="">Resume</label>
            <input type="file" name="pdf_file"><br><br>
            
            <input type="submit" name="update" value="UPDATE" class="btn btn-secondary" style="margin-left: 300px;">

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