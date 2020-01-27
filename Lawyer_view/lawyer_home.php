<?php
include "../Database/db.php";
session_start();
ob_start();
 $userid = $_SESSION['lawyerid'];
if(!isset($_SESSION['lawyerid'])){
  header('Location: login.php');
}elseif (isset($_SESSION['lawyerid'])) {
	if ((time() -  $_SESSION['last_activity_timestamp'] ) > 900) { 
	//15 minutes * 60 seconds = 900
		header('Location: signout.php');
	}else{
		echo " ";
	}
}
?>
<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
<title>Welcome to Dlmp</title>
<!-- Load Icon -->
<link rel="icon" type="image/png" href="../users/user_logo.png">

<!-- Bootstrap CDN -->
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
<!-- End Bootstrap CDN -->

<!-- Bootstrap Jquery CDN -->
<!-- For Collapse at Top Not to Work I hide  <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script> -->
<!-- End Bootstrap Jquery CDN-->

<!-- Css Script -->
<link rel="stylesheet" type="text/css" href="../css/bootstrap.min.css">
<link rel="stylesheet" href="../fontawesome/css/all.css">
<link rel="stylesheet" type="text/css" href="../css/other_css/index.css">
<!--End Css Script -->

<!-- Js and Jquery Script -->
<script type="text/javascript" src="../js/bootstrap.min.js"></script>
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
<!--End Js and Jquery Script -->
<!-- Style custom -->
<style type="text/css">
	body{
		background-color: #EDEDED;
	}
</style>
</head>
<body>
<!-- Navigation Bar -->
<?php include 'lawyer_navigation.php';?>
<!--End Navigation Bar -->


<!-- Loader Class Using div -->
<?php include 'loader.php';?>
<!-- End Loader -->

	<div class="container">
	<br/><br/><br/><br/>
<!-- Header with Image -->
<h4 class="text-info">Towards Digitalization Of Services</h4>
<!-- End Header with Image -->
  <br/>
		<div class="col-md-12">
		        <h1 class="text-center" style="color: red;">"Practice Area"</h1>
		</div>
		<!-- Grid for section -->
			<div class="row">
				<div class="col-md-4">
					<img src="images/business.png" class="img img-thumbnail">
					<h3 class="text text-center">Business Law</h3>
					<hr/>
				</div>
				<div class="col-md-4">
					<img src="images/criminal.png" class="img img-thumbnail">
					<h3 class="text text-center">Criminal Law</h3>
					<hr/>
				</div>
				<div class="col-md-4">
					<img src="images/divorce.jpg" class="img img-thumbnail">
					<h3 class="text text-center">Divorce Law</h3>
					<hr/>
				</div>
				<div class="col-md-4">
					<img src="images/insurance.jpg" class="img img-thumbnail">
					<h3 class="text text-center">Insurance Law</h3>
				</div>
				<div class="col-md-4">
					<img src="images/immigration.jpeg" class="img img-thumbnail">
					<h3 class="text text-center">Immigration Law</h3>
				</div>
				<div class="col-md-4">
					<img src="images/legal_advice.jpg" class="img img-thumbnail">
					<h3 class="text text-center">Legal Advice</h3>
				</div>
			</div>
			<!-- End Grid for section -->
		<!-- Section Motivation -->
	            <div class="col-md-12">
		        <p class="text-center" style="font-size: 40px;">
		           " Feeling Connected "<br/>
		            Don't Miss The <span style="color: red;">To Talk To Us .</span>
		        </p>
		</div>
	</div>
		<!-- Bottom Footer -->
	  	<footer>
	       <?php include'../footer.php'; ?>
	     	</footer>
	<!-- End Bottom Footer -->
	</body>
</html>