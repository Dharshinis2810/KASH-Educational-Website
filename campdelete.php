<?php
include 'connect.php';
if(isset($_POST['but_delete'])){

  if(isset($_POST['delete'])){
    foreach($_POST['delete'] as $deleteid){

      $deleteUser = "DELETE from bloodcamp1 WHERE camp_id='$deleteid'";
      $r=@mysqli_query($dbc,$deleteUser);
      if($r)
      {
        echo "<script type=\"text/javascript\">"."
        alert('Deleted Successfully'); "."
        window.location.href = 'camp.php';"."
        </script>";
      }
    }
  }
}
mysqli_close($dbc);
 ?>