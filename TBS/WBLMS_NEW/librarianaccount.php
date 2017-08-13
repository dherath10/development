<?php
session_start();

//To restrict other users from accessing this page without logging in
if($_SESSION['userid']!="" && $_SESSION['pass'] !="" && $_SESSION['cat']=="Librarian") {
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Librarian's Account</title>
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
.in1 {	font-size: medium;
	list-style-type: circle;
	color: #CC6600;
	text-align: right;
}
.links_color {color: #CC6600;
}
body {
	background-image: url(images/Wall%20Texture%20Bkgd--Yellow-edtd.jpg);
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
      
    </blockquote></td>
    <td width="329" height="20" align="center" valign="middle"><span class="in1">Welcome <a href="myProfile.php" class="body_p"> <?php echo $_SESSION['fname']."-".$_SESSION['cat']; ?></a> | <a href="signout.php"> Logout </a></span>
    </td>
  </tr>
  <tr bgcolor="#EAE5CE">
    <td colspan="2" align="center"><p>&nbsp;</p>
      <p>&nbsp;</p>
      <table width="810" border="0">
        <tr>
          <td width="155" align="center"><a href="user management.php"><img src="images/Users-Image.png" width="128" height="128" align="middle" /></a></td>
          <td width="41">&nbsp;</td>
          <td width="169" align="center"><a href="library item management.php"><img src="images/books1.jpg" width="130" height="130" align="absmiddle" /></a></td>
          <td width="42">&nbsp;</td>
          <td width="165" align="center"><a href="issue_return_items.php"><img src="images/returns.png" width="123" height="123" align="middle" /></a></td>
          <td width="37">&nbsp;</td>
          <td width="171" align="center"><a href="reports.php"><img src="Images/reports (2).jpg" width="110" height="110" align="middle" /></a></td>
        </tr>
        <tr>
          <td align="center"><a href="user management.php"><img src="Images/User management2.png" width="126" height="49" align="middle" /></a></td>
          <td>&nbsp;</td>
          <td align="center"><a href="library item management.php"><img src="Images/library item management.png" width="126" height="49" align="absmiddle" /></a></td>
          <td>&nbsp;</td>
          <td align="center"><a href="issue_return_items.php"><img src="Images/issue return items.png" width="126" height="49" align="middle" /></a></td>
          <td>&nbsp;</td>
          <td align="center"><a href="reports.php"><img src="Images/reports1.jpg" width="126" height="49" align="middle" /></a></td>
        </tr>
        <tr>
          <td height="25">&nbsp;</td>
          <td height="25">&nbsp;</td>
          <td height="25">&nbsp;</td>
          <td height="25">&nbsp;</td>
          <td height="25">&nbsp;</td>
          <td height="25">&nbsp;</td>
          <td height="25">&nbsp;</td>
        </tr>
      </table>
      <p>&nbsp;</p></td>
  </tr>
  <tr bgcolor="#FF6600" id="footer">
    <td height="50" colspan="2" align="center" bgcolor="#CC6600">Copyright &copy; 2013 Negombo South International School. All Rights Reserved</td>
  </tr>
</table>
</body>
</html>
<?php } else {
	header("location:index.php?id=Please Enter Email and Password"); #Message to display when a user tries to enter a page without loggin in
}
?>