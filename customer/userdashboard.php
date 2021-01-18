<?php 
session_start();
include "userheader.php";
include "userfooter.php";
?>
<?php require "dbcon.php";
$id=$_SESSION['userID'];
$select_query="SELECT * FROM `tbl_ride` WHERE `customer_user_id`='$id'";
$resultall=mysqli_query($connect,$select_query) or die("SQL Query Failed.");
$rowcountall=mysqli_num_rows($resultall);
// ................pending rides query...............
$select_pending_query="SELECT * FROM `tbl_ride` WHERE `customer_user_id`='$id' AND `status`='1'";
$resultpending=mysqli_query($connect,$select_pending_query) or die("SQL Query Failed.");
$rowcountpending=mysqli_num_rows($resultpending);
// ................completed rides query...............
$select_completed_query="SELECT * FROM `tbl_ride` WHERE `customer_user_id`='$id' AND `status`='2'";
$resultcompleted=mysqli_query($connect,$select_completed_query) or die("SQL Query Failed.");
$rowcountcompleted=mysqli_num_rows($resultcompleted);

// ................Total Expense query...............
$expense_query="SELECT SUM(total_fare) as fare FROM `tbl_ride` WHERE customer_user_id='$id' AND `status` = '2'";
$totalexpense=mysqli_query($connect,$expense_query) or die("SQL Query Failed.");
$row= mysqli_fetch_assoc($totalexpense);
?>
<!DOCTYPE html>

<head>
  <title>User Dashboard</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
  <!--  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script> -->
 
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css" integrity="sha512-+4zCK9k+qNFUR5X+cKL9EIR+ZOhtIloNl9GIKS57V1MyNsYpYcUrUeQc9vNfzsWfV28IaLL3i96P9sdNyeRssA==" crossorigin="anonymous" />
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<style>
.btn-outline-danger:hover {
    color: #dc3545;
    background-color: transparent;
    border-color: #dc3545;
}
.btn-outline-danger:not(:disabled):not(.disabled):active, .show>.btn-outline-danger.dropdown-toggle {
    /* color: #fff; */
    /* background-color: #dc3545; */
    border-color: #dc3545;
    color: #dc3545;
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
<!-- <div class="row"> -->
<!-- to display side menue -->
<!-- <div class="col-3 bg-dark fixed" ></div> -->
<!-- to display cards -->
<div class="container-fluid justify-content-center px-5 mt-5 bg-light">
<h1 id="username">hi user</h1>
<h1>
<div class="row mt-3">
  <div class="col-sm-4 mt-3">
    <div class="card text-center bg-primary">
      <div class="card-body">
        <h5 class="card-title">Pending rides</h5>
        <p class="card-text"><?php echo $rowcountpending; ?></p>
        <a href="#" class="btn btn-outline-danger">Pending rides</a>
      </div>
    </div>
  </div>
  <div class="col-sm-4 mt-3">
    <div class="card text-center bg-success">
      <div class="card-body">
        <h5 class="card-title">Completed rides</h5>
        <p class="card-text"><?php echo $rowcountcompleted; ?></p>
        <a href="#" class="btn btn-outline-danger">Completed rides</a>
      </div>
    </div>
  </div>
  <div class="col-sm-4 mt-3">
    <div class="card text-center bg-info ">
      <div class="card-body">
        <h5 class="card-title">All rides</h5>
        <p class="card-text"><?php echo $rowcountall; ?></p>
        <a href="#" class="btn btn-outline-danger">All rides</a>
      </div>
    </div>
  </div>
</div>
<div class="row mt-3">
  <div class="col-sm-4 mt-3">
    <div class="card text-center bg-warning">
      <div class="card-body">
        <h5 class="card-title">Total expenses</h5>
        <p class="card-text"><?php if($row['fare']==""){echo "0";}else{ echo $row['fare'];}?></p>
        <a href="#" class="btn btn-outline-danger">Total expenses</a>
      </div>
    </div>
  </div>
  <!-- <div class="col-sm-4 mt-3">
    <div class="card text-center bg-success">
      <div class="card-body">
        <h5 class="card-title">Special title treatment</h5>
        <p class="card-text">20</p>
        <a href="#" class="btn btn-outline-danger">Go somewhere</a>
      </div>
    </div>
  </div>
  <div class="col-sm-4 mt-3">
    <div class="card text-center bg-info ">
      <div class="card-body">
        <h5 class="card-title">Special title treatment</h5>
        <p class="card-text">30</p>
        <a href="#" class="btn btn-outline-danger">Go somewhere</a>
      </div>
    </div>
  </div> -->
</div>

</h1>
<!-- initial container end -->
</div>
<!-- initial row container end -->
<!-- </div> -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js" ></script> 