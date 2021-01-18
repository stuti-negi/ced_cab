<?php session_start();?>
<!DOCTYPE html>
<head>
  <title>ADD LOCATION</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css" integrity="sha512-+4zCK9k+qNFUR5X+cKL9EIR+ZOhtIloNl9GIKS57V1MyNsYpYcUrUeQc9vNfzsWfV28IaLL3i96P9sdNyeRssA==" crossorigin="anonymous" />
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <!-- .........................................cdn for bootstrap script-->
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>  
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
<h1 class="mb-4 text-success bg-dark text-center">ADD NEW LOCATION<span class="ml-auto float-right"><button class="btn btn-warning my-2 my-sm-0 mr-3 mb-3"  type="button" id="addloc">add location</button></span></h1>
<table class="table bg-light text-center" width="100%" id='datatable' >
<!-- <table id="dataTable" class="table table-striped table-bordered nowrap" cellspacing="0" width="100%">  -->
  <thead class="text-white" style="background-color:#bfe00ce3;">
  <tr >
  <th scope="col">LOCATION ID</th>
    <th scope="col">Location</th>
    <th scope="col">DISTANCE</th>
    <th scope="col">AVAILABILTY</th>
    <th scope="col">DELETE LOCATION</th>
    </tr>
    </thead>
    <tbody id="table_data">
   
  </tbody>
  </table>
</div>
<!-- initial container end -->
</div>
<!-- modal to add location -->
<div id="edit" class="modal fade mt-5" tabindex="-1">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header justify-content-center bg-dark">
                    <h5 class="modal-title text-white">ADD LOCATION</h5>
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    
                </div>
                <div class="modal-body">

                <form>
                    <div class="form-group">
                        <label for="location">LOCATION NAME</label>
                        <input type="text" class="form-control" id="location_name" placeholder="Enter location" required>
                    </div>
                    <div class="form-group">
                        <label for="distance">Password</label>
                        <input type="text" class="form-control" id="location_distance" placeholder="ENTER DISTANCE" required>
                    </div>
                    </form>
                </div>

                <div class="modal-footer bg-dark">
        <!-- <button type="button" class="btn btn-primary">Save changes</button> -->
        <button type="button" class="btn btn-success" data-dismiss="modal" id="add_loc_db" style="background-color:#bfe00ce3;">ADD</button>
      </div>
  
               
            </div>
        </div>
    </div>
<!-- <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script> -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
<script>
$(document).ready(function(){
    //  ................................to display data in the table in showlocation.php....................

   
loaddata();
//........................to show modal to add location...............................
$("#addloc").click(function(){
    $("#edit").modal('show');
});
// ....................... to add location to the database.............
$("#add_loc_db").click(function(){
    // alert("i am clicked");
    var loc=$("#location_name").val();
    var dis=$("#location_distance").val();
    $.ajax({
          url: 'add_new_loc.php',
            method: 'POST',
            data:{
                location:loc,
                distance:dis,
            },
            success: function(data)
            {
                alert(data);
                loaddata();
            },

    });
    // alert(loc+"\n"+dis);
});
//........................delete data from table in delete.php...............................
$(document).on("click",".delete-btn",function(){
if(confirm("Are sure you want to delete this record ?"))
{
    var locId = $(this).data("id");
    var element=this;
    // alert(studentId);
    $.ajax({
        url:"delete.php",
        type:"POST",
        data:{
            ID:locId
        },
        success : function(data){
            if(data==1){
                $(element).closest("tr").fadeOut();
                alert("Record deleted successfully ");
            }
            else{
            alert("data not removed ");
            }
        }
 });
}
});
// ..........................end of ready function..........
 });
      function loaddata()  
     {
          $.ajax({
            url:"showlocationinadd.php",
            method :"POST",
            success : function(data){
                $("#table_data").html(data);
                $("#datatable").dataTable({scrollX:"true"});
            }
        });
       
        }
</script>
</body>
</html>
<?php require "adminheader.php";

include "adminfooter.php";
?>
