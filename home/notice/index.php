<?php
define("SECRETKEY","mysecretkey12345");
include($_SERVER['DOCUMENT_ROOT'].'/Society/config.php');

$con = mysqli_connect($servername,$username,$password,"society_db");

$hasheduid = urldecode($_GET['in'] ?? '');
$uid =  openssl_decrypt($hasheduid, "AES-128-ECB", SECRETKEY);

// user
$user = mysqli_fetch_assoc(mysqli_query($con,"SELECT * FROM user_details WHERE uid='$uid'"));
$profile = $user['prof_type']; // 1 = admin

// notices
$result = mysqli_query($con,"
SELECT n.*, u.f_name, u.l_name
FROM notice_details n
LEFT JOIN user_details u ON n.uid=u.uid
ORDER BY n.datee DESC
");
?>

<div class="notice-header">
  <h4 class="mb-0">Society Notices</h4>

  <?php if($profile==1){ ?>
    <button class="btn btn-dark btn-sm" onclick="openNoticeModal()">
      + Add Notice
    </button>
  <?php } ?>
</div>

<!-- SCROLL AREA -->
<div class="notice-scroll">
  <div class="row">

    <?php while($row=mysqli_fetch_assoc($result)){ ?>

      <div class="col-12 mb-3">
        <div class="notice-feed">

          <div class="d-flex align-items-start">

            <div class="notice-avatar">
              <i class="fa fa-bullhorn"></i>
            </div>

            <div class="flex-grow-1 ms-3">

              <div class="d-flex justify-content-between align-items-start">

                <div>
                  <h6 class="mb-1 fw-bold">
                    <?php echo htmlspecialchars($row['not_head']); ?>
                  </h6>

                  <span class="badge bg-primary-subtle text-primary">
                    <?php echo htmlspecialchars($row['not_topic']); ?>
                  </span>
                </div>

                <?php if($profile==1){ ?>
                  <button class="btn btn-sm btn-light text-danger"
                          onclick="deleteNotice(<?php echo $row['id']; ?>)">
                    <i class="fa fa-trash"></i>
                  </button>
                <?php } ?>

              </div>

              <p class="mt-2 mb-2 text-muted">
                <?php echo nl2br(htmlspecialchars($row['not_content'])); ?>
              </p>

              <small class="text-secondary">
                Posted by <?php echo $row['f_name']." ".$row['l_name']; ?>
              </small>

            </div>

          </div>

        </div>
      </div>

    <?php } ?>

  </div>
</div>

<!-- MODAL -->
<div id="noticeModal" style="
display:none; position:fixed; inset:0;
background:rgba(0,0,0,0.5); z-index:9999;
justify-content:center; align-items:center;">

  <div style="background:#fff; width:420px; max-width:90%;
  padding:20px; border-radius:12px; box-shadow:0 10px 30px rgba(0,0,0,.2);">

    <h5 class="mb-3">Add Notice</h5>

    <form onsubmit="submitNotice(event)">
      <input type="hidden" id="uid" value="<?php echo $uid; ?>">

      <input id="title" class="form-control mb-2" placeholder="Title" required>
      <input id="topic" class="form-control mb-2" placeholder="Topic" required>
      <textarea id="content" class="form-control mb-3" placeholder="Content" required></textarea>

      <div class="text-end">
        <button type="button" class="btn btn-secondary btn-sm" onclick="closeNoticeModal()">Cancel</button>
        <button type="submit" class="btn btn-success btn-sm">Submit</button>
      </div>
    </form>

  </div>
</div>