
<!DOCTYPE html>
<html lang="en">
<?php 
$protocol = strtolower(substr($_SERVER["SERVER_PROTOCOL"],0,5))=='http'?'https':'http';
$severn=$_SERVER['SERVER_NAME'];
$server=$protocol."://".$severn."/";

?>
<head>

  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>MASTER</title>

  <!-- Bootstrap core CSS -->
  <link href="<?php echo $server.'Society';?>/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

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
  padding: 0.5em;
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

  span {cursor:pointer; }
    .number{
      margin:0px;
    }
    .minus, .plus{
      font-weight: bold;
      background:#f2f2f2;
      border-radius:4px;
      padding:1%;
      display: inline-block;
      vertical-align: middle;
      text-align: center;

  transition: all .5s ease;
  color:#008080;
  font-weight: 600;
  background-color: #fff;
  border: 1px solid #008080;
    }

.minus:hover, .minus:focus,.plus:hover,.plus:focus{
  background-color: #008080;
  color:#fff;
}    
.txt2
{
  /* MASTER */

font-family: Rowdies;
font-style: normal;
font-weight: bold;
font-size: 20px;

justify-content: center !important;
text-align: center;

color: #008080;

}
    input{
      height:34px;
      width: 25%;
      text-align: center;
      font-size: 26px;
      border:1px solid #ddd;
      border-radius:4px;
      display: inline-block;
      vertical-align: middle;

</style>
</head>

<body>
<nav class="navbar navbar-expand-lg navbar-light fixed-top bg-dark" style="" >
  <div class="container">

    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
    <div class="collapse navbar-collapse" id="navbarResponsive">
      <ul class="navbar-nav ml-5">
        <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle  text-light" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          NEW
        </a>
        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
          <a class="dropdown-item" data-toggle="modal" data-target="#newpackage" href="#">New Society</a>
          <a class="dropdown-item" data-toggle="modal" data-target="#newpackage" href="#">New Package</a>
          <a class="dropdown-item" data-toggle="modal" data-target="#EditPlan" href="#">New MASTER</a>
        </div>
      </li>   
        <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle  text-light" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          EDIT
        </a>
        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
          <a class="dropdown-item" data-toggle="modal" data-target="#signupModal" href="#">Edit Society</a>
          <a class="dropdown-item" href="#">Edit Package</a>
          <a class="dropdown-item" href="#">Edit MASTER</a>
        </div>
      </li>            
       </ul> 
      <ul class="navbar-nav ml-auto">
        <li class="nav-item active">
<div style="">
<font style="text-transform: uppercase; color: white; font-weight: bold;">
    <?php echo "Name"; ?>  
</font>
</br>
<font style="color: white; font-weight: bold; right:0px;">
    <?php echo "USER ID:- " ; ?>  
</font>

</div>
        </li>
        <li class="nav-item p-1">
        <img class="rounded-circle z-depth-2 dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" alt="100x100" src="adm.jpg"
          data-holder-rendered="true" width="40" height="40">
            <div class="dropdown-menu" aria-labelledby="dropdownMenuButton" style=" max-width: 20%; left: 75%;">
<div >                
<font style="color: black; font-weight: bold;   ">
    <?php //echo "USER ID:- ".$uid; ?> 
</font>   
</div>

<div >              
<img class="rounded-square z-depth-2" alt="100x100" src="adm.jpg" data-holder-rendered="true" width="100" height="100" >
</div>
<div > 
<font style="text-transform: uppercase; color: black; font-weight: bold; ">
    <?php //echo "</br>".$f_name."<br>".$l_name; ?>  
</font>
</div>

          <div >
            <a href="<?php echo $server.'Society/master/';?>">
              <button type="button" class="btn btn-danger btn-sm " style="left:80%;">
                  <span class="fa fa-sign-out"></span> Log out
              </button></a>
          </div>               
            </div>
        </li>

      </ul>
    </div>
  </div>

</nav>
  <!-- Bootstrap core JavaScript -->
  <script src="<?php echo $server.'Society';?>/vendor/jquery/jquery.min.js"></script>
  <script src="<?php echo $server.'Society';?>/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- New package start -->
<div class="modal fade" id="newpackage" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog " role="document" >
    <div class="modal-content col-lg-12"  style="min-height: 90%;">
      <div class="modal-header">

          <h4>New Package</h4>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">

        <div class="d-flex flex-column text-center">
          <form action="navbar/add_plan.php" method="post">



            <div class="row">
              <div class="col-12">
                <input type="text" name="pack_name" id="pack_name" class="form__input" placeholder="Package Name" value="">
              </div>
            </div>
            <div class="row">
              <div class="col-lg-5">
                <font class="txt2">Allowed users:</font>
              </div>              
              <div class="col-lg-7  ">
               <ul style="list-style: none; text-align: left;">
              <li>
                <div class="number">
                  <span style="font-weight: bold;">Admin</span>
                  <span class="minus">-</span>
                  <input type="text" value="0"/>
                  <span class="plus">+</span>
                </div>
              </li>
              <li>
                <div class="number">
                  <span style="font-weight: bold;">Resident</span>
                  <span class="minus">-</span>
                  <input type="text" value="0"/>
                  <span class="plus">+</span>
                </div>
              </li>
              <li>
                <div class="number">
                  <span style="font-weight: bold;">Security</span>
                  <span class="minus">-</span>
                  <input type="text" value="0"/>
                  <span class="plus">+</span>
                </div>
              </li>

              </div>
            </div>            
            <div class="row">
              <div class="col-lg-5">
                <font class="txt2">Deuration:</font>
              </div>              
              <div class="col-lg-7  ">
               <ul style="list-style: none; text-align: left;">
              <li>
                <div class="number">
                  <span class="minus">-</span>
                  <input type="text" value="0"/>
                  <span class="plus">+</span>
                  <span style="font-weight: bold;">Years</span>

                </div>
              </li>
              <li>
                <div class="number">
                  <span class="minus">-</span>
                  <input type="text" value="0"/>
                  <span class="plus">+</span>
                  <span style="font-weight: bold;">Months</span>

                </div>
              </li>              
              <li>
                <div class="number">
                  <span class="minus">-</span>
                  <input type="text" value="0"/>
                  <span class="plus">+</span>
                  <span style="font-weight: bold;">Days</span>

                </div>
              </li>
              </div>
            </div>
            <div class="row">
              <div class="col-12 p-0">
                <input type="text" name="pack_cost" id="pack_cost" class="form__input" placeholder="Package Cost" value="">
              </div>
            </div>            
            <div class="row">
              <div class="col-lg-12 p-0" >
                <button type="submit" name="sub" value="<?php echo $hasheduid; ?>" placeholder="Save" class="btn btn-info btn-block">Create Package</button>
              </div> 
            </div>
          </form>
      </div>
    </div>

  </div>
</div>
</div>
<script type="text/javascript">
    $(document).ready(function() {
      $('.minus').click(function () {
        var $input = $(this).parent().find('input');
        var count = parseInt($input.val()) - 1;
        count = count < 1 ? 1 : count;
        $input.val(count);
        $input.change();
        return false;
      });
      $('.plus').click(function () {
        var $input = $(this).parent().find('input');
        $input.val(parseInt($input.val()) + 1);
        $input.change();
        return false;
      });
    });
</script>
<!-- add plan end --> 
  <script src="../vendor/jquery/jquery.min.js"></script>
  <script src="../vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
</body>

</html>
