<?php
session_start();
require "dbcon.php";
// to display data on showdata.php

$show_data_query="SELECT `ride_id`,DATE(`ride_date`) as ride, `from`, `to`, `cab_type`, `total_distance`, `luggage`, `total_fare`, `status`, `customer_user_id` FROM `tbl_ride` where `status`='1'";
$showresult=mysqli_query($connect,$show_data_query) or die("SQL Query Failed.");
$output="";
if(mysqli_num_rows($showresult)>0){

  // $output.= "<table border='1' id='datatable' width='100%' cellspacing='0' cellpadding='10px' class='bg-light'  style='border-radius:20px;'>
  // <thead style='border-radius:20px;'>
  // <tr >
  //   <th>ID</th>
  //   <th>Name</th>
  //   <th>Mail ID</th>
  //   <th>DATE of BIRTH</th>
  //   <th>Gender</th>
  //   <th>Parent's Name</th>
  //   <th>Number</th>
  //   <th>City</th>
  //   <th>Update</th>
  //   <th>Delete</th>
  //   </tr>
  //   </thead>
  //   <tbody>";
      while($row= mysqli_fetch_assoc($showresult))
   
      {
        $output.="<tr>
        <th scope='row'>{$row['ride_id']}</th>
       
        <td>{$row['from']}</td>
        <td>{$row['to']}</td>
        <td>{$row['cab_type']}</td>
        <td>{$row['luggage']}</td>
        <td>{$row['total_fare']}</td>
        <td>{$row['ride']}</td>
        <td class='text-warning'>PENDING..</td>
        <td>{$row['customer_user_id']}</td>
        <td><button class='btn btn-outline-success accept-btn' data-id='{$row["ride_id"]}'>ACCEPT
        <button class='btn btn-outline-danger cancel-btn mt-1' data-id='{$row["ride_id"]}'>CANCEL</td>
        <td><button class='btn btn-outline-primary invoice-btn mt-1' data-id='{$row["ride_id"]}'>RIDE DETAILS</td>    

        </tr>";
      }
      // $output.= "</tbody></table";
  mysqli_close($connect);
 echo $output;
} else
{
 echo "no record found";
}

?>