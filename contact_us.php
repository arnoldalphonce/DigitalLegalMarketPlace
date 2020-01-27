<?php
include 'Database/db.php';
?>
<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
<title>Dlmp contact us</title>
<!-- Load Title Icon -->
<link rel="icon" type="image/png" href="users/user_logo.png">
<!-- #### End Load Title Icon ###### -->

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

<!-- Custom style sheet -->
<style type="text/css">
	body{
		background-color: #EDEDED;
	}
body, html {
  height: 100%;
  margin: 0;
}
</style>
<!-- Custom style sheet -->
</head>
<body>
<!-- Navigation Bar -->
<?php include 'navigation_new.php';?>
<!--End Navigation Bar -->

<!-- Loader Class Using div -->
<?php include 'loader.php';?>
<!-- End Loader -->

<br/><br/><br/><br/>
	<div class="container">
	<!-- Contact us form for Non Registered Clients -->
		<form method="POST" action="">
		<h3 class="text-center text-uppercase" style="font-family: roboto;color: black;"> How can we take a stand for you?</h3>
			<div class="form-group">
				<label for="firstName"> Full Name <i class="fas fa-asterisk" style="color: red;font-size: 10px;"></i></label>
				<input type="text" class="form-control text-capitalize" placeholder="Ex: Bravely Alphonce" name="fullname" required="">
			</div>
			
			<div class="form-group">
				<label for="email"> E-mail <i class="fas fa-asterisk" style="color: red;font-size: 10px;"></i></label>
				<input type="email" class="form-control" placeholder="Ex: me@example.com" name="email" required="">
			</div>
			<div class="form-group">
				<label for="mobile"> Subject <i class="fas fa-asterisk" style="color: red;font-size: 10px;"></i></label>
				<input type="text" class="form-control text-capitalize" placeholder="Ex: Case Inqury" name="subject" required="">
			</div>
			<div class="form-group">
				<label for="region"> Message <i class="fas fa-asterisk" style="color: red;font-size: 10px;"></i>
				</label>
				<textarea placeholder="Tell us what happend..." class="form-control" name="message" required="" rows="8"></textarea>
			</div>
		

			<!-- Submit button -->
			<button name="contact" type="submit" class="btn btn-primary" style="width: 100%;padding: 15px;">CONTACT NOW</button>
			<p>
				<?php
					if (isset($_POST['contact'])) {
						$fullname = $_POST['fullname'];
						$email = $_POST['email'];
						$subject = $_POST['subject'];
						$message = $_POST['message'];

					// Insert into contact data filled into Database
						$insert = "INSERT INTO Contacts(fullname,email,subject,message)
						VALUES('$fullname','$email','$subject','$message')";
						$run = mysqli_query($link,$insert)or die(mysqli_error($link));
						if ($run) {
							echo '<script language="javascript" >';
							echo 'alert("Thank you for Contacting Us, We will get back to you Soon")';
							echo '</script>';
						}else{
							echo '<script language="javascript" >';
							echo 'alert("Sorry!!! Message Failed. Try Again")';
							echo '</script>';
						}
					}
				?>
			</p>
		</form>
		<!-- ##### Contact us form for Non Registered Clients ###### -->
	</div>
	<!-- ###### Container div ######## -->
<br/><br/>
<!-- Footer Bottom -->
     <footer>
       <?php include'footer.php'; ?>
     </footer>
<!-- Ends Footer Bottom -->

</body>
</html>