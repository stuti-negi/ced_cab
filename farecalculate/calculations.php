<?php
include "../con_db.php";
$pick= $_POST['pick'];
$drop=$_POST['drop'];
$cab=$_POST['cab'];
$wt=$_POST['wt'];
if($wt=="")
{
    $wt="0";
}
$pickdis_query="SELECT distance FROM `tbl_location` WHERE `name`='$pick'";
$pickdis=mysqli_query($connect,$pickdis_query) or die("SQL Query Failed.");
$pickdistance= mysqli_fetch_assoc($pickdis);
$dropdis_query="SELECT distance FROM `tbl_location` WHERE `name`='$drop'";
$dropdis=mysqli_query($connect,$dropdis_query) or die("SQL Query Failed.");
$dropdistance= mysqli_fetch_assoc($dropdis);

setcookie("pickup_location", $pick, time() + (86400 * 30), "/");
echo ' <h2>PICK UP AT :<'.$pick.'</h2>';
setcookie("drop_location", $drop, time() + (86400 * 30), "/");
echo "<h2>DROP AT :".$drop."</h2>";
setcookie("cab_type", $cab, time() + (86400 * 30), "/");
echo "<h2>CAB SELECTED :".$cab."</h2>";
setcookie("luggage_wt", $wt, time() + (86400 * 30), "/");
//echo "<br>Luggage weight :".$wt."kg";
$fare=0;
$wt_cost=0;
// $distance=abs($location[$drop]-$location[$pick]);
$distance=abs($pickdistance['distance']-$dropdistance['distance']);

setcookie("distance", $distance, time() + (86400 * 30), "/");
echo "<h2>TOTAL DISTANCE :".$distance."kms"."</h2>";
if($cab=="CedMicro")
{
    $wt="0";
    setcookie("luggage_wt", $wt, time() + (86400 * 30), "/");
}
$obj= new car();
if($cab=="CedMicro")
{
$obj->fare_micro();

setcookie("fare", $fare, time() + (86400 * 30), "/");
echo "<h2>TOTAL FARE :".$fare."</h2>";
}
if($cab=="CedMini"){
    $obj-> fare_mini();
    $obj->fare_weight();
    setcookie("fare", $fare, time() + (86400 * 30), "/");
    echo "<h2>TOTAL FARE :".($fare+$wt_cost)."</h2>";
}
if($cab=="CedRoyal"){
    $obj->fare_royal();
    $obj->fare_weight();
    setcookie("fare", $fare, time() + (86400 * 30), "/");
    echo "<h2>TOTAL FARE :".($fare+$wt_cost)."</h2>";
}
if($cab=="CedSUV"){
    $obj->fare_suv();
    $obj->fare_weight();
    setcookie("fare", $fare, time() + (86400 * 30), "/");
    echo "<h2>TOTAL FARE :".($fare+($wt_cost*2))."</h2>";
}
class car
{
    function fare_micro()
{
    global $distance;
    global $fare;
    if($distance>0 && $distance<=10)
    {
        $fare=50+$distance*13.50;
    }
    elseif($distance>10 && $distance<=60)
    {
        $fare=50+(10*13.50)+(($distance-10)*12);
    }
    elseif($distance>60 && $distance<=160)
    {
        $fare=50+(10*13.50)+(50*12)+(($distance-60)*10.20);
    }
    elseif($distance>160)
    {
        $fare=50+(10*13.50)+(50*12)+(100*10.20)+(($distance-160)*8.50);
    }
    return $fare;
}
function fare_mini()
{
    global $distance;
    global $fare;
    if($distance>0 && $distance<=10)
    {
        $fare=150+$distance*14.50;
    }
    elseif($distance>10 && $distance<=60)
    {
        $fare=150+(10*14.50)+(($distance-10)*13);
    }
    elseif($distance>60 && $distance<=160)
    {
        $fare=150+(10*14.50)+(50*13)+(($distance-60)*11.20);
    }
    elseif($distance>160)
    {
        $fare=150+(10*14.50)+(50*13)+(100*11.20)+(($distance-160)*9.50);
    }
    return $fare;
}
function fare_royal()
{
    global $distance;
    global $fare;
    if($distance>0 && $distance<=10)
    {
        $fare=200+$distance*15.50;
    }
    elseif($distance>10 && $distance<=60)
    {
        $fare=200+(10*15.50)+(($distance-10)*14);
    }
    elseif($distance>60 && $distance<=160)
    {
        $fare=200+(10*15.50)+(50*14)+(($distance-60)*12.20);
    }
    elseif($distance>160)
    {
        $fare=200+(10*15.50)+(50*14)+(100*12.20)+(($distance-160)*10.50);
    }
    return $fare;
}
function fare_suv()
{
    global $distance;
    global $fare;
    if($distance>0 && $distance<=10)
    {
        $fare=250+$distance*16.50;
    }
    elseif($distance>10 && $distance<=60)
    {
        $fare=250+(10*16.50)+(($distance-10)*15);
    }
    elseif($distance>60 && $distance<=160)
    {
        $fare=250+(10*16.50)+(50*15)+(($distance-60)*13.20);
    }
    elseif($distance>160)
    {
        $fare=250+(10*16.50)+(50*15)+(100*13.20)+(($distance-160)*11.50);
    }
    return $fare;
}
function fare_weight(){
    global $wt_cost;
    global $wt;
    if($wt>0 && $wt<=10)
    {
        $wt_cost=50;
    }
    elseif($wt>10 && $wt<=20)
    {
        $wt_cost=100;
    }
    elseif($wt>20)
    {
        $wt_cost=200;
       }
    return  $wt_cost;
}
}

?>
