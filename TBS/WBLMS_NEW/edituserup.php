<?php
session_start();
//To get the user Id to check the user details
$uid=$_REQUEST['uid'];
//To restrict other users from accessing this page without logging in
if($_SESSION['userid']!="" && $_SESSION['pass']!="" && ($_SESSION['cat']=="Admin" || $_SESSION['cat']=="Librarian" )){

//To connect database
include "include/dbconnection.php";	
//Date Zone
date_default_timezone_set('Asia/Jayapura');
$cdate=date("Y-m-d");//Current date

//To assign user details
$fname=$_POST['fname'];
$lname=$_POST['lname'];
$address=$_POST['address'];
$phoneNo=$_POST['phoneNo'];
$gender=$_POST['gender'];
$day=$_POST['day'];
$month=$_POST['month'];
$year=$_POST['year'];
$dob=$year."-".$month."-".$day;

$type=$_POST['type'];
$_POST['password'];
//encrypting using md5(message digest)
$password=md5($_POST['password']);

	
//To update user details
$sqlup="UPDATE user SET User_Type_ID='$type',First_Name='$fname',Last_Name='$lname',Address='$address',Phone_No='$phoneNo',Gender='$gender',Date_of_Birth='$dob',Reg_Date='$cdate',Password='$password' 
WHERE User_ID='$uid'";

//To Execute the query to update the records
if(mysqli_query($con,$sqlup)){
	$msg="User details updated successfully";

//To get the email address from the table
$sqlemail="SELECT Email FROM user WHERE User_ID=$uid";
$resultemail=mysqli_query($con,$sqlemail);
$rowemail=mysqli_fetch_array($resultemail);
$email=$rowemail['Email'];

//Check the teacher 
	if($type==4){
	$b='T'; 
	//To get the four digits number with leading zeros(Formatting)
	$tlib=sprintf("%04d",$uid);
	// To concatenate the number and leading T
	$tlibCard=$b.$tlib;	
	
	
	//Check whether teacher ID is existing or not
	$sqlt="SELECT * FROM teacher WHERE User_ID='$uid'";
	$resultt=mysqli_query($con,$sqlt); //To Execute the query
	$no1=mysqli_num_rows($resultt);
	//If Teacher ID is not existing in the Teacher table 
	if($no1==0){
		//To add teacher data into teacher table in db
		$sqlinT="INSERT INTO teacher VALUES('$uid','$tlibCard')";
		mysqli_query($con,$sqlinT);
	
	}else{
	//To modify teacher data in teacher table in db
	$sqlupT="UPDATE teacher SET Lib_Card_No='$tlibCard' WHERE User_ID='$uid'";
	mysqli_query($con,$sqlupT);
	}
	
	}
	
	
	//Check the student
	if($type==5){
	//To get the Class
	$class=$_POST['class'];
	//To create the library card number
	$b='S';
	$tlib=sprintf("%04d",$uid); // To format(%) with leading zeros(0) including four(4) decimal(d) places
	$tlibCard=$b.$tlib; //Creating the Library Card Number concatenating $b & $tlib(Eg:- S0043)
	
	
	//Check whether student id is existing or not
	$sqls="SELECT * FROM student WHERE User_ID='$uid'";
	$resultt=mysqli_query($con,$sqls); //To execute the query
	$no1=mysqli_num_rows($resultt);
	
	//If Student ID is not existing in the student table
	if($no1==0){
	//To add student data into student table in database
	$sqlinS="INSERT INTO student VALUES ('$uid','$class','$tlibCard')";
	mysqli_query($con,$sqlinS);
	}
	else
	{
	//To add student data into student table in db
	$sqlupS="UPDATE student SET class='$class',Lib_Card_No='$tlibCard' WHERE User_ID='$uid'";
	mysqli_query($con,$sqlupS); 
	}
	}
	
	if($type==1 || $type==2 || $type==3){
		//TO WRITE A QUERY TO Check whether UID is existing in Teacher table
		$sqlT1="SELECT * FROM teacher WHERE User_ID='$uid'";
		$resultT1=mysqli_query($con,$sqlT1); //To Execute the query
		$noT1=mysqli_num_rows($resultT1);
		//If same User ID is existing in the Teacher table 
	if($noT1!=0){
		//To delete records which consist in teachear table regarding to UID
		$sqldltT="DELETE FROM teacher WHERE User_ID='$uid'";
		mysqli_query($con,$sqldltT); //execute $sqldlt query
	}
	
	//To write a query to check whether UserID is existing in the Student table
		$sqlS1="SELECT * FROM student WHERE User_ID='$uid'";
		$resultS1=mysqli_query($con,$sqlS1); //To Execute the query
		$noS1=mysqli_num_rows($resultS1);
	//If same User ID is existing in the Student table	
	if($noS1!=0){
		//To delete records which consists in student table regarding to user ID
		$sqldltS="DELETE FROM student WHERE User_ID='$uid'";
		mysqli_query($con,$sqldltS);
	}
	
	}

	
}else{
	$msg="User details not successfully updated"; // Error message to assign if $sqlup(Query) data not updated correctly 	
}

//Mysql query for Selcting Type Name
$sqltype="SELECT * FROM user_type WHERE User_Type_ID='$type'";
//To execute query
$result=mysqli_query($con,$sqltype);
//To assign for array
$row=mysqli_fetch_array($result);
//To get relevent field
$typename=$row['User_Type_Name'];

?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Edit User Information</title>
<style type="text/css">
.in {font-family: Georgia, Times New Roman, Times, serif;
}
.in {color: #FF8000;
}
.in {color: #FF8000;
}
.in {font-size: medium;
}
.in {list-style-type: circle;
}
.in {color: #000;
}
.in {color: #F36007;
}
.in1 {
	font-size: medium;
	list-style-type: circle;
	color: #CC6600;
	text-align: right;
}
.links_color {	color: #CC6600;
	font-size: 17px;
}
</style>

<style type="text/css">
body {
	background-image: url(Images/Wall%20Texture%20Bkgd--Yellow-edtd.jpg);
}
</style>
<link href="mystyleNew.css" rel="stylesheet" type="text/css" />


</head>

<body>
<table width="1183" border="0" align="center">
  <tr>
    <td height="187" colspan="2"><a href="index.php"><img src="Images/website banner.jpg" width="1183" height="185" /></a></td>
  </tr>
  <tr align="center" bgcolor="#B6AD89" class="in">
    <td width="918" align="left" valign="top"><blockquote>
     <h3 class="links_color"><em><strong><?php if($_SESSION['cat']=="Admin"){?><a href="adminpanel.php" class="links_color">Home</a><?php } if($_SESSION['cat']=="Librarian"){?><a href="librarianaccount.php" class="links_color">Home</a><?php  } ?><?php //} ?></strong></em> | <em><strong><a href="usermanagement.php" class="links_color">User Management</a></strong></em> | <em><strong><a href="libraryitemmanagement.php" class="links_color">Library Item Management</a></strong></em> | <a href="issue_return_items.php"><em>Issue/Return Items</em></a><a href="search.php" class="links_color"><em> | </em></a><a href="reports.php"><em>Reports</em></a><a href="search.php" class="links_color"><em> | </em></a><a href="search.php"><em>Search</em></a></h3>
    </blockquote></td>
    <td width="265" align="right" valign="top"><span class="in1">Welcome...<?php echo $_SESSION['fname']."-".$_SESSION['cat']; ?> | <a href="signout.php"> Logout</a></span></td>
  </tr>
  <tr bgcolor="#EAE5CE">
    <td colspan="2" align="center"><blockquote>
      <p>&nbsp;</p>

      <table width="450" border="0" align="center">
        <tr>
          <td colspan="8" align="center" class="body_p"><h3 class="body_p">User Registration</h3>
 
          </td>
          </tr>        
        <tr>
          <td height="35" colspan="8" align="center" class="alert"><?PHP echo $msg; ?> &nbsp;</td>
          </tr>
        <tr>
          <td height="35" colspan="4" class="body_p"><strong>User ID</strong></td>
          <td height="35" colspan="4" class="body_p"><?php echo $uid; ?>&nbsp;</td>
        </tr>
        <tr>
          <td width="400" height="35" colspan="4" class="body_p"><strong>Full Name</strong></td>
          <td width="400" height="35" colspan="4" class="body_p"><?php echo $fname." ".$lname; ?></td>
        </tr>
        <tr>
          <td height="35" colspan="4" class="body_p"><strong>Address</strong></td>
          <td height="35" colspan="4" valign="middle" class="body_p"><?php echo $address; ?></td>
          </tr>
        <tr>
          <td height="35" colspan="4" class="body_p"><strong>Phone No</strong></td>
          <td height="35" colspan="4" class="body_p"><?php echo $phoneNo; ?></td>
        </tr>
        <tr>
          <td height="35" colspan="4" class="body_p"><strong>Gender</strong></td>
          <td height="35" colspan="4" class="body_p"><?php echo $gender; ?></td>
        </tr>
        <tr>
          <td height="35" colspan="4" class="body_p"><strong>Date of Birth</strong></td>
          <td height="35" colspan="4" class="body_p"><?php echo $dob; ?></td>
        </tr>
        <tr>
          <td height="35" colspan="4" class="body_p"><strong>Email</strong></td>
          <td height="35" colspan="4" class="body_p"><?php echo $email; ?></td>
        </tr>
       
        <tr>
          <td height="35" colspan="4" class="body_p"><strong>Type</strong></td>
          <td height="35" colspan="4" class="body_p"><?php echo $typename; ?></td>
        </tr>
      <?php if($type==5 || $type==4){ ?>
        <tr>
          <td height="35" colspan="4" class="body_p"><strong>Library Card No</strong></td>
          <td height="35" colspan="4" class="body_p"><?php echo $tlibCard; ?></td>
        </tr>
		<?php } ?>
		<?php if($type==5){ ?>
        <tr>
          <td height="35" colspan="4" class="body_p"><strong>Class</strong></td>
          <td height="35" colspan="4" class="body_p"><?php echo $class; ?></td>
        </tr>
        <?php } ?>
        <tr>
          <td class="body_p">&nbsp;</td>
          <td width="400" class="body_p">&nbsp;</td>
          <td width="400" class="body_p">&nbsp;</td>
          <td width="400" class="body_p">&nbsp;</td>
          <td>&nbsp;</td>
          <td width="400">&nbsp;</td>
          <td width="400">&nbsp;</td>
          <td width="400">&nbsp;</td>
        </tr>
        <tr>
          <td colspan="8" align="center" class="body_p"><a href="editusercon.php?id=<?php echo $uid; ?>"><input type="submit" name="edit" id="edit" value=" Edit " /></a></td>
        </tr>
        <tr>
          <td colspan="8" align="center" class="body_p">&nbsp;</td>
          </tr>
      </table>      
     
<p><a href="edituser.php"><img src="images/user_edit.png" alt="" name="adduser" width="16" height="16" id="adduser" /> Edit User</a>&nbsp;</p>
      
      <p>&nbsp;</p>
</blockquote></td>
  </tr>
  <tr bgcolor="#FF6600">
    <td height="50" colspan="2" align="center" bgcolor="#CC6600" id="footer">Copyright &copy; 2013 Negombo South International School. All Rights Reserved</td>
  </tr>
</table>

</body>
</html>
<?php

 } else {
	header("Location:index.php?id=Please Enter Email and Password");//Message to display when a user tries to enter a page without loggin in	
}
?>