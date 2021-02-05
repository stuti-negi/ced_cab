<?php 
include "userheader.php";
?>
<!DOCTYPE html>

<head>
  <title>Completed ride details</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css" integrity="sha512-+4zCK9k+qNFUR5X+cKL9EIR+ZOhtIloNl9GIKS57V1MyNsYpYcUrUeQc9vNfzsWfV28IaLL3i96P9sdNyeRssA==" crossorigin="anonymous" />
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <link rel="stylesheet" href="http://cdn.datatables.net/1.10.13/css/jquery.dataTables.min.css">
<script src="https://cdn.datatables.net/1.10.13/js/jquery.dataTables.min.js"></script>
<style>

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

<div class="container justify-content-center bg-light" style="margin-top:12vh;">
<div class="container">
<h1 class="mb-4 text-success bg-dark text-center"> Pending Ride details</h1>
<table class="table bg-light  text-center" width="100%" id='datatable' >
<!-- <table id="dataTable" class="table table-striped table-bordered nowrap" cellspacing="0" width="100%">  -->
  <thead class="text-white" style="background-color:#bfe00ce3;">
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
<?php include "userfooter.php";?>
<!-- <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script> -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
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
</body>
</html>