
<?php

$protocol = strtolower(substr($_SERVER["SERVER_PROTOCOL"],0,5))=='http'?'https':'http';
$severn=$_SERVER['SERVER_NAME'];
$server=$protocol."://".$severn."/";

include('config.php');
$db_n="society_db";
$con=mysqli_connect($servername,$username,$password,$db_n);
define ("SECRETKEY", "mysecretkey1234");
?>

<!DOCTYPE html>
<html>
<head>
        <meta charset="utf-8">
          <meta name="viewport" content="width=device-width, initial-scale=1">
        <link href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/js/bootstrap.min.js"></script>
<script src="//code.jquery.com/jquery-1.11.1.min.js"></script>

  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
        <title>Reciept</title>
        <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css" rel="stylesheet" integrity="sha256-k2/8zcNbxVIh5mnQ52A0r3a6jAgMGxFJFE2707UxGCk= sha512-ZV9KawG2Legkwp3nAlxLIVFudTauWuBpC10uEafMHYL0Sarrz5A7G79kXh5+5+woxQ5HM559XX2UZjMJ36Wplg==" crossorigin="anonymous">
        <style type="text/css">

.text-danger strong {
        color: #9f181c;
    }
    .receipt-main {
      background: #ffffff none repeat scroll 0 0;
      border-bottom: 12px solid #333333;
      border-top: 12px solid #9f181c;
      margin-top: 50px;
      margin-bottom: 50px;
      padding: 40px 30px !important;
      position: relative;
      box-shadow: 0 1px 21px #acacac;
      color: #333333;
      font-family: open sans;
    }
    .receipt-main p {
      color: #333333;
      font-family: open sans;
      line-height: 1.42857;
    }
    .receipt-footer h1 {
      font-size: 15px;
      font-weight: 400 !important;
      margin: 0 !important;
    }
    .receipt-main::after {
      background: #414143 none repeat scroll 0 0;
      content: "";
      height: 5px;
      left: 0;
      position: absolute;
      right: 0;
      top: -13px;
    }
    .receipt-main thead {
      background: #414143 none repeat scroll 0 0;
    }
    .receipt-main thead th {
      color:#fff;
    }
    .receipt-right h5 {
      font-size: 16px;
      font-weight: bold;
      margin: 0 0 7px 0;
    }
    .receipt-right p {
      font-size: 12px;
      margin: 0px;
    }
    .receipt-right p i {
      text-align: center;
      width: 18px;
    }
    .receipt-main td {
      padding: 9px 20px !important;
    }
    .receipt-main th {
      padding: 13px 20px !important;
    }
    .receipt-main td {
      font-size: 13px;
      font-weight: initial !important;
    }
    .receipt-main td p:last-child {
      margin: 0;
      padding: 0;
    } 
    .receipt-main td h2 {
      font-size: 20px;
      font-weight: 900;
      margin: 0;
      text-transform: uppercase;
    }
    .receipt-header-mid .receipt-left h1 {
      font-weight: 100;
      margin: 34px 0 0;
      text-align: right;
      text-transform: uppercase;
    }
    .receipt-header-mid {
      margin: 24px 0;
      overflow: hidden;
    }
    
    #container {
      background-color: #dcdcdc;
    }

    #btn{
      right: 1rem;
      bottom: 0rem;
    }
    #btn1{

      bottom: 0rem;
    }    
    #btn2{
      left: 1rem;
      bottom: 0rem;
    }

    @media (min-width: 768px) {
      body
{
   overflow: hidden;
} 
#row1{
overflow: auto; 
height: 460px;
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

}
.btn-circle1 {
    width: 5%;
    height: 10%;
    padding: 6px 0px;
    border-radius: 50%;
    text-align: center;
    font-size: 18px;
    border: 0;
    position: fixed;
    bottom: 0.5rem; 

}
}
@media (max-width: 767.98px) {  
#row1{
overflow: auto; 
height: 400px;
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
    right: 43%;
}
.btn-circle1 {
    width: 18%;
    height: 10%;
    padding: 6.5px 0px;
    border-radius: 50%;
    text-align: center;
    font-size: 18px;
    border: 0;
    position: fixed;
    bottom: 0.5rem; 

}
}
@media (min-height: 600px) {  
#print
{
	overflow: auto;
	height: 550px;

}
}
</style>
<link href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/js/bootstrap.min.js"></script>
<script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
</head>
<body>

<?php	

// echo $_POST['uid']."</br>";
// echo $_POST['nish']."</br>";
// echo $_POST['method']."</br>";
// echo $_POST['doneby']."</br>";
// echo $_POST['amt']."</br>";
// echo $_POST['date']."</br>";

$uid = $_POST['uid'];
$nish = $_POST['nish'];
$method = $_POST['method'];
$doneby = $_POST['doneby'];
$amt = $_POST['amt'];
$date = $_POST['date'];

 $query = "SELECT * FROM user_details WHERE uid = '".$uid."'";
 $result = mysqli_query($con, $query);
  $row = mysqli_fetch_array($result);
 $rowcout=mysqli_num_rows($result);
 if($rowcout != '0'){
 $f_name = $row['f_name'];
 $l_name = $row['l_name'];
  $prof = $row['prof_type'];
  }



$hasheduid = $doneby;
//echo "</br>".$hasheduid;

$uid1 = openssl_decrypt($hasheduid, "AES-128-ECB", SECRETKEY);
//echo $uid;

$sql1="SELECT * FROM user_details where uid='$uid1'";
$result=$con->query($sql1);
$row= mysqli_fetch_array($result);
 $rowcout1=mysqli_num_rows($result);
 if($rowcout1 != '0'){
 $f_name = $row['f_name'];
 $l_name = $row['l_name'];
  $prof = $row['prof_type'];
  }

$late=0;
$online=2.50;
$gst=($amt*18)/100;
$amt1=$amt+$late+$online+$gst;
$sql="INSERT INTO payment_details(pd_id,uid,method,doneby,date,topic,amt)
VALUES(pd_id,'$uid','$method','$doneby','$date','$nish','$amt1')" ;

if(mysqli_query($con,$sql))
   {
 //  	echo $sql;
 //header('location: '.$server.'Society/home/payments/index.php?in='.$doneby);
?>


<div class="container" id="print" >
  <div class="row">

        <div class="receipt-main col-xs-10 col-sm-10 col-md-6 col-xs-offset-1 col-sm-offset-1 col-md-offset-3">
            <div class="row">

            </div>
      
      <div class="row">
        <div class="receipt-header receipt-header-mid">
          <div class="col-xs-8 col-sm-8 col-md-8 text-left">
            <div class="receipt-right">
              <h5> <?php echo $f_name." ".$l_name; ?> <small>  |   <?php  switch ($prof) {
    case 1:
        echo "Administrator";
        break;
    case 2:
        echo "SECURITY PERSON";
        break;
    case 3:
        echo "RESIDENT";
        
        break;
    }; ?>
    	
    </small></h5>
              <p><b>User id :</b> <?php echo $uid; ?></p>

            </div>
          </div>
          <div class="col-xs-4 col-sm-4 col-md-4">
            <div class="receipt-left">
              <h1>Receipt</h1>
            </div>
          </div>
        </div>
            </div>
      
            <div>
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th>Description</th>
                            <th>Amount</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td class="col-md-9"><?php echo $nish;?> Payment (<?php echo $method; ?>)</td>
                            <td class="col-md-3"><i class="fa fa-inr"></i> <?php echo $amt;?>/-</td>
                        </tr>
                        
                        <tr>
                            <td class="text-right">
                            <p>
                                <strong>Total Amount: </strong>
                            </p>
                            <p>
                                <strong>Late Fees: </strong>
                            </p>
                            <p>
                                <strong>Transaction Charges: </strong>
                            </p>
                            <p>
                                <strong>GST(18%): </strong>
                            </p>


              </td>
                            <td>
                            <p>
                                <strong><i class="fa fa-inr"></i> <?php echo $amt;?>/-</strong>
                            </p>
                            <p>
                                <strong><i class="fa fa-inr"></i> <?php echo $late;?>/-</strong>
                            </p>
                            <p>
                                <strong><i class="fa fa-inr"></i> <?php echo $online;?>/-</strong>
                            </p>
                            <p>
                                <strong><i class="fa fa-inr"></i> <?php echo $gst;?>/-</strong>
                            </p>


              </td>
                        </tr>
                        <tr>
                           
                            <td class="text-right"><h2><strong>Total: </strong></h2></td>
                            <td class="text-danger"><h4><strong><i class='fa fa-inr' style='font-size:80%;'></i> <?php echo $amt+$late+$online+$gst;?>/-</strong></h4></td>
                        </tr>
                    </tbody>
                </table>
            </div>
      
      <div class="row">
        <div class="receipt-header receipt-header-mid receipt-footer">
          <div class="col-xs-8 col-sm-8 col-md-8 text-left">
            <div class="receipt-right">
              <p><b>Date :</b> <?php echo $date;?></p>
              <h5 style="color: rgb(140, 140, 140);">Thank you for Payment!</h5>
            </div>
          </div>
          <div class="col-xs-4 col-sm-4 col-md-4">
            <div class="receipt-left">
              <h1>Signature</h1>
            </div>
          </div>
        </div>
            </div>
      
        </div>    
  </div>
</div>


<script type="text/javascript">
function myFunction() {

 
  window.print('document.getelementByid("print")');


}

</script>

<?php
}
?>
<div class="container" id="print">
<div class="row">

<div class="col-sm-5"></div>	
<div class="col-sm-2" style="color:white;">	
<a href="http://localhost/Society/home/index.php?in=<?php echo $hasheduid; ?>">
<button type="button" class="btn-success btn-circle " id="btn1"> <i class="fa fa-home"></i></button>
</a>
</div>

<div class="col-sm-5"></div>	
</div>
</div>


<div class="" style="color:white;">	
<a href="http://localhost/Society/home/payments/assist.php?in=<?php echo $doneby; ?>" >  
<button type="button" class="btn-primary btn-circle"  id="btn2"> <i class="fa fa-refresh"></i></button>      
</a>
</div>


<div class="">	
<button type="button" class="btn-danger btn-circle " onclick="myFunction()" id="btn"> <i class="fa fa-print"></i></button>    
</div>

</body>
</html>
