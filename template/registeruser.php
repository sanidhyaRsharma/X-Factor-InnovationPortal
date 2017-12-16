<?php
include_once('classes.php');
include_once('dbconnection.php');

  $username=$_REQUEST['uname'];
  $password=$_REQUEST['pass'];
  $status=$_REQUEST['status'];
  $email=$_REQUEST['email'];
echo $status;
if($username  && $password  && $status  && $email ){

  $query = "Insert into users(username,email,password,type_id) values('$username','$email','$password',$status)";
if(mysqli_query($conn,$query))
{
  
    header('Location:login.php');
  }
  else {
    header('Location:register.php');
  }
}

 ?>
