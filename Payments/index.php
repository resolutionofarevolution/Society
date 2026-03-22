<!DOCTYPE html>
<html>
<head>
<link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
<script src="//code.jquery.com/jquery-1.11.1.min.js"></script>

    <title></title>
<style type="text/css">
    body
{

    background-image: url('background.jpg'); 


   background-repeat: no-repeat;
   background-size: 100% 80%;
}

h1
{
    color:#fff;
    margin:40px 0 60px 0;
    font-weight:300;
}

.our-team-main
{
    width:100%;
    height:100%;
    border-bottom:5px #323233 solid;
    background:#fff;
    text-align:center;
    border-radius:10px;
    overflow:hidden;
    position:relative;
    transition:0.5s;
    margin-bottom:28px;
    height: 100%
}


.our-team-main img
{
    border-radius:50%;
    margin-bottom:20px;
    width: 90px;
}

.our-team-main 
{
    font-size:20px;
    font-weight:700;
}

.our-team-main 
{
    margin-bottom:  0;
    margin-top:  10px;
}

.team-back
{
    width:100%;
    height:auto;
    position:absolute;
    top:0;
    left:0;
    padding:5px 15px 0 15px;
    text-align:left;
    background:#fff;
    
}

.team-front
{

    width:100%;
    max-height: 20%;
    position:relative;
    z-index:10;
    background:#fff;
    padding:0px;
    bottom:0px;
    transition: all 0.5s ease;
}

.our-team-main:hover .team-front
{
    left:200px;
    transition: all 0.50s ease;
}

.our-team-main:hover
{
    border-color:#777;
    transition:0.1s;
}

/*our-team-main*/
#inrow
{
    height: 70%;
    color: #323233;
}

@media (max-width: 425px) { 

#symbol
{
    margin: 0% 0% 0% 0%; 
    padding: 15% 10% 15% 10%; 
    background-color: #9c27b0; 
    z-index: 10; 
    align-self: center; 
    align-content: center; 
    height: 80%; 
    max-height: 50%;
}
#symtext{
    margin:0%; 
    padding: 0; 
    z-index: 10; 
    height: 10%;
    font-size: 100%;
    font-weight: bold;

}
#inrow
{
    height: 80%;
    color: #323233;
}
}
@media (min-width: 768px) { 
#symbol{
    margin: 5% 5% 5% 5%; 
    padding: 15% 10% 15% 10%; 
    background-color: #9c27b0; 
    z-index: 10; 
    align-self: center; 
    align-content: center; 
    height: 70%; 
    border-radius: 100%; }
#symtext{
    margin-top:0%; 
    padding: 15% 1% 15% 1%; 
    z-index: 10; 
    height: 80%;
}
#inrow
{
    color: #323233;

}

}
/*********************** Demo - 21 *******************/
.box21{text-align:center;position:relative}
.box21:after,.box21:before{content:"";width:3px;height:2px;border-radius:0%;background:rgba(0,0,0,.35);position:absolute;top:50%;left:50%;-webkit-transform:scale(0);-moz-transform:scale(0);-ms-transform:scale(0);-o-transform:scale(0);transform:scale(0)}
.box21:hover:before{-webkit-transform:scale(100);-moz-transform:scale(100);-ms-transform:scale(100);-o-transform:scale(100);transform:scale(100)}

.box21:after{-o-transition:all .1s linear .6s;-moz-transition:all .5s linear .6s;-ms-transition:all .5s linear .6s;-webkit-transition:all .5s linear .6s;transition:all .5s linear .6s}
.box21:hover:after{-moz-transition-delay:.2s;-webkit-transition-delay:.2s;-o-transition-delay:.2s;-ms-transition-delay:.2s;transition-delay:.2s}
.box21 img{width:100%;height:auto}
.box21 .box-content{width:100%;height:100%;position:absolute;top:0;left:0;background:0 0;color:#fff;padding-top:5px;-webkit-transform:scale(0);-moz-transform:scale(0);-ms-transform:scale(0);-o-transform:scale(0);transform:scale(0);-ms-transition:all .3s linear 0s;-o-transition:all .3s linear 0s;-webkit-transition:all .3s linear 0s;-moz-transition:all .3s linear 0s;transition:all .3s linear 0s;z-index:1}
.box21:hover .box-content{-webkit-transform:scale(1);-moz-transform:scale(1);-ms-transform:scale(1);-o-transform:scale(1);transform:scale(1);-moz-transition-delay:.4s;-webkit-transition-delay:.4s;-o-transition-delay:.4s;-ms-transition-delay:.4s;transition-delay:.4s}
.box21 .title{font-size:21px;font-weight:700; color: black; text-transform:uppercase;border-bottom:1px solid #fff;padding-bottom:20px;margin-top:20px}
.box21 .description{font-size:14px;font-style:italic;padding:0 10px;margin:15px 0}
.box21 .read-more{display:block;width:120px;background:#178993;border-radius:5px;font-size:14px;color:#fff;text-transform:capitalize;padding:10px 0;margin:0 auto}
@media only screen and (max-width:990px){.box21{margin-bottom:30px}
}
@media only screen and (max-width:479px){.box21 .box-content{padding-top:0}
}
@media only screen and (max-width:359px){.box21 .title{padding-bottom:10px}
}

</style>
</head>
<body>
            <main class="page-content">
    <div class="container-fluid">
      <h2>Payments</h2>
      <hr>

    <div class="row">
    
<?php 
define ("SECRETKEY", "mysecretkey1234");
include('config.php');
if(isset($_GET['in'])){

$hasheduid = $_GET['in'];
// echo "</br>".$hasheduid;

$uid = openssl_decrypt($hasheduid, "AES-128-ECB", SECRETKEY);
// echo $uid;

$db_n="id11548551_society_db";
$con=mysqli_connect($servername,$username,$password,$db_n);

$sql="SELECT * FROM user_details where uid='$uid'";
$result=$con->query($sql);
$row = mysqli_fetch_array($result);
$profile = $row['prof_type'];

$f_name = $row['f_name'];
// echo $f_name;
$l_name = $row['l_name'];
// echo $l_name;

?>


<?php

switch ($profile) {
    case 1:
          include('pay1.php');
        break;

    case 3:
        include('pay3.php');
        break;

    }
?>


<?php

}

include('sidebar.php');
?>



</div>

</main>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q"
        crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl"
        crossorigin="anonymous"></script>
    

</body>
</html>
