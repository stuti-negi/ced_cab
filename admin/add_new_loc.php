<?php
session_start();
require "dbcon.php";
$location=$_POST['location'];
$distance=$_POST['distance'];
// echo "location";

$connect=mysqli_connect($server,$username,$password,$database) or die("connection failded");

$insert_query="INSERT INTO `tbl_location`( `name`, `distance`, `is_available`)
VALUES ('$location','$distance', '1')";
if(mysqli_query($connect,$insert_query))
{
    echo "Location added!";
} 
else
{
    echo "Unable to add Location !!";
}

?>