<?php
require "dbcon.php";
$id = $_POST['ID'];
$delete_query="DELETE FROM `tbl_location` WHERE `id`={$id}";
if( mysqli_query($connect,$delete_query))
{echo 1;
} else{
    echo 0;
}
?>