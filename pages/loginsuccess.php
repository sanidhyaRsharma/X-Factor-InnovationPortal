<?php
  $username=$_REQUEST['username'];
  $password=$_REQUEST['password'];
  if($username == "suyog" && $password=="suyu"){
    session_start();
    $_SESSION['username']=$username;
    $_SESSION['password']=$password;
    header('Location:loggedin.php');
  }
  else {
    header('Location:login.php?auth=fail');
  }


 ?>
