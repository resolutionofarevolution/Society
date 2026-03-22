<?php

$protocol = strtolower(substr($_SERVER["SERVER_PROTOCOL"],0,5))=='http'?'https':'http';
$severn=$_SERVER['SERVER_NAME'];
$server=$protocol."://".$severn."/";

include('config.php');
$db_n="id11548551_society_db";
$con=mysqli_connect($servername,$username,$password,$db_n);

$co_head = $_POST['co_head'];

$co_about = $_POST['co_about'];
$coeditor = $_POST['coeditor'];
$UID = $_POST['UID'];
$date = $_POST['date'];

$sql="INSERT INTO complaints_details(co_id,co_head,co_content,uid,co_about,datee)
VALUES(co_id,'$co_head','$coeditor','$UID' ,'$co_about','$date')" ;

if(mysqli_query($con,$sql))
   {
   	echo $sql;
 header('location: '.$server.'Society/home/complaints/index.php?in='.$UID);


}
?>
