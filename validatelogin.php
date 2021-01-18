<?php
session_start();
require "con_db.php";
$email = $_POST['name'];

$password1 = $_POST['pswd'];
$query_email="SELECT * FROM `tbl_user` WHERE email_id='$email'";

$res= $connect->query($query_email);
if($res->num_rows>0){
$data= $res->fetch_assoc();
$dbpass = $data['password'];
// echo $dbpass;
$_SESSION['username']= $data['email_id'];
$_SESSION["userID"] = $data['user_id'];
$_SESSION["name"]=$data['name'];
$_SESSION["number"]=$data['mobile'];
$_SESSION["usertype"] = $data['isadmin'];
$dbisadmin = $data['isadmin'];
// if(isset($_SESSION['book']))
// {
//      header('Location: farecalculate/idb.php');
// }

if ($dbpass === md5($password1)) {
     if($dbisadmin === "0"){
          echo 2;//is user
     }
     else
     {
          echo 1;//is admin
     }

}
else{
echo 0;//pswd not match
}
}
else{
echo "Email not registered!!";
}


     //
    //  if ($dbpass === $password) {
    //     echo "<script> alert('Login successful')
    //     location.replace('index.php');
    //     </script>";
    //     }
    //     else{
    //     echo "<script> alert('Password wrong!') </script>";
    //     }
    //     }
    //     else{
    //     echo "<script> alert('Email not registered!');</script>";
    //     }
    //     }
         