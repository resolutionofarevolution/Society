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


</style>
</head>
<body>
<!-- The Modal -->
<div id="id02" class="modal">

  <!-- Modal content -->
  <div class="modal-content">
       <div class="modal-header">
      <h2 align="center">Database Log</span></h2>
   
   <span onclick="document.getElementById('id02').style.display='none'" class="close" title="Close Modal">&times;</span>

        </div>
<div class="modal-body">

<?php
include("config.php");
include("dbtest.php");

if(!$con){ }//if !con
else 
{
$db_n="master_db";
  //isdbarrExists($con,array("college"));
        IfNotcreatedb($con,$db_n);
        $con->select_db($db_n);
        $coln=array("m_id","m_pass","under");
        $coldisc=array("varchar(10) ,primary key($coln[0])","varchar(500) not null","varchar(10) not null");
    IfNotcreatetbl($con,"master_details",$coln,$coldisc);

        $coln=array("package_id","package_name","allowed_admin","allowed_resi","allowed_secu","years","months","days","cost","created_on");
        $coldisc=array("int auto_increment ,primary key($coln[0])","varchar(50) not null","int not null","int not null","int not null","int not null","int not null","int not null","int not null","varchar(20)");
    IfNotcreatetbl($con,"package_details",$coln,$coldisc);    



}//else if con


?>
</div>
    
  </div>

</div>
</body>
<script>
// Get the modal
var modal1 = document.getElementById('id02');

// Get the button that opens the modal
var btn = document.getElementById("myBtn");

// Get the <span> element that closes the modal
var span = document.getElementsByClassName("close")[0];

// When the user clicks the button, open the modal 
btn.onclick = function() {
  modal.style.display = "block";
}

// When the user clicks on <span> (x), close the modal
span.onclick = function() {
  modal.style.display = "none";
}

// When the user clicks anywhere outside of the modal, close it
window.onclick = function(event) {
  if (event.target == modal1) {
    modal.style.display = "none";
  }
}

$(document).on("click", ".open-homeEvents", function () {
     var eventId = $(this).data('id');
          $('#idHolder').html( eventId );
     $('#hid_id').val(eventId);
});
</script>

	