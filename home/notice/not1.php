<?php

define("SECRETKEY","mysecretkey1234");

include('config.php');

$db_n="society_db";
$con=mysqli_connect($servername,$username,$password,$db_n);

$hasheduid=$_GET['in'];

$uid=openssl_decrypt($hasheduid,"AES-128-ECB",SECRETKEY);

$sql="SELECT * FROM user_details WHERE uid='$uid'";
$result=mysqli_query($con,$sql);
$user=mysqli_fetch_assoc($result);

$profile=$user['prof_type'];

?>

<link rel="stylesheet"
href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css">

<div class="container mt-4">

<div class="d-flex justify-content-between mb-4">

<h3>Society Notices</h3>

<?php if($profile==1){ ?>

<button class="btn btn-primary"
data-bs-toggle="modal"
data-bs-target="#noticeModal">

+ New Notice

</button>

<?php } ?>

</div>

<div class="row g-4">

<?php

$query="
SELECT n.*,u.f_name,u.l_name
FROM notice_details n
LEFT JOIN user_details u
ON n.uid=u.uid
ORDER BY n.id DESC
";

$result=mysqli_query($con,$query);

while($row=mysqli_fetch_assoc($result)){

$title=$row['not_head'];
$content=$row['not_content'];
$name=$row['f_name']." ".$row['l_name'];
$date=$row['datee'];

?>

<div class="col-md-6 col-lg-4">

<div class="card h-100 shadow-sm">

<div class="card-body">

<h5 class="card-title"><?php echo $title ?></h5>

<p class="card-text">

<?php echo $content ?>

</p>

</div>

<div class="card-footer">

Posted by <b><?php echo $name ?></b>

<br>

<small><?php echo $date ?></small>

</div>

</div>

</div>

<?php } ?>

</div>

</div>

<!-- NOTICE MODAL -->

<div class="modal fade" id="noticeModal">

<div class="modal-dialog">

<div class="modal-content">

<form method="POST" action="postnot1.php">

<div class="modal-header">

<h5>Create Notice</h5>

</div>

<div class="modal-body">

<input type="hidden" name="UID" value="<?php echo $uid ?>">

<input type="text"
name="not_head"
class="form-control mb-2"
placeholder="Notice Title"
required>

<textarea
name="editor"
class="form-control mb-2"
placeholder="Notice Content"
required></textarea>

<select name="not_topi"
class="form-control mb-2">

<option>Water Supply</option>
<option>Payment</option>
<option>Event</option>
<option>Other</option>

</select>

<input type="hidden"
name="date"
value="<?php echo date("d M Y") ?>">

</div>

<div class="modal-footer">

<button class="btn btn-success">
Post Notice
</button>

</div>

</form>

</div>

</div>

</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>