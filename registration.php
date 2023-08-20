<?php
require_once('connect.php');
error_reporting(0);
if($_SERVER['REQUEST_METHOD']=='POST')
{
  if(isset( $_POST['name1'])) {
    $fname1 = $_POST['name1'];
  }  
  if(isset( $_POST['last'])) {
    $lname1 = $_POST['last']; 
  }
  if( isset( $_POST['calendar'])) {
    $dob = date('Y-m-d', strtotime($_POST['calendar']));
  }
  if( isset( $_POST['class1'])) {
    $class1 = $_POST['class1']; 
  }
  if( isset( $_POST['email'])) {
    $email = $_POST['email']; 
  }
  if( isset( $_POST['phone'])) {
    $phone = $_POST['phone']; 
  }
  if( isset( $_POST['password1'])) {
    $password1 = $_POST['password1']; 
  }
  $id1=rand(1,1000);
  $id=$fname1."$id1";
  
  $q="select * from student1 where email='$email'";
  $r=@mysqli_query($dbc,$q);
  $num=@mysqli_num_rows($r);
  if($num==0)
  {
    $q="insert into student1(user_id,first,last,class,dob,email,phone,password) values('$id','$fname1','$lname1','$class1','$dob','$email','$phone','$password1')";
    $r=@mysqli_query($dbc,$q);
    if($r) {
      echo "<script type=\"text/javascript\">"."
      alert('Successfully Registered'); "."
      window.location.href = 'signin.php';"."
      </script>;";
    }
  }
  else
  {
    echo "<script type=\"text/javascript\">"."
    alert('The Email ID has been registered.'); "."
    window.location.href = 'signin.php';"."
  </script>;";
  }
  mysqli_close($dbc);
}
?>