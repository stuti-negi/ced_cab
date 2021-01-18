<?php
session_start();
require "dbcon.php";
// to display data on showdata.php

$show_data_query="SELECT * FROM `tbl_user`";
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
          if($row['status']=="1")
        {$stat="IS USER";}else{$stat="BLOCKED USER";}
        if($row['isadmin']== "1")
    {
        $output.="<tr>
    <th scope='row'>{$row['user_id']}</th>
    <td>{$row['name']}</td>
    <td>{$row['email_id']}</td>
    <td>{$row['dateofsignup']}</td>
    <td>{$row['mobile']}</td>
    <td>$stat</td>

    </tr>";
    }
    else
        {$output.="<tr>
    <th scope='row'>{$row['user_id']}</th>
    <td>{$row['name']}</td>
    <td>{$row['email_id']}</td>
    <td>{$row['dateofsignup']}</td>
    <td>{$row['mobile']}</td>
    <td>$stat</td>
    
    </tr>";}
      }
      // $output.= "</tbody></table";
  mysqli_close($connect);
 echo $output;
} else
{
 echo "no record found";
}

?>