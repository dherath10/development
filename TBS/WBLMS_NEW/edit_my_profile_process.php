<?php
session_start();

include "include/dbconnection.php";

//To update user profile
$sql="UPDATE user SET First_Name='$_POST[fname]', Last_Name='$_POST[lname]', Address='$_POST[address]', Phone_No='$_POST[phone_no]', Gender='$_POST[radio]', Date_of_Birth='$_POST[dob]' WHERE User_ID='$_SESSION[userid]'";
if(mysqli_query($con,$sql)){
	
	//To check whether profile details are successfully edited 
	$msg="Profile Successfully Updated!";
	header("Location:myProfile.php?id=$msg");	
}else{
	$msg="Profile Update Not Successfull";
	header("Location:edit_my_profile.php?id=$msg");	
	
}


?>