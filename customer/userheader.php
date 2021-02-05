<?php 
session_start();
if(!isset($_SESSION['username'])){
  header('location: ../logout.php');
  }
  elseif($_SESSION['usertype']=="1")
  {
    header('location: ../logout.php');}
?>
<nav class="navbar fixed-top navbar-expand-lg navbar-dark bg-dark">
  <a class="navbar-brand" href="#"><i class="fas fa-car fa-lg" style="color:#bfe00ce3;"></i> CED<span style="color:#bfe00ce3;">CAB</span></a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse " id="navbarSupportedContent">
    <ul class="navbar-nav">
      <li class="nav-item mx-2">
        <a class="nav-link" href="userdashboard.php">Home </a>
      </li>
      <li class="nav-item mx-2">
        <a class="nav-link" href="../index.php">BOOK RIDE NOW</a>
      </li>
      <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
        Rides
        </a>
        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
        <a class="dropdown-item" href="pendingrides.php">Pending Rides</a>
          <a class="dropdown-item" href="completedrides.php">Completed Rides</a>
          <div class="dropdown-divider"></div>
          <a class="dropdown-item" href="allrides.php">ALL Rides</a>
        </div>
      </li>
      <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
      Account
        </a>
        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
        <a class="dropdown-item" href="changeuserpassword.php">Change Password</a>
          <a class="dropdown-item" href="edituser_profile.php">Edit</a>
         
        </div>
      </li>

    </ul>
    <div class="float-right ml-auto text-white">
   <h5> WELCOME <span><?php echo $_SESSION['name'];?> </span>!<span>

    <a href="../logout.php"><button class="btn btn-danger my-2 my-sm-0 text-white"  type="submit">Logout</button></a>
    </span></h5>
    </div>
  </div>
</nav>