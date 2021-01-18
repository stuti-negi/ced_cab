<?php
session_start();
require "dbcon.php";
$user_id=$_POST['uid'];

$name=$_POST['uname'];

$status=$_POST['ustatus'];
$num=$_POST['unumber'];

// $connect=mysqli_connect($server,$username,$password,$database) or die("connection failded");

$update_query=" UPDATE `tbl_user` SET 
`name`='$name',`status`='$status',
`mobile`='$num'
 
WHERE `user_id`=$user_id";
if(mysqli_query($connect,$update_query))
{
    echo 1;
} 
else
{
    echo 0;
}

?>