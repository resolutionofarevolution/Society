<?php
include('../../config.php');

header('Content-Type: application/json');

$con=mysqli_connect($servername,$username,$password,"society_db");

$uid     = $_POST['uid'] ?? '';
$title   = $_POST['title'] ?? '';
$content = $_POST['content'] ?? '';

if($uid=='' || $content==''){
  echo json_encode(["status"=>"error","msg"=>"Missing data"]);
  exit;
}

$q = "INSERT INTO news_details(uid,news_head,news_content,date)
      VALUES('$uid','$title','$content',NOW())";

if(mysqli_query($con,$q)){
  echo json_encode(["status"=>"success"]);
}else{
  echo json_encode(["status"=>"error","msg"=>mysqli_error($con)]);
}