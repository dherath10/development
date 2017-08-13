<?php
session_start();
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Online Catalog</title>
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
    <td width="578" height="25" align="left" valign="top"><blockquote>
      <h2 class="links_color"><em><strong><a href="index.php" class="links_color">Home</a></strong></em> <span class="seperator">|</span> <em><strong><a href="aboutus.php" class="links_color">About Us</a></strong></em> <span class="seperator">| </span><a href="contact.php" class="links_color"><em>Contact</em></a></h2>
    </blockquote></td>
    <td width="410" align="right" valign="middle"><span class="in1">Welcome...<?php echo $_SESSION['fname']."-".$_SESSION['cat']; ?> | <a href="signout.php">Logout </a></span></td>
  </tr>
  <tr bgcolor="#EAE5CE">
    <td colspan="2" align="center"><p>&nbsp;</p>
      <p>&nbsp;</p>
    <table width="776" border="0" align="center">
      <tr>
        <td width="139" class="body_p"><strong>Online Catalog </strong></td>
        <td width="117" align="left" class="in1">- Search Results</td>
        <td width="102" align="left" class="in1">&nbsp;</td>
        <td width="198">&nbsp;</td>
        <td width="198">&nbsp;</td>
      </tr>
      <tr>
        <td>&nbsp;</td>
        <td colspan="2">&nbsp;</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
      </tr>
      <tr class="body_p">
        <td height="179"><input type="image" name="desert_flower" id="desert_flower" src="images/Desert flower book.jpg" /></td>
        <td colspan="2"><label for="search">          <strong>Title</strong> : Desert Flower<br />
            <strong>Author</strong> : Waris Dirie<br />
              <strong>Availability</strong> : Available<br />
        </label></td>
        <td align="center"><form id="form1" name="form1" method="post" action="">
          <input type="submit" name="reserve" id="reserve" value="Reserve" formaction="reserveitem.php"/>
        </form></td>
        <td>&nbsp;</td>
      </tr>
      <tr>
        <td>&nbsp;</td>
        <td colspan="2">&nbsp;</td>
        <td>&nbsp;</td>
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