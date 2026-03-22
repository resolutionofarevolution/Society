<?php

$protocol = strtolower(substr($_SERVER["SERVER_PROTOCOL"],0,5))=='http'?'https':'http';
$severn=$_SERVER['SERVER_NAME'];
$server=$protocol."://".$severn."/";

include('../config.php');
$db_n="id11548551_society_db";
$con=mysqli_connect($servername,$username,$password,$db_n);


if (isset($_POST['UID'])) 
{
echo $entryname = $_POST['entryname'];
echo $Visit_to = $_POST['Visit_to'];
echo $Category = $_POST['Category'];
echo $Reason = $_POST['Reason'];
echo $entered_by = $_POST['UID'];
date_default_timezone_set('Asia/Calcutta');
echo $entry_time = date('d/m/Y h:i a', time());

	$sql="INSERT INTO entry_register(entry_id,name,visit_to,category,reason,entry_time,entered_by,exit_time,exited_by)
VALUES(entry_id,'$entryname','$Visit_to','$Category','$Reason','$entry_time','$entered_by','Not yet','')" ;

	if(mysqli_query($con,$sql))
	{
   		echo $sql;
 		header('location: '.$server.'Society/home/EnteryExit/entry.php?in='.$entered_by);
	}
}
if (isset($_POST['UID1'])) 
{

echo $exited_by = $_POST['UID1'];
echo $entry_id = $_POST['entry_id'];

date_default_timezone_set('Asia/Calcutta');
echo $exit_time = date('d/m/Y h:i a', time());

	$sql1="UPDATE entry_register SET exit_time='$exit_time', exited_by='$exited_by' WHERE entry_id='$entry_id'";

	if(mysqli_query($con,$sql1))
	{
   		echo $sql1;
 		header('location: '.$server.'Society/home/EnteryExit/entry.php?in='.$exited_by);
	}
}

?>
