<?php 
//Start the session
session_start();

include("include/dbconnection.php");

// 'id' coming from the deleteuser.php
$uid=$_REQUEST['id'];

//'id1' coming from the deleteuser.php to identify the active or deactive status
$status=$_REQUEST['id1'];

//To select the user type
$sqltype="SELECT * FROM user WHERE User_ID='$uid'";
$result=mysqli_query($con,$sqltype); //Execute the query
$row=mysqli_fetch_array($result); // To assign all user details(with user type id) into an array

$utype=$row['User_Type_ID']; //To assign the user type id to the variable

//To delete a user from the user table in db
$sqlDel="UPDATE user SET Status='$status' WHERE User_ID='$uid'";
mysqli_query($con,$sqlDel);

/*if($utype==5){
//To delete a student from the student table
$sqlDelS="DELETE FROM student WHERE User_ID='$uid'";
mysqli_query($con,$sqlDelS);
}
if($utype==4){
//To delete a teacher from the teacher table
$sqlDelT="DELETE FROM teacher WHERE User_ID='$uid'";
mysqli_query($con,$sqlDelT);
}
*/

//To redirect to deleteuser.php page with change user ID
header("Location:deleteuser.php?changeuid=$uid");
?>