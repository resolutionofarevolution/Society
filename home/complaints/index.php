```php
<?php

$protocol = (!empty($_SERVER['HTTPS']) && $_SERVER['HTTPS'] !== 'off') ? 'https' : 'http';
$server   = $protocol . "://" . $_SERVER['SERVER_NAME'] . "/";

define ("SECRETKEY", "mysecretkey1234");

include($_SERVER['DOCUMENT_ROOT'].'/Society/config.php');

$db_n="society_db";
$con=mysqli_connect($servername,$username,$password,$db_n);

if(!$con){
die("Database connection failed: ".mysqli_connect_error());
}

if(isset($_GET['in'])){

$hasheduid = $_GET['in'];

$uid = openssl_decrypt($hasheduid, "AES-128-ECB", SECRETKEY);

$sql="SELECT * FROM user_details where uid='$uid'";
$result=$con->query($sql);

$row = mysqli_fetch_array($result);

$profile = $row['prof_type'];
$f_name = $row['f_name'];
$l_name = $row['l_name'];

}

include('../sidebar.php');

?>

<!DOCTYPE html>
<html>
<head>

<link rel="stylesheet" href="https://unpkg.com/flickity@2/dist/flickity.min.css">

<link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet">

<script src="//code.jquery.com/jquery-3.3.1.min.js"></script>

<script src="https://unpkg.com/flickity@2/dist/flickity.pkgd.min.js"></script>

<title>Complaints</title>

<style>

body{
background-image:url('http://localhost/Society/home/background.jpg');
background-size:cover;
background-repeat:no-repeat;
}

.gallery{
width:100%;
}

.slide{
width:280px;
margin-right:20px;
}

#noti{
width:280px;
height:200px;
}

#row1{
overflow:auto;
height:520px;
}

</style>

</head>

<body>

<main class="page-content">

<div class="container-fluid">

<div class="row">

<div class="col-sm-1 col-lg-1 col-2">

<a href="<?php echo $server; ?>Society/home/index.php?in=<?php echo $hasheduid; ?>">
<i style="font-size:300%; padding-top:40%;" class="fa fa-arrow-circle-left"></i>
</a>

</div>

<div class="col-sm-3">

<h2 style="color:#aaaaaf;padding-top:18%;">
COMPLAINTS
</h2>

</div>

<div class="col-sm-12">
<hr>
</div>

<?php

switch ($profile) {

case 1:
co1($hasheduid);
break;

case 3:
co3($hasheduid);
break;

}

?>

</div>
</div>

</main>

<script>

$('.slider').flickity({
cellAlign:'left',
contain:true,
pageDots:true,
prevNextButtons:false
});

</script>

</body>
</html>


<?php

function co3($hasheduid){

include($_SERVER['DOCUMENT_ROOT'].'/Society/config.php');

$con=mysqli_connect($servername,$username,$password,"society_db");

?>

<div class="row" id="row1">

<div class="card-columns">

<div class="card">

<div class="card-body">

<h3>Write New Complaint</h3>

<form action="postco3.php" method="POST">

<label>Complaint Header</label>

<input type="text" class="form-control" name="co_head">

<label>Complaint About</label>

<select class="form-control" name="co_about">

<option>Administrator</option>
<option>Security person</option>
<option>Resident</option>

</select>

<label>Complaint</label>

<textarea name="coeditor" class="form-control"></textarea>

<input type="hidden" name="UID" value="<?php echo $hasheduid; ?>">

<br>

<button class="btn btn-primary">POST COMPLAINT</button>

</form>

</div>
</div>

<?php

$query="SELECT * FROM complaints_details WHERE uid='$hasheduid'";

$result=mysqli_query($con,$query);

while($row=mysqli_fetch_array($result)){

$co_head=$row['co_head'];
$co_content=$row['co_content'];
$date=$row['datee'];

$uid=$row['uid'];

$uid = openssl_decrypt($uid,"AES-128-ECB",SECRETKEY);

$sql="SELECT * FROM user_details where uid='$uid'";

$r=$con->query($sql);

$u=mysqli_fetch_array($r);

$name=$u['f_name']." ".$u['l_name'];

?>

<div class="card bg-dark text-white">

<div class="card-body">

<h5><?php echo $co_head ?></h5>

<p><?php echo $co_content ?></p>

<footer class="blockquote-footer text-right">

<cite><?php echo $name ?></cite><br>

<?php echo $date ?>

</footer>

</div>
</div>

<?php } ?>

</div>
</div>

<?php }



function co1($hasheduid){

include($_SERVER['DOCUMENT_ROOT'].'/Society/config.php');

$con=mysqli_connect($servername,$username,$password,"society_db");

$topic=array("Administrator","Security person","Resident");

?>

<div class="container" style="height:450px;overflow:auto">

<?php

for($x=0;$x<3;$x++){

$query="SELECT * FROM complaints_details where co_about='$topic[$x]'";

$result=mysqli_query($con,$query);

$count=mysqli_num_rows($result);

?>

<div class="gallery slider">

<div class="slide card text-center bg-dark text-white">

<div class="card-body">

<h2><?php echo $topic[$x] ?></h2>

<?php

if($count==0){
echo "NO COMPLAINTS";
}
else{
echo "(".$count.") Swipe →";
}

?>

</div>
</div>

<?php

while($row=mysqli_fetch_array($result)){

$co_head=$row['co_head'];
$co_content=$row['co_content'];
$date=$row['datee'];

$uid=$row['uid'];

$uid = openssl_decrypt($uid,"AES-128-ECB",SECRETKEY);

$sql="SELECT * FROM user_details where uid='$uid'";

$r=$con->query($sql);

$u=mysqli_fetch_array($r);

$name=$u['f_name']." ".$u['l_name'];

?>

<div class="slide card bg-warning text-white">

<div class="card-body">

<h5><?php echo $co_head ?></h5>

<p><?php echo $co_content ?></p>

<footer class="blockquote-footer text-right">

<cite><?php echo $name ?></cite><br>

<?php echo $date ?>

</footer>

</div>
</div>

<?php } ?>

</div>

<?php } ?>

</div>

<?php } ?>
```
