<?php
include 'connect.php';
if(isset($_POST['but_delete'])){
  $pname=$_POST['pname'];
  $pdes=$_POST['pdes'];
  $iname=$_POST['iname'];
  $url=$_POST['url'];
  $date=$_POST['pdate'];
  $time=$_POST['ptime'];
  $plat=$_POST['radio1'];
  $con=$_POST['phone'];
}
if(isset($_POST['but_delete'])){

  if(isset($_POST['delete'])){
    foreach($_POST['delete'] as $deleteid){

      $deleteUser = "update program set pname='$pname', pdesc='$pdes', ins='$iname', url='$url' pdate='$date' ptime='$time' plat='$plat' contact='$con' WHERE eid='$deleteid' "; #Original
      $r=@mysqli_query($dbc,$deleteUser);
      $deleteUser1 = "update program1 pname='$pname', pdesc='$pdes', ins='$iname', url='$url' pdate='$date' ptime='$time' plat='$plat' contact='$con' WHERE eid='$deleteid' "; #Duplicate
      $r1=@mysqli_query($dbc,$deleteUser1);
      if($r)
      {
        echo "<script type=\"text/javascript\">"."
        alert('Updated Successfully'); "."
        window.location.href = 'programdetails.php';"."
        </script>";
      }
      else
      {
        echo "<script type=\"text/javascript\">"."
        alert('Not Updated Successfully'); "."
        window.location.href = 'programdetails.php';"."
        </script>";
      }
    }
  }
}

 ?>