<?php

define("SECRETKEY","mysecretkey1234");

include('../../config.php');

$db_n="society_db";

$con=mysqli_connect($servername,$username,$password,$db_n);

$query="SELECT * FROM news_details ORDER BY id DESC";

$result=mysqli_query($con,$query);

?>

<h4 class="mb-4">Community Updates</h4>

<?php

while($row=mysqli_fetch_assoc($result)){

$news_head=$row['news_head'];
$news_content=$row['news_content'];
$hasheduid1=$row['uid'];

$uid1=openssl_decrypt($hasheduid1,"AES-128-ECB",SECRETKEY);

$sql1="SELECT * FROM user_details WHERE uid='$uid1'";
$result1=mysqli_query($con,$sql1);
$row1=mysqli_fetch_assoc($result1);

$f_name1=$row1['f_name'];
$l_name1=$row1['l_name'];

?>

<div class="announcement">

<div class="announcement-icon">
<i class="fa fa-bullhorn"></i>
</div>

<div class="announcement-body">

<h6><?php echo htmlspecialchars($news_head); ?></h6>

<p>
<?php echo nl2br(htmlspecialchars($news_content)); ?>
</p>

<div class="announcement-footer">

<?php echo $f_name1." ".$l_name1 ?>

</div>

</div>

</div>

<?php } ?>

<style>

.announcement{
display:flex;
background:white;
border-radius:10px;
padding:18px;
margin-bottom:18px;
box-shadow:0 2px 8px rgba(0,0,0,0.05);
}

.announcement-icon{
width:40px;
height:40px;
background:#2563eb;
color:white;
display:flex;
align-items:center;
justify-content:center;
border-radius:8px;
margin-right:15px;
}

.announcement-body h6{
margin-bottom:6px;
font-weight:600;
}

.announcement-body p{
color:#6b7280;
font-size:14px;
margin-bottom:8px;
}

.announcement-footer{
font-size:13px;
color:#9ca3af;
}

</style>