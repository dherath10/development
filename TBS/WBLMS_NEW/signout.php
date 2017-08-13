<?php
//Open the session
session_start();
//Destroy the session
session_destroy();
//with in 5 seconds redirecting
header('refresh:5,url=index.php');
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Sign Out</title>
<style type="text/css">
.body_p {	color: #FF8000;
}
.body_p {	color: #FF8000;
}
.body_p {	font-weight: bold;
}
.body_p {	color: #804000;
	font-family: Georgia, "Times New Roman", Times, serif;
	font-style: normal;
	font-weight: normal;
	text-decoration: none;
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
.in {	color: #804000;
}
.links_color {	color: #CC6600;
}
</style>

<link href="mystyleNew.css" rel="stylesheet" type="text/css" />

</head>

<body>
<table width="1183" border="0" align="center">
  <tr>
    <td height="187"><a href="index.php"><img src="Images/website banner.jpg" width="1183" height="185" /></a></td>
  </tr>
  <tr align="center" bgcolor="#B6AD89" class="in">
    <td height="5" align="left" valign="top"><blockquote>
      <h3 class="links_color">&nbsp;</h3>
    </blockquote></td>
  </tr>
  <tr bgcolor="#EAE5CE">
    <td align="center"><p>&nbsp;</p>
      <p>&nbsp;</p>
      <p>&nbsp;</p>
<p>&nbsp;</p>
      <h3 class="body_p"><strong>You have Successfully Signed Out</strong></h3>
      <p class="body_p">(You will be redirected to Home Page within 5 seconds)</p>
      <p class="body_p"><a href="index.php">Home Page</a></p>
      <blockquote>
        <h3 class="body_p">&nbsp;</h3>
        <p>&nbsp;</p>
<h3 class="body_p">&nbsp;</h3>
      </blockquote></td>
  </tr>
  <tr bgcolor="#FF6600">
    <td height="50" align="center" bgcolor="#CC6600" id="footer">Copyright &copy; 2013 Negombo South International School. All Rights Reserved</td>
  </tr>
</table>
</body>
</html>