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
	<script src="assets/vendor/jquery/jquery.min.js"></script>
	<script src="assets/vendor/bootstrap/js/bootstrap.min.js"></script>
	<script src="assets/vendor/jquery-slimscroll/jquery.slimscroll.min.js"></script>
	<script src="assets/scripts/klorofil-common.js"></script>

	<style>
		.panel-position {
			position: relative;
			top: 15px;
			margin:auto;
			width: 70%;
		}


		.modal-body{
		  padding-left: 30px;
		  padding-right: 30px;
		}


	</style>

	<!-- For stars -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

        <style>
			.left{
				float:left;
				margin:3px;
			}
              .checked {
                  color: orange;
              }
        </style>

				<script>
							 $(document).ready(function(){
													$(".fa-star").mouseenter(function(){
																var currRating = $(this).attr('value');

																var children = $(this).parent().children();
																children.eq(5).text('X');
																var i = 0;
																while(i < currRating){
																			children.eq(i).addClass("checked");
																			i += 1;
																}

																while(i < 5){
																			children.eq(i).removeClass("checked");
																			i += 1;
																}
																children.eq(5).val(currRating);

													});
													$(".fa-star").mouseleave(function(){
														var children = $(this).parent().children();
														var badgeLabel = children.eq(5);
														badgeLabel.text(badgeLabel.val());
													});
								 $(".badge").click(function(){
									 var i = 0;
									 var children = $(this).parent().children();
									 while(i < 5){
																			children.eq(i).removeClass("checked");
																			i += 1;
																}
																children.eq(5).val(0);
									 children.eq(5).text(0);
								 });
										});
						 </script>
</head>

<body>


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
</div>
		<!-- END NAVBAR -->
		<div class="main">
			<!-- MAIN CONTENT -->
			<div class="main-content">
				<div class="container-fluid">
					<br />

					<div class="row">

							<div class="col-lg-12"><h1>some random shit</h1></div>
						</div>

					<?php
					include_once('dbconnection.php');

					$query="select * from innovation";
					$result =	mysqli_query($conn,$query);
$count=0;
					if($result){
								while($row = mysqli_fetch_array($result)){

											$count++;





					 ?>
<div class="row">


					<!-- PANEL DEFAULT -->
							<div class="panel col-lg-12" id ="i-<?php echo $row['innovation_id']?>">
								<div class="panel-heading" >
									<h3 class="panel-title"><?php echo $row['title'] ?></h3>
									<div class="right">
										<?php echo $row['created_at'] ?>
										<button type="button" class="btn-toggle-collapse"><i class="lnr lnr-chevron-up"></i></button>
										<!-- <button type="button" class="btn-remove"><i class="lnr lnr-cross"></i></button> -->
									</div>
								</div>
								<div class="panel-body">
									<p><?php echo $row['summary'] ?>
									</p>
								</div>
							</div>



							<!-- END PANEL DEFAULT -->



							<div class="modal fade" id="mymodal-<?php echo $row['innovation_id']?>">
							<div class="modal-dialog">
							 <div class="modal-content">
								 <div class="modal-header">
									 <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
									 <h4 class="modal-title">Idea</h4>
								 </div>
								 <div class="modal-body">
												 <div class="row">

																		 <div class="form-group">
																							 <label>Title</label>
																							 <input type="text" class="form-control" name="title" id="title" value="<?php echo $row['title']  ?>" placeholder="" disabled>
																		 </div>


																		 <div class="form-group">
																			 <label>Summary</label>
																					 <input type="text" class="form-control" name="summary" value="<?php echo $row['summary']  ?>"  id="summary"  placeholder="" disabled>
																		 </div>

																		 <div class="form-group">
																					 <label>Description</label>
																					 <textarea type="text" class="form-control" rows="20"  id="description" disabled><?php echo $row['description']  ?></textarea>
																		 </div>



																				 <div class="form-group">
																					 <label>Features</label>
																						 <textarea type="text" class="form-control" rows="3" name="features" id="features"  placeholder="" disabled><?php echo $row['features']  ?></textarea>
																				 </div>


																							 <div class="form-group">
																								 <label>Bussiness Impact</label>
																									 <textarea type="text" class="form-control" rows="3" name="businessImpact" id="businessImpact"  placeholder="" disabled><?php echo $row['business_impact']  ?></textarea>
																							 </div>

																									<div class="form-group">
																											 <label>Tangible Benefits</label>
																												 <textarea type="text" class="form-control" rows="3"name="tangibleBenefits" id="tangibleBenefits"  placeholder="" disabled> <?php echo $row['tangible_benefits']  ?></textarea>
																										 </div>



														 <!-- RADIO BUTTONS COMMENTED OUT
																										 <label for="radio">Regulation Status</label>
																										 <form action="form-group">

																											 <div class="col-lg-4">
																											 <input type="radio" name="regulated" value=1> Regulated
																										 </div>


																											 <input type="radio" name="regulated" value=2> Nonregulated<br>

																									 </form
														 -->


																										 <div class="form-group">

																			 <br>
																			 <a href="<?php $temp = $row['file'];
																			 		echo $temp;
																				?>">
																			 <label class="label label-primary" style="font-size:15px;">View Uploaded Document</label>

																			 </a>

											</div>
															 <!--RADIO BUTTONS COMMENTED OUT
																											 <label for="radio">Protoype Status</label>
																											 <form action="form-group">

																											 <div class= "col-lg-4">
																											 <input type="radio" name="prototypeagree" value=1> Prototype Agree
																										 </div>

																											 <input type="radio" name="prototypeagree" value=2> Prototype Disagree
															 -->
																										 </form>





											 </div>

								 </div>
								 <div class="modal-footer">
							<div id="star-div">
								<span id="1+<?php echo $row['innovation_id'] ?>" value=1 class="fa fa-star left"></span>
								<span id=" 2+<?php echo $row['innovation_id']?>   " value=2 class="fa fa-star left"></span>
								<span id=" 3+ <?php echo $row['innovation_id']?> " value=3 class="fa fa-star left"></span>
								<span id="  4+<?php echo $row['innovation_id']?> " value=4 class="fa fa-star left"></span>
								<span id="  5+<?php echo $row['innovation_id']?> " value=5 class="fa fa-star left"></span>

							<span name="rating" class="badge left" id="ratingValue-<?php echo $row['innovation_id']?>"  value=0>0</span>
							</div>
									 <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
									 <button type="button" class="btn btn-primary" id="save-<?php echo $row['innovation_id']?>">Update Rating</button>
								 </div>
							 </div>
							</div>
							</div>




							<!-- END WRAPPER -->
							<!-- Javascript -->



							</div>
							</div>
							</div>
						</div></div>
<script>

$(document).ready(function(){

  $("#i-<?php echo $row['innovation_id']?>").click(function(){
    $('#mymodal-<?php echo $row['innovation_id']?>').modal('show');
  }),

	$("#save-<?php echo $row['innovation_id']?>").click(function(){
		var rating = $("#ratingValue-<?php echo $row['innovation_id']?>").val();

		$.ajax({
			 type:"post",
			 url: "updaterating.php",
			data:{
			user:$('#user-id').val(),
			rating:rating,
			innovation_id:<?php echo $row['innovation_id']?>
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
	})
})
});



</script>







<?php

}
}

 ?>


</body>

</html>
