<?php
include "Database/db.php";
session_start();
ob_start();
header("Cache-Control: no cache");
session_cache_limiter("private_no_expire");
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
<title>Dlmp Forum</title>
<!-- Load Icon -->
<link rel="icon" type="image/png" href="users/user_logo.png">
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
<script type="text/javascript" src="jquery/jquery.min.js"></script>
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
<!--End Js and Jquery Script -->
<!-- Custome Css Few -->
   <style type="text/css">
              p:first-letter{
                text-transform: uppercase;
              }
              body{
                background-color: #fefefe;
              }
              </style>
<!-- End Custome Css -->
</head>
<body>
<br/><br/>
<!-- Navigation Bar -->
<?php include 'navigation.php';?>
<!--End Navigation Bar -->

<br/><br/>

<!-- Loader Class Using div -->
<?php include 'loader.php';?>
<!-- End Loader -->
	<div class="container">
  	<h2 class="text-muted">Legal Market Forum</h2>
      <h6 class="text-muted">*** Privacy is Guaranteed Within This Forum All Information Are Encrypted. ***</h6>
      <hr/>
      <!-- Chat Session Begins Here -->

      <h4 class="text-muted">Recents Post (A To Z)</h4>
 <!-- SELECTING ALL POST -->
     <?php
  // query to fetch data
  $query = "SELECT * FROM Messages,Customer
  WHERE Messages.customer_id = Customer.customer_id
  ORDER BY sent_time ";
  // execute query
  $execute = mysqli_query($link,$query);
  // fetch result using while loop and array to get all the messages
  while ($result = mysqli_fetch_array($execute)) {
  
?>
<br/>

              <div class="card card-body bg-light">
                      <h6 class="text-info" style="text-transform: capitalize;"><img src="<?php if ($result['sex']=='Male') {
                        echo "users/male_user.png";
                      }elseif ($result['sex']=='Female') {
                        echo "users/female_user.png";
                      }else{
                        echo "users/user-secret.png";
                        }?>" style="width: 50px;height: 50px;border-radius: 50%;">  &nbsp Annonymous <i class="fas fa-check-square" style="color: #240091;"></i></h6>
                      <p class="text-info"><i class="fas fa-calendar-alt" style="color: #333;"></i> <?php
                        $date = date('Y-m-d', strtotime($result['sent_date']));
                         echo $date;?> &nbsp<i class="fas fa-clock" style="color: #333;"> <?php echo $result['sent_time']; ?></i> 
                      </p>
                      <!-- Message Body -->
                      <p class="text-dark"><?php echo $result['body']; ?></p>
                      <!-- Counting Number of Replies -->
                    <p class="text text-right">
                      <?php
                      $repId = $result ['message_id'];
                      $count = "SELECT COUNT(*) FROM Replied_message
                      WHERE message_id = '$repId' ";
                      $do = mysqli_query($link,$count)or die(mysqli_error($link));
                      $showCount = mysqli_fetch_array($do);
                       ?>
                    <form method="POST" action="replies.php" class="text-right">
                        <input type="hidden" name="postid" value="<?php echo $result ['message_id'];?>"/>
                        <i class="fas fa-history" style="color: darkblue;"> &nbsp<?php echo $showCount[0]; ?> Reply</i>
                        <input type="submit" name="reply" value="Reply" class="btn btn-outline-primary" 
                        style="width: 100px;">
                        </input>
                    </form>
                    <form method="POST" action="">
                    <input type="hidden" name="postid" value="<?php echo $result ['message_id'];?>"/>
                      <input type="submit" name="delete" value="Delete" class="btn btn-outline-danger" 
                        style="width: 100px;">
                    </form>
            </p>

            </div>
<?php } ?>
<!-- END WHILE -->
<!-- Delete action process -->
<?php
if (isset($_POST['delete'])) {
  $postId = $_POST['postid'];
  
  // Perform Delete post
  $deletePost = "DELETE FROM Messages WHERE message_id = '$postId' AND customer_id = '$userid' ";
  $runDelete = mysqli_query($link,$deletePost)or die(mysqli_error($link));
  if ($runDelete) {
    header('Location: public_consultation.php');
  }else{
     
  }
}

?>
              <br/>
      <form method="GET" action="">
              <!-- Post sending Box -->
                      <div class="form-group">
                                <h3 style="font-family: akrobat;">Post Something </h3>
                                <span class="text-info">No Emoj's Allowed, Sorry for Inconvenience!</span>
                                <textarea class="form-control" placeholder="Type Something" rows="5" name="message" required="" id="tweet"></textarea>
                      </div>
                      <div class="form-group">
                                <input type="submit" class="btn btn-primary" name="makepost" value="POST" id="post"></input>
                      </div>
             <!-- End Post sending Box -->
  <p class="text text-danger">
             <!-- INSERTING MESSAGE FROM THE DATABASE -->
<?php
// Post_insert For Customer Public Consultation
// if the submit buttton is clicked
if (isset($_GET['makepost'])) {
  // get the required message variable
  $message = $_GET['message'];
  $date = date('Y-m-d');
  // perform insert queryurgorgeous
  
  $query = "INSERT INTO Messages(customer_id,body,sent_date,sent_time) 
  VALUES('$userid ','$message','$date',now())";
  // execute query using mysqli
  $execute = mysqli_query($link,$query)or die(mysqli_error($link));
  if (!$execute) {
    echo "Sorry!!! Something Went Wrong. Try again Later ";
  }else{
    header('Location: public_consultation.php');
  }
}

?>
</p>

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
    <br/>

  	<!-- Bottom Footer -->
  	<footer>
       	<?php include'footer.php'; ?>
     	</footer>
<!-- Ends Footer Bottom -->

  </body>
  </html>