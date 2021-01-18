<?php
session_start();
require "dbcon.php";
// to display data on showdata.php
$id=$_POST['ID'];
$show_data_query="SELECT `ride_id`,DATE(`ride_date`) as ride, `from`, `to`, `cab_type`, `total_distance`, `luggage`, `total_fare`, `status`, `customer_user_id` FROM `tbl_ride` WHERE `ride_id`='$id'";
$showresult=mysqli_query($connect,$show_data_query) or die("SQL Query Failed.");
$output="";
if(mysqli_num_rows($showresult)>0){

      while($row= mysqli_fetch_assoc($showresult))
   
      {
       
        $output.="<h3>
        <h3 scope='row'>RIDE ID :{$row['ride_id']}</h3>
       
        <h3>PICK UP :{$row['from']}</h3>
        <h3>DROP :{$row['to']}</h3>
        <h3>CAB TYPE :{$row['cab_type']}</h3>
        <h3>LUGGAGE :{$row['luggage']}</h3>
        <h3>FARE : {$row['total_fare']}</h3>
        <h3>RIDE DATE : {$row['ride']}</h3>
             
        </h3>";
      }

  mysqli_close($connect);
 echo $output;
} else
{
 echo "no record found";
}

?>