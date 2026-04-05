<?php
include($_SERVER['DOCUMENT_ROOT'].'/Society/config.php');

$con = mysqli_connect($servername,$username,$password,"society_db");

$id = $_POST['id'] ?? '';

if($id != ''){
    mysqli_query($con,"DELETE FROM news_details WHERE id='$id'");
}

// Redirect back
header("Location: ".$_SERVER['HTTP_REFERER']);
exit();
?>