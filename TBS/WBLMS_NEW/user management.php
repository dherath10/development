<?php
session_start();

//To restrict other users from accessing this page.Only admin & librarian can access
if($_SESSION['userid']!="" && $_SESSION['pass']!="" && ($_SESSION['cat']=="Admin" || $_SESSION['cat']=="Librarian")){
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>User Management</title>
<link href="mystyle.css" rel="stylesheet" type="text/css"/>
<link href="mystyleNew.css" rel="stylesheet" type="text/css" />
<style type="text/css">
.body_p {	font-weight: bold;
}
.in {	font-family: Georgia, Times New Roman, Times, serif;
}
.in {	color: #FF8000;
}
.in {	color: #FF8000;
}
.in {	font-size: medium;
}
.in {	list-style-type: circle;
}
.in {	color: #000;
}
.in {	color: #F36007;
}

body {
	background-image: url(Images/Wall%20Texture%20Bkgd--Yellow-edtd.jpg);
}
.links_color {
	color: #CC6600;
	font-weight: normal;
}
#apDiv1 {
	position:absolute;
	width:130px;
	height:195px;
	z-index:1;
	left: 122px;
	top: 280px;
}
#apDiv2 {
	position:absolute;
	width:185px;
	height:188px;
	z-index:2;
	left: 394px;
	top: 295px;
}
#apDiv3 {
	position:absolute;
	width:175px;
	height:182px;
	z-index:3;
	left: 717px;
	top: 296px;
}
#apDiv4 {
	position:absolute;
	width:175px;
	height:198px;
	z-index:4;
	left: 41px;
	top: 507px;
}
</style>
<style type="text/css">
.body_p1 {color: #FF8000;
}
.body_p1 {color: #FF8000;
}
.body_p1 {font-weight: bold;
}
</style>
</head>

<body>
<table width="1183" border="0" align="center">
  <tr>
    <td height="187" colspan="2"><a href="index.php"><img src="Images/website banner.jpg" width="1183" height="185" /></a></td>
  </tr>
  <tr align="center" bgcolor="#B6AD89" class="in">
    <td width="854" height="30" align="left" valign="top"><blockquote>
	<h4 class="links_color"><em><?php if($_SESSION['cat']=="Admin"){?><a href="adminpanel.php" class="links_color">Home</a><?php } if($_SESSION['cat']=="Librarian"){?><a href="librarianaccount.php" class="links_color">Home</a></em> | <em><a href="user management.php" class="links_color">User Management</a></em> | <em><a href="library item management.php" class="links_color">Library Item Management</a></em> | <em><a href="issue_return_items.php" class="links_color">Issue/Return Items</a></em> | <em><a href="reports.php" class="links_color">Reports</a></em> | <em><a href="online_catalog_search.php" class="links_color">Online Catalog</a></em><?php  } ?></h4>      
    </blockquote></td>
    <td width="329" height="20" align="right" valign="middle"><span class="links_color">Welcome <?php echo $_SESSION['fname']."-".$_SESSION['cat']; ?> | <a href="signout.php">Logout</a></span>&nbsp;&nbsp;</td>
  </tr>
  <tr bgcolor="#EAE5CE">
    <td colspan="2" align="center"><p>&nbsp;</p>
      <table width="831" border="0" align="center">
        <tr align="center">
          <td height="51" colspan="4" align="center" valign="top"><h3 class="body_p">User Management&nbsp;</h3></td>
        </tr>
        <tr align="center">
          <td width="200" height="184" align="left"><p align="center"><a href="userregistration.php"><img src="images/user_add (2).png" alt="" name="adduser" width="128" height="128" id="adduser" /> </a></p>
          <p align="center"><a href="userregistration.php" class="bodyLinks">Add User</a></p></td>
          <td width="200" height="184" align="left"><p align="center"><a href="edituser.php"><img src="images/user_edit (2).png" alt="" name="edituser" width="128" height="128" id="adduser2" /></a></p>
          <p align="center"><a href="edituser.php" class="bodyLinks"> Edit User</a></p></td>
          <td width="200" align="left"><p align="center"><a href="deleteuser.php"><img src="images/user_delete (2).png" alt="" name="adduser" width="128" height="128" id="adduser3" /></a></p>
          <p align="center"><a href="deleteuser.php" class="bodyLinks"> Deactivate/Activate User</a></p></td>
          <td width="200" align="left"><p align="center"><a href="viewuser.php"><img src="images/user_search (1).png" alt="" name="searchuser" width="128" height="128" id="searchuser" /></a></p>
          <p align="center"><a href="viewuser.php" class="bodyLinks"> View User</a></p></td>
        </tr>
      </table>
    <p><a href="search.php"></a></p>
    <p>&nbsp;</p></td>
  </tr>
  <tr bgcolor="#FF6600" id="footer">
    <td height="50" colspan="2" align="center" bgcolor="#CC6600">Copyright &copy; 2013 Negombo South International School. All Rights Reserved</td>
  </tr>
</table>
</body>
</html>
<?php } 
	// Message to display when access to this page is restricted to users other than Admin & Librarian
	else {
	header("Location:index.php?id=Please Enter Email and Password");
	} ?>