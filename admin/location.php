
<!DOCTYPE html>

<head>
  <title>location details</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
  <!-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script> -->
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
<?php require "adminheader.php";?>
<div class="container justify-content-center bg-light" style="margin-top:12vh;">
<div class="container">
<h1 class="mb-4 text-success bg-dark text-center">ALL LOCATIONS</h1>
<table class="table bg-light text-center" width="100%" id='datatable' >
<!-- <table id="dataTable" class="table table-striped table-bordered nowrap" cellspacing="0" width="100%">  -->
  <thead class="text-white" style="background-color:#bfe00ce3;">
  <tr >
  <th scope="col">LOCATION ID</th>
    <th scope="col">Location</th>
    <th scope="col">DISTANCE</th>
    <th scope="col">AVAILABILTY</th>
 
    </tr>
    </thead>
    <tbody id="table_data">
   
  </tbody>
  </table>
</div>
<!-- initial container end -->
</div>
<!-- <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script> -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
<script>
$(document).ready(function(){
    //  ................................to display data in the table in showlocation.php....................

    function loaddata()  
     {
          $.ajax({
            url:"showlocation.php",
            type:"POST",
            success : function(data){
                $("#table_data").html(data);
                $("#datatable").dataTable();

            }
        });
       
        }
loaddata();
//........................delete data from table in delete.php...............................
// $(document).on("click",".delete-btn",function(){
// if(confirm("Are sure you want to delete this record ?"))
// {
//     var studentId = $(this).data("id");
//     var element=this;
//     // alert(studentId);
//     $.ajax({
//         url:"delete.php",
//         type:"POST",
//         data:{
//             ID:stua==1){
//                 $(element).closest("tr").fadeOut();
//                 alert("Record deleted successfully ");
//             }
//             else{
//             alert("data not removed ");
//             }
//         }
//  });
// }
// });
      });
</script>
</body>
</html>
<?php require "adminfooter.php";
?>