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

/*  Notice updated */

/* ===== HEADER ===== */

.notice-header{
display:flex;
justify-content:space-between;
align-items:center;
margin-bottom:10px;
position:sticky;
top:0;
background:#f5f7fb;
padding:10px 0;
z-index:10;
}

/* ===== SCROLL AREA ===== */

.notice-scroll{
max-height:65vh;
overflow-y:auto;
overflow-x:hidden;
padding-right:6px;
}

/* ===== CARD ===== */

.notice-feed{
background:#ffffff;
border-radius:8px;
padding:14px;
border:1px solid #e5e7eb;
transition:all 0.2s ease;
}

.notice-feed:hover{
border-color:#d1d5db;
background:#fafafa;
}

/* ===== AVATAR ===== */

.notice-avatar{
width:38px;
height:38px;
background:#111827;
color:#fff;
display:flex;
align-items:center;
justify-content:center;
border-radius:50%;
font-size:14px;
flex-shrink:0;
}

/* ===== TITLE ===== */

.notice-feed h6{
font-size:14px;
font-weight:600;
color:#111827;
}

/* ===== CONTENT ===== */

.notice-feed p{
font-size:13px;
color:#374151;
margin-top:6px;
line-height:1.4;
}

/* ===== META ===== */

.notice-feed small{
font-size:11px;
color:#6b7280;
}

/* ===== BADGE ===== */

.badge{
font-size:10px;
padding:4px 6px;
border-radius:4px;
background:#eef2ff;
color:#4f46e5;
}

/* ===== DELETE BUTTON ===== */

button.btn-light{
border-radius:50%;
width:30px;
height:30px;
display:flex;
align-items:center;
justify-content:center;
background:#f9fafb;
border:none;
}

button.btn-light:hover{
background:#fee2e2;
color:#dc2626;
}

/* ===== REMOVE HORIZONTAL SCROLL ===== */

.row{
margin-left:0;
margin-right:0;
}

.col-12{
padding-left:0;
padding-right:0;
}

/* ===== SCROLLBAR ===== */

.notice-scroll::-webkit-scrollbar{
width:5px;
}

.notice-scroll::-webkit-scrollbar-thumb{
background:#d1d5db;
border-radius:10px;
}

/*  complaints*/

/* ===== WRAPPER ===== */
.c-wrap{
max-width:700px;
margin:auto;
}

/* ===== HEADER ===== */
.c-header{
margin-bottom:15px;
}

/* ===== TABS ===== */
.c-tabs{
display:flex;
gap:8px;
margin-bottom:15px;
}

.c-tab{
padding:6px 12px;
border:none;
background:#e5e7eb;
border-radius:6px;
font-size:13px;
cursor:pointer;
}

.c-tab.active{
background:#111827;
color:white;
}

/* ===== FEED ===== */
.c-feed{
max-height:65vh;
overflow-y:auto;
}

/* ===== CARD ===== */
.c-card{
background:#fff;
border:1px solid #e5e7eb;
border-radius:10px;
padding:14px;
margin-bottom:10px;
}

.c-top{
display:flex;
justify-content:space-between;
}

.c-title{
font-size:14px;
font-weight:600;
}

.c-meta{
font-size:11px;
color:#6b7280;
}

.c-body{
margin-top:6px;
font-size:13px;
color:#374151;
}

.c-time{
font-size:11px;
color:#9ca3af;
margin-top:5px;
}

/* ===== ADD BUTTON ===== */
.c-add{
position:fixed;
bottom:25px;
right:25px;
background:#111827;
color:white;
border:none;
padding:10px 16px;
border-radius:50px;
font-size:13px;
cursor:pointer;
}

/* ===== MODAL ===== */
.c-modal{
display:none;
position:fixed;
top:0;
left:0;
width:100%;
height:100%;
background:rgba(0,0,0,0.5);
justify-content:center;
align-items:center;
z-index:9999;
}

.c-box{
background:white;
padding:20px;
border-radius:10px;
width:400px;
max-width:90%;
}



/* ===== FEED REFINEMENT (SAFE ADDITIONS ONLY) ===== */

/* spacing between post box and updates */
.post-box{
  margin-bottom:20px;
}

/* improve post input look */
.post-input{
  background:#f9fafb;
  transition:0.2s;
}
.post-input:hover{
  background:#eef2f7;
}

/* role badge */
.role-badge{
  font-size:10px;
  padding:3px 6px;
  border-radius:4px;
  margin-left:6px;
}

.role-badge.admin{
  background:#fee2e2;
  color:#dc2626;
}

.role-badge.resident{
  background:#e0f2fe;
  color:#0284c7;
}

/* small spacing for feed cards */
.c-card{
  margin-bottom:12px;
}
.post-box{
  margin-bottom:20px;
}

.role-badge{
  font-size:10px;
  padding:3px 6px;
  border-radius:4px;
  margin-left:6px;
}

.role-badge.admin{
  background:#fee2e2;
  color:#dc2626;
}

.role-badge.resident{
  background:#e0f2fe;
  color:#0284c7;
}

.sidebar a.active{
  background:#374151;
  color:#fff;
  border-left:3px solid #3b82f6;
}

.topbar{
  background:transparent;
  box-shadow:none;
  margin-bottom:10px;
}


.post-box{
  background:#fff;
  border-radius:12px;
  padding:14px;
  margin-bottom:20px;
  border:1px solid #e5e7eb;
}

.post-top{
  display:flex;
  align-items:center;
  gap:10px;
}

.post-avatar{
  width:40px;
  height:40px;
  border-radius:50%;
}

.post-input-box{
  flex:1;
  border:1px solid #d1d5db;
  border-radius:50px;
  padding:10px 15px;
  background:#f9fafb;
  cursor:pointer;
  font-size:14px;
  color:#6b7280;
}

.post-input-box:hover{
  background:#eef2f7;
}

.post-actions{
  margin-top:10px;
  padding-top:10px;
  border-top:1px solid #e5e7eb;
  display:flex;
  justify-content:flex-start;
}

.post-action{
  font-size:13px;
  color:#374151;
  cursor:pointer;
}
</style>

</head>

<body>

<!-- OVERLAY -->
<div id="overlay" onclick="closeSidebar()"></div>

<!-- SIDEBAR -->

<div class="sidebar" id="sidebar">

<i class="fa fa-times close-btn" onclick="closeSidebar()"></i>

<h5 class="px-3 fw-bold text-white">SocietyHub</h5>

<a onclick="loadModule('feed/index.php?in=<?php echo $hasheduid ?>', this)">
<i class="fa fa-newspaper"></i> Feed
</a>

<a onclick="loadModule('notice/index.php?in=<?php echo $hasheduid ?>', this)">
<i class="fa fa-bullhorn"></i> Notices
</a>


<a onclick="loadModule('complaints/index.php?in=<?php echo $hasheduid ?>', this)">
<i class="fa fa-exclamation-triangle"></i> Complaints
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

<div class="topbar d-flex justify-content-between align-items-center">

  <div>
    <h5 class="m-0 fw-semibold">Dashboard</h5>
    <small class="text-muted">Welcome back 👋</small>
  </div>

  <div class="d-flex align-items-center gap-2">
    <img src="https://i.pravatar.cc/35" style="border-radius:50%">
  </div>

</div>

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


function loadModule(url, el){

  // remove active
  document.querySelectorAll(".sidebar a").forEach(a=>a.classList.remove("active"));

  // add active
  if(el) el.classList.add("active");

  document.getElementById("content-area").innerHTML="Loading...";

  fetch(url)
  .then(res=>res.text())
  .then(html=>{
    document.getElementById("content-area").innerHTML=html;
  });
}


</script>

<script>

// ===== NOTICE MODAL =====
function openNoticeModal(){
  let m = document.getElementById("noticeModal");
  if(m){
    m.style.display = "flex";
  }
}

function closeNoticeModal(){
  let m = document.getElementById("noticeModal");
  if(m){
    m.style.display = "none";
  }
}

// close modal on outside click
window.addEventListener("click", function(e){
  let m = document.getElementById("noticeModal");
  if(m && e.target === m){
    m.style.display = "none";
  }
});




// ===== DELETE NOTICE =====
function deleteNotice(id){
  if(!confirm("Delete this notice?")) return;

  fetch("/Society/home/notice/api_delete_notice.php",{
    method:"POST",
    headers:{"Content-Type":"application/x-www-form-urlencoded"},
    body: "id="+id
  })
  .then(res=>res.text())
  .then(data=>{
    console.log("Delete Response:", data);

    loadModule('notice/index.php?in=<?php echo $hasheduid ?>');
  });
}


function submitNotice(e){
  e.preventDefault();

  let modal = document.getElementById("noticeModal");

  let uid     = modal.querySelector("#uid").value;
  let title   = modal.querySelector("#title").value;
  let topic   = modal.querySelector("#topic").value;
  let content = modal.querySelector("#content").value;

  fetch("/Society/home/notice/api_add_notice.php",{
    method:"POST",
    headers:{"Content-Type":"application/x-www-form-urlencoded"},
    body:
      "uid="+encodeURIComponent(uid)+
      "&title="+encodeURIComponent(title)+
      "&topic="+encodeURIComponent(topic)+
      "&content="+encodeURIComponent(content)
  })
  .then(res=>res.json())   // ✅ IMPORTANT CHANGE
  .then(data=>{
    console.log("Notice Response:", data);

    if(data.status === "success"){   // ✅ MATCH JSON

      // close modal
      modal.style.display = "none";

      // reset
      modal.querySelector("#title").value = "";
      modal.querySelector("#topic").value = "";
      modal.querySelector("#content").value = "";

      // reload
      loadModule('notice/index.php?in=<?php echo $hasheduid ?>');

    } else {
      console.error(data);
    }
  })
  .catch(err=>{
    console.error("Error:", err);
  });
}
</script>

<script>

// ===== COMPLAINT MODAL =====
function openComplaintModal(){
  let m = document.getElementById("complaintModal");
  if(m) m.style.display = "flex";
}

function closeComplaintModal(){
  let m = document.getElementById("complaintModal");
  if(m) m.style.display = "none";
}


// ===== SUBMIT COMPLAINT =====
function submitComplaint(e){
  e.preventDefault();

  let modal = document.getElementById("complaintModal");

  let uid     = modal.querySelector("#uid").value;
  let title   = modal.querySelector("#title").value;
  let content = modal.querySelector("#content").value;

  fetch("/Society/home/complaints/api_add_complaint.php",{
    method:"POST",
    headers:{"Content-Type":"application/x-www-form-urlencoded"},
    body:
      "uid="+encodeURIComponent(uid)+
      "&title="+encodeURIComponent(title)+
      "&content="+encodeURIComponent(content)
  })
  .then(res=>res.json())   // ✅ IMPORTANT
  .then(data=>{
    console.log("Complaint Response:", data);

    if(data.status === "success"){

      // close modal
      modal.style.display = "none";

      // reset fields
      modal.querySelector("#title").value = "";
      modal.querySelector("#content").value = "";

      // reload module
      loadModule('complaints/index.php?in=<?php echo $hasheduid ?>');

    } else {
      console.error(data.msg);
    }
  })
  .catch(err=>{
    console.error("Error:", err);
  });
}

</script>

<script>

// ===== FEED MODAL =====
function openFeedModal(){
  let m = document.getElementById("feedModal");
  if(m) m.style.display = "flex";
}

function closeFeedModal(){
  let m = document.getElementById("feedModal");
  if(m) m.style.display = "none";
}


// ===== SUBMIT FEED =====
function submitFeed(e){
  e.preventDefault();

  let modal = document.getElementById("feedModal");

  let uidEl = modal.querySelector("#uid");
  let contentEl = modal.querySelector("#content");

  if(!uidEl || !contentEl){
    console.error("Feed elements not found");
    return;
  }

  let uid = uidEl.value;
  let content = contentEl.value;

  // auto title (first 50 chars)
  let title = content.substring(0,50);

  fetch("feed/api_add_feed.php",{
    method:"POST",
    headers:{"Content-Type":"application/x-www-form-urlencoded"},
    body:
      "uid="+encodeURIComponent(uid)+
      "&title="+encodeURIComponent(title)+
      "&content="+encodeURIComponent(content)
  })
  .then(res=>res.text())
  .then(text=>{
    console.log("Feed RAW:", text);

    let data;
    try{
      data = JSON.parse(text);
    }catch(e){
      console.error("JSON error:", text);
      return;
    }

    if(data.status === "success"){

      // close modal
      modal.style.display = "none";

      // reset
      contentEl.value = "";

      // reload feed
      loadModule('feed/index.php?in=<?php echo $hasheduid ?>');

    } else {
      console.error(data.msg);
    }
  })
  .catch(err=>{
    console.error("Fetch error:", err);
  });
}


// ===== DELETE FEED =====
function deleteFeed(id){

  if(!confirm("Delete this post?")) return;

  fetch("feed/api_delete_feed.php",{
    method:"POST",
    headers:{"Content-Type":"application/x-www-form-urlencoded"},
    body:"id="+id
  })
  .then(res=>res.text())
  .then(text=>{
    console.log("Delete:", text);

    loadModule('feed/index.php?in=<?php echo $hasheduid ?>');
  });
}
function loadModule(url){

  closeSidebar();

  document.getElementById("content-area").innerHTML =
  "<div class='text-center p-5'>Loading...</div>";

  fetch(url)
  .then(res=>res.text())
  .then(html=>{
    document.getElementById("content-area").innerHTML = html;

    // ✅ ADD THIS LINE
    bindFeedForm();
  });
}

// bind after module load
function bindFeedForm(){
  let form = document.getElementById("feedForm");

  if(form){
    form.addEventListener("submit", function(e){
      e.preventDefault();
      submitFeed();
    });
  }
}


function submitFeed(){

  let modal = document.getElementById("feedModal");

  let uid = modal.querySelector("#uid").value;
  let content = modal.querySelector("#content").value;

  let title = content.substring(0,50);

  console.log("Submitting feed..."); // ✅ DEBUG

  fetch("feed/api_add_feed.php",{
    method:"POST",
    headers:{"Content-Type":"application/x-www-form-urlencoded"},
    body:
      "uid="+encodeURIComponent(uid)+
      "&title="+encodeURIComponent(title)+
      "&content="+encodeURIComponent(content)
  })
  .then(res=>res.text())
  .then(text=>{
    console.log("Response:", text);

    let data = JSON.parse(text);

    if(data.status === "success"){
      modal.style.display = "none";
      modal.querySelector("#content").value = "";

      loadModule('feed/index.php?in=<?php echo $hasheduid ?>');
    }
  });
}
</script>

<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>

<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>

<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

</body>
</html>