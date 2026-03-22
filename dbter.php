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
$db_n="id11548551_society_db";
  //isdbarrExists($con,array("college"));
        IfNotcreatedb($con,$db_n);
        $con->select_db($db_n);
        $coln=array("society_id","society_name","total_buildings");
        $coldisc=array("int auto_increment,primary key($coln[0])","varchar(50) not null","int not null");
    IfNotcreatetbl($con,"society_details",$coln,$coldisc);
        
        $coln=array("building_id","building_name","society_id","no_of_wings","total_flats","total_residents","flats_on_rent");
        $coldisc=array("int auto_increment,primary key($coln[0])","varchar(50) not null","int not null","int not null","int not null","int not null","int not null");
    IfNotcreatetbl($con,"building_details",$coln,$coldisc);
        
        $coln=array("wing_id","wing_name","building_id","total_floors","total_flats","total_residents","flats_on_rent");
        $coldisc=array("int auto_increment,primary key($coln[0])","varchar(50) not null","int not null","int not null","int not null","int not null","int not null");
    IfNotcreatetbl($con,"wing_details",$coln,$coldisc);
        
        $coln=array("floor_id","floor_no","wing_id","total_flats","total_residents","flats_on_rent");
        $coldisc=array("int auto_increment,primary key($coln[0])","int not null","int not null","int not null","int not null","int not null");
    IfNotcreatetbl($con,"floor_details",$coln,$coldisc);

        $coln=array("flat_id","flat_no","floor_id","total_residents");
        $coldisc=array("int auto_increment,primary key($coln[0])","int not null","int not null","int not null");
    IfNotcreatetbl($con,"flat_details",$coln,$coldisc);

        $coln=array("f_name","m_name","l_name","uid","pwd","prof_type");
        $coldisc=array("varchar(30) not null","varchar(30) not null","varchar(30) not null","varchar(320),primary key($coln[3])","varchar(150) not null","int not null");
    IfNotcreatetbl($con,"user_details",$coln,$coldisc);



        $coln=array("n_id","news_head","news_content","uid");
        $coldisc=array("int auto_increment,primary key($coln[0])","Tinytext","text","varchar(320)");
    IfNotcreatetbl($con,"news_details",$coln,$coldisc);

        $coln=array("not_id","not_head","not_content","uid","not_topic","datee");
        $coldisc=array("int auto_increment,primary key($coln[0])","tinytext","text","varchar(30)","varchar(30)","varchar(30)");
    IfNotcreatetbl($con,"notice_details",$coln,$coldisc);

        $coln=array("co_id","co_head","co_content","uid","co_about","datee");
        $coldisc=array("int auto_increment,primary key($coln[0])","tinytext","text","varchar(30)","varchar(30)","varchar(30)");
    IfNotcreatetbl($con,"complaints_details",$coln,$coldisc);

        $coln=array("pd_id","uid","method","doneby","date","topic","amt");
        $coldisc=array("int auto_increment,primary key($coln[0])","varchar(320)","varchar(30)","varchar(320)","varchar(30)","varchar(30)","int" );
    IfNotcreatetbl($con,"payment_details",$coln,$coldisc);

        $coln=array("ps_id","topic","amt");
        $coldisc=array("int auto_increment,primary key($coln[0])","varchar(30)","int");
    IfNotcreatetbl($con,"payment_structure",$coln,$coldisc);

        $coln=array("entry_id","name","visit_to","category","reason","entry_time","entered_by","exit_time","exited_by");
        $coldisc=array("int auto_increment,primary key($coln[0])","varchar(50)","varchar(10)","varchar(15)","text","varchar(20)","varchar(350)","varchar(20)","varchar(350)");
    IfNotcreatetbl($con,"entry_register",$coln,$coldisc);





}//else if con


?>
</div>
    
  </div>

</div>
<!-- <button class=" mr-5 ml-5 bg-warning fixed-bottom" style="z-index: all ;" onclick="document.getElementById('id02').style.display='block'">Db</button>
 --></body>
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

	