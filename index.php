<?php
require "admin/dbcon.php";
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>  
    
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
   <script src='https://kit.fontawesome.com/a076d05399.js'></script>
    <title>CED CAB</title>
    <link rel="preconnect" href="https://fonts.gstatic.com">
<link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@500&display=swap" rel="stylesheet">
    <!-- <link href="style.css" type="text/css" rel="stylesheet"> -->
    <style>
     .backccolor{
        background-image : url("images/cab.jpg");
background-repeat: no-repeat;
background-size: 100% 100%;
     }
.sectionback{
 
margin-top:6vh;
}
.p1{
    padding-top:5%;
}
.design_form{
    margin-top:4vh;
    margin-bottom:26vh;
    border-radius: 10px;
box-shadow: 0 0 20px 13px black;
}
.btn{
background-color: #bfe00ce3;
}

.form_heading{background-color: #bfe00ce3;}
select{
    appearance: none;
}
/* Chrome, Safari, Edge, Opera */
input::-webkit-outer-spin-button,
input::-webkit-inner-spin-button {
  -webkit-appearance: none;
  margin: 0;
}

/* Firefox */
input[type=number] {
  -moz-appearance: textfield;
}


@media only screen and (min-device-width : 824px){
    .backccolor{
       
       overflow:hidden;
    }

}
@media only screen and (max-device-width : 767px){
    .backccolor{
       
        background-image : none;
        background-color: #bfe00ce3;
     }
     .p1{ padding-top:7%;}
     .p1,.p2{
         color: black;
     }
     .design_form{
    margin-bottom:30vh;}
}

}
@media only screen and (max-device-width : 280px){
    .sectionback{
 
 margin-top:14vh;
 }
 .p1{
     padding-top:5%;
 }
}
@media only screen and (device-width : 812px) and (device-height: 375px){
    .backccolor{
       
        overflow:visible;
     }

}
@media only screen and (device-width : 768px) and (device-height: 1024px){
    .sectionback{
 
 margin-top:6vh;
 }
 .p1{
     padding-top:18%;
 }
 .design_form{
    margin-top:11vh;}
}
}



</style>

  </head>
  <body class="backccolor">
      <?php include("header.php"); ?> 
    <section class="container-fluid sectionback">
<div class="text-center text-white">
                     <div class="p1"><h2><b>Book a City Taxi to your destination in town</b></h2> </div>
                     <div class="p2"><h3>Choose from a range of categories and prices</h3> </div>
</div>
   
    <div class=" container-fluid row m-0 p-0 row1">
    <div class="col-md-6 col-lg-6 col-xl-4 col-sm-12">
    <form class="px-3 py-1 design_form bg-white">
        <div class="form_div">
    <h5 class="text-center form_heading  m-2" ><b>CITY TAXI</b></h5>
</div>
<div class="text-center p-1">
    <h6><b>Your everyday travel partner</b></h6>
    <p>AC Cabs for point to point travel</p>
</div>
    <div class="input-group mb-2">  
  <div class="input-group-prepend">
    <span class="input-group-text" id="inputGroup-sizing-default">PICKUP</span>
  </div>
    <select class="form-control " style=" background-color: #e9ecef;" id="PICKUP">
      <option value="">Current Location</option>
      <?php $query_select="SELECT * FROM `tbl_location`";
       $result= $connect->query($query_select);
       $no_rows=$result->num_rows;
       for($i=0;$i<$no_rows;$i++){
               $row=$result->fetch_assoc();
       ?>
        <option value="<?php echo $row['name']; ?>"><?php echo $row['name']; ?></option>
       

                                 <?php
                                   }
                                 ?>

    </select>
  </div>
      <div class="input-group mb-2">  
  <div class="input-group-prepend">
    <span class="input-group-text" id="inputGroup-sizing-default">DROP</span>
  </div>
    <select class="form-control " style=" background-color: #e9ecef;" id="DROP">
      <option value="">Enter a Drop Location</option>
      <?php $query_select="SELECT * FROM `tbl_location`";
       $result= $connect->query($query_select);
       $no_rows=$result->num_rows;
       for($i=0;$i<$no_rows;$i++){
               $row=$result->fetch_assoc();
       ?>
        <option value="<?php echo $row['name']; ?>"><?php echo $row['name']; ?></option>
        <?php
           }
        ?>
 
    </select>
  </div>
  <div class="input-group mb-2">  
  <div class="input-group-prepend">
    <span class="input-group-text" id="inputGroup-sizing-default">CAB TYPE</span>
  </div>
    <select class="form-control" style=" background-color: #e9ecef;" id="cab_type">
      <option value="">Select Cab type</option>
      <option value="CedMicro">CedMicro</option>
      <option value="CedMini">CedMini</option>
      <option value="CedRoyal">CedRoyal</option>
      <option value="CedSUV">CedSUV</option>
    </select>
  </div>
   <div class="input-group mb-2">
  <div class="input-group-prepend">
    <span class="input-group-text" id="inputGroup-sizing-default">LUGGAGE</span>
  </div>
  <!-- <input type="number" onpaste="return false" class="form-control" id="weight" placeholder="Enter weight in KG"> -->
  <input type="number" onpaste="return false" class="form-control " style=" background-color: #e9ecef;" id="weight" aria-label="luggage" aria-describedby="inputGroup-sizing-default"  placeholder="Enter weight in Kgs">
</div>

<button class="btn btn-block mb-2" id="calculate_fare" type="button" ><b>CALCULATE FARE</b></button>
<!-- data-toggle="modal" data-target="#myModal" -->
</form>
</div>
</div>
<div class="modal fade"  id="myModal"  tabindex="-1">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header bg-dark">
        <h5 class="modal-title text-white"><i class="fas fa-car fa-lg" style="color:#bfe00ce3;"></i> GRAB YOUR <span style="color:#bfe00ce3;">CAB</span></h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true" style="color:#fff;">&times;</span>
        </button>
      </div>
      <div class="modal-body text-center" id="show_fare">
      </div>
      <div class="modal-footer bg-dark">
        <button type="button" class="btn bg-danger text-white" data-dismiss="modal" id="cancel_ride" >CANCEL</button>
        <button type="button" class="btn text-white" data-dismiss="modal" id="book_ride" >BOOK NOW</button>
        <!-- <button type="button" class="btn" data-dismiss="modal" >Back</button> -->
      </div>
    </div>
  </div>
</div>
</section>
<?php include("footer.php"); ?> 
<!-- <script src="script.js"> -->
<script>
$(document).ready(function(){ 
    


    var invalidChars = ["-","+","e",];
    
    $('#weight').on("input", function() {
      this.value = this.value.replace(/[e\+\-]/gi, "");
    });
    
    $('#weight').on("keydown", function(e) {
      if (invalidChars.includes(e.key)) {
        e.preventDefault();
      }
    });
    $('#weight').on("keypress",function(event){
      if (event.keyCode === 13)
      {
      event.preventDefault();
      
      }
      });


// ----------------hide value of the location dropdown-------------------------
    $('#PICKUP').change(function() {
    $("#DROP option").show();
    $('#DROP option[value='+ $(this).val()+ ']').hide();
    });
    
    $('#DROP').change(function() {
    $("#PICKUP option").show();
    $('#PICKUP option[value=' + $(this).val()+ ']').hide();
    });
//     $('select').change(function(){
// var a=$(this).val();
// $('select').find('option').each(function() {
//   if($(this).val()==a)
//   {$(this).hide();}
//   else{$(this).show();}
  
// });});

    $("#cab_type").change(function()
    {
        if($("#cab_type").val()=="CedMicro")
        {  $("#weight").val('');
           $("#weight").attr("placeholder","NO luggage in MICRO" ); 
            $("#weight").prop("disabled", true );
        }
        else {
         
            $("#weight").attr("placeholder","Enter weight in Kgs");
            $("#weight").prop("disabled", false );//enabled
            
        }
    });
// ---------------- to calculate fare---------------------------------------------
      $("#calculate_fare").click(function(){
      var pick_loc = $('#PICKUP').val();
    
      var drop_loc = $('#DROP').val();
      var cab=$("#cab_type").val();
      var wt=$('#weight').val();
      
      if($('#PICKUP').val()==""){
        alert("Enter pick up location");
            
          }
          else if($('#PICKUP').val()==$('#DROP').val()){
            alert("Drop location and Pick up location should be different");
         }
          else if($('#DROP').val()==""){
            alert("Enter drop location");
         }
         else if($('#cab_type').val()==""){
          alert("Select cab");
         }
         else if(wt>50)
      {
        alert("Weight should be less than 50kg");
            
          }
          else if(wt<0)
          {
            alert("Weight should be a positive value");
                
              }
         
        else{
          $("#myModal").modal('show');
    $.ajax({
        url: "farecalculate/calculations.php",
        type:"POST",
        data:{
            pick:pick_loc,
            drop:drop_loc,
            cab:cab,
            wt:wt
        },
        success:function(data){

            $("#show_fare").html(data);
         }
        });//ajax close
    }
    });//button click
  
});
// to send details to database
$("#cancel_ride").click(function(){
// alert("you clicked cancel button");
$.ajax({
  url: "farecalculate/unset.php",

});
$("#myModal").modal('hide');

});

$("#book_ride").click(function(){
$.ajax({
  url: "farecalculate/idb.php",
  success:function(data){
           if(data=='1')
           {
           window.location.replace('../CED_CAB/login.php');
           }
           else {
            window.location.replace('../CED_CAB/customer/userdashboard.php');
             alert("RIDE request send waiting for accepting request from admin");
           }
          
         },
});
});
  </script>

  </body>
</html>
