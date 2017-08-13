<?php
//Start the session
session_start();

include("include/dbconnection.php");

// Delete Author of book
$iid=$_REQUEST['id'];
$aid=$_REQUEST['id1'];
//To delete a Author from the Book table in db
$sqlDel="DELETE FROM serial WHERE Author_ID='$aid' AND Item_ID='$iid'";
mysqli_query($con,$sqlDel);
//To redirect to .php page
header("Location:editAddItem.php?id=$iid");


?>