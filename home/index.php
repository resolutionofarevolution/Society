<?php
$hasheduid = $_GET['in'] ?? '';
?>

<!DOCTYPE html>
<html lang="en">
<head>

<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">

<title>Society Dashboard</title>

<link rel="stylesheet"
href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css">

<link rel="stylesheet"
href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">

<link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600&display=swap" rel="stylesheet">

<style>

body{
font-family:'Inter',sans-serif;
background:#f5f7fb;
margin:0;
}

/* SIDEBAR */

.sidebar{
width:260px;
height:100vh;
position:fixed;
left:0;
top:0;
background:#1f2937;
color:white;
padding-top:15px;
transition:0.3s;
z-index:1000;
}

.sidebar h5{
padding-left:20px;
margin-bottom:20px;
}

.sidebar a{
display:block;
padding:12px 20px;
color:#d1d5db;
text-decoration:none;
font-size:14px;
}

.sidebar a:hover{
background:#374151;
color:white;
}

.close-btn{
display:none;
position:absolute;
right:15px;
top:15px;
cursor:pointer;
font-size:18px;
}

/* MAIN */

.main{
margin-left:260px;
padding:20px;
}

/* TOPBAR */

.topbar{
background:white;
padding:15px 20px;
border-radius:10px;
margin-bottom:20px;
box-shadow:0 2px 6px rgba(0,0,0,0.05);
}

/* CONTENT */

#content-area{
background:white;
padding:25px;
border-radius:12px;
min-height:600px;
box-shadow:0 2px 6px rgba(0,0,0,0.05);
}

/* OVERLAY */

#overlay{
position:fixed;
top:0;
left:0;
width:100%;
height:100%;
background:rgba(0,0,0,0.4);
display:none;
z-index:900;
}

/* MOBILE */

@media(max-width:768px){

.sidebar{
transform:translateX(-260px);
}

.sidebar.active{
transform:translateX(0);
}

.close-btn{
display:block;
}

.main{
margin-left:0;
}

}

</style>

</head>

<body>

<!-- OVERLAY -->
<div id="overlay" onclick="closeSidebar()"></div>

<!-- SIDEBAR -->

<div class="sidebar" id="sidebar">

<i class="fa fa-times close-btn" onclick="closeSidebar()"></i>

<h5>Society</h5>

<a onclick="loadModule('feed/index.php?in=<?php echo $hasheduid ?>')">
<i class="fa fa-newspaper"></i> Feed
</a>

<a onclick="loadModule('notice/index.php?in=<?php echo $hasheduid ?>')">
<i class="fa fa-bullhorn"></i> Notices
</a>

<a onclick="loadModule('complaints/index.php?in=<?php echo $hasheduid ?>')">
<i class="fa fa-exclamation-triangle"></i> Complaints
</a>

<a onclick="loadModule('payments/index.php?in=<?php echo $hasheduid ?>')">
<i class="fa fa-credit-card"></i> Payments
</a>

<a href="../login/index.php">
<i class="fa fa-sign-out"></i> Logout
</a>

</div>

<!-- MAIN -->

<div class="main">

<div class="topbar d-flex justify-content-between align-items-center">

<button class="btn btn-outline-secondary d-md-none"
onclick="openSidebar()">

<i class="fa fa-bars"></i>

</button>

<h5 class="m-0">Society Dashboard</h5>

</div>

<div id="content-area">

<div class="text-center p-5">

<h4>Welcome</h4>
<p class="text-muted">Select a module from sidebar</p>

</div>

</div>

</div>

<script>

function openSidebar(){

document.getElementById("sidebar").classList.add("active");
document.getElementById("overlay").style.display="block";

}

function closeSidebar(){

document.getElementById("sidebar").classList.remove("active");
document.getElementById("overlay").style.display="none";

}

function loadModule(url){

closeSidebar();

document.getElementById("content-area").innerHTML=
"<div class='text-center p-5'>Loading...</div>";

fetch(url)
.then(res=>res.text())
.then(html=>{
document.getElementById("content-area").innerHTML=html;
});

}

</script>
<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>

<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>

<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

<script>

$("#noticeForm").submit(function(e){

e.preventDefault();

$.ajax({

url:"notice/api_add_notice.php",

type:"POST",

data:$("#noticeForm").serialize(),

success:function(res){

console.log(res);

let r=JSON.parse(res);

if(r.status=="success"){

$("#noticeModal").modal("hide");

location.reload();

}

}

});

});

</script>
</body>





</html>