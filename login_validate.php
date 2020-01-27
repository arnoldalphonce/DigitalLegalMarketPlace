<?php 
include 'Database/db.php';
session_start();
ob_start();
?>
<!DOCTYPE html>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta charset="UTF-8">
  <link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
  <script type="text/javascript" src="js/bootstrap.min.js"></script>
  <link rel="stylesheet" type="text/css" href="fonts/font-awesome-4.7.0/css/font-awesome.min.css">
<!--===============================================================================================-->  
<style>
/* Style all input fields */
input {
  width: 100%;
  padding: 12px;
  border: 1px solid #ccc;
  border-radius: 4px;
  box-sizing: border-box;
  margin-top: 6px;
  margin-bottom: 16px;
}

/* Style the submit button */


/* Style the container for inputs */
.container {
  background-color: #fff;
  padding: 20px;
}

/* The message box is shown when the user clicks on the password field */
#message {
  display:none;
  background: #fff;
  color: #000;
  position: relative;
  padding: 20px;
  margin-top: 10px;
}
input[type="submit"]{
  background-color: #4056ee;
  color: white;
}

#message p {
  padding: 10px 35px;
  font-size: 14px;
}

/* Add a green text color and a checkmark when the requirements are right */
.valid {
  color: green;
}

.valid:before {
  position: relative;
  left: -35px;
  content: "✔";
}

/* Add a red text color and an "x" when the requirements are wrong */
.invalid {
  color: red;
}

.invalid:before {
  position: relative;
  left: -35px;
  content: "✖";
}
</style>
</head>
<body>
<!-- Loader Class Using div -->
<?php include 'loader.php';?>
<!-- End Loader -->
<br/>
<div class="container">
<div class="row h-75 justify-content-center align-items-center">
  <form action="" method="POST">
  <br/><br/>
            <h3 class="text-center">Legal Market Place</h3>
          <img src="logo/my_logo.png" width="200px" height="150" style="margin-left: 50px;">
          <!-- End Header Form --><br/>
    <label for="usrname">Email address</label>
    <input type="email" id="usrname" name="email" placeholder="Enter email address" required>

    <label for="psw">Password</label>
    <input type="password" id="psw" placeholder="xxxxxxxxxx" name="password" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" title="Must contain at least one number and one uppercase and lowercase letter, and at least 8 or more characters" required>

    <!-- PHP Login Validate -->
          <p class="text text-danger">
            <?php
    if (isset($_POST['signin'])) {
      $user = $_POST['email'];
      $password = md5($_POST['password']);
    // getting users
    $query = "SELECT * FROM Customer WHERE email = '$user' AND  password = '$password'";
    $execute = mysqli_query($link,$query) or die(mysqli_error($link));
    $result = mysqli_fetch_array($execute);
     //check the result by counting the rows
    $num = mysqli_num_rows($execute);
       if ($num != 0) {
        $_SESSION['userid'] = $result['customer_id'];
        // Getting time count after login
        $_SESSION['last_activity_timestamp'] = time(); 
        
      header("location: customer_home.php");
        
      }else{
        echo "* Invalid email address or password *";
      }
  }
?>
            
          </p>

          <!-- Visibility Password -->
          <input type="checkbox" onclick="visibility()" class="mb-3"> Show Password
    <input type="submit" value="SIGN IN" name="signin" >
    <ul style="margin-top: 0px;">
            <li class="list-group">
              <a href="reset_password.php" >
                Forgot  Password?
              </a>
            </li>
            <li class="list-group">   
            <span class="text-primary">Don’t have an account? <a href="customer_signup.php" > Sign up Now</a></span>
            </li>
          </ul>

  </form>
  <!-- End form -->
  </div>

<div id="message">
  <h6 class="text-info">Password must contain the following:</h6>
  <p id="letter" class="invalid">A <b>lowercase</b> letter</p>
  <p id="capital" class="invalid">A <b>capital (uppercase)</b> letter</p>
  <p id="number" class="invalid">A <b>number</b></p>
  <p id="length" class="invalid">Minimum <b>8 characters</b></p>
</div>
</div>
			<!-- End Container  -->
<script>
var myInput = document.getElementById("psw");
var letter = document.getElementById("letter");
var capital = document.getElementById("capital");
var number = document.getElementById("number");
var length = document.getElementById("length");

// When the user clicks on the password field, show the message box
myInput.onfocus = function() {
  document.getElementById("message").style.display = "block";
}

// When the user clicks outside of the password field, hide the message box
myInput.onblur = function() {
  document.getElementById("message").style.display = "none";
}

// When the user starts to type something inside the password field
myInput.onkeyup = function() {
  // Validate lowercase letters
  var lowerCaseLetters = /[a-z]/g;
  if(myInput.value.match(lowerCaseLetters)) {  
    letter.classList.remove("invalid");
    letter.classList.add("valid");
  } else {
    letter.classList.remove("valid");
    letter.classList.add("invalid");
  }
  
  // Validate capital letters
  var upperCaseLetters = /[A-Z]/g;
  if(myInput.value.match(upperCaseLetters)) {  
    capital.classList.remove("invalid");
    capital.classList.add("valid");
  } else {
    capital.classList.remove("valid");
    capital.classList.add("invalid");
  }

  // Validate numbers
  var numbers = /[0-9]/g;
  if(myInput.value.match(numbers)) {  
    number.classList.remove("invalid");
    number.classList.add("valid");
  } else {
    number.classList.remove("valid");
    number.classList.add("invalid");
  }
  
  // Validate length
  if(myInput.value.length >= 8) {
    length.classList.remove("invalid");
    length.classList.add("valid");
  } else {
    length.classList.remove("valid");
    length.classList.add("invalid");
  }
}
</script>

<!-- JavaScript for visibiliy -->
    <script>
      function visibility(){
        var x = document.getElementById("psw");
        if (x.type === "password") {
          x.type = "text";
        }else{
          x.type = "password";
        }
      }
    </script>

</body>
</html>