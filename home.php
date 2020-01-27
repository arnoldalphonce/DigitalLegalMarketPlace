<?php
include "Database/db.php";
session_start();
ob_start();
if (!isset($_SESSION['userid'])) {
   header('Location: login.php');


}elseif(isset($_SESSION['userid'])){
  $userid = $_SESSION['userid'];
}
?>
<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
<title>Welcome to Dlmp</title>
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
</head>
<meta name="viewport" content="width=device-width, initial-scale=1">
<style>
*{
  font-family: 'titillium web';
}
body, html {
  height: 100%;
  margin: 0;
  font-family: Arial, Helvetica, sans-serif;
}

* {
  box-sizing: border-box;
}
body{
  background-color: #EDEDED;
}

</style>
</head>
<body>
<!-- Navigation Bar -->
<?php include 'navigation.php';?>
<br/><br/>
<!--End Navigation Bar -->
<!-- Loader Class Using div -->
<?php include 'loader.php';?>
<!-- End Loader -->


<div class="container-fluid">
 <div class="container">
<br/><br/>
<h4 class="text-secondary text-capitalize">Towards Digitalization of service</h4>
<!-- Generating search results -->
<?php
if (isset($_POST['search'])) {
  $searchInput = mysqli_real_escape_string($link,$_POST['searchInput']);
  echo '<h5 class ="text-info">';
  echo "Search Result For .... ".$searchInput;
  echo '</h5>';
  $query = "SELECT * FROM Lawyer 
  WHERE firstname LIKE '%".$searchInput."%' OR lastname LIKE '%".$searchInput."%'  OR region LIKE '%".$searchInput."%'  OR email LIKE '%".$searchInput."%' OR status LIKE '%".$searchInput."%' ";
}else{
  $query = "SELECT * FROM Lawyer ORDER BY lawyer_id";
}
$result = mysqli_query($link, $query)or die(mysqli_error($link));
  while($row = mysqli_fetch_array($result)){
?>
  <!-- Design display view of lawyer -->
  <div class="card bg-white">
  <div class="row">
    <div class="col-md-2 pt-3 pl-4 pb-3">
      <img src="lawyers/<?php echo $row['image_link'] ?>" class="img-thumbnail" style="height: 120px;width: 120px;">
    </div>
    <div class="col-md-7 pt-3 pl-4 pb-3">
    <ul class="navbar-nav mr-auto">
      <li class="text-primary text-capitalize" style="font-size: 20px;font-weight: 600;"><?php echo $row['firstname']; ?>&nbsp<?php echo $row['lastname']; ?></li>
      <li class="text-capitalize">Advocate at &nbsp <span class="text-primary text-capitalize">Bingo Law Group</span></li>
      <li class="text-capitalize">Area Of Practise  &nbsp <span class="text-primary text-capitalize"><?php echo $row['status']; ?></span></li>
      <li class="text-capitalize"><i class="fas fa-map-marker-alt" style="color: green;"></i>&nbsp<?php echo $row['region']; ?></li>
    </ul>
    <hr/>
    <div class="row">
    <div class="col-md-6 text-secondary">
      <h6 class="font-weight-bold">Clients Review</h6>
      <i class="fas fa-star" style="color: goldenrod;"></i>
      <i class="fas fa-star" style="color: goldenrod;"></i>
      <i class="fas fa-star" style="color: goldenrod;"></i>
      <i class="fas fa-star" style="color: goldenrod;"></i>
    </div>
    <div class="col-md-6 text-secondary">
      <h6 class="font-weight-bold">About Me</h6>
      <?php echo $row['about_me'];?>
    </div>
      
    </div>
    </div>
    <div class="col-md-3 pt-3 pr-5 pb-3 pl-4">
      <ul class="navbar-nav mr-auto border border-primary">
      <a href="mailto: <?php echo $row['email']; ?>">
      <li class="text-primary text-capitalize border border-bottom pl-2" style="font-size: 18px;">
      <i class="fas fa-envelope"></i>&nbsp Message</li></a>
      <a href="tel: <?php echo $row['mobile']; ?>">
      <li class="text-primary text-capitalize border border-bottom pl-2" style="font-size: 18px;">
      <i class="fas fa-phone" style="transform: rotate(90deg);"></i>&nbsp View Phone</li></a>
      <li class="text-primary text-capitalize border border-bottom pl-2" style="font-size: 18px;">
      <i class="fas fa-user"></i>&nbsp View Profile</li>
      </ul>
    </div>
  </div>

  </div>
  <br/>  
<?php } ?>

<!-- End while -->
</div>
<!-- Ends of Container -->
</div>
<!-- End container fluid -->

<!-- Footer Bottom -->
     <footer>
     <br/><br/>
     <br/><br/><br/>
    <?php include 'footer.php';?>
     </footer>
<!-- Ends Footer Bottom -->

<style type="text/css">
  hr{
    border: 1px solid whitesmoke;
    box-shadow: 1px 1px 1px black;
  }
  a:hover{
    text-decoration: none;
  }
</style>
</body>
</html>

