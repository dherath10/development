<?php
session_start();
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Online Catalog Search- Main</title>
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
      <h2 class="links_color"><em><strong><a href="index.php" class="links_color">Home</a></strong></em> | <em><strong><a href="aboutus.php" class="links_color">About Us</a></strong></em> | <em><strong><a href="onlinecatalogsearch.php">Online Catalog</a></strong></em> | <a href="contact.php" class="links_color"><em>Contact</em></a></h2>
    </blockquote></td>
    <td width="382" align="right" valign="middle">&nbsp;</td>
  </tr>
  <tr bgcolor="#EAE5CE">
    <td colspan="2" align="center"><p>&nbsp;</p>
    <p>&nbsp;</p>
    <table width="776" border="0" align="center">
      <tr>
        <td width="208" class="body_p"><strong>Search Catalog</strong></td>
        <td width="189">&nbsp;</td>
        <td width="122">&nbsp;</td>
        <td width="239">&nbsp;</td>
      </tr>
      <tr>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
      </tr>
      <tr>
        <td><label for="search_type"></label>
          <select name="search_type" id="search_type">
            <option selected="selected">--Select Search Type--</option>
            <option>Item Type</option>
            <option>Author</option>
            <option>Title</option>
            <option>Publisher</option>
            <option>Call No</option>
          </select> </td>
        <td><label for="search"></label>
          <input type="text" name="search" id="search" /></td>
        <td align="center"><input type="submit" name="view" id="view" value="View Item" /></td>
        <td><input type="submit" name="back" id="back" value=" Back " /></td>
      </tr>
      <tr>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
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