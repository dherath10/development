<?php
#original issue page

session_start();
date_default_timezone_set('Asia/Jayapura');
$cdate=date("Y-m-d");//Current date
$c=strtotime($cdate);
//To create the database connectivity
include "include/dbconnection.php";
//Chech the book
$user_id=$_POST['user_id'];
$accession_no=$_POST['accession_no'];
$issue_date=$_POST['issue_date'];
$return_date=$_POST['return_date'];
$iss=strtotime($issue_date);
$ret=strtotime($return_date);
$d=($ret-$iss)/86400;
//To check issue date and 14 days
if($iss>=$ret || $d!=14 || $iss>$c){
	echo $msg="Please select correct date"; //Issuing date can not be greater than return date OR both days differ should be 14 days OR issuing date cant greater than current date
header("Location:issue_return_items.php?id=$msg");
}else{
$sqlc="SELECT * FROM copy as c,item as i WHERE c.Accession_No='$accession_no' AND c.Availability='Available' AND c.State_ID=1 AND c.Item_ID=i.Item_ID AND i.Item_Type_ID IN (1,2)";
$resultc=mysqli_query($con,$sqlc);
$no=mysqli_num_rows($resultc);
if($no==0){
		$msg="Please Check the Book";
		header("Location:issue_return_items.php?id=$msg");
}else{
	//To check no of books
	$sqluser="SELECT * FROM borrow WHERE User_ID='$user_id' AND Rstatus='No'";
	$resultuser=mysqli_query($con,$sqluser);
	$nouser=mysqli_num_rows($resultuser);
	if($nouser<4){
	//To insert books
	$sqlin="INSERT INTO borrow VALUES('','$accession_no','$user_id','$issue_date','$return_date','','','No')";
	mysqli_query($con,$sqlin) or die(mysqli_error());
	$msg="An Item has been issued";
	$sqlup="UPDATE copy SET Availability='Not Available' WHERE Accession_No='$accession_no'";
	mysqli_query($con,$sqlup);
	header("Location:issue_return_items.php?id=$msg");
	}else{
		$msg="User has already borrowed four Books";
		header("Location:issue_return_items.php?id=$msg");
	}
}
}


?>