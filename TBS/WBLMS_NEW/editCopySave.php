<?php
session_start();
$_SESSION['item']=$item=$_REQUEST['id1'];
$purd=$_POST['year1']."-".$_POST['month1']."-".$_POST['day1'];
$pubd=$_REQUEST['pubd'];

$purda=strtotime($purd);
$pubda=strtotime($pubd);
if($purda>$pubda){

	
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
$_SESSION['item']=$item=$_REQUEST['id1'];
$_SESSION['pday']=$pday=$_POST['year1']."-".$_POST['month1']."-".$_POST['day1'];
//$_SESSION['price']=$price=$_POST['currency']." ".$_POST['price'];
$_SESSION['shelf']=$shelf=$_POST['shelfNo'];


if($_POST['donate']=='on'){
	//If the item is donated
	echo $_SESSION['price']=$price="d d";
}else{
	

if($_POST['currency']!="" && $_POST['price']!=""){
	//If the item has a price 
echo $_SESSION['price']=$price=$_POST['currency']." ".$_POST['price'];
}else{
	//If the item price not selected or not donated (yet to decide... :))
echo $_SESSION['price']=$price="0 0"; //$_SESSION['price'] means 'currency' + 'price' 
}
}

//To update copies

foreach ($_SESSION['arracc'] as $e){
	$sqlup="UPDATE `copy` SET  Purchased_Date='$pday',Date_Added='$cdate' Price='$price',Shelf_No='$shelf' WHERE Accession_No='$e'";
	mysqli_query($con,$sqlup);

}
/*
//To count of Accession no...
$accno=array();
if(($_POST['lending'])!=0){
	$_SESSION['lending']=$copyL=$_POST['lending'];
	for($i=1;$i<=$copyL;$i++){
	
//To insert an item copy into the copy table (Lending)
$sqlcopy="INSERT INTO `copy` VALUES('NULL','$item',1,'$pday','$cdate','$price','$_POST[shelfNo]','Available')";
	mysqli_query($con,$sqlcopy) or die(mysqli_error($con));
	$acc=mysqli_insert_id($con);
	array_push($accno,$acc);
	}
}else{
$_SESSION['lending']=0;
}
	
	
//To identify the number of copies (reference) and using a loop to insert into the copy table
if(($_POST['reference'])!=0){
	$_SESSION['reference']=$copyR=$_POST['reference'];
	for($i=1;$i<=$copyR;$i++){
	
	//To insert an item copy into the copy table
$sqlcopy="INSERT INTO `copy` VALUES('NULL','$item',2,'$pday','$cdate','$price','$_POST[shelfNo]','Available')";
	mysqli_query($con,$sqlcopy) or die(mysqli_error($con));
	$acc=mysqli_insert_id($con);
	array_push($accno,$acc);
	}
	}else{
		$_SESSION['reference']=0;
	}

//$_SESSION['arracc']=$accno;
*/
header("Location:addCopyView.php?id=$item");
}else{
	//To get copy information from addCopyProcess if pubdate>purdate and send back to addCopyProcess
	$_SESSION['currency']=$_POST['currency'];
	$_SESSION['price']=$_POST['price'];
	$_SESSION['reference']=$_POST['reference'];
	$_SESSION['shelf']=$_POST['shelfNo'];
	$_SESSION['lending']=$_POST['lending'];
	$msg="Please select Purchased Date after Published Date";
header("Location:addCopyProcess.php?id=$item & msg=$msg");
}
?>
