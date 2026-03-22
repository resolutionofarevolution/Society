<?php

error_reporting(E_ALL);
ini_set('display_errors',1);

define("SECRETKEY","mysecretkey1234");

include($_SERVER['DOCUMENT_ROOT'].'/Society/config.php');

$con=mysqli_connect($servername,$username,$password,"society_db");

$hasheduid=$_GET['in'] ?? '';

$uid=openssl_decrypt($hasheduid,"AES-128-ECB",SECRETKEY);

$sql="SELECT * FROM user_details WHERE uid='$uid'";
$res=mysqli_query($con,$sql);
$user=mysqli_fetch_assoc($res);

$profile=$user['prof_type'];
$f_name=$user['f_name'];
$l_name=$user['l_name'];

include('../sidebar.php');

$query="

SELECT
n.id,
n.not_head,
n.not_content,
n.not_topic,
DATE_FORMAT(n.datee,'%d %b %Y') as datee,
u.f_name,
u.l_name

FROM notice_details n
LEFT JOIN user_details u
ON n.uid=u.uid

ORDER BY n.datee DESC

";

$result=mysqli_query($con,$query);

?>

<div class="container-fluid">

<div class="d-flex justify-content-between mb-4">

<h4>Society Notices</h4>

<?php if($profile==1){ ?>

<button class="btn btn-primary" data-toggle="modal" data-target="#noticeModal">
+ New Notice
</button>

<?php } ?>

</div>

<div class="row" id="noticeContainer">

<?php while($row=mysqli_fetch_assoc($result)){ ?>

<div class="col-lg-6 mb-4">

<div class="notice-card">

<div class="notice-icon">
<i class="fa fa-bullhorn"></i>
</div>

<div class="notice-body">

<div class="notice-header">

<h5><?php echo htmlspecialchars($row['not_head']); ?></h5>

<span class="badge badge-primary">
<?php echo $row['not_topic']; ?>
</span>

</div>

<div class="notice-content">
<?php echo nl2br(htmlspecialchars($row['not_content'])); ?>
</div>

<div class="notice-footer">
Posted by <?php echo $row['f_name']." ".$row['l_name']; ?>
• <?php echo $row['datee']; ?>
</div>

</div>
</div>
</div>

<?php } ?>

</div>
</div>

<?php if($profile==1){ ?>

<!-- Modal -->

<div class="modal fade" id="noticeModal">

<div class="modal-dialog">

<div class="modal-content">

<div class="modal-header">
<h5>New Notice</h5>
<button class="close" data-dismiss="modal">&times;</button>
</div>

<div class="modal-body">

<form id="noticeForm">
    <input type="hidden" name="uid" value="<?php echo $uid; ?>">

    <div class="form-group">
        <label>Title</label>
        <input type="text" name="title" class="form-control" required> </div>

    <div class="form-group">
        <label>Topic</label>
        <select name="topic" class="form-control"> <option value="Water Supply">Water Supply</option>
            <option value="Payment">Payment</option>
            <option value="Event">Event</option>
        </select>
    </div>

    <div class="form-group">
        <label>Content</label>
        <textarea name="content" class="form-control" required></textarea> </div>

    <button type="submit" class="btn btn-success">Post Notice</button>
</form>

</div>
</div>
</div>
</div>

<?php } ?>

<style>

.notice-card{

display:flex;
gap:15px;
background:white;
padding:20px;
border-radius:10px;
box-shadow:0 3px 10px rgba(0,0,0,0.08);
height:180px;

}

.notice-icon{

width:40px;
height:40px;
background:#2563eb;
color:white;
display:flex;
align-items:center;
justify-content:center;
border-radius:8px;

}

.notice-header{

display:flex;
justify-content:space-between;

}

.notice-content{

overflow:auto;
font-size:14px;
height:80px;

}

.notice-footer{

font-size:12px;
color:#777;

}

</style>
<script>
$("#noticeForm").on("submit", function(e){
    e.preventDefault();

    $.ajax({
        url: "api_add_notice.php", // Correct relative path
        type: "POST",
        data: $(this).serialize(), // This packs up all your "name" fields
        success: function(res){
            // If PHP sends warnings + JSON, we need to find the JSON part
            try {
                let r = (typeof res === 'object') ? res : JSON.parse(res.substring(res.lastIndexOf('{')));

                if(r.status === "success"){
                    alert("Notice Posted!");
                    $("#noticeModal").modal("hide");
                    location.reload(); // Best way to stay in the module and see the new post
                } else {
                    alert("Error: " + r.message);
                }
            } catch(err) {
                console.error("Server Error Response:", res);
                alert("The server sent back an invalid response. Check console (F12).");
            }
        }
    });
});
</script>