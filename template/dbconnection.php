<?php
    $localhost="localhost";
    $user="root";
    $pass="";
    $db="dcbportal";

    $conn=new mysqli($localhost,$user,$pass,$db);

    if(!$conn)
    {
        die("could not connect: ".mysqli_error($conn));
    }


?>
