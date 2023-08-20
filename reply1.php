<?php
                     
 include 'connect.php';   
if(isset($_POST['but_delete'])){
  $q1message=$_POST['q1message'];
}
if(isset($_POST['but_delete'])){ 
 
  if(isset($_POST['delete'])){    
    foreach($_POST['delete'] as $deleteid){      
      $q1message=$_POST['q1message'];
      $query="select * from queries where qid='$deleteid'";
      $result=@mysqli_query($dbc,$query);
      $no=mysqli_num_rows($result);
      $row=@mysqli_fetch_assoc($result);
      $name=$row['user_name'];
      $qmessage=$row['qmessage'];
      $user_id=$row['user_id'];
      $q="insert into replyqueries values('$deleteid','$user_id','$name','$qmessage','$q1message')"; #original
      $m="insert into replyqueries1 values('$deleteid','$user_id','$name','$qmessage','$q1message')"; #duplicate
      $r=@mysqli_query($dbc,$q); 
      $r1=@mysqli_query($dbc,$m);
      if($r) {
        echo "<script type=\"text/javascript\">"."
        alert('Query is sent back to the student'); "."
        window.location.href = 'queries.php';"."
        </script>;";
        $qw="delete from queries where qid='$deleteid'";
        $re=@mysqli_query($dbc,$qw);
      }
      else
      {
        echo "<script type=\"text/javascript\">"."
        alert('Please Try Again After SomeTime or Email KASH@gmail.com'); "."
        window.location.href = 'queries.php';"."
        </script>;";
      }
    }
    
  }
}

 ?>