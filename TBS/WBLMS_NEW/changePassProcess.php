<?php
session_start();
	//To connect database
	include "include/dbconnection.php";
	
	//To get User ID
	$uid=$_SESSION['userid']."|";
	
	//To get current password from the user, trim and encrypt.. to match with the password in DB 
	$cpass=md5(trim($_POST['cpass']));
	
	//To get the current password from the database
	$sqlps="SELECT * FROM user WHERE User_ID='$uid'";
	$resultps=mysqli_query($con,$sqlps);
	$rowps=mysqli_fetch_array($resultps);
	// Assign the current password from the database into a variable
	$curpass=$rowps['Password'];
	//To get new password and encrypt... 
	$npass=md5($_POST['npass']);
	
	//To check if the current passwords are same
	if($curpass==$cpass){
		
		//To update the database...
		$up="UPDATE user SET Password='$npass' WHERE User_ID='$uid'";
		if(mysqli_query($con,$up)){
			$msg="Password has been updated successfully!";
			header("Location:changePass.php?id=$msg");	
		}else{
			$msg="Password has not been updated";
			header("Location:changePass.php?id=$msg");
		}
	}else{
		//To display the message current password is not matching
		$msg= "Current Password is not matching";
		header("Location:changePass.php?id=$msg");
		
	}	

?>