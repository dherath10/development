<?php
$callno=$_GET['q1'];
//To connect database
include "include/dbconnection.php";

// if(!preg_match("/^[0-9a-zA-Z]{1,3}+.([0-9]{1,3})+.([0-9a-zA-Z]{2,3})/", $callno)) {
   // echo "Call No is not valid";
	?>
     <input type="hidden" name="hid3" value="1" />
    <?php
	
	//} else {

//To check the Call No
$sqlcall="SELECT * FROM item WHERE Call_No='$callno'";
//To execute the query
$resultcall=mysqli_query($con,$sqlcall);
//No of  same email address
$no=mysqli_num_rows($resultcall);
if($no==0){
	
	echo "Available Call No";
	?>
    
     <input type="hidden" name="hid2" value="2" />
    <?php
	
}else{
	//To derect a web page
	echo "Existing Call No";
	?>
    <input type="hidden" name="hid1" value="" />
    
<?php	
}
//}
?>