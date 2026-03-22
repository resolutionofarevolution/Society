```php
<?php

/* -----------------------------------------
   Start Session
----------------------------------------- */

session_start();

/* -----------------------------------------
   Protocol detection
----------------------------------------- */

$protocol = (!empty($_SERVER['HTTPS']) && $_SERVER['HTTPS'] !== 'off')
            ? 'https'
            : 'http';

$server = $protocol . "://" . $_SERVER['SERVER_NAME'] . "/";


/* -----------------------------------------
   Encryption key (MUST match login script)
----------------------------------------- */

define("SECRETKEY", "mysecretkey12345");


/* -----------------------------------------
   Database Connection
----------------------------------------- */

include('../config.php');

$db_n = "society_db";
$con->select_db($db_n);


/* -----------------------------------------
   Get Form Data
----------------------------------------- */

$profile = $_POST['profile'] ?? '';
$f_name  = $_POST['f_name'] ?? '';
$m_name  = $_POST['m_name'] ?? '';
$l_name  = $_POST['l_name'] ?? '';
$uid     = $_POST['uid'] ?? '';
$password= $_POST['pwd'] ?? '';


/* -----------------------------------------
   Basic Validation
----------------------------------------- */

if($uid == '' || $password == '')
{
    die("Invalid input.");
}


/* -----------------------------------------
   Encrypt Password
----------------------------------------- */

$hash = openssl_encrypt($password, "AES-128-ECB", SECRETKEY);


/* -----------------------------------------
   Insert Query
----------------------------------------- */

$sql = "
INSERT INTO user_details
(
    f_name,
    m_name,
    l_name,
    uid,
    pwd,
    prof_type
)
VALUES
(
    '$f_name',
    '$m_name',
    '$l_name',
    '$uid',
    '$hash',
    '$profile'
)
";


/* -----------------------------------------
   Execute Query
----------------------------------------- */

if(mysqli_query($con, $sql))
{

    $uidhashed = openssl_encrypt($uid, "AES-128-ECB", SECRETKEY);

    header("Location: ".$server."Society/login/index.php?uid=".$uidhashed);
    exit();

}
else
{
    echo "Database Error: " . mysqli_error($con);
}

?>
```
