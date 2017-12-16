<?php
session_start();

include_once('dbconnection.php');
$features=$_POST['features'];
$comment=$_POST['comment'];
$user =$_SESSION['user_id'];//zcsafcfvf
$title=$_POST['title'];
$summary=$_POST['summary'];
$businessImpact=$_POST['businessImpact'];
$tangibleBenefits=$_POST['tangibleBenefits'];
$prototypeagree=$_POST['prototypeagree'];
$regulated=$_POST['regulated'];
//$file = $target_file;
$target_dir = "uploads/";
$target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
$file = $target_file;
if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
    echo "The file ". basename( $_FILES["fileToUpload"]["name"]). " has been uploaded.";
} else {
    echo "Sorry, there was an error uploading your file.";
}


$query="insert into innovation (features,user_id,title,summary,description,file,business_impact,tangible_benefits,prototype,regulation)
              values('$features','$user','$title','$summary','$comment','$file','$businessImpact','$tangibleBenefits',$prototypeagree,$regulated)";

            if(mysqli_query($conn,$query))
            {
              echo 1;

            }
            else echo 0;
      echo  mysqli_error($conn);
header('Location:user-dashboard.php');


 ?>
