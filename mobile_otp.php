<?php
session_start();
$user1=$_POST["mob_otp_user"];
if($_SESSION["mob_otp"]==$user1)
{
    echo 1;

}
else
{
    echo 0;
}
// echo $_SESSION["mob_otp"];