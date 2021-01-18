<?php
session_start();
$user1=$_POST["user1"];
if($_SESSION["otpset"]==$user1)
{
    echo 1;

}
else
{
    echo 0;
}