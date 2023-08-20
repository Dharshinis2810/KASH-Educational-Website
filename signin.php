<!DOCTYPE html>
<!--SIGN IN PAGE-->

<head>
  <title>KASH Educational Trust</title>
  <link rel="icon" type="image/x-icon" href="img/favicon.ico">
  <link rel="stylesheet" href="css/style.css" />
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
  <link rel="stylesheet" href="css/bootstrap.min.css" />
  <link rel="stylesheet" href="css/fontawesome.min.css">
  <script src="js/calendar.js"></script>
  <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
  <script src="js/jquery-ui.js"></script>
  <link href="css/jquery-ui.css" rel="stylesheet">
  <link rel="stylesheet" href="css/style.default.css">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
  <link rel="preconnect" href="https://fonts.gstatic.com">
  <link rel="stylesheet" href="css/fontawesome.min.css">
  <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;500;600&display=swap" rel="stylesheet">
</head>
<meta name="viewport" content="width=device-width, initial-scale=1.0">

<body>
  <!--Header-->
  <div class="signin" style="border-bottom:1px solid;">
    <div class="headertop">
      <div class="header1-home" style="float:left; margin-left:20px;">
        
        <div class="logo">
        <h1><a href="index.html">KASH Educational Trust</a></h1>
      </div>
      </div>
    </div>
  </div>

  <div class="empty"></div>
  <!-- Form Container-->
  <div class="form-class">
    <form name="myform" autocomplete="off" method="post" action="login.php">
      <h3>Sign in to continue</h3>

      <label for="username">
        <p style="font-family: 'Poppins',sans-serif;">Username</p>
      </label>
      <input placeholder="Enter your mail address" name="email" id="email"
        onChange="return validateemail(document.myform.email)"
        onClick="document.getElementById('error').style.display='none'" required>
      <span id="error" style="color: red; font-size:15px; display:none;"></span>

      <label for="password">
        <p style="font-family: 'Poppins',sans-serif;">
          Password
        </p>
      </label>
      <input type="password" placeholder="Enter your password" id="password" name="password">

      <div class="button">
        <input type="submit" value="Sign In">
      </div>
      <div class="login-help">
        <p>Don't have an account ? <a style="text-decoration: none;" href="signup.php">Sign Up</a>/<a
            style="text-decoration: none;" href="forgotpassword.html">Forgot password?</a></p>
      </div>
    </form>
  </div>
</body>

</html>