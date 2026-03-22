<?php

include('../../config.php');

$con=mysqli_connect($servername,$username,$password,"society_db");

$id=$_GET['id'];

mysqli_query($con,"DELETE FROM notice_details WHERE id=$id");

header("Location:index.php");

?>