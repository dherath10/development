<?php
$email=$_GET['q'];
//To connect database
include "include/dbconnection.php";


 if(!preg_match("/^[_\.0-9a-zA-Z-]+@([0-9a-zA-Z][0-9a-zA-Z-]+\.)+[a-zA-Z]{2,6}$/i", $email)) {
    echo "Not a valid Email Address";
	?>
     <input type="hidden" name="hid3" value="1" />
    <?php
	
	} else {
//To check the email address
$sqle="SELECT email FROM user WHERE email='$email'";
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