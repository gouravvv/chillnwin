<?php 
$user='';
$pass="";
$server="";
$dtbs="";
$con= mysqli_connect($server,$user,$pass,$dtbs);

if(!$con)
{
     echo "not connected";
    die ('error ocuured'.mysqli_connect_error());
}
date_default_timezone_set("Asia/Kolkata");
$time=date("Y-m-d H:i:s");


?>