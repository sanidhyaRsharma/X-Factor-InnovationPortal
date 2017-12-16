<!doctype html>
<html lang="en">

<head>
	<title>Dashboard-Admin</title>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
	<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0">
	<!-- VENDOR CSS -->
	<link rel="stylesheet" href="assets/vendor/bootstrap/css/bootstrap.min.css">
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

<style>

.modal-body{
  padding-left: 30px;
  padding-right: 30px;
}

</style>

</head>

<body>

<?php session_start(); echo $_SESSION['user_id'];?>

	<!-- WRAPPER -->
	<div id="wrapper">
		<!-- NAVBAR -->

		<nav class="navbar navbar-default navbar-fixed-top">
			<div class="brand">
				<a href="index.html"><img src="assets/img/logo-dark.png" alt="Klorofil Logo" class="img-responsive logo"></a>
			</div>
			<div class="container-fluid">

				<div id="navbar-menu">
					<ul class="nav navbar-nav navbar-right">
						<li class="dropdown">
							<a href="#" class="dropdown-toggle icon-menu" data-toggle="dropdown">
								<i class="lnr lnr-alarm"></i>
								<span class="badge bg-danger">5</span>
							</a>
							<ul class="dropdown-menu notifications">
								<li><a href="#" class="notification-item"><span class="dot bg-warning"></span>System space is almost full</a></li>
								<li><a href="#" class="notification-item"><span class="dot bg-danger"></span>You have 9 unfinished tasks</a></li>
								<li><a href="#" class="notification-item"><span class="dot bg-success"></span>Monthly report is available</a></li>
								<li><a href="#" class="notification-item"><span class="dot bg-warning"></span>Weekly meeting in 1 hour</a></li>
								<li><a href="#" class="notification-item"><span class="dot bg-success"></span>Your request has been approved</a></li>
								<li><a href="#" class="more">See all notifications</a></li>
							</ul>
						</li>
						<li class="dropdown">
							<a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="lnr lnr-question-circle"></i> <span>Help</span> <i class="icon-submenu lnr lnr-chevron-down"></i></a>
							<ul class="dropdown-menu">
								<li><a href="#">Basic Use</a></li>
								<li><a href="#">Working With Data</a></li>
								<li><a href="#">Security</a></li>
								<li><a href="#">Troubleshooting</a></li>
							</ul>
						</li>
						<li class="dropdown">
							<a href="#" class="dropdown-toggle" data-toggle="dropdown"><img src="assets/img/user.png" class="img-circle" alt="Avatar"> <span>Samuel</span> <i class="icon-submenu lnr lnr-chevron-down"></i></a>
							<ul class="dropdown-menu">
								<li><a href="#"><i class="lnr lnr-user"></i> <span>My Profile</span></a></li>
								<li><a href="#"><i class="lnr lnr-envelope"></i> <span>Message</span></a></li>
								<li><a href="#"><i class="lnr lnr-cog"></i> <span>Settings</span></a></li>
								<li><a href="#"><i class="lnr lnr-exit"></i> <span>Logout</span></a></li>
							</ul>
						</li>
						<!-- <li>
							<a class="update-pro" href="https://www.themeineed.com/downloads/klorofil-pro-bootstrap-admin-dashboard-template/?utm_source=klorofil&utm_medium=template&utm_campaign=KlorofilPro" title="Upgrade to Pro" target="_blank"><i class="fa fa-rocket"></i> <span>UPGRADE TO PRO</span></a>
						</li> -->
					</ul>
				</div>
			</div>
		</nav>

		<!-- END NAVBAR -->
		<div class="main">
			<!-- MAIN CONTENT -->
			<div class="main-content">
				<div class="container-fluid">
					<div class="row"><br />
					</div>
					<!-- START PANEL-->
					<div class="row col-lg-10">
						<div class="panel" id="innovate">
								<div class="panel-heading">
									<h3 class="panel-title"></h3>
									<!-- <div class="right">
										<button type="button" class="btn-toggle-collapse"><i class="lnr lnr-chevron-up"></i></button>
									</div> -->
								</div>
								<div class="panel-body no-padding bg-primary text-center">
									<div class="padding-top-30 padding-bottom-30">
<!-- 										<i class="fa fa-thumbs-o-up fa-5x"></i>
 -->										<h3>Propose Innovation</h3>
									</div>
								</div>
							</div>
					</div>
					<!-- END PANEL -->

          <div class="row col-lg-10" >
				<div class="panel" id="viewinnovations" >
									<a href="viewinnovation.php">	<div class="panel-heading">
									<h3 class="panel-title"></h3>
									<!-- <div class="right">
										<button type="button" class="btn-toggle-collapse"><i class="lnr lnr-chevron-up"></i></button>
									</div> -->
								</div>
								<div class="panel-body no-padding bg-primary text-center">

									<div class="padding-top-30 padding-bottom-30">
<!-- 										<i class="fa fa-thumbs-o-up fa-5x"></i>
-->										<h3>View Other Innovations </h3>
									</div>
								</div>
							</div>  </a>
					</div>
					<!-- END PANEL -->

          <div class="row col-lg-10">
						<div class="panel" id="innovate">
								<div class="panel-heading">
									<h3 class="panel-title"></h3>
									<!-- <div class="right">
										<button type="button" class="btn-toggle-collapse"><i class="lnr lnr-chevron-up"></i></button>
									</div> -->
								</div>
								<div class="panel-body no-padding bg-primary text-center">
									<div class="padding-top-30 padding-bottom-30">
<!-- 										<i class="fa fa-thumbs-o-up fa-5x"></i>
-->										<h3>Track My Innovation</h3>
									</div>
								</div>
							</div>
					</div>
					<!-- END PANEL -->



				</div>
			</div>
		</div>


		       <div class="modal fade" id="mymodal">
		      <div class="modal-dialog">
		        <div class="modal-content">
		          <div class="modal-header">
		            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
		            <h4 class="modal-title">Enter your idea details below</h4>
		          </div>
		          <div class="modal-body">
		                  <div class="row">
<form action="saveinnovation.php" method="post" enctype="multipart/form-data">
		                    					<div class="form-group">
		                                        <label>Title</label>
		                    							      <input type="text" class="form-control" name="title" id="title" placeholder="">
		                    					</div>


		            							  	<div class="form-group">
		            							      <label>Summary</label>
		              							        <input type="text" class="form-control" name="summary" id="summary"  placeholder="" >
		            							    </div>

		                              <div class="form-group">
		                                    <label>Description</label>
		                                    <textarea type="text" class="form-control" rows="20" name="comment" id="comment"></textarea
		                              </div>



		                                  <div class="form-group">
		                                    <label>Features</label>
		                                      <textarea type="text" class="form-control" rows="3" name="features" id="features"  placeholder="" ></textarea>
		                                  </div>


		                                        <div class="form-group">
		                      							      <label>Bussiness Impact</label>
		                      							        <textarea type="text" class="form-control" rows="3" name="businessImpact" id="businessImpact" placeholder="" ></textarea>
		                      							    </div>

		                                           <div class="form-group">
		                            							      <label>Tangible Benefits</label>
		                            							        <textarea type="text" class="form-control" rows="3"name="tangibleBenefits" id="tangibleBenefits"  placeholder="" ></textarea>
		                            							    </div>

		                                              <label for="radio">Regulation Status</label>
		                           	                                                <div class="col-lg-4">
		                                                <input type="radio" name="regulated" value=1> Regulated
		                                              </div>


		                                                <input type="radio" name="regulated" value=2> Nonregulated<br>




		                                              <div class="form-group">
		                               							      <label>Upload Document</label>
                                                      Select image to upload: <input type="file" name="fileToUpload" id="fileToUpload">

		                               							    </div>

		                                                <label for="radio">Protoype Status</label>

		                                                <div class= "col-lg-4">
		                                                <input type="radio" name="prototypeagree" value=1> Prototype Agree
		                                              </div>

		                                                <input type="radio" name="prototypeagree" value=2> Prototype Disagree






		                </div>

		          </div>
		          <div class="modal-footer">
		            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
		            <button type="submit" class="btn btn-primary" name="save" id="save"/>Save changes</button>
		          </div>
		        </div>
		      </div>
		    </div>
</form>

	</div>
	<!-- END WRAPPER -->
	<!-- Javascript -->
	<script src="assets/vendor/jquery/jquery.min.js"></script>
	<script src="assets/vendor/bootstrap/js/bootstrap.min.js"></script>
	<script src="assets/vendor/jquery-slimscroll/jquery.slimscroll.min.js"></script>
	<script src="assets/scripts/klorofil-common.js"></script>
<script>


$(document).ready(function(){

  $("#innovate").click(function(){
    $('#mymodal').modal('show');
  })


  $("#sasve").click(function(){

    var features=$("#features").val();
    var comment=$("#comment").val();
    var title=$("#title").val();

    var summary=$("#summary").val();

    var businessImpact=$("#businessImpact").val();
    var tangibleBenefits=$("#tangibleBenefits").val();
var prototypeagree= $("input[name='prototypeagree']:checked").val();
var regulated = $("input[name='regulated']:checked").val();

    $.ajax({
  		 type:"post",
  		 url: "saveinnovation.php",
  		data:{
        features:features,
        comment:comment,
        features:features,
        summary:summary,
        businessImpact:businessImpact,
        tangibleBenefits:tangibleBenefits,
        prototypeagree:prototypeagree,
        regulated:regulated,
        title:title

		},

		success:function(data)
			{
      if(data==0){
          alert("problem");
        location.reload(true);}
else{
        alert("in modal");
        //console.log("in modal");
        $('#updatemodal').modal('hide');
}

      }
  	  });
  });



})
</script>


</body>

</html>
