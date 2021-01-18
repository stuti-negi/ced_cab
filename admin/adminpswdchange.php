<?php session_start();?>
<!DOCTYPE html>
<head>
  <title>CHANGE PASSWORD</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
  <!-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script> -->
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
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

<div class="row justify-content-center mt-5">
<form class="border col-6 shadow-lg m-3 mt-5 rounded-lg " style="background-color:transparent;">
<h2 class="mt-3 text-center">CHANGE PASSWORD</h2>
<hr>
  <div class="form-group m-3 mt-4 ">
    <label for="oldpswd">CURRENT PASSWORD:</label>
    <input type="text" name="oldpswd" class="form-control" placeholder="Enter current password" id="oldpswd">
  </div>
  <div class="form-group m-3">
    <label for="newpwd">NEW PASSWORD:</label>
    <input type="password" autocomplete=​"new-password" name="newpswd" class="form-control" placeholder="Enter new password" id="newpswd">
  </div>
  <div class="form-group m-3">
    <label for="cnfmpwd">CONFIRM PASSWORD:</label>
    <input type="password" name="cnfmpswd" autocomplete=​"new-password" class="form-control" placeholder="Re-Enter new password" id="cnfmpswd">
  </div>

<div class="text-center">
  <button type="button" class="btn m-3 mt-1 text-center text-white" id="change" style="background-color:#bfe00ce3;">CHANGE</button>
</div>
</form>
</div>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
<!-- script -->
<script>
$(document).ready(function(){
$("#change").click(function(e){
    // alert("change clicked");
var old=$("#oldpswd").val();
var newp=$("#newpswd").val();
var cpas=$("#cnfmpswd").val();
if(newp==cpas)
{
    // alert(old+"\n"+ newp);
    $.ajax({
        url:"pswd_admin_change.php",
        method:"POST",
        data:{
            new:newp,
            old:old,
        },
        success:function(data){
            if(data=="0")
            {
                alert("Please enter your correct current password!");
              
            }
            else{
          alert(data);
          window.location.href("../logout.php");
        }
        },
    });
}
else{
    alert("Confirm and new password didn't match !");
    e.preventDefault();
}
});//change button click
});//ready function
</script>
</body>
</html>
<?php require "adminheader.php";

include "adminfooter.php";
?>