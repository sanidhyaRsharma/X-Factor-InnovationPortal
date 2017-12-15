<html>
<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Home Page</title>


        <!-- Bootstrap Core CSS -->
        <link href="../bootstrap/dist/css/bootstrap.css" rel="stylesheet">

        <!-- Bootstrap Core CSS -->
        <link href="../bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">

       <!-- Bootstrap js -->
        <script src="../bootstrap/dist/js/bootstrap.min.js"></script>

        <!--Bootstrap js -->
        <script src="../bootstrap/dist/js/bootstrap.js"></script>

        <!-- Custom Fonts -->
        <link href="../font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">

         <!-- jquery -->
        <script src="../jquery/dist/jquery.js"></script>

        <!-- jquery -->
        <script src="../jquery/dist/jquery.min.js"></script>


    <style>
    	.center{
    		text-align:center;
    		font-size:50px;
    	}

      #error{
        color: red;
        padding-bottom:10px;
      }
    </style>

    <script>
    	$(document).ready(function(){
    	});
    </script>
</head>


<?php
        //databse operations

        include_once('functions.php');
        $conn_type = "dbconnection.php";
        include_once('classes.php');


   if(isset($_POST['login']))
   {

        $username=validateFormData($_POST['username']);
        $password=validateFormData($_POST['password']);
        $user = new User($conn);
        echo $username."      ".$password;

        if($user->authorizeUser($username,$password))
        {
            session_start();
            $_SESSION['user']=$user;
            $_SESSION['username']=$user->getUserName();


            if($username=='admin'){
              header('Location:inventory.php');
            }else {
              header('Location:loggedin.php');
            }
        }
       else
        {
            header('Location:login.php?auth=fail');
        }

   }

?>




<body>


    <div class="container-fluid">
    	<div class="row">
    		<nav class="navbar navbar-default">
				    <div class="navbar-header">
				      <a class="navbar-brand" href="#">Brand</a>
				    </div>
            <ul class="nav navbar-nav navbar-right">
					        <li><a href="logout.php">Logout</a></li>
					  </ul>
				    </div>
				</nav>
        </div>
        <!-- ./row -->


 		<div class="row">

 			<!-- write yout html code from here -->
 			<div class="col-lg-4">
 			</div>
 			<!-- ./col-lg-4 -->
 			<div class="col-lg-4">
 				<legend class="center">Log In</legend>
 					<div class="panel panel-primary">
					  <div class="panel-heading">
					    <h3 class="panel-title">Log In</h3>
					  </div>
					  <div class="panel-body">
					  		<form class="form-horizontal" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']);?>" method="post">
							  <fieldset>
                  <?php
                    if(isset($_GET['auth'])){
                      $auth=$_GET['auth'];
                    if($auth == "fail"){
                        $result="Login Failed";
                    }
                  }
                   ?>

							    <div class="form-group">
							      <label class="col-lg-3 control-label">User name</label>
							      <div class="col-lg-9">
							        <input type="text" class="form-control" id="username" name="username" placeholder="User Name">
							      </div>
							    </div>


							  	<div class="form-group">
							      <label class="col-lg-3 control-label">Password</label>
							      <div class="col-lg-9">
							        <input type="password" class="form-control" id="password" name="password" placeholder="Password">
							      </div>
							    </div>

                  <div <div class="col-lg-9 col-lg-offset-3">

                  <div  id="error">
                      <?php
                            if(isset($result)){
                              echo $result;
                            }
                       ?>
							    </div>
                </div>




							    <div class="form-group">
							      <div class="col-lg-9 col-lg-offset-3">
                       <button type="reset" class="btn btn-default">Cancel</button>
							        <button type="submit" name="login" class="btn btn-primary">Login</button>

							      </div>
							    </div>
					    	</form>

					  </div>
					</div>

 			</div>
 			<!-- ./col-lg-4 -->

 		</div>
 		<!--./row -->
    </div>
    <!--./container-fluid -->
</body>
</html>
