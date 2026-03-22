<?php

/*
1)This whole file is made up by tirthesh dighe in aug 2019 to dicrease the efforts and time and also no. of lines of code

2)Copy this Comment section and change it as ur need like $servername, $username, $password,db_name, table_name, names of columns, discriptions of column like int,varchar etc. 

3)include this file first:- include("dbtest.php"); 

copy from next line-->

$servername="localhost";
$username="root";
$password="";
$con=mysqli_connect($servername,$username,$password);
if(!$con){ }//if !con
else 
{
	$db_n="db_name";
	//isdbarrExists($con,array("college"));
        IfNotcreatedb($con,$db_n);
        $con->select_db($db_n);
        $coln=array("col1","col2","col3","col_n");
        $coldisc=array("discription_col1 auto_increment,primary key($coln[0])","discription_col2 not null","discription_col3 not null","discription_col_n not null");
		IfNotcreatetbl($con,"table_name",$coln,$coldisc);            
}//else if con
*/
function isdbExists($con,$db_n)
{
	$db_n=$db_n;
	if($con->select_db($db_n)===true)
	{
    echo "</br>Coneected to Database : ". $db_n;
	return true;	
	}
	if($con->select_db($db_n)===false)
	{
	echo "</br>Database ". $db_n . " is not exists";	
	return false;
	}
				
}//isdbExists($con,$db_n)
?>

<?php

function isdbArrExists($con,$db_n)
{
$db_n=$db_n;
$db_n1= implode("",$db_n);
$sql="select * from " . $db_n1;
		for($i=0;$i<count($db_n);$i++)
		{
			if(isdbExists($con,$db_n[$i])){}
			else{}
		}
}//function isdbArrExists($con,$db_n)

function Createdb($con,$db_n)
{
		$db_n=$db_n;
		$sql1="create Database $db_n";
		//echo "</br>".$sql1."</br>";
		if(mysqli_query($con,$sql1))
		{
			echo "</br>Database ". $db_n . " created";
			
		}//db created
		else
		{
			echo "</br>Database ". $db_n ." Already Exists"; 
			//mysqli_error($con);
		}//db not created
}//Createdb($con,$db_n)

function IfNotcreatedb($con,$db_n)
{
		$db_n=$db_n;
		if(isdbExists($con,$db_n)){}
		else{Createdb($con,$db_n);}
}//IfNotcreatetbl($con,$tbl)

function isTblExists($con,$tbl)
{
	$tbl1=$tbl;
	$sql="select * from ".$tbl1;
	if(mysqli_query($con,$sql))
	{
		echo "</br>Table ". $tbl1 . " exists";
		return true;
	}//table exists
	else
	{
		echo "</br>Table ". $tbl1 . " is not exists";
		return false;
	}//table not exists
}//function isTblExists($con,$tbl)

function isTblArrExists($con,$tbl)
{
$tbln=$tbl;
$tbln1= implode("",$tbln);
$sql="select * from " . $tbln1;
		for($i=0;$i<count($tbln);$i++)
		{
			if(isTblExists($con,$tbln[$i])){}
			else{}
		}//for($i=0;$i<count($tbln);$i++)
}//isTblArrExists($con,$tbl)

function bracket_content($coln,$coldisc)
{
	$coln=$coln;
	$coldisc=$coldisc;
    $queryarr=array("");
    for($i=0;$i<count($coln)-1;$i++)
		{
				array_push($queryarr,"$coln[$i] $coldisc[$i],");
		}
		$i=count($coln)-1;   
		array_push($queryarr,"$coln[$i] $coldisc[$i]");
    	$queryarr2=implode($queryarr);
	return $queryarr2;
}//bracket_content()

function CreateTbl($con,$tbl,$coln,$coldisc)
{
		$tbl1=$tbl;
		$coln=$coln;
		$coldisc=$coldisc;
		$sql1="create table $tbl1(".bracket_content($coln,$coldisc).")";
		//echo "</br>".$sql1."</br>";
		if(mysqli_query($con,$sql1))
		{
			echo "</br>Table ". $tbl1 . " created";
			if ($tbl1 == "master_details") 
			{
				define ("SECRETKEY", "mysecretkey1234");
				
				$m_id = "MASTER";
				$m_pass = openssl_encrypt("MASTER1231", "AES-128-ECB", SECRETKEY);
				$sql="INSERT INTO $tbl1(m_id,m_pass,under) VALUES('".$m_id."','".$m_pass."','main')";
				if(mysqli_query($con,$sql))
				{
				 echo  "Successfuly created MASTER user as username $m_id";
				}
				else
				{
				    echo "</br>error while creating MASTER". mysqli_error($con);
				}

			}
		}//table created
		else
		{
			echo "</br>Error crating Table ". $tbl1 ."". mysqli_error($con);
		}//table not created
}//CreateTbl($con,$tbl)

function IfNotcreatetbl($con,$tbl,$coln,$coldisc)
{
        $tablen=$tbl;
        $coln=$coln;
		$coldisc=$coldisc;
		if(!isTblExists($con,$tablen)){ CreateTbl($con,$tablen,$coln,$coldisc); }
}//IfNotcreatetbl($con,$tbl)


?>