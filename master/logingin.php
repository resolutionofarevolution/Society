<?php 
$protocol = strtolower(substr($_SERVER["SERVER_PROTOCOL"],0,5))=='http'?'https':'http';
$severn=$_SERVER['SERVER_NAME'];
$server=$protocol."://".$severn."/";

?>
<?php 
define ("SECRETKEY", "mysecretkey1234");
include('config.php');
$db_n="master_db";
$con=mysqli_connect($servername,$username,$password,$db_n);

if (isset($_POST['login'])) {
echo $_POST['m_id'];

$m_id = $_POST['m_id'];
$pass = $_POST['m_pass'];
$sql="SELECT * FROM master_details where m_id='$m_id'";
$result=$con->query($sql);
$row = mysqli_fetch_array($result);
$pwd = $row['m_pass'];
echo $pwd;

}
$plainpwd = openssl_decrypt($pwd, "AES-128-ECB", SECRETKEY);
echo $plainpwd;
$uid = openssl_encrypt($m_id, "AES-128-ECB", SECRETKEY);
if($plainpwd == $pass)
{
	echo "loged in successfully...";

header('location: '.$server.'Society/master/home/index.php?in='.$uid);			
}
else
{
	echo "login Failed!";
echo $plainpwd."-".$pass;
header('location: '.$server.'Society/master/index.php?in='.$uid.'');	
}

?>
