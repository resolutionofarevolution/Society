
  <?php 
define ("SECRETKEY", "mysecretkey1234");

if(isset($_GET['in'])){

$hasheduid = $_GET['in'];
//echo "</br>".$hasheduid;

$uid = openssl_decrypt($hasheduid, "AES-128-ECB", SECRETKEY);
//echo $uid;
include('../config.php');
$db_n="id11548551_society_db";
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
        <style type="text/css">
 @import url(https://fonts.googleapis.com/css?family=Open+Sans:300);
      body
{

    background-image: url('../background.jpg'); 


   background-repeat: no-repeat;
   background-size: 100% 100%;
   overflow: auto;

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

/*enter entery start*/
.form-elegant .font-small {
font-size: 0.8rem; }

.form-elegant .z-depth-1a {
-webkit-box-shadow: 0 2px 5px 0 rgba(55, 161, 255, 0.26), 0 4px 12px 0 rgba(121, 155, 254, 0.25);
box-shadow: 0 2px 5px 0 rgba(55, 161, 255, 0.26), 0 4px 12px 0 rgba(121, 155, 254, 0.25); }

.form-elegant .z-depth-1-half,
.form-elegant .btn:hover {
-webkit-box-shadow: 0 5px 11px 0 rgba(85, 182, 255, 0.28), 0 4px 15px 0 rgba(36, 133, 255, 0.15);
box-shadow: 0 5px 11px 0 rgba(85, 182, 255, 0.28), 0 4px 15px 0 rgba(36, 133, 255, 0.15); }
#enterentry:after
{
  display: none;
}
/*enter entery end*/

</style>

</head>
    <body >
<main class="page-content">
    <div class="container-fluid p-0"  >
   <div class="row">
      <div class="col-sm-1 col-lg-1 col-2 pt-5">  
      <a href="../index.php?in=<?php echo $hasheduid; ?>">
        <i style="font-size:300%; padding-top: 40%;  " class="fa fa-arrow-circle-left"></i>
      </a>  
</div>
<div class="col-sm-2 col-lg-6 col-2"> 
  <h2 style="color: #aaaaaf; font-size:200%; padding-top: 8%;  ">
Entry Register
  </h2>
</div>
<div class="col-sm-12">
      <hr>
</div>
</div>
<?php
if ($profile==2) {
?>

<section class="form-elegant">

  <!--Form without header-->
  <div class="card">

    <div class="card-body">

      <!--Header-->
      <div class="text-center">
                <button class="btn collapsed" style="width: 100%;  background: transparent; border: transparent;" data-toggle="collapse" data-target="#enterentry" aria-expanded="false" aria-controls="enterentry">
        <h3 class="dark-grey-text mt-0"><strong>New Entry</strong></h3>
    </button>
      </div>

      <!--Body-->
          <div id="enterentry" class="collapse" aria-labelledby="enterentry" data-parent="#accordion">
     <form action="regi_entry.php" method="POST">   
    <div class="row">
      <div class="col-12 col-lg-6 row ">
        <div class="col-4 col-lg-3"><label>Name</label></div>
        <div class="col-8 col-lg-9"><input type="text" name="entryname" id="entryname" class="form-control"></div>
      </div>
      <div class="col-12 col-lg-6 row">
        <div class="col-4 col-lg-3"><label>Visiting to</label></div>
        <div class="col-8 col-lg-9"><input type="text" name="Visit_to" id="Visit_to" class="form-control"></div>
      </div>      
      <div class="col-12 col-lg-6 row">
        <div class="col-4 col-lg-3"><label>Category</label></div>
        <div class="col-8 col-lg-9">
          <select name="Category" id="Category" class="form-Dropdown" required>
            <option value="">Select Category</option>  
            <option value="Resident">Resident</option>            
            <option value="Maid">Maid</option>            
            <option value="Guest">Guest</option>            
            <option value="Driver">Driver</option>            
            <option value="Delivery">Delivery</option>            
            <option value="Delivery">Other</option>            
          </select>
        </div>
      </div>       
      <div class="col-12 col-lg-6 row">
        <div class="col-4 col-lg-3"><label>Reason</label></div>
        <div class="col-8 col-lg-9"><input type="text" name="Reason" id="Reason" class="form-control"></div>
      </div>
     

    </div>        


      <div class="text-center mb-3">

        <button type="submit" name="UID" value="<?php echo $hasheduid; ?>" class="btn blue-gradient btn-block btn-rounded z-depth-1">Register Entry</button>
      </div>
</form>



    </div>

 

  </div>
</div>
  <!--/Form without header-->

</section>
<?php
}
?>
<div class="container-fluid" style="max-height: 350px; overflow-x: hidden; margin-top: 2%;" >

<?php  entry($profile); ?>
</div>

</main>
<?php

function entry($profile)
{
?>

<div class="col-sm-12"  style="overflow: auto;">


      <div class=" filterable " >

<?php


include('config.php');
$db_n="id11548551_society_db";
$con=mysqli_connect($servername,$username,$password,$db_n);

?>
                           
                  <div class="row" style="position: fixed; padding-left:60%; padding-top:0%;">
                    <button class="pull-right btn btn-default btn-xs btn-filter col-12"  ><span class="glyphicon glyphicon-filter"></span> Filter</button>
                  </div>
                <?php
                if ($profile==2) {
                ?>  
                <div class="cell bg-primary "   >
                  <h3 class="" >Register</h3>
                </div>
                <?php
                }
                ?>

            <table class=" table row1 cell" >
 

                <thead class="header bg-primary" >
                    <tr class=" filters row1 " style=" ">
                        <th class="cell"><input type="text" class="form-control" placeholder="Sr No." disabled></th>
                        <th class="cell"><input type="text" class="form-control" placeholder="Name" disabled></th>
                        <th class="cell"><input type="text" class="form-control" placeholder="Visited to" disabled></th>
                        <th class="cell"><input type="text" class="form-control" placeholder="Category" disabled></th>
                        <th class="cell"><input type="text" class="form-control" placeholder="Reason" disabled></th>
                        <th class="cell"><input type="text" class="form-control" placeholder="Entry" disabled></th>
                        <th class="cell"><input type="text" class="form-control" placeholder="Exit" disabled></th>
                    </tr>
                </thead>

                <tbody>
<?php

$query = "SELECT * FROM entry_register";
 $result = mysqli_query($con, $query);
 $i=1;
while($row = mysqli_fetch_array($result))
{
$entry_id = $row['entry_id'];
$entryname = $row['name'];
$Visit_to = $row['visit_to'];
$Category = $row['category'];
$Reason = $row['reason'];
$entry_time = $row['entry_time'];
$entered_by = $row['entered_by'];  
$exit_time = $row['exit_time'];
$exited_by = $row['exited_by'];
// for entered by start_________________________________________
$hasheduid = $_GET['in'];
$hasheduid1 = $entered_by;
$hasheduid2 = $exited_by;
//echo "</br>".$hasheduid;

$entered_by = openssl_decrypt($hasheduid1, "AES-128-ECB", SECRETKEY);
$exited_by = openssl_decrypt($hasheduid2, "AES-128-ECB", SECRETKEY);
 
//echo $uid;

$sql1="SELECT * FROM user_details where uid='$entered_by'";
$result1=$con->query($sql1);
$row1= mysqli_fetch_array($result1);
$rowcout1=mysqli_num_rows($result1);

    if($rowcout1 != '0')
    {
        $f_name1 = $row1['f_name'];
        $l_name1 = $row1['l_name'];
    }          
// for done by end_________________________________________

$sql2="SELECT * FROM user_details where uid='$exited_by'";
$result2=$con->query($sql2);
$row2= mysqli_fetch_array($result2);
$rowcout2=mysqli_num_rows($result2);
    if($rowcout2 != '0')
    {
        $f_name2 = $row2['f_name'];
        $l_name2 = $row2['l_name'];
    }     
    if(!isset($f_name2) && !isset($l_name2))
    {
        $f_name2 = "";
        $l_name2 = "";
    }    
// for done by end_________________________________________

?>
                    <tr class=" row1 ">
                        <td class="cell" data-title="Sr No."><?php echo $i;?></td>
                        <td class="cell" data-title="Name"><?php echo $entryname;?></td>
                        <td class="cell" data-title="Visited to"><?php echo $Visit_to;?></td>
                        <td class="cell" data-title="Category"><?php echo $Category;?></td>   
                        <td class="cell" data-title="Reason"><?php echo $Reason;?></td>
                        <td class="cell" data-title="Entry Time">
                          <?php 
                          echo $entry_time; 
                          if ($profile==1)
                          {
                          echo "<br><small class='text-muted'><cite title='Source Title'>".$f_name1." ".$l_name1."</small></cite>";                            
                          }
                          ?>
                            
                        </td>
                        <td class="cell" data-title="Exit">
                        <?php
                        if ($profile==2)
                        {
                          if ($Category!="Resident" && $exit_time =="Not yet") 
                          {
                          ?>
                            <form action="regi_entry.php" method="POST">  
                              <input type="hidden" name="entry_id" value="<?php echo $entry_id;?>">
                              <?php echo $exited_by; ?> 
                              <button type="submit" name="UID1" value="<?php echo $hasheduid;?>" class="btn btn-warning btn-block btn-rounded z-depth-1">Exit</button>
                            </form>
                          <?php                   
                          }
                          else
                          {echo $exit_time;}  
                        }   
                        else
                        {
                            echo $exit_time."<br><small class='text-muted'><cite title='Source Title'>".$f_name2." ".$l_name2."</small></cite>";
                            unset($f_name2);unset($l_name2);
                        }
                        
                        ?>       
                        </td>
                    </tr>
<?php
$i++;
}
?>
                </tbody>
            </table>
        </div>
</div>
<?php
}
?>
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

</body>

</html>
