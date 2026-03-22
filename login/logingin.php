
<?php

/* -------------------------------------------------------
   Encryption Key (must match register & home scripts)
------------------------------------------------------- */

define("SECRETKEY", "mysecretkey12345");


/* -------------------------------------------------------
   Database Connection
------------------------------------------------------- */

include('../config.php');

$db_n = "society_db";

$con = mysqli_connect($servername, $username, $password, $db_n);

if (!$con) {
    echo "Database connection failed";
    exit();
}


/* -------------------------------------------------------
   Process Login Request
------------------------------------------------------- */

if (isset($_POST['login'])) {

    $uid = isset($_POST['uid']) ? trim($_POST['uid']) : "";
    $pwd = isset($_POST['pwd']) ? trim($_POST['pwd']) : "";

    if ($uid === "" || $pwd === "") {
        echo "Invalid input";
        exit();
    }


    /* ---------------------------------------------------
       Fetch user password from DB
    --------------------------------------------------- */

    $sql = "SELECT pwd FROM user_details WHERE uid = ?";

    $stmt = $con->prepare($sql);

    if (!$stmt) {
        echo "Database error";
        exit();
    }

    $stmt->bind_param("s", $uid);
    $stmt->execute();

    $result = $stmt->get_result();

    if ($result->num_rows === 0) {
        echo "User not found";
        exit();
    }


    /* ---------------------------------------------------
       Verify Password
    --------------------------------------------------- */

    $row = $result->fetch_assoc();

    $encrypted_pwd = $row['pwd'];

    $plainpwd = openssl_decrypt(
        $encrypted_pwd,
        "AES-128-ECB",
        SECRETKEY
    );


    if ($plainpwd !== false && $plainpwd === $pwd) {

        /* encrypt UID for redirect */

        $uid_enc = urlencode(
            openssl_encrypt($uid, "AES-128-ECB", SECRETKEY)
        );

        echo "success|" . $uid_enc;
        exit();

    } else {

        echo "Wrong password";
        exit();
    }
}

?>
