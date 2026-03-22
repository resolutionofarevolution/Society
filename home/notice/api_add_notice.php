<?php
// Prevent PHP warnings from breaking your JSON output
error_reporting(0);

include('../../config.php');
$con = mysqli_connect($servername, $username, $password, "society_db");

// Retrieve data safely
$title   = mysqli_real_escape_string($con, $_POST['title'] ?? '');
$content = mysqli_real_escape_string($con, $_POST['content'] ?? '');
$topic   = mysqli_real_escape_string($con, $_POST['topic'] ?? '');
$uid     = mysqli_real_escape_string($con, $_POST['uid'] ?? '');

if (empty($title) || empty($uid)) {
    echo json_encode(["status" => "error", "message" => "Title or User ID missing"]);
    exit;
}

$sql = "INSERT INTO notice_details (uid, not_head, not_content, not_topic, datee)
        VALUES ('$uid', '$title', '$content', '$topic', NOW())";

if(mysqli_query($con, $sql)){
    echo json_encode(["status" => "success"]);
} else {
    echo json_encode(["status" => "error", "message" => mysqli_error($con)]);
}
?>