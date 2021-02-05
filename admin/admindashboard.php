<?php 
include "adminheader.php";
include "adminfooter.php";
?>
<?php require "dbcon.php";
$id=$_SESSION['userID'];
$select_query="SELECT 'status' FROM `tbl_ride`";
$resultall=mysqli_query($connect,$select_query) or die("SQL Query Failed.");
$rowcountallrides=mysqli_num_rows($resultall);
// ................pending rides query...............
$select_cancelled_query="SELECT 'status' FROM `tbl_ride` WHERE  `status`='0'";
$resultcancelled=mysqli_query($connect,$select_cancelled_query) or die("SQL Query Failed.");
$rowcountcancelled=mysqli_num_rows($resultcancelled);
// ................pending rides query...............
$select_pending_query="SELECT 'status' FROM `tbl_ride` WHERE  `status`='1'";
$resultpending=mysqli_query($connect,$select_pending_query) or die("SQL Query Failed.");
$rowcountpending=mysqli_num_rows($resultpending);
// ................completed rides query...............
$select_completed_query="SELECT 'status' FROM `tbl_ride` WHERE `status`='2'";
$resultcompleted=mysqli_query($connect,$select_completed_query) or die("SQL Query Failed.");
$rowcountcompleted=mysqli_num_rows($resultcompleted);

// ................Total earning query...............
$earning_query="SELECT SUM(total_fare) as fare FROM `tbl_ride` WHERE `status` = '2'";
$totalearning=mysqli_query($connect,$earning_query) or die("SQL Query Failed.");
$row= mysqli_fetch_assoc($totalearning);
// ................Total user query...............
$user_query="SELECT * FROM `tbl_user` WHERE `isadmin` = '0'";
$alluser=mysqli_query($connect,$user_query) or die("SQL Query Failed.");
$rowalluser= mysqli_num_rows($alluser);
// ................Total active user query...............
$activeuser_query="SELECT * FROM `tbl_user` WHERE `status`='1' AND `isadmin` = '0'";
$activeuser=mysqli_query($connect,$activeuser_query) or die("SQL Query Failed.");
$rowactiveuser= mysqli_num_rows($activeuser);
// ................Total blocked user query...............
$blockeduser_query="SELECT * FROM `tbl_user` WHERE `status`='0' AND `isadmin` = '0'";
$blockeduser=mysqli_query($connect,$blockeduser_query) or die("SQL Query Failed.");
$rowblockeduser= mysqli_num_rows($blockeduser);
// ................. Location available.................

$location_query="SELECT * FROM `tbl_location` WHERE is_available != '0'";
$location=mysqli_query($connect,$location_query) or die("SQL Query Failed.");
$rowlocation= mysqli_num_rows($location);
?>

<!DOCTYPE html>

<head>
  <title>Admin Dashboard</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
  <!-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script> -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css" integrity="sha512-+4zCK9k+qNFUR5X+cKL9EIR+ZOhtIloNl9GIKS57V1MyNsYpYcUrUeQc9vNfzsWfV28IaLL3i96P9sdNyeRssA==" crossorigin="anonymous" />
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<style>
.btn-outline-secondary:hover {
    color: #6c757d;
    background-color: transparent;
    border-color: #6c757d;
}
.btn-outline-secondary:not(:disabled):not(.disabled):active, .show>.btn-outline-secondary.dropdown-toggle {
    /* color: #fff; */
    /* background-color: #6c757d; */
    border-color: #6c757d;
    color: #6c757d;
    background-color: transparent;
}
.dropdown-item:hover {
    
    color: #16181b !important;
    text-decoration: none;
    background-color: #f8f9fa;
}
.dropdown-item{color:white;}
.dropdown-menu {background-color: #343a40;}
</style>
</head>
<body>

<div class="container justify-content-center mt-5 bg-light">
<h1 id="adminname">hi admin</h1>
<h1>
<div class="row mt-3">
  <div class="col-sm-3 mt-3">
    <div class="card text-center bg-warning">
      <div class="card-body">
        <h5 class="card-title">RIDE REQUEST</h5>
        <p class="card-text" id="r_rq"><?php echo $rowcountpending; ?></p>
        <a href="requestedrides.php" class="btn btn-outline-secondary">RIDE REQUEST</a>
      </div>
    </div>
  </div>
  <div class="col-sm-3 mt-3">
    <div class="card text-center bg-success">
      <div class="card-body">
        <h5 class="card-title">Completed Rides</h5>
        <p class="card-text"><?php echo $rowcountcompleted; ?></p>
        <a href="completedrides.php" class="btn btn-outline-secondary">Completed Rides</a>
      </div>
    </div>
  </div>
  <div class="col-sm-3 mt-3">
    <div class="card text-center bg-info ">
      <div class="card-body">
        <h5 class="card-title">Canceled Rides</h5>
        <p class="card-text"><?PHP echo $rowcountcancelled;?></p>
        <a href="cancelledrides.php" class="btn btn-outline-secondary">Canceled Rides</a>
      </div>
    </div>
  </div>
  <div class="col-sm-3 mt-3">
    <div class="card text-center bg-warning">
      <div class="card-body">
        <h5 class="card-title">All rides</h5>
        <p class="card-text"><?php echo $rowcountallrides; ?></p>
        <a href="allrides.php" class="btn btn-outline-secondary">All rides</a>
      </div>
    </div>
  </div>
</div>
<div class="row mt-3">
  <div class="col-sm-3 mt-3">
    <div class="card text-center bg-warning">
      <div class="card-body">
        <h5 class="card-title">Blocked User </h5>
        <p class="card-text"><?PHP echo $rowblockeduser;?></p>
        <a href="#" class="btn btn-outline-secondary">Blocked User</a>
      </div>
    </div>
  </div>
  <div class="col-sm-3 mt-3">
    <div class="card text-center bg-success">
      <div class="card-body">
        <h5 class="card-title">Approved user </h5>
        <p class="card-text"><?PHP echo $rowactiveuser;?></p>
        <a href="#" class="btn btn-outline-secondary">Approved user</a>
      </div>
    </div>
  </div>
  <div class="col-sm-3 mt-3">
    <div class="card text-center bg-info ">
      <div class="card-body">
        <h5 class="card-title">All users</h5>
        <p class="card-text"><?PHP echo $rowalluser;?></p>
        <a href="Blocked User" class="btn btn-outline-secondary">All users</a>
      </div>
    </div>
  </div>
  <div class="col-sm-3 mt-3">
    <div class="card text-center bg-warning">
      <div class="card-body">
        <h5 class="card-title">Servicable locations</h5>
        <p class="card-text"><?php echo $rowlocation;?></p>
        <a href="location.php" class="btn btn-outline-secondary">Servicable locations</a>
      </div>
    </div>
  </div>
</div>
<div class="row mt-3">
  <div class="col-sm-3 mt-3">
    <div class="card text-center bg-warning">
      <div class="card-body">
        <h5 class="card-title">TOTAL EARNINGS</h5>
        <p class="card-text"><?PHP echo $row['fare'];?></p>
        <a href="#" class="btn btn-outline-secondary">TOTAL EARNINGS</a>
      </div>
    </div>
  </div>
  <!-- <div class="col-sm-3 mt-3">
    <div class="card text-center bg-success">
      <div class="card-body">
        <h5 class="card-title"> </h5>
        <p class="card-text"></p>
        <a href="#" class="btn btn-outline-secondary">Go somewhere</a>
      </div>
    </div>
  </div> -->
  <!-- <div class="col-sm-3 mt-3">
    <div class="card text-center bg-info ">
      <div class="card-body">
        <h5 class="card-title">All users</h5>
        <p class="card-text"></p>
        <a href="#" class="btn btn-outline-secondary">Go somewhere</a>
      </div>
    </div>
  </div>
  <div class="col-sm-3 mt-3">
    <div class="card text-center bg-warning">
      <div class="card-body">
        <h5 class="card-title">Servicable locations</h5>
        <p class="card-text"></p>
        <a href="#" class="btn btn-outline-secondary">Go somewhere</a>
      </div>
    </div>
  </div> -->
</div>
</h1>
<!-- initial container end -->
</div>
<!-- <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script> -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
</body>
</html>