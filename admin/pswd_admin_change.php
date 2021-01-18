<?php session_start();?>
<?php
require "dbcon.php";
$old = md5($_POST['old']);
$new = md5($_POST['new']);
$mail = $_SESSION['username'];
// echo $old."\n".$new;
$select_query="SELECT * FROM `tbl_user` WHERE `email_id`='$mail'";
$showresult=mysqli_query($connect,$select_query);

if(mysqli_num_rows($showresult)>0){
    $row= mysqli_fetch_assoc($showresult);
    $fetch_paswd = $row['password'];
    if($old==$fetch_paswd){
        $update_query=" UPDATE `tbl_user` SET 
        `password`='$new' WHERE `email_id`='$mail'";
   if(mysqli_query($connect,$update_query))
   {
      
       echo "PASSWORD CHANGED SUCESSFULLY";
   } 
   else
   {
       echo "PASSWORD CHANGE UN-SUCESSFULLY";
   }
    }
    else{
        echo "0";
    }

    // mysqli_close($connect);
  } 
  else
  {
   echo "no record found";
  }

// $update_query=" UPDATE `tbl_user` SET 
// `name`='$name',`status`='$status',
// `mobile`='$num'
 
// WHERE `email_id`='admin@gmail.com'";
// if(mysqli_query($connect,$update_query))
// {
//     echo 1;
// } 
// else
// {
//     echo 0;
// }

?>