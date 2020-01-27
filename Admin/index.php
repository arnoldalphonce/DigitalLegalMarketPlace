<?php
include '../Database/db.php';
session_start();
ob_start();
?>
<!DOCTYPE html>
<html>
<head>
	<title>Administrator Login</title>
	<link rel="stylesheet" type="text/css" href="../css/bootstrap.min.css">
	<script type="text/javascript" src="../js/bootstrap.min.js"></script>
</head>
<body>
<div class="container">
	 <div class="row">
      <div class="col-sm-9 col-md-7 col-lg-5 mx-auto">
        <div class="card card-signin my-5">
          <div class="card-body">
            <h5 class="card-title text-center">Administrator Sign In</h5>
            <form class="form-signin" method="POST" action="">
              <div class="form-label-group">
              <label for="inputEmail">Email address</label>
                <input type="email" name="email" id="inputEmail" class="form-control" placeholder="Email address" required autofocus>
              </div>

              <div class="form-label-group">
                <label for="inputPassword">Password</label>
                <input type="password" name="password" id="inputPassword" class="form-control" placeholder="Password" required>
              </div>
<br/>
              <div class="form-label-group">
              	<input type="submit" value="Log In" name="login" class="form-control btn btn-primary" required=""/>
              </div>
              <br/>
              <p class="text-center text-danger">
              	<?php
              	if (isset($_POST['login'])) {
              		$email = $_POST['email'];
              		$password = md5($_POST['password']);
              		$select ="SELECT * FROM Admin
              		WHERE email = '$email' AND password = '$password' ";
              		$exe = mysqli_query($link,$select)or die(mysqli_error($link));
              		$result = mysqli_fetch_array($exe);
              		$get = mysqli_num_rows($exe);
              		if ($get > 0) {
              			 $_SESSION['userid'] = $result['admin_id'];
              			header('Location: admin_home.php');
              		}else{
              			echo "Sorry Could Not Log in to your Account";
              		}
              	}
              	?>
              </p>

            </form>
          </div>
        </div>
      </div>
    </div>
	
</div>
</body>
</html>