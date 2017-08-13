<?php 
//database Connectivity
include "include/dbconnection.php";
//To get the item id
$iid=$_REQUEST['id'];

//To get title for a particular item id
$sqlT="SELECT * FROM item WHERE Item_ID=$iid";
$resultT=mysqli_query($con,$sqlT);
$rowT=mysqli_fetch_array($resultT);
$title=$rowT['Title'];

//To delete an Item from the item table 
$sqldel="DELETE FROM item WHERE Item_ID='$iid'";
mysqli_query($con,$sqldel);

//To delete copy details
$sqldelC="DELETE FROM `copy` WHERE item_ID='$iid'";
mysqli_query($con,$sqldelC);

$msg="Item ID: ".$iid. " ".$title. " Item details successfully deleted!";
header("Location:delItemSearch.php?msg=$msg");