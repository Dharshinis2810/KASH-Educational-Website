<?php
require_once('connect.php');
session_start();
if($_SERVER['REQUEST_METHOD']=='POST')
{
  if(isset($_POST['email']))
  {
    $email=$_POST['email'];
  }
  if(isset($_POST['password']))
  {
    $password=$_POST['password'];
  }
  $q="select * from student1 where email='$email' and password='$password'";
  $q1="select * from admin where email='$email' and password='$password'";
  $r=@mysqli_query($dbc,$q); # STUDENT
  $r1=@mysqli_query($dbc,$q1); # ADMIN 
  $fetch=@mysqli_fetch_array($r1); #ADMIN
  $fetch1=@mysqli_fetch_array($r); #STUDENT
  $num=@mysqli_num_rows($r); #STUDENT
  $num1=@mysqli_num_rows($r1); #ADMIN
  
 
  if($num1==1) #ADMIN FETCH
  {
    $_SESSION['user_id']=$fetch['user_id'];
    echo "<script type=\"text/javascript\">"."
      window.location.href = 'dashboard.php';"."
      </script>;";
      
  }
  else if($num==1) #STUDENT FETCH
  {
    $_SESSION['user_id']=$fetch1['user_id'];
    echo "<script type=\"text/javascript\">"."
    window.location.href = 'studentprofile.php';"."
    </script>;";
  }
  else
  {
    echo "<script type=\"text/javascript\">"."
    alert('Check your Email ID and Password'); "."
    window.location.href = 'signin.php';"."
    </script>;";
  }
  mysqli_close($dbc);
  
}