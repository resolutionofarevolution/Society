<?php

$protocol = (!empty($_SERVER['HTTPS']) && $_SERVER['HTTPS'] !== 'off') ? 'https' : 'http';
$server = $protocol . "://" . $_SERVER['SERVER_NAME'] . "/";

include('config.php');

$db_n="society_db";
$con=mysqli_connect($servername,$username,$password,$db_n);

$not_head=$_POST['not_head'];
$topic=$_POST['not_topi'];
$content=$_POST['editor'];
$UID=$_POST['UID'];
$date=$_POST['date'];

$sql="INSERT INTO notice_details
(not_head,not_content,uid,not_topic,datee)

VALUES

('$not_head','$content','$UID','$topic','$date')";

if(mysqli_query($con,$sql)){

header("Location: ".$server."Society/home/notice/not1.php?in=".$UID);
exit();

}else{

echo "Error posting notice";

}

?>