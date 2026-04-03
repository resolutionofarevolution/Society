
<?php

/* Detect protocol */

$protocol = (!empty($_SERVER['HTTPS']) && $_SERVER['HTTPS'] !== 'off')
            ? 'https'
            : 'http';

$server = $protocol . "://" . $_SERVER['SERVER_NAME'] . "/";

/* Encryption key */

define("SECRETKEY", "mysecretkey12345");

/* Decrypt UID if passed */

$plainuid = "";

if (isset($_GET['uid']) && !empty($_GET['uid'])) {
    $plainuid = openssl_decrypt($_GET['uid'], "AES-128-ECB", SECRETKEY);
}

?>

<!DOCTYPE html>
<html lang="en">

<head>

<meta charset="utf-8">
<title>Society Login</title>
<meta name="viewport" content="width=device-width, initial-scale=1">

<link href="lib/bootstrap/css/bootstrap.min.css" rel="stylesheet">
<link href="lib/font-awesome/css/font-awesome.min.css" rel="stylesheet">

<style>

body{
height:100vh;
background:linear-gradient(135deg,#667eea,#764ba2);
display:flex;
align-items:center;
justify-content:center;
font-family:'Roboto',sans-serif;
}

.login-card{
background:#fff;
padding:40px;
border-radius:10px;
box-shadow:0 15px 40px rgba(0,0,0,0.25);
}

.login-title{
text-align:center;
margin-bottom:25px;
}

#loginError{
color:red;
margin-top:10px;
}

</style>

</head>

<body>
<div style="position:absolute; top:20px; left:20px;">
    <a href="/Society/index.php" style="
        color:white;
        text-decoration:none;
        font-weight:500;
        font-size:16px;">
        ← Back to Home
    </a>
</div>
<div class="container">
<div class="row">
<div class="col-md-4 col-md-offset-4">

<div class="login-card">

<h2 class="login-title">Society Login</h2>

<form id="loginForm" method="post">

<div class="form-group">
<input type="text"
class="form-control input-lg"
name="uid"
placeholder="Email"
value="<?php echo htmlspecialchars($plainuid); ?>"
required>
</div>

<div class="form-group">
<input type="password"
class="form-control input-lg"
name="pwd"
placeholder="Password"
required>
</div>

<div id="loginError"></div>

<button type="submit" class="btn btn-primary btn-lg btn-block">
Login
</button>

</form>

<p style="margin-top:15px;">
Not signed up?
<a href="<?php echo $server; ?>Society/register/">Register</a>
</p>

</div>

</div>
</div>
</div>

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>

$(function(){

    $("#loginForm").on("submit", function(e){

        e.preventDefault(); // stop normal form submit

        var uid = $("input[name='uid']").val().trim();
        var pwd = $("input[name='pwd']").val().trim();

        if(uid === "" || pwd === ""){
            $("#loginError").text("Please enter email and password");
            return;
        }

        $.post("logingin.php", {
            login: 1,
            uid: uid,
            pwd: pwd
        }, function(response){

            response = response.trim();

            if(response.indexOf("success|") === 0){

                var parts = response.split("|");
                var encryptedUid = parts[1];

                window.location.href = "../home/index.php?in=" + encryptedUid;

            } else {

                $("#loginError").text(response);

            }

        }).fail(function(){
            $("#loginError").text("Server error. Try again.");
        });

    });

});
</script>



</body>
</html>
