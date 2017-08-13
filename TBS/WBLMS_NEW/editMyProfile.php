<?php
session_start();

include "include/dbconnection.php"

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
<table width="1183" border="0" align="center">
  <tr>
    <td height="187" colspan="2"><a href="index.php"><img src="Images/website banner.jpg" width="1183" height="185" /></a></td>
  </tr>
  <tr align="center" bgcolor="#B6AD89" class="in">
    <td width="544" height="25" align="left" valign="top"><blockquote>
      <h3 class="links_color"><em><strong><a href="index.php" class="links_color">Home</a></strong></em> <span class="seperator">|</span> <em><strong><a href="aboutus.php" class="links_color">About Us</a></strong></em> <span class="seperator">| </span><a href="contact.php" class="links_color"><em>Contact</em></a></h3>
    </blockquote></td>
    <td width="382" align="right" valign="middle"><span class="in1">Welcome...<?php echo $_SESSION['fname']."-".$_SESSION['cat']; ?> | <a href="signout.php">Logout </a></span></td>
  </tr>
  <tr bgcolor="#EAE5CE">
    <td colspan="2" align="center"><p>&nbsp;</p>
      <table width="458" border="0">
        <tr class="body_p">
          <th height="36" colspan="2" align="center" scope="col"><blockquote>
            <h3>My Profile</h3>
          </blockquote></th>
        </tr>
        <tr>
          <td class="body_p">&nbsp;</td>
          <td>&nbsp;</td>
        </tr>
        <tr>
          <td width="227" class="body_p">User ID</td>
          <td width="221"><label for="user id"></label>
          <input type="text" name="user id" id="user id" /><?php echo $_SESSION['userid']; ?></td>
        </tr>
        <tr>
          <td class="body_p">User Type ID</td>
          <td><label for="user type id"></label>
            <input type="text" name="user type id" id="user type id" /></td>
        </tr>
        <tr>
          <td class="body_p">First Name</td>
          <td><label for="fname"></label>
            <input type="text" name="fname" id="fname" /></td>
        </tr>
        <tr>
          <td class="body_p">Last Name</td>
          <td><label for="lname"></label>
            <input type="text" name="lname" id="lname" /></td>
        </tr>
        <tr>
          <td class="body_p">Address</td>
          <td><label for="address"></label>
            <input type="text" name="address" id="address" /></td>
        </tr>
        <tr>
          <td class="body_p">Phone No</td>
          <td><label for="phone no"></label>
            <input type="text" name="phone no" id="phone no" /></td>
        </tr>
        <tr class="body_p">
          <td class="body_p">Gender</td>
          <td><label for="gender"></label>
            Male
            <input type="radio" name="radio" id="male" value="Male " />
          <label for="male"> 
            Female
            <input type="radio" name="radio" id="Female" value="Female" />
          </label></td>
        </tr>
        <tr>
          <td class="body_p">Date of Birth</td>
          <td><label for="dob"></label>
          <input type="text" name="dob" id="date-pick1" />            <label for="dateAdded"></label></td>
        </tr>
        <tr>
          <td class="body_p">Registered Date</td>
          <td><label for="reg_date"></label>
          <input type="text" name="reg_date" id="date-pick2" />            <label for="category"></label></td>
</tr>
        <tr>
          <td class="body_p">E-mail</td>
          <td><label for="email"></label>
            <input type="text" name="email" id="email" /></td>
        </tr>
        <tr>
          <td class="body_p">Password</td>
          <td><label for=" "></label>
            <input type="text" name=" " id=" " /></td>
        </tr>
        <tr>
          <td class="body_p">&nbsp;</td>
          <td>&nbsp;</td>
        </tr>
        <tr>
          <td class="body_p">&nbsp;</td>
          <td>&nbsp;</td>
        </tr>
        <tr>
          <td class="body_p">&nbsp;</td>
          <td><input type="submit" name="edit_profile" id="edit_profile" value="Edit Profile" /></td>
        </tr>
        <tr>
          <td class="body_p">&nbsp;</td>
          <td>&nbsp;</td>
        </tr>
      </table>
      <p>&nbsp;</p>
<p>&nbsp;</p></td>
  </tr>
  <tr bgcolor="#FF6600" id="footer">
    <td height="50" colspan="2" align="center" bgcolor="#CC6600">Copyright &copy; 2013 Negombo South International School. All Rights Reserved</td>
  </tr>
</table>
</body>
</html>