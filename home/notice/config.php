<?php 
$protocol = strtolower(substr($_SERVER["SERVER_PROTOCOL"],0,5))=='http'?'https':'http';
$severn=$_SERVER['SERVER_NAME'];
$server=$protocol."://".$severn."/";

?>
<?php  
$servername="localhost";
$username="root";
$password="";
$con=mysqli_connect($servername,$username,$password);		


?>