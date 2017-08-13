<?php
ob_start();
session_start();
$cdate=date("Y-m-d");//Current date
$fid=$_SESSION['fid'];
$bid=$_REQUEST['bid'];//Borrow ID
$itid=$_REQUEST['itid'];//Item Type ID
//To create the database connectivity
include "include/dbconnection.php";
//To get borrow details
$sqlr="SELECT * FROM borrow as b,user as u WHERE b.User_ID=u.User_ID AND b.Borrow_ID='$bid'";
$resultr=mysqli_query($con,$sqlr);	
$rowr=mysqli_fetch_array($resultr);
echo $rd=$rowr['Return_Date']; //Return Date
echo $uid=$rowr['User_Type_ID']; //User Type
echo $userid=$rowr['User_ID']; //User ID
//To update the avaliability
$acc=$rowr['Accession_No'];
$sqlup="UPDATE copy SET Availability='Available' WHERE Accession_No='$acc'";
mysqli_query($con,$sqlup);


//To upload borrow status
$sqlup1="UPDATE borrow SET Rstatus='Yes', Actual_Return_Date='$cdate' WHERE Borrow_ID='$bid'";
mysqli_query($con,$sqlup1);

//ACtual Return Date with Time ID
 $acrd=strtotime($cdate);

//Return date Time id
 $ret=strtotime($rd);
//To get no of date(Delay +, inadvance -)
$d=($acrd-$ret)/86400;
//echo $d;
if($d<=0 || $uid==4){
	
	$fine=0;
	$s="No Fine";
}else{
//To calculate the fine
$sqlfine="SELECT * FROM policy WHERE Item_Type_ID='$itid' AND User_Type_ID=5";
$resultf=mysqli_query($con,$sqlfine);	
$rowf=mysqli_fetch_array($resultf);
$nof=mysqli_num_rows($resultf);
//To check according to User Type....
if($nof==0){
	$fine=0;
	$s="No Fine";
}else{
//To check the fine
$day=14;
//Less then 14 days
if(($d-$day)<=0){
	$fine=$d*$rowf['Fine_Per_Day'];
	$s="No";
//More than 14 days
}else{
	$fine=$day*$rowf['Fine_Per_Day'];
	$ad=$d-$day;
	$fine=$fine+$ad*$rowf['Fine_Per_Day_After_Duration'];
	$s="No";
}



}
}

//Insert into fine table
$sqlinsert="INSERT INTO fine VALUES('$fid','$bid','$userid','$fine','$cdate','$s')";
if(mysqli_query($con,$sqlinsert)){
	

}else{
	echo mysqli_error($con);
}


header("Location:payingfine.php");
