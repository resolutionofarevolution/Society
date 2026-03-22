
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
</style>

</head>
    <body >

<div class="container" >
   <div class="row">
      <div class="col-sm-1 col-lg-1 col-2 padding-top">  
      <a href="http://localhost/Society/home/payments/index.php?in=<?php echo $hasheduid; ?>">
        <i style="font-size:300%; padding-top: 40%;  " class="fa fa-arrow-circle-left"></i>
      </a>  
</div>
<div class="col-sm-2 col-lg-2 col-2"> 
  <h2 style="color: #aaaaaf; font-size:200%; padding-top: 18%;  ">
        Paying...
  </h2>
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
        <div class="col-sm-2">

       <br>
       <div class="btn-group-vertical btn-block" id="<?php echo $x; ?>">
             <a class="btn btn-default" style="text-align: left;" data-toggle="tab" href="#crdit<?php echo $x; ?>">Credit Card</a>
          <a class="btn btn-default" style="text-align: left;" data-toggle="tab" href="#debit<?php echo $x; ?>">Debit Card</a>
          </div>
         
                    <label class='control-label'></label><!-- spacing -->
        

        </div>

                <div class="col-sm-4">
                <div class="tab-content" id="<?php echo $x; ?>">
                  <div class="tab-pane active">
                                      <label class='control-label'></label><!-- spacing -->
        
          <div class="alert alert-info">Please choose your prefered method of payment.</div>

       
                  </div>
    <div id="crdit<?php echo $x; ?>" class="tab-pane">
    <h2>USING CREDIT CARD</h2>
          <form accept-charset="UTF-8" action="cardpay.php" id="payment-form" method="post">
            <br>
          <div class='form-row'>
              <div class='form-group required'>
                <div class='error form-group hide'>
                <div class='alert-danger alert'>
                  Please correct the errors and try again.
              
              </div>
            </div>
               <div class="row">
                <div class="col-sm-12">

              </div>
              </div>
              </div>
                    
            </div>
            <div class='form-row'>
              <div class='form-group card required'>
                  <label class='control-label'>Card Number</label>
                  <input autocomplete='off' class='form-control card-number' size='20' type='text'>

              </div>
            </div>
             
            <div class='form-row '>
              <div class='form-group cvc required'>
                <div class="row">
                <div class="col-sm-4">
                <label class='control-label'>CVC</label>
                <input autocomplete='off' class='form-control card-cvc' placeholder='ex. 311' size='4' type='text'>
                </div>
                <div class="col-sm-4">
                <label class='control-label'>Expiration</label>
                <input class='form-control card-expiry-month' placeholder='MM' size='2' type='text'>
                </div>
                <div class="col-sm-4">
                <label class='control-label'>Year</label>
                <input class='form-control card-expiry-year' placeholder='YYYY' size='4' type='text'>
                </div>

                </div>
              </div>
              
            </div>
 
        
            <div class='form-row'>
              <div class='form-group'>
                         <label class='control-label'></label>
                         <?php $uid1 = openssl_decrypt($hasheduid, "AES-128-ECB", SECRETKEY); ?>
                          <input type="hidden" name="uid" value="<?php echo $uid1; ?>">
                               <input type="hidden" name="nish" value="<?php echo $nish; ?>">
              <input type="hidden" name="method" value="Credit Card">
              <input type="hidden" name="doneby" value="<?php echo $hasheduid; ?>">  

              <input type="hidden" id="amt<?php echo $x; ?>" name="amt" value="<?php
echo $amt;?>">
<input type="hidden" id="date<?php echo $x; ?>" name="date" value="CurrentTime">    
               <button class='form-control btn btn-primary' type='submit'> PAY Rs.<?php
echo $amt;?>→</button>
              </form>    
                
              </div>
            </div>    
            
              </div>
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

document.getElementById("dateDebit<?php echo $x; ?>").value = day + "/" + month + "/" + year;
</script>              
    <div id="debit<?php echo $x; ?>" class="tab-pane fade" id="<?php echo $x; ?>">
                    <h2>USING DEBIT CARD</h2>
           <form accept-charset="UTF-8" action="cardpay.php" id="payment-form" method="post">
            <br>
          <div class='form-row'>
              <div class='form-group required'>
                <div class='error form-group hide'>
                <div class='alert-danger alert'>
                  Please correct the errors and try again.
              
              </div>
            </div>
              </div>
                    
            </div>
            <div class='form-row'>
              <div class='form-group card required'>
                  <label class='control-label'>Card Number</label>
                  <input autocomplete='off' class='form-control card-number' size='20' type='text'>

              </div>
            </div>
             
            <div class='form-row '>
              <div class='form-group cvc required'>
                <div class="row">
                <div class="col-sm-4">
                <label class='control-label'>CVC</label>
                <input autocomplete='off' class='form-control card-cvc' placeholder='ex. 311' size='4' type='text'>
                </div>
                <div class="col-sm-4">
                <label class='control-label'>Expiration</label>
                <input class='form-control card-expiry-month' placeholder='MM' size='2' type='text'>
                </div>
                <div class="col-sm-4">
                <label class='control-label'>Year</label>
                <input class='form-control card-expiry-year' placeholder='YYYY' size='4' type='text'>
                </div>

                </div>
              </div>
              
            </div>
 
        
            <div class='form-row'>
              <div class='form-group'>
                         <label class='control-label'></label>
                         <?php $uid1 = openssl_decrypt($hasheduid, "AES-128-ECB", SECRETKEY); ?>
                          <input type="hidden" name="uid" value="<?php echo $uid1; ?>">
                      
                               <input type="hidden" name="nish" value="<?php echo $nish; ?>">
              <input type="hidden" name="method" value="Debit Card">
              <input type="hidden" name="doneby" value="<?php echo $hasheduid; ?>">  

              <input type="hidden" id="amt<?php echo $x; ?>" name="amt" value="<?php
echo $amt;?>">
<input type="hidden" id="dateDebit<?php echo $x; ?>" name="date" value="CurrentTime">   
               <button class='form-control btn btn-primary' type='submit'> PAY Rs.<?php
echo $amt;?>→</button>
          
              </form>      
                
              </div>
            </div>   
              </div>
            </div>
 <script type="text/javascript">
    var d = new Date();

    // Set the value of the "date" field
    document.getElementById("date<?php echo $x; ?>").value = d.toDateString();

// Get today's date
var day = d.getDate();
var month = d.getMonth() + 1; // The months are 0-based
var year = d.getFullYear();



document.getElementById("dateDebit<?php echo $x; ?>").value = day + "/" + month + "/" + year;
</script>              
            
            
          
        </div>   
     </form>
   </div>
 
<?php
}
?>


</body>

</html>