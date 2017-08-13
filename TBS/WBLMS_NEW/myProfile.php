<?php
session_start();

include "include/dbconnection.php";

//To get all details related to a particular User ID
$sql="SELECT * FROM user as u, user_type as ut WHERE u.User_ID='$_SESSION[userid]' AND u.User_Type_ID=ut.User_Type_ID";
$result=mysqli_query($con,$sql);
$row=mysqli_fetch_array($result);

?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>MyProfile</title>

<link rel="stylesheet" type="text/css" href="datePicker.css" />
<script src="jquery-1.6.1.min.js" type="text/javascript"></script>
<script src="datePicker-min.js" type="text/javascript"></script>
<script type="text/javascript">
  $(window).ready(function(){
  
  $('#date-pick1').datePicker({clickInput:true});
});
</script>
<script type="text/javascript">
  $(window).ready(function(){
  
  $('#date-pick2').datePicker({clickInput:true});
});
</script>

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
	font-family: Georgia, "Times New Roman", Times, serif;
	font-weight: normal;
}
.links_color {color: #CC6600;
}
</style>
<link href="mystyle.css" rel="stylesheet" type="text/css" />
<link href="mystyle1.css" rel="stylesheet" type="text/css" />
<link href="mystyleNew.css" rel="stylesheet" type="text/css" />
</head>

<body>
<form method="post" name="profile" action="edit_my_profile.php">
<table width="1183" border="0" align="center">
  <tr>
    <td height="187" colspan="2"><a href="index.php"><img src="Images/website banner.jpg" width="1183" height="185" /></a></td>
  </tr>
  <tr align="center" bgcolor="#B6AD89" class="in">
    <td width="544" height="25" align="left" valign="top"><blockquote>
      <h3 class="links_color"><em>
	  <?php include("include/navigate.php"); ?></em></h3>
    </blockquote></td>
    <td width="382" align="right" valign="middle"><span class="in1">Welcome <?php echo $_SESSION['fname']."-".$_SESSION['cat']; ?> | <a href="signout.php">Logout </a></span></td>
  </tr>
  <tr bgcolor="#EAE5CE">
    <td colspan="2" align="center"><br />
      <table width="458" border="0">
        <tr class="body_p">
          <th height="36" colspan="2" align="center" scope="col"><blockquote>
            <h3>My Profile</h3>
          </blockquote></th>
        </tr>
        <tr>
          <td colspan="2" class="body_p">&nbsp;</td>
        </tr>
        <tr>
          <td colspan="2" align="center" class="alert"><?php
		  if(isset($_REQUEST['id'])){
			  
			echo $_REQUEST['id'];
		  
		  }
          ?>&nbsp;</td>
        </tr>
        <tr>
          <td colspan="2" class="body_p">&nbsp;</td>
          </tr>
        <tr>
          <td width="238" height="35" class="body_p"><strong>User ID</strong></td>
          <td width="210" height="35" class="body_p"><?php echo $_SESSION['userid']; ?></td>
        </tr>
        <tr>
          <td height="35" class="body_p"><strong>User Type ID</strong></td>
          <td height="35" class="body_p"><?php echo $row['User_Type_Name']; ?></td>
        </tr>
        <tr>
          <td height="35" class="body_p"><strong>First Name</strong></td>
          <td height="35" class="body_p"><?php echo $row['First_Name']; ?></td>
        </tr>
        <tr>
          <td height="35" class="body_p"><strong>Last Name</strong></td>
          <td height="35" class="body_p"><?php echo $row['Last_Name']; ?></td>
        </tr>
        <tr>
          <td height="35" class="body_p"><strong>Address</strong></td>
          <td height="35" class="body_p"><?php echo $row['Address']; ?></td>
        </tr>
        <tr>
          <td height="35" class="body_p"><strong>Phone No</strong></td>
          <td height="35" class="body_p"><?php echo $row['Phone_No']; ?></td>
        </tr>
        <tr class="body_p">
          <td height="35" class="body_p"><strong>Gender</strong></td>
          <td height="35" class="body_p"><?php echo $row['Gender']; ?></td>
        </tr>
        <tr>
          <td height="35" class="body_p"><strong>Date of Birth</strong></td>
          <td height="35" class="body_p"><?php echo $row['Date_of_Birth']; ?></td>
        </tr>
        <tr>
          <td height="35" class="body_p"><strong>Registered Date</strong></td>
          <td height="35" class="body_p"><?php echo $row['Reg_Date']; ?></td>
</tr>
        <tr>
          <td height="35" class="body_p"><strong>E-mail</strong></td>
          <td height="35" class="body_p"><?php echo $row['Email']; ?></td>
        </tr>
        <tr>
          <td height="35" class="body_p">&nbsp;</td>
          <td height="35">&nbsp;</td>
        </tr>
        <tr>
          <td colspan="2" align="center" class="body_p"><input name="edit_profile" type="submit" class="co" id="edit_profile" value="Edit Profile" /></td>
        </tr>
        <tr>
          <td class="body_p">&nbsp;</td>
          <td>&nbsp;</td>
        </tr>
      </table>
    <p>&nbsp;</p></td>
  </tr>
  <tr bgcolor="#FF6600" id="footer">
    <td height="50" colspan="2" align="center" bgcolor="#CC6600">Copyright &copy; 2013 Negombo South International School. All Rights Reserved</td>
  </tr>
</table>
</form>
</body>
</html>