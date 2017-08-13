<?php
session_start();


	
//Date Zone
date_default_timezone_set('Asia/Jayapura');
$cdate=date("Y-m-d"); //Current date
//To create the database connectivity
include "include/dbconnection.php";


//To get the current year in 4 digits(here 'date' below is a function)
$y=date("Y");


//To assign item types into Item Type array
$itype1=array("","Book","CD/DVD","Serial");

//To get Item
$item=$_REQUEST['id1'];
$acc=$_REQUEST['acc'];
//Purchase date
$pday=$_POST['year1']."-".$_POST['month1']."-".$_POST['day1'];
//To get Published date
$sql="SELECT * FROM item as i WHERE i.Item_ID='$item'";
$result=mysqli_query($con,$sql);
$row=mysqli_fetch_array($result);
$pubd=$row['Publ_Date'];
//To get unique number for date
$purID=strtotime($pday);
$pubID=strtotime($pubd);

if($pubID<$purID){



if($_POST['donate']=='on'){
	//If the item is donated
	echo $price=$price="d d";
}else{
	

if($_POST['currency']!="" && $_POST['price']!=""){
	//If the item has a price 
$price=$_POST['currency']." ".$_POST['price'];
}else{
	//If the item price not selected or not donated (yet to decide... :))
$price="0 0"; //$_SESSION['price'] means 'currency' + 'price' 
}
}


$shelf=$_POST['shelfNo'];
$state=$_POST['state'];
$status=$_POST['status'];

//Update copy table
$sqlup="UPDATE `copy` SET State_ID='$state',Purchased_Date='$pday',Price='$price',Shelf_No='$shelf',Availability='$status' WHERE Accession_No='$acc'";
mysqli_query($con,$sqlup) or die(mysqli_error($con));

header("Location:editItemDetails.php?id=$item&acc=$acc");
?>


<?php } else {
	header("Location:editCopyAcc.php?id=$item&acc=$acc&msg=Publish date should be before purchase date");

}
	
?>