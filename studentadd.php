<!DOCTYPE html>
<html>

<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Admin Dashboard</title>
  <link rel="icon" type="image/x-icon" href="img/favicon.ico">
  <meta name="description" content="">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="robots" content="all,follow">
  <!-- Google fonts - Roboto -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700">
  <!-- Choices CSS-->
  <link rel="stylesheet" href="vendor/choices.js/public/assets/styles/choices.min.css">
  <!-- Custom Scrollbar-->
  <link rel="stylesheet" href="vendor/overlayscrollbars/css/OverlayScrollbars.min.css">
  <!-- theme stylesheet-->
  <link rel="stylesheet" href="css/style.default.css" id="theme-stylesheet">
  <!-- Custom stylesheet - for your changes-->
  <link rel="stylesheet" href="css/custom.css">
  <!-- Favicon-->

</head>

<body>
  <?php
require_once('connect.php');
session_start();
if(!ISSET($_SESSION['user_id'])){
  header('location:signin.php');
}
?>
  <!-- Side Navbar -->
  <nav class="side-navbar">
    <!-- Sidebar Header    -->
    <div class="sidebar-header d-flex align-items-center justify-content-center p-3 mb-3">
      <!-- User Info-->
      <div class="sidenav-header-inner text-center">
        <?php
          $q1="select * from admin where user_id='$_SESSION[user_id]'";
          $q2="select * from student1 where user_id='$_SESSION[user_id]'";
          $r2=@mysqli_query($dbc,$q2); #STUDENT
          $r1=@mysqli_query($dbc,$q1); #ADMIN
          $num1=@mysqli_num_rows($r1); #ADMIN
          if($num1>0)
          {
            #IF ADMIN USER ID IS LOGGING IN ... USER ID WILL BE FETCHED FROM THE ADMIN DATABASE
            $fetch=@mysqli_fetch_array($r1); 
            $name=$fetch['first']." " .$fetch['last'];
          }
          else
          {
            #IF STUDENT IS LOGGING IN 
            $fetch=@mysqli_fetch_array($r2); 
            $name=$fetch['first']." " .$fetch['last'];
          }       
         echo '          
       <h2 class="h5 text-white text-uppercase mb-0">'.$name.'</h2>';?>
      </div>
      <!-- Small Brand information, appears on minimized sidebar--><a class="brand-small text-center" href="index.html">
        <p class="h1 m-0">KASH</p>
      </a>
    </div>


    <!-- Sidebar Navigation Menus-->
    <!-- First Menu -->
    <span class="text-uppercase text-black text-sm fw-bold letter-spacing-0 mx-lg-2 heading">Main</span>
    <ul class="list-unstyled">
      <li class="sidebar-item"><a class="sidebar-link" href="dashboard.php">
          <i class="fas fa-chart-line fa-lg me-xl-2"></i>Dashboard </a></li>
      <li class="sidebar-item"><a class="sidebar-link" href="eventpage.php">
          <i class="fas fa-calendar-alt fa-lg me-xl-2"></i>Events </a></li>
      <li class="sidebar-item"><a class="sidebar-link" href="blooddonor.php">
          <i class="fas fa-people-carry fa-lg me-xl-2"></i>Donors Search </a></li>
      <li class="sidebar-item"><a class="sidebar-link" href="camp.php">
          <i class="fas fa-campground fa-lg me-xl-2"></i>Blood Camp </a></li>
      <li class="sidebar-item"><a class="sidebar-link" href="#exampledropdownDropdown" data-bs-toggle="collapse">
          <i class="fas fa-user-graduate fa-lg me-xl-2"></i>Student </a>
        <ul class="collapse list-unstyled " id="exampledropdownDropdown">
          <li><a class="sidebar-link" href="studentdetails.php">Details </a></li>
          <li><a class="sidebar-link" href="student.php">Programs </a></li>
        </ul>
      </li>
      <li class="sidebar-item"><a class="sidebar-link" href="queries.php">
          <i class="fas fa-envelope fa-lg me-xl-2"></i>Messages
        </a></li>
      <li class="sidebar-item"><a class="sidebar-link" href="logout.php">
          <i class="fas fa-sign-out-alt fa-lg me-xl-2"></i>Logout</a></li>
    </ul>
  </nav>

  <div class="page">
    <!-- navbar-->
    <header class="header">
      <nav class="navbar">
        <div class="container-fluid">
          <div class="d-flex align-items-center justify-content-between w-100">
            <div class="d-flex align-items-center"><a
                class="menu-btn d-flex align-items-center justify-content-center p-2 bg-gray-900" id="toggle-btn"
                href="#">
                <svg class="svg-icon svg-icon-sm svg-icon-heavy text-white">
                  <use xlink:href="#menu-1"> </use>
                </svg></a><a class="navbar-brand ms-2" href="index.html">
                <div class="brand-text d-none d-md-inline-block text-uppercase letter-spacing-0"><span
                    class="text-primary text-black">KASH </span><strong class="text-white fw-normal text-xs"
                    style="padding-left: 6px;">Educational Trust </strong></div>
              </a></div>
          </div>
        </div>
      </nav>
    </header>

    <!-- Breadcrumb-->
    <div class="bg-gray-200 text-sm">
      <div class="container-fluid">
        <nav aria-label="breadcrumb">
          <ol class="breadcrumb mb-0 py-3">
            <li class="breadcrumb-item"><a class="fw-light" href="index.html">Home</a></li>
            <li class="breadcrumb-item active fw-light" aria-current="page"><a class="fw-light"
                href="studentdetails.php">Student</a> </li>
            <li class="breadcrumb-item active fw-light" aria-current="page">Add </li>
          </ol>
        </nav>
      </div>
    </div>


    <!-- Page Header-->
    <header class="py-4">
      <div class="container-fluid py-2">
        <h1 class="h3 fw-normal mb-0">Registration</h1>
      </div>
    </header>

    <!-- Program Form -->
    <section class="pb-5">
      <div class="container-fluid">
        <div class="row">
          <!-- Form Elements -->
          <div class="col-lg-12">
            <div class="card">
              <div class="card-header border-bottom">
                <h3 class="h4 mb-0">Student Registration </h3>
              </div>
              <div class="card-body">
                <form class="form-horizontal" autocomplete="off" action="studentadd.php" method="post">
                  <div class="row">
                    <label class="col-sm-3 form-label">First Name </label>
                    <div class="col-sm-9">
                      <input class="form-control" name="fname" id="fname" type="text"><small class="form-text">Enter the
                        Student's first name</small>
                    </div>
                  </div>
                  <div class="border-bottom my-5 border-gray-200"></div>
                  <div class="row">
                    <label class="col-sm-3 form-label">Last Name </label>
                    <div class="col-sm-9">
                      <input class="form-control" name="lname" id="lname" type="text"><small class="form-text">Enter the
                        Student's last name </small>
                    </div>
                  </div>
                  <div class="border-bottom my-5 border-gray-200"></div>
                  <div class="row">
                    <label class="col-sm-3 form-label">Email </label>
                    <div class="col-sm-9">
                      <input class="form-control" name="mail" id="mail" type="text"><small class="form-text">Email ID
                        of the Student</small>
                    </div>
                  </div>

                  <div class="border-bottom my-5 border-gray-200"></div>
                  <div class="row">
                    <label class="col-sm-3 form-label">DOB </label>
                    <div class="col-sm-9">
                      <input class="form-control" name="date" id="date" type="date"><small class="form-text">Date of
                        Birth</small>
                    </div>
                  </div>

                  <div class="border-bottom my-5 border-gray-200"></div>
                  <div class="row">
                    <label class="col-sm-3 form-label">Class </label>
                    <div class="col-sm-9">
                      <input class="form-control" name="radio" id="radio" type="text"><small class="form-text">Enter the
                        last qualification degree</small>
                    </div>
                  </div>

                  <div class="border-bottom my-5 border-gray-200"></div>
                  <div class="row">
                    <label class="col-sm-3 form-label">Phone Number </label>
                    <div class="col-sm-9">
                      <input class="form-control" name="contact" type="text"><small class="form-text">Phone Number of
                        the Student</small>
                    </div>

                    <div class="border-bottom my-5 border-gray-200"></div>
                    <div class="row">
                      <label class="col-sm-3 form-label">Password </label>
                      <div class="col-sm-9">
                        <input class="form-control" name="pass" type="text"><small class="form-text">Password should
                          have one lowercase letter, one uppercase letter and one alphanumeric letter </small>
                      </div>

                      <div class="border-bottom my-5 border-gray-200"></div>
                      <div class="row">
                        <label class="col-sm-3 form-label">Confirm Password </label>
                        <div class="col-sm-9">
                          <input class="form-control" name="pass1" type="text"><small class="form-text">Re-enter the
                            password </small>
                        </div>


                        <div class="border-bottom my-5 border-gray-200"></div>
                        <div class="row">
                          <div class="col-sm-9 ms-auto">
                            <button class="btn btn-secondary" type="reset">Cancel</button>
                            <button class="btn btn-primary" type="submit">Save changes</button>
                          </div>
                        </div>
                </form>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>

    <?php
    if($_SERVER['REQUEST_METHOD']=='POST')
    {
      if(isset( $_POST['fname'])) {
        $fname1 = $_POST['fname'];
      }  
      if(isset( $_POST['lname'])) {
        $lname1 = $_POST['lname']; 
      }
      if( isset( $_POST['date'])) {
        $dob = date('Y-m-d', strtotime($_POST['date']));
      }
      if( isset( $_POST['radio'])) {
        $class1 = $_POST['radio']; 
      }
      if( isset( $_POST['mail'])) {
        $email = $_POST['mail']; 
      }
      if( isset( $_POST['contact'])) {
        $phone = $_POST['contact']; 
      }
      if( isset( $_POST['pass'])) {
        $password1 = $_POST['pass']; 
      }
      $id1=rand(1,1000);
      $id=$fname1."$id1";
    
        $q="insert into student1(user_id,first,last,class,dob,email,phone,password) values('$id','$fname1','$lname1','$class1','$dob','$email','$phone','$password1')";
        $r=@mysqli_query($dbc,$q);
        if($r) {
          echo "<script type=\"text/javascript\">"."
          alert('Successfully Registered'); "."
          window.location.href = 'studentdetails.php';"."
          </script>;";
        }
      else
      {
        echo "<script type=\"text/javascript\">"."
        alert('The Email ID has been registered.'); "."
        window.location.href = 'studentdetails.php';"."
      </script>;";
      }
      mysqli_close($dbc);
    }
    ?>



    <!-- Footer Page -->
    <footer class="main-footer w-100 position-absolute bottom-0 start-0 py-2" style="background: #222">
      <div class="container-fluid">
        <div class="row text-center gy-3">
          <div class="col-sm-6 text-sm-start">
            <p class="mb-0 text-sm text-gray-600">KASH Educational Trust &copy; Student Growth</p>
          </div>
          <div class="col-sm-6 text-sm-end">
            <p class="mb-0 text-sm text-gray-600">Design by <a href="https://bootstrapious.com/p/bootstrap-4-dashboard"
                class="external">Students</a></p>
            <!-- Please do not remove the backlink to us unless you support further theme's development at https://bootstrapious.com/donate. It is part of the license conditions and it helps me to run Bootstrapious. Thank you for understanding :)-->
          </div>
        </div>
      </div>
    </footer>
  </div>
  <!-- JavaScript files-->
  <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="vendor/chart.js/Chart.min.js"></script>
  <script src="vendor/just-validate/js/just-validate.min.js"></script>
  <script src="vendor/choices.js/public/assets/scripts/choices.min.js"></script>
  <script src="vendor/overlayscrollbars/js/OverlayScrollbars.min.js"></script>
  <!-- Main File-->
  <script src="js/front.js"></script>
  <script>
  // ------------------------------------------------------- //
  //   Inject SVG Sprite - 
  //   see more here 
  //   https://css-tricks.com/ajaxing-svg-sprite/
  // ------------------------------------------------------ //
  function injectSvgSprite(path) {

    var ajax = new XMLHttpRequest();
    ajax.open("GET", path, true);
    ajax.send();
    ajax.onload = function(e) {
      var div = document.createElement("div");
      div.className = 'd-none';
      div.innerHTML = ajax.responseText;
      document.body.insertBefore(div, document.body.childNodes[0]);
    }
  }
  // this is set to BootstrapTemple website as you cannot 
  // inject local SVG sprite (using only 'icons/orion-svg-sprite.svg' path)
  // while using file:// protocol
  // pls don't forget to change to your domain :)
  injectSvgSprite('https://bootstraptemple.com/files/icons/orion-svg-sprite.svg');
  </script>
  <!-- FontAwesome CSS - loading as last, so it doesn't block rendering-->
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.1/css/all.css"
    integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">
</body>

</html>