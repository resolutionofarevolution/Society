<?php
define("SECRETKEY","mysecretkey12345");
include('../../config.php');

$con=mysqli_connect($servername,$username,$password,"society_db");

$hasheduid = $_GET['in'] ?? '';
$uid = openssl_decrypt($hasheduid,"AES-128-ECB",SECRETKEY);

// user
$user = mysqli_fetch_assoc(mysqli_query($con,"SELECT * FROM user_details WHERE uid='$uid'"));
$profile = $user['prof_type'];

// time ago
function timeAgo($datetime){
    $time = strtotime($datetime);
    $diff = time() - $time;

    if($diff < 60) return $diff." sec ago";
    elseif($diff < 3600) return floor($diff/60)." min ago";
    elseif($diff < 86400) return floor($diff/3600)." hrs ago";
    elseif($diff < 2592000) return floor($diff/86400)." days ago";
    else return date("d M Y", $time);
}

// filter
$filter = $_GET['filter'] ?? 'all';

if($filter == 'my'){
    $query = "
    SELECT n.*, u.f_name, u.l_name, u.prof_type
    FROM news_details n
    LEFT JOIN user_details u ON n.uid=u.uid
    WHERE n.uid='$uid'
    ORDER BY n.id DESC
    ";
} else {
    $query = "
    SELECT n.*, u.f_name, u.l_name, u.prof_type
    FROM news_details n
    LEFT JOIN user_details u ON n.uid=u.uid
    ORDER BY n.id DESC
    ";
}

$result=mysqli_query($con,$query);
?>

<!-- POST BOX -->
<div class="post-box">

  <div class="post-top">
    <img src="https://i.pravatar.cc/40" class="post-avatar">

    <div class="post-input-box" onclick="openFeedModal()">
      Start a post
    </div>
  </div>


</div>

<!-- MODAL -->
<div id="feedModal" class="c-modal">
  <div class="c-box">

    <h5 class="mb-3">Create a post</h5>

    <form onsubmit="submitFeed(event)">
      <input type="hidden" id="uid" value="<?php echo $uid; ?>">

      <textarea
        id="content"
        class="form-control mb-3"
        placeholder="What do you want to talk about?"
        required>
      </textarea>

      <div class="text-end">
        <button type="button" class="btn btn-secondary btn-sm" onclick="closeFeedModal()">Cancel</button>
        <button type="submit" class="btn btn-primary btn-sm">Post</button>
      </div>

    </form>

  </div>
</div>

<div class="c-wrap">

<!-- HEADER -->
<div class="c-header">
  <h4>Community Updates</h4>
</div>

<!-- FILTER -->
<div class="c-tabs">
  <button class="c-tab <?php if($filter=='all') echo 'active'; ?>"
    onclick="loadModule('feed/index.php?in=<?php echo $hasheduid ?>&filter=all')">
    All Updates
  </button>

  <button class="c-tab <?php if($filter=='my') echo 'active'; ?>"
    onclick="loadModule('feed/index.php?in=<?php echo $hasheduid ?>&filter=my')">
    My Updates
  </button>
</div>

<!-- FEED -->
<div class="c-feed">

<?php while($row=mysqli_fetch_assoc($result)){ ?>

<div class="c-card">

  <div class="c-top">
    <div>
      <div class="c-title">
        <?php echo htmlspecialchars($row['news_head']); ?>
      </div>

      <div class="c-meta">
        <?php echo $row['f_name']." ".$row['l_name']; ?>

        <?php if($row['prof_type']==1){ ?>
          <span class="role-badge admin">Admin</span>
        <?php } else { ?>
          <span class="role-badge resident">Resident</span>
        <?php } ?>
      </div>
    </div>

    <?php
    $isOwner = ($row['uid'] == $uid);
    if($profile==1 || $isOwner){
    ?>
      <button onclick="deleteFeed(<?php echo $row['id']; ?>)" class="btn btn-sm btn-light text-danger">
        <i class="fa fa-trash"></i>
      </button>
    <?php } ?>
  </div>

  <div class="c-body">
    <?php echo nl2br(htmlspecialchars($row['news_content'])); ?>
  </div>

  <div class="c-time">
    <?php echo timeAgo($row['date']); ?>
  </div>

</div>

<?php } ?>

</div>

</div>