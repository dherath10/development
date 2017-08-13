<?php
session_start();

//To restrict other users from accessing this page without logging in
if($_SESSION['userid']!="" && $_SESSION['pass']!="" && ($_SESSION['cat']=="Admin" || $_SESSION['cat']=="Librarian" )){
	
//Date Zone
date_default_timezone_set('Asia/Jayapura');
$cdate=date("Y-m-d");//Current date

//To get user information and Assign into sessions (To stop deleting the field data when you get 'Existing email' error message) 
$_SESSION['fname1']=$fname=$_POST['fname'];
$_SESSION['lname1']=$lname=$_POST['lname'];
$_SESSION['address1']=$address=$_POST['address'];
$_SESSION['phoneNo1']=$phoneNo=$_POST['phoneNo'];
$_SESSION['gender1']=$gender=$_POST['gender'];
$_SESSION['day1']=$day=$_POST['day'];
$_SESSION['month1']=$month=$_POST['month'];
$_SESSION['year1']=$year=$_POST['year'];
$dob=$year."-".$month."-".$day;
$_SESSION['email1']=$email=$_POST['email'];
$_SESSION['type1']=$type=$_POST['type'];
$_SESSION['password1']=$_POST['password'];
//encrypting using md5(message digest)
$password=md5($_POST['password']);
//If user type is Student then take the Class
if($type==5){

$_SESSION['class1']=$class=$_POST['class'];	
}

//To connect database
include "include/dbconnection.php";

//To check the email address
$sqle="SELECT email FROM user WHERE email='$email'";
//To execute the query
$resulte=mysqli_query($con,$sqle);
//No of same email address
$no=mysqli_num_rows($resulte);
if($no==0){
$status="Active";
//To insert new user details
$sqlin="INSERT INTO user VALUES('','$type','$fname','$lname','$address','$phoneNo','$gender','$dob','$cdate','$email','$password','$status')";

//To Execute the query & check whether record has been added or not
if(mysqli_query($con,$sqlin)){
	$msg="A user has been added successfully!";
	//To get the user ID
	$_SESSION['uid']=$uid=mysqli_insert_id($con);
	//Check the teacher 
	if($type==4){
	$b='T'; 
	//To get the four digits number with leading zeros(Formatting)
	$tlib=sprintf("%04d",$uid);
	// To concatenate the number and leading T
	$tlibCard=$b.$tlib;	
	
	//To add teacher data into teacher table in db
	$sqlinT="INSERT INTO teacher VALUES('$uid','$tlibCard')";
	mysqli_query($con,$sqlinT);
	}
	
	//Check the student
	if($type==5){
	//To create the library card number
	$b='S';
	$tlib=sprintf("%04d",$uid); // To format(%) with leading zeros(0) including four(4) decimal(d) places
	$tlibCard=$b.$tlib;	
	
	//To add student data into student table in db
	$sqlinS="INSERT INTO student VALUES('$uid','$class','$tlibCard')";
	mysqli_query($con,$sqlinS); 
	}
	
}else{
	$msg="A user has not been added"; // Error message to assign if $sqlin(Query) data not inserted correctly 	
}

//Mysql query for Selcting Type Name
$sqltype="SELECT * FROM user_type WHERE User_Type_ID='$type'";
//To execute query
$result=mysqli_query($con,$sqltype);
//To assign for array
$row=mysqli_fetch_array($result);
//To get relevent field
$_SESSION['typename']=$typename=$row['User_Type_Name'];


?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Registered User Information</title>
<link href="mystyle.css" rel="stylesheet" type="text/css" />
<link href="mystyleNew.css" rel="stylesheet" type="text/css" />
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

</head>

<body>
<table width="1183" border="0" align="center">
  <tr>
    <td height="187" colspan="2"><a href="index.php"><img src="Images/website banner.jpg" width="1183" height="185" /></a></td>
  </tr>
  <tr align="center" bgcolor="#B6AD89" class="in">
    <td width="878" align="left" valign="middle"><blockquote>
     <h4 class="links_color"><em><?php if($_SESSION['cat']=="Admin"){?><a href="adminpanel.php" class="links_color">Home</a><?php } if($_SESSION['cat']=="Librarian"){?><a href="librarianaccount.php" class="links_color">Home</a></em> | <em><a href="user management.php" class="links_color">User Management</a></em> | <em><a href="library item management.php" class="links_color">Library Item Management</a></em> | <em><a href="issue_return_items.php" class="links_color">Issue/Return Items</a></em> | <em><a href="reports.php" class="links_color">Reports</a></em> | <em><a href="online_catalog_search.php" class="links_color">Online Catalog</a></em><?php  } ?></h4>
    </blockquote></td>
    <td width="305" align="right" valign="middle"><span class="in1">Welcome...<?php echo $_SESSION['fname']."-".$_SESSION['cat']; ?> | <a href="signout.php"> Logout</a></span></td>
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
          <td height="35" colspan="4" class="body_p">User ID</td>
          <td height="35" colspan="4" class="body_p"><?php echo $uid; ?>&nbsp;</td>
        </tr>
        <tr>
          <td width="400" height="35" colspan="4" class="body_p">Full Name</td>
          <td width="400" height="35" colspan="4" class="body_p"><?php echo $fname." ".$lname; ?></td>
        </tr>
        <tr>
          <td height="35" colspan="4" class="body_p">Address</td>
          <td height="35" colspan="4" valign="middle" class="body_p"><?php echo $address; ?></td>
          </tr>
        <tr>
          <td height="35" colspan="4" class="body_p">Phone No</td>
          <td height="35" colspan="4" class="body_p"><?php echo $phoneNo; ?></td>
        </tr>
        <tr>
          <td height="35" colspan="4" class="body_p">Gender</td>
          <td height="35" colspan="4" class="body_p"><?php echo $gender; ?></td>
        </tr>
        <tr>
          <td height="35" colspan="4" class="body_p">Date of Birth</td>
          <td height="35" colspan="4" class="body_p"><?php echo $dob; ?></td>
        </tr>
        <tr>
          <td height="35" colspan="4" class="body_p">Email</td>
          <td height="35" colspan="4" class="body_p"><?php echo $email; ?></td>
        </tr>
       
        <tr>
          <td height="35" colspan="4" class="body_p">Type</td>
          <td height="35" colspan="4" class="body_p"><?php echo $typename; ?></td>
        </tr>
      <?php if($type==5 || $type==4){ ?>
        <tr>
          <td height="35" colspan="4" class="body_p">Library Card No</td>
          <td height="35" colspan="4" class="body_p"><?php echo $tlibCard; ?></td>
        </tr>
		<?php } ?>
		<?php if($type==5){ ?>
        <tr>
          <td height="35" colspan="4" class="body_p">Class</td>
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
          <td colspan="8" align="center" class="body_p"><a href="edituserreg.php?id1=<?php echo $uid; ?>"><input type="submit" name="edit" id="edit" value=" Edit " /></a></td>
        </tr>
        <tr>
          <td colspan="8" align="center" class="body_p">&nbsp;</td>
          </tr>
      </table>      
     
<p><a href="userregistration.php"><img src="images/user_add.png" alt="" name="adduser" width="22" height="22" id="adduser" /> Add User</a>&nbsp;</p>
      
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
}else{
	//To direct a web page
	$msg="Existing Email Address";
	
// ? used for passing a variable using a Request(To seperate URL and the name(ms) that appear in the next page)
	header("Location:userregistration.php?ms=$msg&id1=1");// To display the $msg and to keep the field data without deleting(id1), when Existing email error message is diplayed 	
	
}
 } else {
	header("Location:index.php?id=Please Enter Email and Password");//Message to display when a user tries to enter a page without loggin in	
}
?>