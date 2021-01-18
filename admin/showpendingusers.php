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
          if($row['status']=="1")
        {$stat="IS USER";}else{$stat="BLOCKED USER";}
        if($row['isadmin']== "0" && $row['status']=="0")
   
        {$output.="<tr>
    <th scope='row'>{$row['user_id']}</th>
    <td>{$row['name']}</td>
    <td>{$row['email_id']}</td>
    <td>{$row['dateofsignup']}</td>
    <td>{$row['mobile']}</td>
    <td>$stat</td>
    <td><button class='btn btn-outline-success request-accept' data-id='{$row["user_id"]}'>ACCEPT</td>
    
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