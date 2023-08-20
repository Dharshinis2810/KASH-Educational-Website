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
            <li class="breadcrumb-item"><a class="fw-light" href="dashboard.php">Home</a></li>
            <li class="breadcrumb-item active fw-light" aria-current="page">Events </li>

          </ol>
        </nav>
      </div>
    </div>



    <!-- Page Header-->
    <header class="py-4">
      <div class="container-fluid py-2">
        <h1 class="h3 fw-normal mb-0">Event Details</h1>
        <div class="d-flex"><a class="btn btn-xs btn-dark py-1 m-1" href="events.php"><i
              class="fas fa-plus-square me-1"></i>Add</a><a class="btn btn-xs btn-dark py-1 m-1"
            href="eventdetails.php"><i class="fas fa-plus-square me-1"></i>Update</a>
          <a class="btn btn-xs btn-dark py-1 m-1" href="eventview.php"><i class="fas fa-search me-1"></i>View</a>
        </div>
      </div>

    </header>

    <!-- Updates Section -->

    <section class="mb-5">

      <div class="container-fluid">
        <div class="row">
          <div class="col-lg-12">
            <!-- Recent Updates Widget -->
            <div class="card">
              <div class="card-header border-bottom">
                <h2 class="h5 fw-normal mb-0"><a class="card-collapse-link text-dark d-block" data-bs-toggle="collapse"
                    href="#updates-box" aria-expanded="true">Events </a></h2>
              </div>
              <div class="card-body p-0">
                <div class="collapse show" id="updates-box" role="tabpanel">

                  <ul class="list-unstyled">

                    <?php
                      echo '<form method="post" action="eventdelete.php"> ';
              $query="select * from event1";
              $result=@mysqli_query($dbc,$query);
              $no=mysqli_num_rows($result);
              while($row=mysqli_fetch_array($result,MYSQLI_ASSOC))
              { ?>
                    <!-- Item-->
                    <div class="p-3 d-flex justify-content-between">
                      <div class="d-flex"><i class="fas fa-file text-gray-600"></i>
                        <div class="ms-3">
                          <input name="delete[]" type="checkbox" id="checkbox[]" value="<?= $row['eid'] ?>">
                          <h5 class="fw-bold h4 text-black-600 mb-1"><?= $row['eheader'] ?></h5>
                          <p class="mb-0 text-gray-600"><?= $row['edesc'] ?></p>
                          <p class="mb-0 text-gray-600"><?= $row['eplace'] ?> </p>
                          <div class="d-flex"><input class="btn btn-xs btn-dark py-1 m-1" type="submit" value="Delete"
                              name="but_delete"></div>
                        </div>
                      </div>
                      <div class="text-end ms-2"><strong
                          class="d-block lh-1 h2 mb-0 text-gray-500 fw-bold"><?= $row['edate'] ?></strong></div>

                    </div>
                    <!-- Item Ends -->
                    <?php } ?>
                    </form>
                  </ul>
                </div>
              </div>
            </div>
            <!-- Recent Updates Widget End-->
          </div>
        </div>
      </div>
    </section>


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