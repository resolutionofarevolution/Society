<head>
<script src="https://ajax.aspnetcdn.com/ajax/jQuery/jquery-3.3.1.min.js">
</script>
<style>


/* The Modal (background) */

/* The Modal (background) */
.modal {
  display: none;/* Hidden by default */
  position: fixed; /* Stay in place */
  z-index: 10; /* Sit on top */
  padding-top: 100px; /* Location of the box */
  left: 0;
  top: 0;
  width: 100%; /* Full width */
  height: 100%; /* Full height */
  color: black;
  background-color: rgb(0,0,0); /* Fallback color */
  background-color: rgba(0,0,0,0.4); /* Black w/ opacity */
}
.modal1 {
  display: none;/* Hidden by default */
  position: fixed; /* Stay in place */
  z-index: 10; /* Sit on top */
  padding-top: 100px; /* Location of the box */
  left: 0;
  top: 0;
  width: 100%; /* Full width */
  height: 100%; /* Full height */
  color: black;
  background-color: rgb(0,0,0); /* Fallback color */
  background-color: rgba(0,0,0,0.4); /* Black w/ opacity */
}
.modal2 {
  display: none;/* Hidden by default */
  position: fixed; /* Stay in place */
  z-index: 10; /* Sit on top */
  padding-top: 100px; /* Location of the box */
  left: 0;
  top: 0;
  width: 100%; /* Full width */
  height: 100%; /* Full height */
  color: black;
  background-color: rgb(0,0,0); /* Fallback color */
  background-color: rgba(0,0,0,0.4); /* Black w/ opacity */
}
.modal3 {
  display: none;/* Hidden by default */
  position: fixed; /* Stay in place */
  z-index: 10; /* Sit on top */
  padding: 0px 0px 0px 0px; /* Location of the box */
  left: 0;
  top: 0;
  width: 100%; /* Full width */
  height: 100%; /* Full height */
  color: black;
  background-color: rgb(0,0,0); /* Fallback color */
  background-color: rgba(0,0,0,0.4); /* Black w/ opacity */
}

/* Modal Content */
.modal-content {
  position: relative;
  background-color: #fefefe;
  margin: auto;
  padding: 0;
  border: 1px solid #888;
  width: 75%;
  height: 75%;
  box-shadow: 0 4px 8px 0 rgba(0,0,0,0.2),0 6px 20px 0 rgba(0,0,0,0.19);
  -webkit-animation-name: animatetop;
  -webkit-animation-duration: 0.4s;
  animation-name: animatetop;
  animation-duration: 0.4s;
 
}

.modal-contentt {
  position: relative;
  background-color: #fefefe;
  margin: auto;
  padding: 0;
  border: 1px solid #888;
  width: 100%;
  height: 100%;
  box-shadow: 0 4px 8px 0 rgba(0,0,0,0.2),0 6px 20px 0 rgba(0,0,0,0.19);
  -webkit-animation-name: animatetop;
  -webkit-animation-duration: 0.4s;
  animation-name: animatetop;
  animation-duration: 0.4s;
 
}

/* Add Animation */
@-webkit-keyframes animatetop {
  from {top:-300px; opacity:0} 
  to {top:0; opacity:1}
}

@keyframes animatetop {
  from {top:-300px; opacity:0}
  to {top:0; opacity:1}
}

/* The Close Button */
.close {

  color: black;
  float: right;
  font-size: 28px;
  font-weight: bold;
}

.close:hover,
.close:focus {
  
  color: #000;
  text-decoration: none;
  cursor: pointer;
}

.modal-header {
  overflow: auto; /* Enable scroll if needed */
  padding: 2px 16px;
  background-color: #fefefe;
  color: black;

}

.modal-body {padding: 2px 16px; height:10%; overflow: auto; /* Enable scroll if needed */}

.modal-footer {
  padding: 2px 16px;
  background-color: #5cb85c;
  color: white;
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
<body>





<!-- The Modal -->
<div id="addsociety" class="modal">

  <!-- Modal content -->
  <div class="modal-content">
       <div class="modal-header">
      <h2 align="center">Add Society</span></h2>
   
   <span onclick="document.getElementById('addsociety').style.display='none'" class="close" title="Close Modal">&times;</span>

     </div>
<div class="modal-body">
      <div class="row">
            <div class="col-4 p-5">
            
            </div>
            <div  class="col-4">
            </div>
      </div>

      <div class="row">
            <div class="col-2">
              
            </div>
            <div  class="col-8">
                  <form action="insert.php" method="post">
                  <input id="Society" type="text" name="Society_name" placeholder="Enter Society/Area Name Here..."><br><br>
                 
            </div>
            <div class="col-2">
              
            </div>
            <div class="col-4">
              
            </div>
            <div class="col-4">
  
                  <input id="soc_sub" type="submit" name="soc_sub" placeholder="submit">         
                   </form>     
            </div>
            <div class="col-4">
              
            </div>
      </div>
</div>
  </div>

</div>

<div id="addwing" class="modal1">
  <!-- Modal content -->
  <div class="modal-content">
       <div class="modal-header">
      <h2 align="center">Add Wing</span></h2>
   
   <span onclick="document.getElementById('addwing').style.display='none'" class="close" title="Close Modal">&times;</span>

        </div>
<div class="modal-body">
      <div class="row">
            <div class="col-4 p-5">
            
            </div>
            <div  class="col-4">
            </div>
      </div>

      <div class="row">
            <div class="col-2">
<?php
if ($_SERVER['REQUEST_METHOD'] == 'POST') 
{
  if(isset($_POST['building_id']))
  {
    $_SESSION["building_id"]=$_POST['building_id'];
  }
}
?>              
            </div>
            <div  class="col-8">
                  <form action="insert.php" method="post">

    <?php
    $society_name=$_SESSION["society_name"];
 
    $building_id=$_SESSION["building_id"];
    $sql="select * from wing_details where building_id=$building_id";
    $result=$con->query($sql);
    $row = mysqli_fetch_array($result);
    //echo "->".$building_id."wn".$row['wing_name'];
    if($result->num_rows == 0)
    {
    ?>

                  <div style="padding-left: 30%; justify-content: center;"><font style="font-weight: bold; "><h5>Building has no wings<input style="width: 10%; padding: 20%;" type="checkbox" id="nowings" onclick="ShowHide('Wing')" name="nowings" unchecked></h5></font><font id="uncheck" color="red" style="display: none; align-content: center; font-weight: bolder;">Uncheck To add wing</font></div> 
                  <input id="Wing" type="text" name="Wing_name" placeholder="Type Name for Wing"><br><br>
                  </div>
            <div class="col-2">
              
            </div>
            <div class="col-4">
              
            </div>
            <div class="col-4">
                  <input id="society_name" type="Hidden" name="society_name" value="<?php echo $society_name; ?>">
                  <input id="building_id" type="Hidden" name="building_id" value="<?php echo $building_id; ?>">
                  <input id="wing_sub" style="display: block;" type="submit" name="wing_sub" placeholder="submit">                       
                   </form>     
            </div>
            <div class="col-4">
            </div>
     <?php      
    }
    else
    {
            if ($row['wing_name']=='nowing') 
            {
            ?>

                          <div style="padding-left: 30%; justify-content: center;"><font style="font-weight: bold; "><h5>Building has no wings<input style="width: 10%; padding: 20%;" type="checkbox" id="nowings" onclick="ShowHide('Wing')" name="nowings" checked></h5></font><font id="uncheck" color="red" style="display: block; align-content: center; font-weight: bolder;">Uncheck To add wing</font></div> 
                          <input id="Wing" style="display: none;" type="text" name="Wing_name" placeholder="Type Name for Wing"><br><br>
                          </div>
            <div class="col-2">
              
            </div>
            <div class="col-4">
              
            </div>
            <div class="col-4">
                   
                  <input id="building_id" type="Hidden" name="building_id" value="<?php echo $building_id; ?>">
                  <input id="wing_sub" style="display: none;" type="submit" name="wing_sub" placeholder="submit">                       
                   </form>     
            </div>
            <div class="col-4">
            </div>
            <?php
            }
            elseif($row['wing_name']!='nowing') 
            {
            ?>

                          <div style="padding-left: 30%; justify-content: center;"><font style="font-weight: bold; "><h5>Building has no wings<input style="width: 10%; padding: 20%;" type="checkbox" id="nowings" onclick="ShowHide('Wing')" name="nowings" unchecked></h5></font><font id="uncheck" color="red" style="display: none; align-content: center; font-weight: bolder;">Uncheck To add wing</font></div> 
                          <input id="Wing" style="display: block;" type="text" name="Wing_name" placeholder="Type Name for Wing"><br><br>
                          </div>
            <div class="col-2">
              
            </div>
            <div class="col-4">
              
            </div>
            <div class="col-4">
                  <input id="society_name" type="Hidden" name="society_name" value="<?php echo $society_name; ?>">
                  <input id="building_id" type="Hidden" name="building_id" value="<?php echo $building_id; ?>">
                  <input id="building_id" type="Hidden" name="building_id" value="<?php echo $building_id; ?>">
                  <input id="wing_sub" style="display: block;" type="submit" name="wing_sub" placeholder="submit">                       
                   </form>     
            </div>
            <div class="col-4">
            </div>
             <?php      
            }
    }  
    ?>   

                </div>  

            </div>         

      </div>
</div>

  </div>

</div>

<!-- The Modal -->
<div id="addflrnflt" class="modal3 col-12">

  <!-- Modal content -->
    <div class="modal-content">
       <div class="modal-header">
          <h2 align="center">Add Floors and flats</span></h2>
   <?php echo $_SESSION["wing_name"]; ?>
              <span onclick="document.getElementById('addflrnflt').style.display='none'" class="close" title="Close Modal">&times;</span>

        </div>
        <div class="modal-body">
    <div class="row">
    <div class=" col-md-1">
    </div>

    <div class=" col-md-12" id="dp1" style="border:solid #eef5b2; justify-content: center;     background-color: rgba(0,0,0,0.5); 
margin:0% 0% 0% 0%; padding:0% 0% 0% 0%; width: 100%; height: auto;  margin-left: 0px; overflow: auto;">
         
          <table id="myTable" border="1px" style="margin-top: 0px; border:solid 2px; width: 100%; margin-left: 0px; ">  

          </table> 
                    <table id="myTable" border="1px" style="margin-top: 0px; border:solid 2px; width: 50%; margin-left: 0px; ">  
            
          </table>

      </div>
  </div>
          <div class="col-12" style=" padding: 0%; position: absolute; background: #eef5b2; float: center; bottom: 0rem; 
 height: 10%; font-family: cursive; font-size: 20px; justify-content: center;   white-space: nowrap; right: 0rem;">
              <input type="number" style="width: 0%; height: 0%; border:0px;" id="floor" value="-1" readonly="true" />

              <button type="button" onclick="addfloor()">Add Floor</button>
              <button type="button" onclick="delfloor()">Delete Floor</button>

          </div>
 
        </div>

  </div>

</div>



</body>

<script>
function addfloor() 
{  

var floor=document.getElementById("floor").stepUp(1);

var intfloor = parseInt(document.getElementById("floor").value);
var table = document.getElementById("myTable");  
var row = table.insertRow(0); 
row.id = intfloor; 
document.getElementById(intfloor).style = "border:solid red 2px; height:25%; width : 25%;";

var cell1 = row.insertCell(0);

cell1.innerHTML = "Floor-"+ intfloor + "<input type='number' style='width: 10%; height: 20%; border:0px;' id='floor"+intfloor+"' value="+intfloor+" readonly='true'><input type='number'  id='flat"+intfloor+"'' value='0' style='width: 20%; height: 20%; border:0px;' readonly='true' ><button type='button' onclick='addflat("+intfloor+")'>Add Flat</button><button id='delflat"+intfloor+"' type='button' onclick='delflat("+intfloor+")'>Delete Flat</button>";  



}
function addflat(intfloor) 
{  

var flat=document.getElementById("flat"+intfloor+"").stepUp(1);
var intflat = parseInt(document.getElementById("flat"+intfloor+"").value);


rowid=document.getElementById(intfloor);
var table = document.getElementById("myTable");  
var row =   rowid;
var cell2 = row.insertCell(-1);

cell2.innerHTML = intfloor+"0"+intflat;
cell2.style.border= "solid black 2px"; 
flat.value=intflat;

}

function delfloor() 
{  

var floor=document.getElementById("floor").stepUp(-1);

var intfloor = parseInt(document.getElementById("floor").value);
var table = document.getElementById("myTable");  
var row = table.deleteRow(0); 

}
function delflat(intfloor) 
{  

var flat=document.getElementById("flat"+intfloor+"").stepUp(-1);

if (flat <= 0) {
var delflat=document.getElementById("delflat"+intfloor+"");
delflat.readonly=true;
}
else
{
var delflat=document.getElementById("delflat"+intfloor+"");
delflat.readonly=true;

}

var intflat = parseInt(document.getElementById("flat"+intfloor+"").value);


rowid=document.getElementById(intfloor);
var table = document.getElementById("myTable");  
var row =   rowid;
var cell2 = row.deleteCell(-1);

}


</script>
        </div>
    </div>

</div>
</body>

<script type="text/javascript">
  function ShowHide(Wing) {
   // alert(wing);
if(nowings.checked==true)
{

        var nowing =document.getElementById("nowings");

        var wing = document.getElementById("Wing");
        wing.style.display =  "none";
        wing.value = "nowing";


        var uncheck = document.getElementById("uncheck");
        uncheck.style.display = "block";
 }
 if(nowings.checked==false)
{

        var nowing =document.getElementById("nowings");

        var wing = document.getElementById("Wing");
        wing.style.display = "block";
        wing.value = "";
        
        var uncheck = document.getElementById("uncheck");
        uncheck.style.display = "none";

        var wing_sub = document.getElementById("wing_sub");
        wing_sub.style.display = "block";

 }
}
</script>
	