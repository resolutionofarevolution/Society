```php
<?php

define ("SECRETKEY", "mysecretkey1234");

if(isset($_GET['in'])){

$hasheduid = $_GET['in'];

$uid = openssl_decrypt($hasheduid, "AES-128-ECB", SECRETKEY);

include('../config.php');

/* FIXED DATABASE NAME */
$db_n="society_db";

$con=mysqli_connect($servername,$username,$password,$db_n);

if(!$con){
die("Database connection failed: ".mysqli_connect_error());
}

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

<meta charset="utf-8">

<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>

<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>

<link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css" rel="stylesheet">

<title>Payments</title>

<style>

body{
background-image:url('../background.jpg');
background-repeat:no-repeat;
background-size:100% 100%;
overflow:auto;
}

.jumbotron-flat{
background:white;
width:100%;
text-align:center;
}

.paymentAmt{
font-size:80px;
}

.centered{
text-align:center;
}

.title{
padding-top:15px;
}

</style>

</head>

<body>

<main class="page-content">

<div class="container-fluid">

<div class="row">

<div class="col-sm-1 col-lg-1 col-2">

<a href="../index.php?in=<?php echo $hasheduid; ?>">
<i style="font-size:300%; padding-top:40%;" class="fa fa-arrow-circle-left"></i>
</a>

</div>

<div class="col-sm-3">

<h2 style="color:#aaaaaf;font-size:200%;padding-top:18%;">
Payments
</h2>

</div>

<div class="col-sm-12">
<hr>
</div>

</div>

<?php

switch ($profile) {

case 1:
pay1($hasheduid);
break;

case 3:
pay3($hasheduid);
break;

}

?>

</div>

</main>

</body>

</html>


<?php

/* ADMIN PAYMENTS */

function pay1($hasheduid){
?>

<div class="container">
<div class="row">

<div class="col-6 col-lg-4">

<a href="../payments/assist2.php?in=<?php echo $hasheduid; ?>">

<div class="box21">

<div class="our-team-main">

<div class="team-front">

<div class="row">

<div class="col-lg-5" style="background:#9c27b0">
<i style="font-size:300%;" class="fa fa-money"></i>
</div>

<div class="col-lg-5">
<span>Collect cash</span>
</div>

</div>

</div>

</div>

</div>

</a>

</div>


<div class="col-6 col-lg-4">

<a href="../payments/assist3.php?in=<?php echo $hasheduid; ?>">

<div class="box21">

<div class="our-team-main">

<div class="team-front">

<div class="row">

<div class="col-lg-5" style="background:#4caf50">
<i style="font-size:300%" class="fa fa-history"></i>
</div>

<div class="col-lg-5">
<span>Pay History</span>
</div>

</div>

</div>

</div>

</div>

</a>

</div>

</div>
</div>

<?php
}



/* RESIDENT PAYMENTS */

function pay3($hasheduid){
?>

<div class="container">
<div class="row">

<div class="col-6 col-lg-4">

<a href="../payments/assist.php?in=<?php echo $hasheduid; ?>">

<div class="box21">

<div class="our-team-main">

<div class="team-front">

<div class="row">

<div class="col-lg-5" style="background:#9c27b0">
<i style="font-size:300%" class="fa">&#xf156;</i>
</div>

<div class="col-lg-5">
<span>Proceed to Pay</span>
</div>

</div>

</div>

</div>

</div>

</a>

</div>


<div class="col-6 col-lg-4">

<a href="../payments/assist1.php?in=<?php echo $hasheduid; ?>">

<div class="box21">

<div class="our-team-main">

<div class="team-front">

<div class="row">

<div class="col-lg-5" style="background:#4caf50">
<i style="font-size:300%" class="fa fa-history"></i>
</div>

<div class="col-lg-5">
<span>Pay History</span>
</div>

</div>

</div>

</div>

</div>

</a>

</div>

</div>
</div>

<?php
}

?>
```
