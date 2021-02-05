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
  <link rel="stylesheet" href="http://cdn.datatables.net/1.10.13/css/jquery.dataTables.min.css">
<script src="https://cdn.datatables.net/1.10.13/js/jquery.dataTables.min.js"></script>

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
        <a href="pendingrides.php" class="btn btn-outline-danger">Pending rides</a>
      </div>
    </div>
  </div>
  <div class="col-sm-4 mt-3">
    <div class="card text-center bg-success">
      <div class="card-body">
        <h5 class="card-title">Completed rides</h5>
        <p class="card-text"><?php echo $rowcountcompleted; ?></p>
        <a href="completedrides.php" class="btn btn-outline-danger">Completed rides</a>
      </div>
    </div>
  </div>
  <div class="col-sm-4 mt-3">
    <div class="card text-center bg-info ">
      <div class="card-body">
        <h5 class="card-title">All rides</h5>
        <p class="card-text"><?php echo $rowcountall; ?></p>
        <a href="allrides.php" class="btn btn-outline-danger">All rides</a>
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
<div class="container justify-content-center bg-light" style="margin-top:12vh;">
<div class="container m-5 pb-5">

<table class="table bg-light  text-center" width="100%" id='datatable' >
<!-- <table id="dataTable" class="table table-striped table-bordered nowrap" cellspacing="0" width="100%">  -->
  <thead class="text-white " style="background-color:#bfe00ce3;">
  <tr >
    <th scope="col">RideID</th>
    <th scope="col">PICK UP</th>
    <th scope="col">DROP</th>
    <th scope="col">CAB TYPE</th>
    <th scope="col">DISTANCE</th>
    <th scope="col">FARE</th>
    <th scope="col">DATE</th>
    <th scope="col">RIDE STATUS</th>
  <!-- <th scope="col">Update</th> -->
    <th scope="col">ACCEPT REQUEST</th>

    </tr>
    </thead>
    <tbody id="table_data">
   
  </tbody>
  </table>
</div>
<!-- modal -->
<div id="edit" class="modal fade" tabindex="-1">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header justify-content-center">
                    <h5 class="modal-title">RIDE DETAILS </h5>
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    
                </div>
                <div class="modal-body">




                </div>
               <div class="text-center" >
               <button type="button" class="btn" data-dismiss="modal" style="background-color:#bfe00ce3;">CLOSE</button>
            </div>
        </div>
    </div>
</div>
<!-- initial container end -->
</div>
<script>
$(document).ready(function(){
    //  ................................to display data in the table in show.php....................

    function loaddata()  
     {
          $.ajax({
            url:"showpendingrides.php",
            method:"POST",
            success : function(data){
                $("#table_data").html(data);
                $("#datatable").dataTable({scrollX:'true'});
            }
        });
       
        }
loaddata();
// // ......................... cancel ride.............................
$(document).on("click",".cancel-btn",function(){
  
  var id1 = $(this).data("id");
    var element=this;
    // alert(id1);
    $.ajax({
        url:"cancelride_bd.php",
        method:"POST",
        data:{
            ID:id1
        },
        success : function(data){
            if(data==1){
                
                alert("RIDE CANCELED !");
                loaddata();
            }
            else{
            alert("RIDE CANNOT BE CANCELED ");
            }
        }
 });
});
// .................click invoice button.......
$(document).on("click",".invoice-btn",function(){
// ....to show modal
$("#edit").modal('show');
var rideId = $(this).data("id");
// alert(rideId);
$.ajax({
  url:"showinvoice.php",
  method:"POST",
  data:{
    ID: rideId
  },
  success: function(data){
    $(".modal-body").html(data);
  }
});
});
      });
</script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js" ></script> 
