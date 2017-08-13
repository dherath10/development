<?php
session_start();
// To check the existing email address for the update
//To get user Id to check the email address of that user Id and to keep it as not existing email address
$uid=$_SESSION['uid'];
$email=$_GET['q'];
//To connect database
include "include/dbconnection.php";


 if(!preg_match("/^[_\.0-9a-zA-Z-]+@([0-9a-zA-Z][0-9a-zA-Z-]+\.)+[a-zA-Z]{2,6}$/i", $email)) {
    echo "* Email is not valid";
	?>
     <input type="hidden" name="hid3" value="1" />
    <?php
	
	} else {
//To check the email address of that user Id and to keep it as not existing email address
$sqle="SELECT email FROM user WHERE email='$email' AND User_ID NOT IN('$uid')";
//To execute the query
$resulte=mysqli_query($con,$sqle);
//No of  same email address
$no=mysqli_num_rows($resulte);
if($no==0){
	
	echo "Available Email Address";
	?>
    
     <input type="hidden" name="hid2" value="2" />
    <?php
	
}else{
	//To derect a web page
	echo "Existing Email Address";
	?>
    <input type="hidden" name="hid1" value="" />
    
<?php	
}
}
?>