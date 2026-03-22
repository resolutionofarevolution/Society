<?php

$protocol = strtolower(substr($_SERVER["SERVER_PROTOCOL"],0,5))=='http'?'https':'http';
$severn=$_SERVER['SERVER_NAME'];
$server=$protocol."://".$severn."/";

include('config.php');
$db_n="id11548551_society_db";
$con=mysqli_connect($servername,$username,$password,$db_n);

$news_head = $_POST['news_head'];

$news_content = $_POST['news_content'];
$news_content;
$UID = $_POST['UID'];
$date = $_POST['date'];

$sql="INSERT INTO news_details(n_id,news_head,news_content,uid)
VALUES(n_id,'$news_head','$news_content','$UID')" ;

if(mysqli_query($con,$sql))
   {
   	echo $sql;
 header('location: '.$server.'Society/home/feed/index.php?in='.$UID);


}
?>
