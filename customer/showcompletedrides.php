<?php
session_start();
require "dbcon.php";
// to display data on showdata.php
$id=$_SESSION['userID'];
$show_data_query="SELECT `ride_id`,DATE(`ride_date`) as ride, `from`, `to`, `cab_type`, `total_distance`, `luggage`, `total_fare`, `status`, `customer_user_id` FROM `tbl_ride` WHERE `customer_user_id`='$id' AND `status`='2'";
$showresult=mysqli_query($connect,$show_data_query) or die("SQL Query Failed.");
$output="";
if(mysqli_num_rows($showresult)>0){

      while($row= mysqli_fetch_assoc($showresult))
   
      {
        if($row['status']=="1")
      {
        $status="<td class='text-warning'>PENDING..</td>";
      }
        else if($row['status']=="2"){
          $status="<td class='text-success'>COMPLETED</td>";
        }
        else{
          $status="<td class='text-danger'>CANCELED</td>";
         }
        $output.="<tr>
        <th scope='row'>{$row['ride_id']}</th>
       
        <td>{$row['from']}</td>
        <td>{$row['to']}</td>
        <td>{$row['cab_type']}</td>
        <td>{$row['luggage']}</td>
        <td>{$row['total_fare']}</td>
        <td>{$row['ride']}</td>
        $status   
        <td>
        <button class='btn btn-outline-primary invoice-btn' data-id='{$row["ride_id"]}'>RIDE DETAILS</td>    
        </tr>";
      }

  mysqli_close($connect);
 echo $output;
} else
{
 echo "no record found";
}

?>