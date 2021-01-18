
<!DOCTYPE html>

<head>
  <title>USER LOGIN</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
  <!-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script> -->
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
</head>
<body>
<?php require "header.php";?>
<div class="row justify-content-center mt-5">
<form class="border col-6 shadow-lg m-3 rounded-lg" >
<h2 class="mt-3 text-center">LOGIN</h2>
<hr>
  <div class="form-group m-3 mt-4">
    <label for="email">USERNAME:</label>
    <input type="email" name="email" class="form-control" placeholder="Enter email" id="email">
  </div>
  <div class="form-group m-3">
    <label for="pwd">Password:</label>
    <input type="password" name="pswd" class="form-control" placeholder="Enter password" id="pwd">
  </div>


  <button type="button" class="btn btn-primary m-3 mt-1" id="submit">Submit</button>

</form>
</div>
<script>
$(document).ready(function(){
  $("#submit").click(function(){
    var email_check=$("#email").val();
    var paswd_check=$("#pwd").val();
    $.ajax({
      url: "validatelogin.php",
      method: "POST",
      data :{ 
        name:email_check,
        pswd:paswd_check},
        success : function(data)
        {
          if(data==1)
          {
           window.location.replace("admin/admindashboard.php");
          alert("Logged in sucessfully!");
          }else if(data == 2)
          {
            window.location.replace("customer/userdashboard.php");
          alert("Logged in sucessfully!"); 
          }
          else if(data == 0)
          {
            alert("Login not sucessfull! Please check the username and password entered");
            }
          else{
            alert(data);
          }
        }
    });
  });
});
</script>
<?php require "footer.php";?>
</body>
</html>
