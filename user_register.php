<!DOCTYPE html>
<html lang="en">
<head>
  <title>Register</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <!-- <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script> -->
  <!-- <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script> -->
</head>
<body>
<?php require "header.php"; ?>
<div class="container-fluid row justify-content-center my-5 overflow-hidden">
<form class="border col-6 shadow-lg m-3 rounded-lg ">
<h2 class="mt-3 text-center">SIGN UP</h2>
<hr>
<!-- .........................................for Name.................... -->
<div class="form-group m-3 mt-4">
    <label for="name">Name:</label>
    <input type="name" class="form-control" placeholder="Enter name" id="name">
  </div>
  <!-- .........................................for email.................... -->
  <div class="form-group m-3 mt-3 form-row justify-content-center" id="confirm_email1">
  <div class="col-8 ">
    <label class="mt-3" for="email">Email address:</label>
    <input type="email" class="form-control" placeholder="Enter email" id="email">
  </div>
  <div class="col-4 text-center ">
  <button type="button" class="btn btn-warning m-3 mt-5 btn-block text-white" id="emailverify1">Verify</button>
  </div>
    </div>
      <!-- .........................................for confirm email.................... -->
      <div class="form-group m-3 mt-3 form-row justify-content-center" id="confirm_email2" style="display:none;">
  <div class="col-8 ">
    <label class="mt-3" for="emailotp">Enter OTP to confirm mail:</label>
    <input type="number" class="form-control" placeholder="Enter otp" id="emailotp">
  </div>
  <div class="col-4 text-center ">
  <button type="button" class="btn btn-warning m-3 mt-5 btn-block text-white" id="emailverify2">Verify</button>
  </div>
    </div>
   <!-- .........................................for Mobile number.................... -->
   <div class="form-group m-3 mt-3 form-row justify-content-center" id="confirm_number1" >
  <div class="col-8 ">
    <label for="number">Mobile number:</label>
    <input type="number" class="form-control" placeholder="Enter mobile number" id="number">
  </div>
  <div class="col-4 text-center ">
  <button type="button" class="btn btn-warning m-3 mt-5 btn-block text-white" id="numberverify1">Verify</button>
  </div>
    </div>
  <!-- .........................................for Mobile number.................... -->
  <div class="form-group m-3 mt-3 form-row justify-content-center" id="confirm_number2" style="display:none;">
  <div class="col-8 ">
    <label for="numberotp">Mobile number:</label>
    <input type="number" class="form-control" placeholder="Enter OTP" id="numberotp">
  </div>
  <div class="col-4 text-center ">
  <button type="button" class="btn btn-warning m-3 mt-5 btn-block text-white" id="numberverify2">Verify</button>
  </div>
    </div>
   <!-- .........................................for password.................... -->
  <div class="form-group m-3">
    <label for="pwd">Password:</label>
    <input type="password" class="form-control" placeholder="Enter password" id="pwd">
  </div>
 <!-- .........................................for register button.................... -->
<div class="text-center">
  <button type="button" class="btn btn-primary m-3 mt-1" disabled>Submit</button>
</div>
</form>
</div>
<script>
$(document).ready(function(){
    //.......................verify mailid through otp.............

// var value_opt = Math.floor(100000 + Math.random() * 900000);
	$("#emailverify1").click(function(e){

var mailid = $("#email").val();
if(mailid=="")
{
e.preventDefault();
alert("please enter a mailid");
}
else{
// alert("you clicked verify button");
console.log(mailid);
//console.log(value_opt);
// $("#otp_input").val(mailid);

$.ajax({
     url:"sendmailotp.php",
method:"POST",
data:{
 email_id : mailid 
},
success:function(data){
    // alert(data);
if(data=="Mail sent")
{
alert(data);
$("#emailverify1").hide();
$("#confirm_email2").show();
}
else{
alert(data);
}
},

});
} 
});
$("#emailverify2").click(function(){
var otp2=$("#emailotp").val();
$.ajax({
url:"match_otp.php",
method:"POST",
data:{
user1:otp2
},
success:function(data)
{

if(data==1)
{
    $("#confirm_email2").hide();
    // $("#verify_sucess").show();
// $("#opt_box").hide();
// $("#details_on_verify").show();
// $("#display_before_verification").hide();
// $("#display_before_mobile_verification").show();
// $("#number_row").show();
    // alert("you clicked confirm button:"+value_opt);
}
else{
    alert("OTP does not match.");
}
}
});

});
// .............................mobile verification............................
// alert("I am working");
$("#numberverify1").click(function(evt){
var mobile_number=$("#number").val();
if(mobile_number=="")
{
alert("please enter the mobile number.");
evt.preventDefault();
}
else if(mobile_number.length>10){
alert("The mobile number should be a 10 digit number.");
evt.preventDefault();
}
else if(mobile_number.length<10){
alert("The mobile number should be a 10 digit number.");
evt.preventDefault();
}
else{
//alert(mobile_number);
$.ajax({
url:"mobileverify.php",
method:"POST",
data:{mob_no:mobile_number},
success: function(data){
alert(data);
$("#numberverify1").hide();
$("#confirm_number2").show();
// $("#sendmsg").hide();
}

});
}
});
$("#numberverify2").click(function(){
var otp_mobile = $("#numberotp").val();

$.ajax({
url:"mobile_otp.php",
method : "POST",
data:{ mob_otp_user : otp_mobile},
success : function(data){
// alert(data);
if(data==1)
{
    $("#confirm_number2").hide();
    $(':input[type="button"]').prop('disabled', false);
// $("#display_after_mob_verification").show();
// $("#mobotp_box").hide();
// $("#display_before_mobile_verification").hide();
// $("#mobile_verify_success").show();
}
else{
alert("otp didn't match");

}
}
});
});

// .............................submit the form..........................
$(".btn-primary").click(function(){
    var name=$("#name").val();
var email=$("#email").val();

var number=$("#number").val();
var password=$("#pwd").val();


$.ajax({
    url:"registerdetails.php",
    type:"POST",
    data:{
        name:name,
       email:email,
        number:number,
        paswrd:password,
    },
    success: function(data){
      if(data=="1")
      {
        window.location.replace("login.php");
        alert("Signed up sucessfully");
      }
      else{
        alert("Sign up failed");
        window.location.replace("user_register.php");}
    }
                });//ajax close

});//btn click close

});//ready close
</script>
<?php require "footer.php"; ?>
</body>
</html>