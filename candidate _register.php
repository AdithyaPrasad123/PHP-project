<?php
  include 'connection.php';
  
  if(isset($_POST['submit']))
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
      
    $hash=password_hash($_POST['password'],PASSWORD_DEFAULT);

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
    //file upload
    if (isset($_FILES['pdf_file']['name']))
    {
      $file_name = $_FILES['pdf_file']['name'];
      $file_tmp = $_FILES['pdf_file']['tmp_name'];
      move_uploaded_file($file_tmp,"./uploads/".$file_name);
    }

    $qualification =implode(',',$_POST['qualification']) ;
   
    $sql=mysqli_query($conn,"INSERT INTO `candidates`( `name`, `dob`,`gender`, `phone`, `email`,  `address`, `qualification`, `position_apply_for`, `shedule`, `experience`, `image`, `resume`,`status`)
       VALUES ('$name','$dob','$gender','$phone','$email','$address','".$qualification."','$position','$shedule','$experience','$image','$file_name','PENDING')");
    $lastInsertId = mysqli_insert_id($conn); 
    $result1 = mysqli_query($conn,"INSERT INTO `login`(`login_id`,`username`, `password`, `login_type`) VALUES ('$lastInsertId','$email','$hash','Candidate')" );
    if ($result1)
    {
      echo '<script>alert("Registered Successfully"); window.location.href="login.php";</script>';
    }
    else
    {
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
          <li><a class="nav-link scrollto active" href="index.php">Index</a></li>
          <li><a class="nav-link scrollto" href="login.php">Login</a></li>
          <li class="dropdown"><a href="#"><span>Register</span> <i class="bi bi-chevron-down"></i></a>
            <ul>
              <li><a href="company_register.php">Company Register</a></li>
              <li><a href="candidate-register.php">Candidate Register</a></li>
            </ul>
          </li>
          <li><a class="nav-link scrollto" href="logout.php">Logout</a></li>
        </ul>
        <i class="bi bi-list mobile-nav-toggle"></i>
      </nav><!-- .navbar -->
    </div>
  </header><!-- End Header -->

  <section id="sss">
    <div class="container"> 
      <h1 style="color: #222222; font-family: sans-serif;" ><b>Welcome to </b><spa style="color: #106eea;">IT_JPS</span></h1><br>
        <h2><u>Candidate Registration</u></h2><br>
        <div class="row">
          <div class="col-6">
            <form method="POST" enctype="multipart/form-data" class="bg-primary-subtle p-3" >
              <h4><u>Personal Information</u></h4>
              <label for="name">Name</label>
              <input type="text" name="name" id="name" class="form-control"  onkeyup="clearmsg('span1')">
              <span style="color: red;" id="span1"></span><br>

              <label for="dob">DOB</label>
              <input type="date" name="dob" class="form-control" id="dob" required onkeyup="clearmsg('span2')">
              <span style="color: red;" id="span2"></span><br>

              <label for="gender">Gender</label><br>
              <input type="radio" id="male" name="gender" value="Male">
              <label for="male">Male</label>
              <input type="radio" id="female" name="gender" value="Female">
              <label for="female">Female</label><br><br>

              <label for="email">Email</label>
              <input type="email" name="email" id="email" class="form-control" required onkeyup="clearmsg('span3')">
              <span style="color: red;" id="span3"></span><br>

              <label for="password">Password</label>
              <input type="password" name="password" id="password" class="form-control" required onkeyup="clearmsg('span4')">
              <span style="color: red;" id="span4"></span><br>


              <label for="phone">Phone</label>
              <input type="number" name="phone" id="phone" class="form-control" required onkeyup="clearmsg('span5')">
              <span style="color: red;" id="span5"></span><br>

              <label for="address">Address</label>
              <textarea name="address" id="address" cols="30" rows="4" class="form-control" onkeyup="clearmsg('span6')"></textarea><br>
              <span style="color: red;" id="span6"></span><br>

              <input type="file" name="photo"><br><br><br>

              <h4><u>Educational Information</u></h4>
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

              <h4><u>Job Information</u></h4>
              <label for="">What Position are You Apply for?</label>
              <select id="position" name="position" itemid="position" onkeyup="clearmsg('span7')">
              <span style="color: red;" id="span7"></span><br>
                <option value="Select" >Select</option>
                <option value="flutter" name="flutter">FLUTTER</option>
                <option value="Marketing" name="marketing">MARKETING</option>
                <option value="ui/ux" name="ui/ux">UI/UX</option>
                <option value="php laravel" name="php_laravel">PHP-LARAVEL</option>
                <option value="python" name="python">PYTHON</option>
              </select><br><br>

              <label for="">What is your desired Employment?</label>
              <select id="shedule" name="shedule" itemid="shedule" onkeyup="clearmsg('span8')">
              <span style="color: red;" id="span8"></span><br>>
                <option value="Select" >Select</option>
                <option value="full time" name="fulltime">FULL TIME</option>
                <option value="part time" name="shift">SHIFT</option>
              </select><br><br>

              <label for="">Experience</label>
              <input type="text" name="experience" id="experience" class="form-control" placeholder="Enter number of years or '0' when you are fresher" onkeyup="clearmsg('span9')">
              <span style="color: red;" id="span9"></span>
              <br><br>
                
              <label for="">Resume</label>
              <input type="file" name="pdf_file"><br><br>
                
              <input type="submit" name="submit" value="SUBMIT" class="btn btn-secondary" style="margin-left: 300px;" onclick="return valid(); return false;">

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
          <div class="col-lg-3 col-md-6 footer-links">
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
  <script>
        function valid()
        {
            var name=document.getElementById("name").value;
            var dob=document.getElementById("dob").value;
            var email=document.getElementById("email").value;
            var password=document.getElementById("password").value;
            var phone=document.getElementById("phone").value;
            var address=document.getElementById("address").value;
            var position=document.getElementById("position").value;
            var shedule=document.getElementById("shedule").value;
            var experience=document.getElementById("experience").value;
    
            if(name=="")
            {
                document.getElementById("span1").innerHTML="please enter your name";
                return false;
            }
            if(dob=="")
            {
                document.getElementById("span2").innerHTML="please enter your date month and year of birth";
                return false;
            }
            if(email=="")
            {
                document.getElementById("span3").innerHTML="please enter email id";
                return false;
            }
            if(password=="")
            {
                document.getElementById("span4").innerHTML="please enter password";
                return false;
            }
            if(phone=="")
            {
                document.getElementById("span5").innerHTML="please enter mobile number";
                return false;
            }
           if(address=="")
            {
                document.getElementById("span6").innerHTML="please enter user permenent Address";
                return false;
            }
            if(position=="")
            {
                document.getElementById("span7").innerHTML="please enter the post for you want to apply";
                return false;
            }
            if(shedule=="")
            {
                document.getElementById("span8").innerHTML="please enter which shedule do you prefer";
                return false;
            }
           if(experience=="")
            {
                document.getElementById("span9").innerHTML="please enter the year of experience";
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
