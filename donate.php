<!DOCTYPE html>
<html lang="en" dir="ltr">

<head>
  <meta charset="UTF-8">
  <link rel="stylesheet" href="css/fontawesome.min.css">
  <script src="js/calendar.js"></script>
  <link rel="stylesheet" href="css/style.default.css">
  <link rel="stylesheet" href="css/donate.css">
  <script src="js/jquery-ui.js"></script>
  <link href="css/jquery-ui.css" rel="stylesheet">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>KASH Educational Trust</title>
  <link rel="icon" type="image/x-icon" href="img/favicon.ico">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
  <style>
  .logo h1 {
  font-size: 28px;
  margin: 15px;
  line-height: 0;
  font-weight: 700;
  font-family: "Open Sans", sans-serif;
}
 .logo h1 a, .logo h1 a:hover {
  color: #635551;
  text-decoration: none;
}
</style>
  <script>
  $(function() {
    $("#calendar").datepicker({
      changeMonth: true,
      changeYear: true,
      touchUi: true
    });
  });
  </script>
</head>


<body>
 <!--Header-->
 <div class="signin" style="border-bottom:1px solid;">
    <div class="headertop">
      <div class="header1-home" style="float:left;">
        
        <div class="logo">
        <h1><a href="index.html">KASH Educational Trust</a></h1>
      </div>
      </div>
    </div>
  </div>



  <?php
require_once('connect.php');
    $q="select * from bloodcamp1";
    $query=@mysqli_query($dbc,$q);
    $num=mysqli_num_rows($query);
    if($num>0)
    { echo'
      <table id="t1" style="border-color:none;font-size:15px;">
    <tr id="tt1">
      <th colspan="6" style="font-size:20px;">Emergency - Blood Required </th>
    </tr>
    <tr id="tr2">
      <th>Place</th>
      <th>Date</th>
      <th>Blood Group</th>
      <th>Age</th>
      <th>Reason</th>
      <th>Contact</th>
    </tr>';
    while($row=mysqli_fetch_array($query,MYSQLI_ASSOC))
    {
    echo'
    <tr id="tr2">
    <td>'.$row['place'].'</td>
    <td>'.$row['date'].'</td>
    <th>'.$row['blood'].'</th>
    <th>'.$row['age'].'</th>
    <th>'.$row['reason'].'</th>
    <th>'.$row['contact'].'</th>
  </tr>';
    }
  }
    ?>
  </table>
  <br>

  <br>
  <!-- Form Registration -->
  <div class="body">
    <div class="container">
      <div class="title">Donor Registration</div>
      <div class="content">
        <form action="donate.php" name="myform" autocomplete="off" method="post">
          <div class="user-details">
            <div class="input-box">
              <span class="details">First Name</span>
              <input type="text" name="name1" id="name1" placeholder="Enter your first name" required />
            </div>
            <div class="input-box">
              <span class="details">Last Name</span>
              <input type="text" name="last" id="last" placeholder="Enter your last name" required />
            </div>

            <div class="input-box">
              <span class="details">DOB</span>
              <input type="date" name="calendar" id="calendar" placeholder="Enter your Date Of Birth" required>
            </div>
            <div class="input-box">
              <span class="details">Blood Group</span>
              <input type="text" name="blood" id="blood" placeholder="Enter your Blood Group(Ex: A+ve,B-Ve)" required />
            </div>
            <div class="input-box">
              <span class="details">Phone Number</span>
              <input type="text" placeholder="Enter your phone number" name="phone" id="phone1"
                onChange="return validatephone(document.myform.phone1)"
                onClick="document.getElementById('phoneerror').style.display='none'" required>
              <span id="phoneerror" style="color: red; font-size:15px; display:none;"></span>
            </div>
            <div class="input-box">
              <span class="details">Email</span>
              <input placeholder="Enter your mail address" name="email" id="email"
                onChange="return validateemail(document.myform.email)"
                onClick="document.getElementById('error').style.display='none'" required>
              <span id="error" style="color: red; font-size:15px; display:none;"></span>
            </div>
            <div class="input-box">
              <span class="details">Address</span>
              <input type="text" name="address" id="address" placeholder="Enter your address" required />
            </div>
            <div class="input-box">
              <span class="details">Number of times you have donated so far</span>
              <input type="text" name="count" id="count" placeholder="Enter the count" required />
            </div>
            <div class="input-box">
              <span class="details">Last donated date</span>
              <input type="date" name="lastd" id="lastd" placeholder="Enter the date" />
            </div>

          </div>
          <div class="button">
            <input type="submit" name="submit" id="submit" value="Register">
          </div>
        </form>
        <?php
  
  require_once('connect.php');
  error_reporting(0);
  if($_SERVER['REQUEST_METHOD']=='POST')
  {
    if(isset( $_POST['name1'])) {
      $fname = $_POST['name1'];
    }  
    if(isset( $_POST['last'])) {
      $lname = $_POST['last']; 
    }
    if( isset( $_POST['calendar'])) {
      $dob = date('Y-m-d', strtotime($_POST['calendar']));
    }
    if( isset( $_POST['blood'])) {
      $blood = $_POST['blood']; 
    }
    if( isset( $_POST['email'])) {
      $email = $_POST['email']; 
    }
    if( isset( $_POST['phone'])) {
      $phone = $_POST['phone']; 
    }
    if( isset( $_POST['address'])) {
      $address = $_POST['address']; 
    }
    if( isset( $_POST['count'])) {
      $count = $_POST['count']; 
    }
    if( isset( $_POST['lastd'])) {
      $lastd = $_POST['lastd'];
    }
    $id1=rand(1,1000);
    $id=$fname."$id1";
    $q="select * from blooddonor where email='$email'";
    $r=@mysqli_query($dbc,$q);
    $num=@mysqli_num_rows($r);
    if($num==0) {
    $q="insert into blooddonor values('$id','$fname','$lname','$dob','$blood','$email','$phone','$address','$count','$lastd')";
    $r=@mysqli_query($dbc,$q);
    $num=@mysqli_num_rows($r);
    if($r) {
        echo "<script type=\"text/javascript\">"."
        alert('Successfully Registered'); "."
        window.location.href = 'donate.php';"."
        </script>;";
      }
      else {
        echo "<script type=\"text/javascript\">"."
        alert('Check the details properly'); "."
        window.location.href = 'donate.php';"."
        </script>;";
      }
    }

        else
    {
      echo "<script type=\"text/javascript\">"."
      alert('The Email ID has been registered.'); "."
      window.location.href = 'donate.php';"."
    </script>;";
    }
  
    mysqli_close($dbc);
  }
  ?>
      </div>
    </div>