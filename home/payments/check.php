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
 $amt = mysqli_real_escape_string($con, $_POST["amtt"]);
 $query = "SELECT * FROM user_details WHERE uid = '".$username."'";
 $result = mysqli_query($con, $query);
  $row = mysqli_fetch_array($result);
 $f_name = $row['f_name'];
 $l_name = $row['l_name'];
  $prof = $row['prof_type'];
 $rowcout=mysqli_num_rows($result);
 if($rowcout != '0'){
?>

              <div class='form-group'>
                <div class="row">
                <div class="col-sm-6">
                <label class='control-label'>First Name</label>
                <input autocomplete='off' class='form-control card-cvc' value='<?php  echo $f_name; ?>' size='4' type='text' disabled>
                </div>
                <div class="col-sm-6">
                <label class='control-label'>Last Name</label>
                <input class='form-control card-expiry-month' placeholder='<?php  echo $l_name; ?>' size='2' type='text' disabled>
                </div>
                </div>
              </div>

              <div class='form-row'>
              <div class='form-group'>
                         <label class='control-label'></label>
                      
               <button class='form-control btn btn-primary' type='submit'> Collect Rs.<?php echo $amt;?>→   </button>
          
               
             
              </div>
            </div>    

<?php
}	
}
?>
