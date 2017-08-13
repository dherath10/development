<?php
ob_start();
session_start();
$cdate=date("Y-m-d");//Current date
$fid=$_SESSION['fid'];
//To create the database connectivity
include "include/dbconnection.php";
//Update fine
$sqlup="UPDATE fine SET Fstatus='Yes' WHERE Fine_ID='$fid'";
mysqli_query($con,$sqlup);
header("Location:issueitemsT.php"); //To redirect to the issueitemsT.php


?>
