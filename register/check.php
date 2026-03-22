<?php  
//check.php  
$servername="localhost";
$username="root";
$password="";
$con=mysqli_connect($servername,$username,$password);		
$db_n="society_db";
        $con->select_db($db_n);

if(isset($_POST["user_name"]))
{
 $username = mysqli_real_escape_string($con, $_POST["user_name"]);
 $query = "SELECT * FROM user_details WHERE uid = '".$username."'";
 $result = mysqli_query($con, $query);
 echo mysqli_num_rows($result);
}
?>
