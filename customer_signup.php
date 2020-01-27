<?php
ob_start();
include 'Database/db.php';
?>
<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
<title>Client Getting started now</title>
<!-- Load Icon -->
<link rel="icon" type="image/png" href="users/user_logo.png">
<!-- Bootstrap CDN -->
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
<!-- End Bootstrap CDN -->

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
<style type="text/css">
	body{
		background-color: #EDEDED;
	}
</style>
</head>

<body>

<!-- Navigation Bar -->
<?php include 'navigation_new.php';?>
<!--End Navigation Bar -->

<br/><br/>

<!-- Header with Image -->

<!-- End Header with Image -->
<!-- Loader Class Using div -->
<?php include 'loader.php';?>
<!-- End Loader -->

	<div class="container">
	<br/><br/>
		<form method="POST" action="">
		<h3 class="text-center text-uppercase" style="font-family: roboto;color: black;"> CREATE A FREE ACCOUNT FAST AND EASY</h3>
		<h5><i class="fas fa-asterisk" style="color: red;"></i> Fill The Below Details</h5>
			<div class="form-group">
				<label for="firstName"> First Name</label>
				<input type="text" class="form-control" placeholder="Enter First name" name="firstname" required="">
			</div>
			<div class="form-group">
				<label for="lastName"> last Name</label>
				<input type="text" class="form-control" placeholder="Enter Last name" name="lastname" required="">
			</div>
			<div class="form-group">
				<label for="Username"> Username</label>
				<input type="text" class="form-control" placeholder="Enter Username" name="username" required="">
			</div>
			<div class="form-group">
				<label for="email"> E-mail</label>
				<input type="email" class="form-control" placeholder="Ex: me@example.com" name="email" required="">
			</div>
			<div class="form-group">
				<label for="mobile"> Mobile</label>
				 <input type="tel" pattern="^\d{10}$" required="" placeholder="Ex: 0714014040" name="mobile" title="Must start with 0 Example: 0712345678 " maxlength="10" class="form-control">
				
			</div>
			<div class="form-group">
				<label for="region"> Region</label>
				<input type="text" class="form-control" placeholder="Ex: Mwanza" name="region" required="">
			</div>
		<h5><i class="fas fa-handshake" style="color: red;"></i> Last Step !!! Almost Done...</h5>
			<div class="form-group">
				<label for="age"> Age</label>
				<input type="text" class="form-control" placeholder="18" name="age" required="" maxlength="2">
			</div>
			<div class="form-group">
				<label for="gender"> Gender</label>
				<select name="sex" class="form-control" required="">
					<option>Male</option>
					<option>Female</option>
				</select>
			</div>
			<div class="form-group">
				<label for="password"> Password</label>
				 <input type="password" id="psw" placeholder="Enter Password" name="password" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" class="form-control" title="Must contain at least one number and one uppercase and lowercase letter, and at least 8 or more characters" required>
			</div>
			<p class="text text-danger">
				<?php 
		if (isset($_POST['register'])) {
			$firstname = $_POST['firstname'];
			$lastname = $_POST['lastname'];
			$username = $_POST['username'];
			$email = $_POST['email'];
			$mobile = $_POST['mobile'];
			$region = $_POST['region'];
			$dateofbirth = $_POST['age'];
			$gender = $_POST['sex'];
			$password = md5($_POST['password']);
			
            //Validate Age For 18 years and Above
            if($dateofbirth >= '18'){
            	// Check if account already exist
            	$selectClients = "SELECT * FROM Customer WHERE email = '$email' ";
            	$getClients = mysqli_query($link,$selectClients);
            	// Check email existence using If
            	if (mysqli_num_rows($getClients) > 0 ) {
            		echo '<script langage="javascript">';
            		echo 'alert("Sorry!!! Account Already Exist or Invalid email .")';
            		echo '</script>';
            	}else{
			// Perform Client Registration Query
			$register = "INSERT INTO Customer(firstname,lastname,username,sex,dateofbirth,mobile,email,region,password) VALUES('$firstname','$lastname','$username','$gender','$dateofbirth','$mobile','$email','$region','$password')";
			// Execute Client Registration Query
			$execute = mysqli_query($link,$register);
            //Test if Query Executed Successful
			if (!$execute) {
				echo "Your Form has Encountered a Problem";
			}else{
				echo '<script language="javascript" >';
				echo 'alert("Welcome To Dlmp, Click Ok to Log In .")';
				echo '</script>';
				header('Location: login.php');
			}
        }
        }else{
                echo '<script language="javascript" >';
				echo 'alert("Sorry!!! You must be 18 and Above years Old.")';
				echo '</script>';
            }

}
?>
			</p>

			<!-- Submit button -->
			<button name="register" type="submit" class="btn btn-primary" style="width: 100%;padding: 15px;">REGISTER NOW</button>
		</form>
	</div>

<br/><br/>
<!-- Footer Bottom -->
     <footer>
       <?php include'footer.php'; ?>
     </footer>
<!-- Ends Footer Bottom -->

</body>