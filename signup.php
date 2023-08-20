<!doctype html>
<html>

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width,initial-scale=1.0">
  <link rel="stylesheet" href="css/fontawesome.min.css">
  <script src="js/calendar.js"></script>
  <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
  <script src="js/jquery-ui.js"></script>
  <link href="css/jquery-ui.css" rel="stylesheet">
  <link rel="stylesheet" href="css/style.default.css">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
  <title>KASH Educational Trust</title>
  <link rel="icon" type="image/x-icon" href="img/favicon.ico">
  <script>
  $(function() {
    $("#calendar").datepicker({
      changeMonth: true,
      changeYear: true,
      touchUi: true
    });
  });
  </script>
  <style>
  .body {
    height: 100vh;
    display: flex;
    background-color: white;
    justify-content: center;
    align-items: center;
    padding: 10px;
    margin-top: 190px;
  }
  </style>
  <link rel="stylesheet" href="css/register.css">
  <title>Sign Up</title>
</head>

<body>
  <!--Header-->
  <header id="header" class="d-flex align-items-center">
    <div class="container d-flex align-items-center justify-content-between">

      <div class="logo">
        <h1><a href="index.html">KASH Educational Trust</a></h1>
      </div>

      <!-- .navbar -->

    </div>
  </header>
  <div class="body">
    <div class="container">
      <div class="title">Registration</div>
      <div class="content">
        <form action="registration.php" name="myform" autocomplete="off" method="post">
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
              <span class="details">Class</span>
              <input type="text" name="class1" id="class1" placeholder="Enter your last qualification class" required />
            </div>
            <div class="input-box">
              <span class="details">DOB</span>
              <input type="text" name="calendar" id="calendar" placeholder="Enter your Date Of Birth" required>
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
              <span class="details">Password</span>
              <input type="password" name="password1" id="password1" placeholder="Enter your password"
                onChange="return password(document.myform.password1)"
                onClick="document.getElementById('comments').style.display='none'" required>
              <span id="comments" style="color:dimgray; font-size:15px; display: none;"></span>
            </div>
            <div class="input-box">
              <span class="details">Confirm Password</span>
              <input type="password" name="confirm1" id="confirm1" placeholder="Confirm your password"
                onChange="return pasconfirm(document.myform.confirm1)"
                onClick="document.getElementById('cerror1').style.display='none'" required>
              <span id="cerror1" style="color:red; font-size:15px; display: none;"></span>
            </div>

          </div>
          <div class="button">
            <input type="submit" name="submit" id="submit" value="Register">
          </div>
        </form>
      </div>
    </div>
  </div>

</body>

</html>