<?php
session_start();
require "dbcon.php";
// $connect=mysqli_connect($server,$username,$password,$database) or die("connection failded");
$user_id = $_POST['ID'];
$update_query="UPDATE `tbl_ride` SET 
`status`='0' 
WHERE `ride_id`=$user_id";
if(mysqli_query($connect,$update_query))
{
    echo 1;
} 
else
{
    echo 0;
}

?>