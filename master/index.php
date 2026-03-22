<?php include("dbter.php"); ?>
<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>MASTER</title>

  <!-- Bootstrap core CSS -->
  <link href="../vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

  <!-- Custom fonts for this template -->
  <link href="https://fonts.googleapis.com/css?family=Catamaran:100,200,300,400,500,600,700,800,900" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css?family=Lato:100,100i,300,300i,400,400i,700,700i,900,900i" rel="stylesheet">

  <!-- Custom styles for this template -->
  <link href="../css/one-page-wonder.min.css" rel="stylesheet">

<style type="text/css">
body {
/* Desktop - 1 */


position: relative;
width: 100%;
height: 95%;

/*background: #FFEEEE;*/
background: #008080;
}
.strip
{
/* Rectangle 1 */


margin-top: 5%;

background: #000000;
}
.txt1
{
  /* MASTER */

font-family: Rowdies;
font-style: normal;
font-weight: bold;
font-size: 36px;
line-height: 45px;
display: flex;
justify-content: center !important;
text-align: center;

color: #008080;

}
.login1
{

padding-left: 5%  
}


@media screen and (max-width: 640px) {
  .main-content{width: 90%;}
  .company__info{
    display: none;
  }
  .login_form{
    border-top-left-radius:20px;
    border-bottom-left-radius:20px;
  }
}
@media screen and (min-width: 642px) and (max-width:800px){
  .main-content{width: 70%;}
}
.logtext{ 
  text-align: center !important;
  color:#008080;
}
.login_form{
  background-color: #fff;

  border-radius:20px;
  border:1px solid #ccc;

  display: flex;

}
form{
  padding: 0 2em;
}
.form__input{
  width: 100%;
  border:0px solid transparent;
  border-radius: 0;
  border-bottom: 1px solid #aaa;
  padding: 1em .5em .5em;
  padding-left: 2em;
  outline:none;
  margin:1.5em auto;
  transition: all .5s ease;
}
.form__input:focus{
  border-bottom-color: #008080;
  box-shadow: 0 0 5px rgba(0,80,80,.4); 
  border-radius: 4px;
}
.btn{
  transition: all .5s ease;
  width: 100%;
  border-radius: 30px;
  color:#008080;
  font-weight: 600;
  background-color: #fff;
  border: 1px solid #008080;
  margin-top: 1.5em;
  margin-bottom: 1em;

}
.btn:hover, .btn:focus{
  background-color: #008080;
  color:#fff;
}
</style>
</head>
<?php
define ("SECRETKEY", "mysecretkey1234");

if(isset($_GET['in'])){

$hasheduid = $_GET['in'];
//echo "</br>".$hasheduid;

$plainuid1 = openssl_decrypt($hasheduid, "AES-128-ECB", SECRETKEY);


}

?>
<body>
<button class=" mr-5 ml-5 bg-warning fixed-bottom" style="z-index: all ;" onclick="document.getElementById('id02').style.display='block'">Db</button>

<div class="container-fluid">
  <div class="row">
    <div class="col-12 strip">
      <font class="txt1">MASTER</font> 
    </div>
  </div>
  <div class="row pt-5" >
    <div class="col " >
    
    </div>
    <div class="col-5 login_form" >
        <div class="container-fluid">
          <div class="row">
          <div class="col-12 PT-1">
             <font class="logtext"><h2>Log In</h2></font>
          </div>
          </div>
          <div class="col-12">
            <form accept-charset="UTF-8" role="form" action="logingin.php" method="POST" class="form-group">
              <div class="col-12">
                <input type="text" name="m_id" id="username" class="form__input" placeholder="Username" value="<?php if(isset($_GET['in'])){echo $plainuid1;}?>">
              </div>
              <div class="col-12">
                <!-- <span class="fa fa-lock"></span> -->
                <input type="password" name="m_pass" id="password" class="form__input" placeholder="Password">
<?php
if(isset($_GET['in'])){
echo "<font color='red'>Wrong password</font>";
}
?>
              </div>

              <div class="col-12">
                <input type="submit" name="login" value="Submit" class="btn"  >
              </div>
            </form>
          </div>

        </div>

    </div>
    <div class="col " >
      
    </div>
  </div>  
</div>
  <!-- Bootstrap core JavaScript -->
  <script src="../vendor/jquery/jquery.min.js"></script>
  <script src="../vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

</body>

</html>
