<?php
session_start();

//To restrict other users from accessing Admin Panel. Only Admin can access this page
if($_SESSION['userid']!="" && $_SESSION['pass']!="" && $_SESSION['cat']=="Admin"){
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Admin Panel</title>

<style type="text/css">
.body_p {	color: #FF8000;
}
.body_p {	color: #FF8000;
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
	font-style: normal;
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

<link href="mystyle.css" rel="stylesheet" type="text/css" />
<link href="mystyle1.css" rel="stylesheet" type="text/css" />
<link href="mystyleNew.css" rel="stylesheet" type="text/css"/>
</head>

<body>
<table width="1183" border="0" align="center">
  <tr>
    <td height="187" colspan="2"><a href="index.php"><img src="Images/website banner.jpg" width="1183" height="185" /></a></td>
  </tr>
  <tr align="center" bgcolor="#B6AD89" class="in">
    <td width="854" height="30" align="left" valign="top"><blockquote>
      
    </blockquote></td>
    <td width="329" height="20" align="center" valign="middle"><span class="in1">Welcome <a href="myProfile.php" class="body_p"><?php echo $_SESSION['fname']."-".$_SESSION['cat']; ?></a> | <a href="signout.php">Logout </a>  </span></td>
  </tr>
  <tr bgcolor="#EAE5CE">
    <td colspan="2" align="center"><p>&nbsp;</p>
      <p>&nbsp;</p>
      <table width="218" border="0">
        <tr>
          <td align="center"><a href="user management.php"><img src="Images/Users-Image.png" width="128" height="128" /></a></td>
        </tr>
        <tr>
          <td align="center"><a href="user management.php"><img src="Images/User management2.png" width="131" height="49" /></a></td>
        </tr>
        <tr>
          <td height="25">&nbsp;</td>
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
<?php } else {
	header("Location:index.php?id=Please Enter Email and Password");
	}
?>