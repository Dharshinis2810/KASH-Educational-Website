<?php
include 'connect.php';
if(isset($_POST['but_delete'])){

  if(isset($_POST['delete'])){
    foreach($_POST['delete'] as $deleteid){

      $deleteUser = "DELETE from event1 WHERE eid='$deleteid' ";
      $r=@mysqli_query($dbc,$deleteUser);
      if($r)
      {
        echo "<script type=\"text/javascript\">"."
        alert('Deleted Successfully'); "."
        window.location.href = 'eventpage.php';"."
        </script>";
      }
      else
      {
        echo "<script type=\"text/javascript\">"."
        alert('Not Deleted Successfully'); "."
        window.location.href = 'eventpage.php';"."
        </script>";
      }
    }
  }
}

 ?>