<?php
session_start();

include_once('dbconnection.php');
$innovation=$_POST['innovation_id'];
$rating=$_POST['rating'];
$user = $_SESSION['user'];
;
//$file = $target_file;
$query="insert into ratings (user_id,innovation_id,rating_value) values($user,$innovation,$rating)";

            if(mysqli_query($conn,$query))
            {
              echo 1;

            }
            else echo 0;
      echo  mysqli_error($conn);
header('Location:userdashboard.php');


 ?>
