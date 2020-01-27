<?php
ob_start();
include "Database/db.php";
?>
<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
<title>Lawyer Getting started now</title>
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
<br/><br/><br/><br/>
<h3 class="text-center text-uppercase" style="font-family: roboto;color: black;"> CREATE A FREE ACCOUNT FAST AND EASY</h3>

<!-- Loader div -->
<?php include 'loader.php';?>
<!-- End Loader -->
	<div class="container">
	<!-- Lawyer Sign Up Form -->
		<form method="POST" action="" enctype="multipart/form-data">
		<h3 class="text text-danger text-center">
			<?php
/*
*php code for processing the file upload begins here
*/
//we get the name, size, type and temporary directory of the file

if (isset($_POST['register'])){

$name = $_FILES["file"]["name"];
$size = $_FILES["file"]["size"];
$type = $_FILES["file"]["type"];
/*
Lawyers details filled in
*/
$firstname = $_POST['firstname'];
$lastname = $_POST['lastname'];
$gender = $_POST['sex'];
$status = $_POST['status'];
$email = $_POST['email'];
$mobile = $_POST['mobile'];
$region = $_POST['region'];
$aboutme = $_POST['aboutme'];
$password = md5($_POST['password']);
/*
End Lawyers details filled in
*/

//now we get the temporary location of the file
$temp_name = $_FILES["file"]["tmp_name"];

//creating an if statement to check whether name is empty or not
if (!empty($name)) {
	//we move the file into a folder
	$location = 'lawyers/';

	//creating a move upload file to the folder
	if(move_uploaded_file($temp_name, $location.$name)){
	}else{
		echo " ";
	}
 }else{
 	echo "Please Fill The Required Information . ";
 }
	 		/*
	*We now begin a query to insert the infomation into the database
	*/
	// Check if account already exist
            	$selectClients = "SELECT * FROM Lawyer WHERE email = '$email' ";
            	$getClients = mysqli_query($link,$selectClients);
            	// Check email existence using If
            	if (mysqli_num_rows($getClients) > 0 ) {
            		echo '<script langage="javascript">';
            		echo 'alert("Sorry!!! Account Already Exist or Invalid email .")';
            		echo '</script>';
            	}else{
            		// Insert Lawyer data to the database
	$query = "INSERT INTO Lawyer (firstname,lastname,sex,status,email,mobile,region,about_me,image_link,password) VALUES ('$firstname','$lastname','$gender','$status','$email','$mobile','$region','$aboutme','$name','$password')";

	/*
	*We pass the query into the connection using mysqli query function
	*/

	$execute = mysqli_query($link,$query) or die(mysqli_error($link));
	if ($execute) {
		header('Location: Lawyer_view/login.php');
	}else{
		echo '<script langage="javascript">';
            		echo 'alert("Sorry!!! Failed Creating Account .")';
            		echo '</script>';
	}
	}	
}//End If
 ?>
 </h3>
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
		<h5><i class="fas fa-handshake" style="color: red;"></i> One Last Step !!! Almost Done...</h5>
			<div class="form-group">
				<label for="region"> Status / Expert In</label>
				<input type="text" class="form-control" placeholder="Ex: Business Law" name="status" required="">
			</div>
			<div class="form-group">
				<label for="gender"> Gender</label>
				<select name="sex" class="form-control" required="">
					<option>Male</option>
					<option>Female</option>
				</select>
			</div>
			<div class="form-group">
				<label for="region"> About Me <i class="fas fa-asterisk" style="color: red;"></i></label>
				<textarea rows="2" class="form-control" name="aboutme" placeholder="Tell us brief about yourself" required=""></textarea>
			</div>
			<div class="form-group">
				<i class="fas fa-asterisk" style="color: red;"></i> <label for="age"> Profile Picture</label>
				<input type="file" class="" name="file" required="">
			</div>
			<div class="form-group">
				<label for="password"> Password</label>
				<input type="password" id="psw" placeholder="Enter Password" name="password" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" class="form-control" title="Must contain at least one number and one uppercase and lowercase letter, and at least 8 or more characters" required>
			</div>
			<!-- Policy  -->
			<p><i class="fas fa-asterisk" style="color: red;"></i> By Submitting this form you agree with the ( Terms and condition ) of using this service as our customer. Do not send confidential or time-sensitive information through this Form. </p>
			<!-- End Policy -->
			<!-- Submit button -->
			<button name="register" type="submit" class="btn btn-primary" style="width: 100%;padding: 15px;">REGISTER NOW</button>
		</form>
<!--##### End Lawyer Form ##### -->
	</div>
<!-- End Container -->

<br/><br/>
<!-- Footer Bottom -->
     <footer>
       <?php include'footer.php'; ?>
     </footer>
<!-- Ends Footer Bottom -->

</body>
</html>