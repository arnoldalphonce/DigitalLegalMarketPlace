<?php
include "../Database/db.php";
session_start();
 $userid = $_SESSION['userid'];

if(!isset($_SESSION['userid'])){
  header('Location: index.php');
}
?>
<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
<title>Welcome to Admin DashBoard</title>

<!-- Bootstrap CDN -->
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
<!-- End Bootstrap CDN -->

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
<?php include 'admin_navigation.php';?>
<!--End Navigation Bar -->

<br/><br/>

<!-- Header with Image -->
<?php include 'header.php'; ?>
<!-- End Header with Image -->
	<div class="container">
  <hr/>
  		<h2 class="text-info text-center">Manage All In Simple Easy Steps</h2>
  		<div class="row">
  			<div class="col-md-3">
  			<!-- Count for Customer Information -->
		  		<?php
			                      $count = "SELECT COUNT(*) FROM Customer";
			                      $do = mysqli_query($link,$count)or die(mysqli_error($link));
			                      $showCount = mysqli_fetch_array($do);
		                       ?>
  				<h3 class="card bg-danger text-center text-white" style="padding: 20px;"><i class="fas fa-user" style="color: black;"></i> Total Customer <br/><?php echo $showCount[0]; ?></h3>

  			</div>

  			<div class="col-md-3">
  			<!-- Count for Lawyers Information -->
		  		<?php
			                      $count = "SELECT COUNT(*) FROM Lawyer";
			                      $do = mysqli_query($link,$count)or die(mysqli_error($link));
			                      $showCount = mysqli_fetch_array($do);
		                       ?>
  				<h3 class="card bg-info text-center text-white" style="padding: 20px;"><i class="fas fa-user" style="color: black;"></i> Total Lawyers <br/><?php echo $showCount[0]; ?></h3>

  			</div>

  			<div class="col-md-3">
  			<!-- Count for Evaluation Information -->
		  		<?php
			                      $count = "SELECT COUNT(*) FROM testimonial";
			                      $do = mysqli_query($link,$count)or die(mysqli_error($link));
			                      $showCount = mysqli_fetch_array($do);
		                       ?>
  				<h3 class="card bg-danger text-center text-white" style="padding: 20px;"><i class="fas fa-info" style="color: black;"></i> Evaluation Made <br/><?php echo $showCount[0]; ?></h3>

  			</div>

  			<div class="col-md-3">
  			<!-- Count for Contacts Information -->
		  		<?php
			                      $count = "SELECT COUNT(*) FROM Contacts";
			                      $do = mysqli_query($link,$count)or die(mysqli_error($link));
			                      $showCount = mysqli_fetch_array($do);
		                       ?>
  				<h3 class="card bg-info text-center text-white" style="padding: 20px;"><i class="fas fa-info" style="color: black;"></i> Contacts <br/><?php echo $showCount[0]; ?></h3>

  			</div>
  			
  		</div>
  		<!-- End Row Div -->
  		<br/>
  		<!-- Forms Begins here -->
  		<div class="row">
  			<div class="col-md-6">
  				<form method="POST" action="">
  				<h4 class="text-info">Add New Administrator</h4>
  					<div class="form-group">
  						<label for="fullname">Full Name</label>
  						<input name="fullname" type="text" placeholder="Enter full name" class="form-control text-capitalize" required=""></input>
  					</div>
  					<div class="form-group">
  						<label for="email">E-mail</label>
  						<input name="email" type="email" placeholder="Enter email" class="form-control" required=""></input>
  					</div>
  					<div class="form-group">
  						<label for="password">Password</label>
  						<input type="password" id="psw" placeholder="Enter Password" name="password" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" class="form-control" title="Must contain at least one number and one uppercase and lowercase letter, and at least 8 or more characters" required>
  					</div>
  					<div class="form-group">
  						<input name="addNew" type="submit" value="ADD NEW" class="btn btn-primary"></input>
  					</div>
  					<!-- Php for Add New Administrator -->
  					<?php
  					if (isset($_POST['addNew'])) {
  						$fullname = $_POST['fullname'];
  						$email = $_POST['email'];
  						$password = md5($_POST['password']);
  						// Perfome Insert
  						$insert = "INSERT INTO Admin(fullname,email,password)VALUES('$fullname','$email','$password')";
  						$run = mysqli_query($link,$insert)or die(mysqli_error($link));
  						if ($run) {
  							echo '<script language="javascript" >';
							echo 'alert("Administrator Account Successful Created .")';
							echo '</script>';
  						}else{
  							echo '<script language="javascript" >';
							echo 'alert("Sorry!!! Failed Creating Account .")';
							echo '</script>';
  						}
  					}
  					?>
  					
  				</form>
  				
  			</div>
  		<!-- End First form ADD -->
  			<div class="col-md-6">
  				<form method="POST" action="">
  				<!-- Getting Admin information -->
  	<?php
  	// query
  	$customerInfo = "SELECT fullname 
  	FROM Admin
  	WHERE admin_id = '$userid' ";
  	$run = mysqli_query($link,$customerInfo)or die(mysqli_error($link));
  	$display = mysqli_fetch_array($run);
  	?>
  				<h4 class="text-info">Update Administrator Details</h4>
  					<div class="form-group">
  						<label for="fullname">Full Name</label>
  						<input name="fullname" type="text" placeholder="<?php echo $display['fullname']; ?>" class="form-control text-capitalize" readonly=""></input>
  					</div>
  					<div class="form-group">
  						<label for="email">E-mail</label>
  						<input name="email" type="email" placeholder="Enter email" class="form-control"></input>
  					</div>
  					<div class="form-group">
  						<label for="password">Password</label>
  						<input name="password" type="password" placeholder="Enter password" class="form-control"></input>
  					</div>
  					<div class="form-group">
  						<input name="Update" type="submit" value="UPDATE" class="btn btn-primary"></input>
  					</div>

  					<!-- Php for Update  Administrator Details -->
  					<?php
  					if (isset($_POST['Update'])) {
  						$email = $_POST['email'];
  						$password = md5($_POST['password']);
  						// Perfome Insert
  						$update = "UPDATE AdminP SET email = '$email',password = '$password'
  						WHERE admin_id = '$userid' ";
  						$exe = mysqli_query($link,$update)or die(mysqli_error($link));
  						if ($exe) {
  							echo '<script language="javascript" >';
							echo 'alert(" Successful Updating Details .")';
							echo '</script>';
  						}else{
  							echo '<script language="javascript" >';
							echo 'alert("Sorry!!! Failed Updating Account .")';
							echo '</script>';
  						}
  					}
  					?>
  					
  				</form>
  				
  			</div>
  			
  		</div>
  		<!-- End Second form ADD -->
 </div>
 <!-- End Container -->
 		<!-- Bottom Footer -->
	  	<footer>
	       <?php include'../footer.php'; ?>
	     	</footer>
	<!-- End Bottom Footer -->
 </body>
 </html>