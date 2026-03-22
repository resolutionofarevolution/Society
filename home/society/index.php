
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
        <link href="../style.css" rel="ownstyle" >
        
        <style type="text/css">
 @import url(../style.css);
          
 @import url(https://fonts.googleapis.com/css?family=Open+Sans:300);
      body
{

    background-image: url('../background.jpg'); 


   background-repeat: no-repeat;
   background-size: 100% 100%;
   overflow: auto;

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
  cursor: pointer;
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

</head>

    <body >
<main class="page-content">

    <div class="container-fluid" >


    <div class="row ">
      <div class="col-sm-1 col-lg-1 col-2 padding-top">  
      <a href="http://localhost/Society/home/index.php?in=<?php echo $hasheduid; ?>">

        <i style="font-size:300%; padding-top: 40%;  " class="fa fa-arrow-circle-left"></i>
      </a>  
</div>
<div class="col-sm-1 col-lg-1 col-1"> 
  <h2 style="color: #aaaaaf; font-size:200%; padding-top: 18%;  ">
  Society
  </h2>
</div>
<div class="col-sm-12">
      <hr>
</div>
</div>
   <div class="row " id="row1">

    <!--1-->
 <?php  
$db_n="id11548551_society_db";
$con=mysqli_connect($servername,$username,$password,$db_n);
$sql="select * from society_details";
$result=$con->query($sql);

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
while($row = mysqli_fetch_array($result))
{
 ?>
    <div class="col-12 col-sm-12 " style="height: 20%; margin-bottom:1%; ">

        <div class="our-team-main">
   <div class="row " >
    <div class="col-10 col-sm-11 " >
           
               <div class="row text-light"   >
                    <div class="col-sm-12 col-12  "  style="background-color: #9c27b0" >
                        <h2 ><b><span><?php echo $row['society_name']?></span></b></h2>
                    </div>
                </div>
                <div class="row pb-1 " style="color: #9c27b0" >
                    <div class="col-sm-6 col-6 p-0" >
                        <span >12 Buildins</span>
                    </div>                    
                    <div class="col-sm-6 col-6 p-0 " >
                        <span> 12 Wings</span>
                    </div>
                </div>
<form action="society.php?in=<?php echo $hasheduid; ?>" method="post" >
<input id="society_id" type="hidden" name="society_id" value="<?php echo $row['society_id'];?>">
<button class="btn" style="   position: absolute;
  top: 0;
  left: 0;
  right: 0;
  width: 100%;
  height: 100%;
  z-index: 999;
  background-color: transparent; 
   cursor:pointer;
   " type="submit" name="society_name" value="<?php echo $row['society_name']?>"></button>

</form>      

    </div>
      <div class="col-2 col-sm-1 pt-2 ">
        <i class="fa w3-xlarge fa-pencil ed" style="font-size: 120%;"></i> 
          </br></br>
        <i class="fa w3-xlarge fa-trash ed" style="font-size: 120%;"></i>
      </div>
    </div>      
    </div>
  </div>




<?php   
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
      <h2 align="center">Add Society</span></h2>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
<form method="post" action="submit.php">
<section class="form-elegant">

<!--Form without header-->
  <div class="card">
    <div class="card-body mx-4">

      <!--Body-->
      <div class="md-form">
                  <form action="insert.php" method="post">
                  <input id="Society" type="text" name="Society_name" placeholder="Enter Society/Area Name Here..."><br><br>
                 
            </div>

  

      <div class="text-center mb-3">

        <button id="Building_sub" type="submit" name="Building_sub" class="btn blue-gradient btn-block btn-rounded z-depth-1a">submit</button>
      </div>



    </div>

 

  </div>
  <!--/Form without header-->

</section>

</form>

      </div>
    </div>
  </div>
</div>

</body>

</html>