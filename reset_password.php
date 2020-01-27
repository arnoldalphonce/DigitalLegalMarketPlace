<?php 
include 'Database/db.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<title>Dlmp reset Account</title>
	<!-- Load Icon -->
<link rel="icon" type="image/png" href="users/user_logo.png">
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">	
	<link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
	<script type="text/javascript" src="js/bootstrap.min.js"></script>
	<link rel="stylesheet" type="text/css" href="fonts/font-awesome-4.7.0/css/font-awesome.min.css">
<!--===============================================================================================-->	

</head>
<body>
	<!-- Loader Class Using div -->
<?php include 'loader.php';?>
<!-- End Loader -->
	<div class="container">	
	<div class="row h-75 justify-content-center align-items-center">
				<form method="POST" action="">
				<br/><br/>
						<h1 class="text-center">Welcome To Dlmp</h1>
					
					<img src="logo/my_logo.png" width="200px" height="150" style="margin-left: 50px;">
					<div class="form-group">
						<input class="form-control" type="text" name="currentEmail" placeholder="Enter account Email" style="width: 330px;" required="">
					</div>
					
					<div class="form-group">
						<input class="form-control" type="password" name="newPassword" placeholder="Enter Password" style="width: 330px;" required="">	
					</div>
					<div class="form-group">
						<input class="form-control" type="password" name="conPassword" placeholder="Confirm Password" style="width: 330px;" required="">	
					</div>
					<p class="text text-danger">
						<?php
		if (isset($_POST['reset'])) {
			$user = $_POST['currentEmail'];
			$newPassword = md5($_POST['newPassword']);
			$conPassword = md5($_POST['conPassword']);
		// getting users
		$query = "SELECT * FROM Customer WHERE email = '$user' ";
		$execute = mysqli_query($link,$query) or die(mysql_error());
		$result = mysqli_fetch_array($execute);
			 if ($result['email'] != $user) {
			 	echo "Sorry!!! Account does not exist.".'<br/>'. "Enter a Valid e-mail";
		    }elseif ($newPassword == $conPassword) {
		    	// perform update of password now
		    	$update = "UPDATE Customer SET password = '$conPassword'
		    	WHERE email = '$user' ";
		    	$performUpdate = mysqli_query($link,$update)or die(mysqli_error($link));
		    	if ($performUpdate) {
		    		echo "Password Successful Updated . ";
		    	}else{
		    		echo "Error Updating Password, try again . ";
		    	}
		    }else{
		    	echo "Sorry!!! Password did not match .";
		    
		}
	 }
?>
						
					</p>

					<div class="form-group">
						<button class="btn btn-primary form-control" name="reset" style="width: 330px;padding: 10px;margin-left: 0px;">
							RESET
						</button>
					</div>
					<div class="form-group">
						<a class="btn btn-outline-dark" href="login.php" style="width: 330px;padding: 10px;">
							LOGIN NOW
						</a>
					</div>
				</form>
				
				</div>
		</div>
</body>
</html>