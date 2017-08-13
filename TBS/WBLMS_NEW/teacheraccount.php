<?php
session_start();

if($_SESSION['userid']!="" && $_SESSION['pass']!="" && $_SESSION['cat']=="Teacher"){
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>My Teacher Account</title>
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
.links_color {
	color: #CC6600;
	font-family: Georgia, "Times New Roman", Times, serif;
}
.in td blockquote .links_color em strong .links_color {
	font-size: medium;
}
</style>
<link href="mystyle.css" rel="stylesheet" type="text/css" />
<link href="mystyle1.css" rel="stylesheet" type="text/css" />
<link href="mystyleNew.css" rel="stylesheet" type="text/css" />
<style type="text/css">
.links_color1 {color: #CC6600;
}
</style>
</head>

<body>
<table width="1183" border="0" align="center">
  <tr>
    <td height="187" colspan="2"><a href="index.php"><img src="Images/website banner.jpg" width="1183" height="185" /></a></td>
  </tr>
  <tr align="center" bgcolor="#B6AD89" class="in">
    <td width="544" align="left" valign="top"><blockquote>
      <h3 class="links_color"><span class="links_color"><em><a href="teacheraccount.php" class="links_color">Home</a></em></span></h3>
    </blockquote></td>
    <td width="382" align="right" valign="middle"><span class="in1">Welcome <a href="myProfile.php" class="body_p"><?php echo $_SESSION['fname']."-".$_SESSION['cat']; ?></a> | <a href="signout.php">Logout </a> </span></td>
  </tr>
  <tr bgcolor="#EAE5CE">
    <td colspan="2" align="center" bgcolor="#EAE5CE"><p>&nbsp;</p>
    <p>&nbsp;</p>
    <table width="626" border="0">
      <tr>
        <td width="246"><a href="history.php"><img src="images/History icon.gif" width="119" height="129" align="right" /></a></td>
        <td width="176">&nbsp;</td>
        <td width="190"><a href="online_catalog_search.php"><img src="Images/SearchIcon.jpg" width="136" height="145" align="left" /></a></td>
      </tr>
      <tr>
        <td><a href="history.php"><img src="images/History.jpg" width="131" height="51" align="right" /></a></td>
        <td>&nbsp;</td>
        <td><a href="online_catalog_search.php"><img src="images/Online Catalog.jpg" width="131" height="51" /></a></td>
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
<?php } else {
		header("Location:index.php?id=Please Enter Email and Password"); } ?>