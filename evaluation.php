<?php
include "Database/db.php";
header("Cache-Control: no cache");
session_cache_limiter("private_no_expire");
?>
<!DOCTYPE html>
<html>
<head> 
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
<title>Dlmp reputation giveway</title>
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
		<h3 class="text-center" style="font-family: roboto;color: darkred;"> Evaluation For Service Appreciation.</h3>
		<h6>*** By writing and submitting this Evaluation form. You agree and approve that "This information was kindly written by you as our customer.  ***</h6>
			<div class="form-group">
				<label for="firstName"> Customer Full Name </label>
				<input type="text" class="form-control" placeholder="Enter Full name">
			</div>
			
			<div class="form-group">
				<label for="email"> Customer E-mail</label>
				<input type="email" class="form-control"  placeholder="Enter e-mail address">
			</div>
			<div class="form-group">
				<label for="mobile"> Customer Address </label>
				<input type="text" class="form-control"  placeholder="Ex. Mwanza">
			</div>
			<!-- Question Evaluation -->
		
			<ol>
				<li>How do you rate service offered by this system?</li>

			<div class="form-check-inline">
				<label class="form-check-label">
				    <input type="radio" class="form-check-input" name="choice" value="Unsatisfactory">Unsatisfactory
				  </label>
			</div>
				<div class="form-check-inline">
					<label class="form-check-label">
					<input type="radio" class="form-check-input" name="choice" value="Satisfactory">Satisfactory
					</label>
				</div>
			<div class="form-check-inline">
				  <label class="form-check-label">
				    <input type="radio" class="form-check-input" name="choice" value="Good">Good
				  </label>
			</div>
			<div class="form-check-inline">
				  <label class="form-check-label">
				    <input type="radio" class="form-check-input" name="choice" value="Very Good">Very Good
				  </label>
			</div>
			<div class="form-check-inline">
				  <label class="form-check-label">
				    <input type="radio" class="form-check-input" name="choice" value="Excellent">Excellent
				  </label>
			</div>
			</ol>
		
			<!-- Ends Question Evaluation -->
			<div class="form-group">
				<label for="region"> Leave your Comment ( Optional )
				</label>
				<textarea placeholder="Type your comment here...." class="form-control" name="review" rows="2" name="review"></textarea>
			</div>
		<p class="text text-success text-center">
			<?php
	if (isset($_POST['send_review'])) {
		$firstname =  $result['firstname'];
		$lastname =  $result['lastname'];
		$review = $_POST['review'];
		$rating = $_POST['choice'];
		$sent_date = date('Y-m-d');
		// creating an insert query
		$query = "INSERT INTO testimonial(firstname,lastname,service_rating,review,sent_date,sent_time) VALUES('$firstname','$lastname','$rating','$review','$sent_date',now())";
		$execute = mysqli_query($link,$query)or die(mysqli_error($link));
		if (!$execute) {
			echo "Sorry !!! We could not Submit your Request . Seems You Already Make a Review ";
		}else{
			echo "Thank You !!! For Your Reputation . We Glad To Have You As Our Customer";
		}
	}
		?>
		</p>

			<!-- Submit button -->
			<button name="send_review" type="submit" class="btn btn-primary" style="width: 100%;padding: 15px;">SUBMIT REVIEW</button>
		<br/><br/>
		<h6 class="text-primary" style="font-family: Roboto;"> *** Dlmp Review Can Only Be Submitted Once .</h6>
		</form>
	</div>

<br/><br/>
<!-- Footer Bottom -->
     <footer>
       <?php include'footer.php'; ?>
     </footer>
<!-- Ends Footer Bottom -->

</body>