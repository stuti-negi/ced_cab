<?php
session_start();
require "dbcon.php";
// to display data on showdata.php

$show_data_query="SELECT * FROM `tbl_location`";
$showresult=mysqli_query($connect,$show_data_query) or die("SQL Query Failed.");
$output="";
if(mysqli_num_rows($showresult)>0){

      while($row= mysqli_fetch_assoc($showresult))
   
      {
     
        $output.="<tr>
    <th scope='row'>{$row['id']}</th>
    <td>{$row['name']}</td>
    <td>{$row['distance']}</td>
    <td>{$row['is_available']}</td>
 
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