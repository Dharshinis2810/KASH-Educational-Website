<?php
                     
 include 'connect.php';   
if(isset($_POST['but_delete'])){ 
 
  if(isset($_POST['delete'])){    
    foreach($_POST['delete'] as $deleteid){      
      $query="delete from replyqueries1 where qid='$deleteid'";
      $r=@mysqli_query($dbc,$query);
      
      if($r) {
        echo "<script type=\"text/javascript\">"."
         window.location.href = 'studentmessages.php';"."
        </script>;";
      }
      else
      {
        echo "<script type=\"text/javascript\">"."
        alert('Please Try Again After SomeTime or Email KASH@gmail.com'); "."
        window.location.href = 'studentmessages.php';"."
        </script>;";
      }
    }
    
  }
}

 ?>