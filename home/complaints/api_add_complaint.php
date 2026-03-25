<?php
include($_SERVER['DOCUMENT_ROOT'].'/Society/config.php');

header('Content-Type: application/json');

$con = mysqli_connect($servername,$username,$password,"society_db");

$uid     = $_POST['uid'] ?? '';
$title   = $_POST['title'] ?? '';
$content = $_POST['content'] ?? '';

if($uid=='' || $title==''){
  echo json_encode(["status"=>"error","msg"=>"Missing data"]);
  exit;
}

// role check
$user = mysqli_fetch_assoc(mysqli_query($con,"SELECT prof_type FROM user_details WHERE uid='$uid'"));

if(!$user || $user['prof_type'] != 3){
  echo json_encode(["status"=>"error","msg"=>"Unauthorized"]);
  exit;
}

$q = "INSERT INTO complaint_details(uid,comp_head,comp_content,status,datee)
      VALUES('$uid','$title','$content','Open',NOW())";

if(mysqli_query($con,$q)){
  echo json_encode(["status"=>"success"]);
}else{
  echo json_encode(["status"=>"error","msg"=>mysqli_error($con)]);
}