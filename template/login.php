<!doctype html>
<html lang="en" class="fullscreen-bg">

<head>
	<title>Login </title>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
	<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0">
	<!-- VENDOR CSS -->
	<link rel="stylesheet" href="assets/css/bootstrap.min.css">
	<link rel="stylesheet" href="assets/vendor/font-awesome/css/font-awesome.min.css">
	<link rel="stylesheet" href="assets/vendor/linearicons/style.css">
	<!-- MAIN CSS -->
	<link rel="stylesheet" href="assets/css/main.css">
	<!-- FOR DEMO PURPOSES ONLY. You should remove this in your project -->
	<link rel="stylesheet" href="assets/css/demo.css">
	<!-- GOOGLE FONTS -->
	<link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700" rel="stylesheet">
	<!-- ICONS -->
	<link rel="apple-touch-icon" sizes="76x76" href="assets/img/apple-icon.png">
	<link rel="icon" type="image/png" sizes="96x96" href="assets/img/favicon.png">
	<!-- <script src = "assets/scripts/login.js"></script> -->

</head>
<?php
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
						$_SESSION['user_id'] = $user->getUserID();

            if($user->getType()===1){
              header('Location:admin-dashboard.php');
            }else if ($user->getType()==2||$user->gettype()==3)
            {
              header('Location:user-dashboard.php');
            }
            else
                header('Location:domain.php');
        }
       else
        {
            header('Location:login.php?auth=fail');
        }

   }

?>

<body>
	<!-- WRAPPER -->
	<div id="wrapper">
		<div class="vertical-align-wrap">
			<div class="vertical-align-middle">
				<div class="auth-box ">
					<div class="left">
						<div class="content">
							<div class="header">
								<div class="logo text-center"><img src="assets/img/dcb-bank.jpg" width= "70%"alt="DCB Bank"></div>
								<p class="lead">Login to your account</p>
							</div>
							<form class="form-auth-small" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']);?>" method="post">
								<div class="form-group">
									<label for="signin-email" class="control-label sr-only">Email</label>
									<input type="email" class="form-control" name="username" id="email" value="" placeholder="Email">
								</div>
								<div class="form-group">
									<label for="signin-password" class="control-label sr-only">Password</label>
									<input type="password" class="form-control" name="password" id="password" value="" placeholder="Password">
								</div>

								<button type="submit" id = "submit_button" name="login" class="btn btn-primary btn-lg btn-block">LOGIN</button>
								<div class="bottom">
									<span class="helper-text"><i class="fa fa-lock"></i> <a href="#">Forgot password?</a></span>
								</div>
							</form>
						</div>
					</div>
					<div class="right">
						<div class="overlay"></div>
						<div class="content text">
							<h1 class="heading">Innovation portal</h1>
								<p>by The ChainWorkers</p>
							</div>
						</div>
					<div class="clearfix"></div>
				</div>
			</div>
		</div>
	</div>
	<!-- END WRAPPER -->
	<script type="text/javascript" src="assets/scripts/login.js">
	</script>
</body>

</html>
