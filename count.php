<?php
include 'connect.php';
if(isset($_POST['but_delete'])){
  $count1=$_POST['count1'];
  $bdate1=$_POST['bdate1'];
}
if(isset($_POST['but_delete'])){

  if(isset($_POST['delete'])){
    foreach($_POST['delete'] as $deleteid){

      $deleteUser = "update blooddonor set count='$count1', lastdate='$bdate1' WHERE user_id='$deleteid' "; #Original
      $r=@mysqli_query($dbc,$deleteUser);
      if($r)
      {
        echo "<script type=\"text/javascript\">"."
        alert('Updated Successfully'); "."
        window.location.href = 'blooddonor.php';"."
        </script>";
      }
      else
      {
        echo "<script type=\"text/javascript\">"."
        alert('Not Updated Successfully'); "."
        window.location.href = 'blooddonor.php';"."
        </script>";
      }
    }
  }
}

 ?>