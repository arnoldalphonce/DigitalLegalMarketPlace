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
                        <!-- Evaluation View Begins here -->
                         <h4 class="text-muted">Recents Users Reviews (A To Z)</h4>
 <!-- SELECTING ALL POST -->
     <?php
  // query to fetch data
  $query = "SELECT * FROM testimonial
  ORDER BY sent_time ";
  // execute query
  $execute = mysqli_query($link,$query);
  // fetch result using while loop and array to get all the messages
  while ($result = mysqli_fetch_array($execute)) {
  
?>
<br/>

              <div class="card card-body bg-outline-danger">
                      <h6 class="text-info" style="text-transform: capitalize;"><img src="../users/brand.png" style="width: 50px;height: 50px;border-radius: 50%;">  &nbsp<?php echo $result['firstname']?>&nbsp <?php echo $result['lastname']?>&nbsp<i class="fas fa-check-square" style="color: #240091;"></i>
                      <p> &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp
                      <!-- Star Ratings -->
                      <?php if ($result['service_rating']=='Excellent') {
                      echo $result['service_rating']." ";
                      echo '<i class="fas fa-star" style="color: gold;">'.'</i>';
                      echo '<i class="fas fa-star" style="color: gold;">'.'</i>';
                      echo '<i class="fas fa-star" style="color: gold;">'.'</i>';
                      echo '<i class="fas fa-star" style="color: gold;">'.'</i>';
                      echo '<i class="fas fa-star" style="color: gold;">'.'</i>';
                    }elseif ($result['service_rating']=='Very Good') {
                      echo $result['service_rating']." ";
                      echo '<i class="fas fa-star" style="color: gold;">'.'</i>';
                      echo '<i class="fas fa-star" style="color: gold;">'.'</i>';
                      echo '<i class="fas fa-star" style="color: gold;">'.'</i>';
                      echo '<i class="fas fa-star" style="color: gold;">'.'</i>';
                    }elseif ($result['service_rating']=='Good') {
                      echo $result['service_rating']." ";
                      echo '<i class="fas fa-star" style="color: gold;">'.'</i>';
                      echo '<i class="fas fa-star" style="color: gold;">'.'</i>';
                      echo '<i class="fas fa-star" style="color: gold;">'.'</i>';
                    }elseif ($result['service_rating']=='Satisfactory') {
                      echo $result['service_rating']." ";
                      echo '<i class="fas fa-star" style="color: gold;">'.'</i>';
                      echo '<i class="fas fa-star" style="color: gold;">'.'</i>';
                    }elseif ($result['service_rating']=='Unsatisfactory') {
                      echo $result['service_rating']." ";
                      echo '<i class="fas fa-star" style="color: gold;">'.'</i>';
                    }
                      ?>
                      </p>
                      </h6>

                      <p class="text-info"><i class="fas fa-calendar-alt" style="color: #333;"></i> <?php
                        $date = date('Y-m-d', strtotime($result['sent_date']));
                         echo $date;?> &nbsp<i class="fas fa-clock" style="color: #333;"> <?php echo $result['sent_time']; ?></i> 
                      </p>
                      <!-- Message Body -->
                      <p class="text-dark"><?php echo $result['review']; ?></p>

            </div>
<?php } ?>
<!-- END WHILE -->

                  <!-- Motivation -->
                    <div class="col-md-12">
                      <p class="text-center" style="font-size: 40px;">
                         " Good Work Keep it Up "<br/>
                          Otherwise <span style="color: red;">Don't Give Up .</span>
                      </p>
                      </div>
                      <!-- End Motivation -->

      </div>
      <!-- End container Division -->
        <br/>

    <!-- Bottom Footer -->
    <footer>
        <?php include'../footer.php'; ?>
      </footer>
<!-- Ends Footer Bottom -->
      </body>
      </html>