<?php
$localhost="localhost";
$user="root";
$pass="";
$db="ims";

$conn=new mysqli($localhost,$user,$pass,$db);

if(!$conn)
{
    die("could not connect: ".mysqli_error($conn));
}


?>