<?php

$protocol = (!empty($_SERVER['HTTPS']) && $_SERVER['HTTPS'] !== 'off') ? 'https' : 'http';
$server = $protocol . "://" . $_SERVER['SERVER_NAME'] . "/";

include('../config.php');

$db_n="society_db";
$con=mysqli_connect($servername,$username,$password,$db_n);

if(!$con){
    die("Database connection failed: ".mysqli_connect_error());
}

define ("SECRETKEY", "mysecretkey1234");

/* -----------------------------
   SAFE POST VALUES
----------------------------- */

$uid    = $_POST['uid'] ?? '';
$nish   = $_POST['nish'] ?? '';
$method = $_POST['method'] ?? 'Cash';
$doneby = $_POST['doneby'] ?? '';
$amt    = $_POST['amt'] ?? '0';
$date   = $_POST['date'] ?? date("d/m/Y");

/* -----------------------------
   GET USER WHO PAID
----------------------------- */

$query = "SELECT * FROM user_details WHERE uid='$uid'";
$result = mysqli_query($con,$query);

$f_name="";
$l_name="";
$prof=0;

if($result && mysqli_num_rows($result)>0){
$row = mysqli_fetch_assoc($result);
$f_name = $row['f_name'];
$l_name = $row['l_name'];
$prof   = $row['prof_type'];
}

/* -----------------------------
   GET USER WHO RECEIVED PAYMENT
----------------------------- */

$hasheduid = $doneby;

$uid1 = openssl_decrypt($hasheduid,"AES-128-ECB",SECRETKEY);

$sql1="SELECT * FROM user_details WHERE uid='$uid1'";
$result1=mysqli_query($con,$sql1);

$f_name1="";
$l_name1="";
$prof1=0;

if($result1 && mysqli_num_rows($result1)>0){
$row1=mysqli_fetch_assoc($result1);
$f_name1=$row1['f_name'];
$l_name1=$row1['l_name'];
$prof1=$row1['prof_type'];
}

$late=0;

/* -----------------------------
   INSERT PAYMENT RECORD
----------------------------- */

$sql="INSERT INTO payment_details(uid,method,doneby,date,topic,amt)
VALUES('$uid','$method','$doneby','$date','$nish','$amt')";

mysqli_query($con,$sql);

?>

<!DOCTYPE html>
<html>
<head>

<meta charset="utf-8">
<title>Receipt</title>

<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
<link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css" rel="stylesheet">

<style>
.receipt-main{
background:#fff;
border-top:12px solid #9f181c;
border-bottom:12px solid #333;
margin-top:50px;
padding:40px;
box-shadow:0 1px 21px #acacac;
}
</style>

</head>

<body>

<div class="container" id="print">

<div class="receipt-main col-md-6 col-md-offset-3">

<h2 class="text-center">Payment Receipt</h2>

<hr>

<p><strong>Paid By:</strong> <?php echo $f_name." ".$l_name; ?></p>
<p><strong>User ID:</strong> <?php echo $uid; ?></p>

<p><strong>Received By:</strong> <?php echo $f_name1." ".$l_name1; ?></p>

<hr>

<table class="table table-bordered">

<thead>
<tr>
<th>Description</th>
<th>Amount</th>
</tr>
</thead>

<tbody>

<tr>
<td><?php echo $nish;?> Payment</td>
<td><i class="fa fa-inr"></i> <?php echo $amt;?></td>
</tr>

<tr>
<td class="text-right"><strong>Total</strong></td>
<td><strong><i class="fa fa-inr"></i> <?php echo $amt+$late;?></strong></td>
</tr>

</tbody>

</table>

<p><strong>Date:</strong> <?php echo $date;?></p>

<h4 class="text-muted">Thank you for payment!</h4>

</div>

</div>

<br>

<div class="text-center">

<a href="<?php echo $server;?>Society/home/index.php?in=<?php echo $hasheduid;?>">
<button class="btn btn-success"><i class="fa fa-home"></i> Home</button>
</a>

<button class="btn btn-danger" onclick="window.print()">
<i class="fa fa-print"></i> Print
</button>

</div>

</body>
</html>