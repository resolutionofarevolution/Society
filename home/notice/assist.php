<!DOCTYPE html>
<html>
<head>
 <link rel="stylesheet" href="http://localhost/Raw%20elements/8)Carousel/flickity.css" media="screen">

 <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
<script src="//code.jquery.com/jquery-1.11.1.min.js"></script>

 <style type="text/css">
* {
  -webkit-box-sizing: border-box;
  box-sizing: border-box;
}

body { font-family: sans-serif; }

.gallery {
  background: rgba(0,0,0,0.1);

}

.gallery-cell {
  width: 28%;
  height: 200px;
  margin-right: 10px;
  background: #8C8;
  counter-increment: gallery-cell;
}

.gallery-cell.is-selected {
  background: #ED2;
}

/* cell number */
.gallery-cell:before {
  display: block;
  text-align: center;
  content: counter(gallery-cell);
  line-height: 200px;
  font-size: 80px;
  color: white;
}


 </style>
</head>
<body>

<script src="http://localhost/Raw%20elements/8)Carousel/flickity.pkgd.min.js"></script>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q"
        crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl"
        crossorigin="anonymous"></script>

<link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<!------ Include the above in your HEAD tag ---------->

<script src="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.6.0/slick.js"></script>


</body>
</html>
<script>
$(document).ready(function(){
    $('.customer-logos').slick({
        slidesToShow: 6,
        slidesToScroll: 1,
        autoplay: true,
        autoplaySpeed: 1500,
        arrows: false,
        dots: false,
        pauseOnHover: false,
        responsive: [{
            breakpoint: 768,
            settings: {
                slidesToShow: 4
            }
        }, {
            breakpoint: 520,
            settings: {
                slidesToShow: 3
            }
        }]
    });
});
</script>

  <?php 
define ("SECRETKEY", "mysecretkey1234");

if(isset($_GET['in'])){

$hasheduid = $_GET['in'];
//echo "</br>".$hasheduid;

$uid = openssl_decrypt($hasheduid, "AES-128-ECB", SECRETKEY);
//echo $uid;
include('config.php');
$db_n="id11548551_society_db";
$con=mysqli_connect($servername,$username,$password,$db_n);

$sql="SELECT * FROM user_details where uid='$uid'";
$result=$con->query($sql);
$row = mysqli_fetch_array($result);
$profile = $row['prof_type'];
//echo $profile;
$f_name = $row['f_name'];
//echo $f_name;
$l_name = $row['l_name'];
//echo $l_name;

}
include('sidebar.php');

?>

<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <link href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/js/bootstrap.min.js"></script>
<script src="//code.jquery.com/jquery-1.11.1.min.js"></script>

  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
        <title>Derwiki's Stripe Payment form + checkout'</title>
        <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css" rel="stylesheet" integrity="sha256-k2/8zcNbxVIh5mnQ52A0r3a6jAgMGxFJFE2707UxGCk= sha512-ZV9KawG2Legkwp3nAlxLIVFudTauWuBpC10uEafMHYL0Sarrz5A7G79kXh5+5+woxQ5HM559XX2UZjMJ36Wplg==" crossorigin="anonymous">
        <link href="http://localhost/Society/home/style.css" rel="ownstyle" >
        
        <style type="text/css">
 @import url(http://localhost/Society/home/style.css);
          
 @import url(https://fonts.googleapis.com/css?family=Open+Sans:300);
      body
{

    background-image: url('http://localhost/Society/home/background.jpg'); 


   background-repeat: no-repeat;
   background-size: 100% 100%;
   overflow: auto;

}

@media (max-width: 425px) { 
#noti
{
	width:100%; 
	height: 300px;
}
}
@media (min-width: 768px) { 
#noti
{
	width:30%; 
	height: 180px;
}
}
.redBackground { background-color:#9c27b0; }
.blueBackground { background-color:#336699;}
.greenBackground { background-color:#607d8b; }
</style>

</head>

    <body >
<main class="page-content">

    <div class="container-fluid" >


 	<div class="row">
      <div class="col-sm-1 col-lg-1 col-2 padding-top">  
      <a href="http://localhost/Society/home/index.php?in=<?php echo $hasheduid; ?>">
        <i style="font-size:300%; padding-top: 40%;  " class="fa fa-arrow-circle-left"></i>
      </a>  
</div>
<div class="col-sm-1 col-lg-1 col-1"> 
  <h2 style="color: #aaaaaf; font-size:200%; padding-top: 18%;  ">
  Notices
  </h2>
</div>
</div>
<div class="row">
<div class="col-sm-12">
      <hr>
</div>
</div>

<?php

switch ($profile) {
    case 1:
          //include('payments1.php');
        break;
    case 3: notice3();
    ?>
    
    <?php
        break;
            }
            notice3();
?>

</div>

</main>
</body>

</html>
<?php
function notice3()
{
?>
<div class="container">
<div class="row" style="height: 450px; overflow-y: auto; overflow-x: hidden;">

<div class="col-sm-12 " style="height: 10px">
  	<h2 style="color: black;">Water supply Realated</h2>
</div>
<?php
slider();?>

<div class="col-sm-12">

  	<h2 style="color: black;">Water supply Realated</h2>

</div>
<?php
slider();?>
<div class="col-sm-12">
<font style="">
  	<h2 style="color: black;">Water supply Realated</h2>
</font>
</div>

<?php
slider();?>
</div>
</div>
<?php

}

function slider()
{
?>

 <div class="container" style="height: 230px;">
    	   <div class="row "  style="height: 200px;" >
   <div class="gallery js-flickity slider col"    > 
   
   
     

          <?php


          include('config.php');
$db_n="id11548551_society_db";
$con=mysqli_connect($servername,$username,$password,$db_n);

$sql="SELECT * FROM user_details";
$result=$con->query($sql);
$x=0;
        while ($row = mysqli_fetch_array($result))
        {

        $x++; 

        $class = ($x%2 == 0)? 'bg-success': 'bg-warning' ;


        //echo $class;



$profile = $row['prof_type'];
//echo $profile;
$f_name = $row['f_name'];
//echo $f_name;
$l_name = $row['l_name'];
//echo $l_name;


        ?>
 <div class="slide card text-white m-2 <?php echo $class; ?>"  id="noti">
     <h5 class="card-title">Card title</h5>
        <div class="card-body " style="overflow:auto;">
          
          <p class="card-text"><?php echo $f_name." ".$l_name;; ?>.</p>
     
            <footer class="blockquote-footer text-right" style="overflow:hidden;">
            <small class="text-white">
              Someone famous in <cite title="Source Title">Source Title</cite><br>
              Last updated 3 mins ago
            </small>
          </footer>
        </div>
    </div>       
        <?php } ?>

</div>
<?php

}

?>
