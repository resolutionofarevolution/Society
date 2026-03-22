<?php session_start();?>
  <?php 
define ("SECRETKEY", "mysecretkey1234");

if(isset($_GET['in'])){

$hasheduid = $_GET['in'];
//echo "</br>".$hasheduid;

$uid = openssl_decrypt($hasheduid, "AES-128-ECB", SECRETKEY);
//echo $uid;
include('../../config.php');
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
include('../sidebar.php');

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
        <!-- <link href="http://localhost/Society/home/style.css" rel="ownstyle" > -->
        
        <style type="text/css">
 /*@import url(http://localhost/Society/home/style.css);*/
          
 @import url(https://fonts.googleapis.com/css?family=Open+Sans:300);
      body
{
    background: gray;
    /*background-image: url('http://localhost/Society/home/background.jpg'); */


   background-repeat: no-repeat;
   background-size: 100% 100%;
   overflow: auto;
     -webkit-touch-callout: none; /* iOS Safari */
    -webkit-user-select: none; /* Safari */
     -khtml-user-select: none; /* Konqueror HTML */
       -moz-user-select: none; /* Old versions of Firefox */
        -ms-user-select: none; /* Internet Explorer/Edge */
            user-select: none; /* Non-prefixed version, currently
                                  supported by Chrome, Opera and Firefox */

}
  @keyframes swing {
  0% {
    transform: rotate(0deg);
  }
  10% {
    transform: rotate(10deg);
  }
  30% {
    transform: rotate(0deg);
  }
  40% {
    transform: rotate(-10deg);
  }
  50% {
    transform: rotate(0deg);
  }
  60% {
    transform: rotate(5deg);
  }
  70% {
    transform: rotate(0deg);
  }
  80% {
    transform: rotate(-5deg);
  }
  100% {
    transform: rotate(0deg);
  }
}
.ed:hover  {
  display: inline-block;
  animation: swing ease-in-out 0.5s 1 alternate;
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
.box21:after,.box21:before{content:"";width:3px;height:2px;border-radius:0%;background:rgba(0,0,0,0);position:absolute;top:50%;left:50%;-webkit-transform:scale(0);-moz-transform:scale(0);-ms-transform:scale(0);-o-transform:scale(0);transform:scale(0)}
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
@media (min-width: 768px) {
      body
{
   overflow: hidden;
} 
#row1{
overflow: auto; 
height: 540px;
padding-bottom: 5%;
}
.btn-circle {
    width: 5%;
    height: 10%;
    padding: 6px 0px;
    border-radius: 50%;
    text-align: center;
    font-size: 18px;
    border: 0;
    position: fixed;
    bottom: 0.5rem; 
    right: 2rem;
}
}
@media (max-width: 767.98px) {  
#row1{
overflow: auto; 
height: 500px;
width: 100%;
padding-bottom: 5%; 
}
.btn-circle {
    width: 18%;
    height: 10%;
    padding: 6.5px 0px;
    border-radius: 50%;
    text-align: center;
    font-size: 18px;
    border: 0;
    position: fixed;
    bottom: 0.5rem; 
    right: 2rem;
}
}
#Building{
  width: 100%;
  border:0px;
  text-align: center;
  border-bottom:double  ;
  border-radius:5%;
  float: center;
}
#Society{
  width: 100%;
  border:0px;
  text-align: center;
  border-bottom:double  ;
  border-radius:5%;
  float: center;  
}
#Wing{
  width: 100%;
  border:0px;
  text-align: center;
  border-bottom:double  ;
  border-radius:5%;
  float: center;
}

#society_id{
  width: 100%;
  background: skyblue;
  border: 2px;
  float: center;
  border-radius: 5%;
}
#wing_details{
  width: 100%;
  background: skyblue;
  border: 2px;
  float: center;
  border-radius: 5%;
}
#wing_sub {
  width: 100%;
  background: skyblue;
  border: 2px;
  float: center;
  border-radius: 5%;
}
#Building_sub
{
  width: 100%;
  background: skyblue;
  border: 2px;
  float: center;
  border-radius: 5%;  
}
#soc_sub {
  width: 100%;
  background: skyblue;
  border: 2px;
  float: center;
  border-radius: 5%;
}
#wing_det{
  display: none;
  /*padding: 10%;*/
  border: solid black 1px;

}
#wing{
  display: block;
  /*padding: 10%;*/
  border: solid black 1px;

}
</style>

<main class="page-content bg-primary pt-0 pb-0 m-0">
    <div class="row p-0 m-0 " >
      <div class="col-sm-1 col-lg-1 col-2 padding-top-0 pb-0 m-0">  
      <a href="index.php?in=<?php echo $hasheduid; ?>">
        <i style="font-size:150%; color: white; padding-top: 35%; padding-right: 0%;  " class="fa fa-arrow-left"></i>
      </a>  
</div>
<div class="col-sm-11 col-lg-1 col-1 p-0"> 
  <h2 style="color: white;  padding-top: 0%; padding-bottom: 0%; ">
<?php 
if ($_SERVER['REQUEST_METHOD'] == 'POST') 
{
  if(isset($_POST['society_name']))
  {

    $_SESSION["society_name"]=$_POST['society_name'];
        $society_name =$_SESSION["society_name"];
  }

  if(isset($_POST['society_id']))
  {
$db_n="id11548551_society_db";

$con=mysqli_connect($servername,$username,$password,$db_n);

    $_SESSION["society_id"]=$_POST['society_id'];
    $s_id=$_SESSION["society_id"];
    $sql="select * from society_details where society_id=$s_id";
    $result=$con->query($sql);
    $row = mysqli_fetch_array($result);
    $society_name = $row['society_name'];
  }

}
  if(isset($_GET['society_name']))
  {

    $_SESSION["society_name"]=$_GET['society_name'];
        $society_name =$_SESSION["society_name"];
  }

  ?>    
<?php echo $society_name; ?>
  </h2>
</div>
</div>
</main>

</head>

    <body onload="coloralt()" class="bg-light">
<main class="page-content">


    <div class="container-fluid" >


   <div class="row " id="row1">

    <!--1-->
 <?php  

$db_n="id11548551_society_db";

$con=mysqli_connect($servername,$username,$password,$db_n);
  
$society_name=$_SESSION['society_name'];
$sql1="select society_id from society_details where society_name='$_SESSION[society_name]'";
$result=$con->query($sql1);
$row = mysqli_fetch_array($result);


$society_id=$row['society_id'];
$sql="select * from building_details where society_id=$society_id";
$result=$con->query($sql);
?>
<input type="hidden" id="nrows" value="<?php echo "$result->num_rows"; ?>">
<?php
if($result->num_rows == 0)
{
echo "<font color='#42dee1'><h3 align='center'><strong>There are no Records in your catlogue.</strong></h3></font>";
}
else{

if($result->num_rows==0)
{
echo "<font color='#42dee1'><h3><strong>There are no results in your catlogue.</strong></h3></font>";
}
else{
  $x = 0;
while($row = mysqli_fetch_array($result))
{
 ?>
    <div class="col-12 col-sm-12 " style="height: 20%; margin-bottom:1%; " >

        <div class="our-team-main">
   <div class="row ">
    <div class="col-10 col-sm-11 " >
                  <form action="bldg.php" method="post" >
            <input id="society_name" type="hidden" name="society_name" value="<?php echo $_SESSION["society_name"]; ?>">
            <input id="building_id" type="hidden" name="building_id" value="<?php echo $row['building_id'];?>">
             <button style="   position: absolute;
  top: 0;
  left: 0;
  right: 0;
  width: 100%;
  height: 100%;
  z-index: 1;
  border-radius:0px 0PX 0PX 0PX;
  border:0;
  background-color: transparent; 
   cursor:pointer;
   " type="submit" name="bldg" value="<?php echo $row['building_name']?>"></button>
            <a href="http://localhost/Society/home/society/society.php?in=<?php echo $hasheduid; ?>" style="text-decoration: none;">
                <div class="row text-light"   >
                    <div class="col-sm-12 col-12  " id="builna<?php echo $x; ?>" >
                        <h2 ><b><span><?php echo $row['building_name']?></span></b></h2>
                    </div>
                </div>
                <div class="row pb-1 " id="buildtext<?php echo $x; ?>"  >
                    <div class="col-sm-6 col-6 p-0" >
                        <span >12 Buildins</span>
                    </div>                    
                    <div class="col-sm-6 col-6 p-0 " >
                        <span> 12 Wings</span>
                    </div>
                </div>
                </a>
    </div>
      <div class="col-2 col-sm-1 pt-2 ">
        <i class="fa w3-xlarge fa-pencil ed" style="font-size: 120%;"></i> 
          </br></br>  
        <i class="fa w3-xlarge fa-trash ed" style="font-size: 120%;"></i>
      </div>
    </div>      
    </div>
  </div>


           
</form>


<?php   
$x++;
 }
}
}
 ?>


    <!--1-->  
</div>



</main>


 






<!-- Button trigger modal -->
                            <button type="button" class="btn-danger btn-circle" data-toggle="modal" data-target="#exampleModalCenter" style="outline: none;"><i class="fa fa-plus"></i>
                            </button>
<!-- Modal -->

<div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
      <h2 align="center">Add Building</span></h2>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">

<section class="form-elegant">

<!--Form without header-->
  <div class="card">
    <div class="card-body mx-4">

      <!--Body-->
      <div class="md-form">
                  <form action="insert.php" method="post">
                  <input id="Building" type="text" name="Building_name" placeholder="Enter Building Name Here..."><br><br>

            </div>
            <div class="col-2">
              
            </div>
            <div class="col-4">
              
            </div>
            <div class="col-4">
                  <input id="society_name" type="Hidden" name="society_name" value="<?php echo $_SESSION["society_name"]; ?>">
                  <input id="in" type="Hidden" name="in" value="<?php echo $hasheduid; ?>">

                  <input id="society_id" type="Hidden" name="society_id" value="<?php echo $society_id; ?>">    
    
      


      </div>
      <div class="text-center mb-3">

        <button id="Building_sub" type="submit" name="Building_sub" class="btn blue-gradient btn-block btn-rounded z-depth-1a">submit</button>
      </div>
                   </form>     


    </div>

 

  </div>
  <!--/Form without header-->

</section>


      </div>
    </div>
  </div>
</div>

  </body>
</html>

<script type="text/javascript">

function coloralt()
{
var nrows = document.getElementById("nrows").value;
var cars = ["#9c27b0", "#336699", "#607d8b","#4caf50"];
var x = 0;
var i = 0;
    while(nrows>=x)
    {
          for (i = 0; i <= cars.length-1; i++) 
          {
            document.getElementById("builna"+x).style.background = cars[i];
            document.getElementById("buildtext"+x).style.color = cars[i];       
            x++;
          }
     }
}

</script>