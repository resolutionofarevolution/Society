
 <!-- only last accordians checkebox are working otheres need a workout -->


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
      <h2 style="text-transform: uppercase;">Paying...</h2>
      <hr>

    <div class="row ">

  <div class="panel-group" id="accordion">
    <div class="panel panel-default">
      <div class="panel-heading" style="background-color: white; color: #9c27b0;">
        <h4 class="panel-title" style=" font-size-adjust: 50%; font-weight: bold; text-underline-position:disabled;">
          <a data-toggle="collapse" data-parent="#accordion" href="#collapse1" ><center>Maintenance</center></a>
        </h4>
      </div>
      <div id="collapse1" class="panel-collapse collapse">
        <div class="panel-body"><?php pay('collapse1'); ?></div>
      </div>
    </div>
    <div class="panel panel-default" >
      <div class="panel-heading" style="background-color: white; color: #336699; " >
        <h4 class="panel-title" style=" font-size-adjust: 50%; font-weight: bold; text-underline-position:disabled;">
          <a data-toggle="collapse" data-parent="#accordion" href="#collapse2">    <center>Sweeming Pool</center></a>
        </h4>
      </div>
      <div id="collapse2" class="panel-collapse collapse">
        <div class="panel-body"><?php pay('collapse2'); ?></div>
      </div>
    </div>

    <div class="panel panel-default">
      <div class="panel-heading" style="background-color: white; color: #607d8b;">
        <h4 class="panel-title" style=" font-size-adjust: 50%; font-weight: bold; text-underline-position:disabled; ">
          <a data-toggle="collapse" data-parent="#accordion" href="#collapse3" ><center>Gym</center></a>
        </h4>
      </div>
      <div id="collapse3" class="panel-collapse collapse">
        <div class="panel-body"><?php pay('collapse3'); ?></div>
      </div>
    </div>
        <div class="panel panel-default">
      <div class="panel-heading" style="background-color: white; color: #4caf50;">
        <h4 class="panel-title" style=" font-size-adjust: 50%; font-weight: bold; text-underline-position:disabled;">
        <a data-toggle="collapse" data-parent="#accordion" href="#collapse4" ><center>Club House</center></a>
        </h4>
      </div>
      <div id="collapse4" class="panel-collapse collapse">
        <div class="panel-body"><?php pay('collapse4'); ?></div>
      </div>
    </div>
  </div> 
</div>

</div>


<?php
function pay($x){
?>

            <div class="row">
        <div class="col-sm-3"></div>      
        <div class="col-sm-6">
 <div id="crdit<?php echo $x; ?>" class="tab-pane">
    <h2>USING CREDIT CARD</h2>
          <form accept-charset="UTF-8" action="/" id="payment-form" method="post">
            <br>
          <div class='form-row'>
              <div class='form-group required'>

               <div class="row">
                <div class="col-sm-12">
                <label class='control-label'>Name on Card</label>
                <input type="text" class="form-control" id="uid<?php echo $x; ?>" name="uid">
              </div>              
            </div>
              </div>
             </div> 

               <div class='form-row' id="a<?php echo $x; ?>"></div>    
               <script>  
// ajax username availability check
 $(document).ready(function(){  
   $('#uid<?php echo $x; ?>').blur(function(){

     var uid = $(this).val();

     $.ajax({
      url:'check.php',
      method:"POST",
      data:{user_name:uid},

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
              <div class='form-group' >
                <div class="row " style="border: solid 1px gray; border-radius: 2%; padding-bottom: 2px;">
                <div class="col-sm-5">

                <h4>Check the Box to Use Different Date</h4>

                </div>
                <div class="col-sm-1">
                </br>
                <input class=' ' type='checkbox' id="diffdate<?php echo $x; ?>" name="c1<?php echo $x; ?>" onclick="funct(diffdate<?php echo $x; ?>)" >
                </div>                   <?php echo $x; ?>
                <div class="col-sm-6">
                <label class='control-label'>Collection Date</label>

                <input type="date" class='form-control' data-date="" data-date-format="DD/MM/YYYY" value="" id="theDate<?php echo $x; ?>" name="d<?php echo $x; ?>" disabled="true">
                </div>


                </div>
              </br>
                <div class="row" style="border: solid 1px gray; border-radius: 2%; padding-bottom: 2px;">
                <div class="col-sm-5">
                  
                <h4>Check the Box to Change amount</h4>

                </div>                
                <div class="col-sm-1">
                </br>
                <input class=' ' type='checkbox' id="diffat<?php echo $x; ?>" name="c2<?php echo $x; ?>" onclick="funct1(diffat<?php echo $x; ?>)" >
                </div> 

                <div class="col-sm-6">
                <label class='control-label'>Collected amount</label>

                <input type="text" class='form-control' name="t<?php echo $x; ?>"  value="" id="theat<?php echo $x; ?>" disabled="true">
                </div>

                </div>
              </div>              
            <div class='form-row'>
              <div class='form-group'>
                         <label class='control-label'></label>
                      
               <button class='form-control btn btn-primary' type='submit'> PAY Rs.500→</button>
          
              </form>    
                
              </div>
            </div>    
            
              </div>
</div>
</div>
<script type="text/javascript">
  $(document).ready(function() {
    var date = new Date();

    var day = date.getDate();
    var month = date.getMonth() + 1;
    var year = date.getFullYear();

    if (month < 10) month = "0" + month;
    if (day < 10) day = "0" + day;

    var today = year + "-" + month + "-" + day;       
    $("#theDate<?php echo $x; ?>").attr("value", today);


   });

function funct($thi)
{
  var thi= document.getElementById('$thi');
  var theDate<?php echo $x; ?>= document.getElementById('theDate<?php echo $x; ?>');

  var t=diffdate<?php echo $x; ?>.checked;


  if (t) { 

      $(theDate<?php echo $x; ?>).attr("disabled", false);
  }
  if (!t) { 
      $(theDate<?php echo $x; ?>).attr("disabled", true);
  }
}

function funct1($thi1)
{
  var thi1= document.getElementById('$thi1');
  var theat<?php echo $x; ?>= document.getElementById('theat<?php echo $x; ?>');

  var t=diffat<?php echo $x; ?>.checked;


  if (t) { 
      $(theat<?php echo $x; ?>).attr("disabled", false);
  }
  if (!t) { 
      $(theat<?php echo $x; ?>).attr("disabled", true);
  }
}


</script>
 
<?php
}
?>


</body>

</html>
