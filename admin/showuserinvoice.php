<?php
session_start();
require "dbcon.php";
// to display data on showdata.php
$id=$_POST['ID'];
$show_data_query="SELECT `ride_id`,DATE(`ride_date`) as ride, `from`, `to`, `cab_type`, `total_distance`, `luggage`, `total_fare`, `customer_user_id`,`user_id`,`email_id`,`name`,`mobile`,`tbl_user`.`status` as userstatus, `tbl_ride`.`status` as ridestatus FROM `tbl_ride`,`tbl_user` WHERE `tbl_user`.`user_id`=`tbl_ride`.`customer_user_id` AND `tbl_ride`.`ride_id`='$id'";
$showresult=mysqli_query($connect,$show_data_query) or die("SQL Query Failed.");
$output="";
if(mysqli_num_rows($showresult)>0){

      while($row= mysqli_fetch_assoc($showresult))
   
      {
        if($row['userstatus']=="1"){$status="<span class='text-success'>ACTIVE</span>";}else{$status="<span class='text-danger'>BLOCKED</span>";}
        if($row['ridestatus']=="2"){$ridestatus="<span class='text-success'>COMPLETED</span>";}
        elseif($row['ridestatus']=="1"){$ridestatus="<span class='text-warning'>PENDING</span>";}
        else{$ridestatus="<span class='text-danger'>CANCELLED</span>";}
       
        $output.="<h3>
        <h3 scope='row'>RIDE ID :{$row['ride_id']}</h3>
        <h3>NAME : {$row['name']}</h3>
        <h3>NUMBER : {$row['mobile']}</h3>
        <h3>USER STATUS : $status</h3>
        <h3>RIDE STATUS : $ridestatus</h3>
        <h3>EMAIL ID : {$row['email_id']}</h3>
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