<?php
session_start();
include "include/dbconnection.php";

//
if(isset($_POST['Login'])){ //
if(!empty($_POST['email'])&& !empty($_POST['pass'])){ //
	
	$email=$_POST['email'];
	#Encrypting passwords using md5(message digest)
	$pw=md5(trim($_POST['pass'])); //Trim is using for removing spaces
	
//	
$query="SELECT * FROM user WHERE Email='$email' AND Password='$pw'";

	$result=mysqli_query($con,$query) or die('could not insert data'); // mysqli = mysql improved
	$no=mysqli_num_rows($result);
	if($no==0){
		$msg="Invalid email or password";
		header("Location:index.php?id=$msg");	
	}else{
	
	while($row=mysqli_fetch_array($result)){
		//Session names......
		$_SESSION['fname']=$row['First_Name'];
		$_SESSION['lname']=$row['Last_Name'];
		$_SESSION['userid']=$row['User_ID'];
		$_SESSION['email']=$email;
		$_SESSION['pass']=$pw;
		$tid=$row['User_Type_ID'];
		
	$query1="SELECT * FROM user_type WHERE User_Type_ID='$tid'";
	$result1=mysqli_query($con,$query1) or die('could not insert data');
	$row1=mysqli_fetch_array($result1);
	$_SESSION['cat']=$cat=$row1['User_Type_Name'];
	
	if($cat=='Librarian'){
		header("Location:librarianaccount.php");	
	}
	
	else if($cat=='Admin'){
		header("Location:adminpanel.php");	
	}
	
	else if($cat=='Library Assistant'){
		header("Location:libraryassistant.php");
	}
	
	else if($cat=='Teacher'){
		header("Location:teacheraccount.php");
	}
	
	else if($cat=='Student'){
		header("Location:studentaccount.php");
	}
	
	}
	}
	
	}else{
		$msg="Empty Email or Password";
		header("Location:index.php?id=$msg");
	}
}
?>
						

