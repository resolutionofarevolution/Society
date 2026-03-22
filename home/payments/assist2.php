
  <?php 
define ("SECRETKEY", "mysecretkey1234");

if(isset($_GET['in'])){

$hasheduid = $_GET['in'];
//echo "</br>".$hasheduid;

$uid = openssl_decrypt($hasheduid, "AES-128-ECB", SECRETKEY);
//echo $uid;
include('../config.php');
$db_n="society_db";
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
        <style type="text/css">
 @import url(https://fonts.googleapis.com/css?family=Open+Sans:300);
      body
{

    background-image: url('http://localhost/Society/home/background.jpg'); 


   background-repeat: no-repeat;
   background-size: 100% 100%;
   overflow: auto;
  height: 800px;
}

.jumbotron-flat {
  background-color: #4DB8FF;
  height: 100%;
  border: 1px solid #4DB8FF;
  background: white;
  width: 100%;
text-align: center;
overflow: auto;
}

.paymentAmt {
    font-size: 80px; 
}

.centered {
    text-align: center;
}

.title {
 padding-top: 15px;   
}

    @media (min-width: 768px) {

.btn-circle {
    width: 100%;
    border-radius: 50%;
    text-align: center;
    border: 0;

}
}
@media (max-width: 767.98px) {  
#row1{
overflow: auto; 
height: 400px;
}
.btn-circle {
    border-radius: 50%;
    text-align: center;
    border: 0;
    right: 43%;
}
}
</style>

</head>
    <body >

<div class="container" >
     <div class="row">
      <div class="col-lg-1 col-1 padding-lg-top">  
        <a href="http://localhost/Society/home/payments/index.php?in=<?php echo $hasheduid; ?>">
          <i style="font-size:300%; padding-top: 30%;  " class="fa fa-arrow-circle-left"></i>
        </a>  
      </div>
      <div class="col-lg-2 col-2"> 
        <h2 style="color: #aaaaaf; font-size:200%;  ">
          Collecting Cash...
        </h2>
      </div>
      <div class="col-lg-8 col-6"></div>
      <div class="col-lg-1 col-2" style=" font-size:300%; padding-top: 3%;"> 
        <button type="button" class="btn-success btn-circle " id="btn1" data-toggle="modal" data-target="#exampleModalCenter"> <i class="fa fa-plus" ></i></button>
      </div>
<!-- Modal -->

<div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">

        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">

     <form method="post" action="pay_for.php">
<section class="form-elegant">

  <!--Form without header-->
  <div class="card">

    <div class="card-body mx-4">

      <!--Header-->
      <div class="text-center">
        <h3 class="dark-grey-text mb-5"><strong>Add Payment For</strong></h3>
      </div>

      <!--Body-->
      <div class="md-form">
        <label for="Form-email1">Payment Nish </label>
        <input type="text" id="Form-email1" name="topic" class="form-control">


      </div>
  <label for="Form-email1">Payble ammount</label>
        <input type="text" id="Form-email1" name="amt" class="form-control">
      <div class="text-center mb-3">
        <button type="submit" name="UID" value="<?php echo $hasheduid = $_GET['in']; ?>" class="btn blue-gradient btn-block btn-rounded z-depth-1a">Add payment</button>
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

<div class="col-sm-12">
      <hr>
</div>
</div>  
  <div class="row ">

  <div class="panel-group" id="accordion">

<?php 
include('config.php');
$db_n="society_db";
$con=mysqli_connect($servername,$username,$password,$db_n);

$sql1="SELECT * FROM payment_structure";
$result1=$con->query($sql1);
$i=0;
$color = array("#9c27b0","#336699","#607d8b","#4caf50");
while($row1=mysqli_fetch_array($result1))
{

?>
    <div class="panel panel-default">
      <div class="panel-heading" style="background-color: white; color: <?php echo $color[$i]; ?>;">
        <h4 class="panel-title" style=" font-size-adjust: 50%; font-weight: bold; text-underline-position:disabled;">
          <a data-toggle="collapse" data-parent="#accordion" href="#collapse<?php echo $i; ?>" ><center><?php echo $row1['topic']; ?></center></a>
        </h4>
      </div>
      <div id="collapse<?php echo $i; ?>" class="panel-collapse collapse">
        <div class="panel-body"><?php pay('collapse'.$i,$row1['topic'],$hasheduid,$row1['amt']); ?></div>
      </div>
    </div>
 <?php

$i++;
}
?>

  </div> 
</div>

</div>


<?php
function pay($x,$nish,$hasheduid,$amt){
?>

            <div class="row">
        <div class="col-sm-3"></div>      
        <div class="col-sm-6">
 <div id="crdit<?php echo $x; ?>" class="tab-pane">
          <form accept-charset="UTF-8" action="cashpay.php" id="payment-form" method="post">
            <br>

          <div class='form-row'>
              <div class='form-group required'>

               <div class="row">
                <div class="col-sm-12">
                <label class='control-label'></label>
                <input type="text" class="form-control" id="uid<?php echo $x; ?>" name="uid" placeholder="Enter USER-ID of Resident">
              </div>              
            </div>
              </div>
             </div> 
              <input type="hidden" name="nish" value="<?php echo $nish; ?>">
              <input type="hidden" name="method" value="cash">
              <input type="hidden" name="doneby" value="<?php echo $hasheduid; ?>">  

              <input type="hidden" id="amt<?php echo $x; ?>" name="amt" value="<?php
echo $amt;?>">
<input type="hidden" id="date<?php echo $x; ?>" name="date" value="CurrentTime">
               <div class='form-row' id="a<?php echo $x; ?>"></div> 
               </form>
               <script>  
// ajax username availability check
 $(document).ready(function(){  
   $('#uid<?php echo $x; ?>').blur(function(){

     var uid = $(this).val();
     var amt = $('#amt<?php echo $x; ?>').val();
     $.ajax({
      url:'check.php',
      method:"POST",
      data:{user_name:uid,amtt:amt},


      success:function(data)
      {
       if(data != '0')
       {
        $('#a<?php echo $x; ?>').html(data);


       }
       else
       {
        $('#a<?php echo $x; ?>').html();
       }
      }
});

      })
     });

</script>
          
 <script type="text/javascript">
    var d = new Date();

    // Set the value of the "date" field
    document.getElementById("date<?php echo $x; ?>").value = d.toDateString();

// Get today's date
var day = d.getDate();
var month = d.getMonth() + 1; // The months are 0-based
var year = d.getFullYear();

// Set the date field to the current date
document.getElementById("date<?php echo $x; ?>").value = day + "/" + month + "/" + year;
</script>
 </div></div></div>
<?php
}
?>


</body>

</html>
