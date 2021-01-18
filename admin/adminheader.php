<?php session_start();
if(!isset($_SESSION['username'])){
  header('location: ../logout.php');}
  elseif($_SESSION['usertype']=="0")
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
        <a class="nav-link" href="admindashboard.php">Home </a>
      </li>
      <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
        Rides
        </a>
        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
        <a class="dropdown-item" href="requestedrides.php">Ride Requests</a>
          <a class="dropdown-item" href="completedrides.php">Completed Rides</a>
          <a class="dropdown-item" href="cancelledrides.php">Cancled Rides</a>
          <div class="dropdown-divider"></div>
          <a class="dropdown-item" href="allrides.php">ALL Rides</a>
        </div>
      </li>
      <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
        Users
        </a>
        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
        <!-- <a class="dropdown-item" href="pendingrequests.php">Pending User Requests</a>
          <a class="dropdown-item" href="approvedusers.php">Approved User Requests</a> -->
         
          <div class="dropdown-divider"></div>
          <a class="dropdown-item" href="alluser.php">ALL Users</a>
        </div>
      </li>
      <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
        Location
        </a>
        <div class="dropdown-menu bg-dark " aria-labelledby="navbarDropdown">
        <a class="dropdown-item text-white" href="location.php">Location List</a>
          <a class="dropdown-item text-white" href="addnewlocation.php">Add/Delete Location</a>
         
        </div>
      </li>
      <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
      Account
        </a>
        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
        <a class="dropdown-item" href="adminpswdchange.php">Change Password</a>
          <a class="dropdown-item" href="editadminprofile.php">Edit</a>
         
        </div>
      </li>

    </ul>
    <div class="float-right ml-auto text-white">
   <h5><span> WELCOME <?php echo $_SESSION['username'];?></span>!<span>

    <a href="../logout.php"><button class="btn btn-outline-danger my-2 my-sm-0"  type="submit">Logout</button></a>
    </span></h5>
    </div>
  </div>
</nav>
