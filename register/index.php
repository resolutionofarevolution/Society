
<?php
session_start();

/* -----------------------------------------
   Protocol detection
----------------------------------------- */

$protocol = (!empty($_SERVER['HTTPS']) && $_SERVER['HTTPS'] !== 'off')
            ? 'https'
            : 'http';

$server = $protocol . "://" . $_SERVER['SERVER_NAME'] . "/";

?>

<!DOCTYPE html>
<html lang="en">

<head>

<meta charset="utf-8">
<title>Register</title>

<meta name="viewport" content="width=device-width, initial-scale=1">

<link href="lib/bootstrap/css/bootstrap.min.css" rel="stylesheet">
<link href="lib/font-awesome/css/font-awesome.min.css" rel="stylesheet">

<style>

body {
    height:100vh;
    background:linear-gradient(135deg,#667eea,#764ba2);
    display:flex;
    align-items:center;
    justify-content:center;
    font-family:'Roboto',sans-serif;
}

.register-card {
    background:white;
    padding:40px;
    border-radius:10px;
    box-shadow:0 15px 40px rgba(0,0,0,0.25);
}

.title {
    text-align:center;
    margin-bottom:20px;
}

.step {
    text-align:center;
    color:#777;
    margin-bottom:20px;
}

</style>

</head>

<body>

<div class="container">
<div class="row">
<div class="col-md-5 col-md-offset-3">

<div class="register-card">

<h2 class="title">Create Account</h2>

<?php

/* ======================================
   STEP 1
====================================== */

if(!isset($_POST['next']))
{
?>

<div class="step">STEP 1 / 2</div>

<form action="index.php" method="POST">

<div class="form-group">
<input type="text" class="form-control input-lg" name="f_name" placeholder="First Name" required>
</div>

<div class="form-group">
<input type="text" class="form-control input-lg" name="m_name" placeholder="Middle Name" required>
</div>

<div class="form-group">
<input type="text" class="form-control input-lg" name="l_name" placeholder="Last Name" required>
</div>


<div class="form-group">

<label>Select Account Type</label>

<div class="radio">
<label><input type="radio" name="profile" value="1" onclick="enableNext()"> Admin</label>
</div>

<div class="radio">
<label><input type="radio" name="profile" value="2" onclick="enableNext()"> Security Person</label>
</div>

<div class="radio">
<label><input type="radio" name="profile" value="3" onclick="enableNext()"> Resident</label>
</div>

</div>

<button class="btn btn-primary btn-lg btn-block" id="next" name="next" disabled>
Next
</button>

</form>

<script>

function enableNext(){
document.getElementById("next").disabled=false;
}

</script>

<?php
}

/* ======================================
   STEP 2
====================================== */

if(isset($_POST['next']))
{

$_SESSION['profile']=$_POST['profile'];
$_SESSION['f_name']=$_POST['f_name'];
$_SESSION['m_name']=$_POST['m_name'];
$_SESSION['l_name']=$_POST['l_name'];

?>

<div class="step">STEP 2 / 2</div>

<form action="signingup.php" method="POST">

<div class="form-group">

<input type="email"
       class="form-control input-lg"
       id="uid"
       name="uid"
       placeholder="Email Address"
       required>

<span id="availability"></span>

</div>


<div class="form-group">

<input type="password"
       class="form-control input-lg"
       id="pwd"
       name="pwd"
       placeholder="Password"
       required>

</div>


<div class="form-group">

<input type="password"
       class="form-control input-lg"
       id="pwd1"
       name="pwd1"
       placeholder="Confirm Password"
       required>

<span id="indicator"></span>

</div>


<input type="hidden" name="profile" value="<?php echo $_SESSION['profile']; ?>">
<input type="hidden" name="f_name" value="<?php echo $_SESSION['f_name']; ?>">
<input type="hidden" name="m_name" value="<?php echo $_SESSION['m_name']; ?>">
<input type="hidden" name="l_name" value="<?php echo $_SESSION['l_name']; ?>">

<button class="btn btn-success btn-lg btn-block" id="register" name="signup" disabled>
Sign Me Up
</button>

</form>

<?php
}
?>

<hr>

<p class="text-center">
Already registered?
<a href="<?php echo $server; ?>Society/login/">Login here</a>
</p>

<p class="text-center" style="font-size:12px;color:gray;">
Developed by ROARINTECH
</p>

</div>
</div>
</div>
</div>

<!-- jQuery FIRST -->
<script src="lib/jquery/jquery.min.js"></script>

<script>

var usernameAvailable = false;

/* ---------------------------------------
   Validate Form
--------------------------------------- */

function validateForm() {

    var pass  = $('#pwd').val();
    var cpass = $('#pwd1').val();

    if (usernameAvailable && pass !== "" && pass === cpass) {
        $('#register').prop("disabled", false);
    }
    else {
        $('#register').prop("disabled", true);
    }
}


/* ---------------------------------------
   Document Ready
--------------------------------------- */

$(document).ready(function () {


/* ---------------------------
   Username Availability
--------------------------- */

$('#uid').on('blur', function () {

    var uid = $(this).val().trim();

    if (uid === "") {
        $('#availability').html("");
        usernameAvailable = false;
        validateForm();
        return;
    }

    $.post('check.php', { user_name: uid }, function (data) {

        if (data != '0') {

            $('#availability').html(
                '<span class="text-danger">Email already exists</span>'
            );

            usernameAvailable = false;

        }
        else {

            $('#availability').html(
                '<span class="text-success">Email available</span>'
            );

            usernameAvailable = true;
        }

        validateForm();

    });

});


/* ---------------------------
   Password Match Check
--------------------------- */

$('#pwd, #pwd1').on('keyup', function () {

    var pass  = $('#pwd').val();
    var cpass = $('#pwd1').val();

    /* If both fields empty → show nothing */

    if (pass === "" && cpass === "") {

        $('#indicator').html("");

    }

    /* If confirm password empty → show nothing */

    else if (cpass === "") {

        $('#indicator').html("");

    }

    /* Password mismatch */

    else if (pass !== cpass) {

        $('#indicator').html(
            '<span class="text-danger">Passwords do not match</span>'
        );

    }

    /* Password match */

    else {

        $('#indicator').html(
            '<span class="text-success">Passwords matched</span>'
        );

    }

    validateForm();

});


});

</script>

<script src="lib/bootstrap/js/bootstrap.min.js"></script>

</body>
</html>