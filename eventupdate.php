<?php
include 'connect.php';
if(isset($_POST['but_delete'])){
  $header=$_POST['p1name'];
  $desc1=$_POST['p1des'];
  $i1name=$_POST['i1name'];
  $p1date=$_POST['p1date'];
}
if(isset($_POST['but_delete'])){

  if(isset($_POST['delete'])){
    foreach($_POST['delete'] as $deleteid){

      $deleteUser = "update event set eheader='$header', edesc='$desc1', eplace='$i1name', edate='$p1date' WHERE eid='$deleteid' "; #Original
      $r=@mysqli_query($dbc,$deleteUser);
      $deleteUser1 = "update event1 set eheader='$header', edesc='$desc1', eplace='$i1name', edate='$p1date' WHERE eid='$deleteid' "; #Duplicate
      $r1=@mysqli_query($dbc,$deleteUser1);
      if($r)
      {
        echo "<script type=\"text/javascript\">"."
        alert('Updated Successfully'); "."
        window.location.href = 'eventdetails.php';"."
        </script>";
      }
      else
      {
        echo "<script type=\"text/javascript\">"."
        alert('Not Updated Successfully'); "."
        window.location.href = 'eventdetails.php';"."
        </script>";
      }
    }
  }
}

 ?>