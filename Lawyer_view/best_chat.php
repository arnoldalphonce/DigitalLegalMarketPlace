<?php
// Hide Notice And Error
error_reporting(E_ERROR | E_WARNING | E_PARSE);
include "../Database/db.php";
session_start();
ob_start();
 $userid = $_SESSION['lawyerid'];
if(!isset($_SESSION['lawyerid'])){
  header('Location: login.php');
}
?>
<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
<title>Dlmp Messaging</title>
<!-- Load Icon -->
<link rel="icon" type="image/png" href="../users/user_logo.png">
<!-- Bootstrap CDN -->
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
<!-- End Bootstrap CDN -->

<!-- Bootstrap Jquery CDN -->
<!-- For Collapse at Top Not to Work I hide  <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script> -->
<!-- End Bootstrap Jquery CDN-->

<!-- Css Script -->
<link rel="stylesheet" type="text/css" href="../css/bootstrap.min.css">
<link rel="stylesheet" href="../fontawesome/css/all.css">
<link rel="stylesheet" type="text/css" href="../css/other_css/index.css">
<link rel="stylesheet" type="text/css" href="../css/other_css/private_chat.css">
<!--End Css Script -->

<!-- Js and Jquery Script -->
<script type="text/javascript" src="../js/bootstrap.min.js"></script>
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
<!--End Js and Jquery Script -->
<link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<!------ Include the above in your HEAD tag ---------->
<link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.css" type="text/css" rel="stylesheet">
<style type="text/css">

</style>

</head>

<body>
<!-- Navigation Bar -->
<?php include 'lawyer_navigation.php';?>
<!--End Navigation Bar -->

<br/><br/>

<!-- Loader Class Using div -->
<?php include 'loader.php';?>
<!-- End Loader -->

<div class="container">
<br/><br/>
<h2 class="text-muted">Recents Chats History</h2>
      <h6 class="text-muted">*** Privacy is Full Guaranteed All Sensitive and Real Time Information Are Encrypted. ***</h6>
      <hr/>
<div class="messaging">
      <div class="inbox_msg">
        <div class="inbox_people">
          <div class="headind_srch">
            <div class="recent_heading">
              <h4>Recent Chats</h4>
            </div>
           <!--  <div class="srch_bar">
              <div class="stylish-input-group">
                <input type="text" class="search-bar"  placeholder="Search" >
                <span class="input-group-addon">
                <button type="button"> <i class="fa fa-search" aria-hidden="true"></i> </button>
                </span> </div>
            </div> -->
          </div>
          <div class="inbox_chat">
          <?php
      $query = "SELECT * FROM Customer";
      $execute = mysqli_query($link,$query)or die(mysqli_error($link));
      // checking if there is any result
      while ($display = mysqli_fetch_array($execute)) {
        
    
?>
            <div class="chat_list active_chat">
            <a class="link" style="text-decoration: none;" href="best_chat.php?id=<?php echo $display['customer_id']; ?>">
              <div class="chat_people">
                <div class="chat_img"> <img src="../users/user_logo.png" alt="dlmp"> </div>
                <div class="chat_ib">
                
                  <h5 class="text-capitalize"><?php echo $display ['firstname'];?>  <?php echo $display ['lastname'];?><span class="chat_date" style="color: white;">Dlmp System</span></h5>
                  <p>Dlmp's Community member</p>
                  </a>
                </div>
              </div>
            </div>
            <?php }?>
            <!-- End while -->
          
          </div>
          <!-- End inbox chat Div -->
        </div>
        <!-- End inbox msg Div -->

<form method="POST" action="">
      <!-- PHP For Getting User Info -->
      <?php
                // get Customer Info
            $customerid = $_GET['id'];
            $show = "SELECT firstname,lastname FROM Customer WHERE customer_id = '$customerid' ";
            $run = mysqli_query($link,$show)or die(mysqli_error($link));
            $display = mysqli_fetch_assoc($run);
            ?>
            <!-- Ends PHP For Getting User Info -->
      <div class="bg-light" style="border-bottom: 1px solid #c4c4c4;padding: 4.6px;">
      <h4 class="text-muted text-center"> Messages <?php echo $display['firstname']; ?>&nbsp<?php echo $display['lastname']; ?></h4>
      </div>

        <div class="mesgs bg-white">
          <div class="msg_history ">
            <div class="incoming_msg ">
            <?php
$customerid = $_GET['id'];
// selecting message relating specific user
$select = "SELECT * FROM Private_message WHERE customer_id = '$customerid' AND lawyer_id = '$userid' ORDER BY sent_date,sent_time";
$exe = mysqli_query($link,$select)or die(mysqli_error($link));
while ($show = mysqli_fetch_array($exe)) {

?>
              <div class="incoming_msg_img"> <img src="../users/user_logo.png"> </div>
              <div class="received_msg">
                <div class="received_withd_msg" style="width: 100%;">
                <p class="text-white bg-dark" style="font-size: 16px;"><?php echo $show['body'];?></p>
                  <span class="time_date"><i class="fas fa-calendar-alt" style="color: #333;"></i> <?php $date = date('Y-m-d', strtotime($show['sent_date'])); echo $date;?> &nbsp <i class="fas fa-clock" style="color: #333;"><?php echo $show['sent_time']; ?></i></span></div>
              </div>
            <?php }?>
            <!-- End while -->
            </div>
        
          </div>


          <div class="type_msg">
            <div class="input_msg_write">
              <input type="text" name="message" class="write_msg" placeholder="Type a message . . . . . . . ." />
              <button class="msg_send_btn" type="submit" name="send"><i class="fas fa-paper-plane" aria-hidden="true"></i></button>

              <!-- PHP FOR PRIVATE CONSULTATION -->
  <?php
  if (isset($_GET['id'])) {
    $customerid = $_GET['id'];
    if (isset($_POST['send'])) {
      // Get message value
      $message = $_POST['message'];
      $date = date('Y-m-d');
      // Insert Query 
      $query = "INSERT INTO Private_message(customer_id,lawyer_id,body,sent_date,sent_time)VALUES('$customerid','$userid','$message','$date',now())";
      // execute query using mysqli
    $execute = mysqli_query($link,$query)or die(mysqli_errror($link));
      if (!$execute) {
    echo "Sorry!!! Something Went Wrong. Try again Later ";
  }else{
    header('Location: best_chat.php');
    }
    }
  }
  ?>
            </div>
          </div>
        </div>
        <!-- End message Div -->
</form>

      </div>
      
      
      <p class="text-center top_spac"> Dlmp's Terms and Policy <a target="_blank" href="#"> terms and policy</a></p>
      
    </div></div>
    <!-- Bottom Footer -->
    <footer>
        <?php include'../footer.php'; ?>
      </footer>
<!-- Ends Footer Bottom -->
    </body>
    </html>