<?php
session_start();
date_default_timezone_set('Asia/Jayapura');

//To create the database connectivity
include "include/dbconnection.php";
//Check Library Card Number
$libCardNo=$_REQUEST['id'];

//Get the library session Id to complete the item borrowing by a user
$libSesID=$libCardNo.time();
//Assigning libCardNo and libSesID into sessions
$_SESSION['libCardNo1']=$libCardNo;
$_SESSION['libSesID']=$libSesID;
header("Location:issueItemsSave.php");



/*
$sqlc="SELECT * FROM copy as c,item as i WHERE c.Accession_No='$accession_no' AND c.Availability='Available' AND c.State_ID=1 AND c.Item_ID=i.Item_ID AND i.Item_Type_ID IN (1,2)";
$resultc=mysqli_query($con,$sqlc);
$no=mysqli_num_rows($resultc);
*/
?>