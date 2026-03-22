<?php
include('../../config.php');
$db_n="id11548551_society_db";
$con=mysqli_connect($servername,$username,$password,$db_n);

//add society
if(isset($_POST['soc_sub']))
{
add_society($con);
}	
//add building
if(isset($_POST['Building_sub']))
{	
add_building($con);
}
//add wing
if(isset($_POST['wing_sub']))
{	
add_wing($con);	
}

function add_society($con)
{
	$society_name=$_POST['Society_name'];
$sql="INSERT INTO society_details(society_id,society_name,total_buildings)
VALUES(society_id,'$society_name',total_buildings) ";

if(mysqli_query($con,$sql))
   {
header('location: index.php');


}
else{
    echo "</br>error while inserting table". mysqli_error($con);
}
}//function add_society($con)

function add_building($con)
{
	$Building_name=$_POST['Building_name'];
	$society_name=$_POST['society_name'];
$society_id=$_POST['society_id'];
$hasheduid = $_POST['in'];
$sql="INSERT INTO building_details(building_id,building_name,society_id,no_of_wings,total_flats,total_residents,flats_on_rent)
VALUES(building_id,'$Building_name','$society_id',no_of_wings,total_flats,total_residents,flats_on_rent) ";

if(mysqli_query($con,$sql))
   {
   	echo $society_name;
   	//echo $society_id;
    // header('location: society.php?$society_id=$society_id');
        header('location: society.php?society_name='.$society_name.'&&in='.$hasheduid.'');
}
else{
    echo "</br>error while inserting table". mysqli_error($con);
}
}//function add_building($con)

function add_wing($con)
{
	$wing_name=$_POST['Wing_name'];
	
	$_SESSION["building_id"]=$_POST['building_id'];
	$building_id=$_SESSION["building_id"];
echo $building_id;
	$_SESSION["society_name"]=$_POST['society_name'];
	$society_name=$_SESSION["society_name"];
echo $society_name;
	if(isset($_POST['Wing_name']))
	{
//echo "0";
		$sql1="select * from wing_details where building_id=$building_id";
		$result=$con->query($sql1);
		
		
		if($result->num_rows > 0)
    	{
		
				
			//echo "1->done".$building_id;

				if ($_POST['Wing_name']!="nowing") 
				{
					//echo "not nowing";   
					while ($row = mysqli_fetch_array($result))
					{			
						if($row['wing_name']=='nowing')
						{
							//echo $row['wing_name'];
							//echo "</br>row".$row['wing_name']."";
							$sql="delete from wing_details where building_id=$building_id ";
							if(mysqli_query($con,$sql))
							{
						    	//echo "</br>Row deleted successfully.". mysqli_error($con);		    	
									
						    }
							else
							{
						    	//echo "</br>error while Deleeting Row". mysqli_error($con);
							}

						}
					}	
					if($row['wing_name']!='nowing')
					{
						//echo $row['wing_name'];
						$sql="INSERT INTO wing_details(wing_id,wing_name,building_id,total_floors,total_flats,total_residents,flats_on_rent)		VALUES(wing_id,'$wing_name','$building_id',total_floors,total_flats,total_residents,flats_on_rent) ";
									if(mysqli_query($con,$sql))
									{
										//echo $Building_name;
										header('location: bldg.php?bldg_id='.$building_id.'&&s_id='.$society_name.'');										
											}
									else
									{
									    echo "</br>error while inserting table". mysqli_error($con);
									}
					}
						
				}
				if ($_POST['Wing_name']=="nowing") 			
				{

					while ($row = mysqli_fetch_array($result))
					{			
							//echo $row['wing_name'];
						if($row['wing_name']=='nowing' || $row['wing_name']!='nowing')
						{
							//echo $row['wing_name'];
					
							//echo "</br>row".$row['wing_name']."";
							$sql="delete from wing_details where building_id=$building_id ";
							if(mysqli_query($con,$sql))
							{
						    	//echo "</br>Row deleted successfully.". mysqli_error($con);	    	
									goto lable1;
						    }
							else
							{
						    	echo "</br>error while Deleeting Row". mysqli_error($con);
							}

						}
					}
					lable1:
					{	
										//echo "</br>row1".$row['wing_name']."".$wing_name;

						$sql="INSERT INTO wing_details(wing_id,wing_name,building_id,total_floors,total_flats,total_residents,flats_on_rent)		VALUES(wing_id,'$wing_name','$building_id',total_floors,total_flats,total_residents,flats_on_rent) ";
									if(mysqli_query($con,$sql))
								if(mysqli_query($con,$sql))
								{
									//echo "</br>row#".$row['wing_name']."";
										header('location: bldg.php?bldg_id='.$building_id.'&&s_id='.$society_name.'');								
									}
								else
								{
								    echo "</br>error while inserting table". mysqli_error($con);
								}
					}						
				}
		
				// }
				// }
				//else 	//echo "here";

		}

		if($result->num_rows == 0)
    	{
						$sql="INSERT INTO wing_details(wing_id,wing_name,building_id,total_floors,total_flats,total_residents,flats_on_rent)		VALUES(wing_id,'$wing_name','$building_id',total_floors,total_flats,total_residents,flats_on_rent) ";
								
								if(mysqli_query($con,$sql))
								{
									//echo "</br>row".$row['wing_name']."";
									//echo "string";
										header('location: bldg.php?bldg_id='.$building_id.'&&s_id='.$society_name.'');								

								}
								
								else
								{
								    echo "</br>error while inserting table". mysqli_error($con);
								}    		
		}
			
	}	

}//	function add_wing($con)

mysqli_close($con); 

?>
 

