<?php
include($_SERVER['DOCUMENT_ROOT'].'/Society/config.php');

$con=mysqli_connect($servername,$username,$password,"society_db");

$type = $_GET['type'];

$q="SELECT * FROM complaints_details WHERE co_about='$type' ORDER BY datee DESC";
$res=mysqli_query($con,$q);

while($row=mysqli_fetch_assoc($res)){
echo '
<div class="c-card">
<div class="c-title">'.$row['co_head'].'</div>
<div class="c-tag">'.$row['co_about'].'</div>
<div class="c-content">'.$row['co_content'].'</div>
<div class="c-footer">'.$row['datee'].'</div>
</div>
';
}