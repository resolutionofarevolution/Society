<?php

$protocol = strtolower(substr($_SERVER["SERVER_PROTOCOL"],0,5))=='http'?'https':'http';
$severn=$_SERVER['SERVER_NAME'];
$server=$protocol."://".$severn."/";

include('../config.php');
$db_n="society_db";
$con=mysqli_connect($servername,$username,$password,$db_n);


if (isset($_POST['UID'])) 
{
echo $topic = $_POST['topic'];
echo $amt = $_POST['amt'];
echo $uid = $_POST['UID'];


	$sql="INSERT INTO payment_structure(ps_id,topic,amt)
VALUES(ps_id,'$topic','$amt')" ;

	if(mysqli_query($con,$sql))
	{
   		echo $sql;
 		header('location: '.$server.'Society/home/payments/assist2.php?in='.$uid);
	}
}

?>
