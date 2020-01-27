<?php
error_reporting(E_ERROR | E_WARNING | E_PARSE);
include "Database/db.php";
session_start();
header("Cache-Control: no cache");
session_cache_limiter("private_no_expire");
if (isset($_SESSION['userid'])) {
$userid = $_SESSION['userid'];

}elseif(!isset($_SESSION['userid'])){
   header('Location: login.php');
}
?>
<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
<title>Welcome to Dlmp</title>

<!-- Bootstrap CDN -->
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
<!-- End Bootstrap CDN -->

<!-- Bootstrap Jquery CDN -->
<!-- For Collapse at Top Not to Work I hide  <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script> -->
<!-- End Bootstrap Jquery CDN-->

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
<!-- Custome Css Few -->
   <style type="text/css">
              p:first-letter{
                text-transform: uppercase;
              }
              textarea{
                text-transform: capitalize;
              }
              </style>
<!-- End Custome Css -->
</head>
<body>
<!-- Navigation Bar -->
<?php include 'navigation.php';?>
<!--End Navigation Bar -->

<br/><br/>

<!-- Header with Image -->
<!-- End Header with Image -->

<!-- Loader Class Using div -->
<?php include 'loader.php';?>
<!-- End Loader -->
      <!-- PHP Code -->
 <?php
   if (isset($_POST['send'])) {
      // Get message value
      $lawyer_id = $_POST['lawyerid'];
      $message = $_POST['message'];
      $date = date('Y-m-d');
      // Insert Query 
      $query = "INSERT INTO Private_message(customer_id,lawyer_id,body,sent_date,sent_time)VALUES('$userid','$lawyer_id','$message','$date',now())";
      // execute query using mysqli
    $execute = mysqli_query($link,$query);
      if (!$execute) {
    echo "Sorry!!! Something Went Wrong. Try again Later ";
  }else{
    //header('Location: private-consultation.php');
    }
    }

  if (isset($_POST['contact'] ) || isset($_POST['send']) ) {
     $lawyer_id = $_POST['lawyerid'];
    
  ?>

	<div class="container">
  	<hr/>
  	<h2 class="text-muted">Recents Chats History</h2>
      <h6 class="text-muted">*** Privacy is Full Guaranteed All Messages and Information Are Encrypted. ***</h6>
      <hr/>

      <!-- Chat Session Begins Here -->
      <?php
                // get Lawyer Info
             $lawyer = $lawyer_id;
            $show = "SELECT firstname,lastname FROM Lawyer WHERE lawyer_id = '$lawyer' ";
            $run = mysqli_query($link,$show)or die(mysqli_error($link));
            $display = mysqli_fetch_assoc($run);
            
            ?>
      <h4 class="text text-info">Recent Messages with <span class="text text-capitalize"><?php echo $display['firstname']; ?>&nbsp<?php echo $display['lastname']; ?></span></h4>

<!-- SELECTING MESSAGES -->
<?php
$query = "SELECT * FROM Private_message,Customer,Lawyer
WHERE Private_message.customer_id = Customer.customer_id AND Private_message.lawyer_id = Lawyer.lawyer_id  AND Private_message.customer_id = '$userid' AND Private_message.lawyer_id = '$lawyer_id' ORDER BY message_id ASC";
$execute = mysqli_query($link,$query)or die(mysqli_error($link));
while ($result = mysqli_fetch_array($execute)) {
  

 ?>
                 <div class="card card-body bg-light">
                      <h6 class="text-info" style="text-transform: capitalize;"><img src="users/main_user.png" style="width: 50px;height: 50px;border-radius: 50%;">  &nbsp Annonymous <i class="fas fa-check-square" style="color: #240091;"></i></h6>
                      <p class="text-info"><i class="fas fa-calendar-alt" style="color: #333;"></i> <?php echo $result['sent_date']; ?>&nbsp <i class="fas fa-clock" style="color: #333;"></i> <?php echo $result['sent_time']; ?> 
                      </p>
                      <!-- Message Body -->
                      <p class="text-dark"><?php echo $result['body']; ?></p>
                      <span class="text-right">
                      </span> 
              </div>
              <br/>
 <?php }?>
<!-- END WHILE -->

      <form method="POST">
              <!-- Post sending Box -->
                      <div class="form-group">
                                <h3 style="font-family: akrobat;">Message </h3>
                                <textarea name="message" placeholder="Type message" class="form-control" rows="2"></textarea>
                      </div>
                      <input type="hidden" name="lawyerid" value='<?php echo $lawyer_id; ?>'/>
                      <div class="form-group">
                                <button type="submit" class="btn btn-primary" name="send">SEND <i class="fas fa-paper-plane"></i></button>
                      </div>
             <!-- End Post sending Box -->
      </form>
<!-- Inspiration -->
               <div class="row">
                    <div class="col-md-12">
                    <p class="text-center" style="font-size: 40px;opacity: 0.7;">
                       " All In One Law Firms  "<br/>
                        <span style="color: red;font-family: akrobat;">Proven Result .</span>
                    </p>
                    </div>
              </div>
<!-- End Inspiration -->


  	</div>
    <!-- End Container Division -->
    <br/>
<?php } ?>
  <!-- End IF PHP FOR PRIVATE CONSULTATION -->
 
  	<!-- Bottom Footer -->
  	<footer>
       	<?php include'footer.php'; ?>
     	</footer>
<!-- Ends Footer Bottom -->

  </body>
  </html>