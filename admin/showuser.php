<?php
session_start();
require "dbcon.php";
// to display data on showdata.php

$show_data_query="SELECT * FROM `tbl_user`";
$showresult=mysqli_query($connect,$show_data_query) or die("SQL Query Failed.");
$output="";
if(mysqli_num_rows($showresult)>0){

      while($row= mysqli_fetch_assoc($showresult))
   
      {
        $output.="<tr>
        <th scope='row'>{$row['user_id']}</th>
        <td>{$row['name']}</td>
        <td>{$row['email_id']}</td>
        <td>{$row['dateofsignup']}</td>
        <td>{$row['mobile']}</td>
        <td>{$row['status']}</td>
        <td><button class='btn btn-primary update-btn' data-eid='{$row["user_id"]}'><i class='fas fa-user-edit fa-lg'></i></td>
        <td><button class='btn btn-danger delete-btn' data-id='{$row["user_id"]}'><i class='far fa-trash-alt fa-lg'></i></td>
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