<?php
session_start();
//To add the database connectivity
include "include/dbconnection.php";
$cdate=date("Y-m-d");//Current date

//To identify Item Type
$typeid=$_REQUEST['id1'];
echo $publDate=$_POST['year1']."-".$_POST['month1']."-".$_POST['day1'];
echo $purchasedDate=$_POST['year2']."-".$_POST['month2']."-".$_POST["day2"];
$pub=$_POST['publisher'];
$cat=$_POST['cat'];

//Check the donate or buy
if($_POST['donate']=='on'){
	//If the item is donated
	$price="d d";
}else{
	

if($_POST['currency']!="" && $_POST['price']!=""){
	//If the item has a price 
	$price=$_POST['currency']." ".$_POST['price'];
}else{
	//If the item price not selected or not donated (yet to decide... :))
	$price="0 0"; //$_SESSION['price'] means 'currency' + 'price' 
}
}


//To check whether Publisher is existing or not
				$sqlpub="SELECT * FROM publisher WHERE Publisher_Name='$pub'";
				$resultpub=mysqli_query($con,$sqlpub);
				$no1=mysqli_num_rows($resultpub);
				if($no1==1){
					//If it is an existing Publisher to get author ID
					$row=(mysqli_fetch_array($resultpub));
					$pubid=$row['Publisher_ID'];
				}else{
					//If it is NOT an existing Publisher, to insert Publisher and get Publisher ID
					$sqlpubin="INSERT INTO publisher VALUES('','$pub')";	
					mysqli_query($con,$sqlpubin);
					$pubid=mysqli_insert_id($con);
					
				}


//To insert Items into the Item table with default image name(book.jpg)
$sql="INSERT INTO `item` VALUES('NULL','$pubid','$_POST[callNo]','$typeid','$_SESSION[title]','$cat','$publDate','$_POST[publPlace]','$_POST[edition]','$_POST[remarks]','book.jpg')";
//Execute $sql query
mysqli_query($con,$sql) or die(mysqli_error($con));
//To get the last ID
$iid=mysqli_insert_id($con);

//To check whether image has been selected or not
if(($_FILES['photo']['name'])!=""){
	//To get image extention
		function getExtension ($str){ // Function with passing a parameter as an Image Name($str)
		  $i = strrpos($str,"."); // To identify the position of the last dot
		  if (!$i) {return "";} // Check whether there is an extension or not
		  $l = strlen($str) - $i; // Identify the length of the extension
		  $ext = substr ($str, $i+1,$l); // Divide the string into sub strings. Increase the dot position length of the string($i) by 1 and take the extension length($l) starting from the dot position+1 and counting extension length as 3 and subdivide that to get extension only. 
		  return $ext; // Return the extension to the function(getExtension) that is calling

			}
	// To get the extension of the uploaded file and create an ID using last inserted record and to create a unique image name and upload to the item table 	
	$imgname = $_FILES["photo"]['name']; // Image Name
   	$extension = getExtension($imgname); // To call the getExtension function with parameter($imgname)
   	$extension = strtolower ($extension); //To convert the extension into the lower case
   			
	//Create the New Image Name	with $iid and $extension
	$fn=$iid.".".$extension;
	$path = 'upload/'.$fn; //generate the destination path(folder name & image name)
	//To move the file from temprary memory location($_FILES["photo"]['tmp_name']) to the new path ($path)
   	move_uploaded_file($_FILES["photo"]['tmp_name'],$path);
	}else{
		//If image is not selected display the default image
		$fn="book.jpg";
	}
	$up="UPDATE item SET Item_image='$fn' WHERE Item_ID='$iid'"; // update the item table with the new image name
	mysqli_query($con,$up);
	
	//To identify the number of copies (Lending) and using a loop to insert into the copy table
	if(($_POST['lending'])!=0){
	$copyL=$_POST['lending'];
	for($i=1;$i<=$copyL;$i++){
	
	//To insert an item copy into the copy table (Lending)
	$sqlcopy="INSERT INTO `copy` VALUES('NULL','$iid',1,'$purchasedDate','$cdate','$price','$_POST[shelfNo]','Available')";
	mysqli_query($con,$sqlcopy) or die(mysqli_error($con));
	}
	}
	
	
		//To identify the number of copies (reference) and using a loop to insert into the copy table
	if(($_POST['reference'])!=0){
	$copyR=$_POST['reference'];
	for($i=1;$i<=$copyR;$i++){
	
	//To insert an item copy into the copy table
	$sqlcopy="INSERT INTO `copy` VALUES('NULL','$iid',2,'$purchasedDate','$cdate','$price','$_POST[shelfNo]','Available')";
	mysqli_query($con,$sqlcopy) or die(mysqli_error($con));
	}
	}
	
	
	//Send the data related to each item type to the particular tables(1=book, 2=CD, 3=Serial)
	if($typeid==1){
		
		if($_POST['author']!=""){
			$text_line = $_POST['author'];

			$text_line = explode(",",$text_line);
			for ($start=0; $start < count($text_line); $start++) {
			$e=$text_line[$start];
			//To check whether author is existing or not
				$sqlau="SELECT * FROM author WHERE Author_Name='$e'";
				$resultau=mysqli_query($con,$sqlau);
				$no=mysqli_num_rows($resultau);
				if($no==1){
					//If it is an existing author to get author ID
					$rowau=mysqli_fetch_array($resultau);
					$auid=$rowau['Author_ID'];
	$sqlbk1="INSERT INTO books VALUES('$iid','$_POST[isbn]','$auid','$_POST[pages]')";	
			$resultbk1=mysqli_query($con,$sqlbk1);
				}else{
					//If it is NOT an existing author to insert author and get author ID
					$sqlauin="INSERT INTO author VALUES('','$e')";	
					mysqli_query($con,$sqlauin);
				$auid=mysqli_insert_id($con);
	$sqlbk1="INSERT INTO books VALUES('$iid','$_POST[isbn]','$auid','$_POST[pages]')";	
			$resultbk1=mysqli_query($con,$sqlbk1);
					
				}
				
				
			}
			
		}
		
	}	
	if($typeid==2){
		$sqlcd="INSERT INTO `cd/dvd` VALUES('$iid','$_POST[size]')";
		$resultcd=mysqli_query($con,$sqlcd);
		
	}
	if($typeid==3){
			$volume=$_POST['volume'];
			$issue=$_POST['issue'];
			if($_POST['authors']!=""){
			for($j=0;$j<count($_POST['authors']);$j++){
			$e=$_POST['authors'][$j];
			//To check whether author is existing or not
				$sqlau="SELECT * FROM author WHERE Author_Name='$e'";
				$resultau=mysqli_query($con,$sqlau);
				$no=mysqli_num_rows($resultau);
				if($no==1){
					//If it is an existing author to get author ID
					$rowau=mysqli_fetch_array($resultau);
					$auid=$rowau['Author_ID'];
	$sqlbk1="INSERT INTO serial VALUES('$iid','$auid','$_POST[issn]','$volume','$issue','$_POST[pages1]')";	
			$resultbk1=mysqli_query($con,$sqlbk1) or die(mysqli_error($con));
				}else{
					//If it is NOT an existing author to insert author and get author ID
					$sqlauin="INSERT INTO author VALUES('','$e')";	
					mysqli_query($con,$sqlauin);
				$auid=mysqli_insert_id($con);
	$sqlbk1="INSERT INTO serial VALUES('$iid','$auid','$_POST[issn]','$volume','$issue','$_POST[pages1]')";
			$resultbk1=mysqli_query($con,$sqlbk1) or die(mysqli_error($con));
					
				}
				
				
			}
			
		}
	}
	
	header("Location:viewadditems.php?id=$iid");

?>
