<?php
include "Database/db.php";
session_start();
if (isset($_SESSION['userid'])) {
$userid = $_SESSION['userid'];

}elseif(!isset($_SESSION['userid'])){
   header('Location: login.php');
}
?>
<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
<title>Welcome to Digital legal marketPlace</title>
<link rel="icon" type="image/png" href="users/user_logo.png">
<!-- Bootstrap CDN -->
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
<!-- End Bootstrap CDN -->

<!-- Bootstrap Jquery CDN -->
<!-- For Collapse at Top Not to Work I hide  <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script> -->
<!-- End Bootstrap Jquery CDN-->

<!-- Css Script -->
<link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
<link rel="stylesheet" href="fontawesome/css/all.css">
<link rel="stylesheet" type="text/css" href="css/other_css/index.css">
<!--End Css Script -->

<!-- Js and Jquery Script -->
<script type="text/javascript" src="js/bootstrap.min.js"></script>
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
<!--End Js and Jquery Script -->

</head>
<body>
<!-- Navigation Bar -->
<?php include 'navigation.php';?>
<!--End Navigation Bar -->

<br/><br/>

<!-- Header with Image -->
<?php include 'custom_header.php'; ?>
<!-- End Header with Image -->
<!-- Loader Class Using div -->
<?php include 'loader.php';?>
<!-- End Loader -->

	<div class="container">
	<br/>
  <!-- Live Search And Motivation Top -->
	  	<div class="col-md-12">
		        <?php 
		            include 'search.php';
		         ?>
	            </div>
<!-- End Live Search And Motivation Top -->

	            <!-- Section Motivation -->
	            <div class="col-md-12">
		        <p class="text-center" style="font-size: 40px;">
		           " Feeling Connected "<br/>
		            Don't Miss The <span style="color: red;">To Talk To Us .</span>
		        </p>
		</div>
  	</div>
  	<!-- End Container -->
  	<!-- Bottom Footer -->
	  	<footer>
	       <?php include'footer.php'; ?>
	     	</footer>
	<!-- End Bottom Footer -->
</body>
</html>