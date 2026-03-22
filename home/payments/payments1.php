
<?php 
define ("SECRETKEY", "mysecretkey1234");

if(isset($_GET['in'])){

$hasheduid = $_GET['in'];
//echo "</br>".$hasheduid;

$uid = openssl_decrypt($hasheduid, "AES-128-ECB", SECRETKEY);
echo $uid;
include('config.php');
$db_n="society_db";
$con=mysqli_connect($servername,$username,$password,$db_n);

$sql="SELECT * FROM user_details where uid='$uid'";
$result=$con->query($sql);
$row = mysqli_fetch_array($result);
$profile = $row['prof_type'];
echo $profile;
$f_name = $row['f_name'];
echo $f_name;
$l_name = $row['l_name'];
echo $l_name;

}
include('sidebar.php');
?>
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
   background-size: 100% 100%;
  
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


</style>
  <?php 
define ("SECRETKEY", "mysecretkey1234");

if(isset($_GET['in'])){

$hasheduid = $_GET['in'];
// echo "</br>".$hasheduid;

$uid = openssl_decrypt($hasheduid, "AES-128-ECB", SECRETKEY);
// echo $uid;
include('config.php');
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
}
include('sidebar.php');
?>
</head>
<body>

  <main class="page-content">
    <div class="container-fluid">
      <h2>Pro Sidebar</h2>
      <hr>
      <div class="row">



      </div>
    </div>

  </main>
</body>
</html>


