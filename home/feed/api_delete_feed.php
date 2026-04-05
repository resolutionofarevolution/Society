<?php
include($_SERVER['DOCUMENT_ROOT'].'/Society/config.php');

$con = mysqli_connect($servername,$username,$password,"society_db");

$id = $_POST['id'] ?? '';

if($id != ''){
    $id = (int)$id;

    if(mysqli_query($con,"DELETE FROM news_details WHERE id=$id")){
        echo "success";
    } else {
        echo "sql_error: ".mysqli_error($con);
    }
} else {
    echo "no_id";
}
?>
