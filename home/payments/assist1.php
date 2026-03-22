
  <?php 
define ("SECRETKEY", "mysecretkey1234");

if(isset($_GET['in'])){

$hasheduid = $_GET['in'];
//echo "</br>".$hasheduid;

$uid = openssl_decrypt($hasheduid, "AES-128-ECB", SECRETKEY);
//echo $uid;
include('config.php');
$db_n="society_db";
$con=mysqli_connect($servername,$username,$password,$db_n);

$sql="SELECT * FROM user_details where uid='$uid'";
$result=$con->query($sql);
$row1 = mysqli_fetch_array($result);
$profile = $row1['prof_type'];
//echo $profile;
$f_name = $row1['f_name'];
//echo $f_name;
$l_name = $row1['l_name'];
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
        <style type="text/css">
 @import url(https://fonts.googleapis.com/css?family=Open+Sans:300);
      body
{

    background-image: url('http://localhost/Society/home/background.jpg'); 


   background-repeat: no-repeat;
   background-size: 100% 100%;
   overflow: auto;
  height: 500px;
}

.jumbotron-flat {
  background-color: #4DB8FF;
  height: 100%;

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

/*colored table start*/
@media screen and (max-width: 580px) {
  body {
    font-size: 16px;
    line-height: 22px;

  }
}

.wrapper {
  margin: 0 auto;
  padding: 40px;
}

.table {
  margin: 0 0 40px 0;
  width: 400%;
  box-shadow: none;
  display: table;
}
@media screen and (max-width: 580px) {
  .table {
    display: block;
  }
}

.row1 {
  display: table-row;
  background: #f6f6f6;
}
.row1:nth-of-type(odd) {
  background: #e9e9e9;
}
.row1.header {
  font-weight: 900;
  color: #ffffff;
  background: #ea6153;
}
  .row1.header #head {
    display: none;
  }
.row1.green {
  background: #27ae60;
}
.row1.blue {
  background: #2980b9;
}
@media screen and (max-width: 580px) {
  .row1 {
    padding: 14px 0 7px;
    display: block;
  }
  .row1.header {
    padding: 0;
    height: 30px;
  }
  .row1.header .cell {
    display: none;
  }

    .row1.header #head {
    display: block;
    margin: 43%;
  }
  .row1 .cell {
    margin-bottom: 10px;
  }
  .row1 .cell:before {
    margin-bottom: 3px;
    content: attr(data-title);
    min-width: 200px;
    font-size: 10px;
    line-height: 10px;
    font-weight: bold;
    text-transform: uppercase;
    color: #969696;
    display: block;
  }
}

.cell {
  padding: 6px 12px;
  display: table-cell;
}
@media screen and (max-width: 580px) {
  .cell {
    padding: 2px 16px;
    display: block;
  }
}
/*colored table end*/
/*filter table start*/
    .filterable {
    margin-top: 15px;
}
.filterable .panel-heading .pull-right {
    margin-top: -20px;
}
.filterable .filters input[disabled] {
    background-color: transparent;
    border: none;
    cursor: auto;
    box-shadow: none;
    padding: 0;
    height: auto;
}
.filterable .filters input[disabled]::-webkit-input-placeholder {
    color: #333;
}
.filterable .filters input[disabled]::-moz-placeholder {
    color: #333;
}
.filterable .filters input[disabled]:-ms-input-placeholder {
    color: #333;
}
/*filter table end*/
</style>

</head>
    <body >
<main class="page-content">
    <div class="container-fluid"  >
   <div class="row">
      <div class="col-sm-1 col-lg-1 col-2 padding-top">  
      <a href="http://localhost/Society/home/payments/index.php?in=<?php echo $hasheduid; ?>">
        <i style="font-size:300%; padding-top: 40%;  " class="fa fa-arrow-circle-left"></i>
      </a>  
</div>
<div class="col-sm-2 col-lg-2 col-2"> 
  <h2 style="color: #aaaaaf; font-size:200%; padding-top: 18%;  ">
  Payment History
  </h2>
</div>
<div class="col-sm-12">
      <hr>
</div>
</div>
    <div class="container-fluid" style="height: 400px; overflow-x: auto;" >
<?php
pay($uid); 
?>

</div>

</main>
<?php

function pay($uid){
 // echo $uid;
?>
<div class="col-sm-2"></div>

<div class="col-sm-8">


      <div class=" filterable " >

<?php


include('config.php');
$db_n="society_db";
$con=mysqli_connect($servername,$username,$password,$db_n);


 $query = "SELECT * FROM payment_details ORDER BY SUBSTR(date,6,4) DESC";
 $result = mysqli_query($con, $query);
while($row = mysqli_fetch_array($result))
{
// $uid = $row['uid'];
// $nish = $row['nish'];
// $method = $row['method'];
// $doneby = $row['doneby'];
// $amt = $row['amt'];
// $date = $row['date'];             

}
// <!-- $uid = $row['uid'];
// $nish = $row['nish'];
// $method = $row['method'];
// $doneby = $row['doneby'];
// $amt = $row['amt'];
// $date = $row['date'];
//  -->
//   $query = "SELECT * FROM user_details WHERE uid = '".$uid."'";
//  $result = mysqli_query($con, $query);
// $row = mysqli_fetch_array($result);
// $f_name = $row['f_name'];
// $l_name = $row['l_name'];
// $prof = $row['prof_type'];

?>
                           
                <div class="cell bg-primary "   >
                  <h3 class="" >History</h3>
                  <div style="position: fixed; padding-left: 60%; padding-top:0%;">
                    <button class="pull-right btn btn-default btn-xs btn-filter"  ><span class="glyphicon glyphicon-filter"></span> Filter</button>
                </div></div>

            <table class=" table row1 cell" >
 

                <thead class="header bg-primary" style="background: red;">
                    <tr class=" filters row1 " style=" ">
                        <th class="cell"><input type="text" class="form-control" placeholder="Sr No." disabled></th>
                        <th class="cell"><input type="text" class="form-control" placeholder="Name" disabled></th>
                        <th class="cell"><input type="text" class="form-control" placeholder="Nich" disabled></th>
                        <th class="cell"><input type="text" class="form-control" placeholder="Amount" disabled></th>
                        <th class="cell"><input type="text" class="form-control" placeholder="Method" disabled></th>
                        <th class="cell"><input type="text" class="form-control" placeholder="Date" disabled></th>
                        <th class="cell"><input type="text" class="form-control" placeholder="Done by" disabled></th>
                    </tr>
                </thead>

                <tbody>
<?php

$query = "SELECT * FROM payment_details where uid='$uid'";
 $result = mysqli_query($con, $query);
 $i=1;
while($row = mysqli_fetch_array($result))
{
$uid = $row['uid'];
$nish = $row['topic'];
$method = $row['method'];
$doneby = $row['doneby'];
$amt = $row['amt'];
$date = $row['date'];   


// for payeers name start___________________________________
$query2 = "SELECT * FROM user_details WHERE uid = '".$uid."'";
$result2 = mysqli_query($con, $query2);
$roww = mysqli_fetch_array($result2);
$rowcout=mysqli_num_rows($result2);

$f_name = $roww['f_name'];
$l_name = $roww['l_name'];
// for payeers name end___________________________________


// for done by start_________________________________________
$hasheduid = $doneby;
//echo "</br>".$hasheduid;

$uid1 = openssl_decrypt($hasheduid, "AES-128-ECB", SECRETKEY);
//echo $uid;

$sql1="SELECT * FROM user_details where uid='$uid1'";
$result1=$con->query($sql1);
$row1= mysqli_fetch_array($result1);
 $rowcout1=mysqli_num_rows($result1);
 if($rowcout1 != '0'){
 $f_name1 = $row1['f_name'];
 $l_name1 = $row1['l_name'];
  }          
// for done by end_________________________________________

?>
                    <tr class=" row1 ">
                        <td class="cell" data-title="Sr No."><?php echo $i;?></td>
                        <td class="cell" data-title="Name"><?php echo $f_name." ".$l_name;?></td>
                        <td class="cell" data-title="Nich"><?php echo $nish;?></td>
                        <td class="cell" data-title="Amount"><?php echo $amt;?></td>
                        <td class="cell" data-title="Method"><?php echo $method;?></td>
                        <td class="cell" data-title="Date"><?php echo $date;?></td>
                        <td class="cell" data-title="Done by"><?php echo $f_name1." ".$l_name1;?></td>
                    </tr>
<?php
$i++;
}
?>

                </tbody>
            </table>
        </div>
</div>
<div class="col-sm-1"></div>


<script type="text/javascript">
  $(document).ready(function(){
    $('.filterable .btn-filter').click(function(){
        var $panel = $(this).parents('.filterable'),
        $filters = $panel.find('.filters input'),
        $tbody = $panel.find('.table tbody');
        if ($filters.prop('disabled') == true) {
            $filters.prop('disabled', false);
            $filters.first().focus();
        } else {
            $filters.val('').prop('disabled', true);
            $tbody.find('.no-result').remove();
            $tbody.find('tr').show();
        }
    });

    $('.filterable .filters input').keyup(function(e){
        /* Ignore tab key */
        var code = e.keyCode || e.which;
        if (code == '9') return;
        /* Useful DOM data and selectors */
        var $input = $(this),
        inputContent = $input.val().toLowerCase(),
        $panel = $input.parents('.filterable'),
        column = $panel.find('.filters th').index($input.parents('th')),
        $table = $panel.find('.table'),
        $row1s = $table.find('tbody tr');
        /* Dirtiest filter function ever ;) */
        var $filteredrow1s = $row1s.filter(function(){
            var value = $(this).find('td').eq(column).text().toLowerCase();
            return value.indexOf(inputContent) === -1;
        });
        /* Clean previous no-result if exist */
        $table.find('tbody .no-result').remove();
        /* Show all row1s, hide filtered ones (never do that outside of a demo ! xD) */
        $row1s.show();
        $filteredrow1s.hide();
        /* Prepend no-result row1 if all row1s are filtered */
        if ($filteredrow1s.length === $row1s.length) {
            $table.find('tbody').prepend($('<tr class="no-result text-center"><td colspan="'+ $table.find('.filters th').length +'">No result found</td></tr>'));
        }
    });
});
</script>
<?php
}
?>


</body>

</html>
