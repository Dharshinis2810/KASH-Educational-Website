<?php 
   //Database Connection
    DEFINE('DB_HOST','localhost');
    DEFINE('DB_USER','root');
    DEFINE('DB_PASSWORD','');
    DEFINE('DB_NAME','exer');
    $dbc=@mysqli_connect(DB_HOST,DB_USER,DB_PASSWORD,DB_NAME) or DIE
    ("Could Not Connect" . mysqli_connect_error());
    ?>