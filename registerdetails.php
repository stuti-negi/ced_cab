<?php
$server="localhost";
$database="cedCab";
$username="root";
$password="";
// ...............................details
$email=$_POST['email'];
$name=$_POST['name'];
$num=$_POST['number'];
$pswrd=md5($_POST['paswrd']);
$connect=mysqli_connect($server,$username,$password,$database) or die("connection failded");
$insert_query="INSERT INTO `tbl_user`(`email_id`, `name`, `mobile`, `status`, `password`, `isadmin`)
 VALUES ('$email','$name', '$num','1','$pswrd','0')";

if( mysqli_query($connect,$insert_query))
{
    echo "1";
} else{
    echo "0";
}
// $parent_name=$_POST['pname'];


