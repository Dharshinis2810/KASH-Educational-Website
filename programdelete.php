<?php
include 'connect.php';
if(isset($_POST['but_delete'])){

  if(isset($_POST['delete'])){
    foreach($_POST['delete'] as $deleteid){

      $deleteUser = "DELETE from program1 WHERE id='$deleteid' ";
      $r=@mysqli_query($dbc,$deleteUser);
      if($r)
      {
        echo "<script type=\"text/javascript\">"."
        alert('Deleted Successfully'); "."
        window.location.href = 'student.php';"."
        </script>";
      }
      else
      {
        echo "<script type=\"text/javascript\">"."
        alert('Not Deleted Successfully'); "."
        window.location.href = 'student.php';"."
        </script>";
      }
    }
  }
}

 ?>