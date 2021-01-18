<?php
session_start();
require "dbcon.php";
$user_name=$_POST['name'];

$number=$_POST['number'];

$id=$_SESSION['userID'];

// $connect=mysqli_connect($server,$username,$password,$database) or die("connection failded");

$update_query=" UPDATE `tbl_user` SET 
`name`='$user_name',`mobile`='$number'
 
WHERE `user_id`=$id";
if(mysqli_query($connect,$update_query))
{
  $_SESSION['name']=$user_name;
  $_SESSION['number']=$number;
    echo "CHANGES SAVED SUCESSFULLY!";
} 
else
{
    echo 0;
}

?>