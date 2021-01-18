

<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <!-- ..........................................cdn for bootstrap -->
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
  <!-- ..........................................cdn for jquery -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <!-- .........................................cdn for bootstrap script-->
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>  
  <!-- .........................................cdn for fa fa icons -->  
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css" integrity="sha512-+4zCK9k+qNFUR5X+cKL9EIR+ZOhtIloNl9GIKS57V1MyNsYpYcUrUeQc9vNfzsWfV28IaLL3i96P9sdNyeRssA==" crossorigin="anonymous" />
<!-- ..........................................cdn for data table -->

<link rel="stylesheet" href="http://cdn.datatables.net/1.10.13/css/jquery.dataTables.min.css">
<script src="https://cdn.datatables.net/1.10.13/js/jquery.dataTables.min.js"></script>
<title> display data</title>
<link rel="stylesheet" href="adminstyle.css">
<?php require "adminfooter.php"; ?>
</head>
<body>
<div class="container-fluid bg-info">
<h1>Customer details</h1>
</div>
<!-- <div class="container-fluid bg-warning text-right" id="search_bar" >
<input type="text" class="m-2 rounded"  placeholder="Search" autocomplete="off" id="search">
</input><span><i class="fas fa-search"></i></span>
</div> -->
<div class="container">
<table class="table bg-light" width="100%" id='datatable' style="overflow-x: auto;" >
<!-- <table id="dataTable" class="table table-striped table-bordered nowrap" cellspacing="0" width="100%">  -->
  <thead class="bg-dark text-white">
  <tr >
    <th scope="col">UserID</th>
    <th scope="col">Name</th>
    <th scope="col">Mail ID</th>
    <th scope="col">DATE of SIGNUP</th>
    <th scope="col">Number</th>
    <th scope="col">Status</th>
    <th scope="col">Update</th>
    <th scope="col">Delete</th>
    </tr>
    </thead>
    <tbody id="table_data">
   
  </tbody>
  </table>
</div>
<!-- Modal -->
<div id="edit" class="modal fade" tabindex="-1">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header justify-content-center">
                    <h5 class="modal-title">EDIT USER DETAILS </h5>
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    
                </div>
                <div class="modal-body">

  
  
               
            </div>
        </div>
    </div>
   
    <!-- .............................SCRIPT........................................................ -->
<script src="adminscript.js">
   
    </script>
</body>
</html>