<?php
session_start();

require "../admin/dbcon.php";
$fl=$_COOKIE["pickup_location"];
$tl=$_COOKIE["drop_location"];
 $ct=$_COOKIE["cab_type"];
  $td =$_COOKIE["distance"];
   $lug=$_COOKIE["luggage_wt"];
    $tf=$_COOKIE["fare"];
    //  $s=$_COOKIE["1"];
    $s="1";
    //   $cid =$_COOKIE[3];

if(!isset($_SESSION['name'])){
    
    echo "1";
    $_SESSION['book']="1";
}
else{
    $cid=$_SESSION['userID'];
$query_insert="INSERT INTO `tbl_ride`( `from`, `to`, `cab_type`, `total_distance`, `luggage`, `total_fare`, `status`, `customer_user_id`) VALUES ('$fl','$tl','$ct', '$td', '$lug', '$tf', '$s', '$cid')";
$connect->query($query_insert);
}
// {
//     echo "data inserted";
// }
// else{
//     echo "data not inserted";
// }

?>