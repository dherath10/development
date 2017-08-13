<?php
session_start();
//To restrict other users from accessing this page
if($_SESSION['userid']!="" && $_SESSION['pass']!="" && ($_SESSION['cat']=="Librarian" || $_SESSION['cat']=="Library Assistant")) {
	
include ('include/dbconnection.php');
$libSesID=$_SESSION['libSesID']; //To get the libSesID
echo $accNo=$_REQUEST['id']; //To get the accNo from issuItemsSave.php
	echo $_REQUEST['id1'];
//To delete a record according to the libSesId and AccNo
$sqlDel="DELETE FROM current_borrow WHERE lib_Ses_ID='$libSesID' AND Accession_No='$accNo'";
mysqli_query($con,$sqlDel);

//After deleting the record it's redirecting to issuItemsIssue.php if it came from issueItemsIssue.php page
if(isset($_REQUEST['id1'])){
header("Location:issueItemsIssue.php");
}

//After deleting the record it's redirecting to issuItemsSave.php
//header("Location:issueItemsSave.php?did=Del");

}else{
//header("Location:index.php");	
	
}
?>