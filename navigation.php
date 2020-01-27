<!-- Getting links And Details -->
    <?php
    $query = "SELECT firstname,lastname FROM Customer WHERE customer_id = '$userid' ";
    $execute = mysqli_query($link,$query)or die(mysqli_error($link));
    while($result = mysqli_fetch_array($execute)){
    
?>
<nav class="navbar navbar-expand-md navbar-dark fixed-top" style="background-color: #741212;">
        <a class="navbar-brand" href="#" style="font-family: Akrobat;text-shadow: 2px 2px 3px #333;color: white;"><img src="logo/law2.png" style="width: 40px;">  &nbsp Digital Legal Market Place</a>
        <button class="navbar-toggler bg-dark" type="button" data-toggle="collapse" data-target="#navbarCollapse" aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarCollapse">
          <ul class="navbar-nav mr-auto">
            <li class="nav-item">
              <a class="nav-link text-white" href="home_index.php"><i class="fas fa-home"></i>  Home </a>
            </li>
            <li class="nav-item">
              <a class="nav-link text-white" href="public_consultation.php"><i class="fas fa-comments"></i>  Legal Forum</a>
            </li>
              
            <li class="nav-item">
              <a class="nav-link text-white" href="reputation.php" style="border: 2px solid black;"><i class="fas fa-medal"></i>  Evaluation</a>
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
            </ul>
       </div>
</nav>
   <?php }?>
        <!-- END WHILE LOOP -->