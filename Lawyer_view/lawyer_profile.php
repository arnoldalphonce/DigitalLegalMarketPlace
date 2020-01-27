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
<title>Lawyer profile</title>
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

</head>
<body>
<!-- Navigation Bar -->
<?php include 'lawyer_navigation.php';?>
<!--End Navigation Bar -->

<br/><br/>
<!-- Loader Class Using div -->
<?php include 'loader.php';?>
<!-- End Loader -->


	<div class="container">
  <hr/>
  	<div class="row">
  	<!-- Getting customer information -->
  	<?php
  	// query
  	$customerInfo = "SELECT firstname,lastname,region,mobile 
  	FROM Lawyer
  	WHERE lawyer_id = '$userid' ";
  	$run = mysqli_query($link,$customerInfo)or die(mysqli_error($link));
  	$display = mysqli_fetch_array($run);
  	?>
  		<div class="col-md-6">
  		<h4 class="text-dark">Manage your Account</h4>
  		<!-- Card Profile -->
  		<div class="card" style="width: auto;">
  			<img src="images/business.png" class="img img-fluid" style="height: 200px;width: 100%;">
  			<div class="card-header">
  				<h4 class="text-center text-capitalize">
  				<?php echo $display['firstname']; ?>&nbsp<?php echo $display['lastname']; ?></h4>
  				<h5 class="text-center text-capitalize"><?php echo $display['region']; ?></h5>
  				<h6 class="text-center"><?php echo $display['mobile']; ?></h6>

  			</div>
  			
  		</div>
  		</div>
  		<!-- Right column for details update -->
	  	<div class="col-md-6">
	  		<h4 class="text-center text-dark">Update Account Details</h4>
	  		<h6 class="text-center text-primary">*** Fill the details and Update easy ***</h6>
	  		<div class="card-light">
	  			<form method="post" action="">
	  			<h6 class="text-center text-danger">
	  			<?php
	  			if (isset($_POST['update'])) {
	  				$Email = $_POST['email'];
	  				$password = md5($_POST['password']);
	  				$confirm = md5($_POST['confirm']);
	  				// Perform email verification
	  				// query
  	$customerInfo = "SELECT email 
  	FROM Lawyer
  	WHERE lawyer_id = '$userid' ";
  	$get = mysqli_query($link,$customerInfo)or die(mysqli_error($link));
  	$email = mysqli_fetch_array($get);
	  				if ($email['email'] == $Email && $password == $confirm) {
	  				// Update details via email verification
	  				$update = "UPDATE Lawyer 
	  				SET password = '$password',email = '$Email'
	  				WHERE lawyer_id = '$userid' ";
	  				$execute = mysqli_query($link,$update)or die(mysqli_error());
	  				echo "Password Successful Updated";
	  			}else{
	  				echo "Sorry!!! Could not update. Try again...";
	  			}
	  		}
	  			
	  			?>
	  			</h6>
	  				<h6 class="text-dark">Create New Password</h6>
	  				<div class="form-group">
	  					<label for="password">E-mail <span class="text-success">(Your Account E-mail address)</span></label>
	  					<input type="email" name="email" placeholder="Ex. me@example.com" class="form-control" required="">
	  					</input>
	  				</div>
	  				<div class="form-group">
	  					<label for="password">New password</label>
	  					<input type="password" id="psw" placeholder="Enter Password" name="password" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" class="form-control" title="Must contain at least one number and one uppercase and lowercase letter, and at least 8 or more characters" required>
	  				</div>
	  				<div class="form-group">
	  					<label for="password">Confirm password</label>
	  					<input type="password" id="psw" placeholder="Enter Password" name="confirm" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" class="form-control" title="Must contain at least one number and one uppercase and lowercase letter, and at least 8 or more characters" required>
	  				</div>
	  				<div class="form-group">
	  					<input type="submit" name="update" value="UPDATE" class="btn btn-primary" readonly="">
	  					</input>
	  				</div>
	  			</form>
	  			<p class="text text-dark"><i class="fas fa-asterisk" style="color: red;"></i> If the above details are Incorrect or not yours please Contact 
	  			<a href="mailto:autodlmp@gmail.com">Administrator</a>
	  			</p>
	  		</div>
	  	</div>
  	</div>
  	

	</div>
	<br/>
	<!-- End Container -->
  	<!-- Bottom Footer -->
	  	<footer>
	       <?php include'../footer.php'; ?>
	     	</footer>
	<!-- End Bottom Footer -->
  </body>
  </html>