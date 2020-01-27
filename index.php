<?php
// Start Session
session_start();
?>
<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
<title>Welcome to Dlmp</title>
<!-- Load Title Icon -->
<link rel="icon" type="image/png" href="users/user_logo.png">
<!-- ###### Load Title Icon ######## -->
<!-- Bootstrap CDN -->
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
<!-- ##### End Bootstrap CDN ##### -->

<!-- Css Script -->
<link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
<link rel="stylesheet" href="fontawesome/css/all.css">
<link rel="stylesheet" type="text/css" href="css/other_css/index.css">
<!-- ##### End Css Script ##### -->

<!-- Js and Jquery Script -->
<script type="text/javascript" src="js/bootstrap.min.js"></script>
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
<!--End Js and Jquery Script -->
</head>
<meta name="viewport" content="width=device-width, initial-scale=1">
<!-- Custom Style Sheet -->
<style>
body, html {
  height: 100%;
  margin: 0;
}

* {
  box-sizing: border-box;
}

.bg-image {
  /* The image used */
  background-image: url("Slider/lawyers-5.png");
  
  /* Add the blur effect */
  filter: blur(4px);
  -webkit-filter: blur(4px);
  
  /* Full height */
  height: 100%; 
  width: 100%;
  
  /* Center and scale the image nicely */
  background-position: center;
  background-repeat: no-repeat;
  background-size: cover;
}

/* Position text in the middle of the page/image */
.bg-text {
  color: white;
  font-weight: 600;
  position: absolute;
  top: 50%;
  left: 50%;
  transform: translate(-50%, -50%);
  z-index: 2;
  width: 100%;
  padding: 20px;
  text-align: center;
}
</style>
<!-- ##### End Custom style sheet ##### -->
</head>
<body>
<!-- Navigation Bar -->
<?php include 'navigation_new.php';?>
<br/><br/>
<!--End Navigation Bar -->

<!-- Loader  -->
<?php include 'loader.php';?>
<!-- End Loader -->

<!-- Background with Transparent Filter -->
<div class="bg-image"></div>
<!-- ##### End Background with Transparent Filter ##### -->

<div class="bg-text">
 <div class="container">
<br/><br/><br/><br/>
      <!-- Rows Single Column Motivation -->
      <div class="row">
        <div class="col-md-12">
        <p class="text-center text-white mt-5" style="font-size: 34px;text-shadow: 1px 2px 1px black;">Explore The Largest<br/>
            Legal Proffesional <span>At Your Finger Tips </span>
        </p>
        </div>
      </div>
      <!-- ##### End Rows Single Column Motivation ##### -->
      <br/><br/>
      <!-- Form Div Begins here -->
       <div class="row h-75 justify-content-center">
            <form class="mx-2 my-auto d-inline w-100" method="POST" action="search_results.php">
               <div class="input-group">
                  <input type="text" name="searchInput" class="form-control text-capitalize" placeholder="Search by name, location or professional" style="height: 50px;font-size: 18px;" required="">
                   <span class="input-group-append">
                   <button class="btn btn-primary" name="search" type="submit">SEARCH</button>
                   </span>
                </div>
                </form>
            </div>
            <!-- ##### End Form Div Begins here ##### -->
</div>
<!-- Ends Container Div -->
</div>
<!-- ##### End Big Text Div ##### -->

</body>
</html>

