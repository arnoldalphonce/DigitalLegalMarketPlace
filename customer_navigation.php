<nav class="navbar navbar-expand-md navbar-dark fixed-top bg-danger">
<!-- Getting links And Details -->
    <?php
    $query = "SELECT firstname,lastname FROM Customer WHERE customer_id = '$userid' ";
    $execute = mysqli_query($link,$query)or die(mysqli_error($link));
    while($result = mysqli_fetch_array($execute)){
    
?>
        <a class="navbar-brand" href="#" style="font-family: unique;"><img src="logo/law2.png" style="width: 40px;">  &nbsp Digital Legal Market Place</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarCollapse" aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarCollapse">
          <ul class="navbar-nav mr-auto">
            <li class="nav-item">
              <a class="nav-link text-white" href="customer_home.php"><i class="fas fa-home"></i>  Home </a>
            </li>
            <li class="nav-item">
              <?php
                      $count = "SELECT COUNT(*) FROM Messages";
                      $do = mysqli_query($link,$count)or die(mysqli_error($link));
                      $showCount = mysqli_fetch_array($do);
                       ?>
              <a class="nav-link text-white" href="public_consultation.php"><i class="fas fa-envelope"></i>  Public Consultation <span style="border-radius: 50%;background: white;border: 2px solid white; box-shadow: 2px 2px 2px black;padding: 2px;font-weight: 600;color: black;"><?php echo $showCount[0]?></span></a>
            </li>
            <li class="nav-item">
              <a class="nav-link text-white" href="reputation.php"><i class="fas fa-medal"></i>  Evaluation</a>
            </li>
            <li class="nav-item">
               <?php
                      $count = "SELECT COUNT(*) FROM Private_message,Customer,Lawyer
                      WHERE Private_message.customer_id = Customer.customer_id AND Private_message.lawyer_id = Lawyer.lawyer_id  AND Private_message.customer_id = '$userid' ";
                      $do = mysqli_query($link,$count)or die(mysqli_error($link));
                      $showCount = mysqli_fetch_array($do);
                       ?>
              <a class="nav-link text-white" href="customer_home.php"><i class="fas fa-blind"></i>  Private Consultation <span style="border-radius: 50%;background: white;border: 2px solid white; box-shadow: 2px 2px 2px black;padding: 2px;font-weight: 600;color: black;"><?php echo $showCount[0]?></span></a>
            </li>
                <!-- Drop down links -->
            <li class="nav-item dropdown">
                <a href="" class="nav-link dropdown-toggle text-capitalize text-white" id="navbardrop" data-toggle="dropdown"><i class="fas fa-user"></i>
                  <?php echo $result['firstname']; ?>  <?php echo $result['lastname']; ?>
                </a>
                  <div class="dropdown-menu">
                    <a href="customer_profile.php" class="dropdown-item">Profile</a>
                     <a href="signout.php" class="dropdown-item">Sign Out</a>
                  </div>
            </li>
            <!-- End Dropdown -->
            
          </ul>
        </div>
        <?php }?>
        <!-- END WHILE LOOP -->
      </nav>
      <style type="text/css">
      i{
        color: white;
      }
      </style>