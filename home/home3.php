
<?php
$hasheduid = $_GET['in'] ?? '';
$server = $server ?? '';
?>

<div class="container">
<div class="row">

<!-- News Feed -->

<div class="col-6 col-lg-4">
<a href="<?=$server?>Society/home/feed/index.php?in=<?=$hasheduid?>">

<div class="box21">
<div class="our-team-main">

<div class="team-front p-0">

<div class="row inrow">

<div class="col-lg-5 symbol" style="background:#9c27b0">
<i class="fa fa-list-alt" style="font-size:300%"></i>
</div>

<div class="col-lg-7 symtext">
<span>News Feed</span>
</div>

</div>

</div>

<div class="team-back">
<div class="box-content">
<h4 class="title">News Feed</h4>
</div>
</div>

</div>
</div>

</a>
</div>


<!-- Notice -->

<div class="col-6 col-lg-4">
<a href="<?=$server?>Society/home/notice/index.php?in=<?=$hasheduid?>">

<div class="box21">
<div class="our-team-main">

<div class="team-front p-0">

<div class="row inrow">

<div class="col-lg-5 symbol" style="background:#336699">
<i class="fa fa-exclamation" style="font-size:300%"></i>
</div>

<div class="col-lg-7 symtext">
<span>Notice</span>
</div>

</div>

</div>

</div>
</div>

</a>
</div>


<!-- Complaints -->

<div class="col-6 col-lg-4">
<a href="<?=$server?>Society/home/complaints/index.php?in=<?=$hasheduid?>">

<div class="box21">
<div class="our-team-main">

<div class="team-front p-0">

<div class="row inrow">

<div class="col-lg-5 symbol" style="background:#607d8b">
<i class="far fa-thumbs-down" style="font-size:300%"></i>
</div>

<div class="col-lg-7 symtext">
<span>Complaints</span>
</div>

</div>

</div>

</div>
</div>

</a>
</div>


<!-- Payments -->

<div class="col-6 col-lg-4">
<a href="<?=$server?>Society/home/payments/index.php?in=<?=$hasheduid?>">

<div class="box21">
<div class="our-team-main">

<div class="team-front p-0">

<div class="row inrow">

<div class="col-lg-5 symbol" style="background:#4caf50">
<i class="fa fa-rupee" style="font-size:300%"></i>
</div>

<div class="col-lg-7 symtext">
<span>Payments</span>
</div>

</div>

</div>

</div>
</div>

</a>
</div>

</div>
</div>
