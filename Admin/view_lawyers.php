<?php
include "../Database/db.php";
session_start();
ob_start();
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
<title>Dlmp Manage Lawyers</title>

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
  		
                        <!-- Customer View Begins here -->
                        <h4 class="text text-info">Dlmp Registered Lawyers</h4>
  <p>Manage all your Registered Lawyers at Once .</p>           
  <table class="table table-striped bg-white" style="border: 2px solid whitesmoke;">
    <thead class="bg-dark text-white">
      <tr>
        <th>Full name</th>
        <th>Sex</th>
        <th>E-mail</th>
        <th>Mobile</th>
        <th>Action</th>
      </tr>
    </thead>

    <tbody>
          <?php
      // Query
  $select = "SELECT * FROM Lawyer";
  $execute = mysqli_query($link,$select)or die(mysqli_error($link));
  while ($display = mysqli_fetch_array($execute)) {
  
  ?> 
      <tr>
        <td  class="text text-capitalize"><?php echo $display['firstname'] ?>&nbsp<?php echo $display['lastname'] ?></td>
        <td><?php echo $display['sex'] ?></td>
        <td class="text-primary"><a href="mailto:<?php echo $display['email'] ?>"><?php echo $display['email'] ?></a></td>
        <td><?php echo $display['mobile'] ?></td>
        <!-- Get customer Id -->
                 <!-- PHP for Deletion proceess -->
       <?php
            if (isset($_POST['delete'])) {
              $lawyerId = $_POST['lawyerCurrent'];
              // Query
              $delete = "DELETE FROM Lawyer
              WHERE lawyer_id = '$lawyerId' ";
              $process = mysqli_query($link,$delete)or die(mysqli_error($link));
              if ($process) {
                header('Location: view_lawyers.php');
              }else{
                echo "Sorry!! Could not Delete Account.";
              }
            }
        ?>
        <form method="POST" action="">
        <input type="hidden" name="lawyerCurrent" value="<?php echo $display['lawyer_id']; ?>">
        <!-- End Get customer Id -->
        <td><button class="btn btn-danger" type="submit" name="delete"><span class="spinner-grow spinner-grow-sm"></span> Delete</button></td>
        </form>
      </tr>
       <?php }?>
    </tbody>
          <p class="text-info">
       <!-- Getting total customers -->
       <?php 
       $total = "SELECT COUNT(*) FROM Lawyer";
       $getTotal = mysqli_query($link,$total);
       $display = mysqli_fetch_array($getTotal);
       echo "Total Customer Registered " .$display[0];
       ?>
       </p>
  </table>
  <!-- End of Customer Table -->
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
       <!-- End Container -->
    <!-- Bottom Footer -->
      <footer>
         <?php include'../footer.php'; ?>
        </footer>
  <!-- End Bottom Footer -->
      </body>
      </html>