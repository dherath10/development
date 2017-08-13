<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>WBLMS Home Page</title>

<link href="mystyleNew.css" rel="stylesheet" type="text/css" />
<link href="mystyle.css" rel="stylesheet" type="text/css" />
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
.in {
	color: #804000;
	font-weight: normal;
}
.links_color {	color: #CC6600;
}
#footer {
	font-family: Georgia, "Times New Roman", Times, serif;
	font-size: 14px;
}
</style>
</head>

<body>
<table width="1183" border="0" align="center">
  <tr>
    <td width="956" height="187"><a href="index.php"><img src="Images/website banner.jpg" width="1183" height="185" /></a></td>
  </tr>
  <tr align="center" bgcolor="#B6AD89" class="in">
    <td align="left" valign="top"><blockquote>
      <h4 class="links_color"><em><a href="index.php" class="links_color">Home</a></em> | <em><a href="aboutus.php" class="links_color">About Us</a></em> | <em><a href="online_catalog_search.php" class="links_color">Online Catalog</a></em> | <a href="contact.php" class="links_color"><em>Contact</em></a></h4>
    </blockquote></td>
  </tr>
  <tr bgcolor="#EAE5CE">
    <td><p><img src="Images/studentsedited.jpg" width="579" height="256" align="left" /></p>
    <form name="login" method="post" action="login.php">
      <table width="305" height="207" border="0" align="center">
        <tr class="in">
          <td height="42" colspan="2" class="log"><h3><strong><em>Login</em></strong></h3></td>
        </tr>
        <tr class="in">
          <td height="20" colspan="2" align="center" class="log">
          
          <?php
		  if(isset($_REQUEST['id'])){ //////////..........
			  echo $_REQUEST['id'];
			  
		  }
          
          ?>
          &nbsp;</td>
        </tr>
        <tr>
          <td width="95" height="25" class="in">Email</td>
          <td width="190">
            <input type="text" name="email" /></td>
        </tr>
        <tr>
          <td height="26" class="in">Password</td>
          <td>
            <input type="password" name="pass" id="pass" /></td>
        </tr>
        <tr>
          <td height="40" colspan="2" align="center"><input name="Login" type="submit" id="Login" value="Login" /></td>
        </tr>
        <tr>
          <td height="29" colspan="2" align="center"><a href="forgotPwd.php" class="links_color">Forgot password?</a></td>
        </tr>
      </table>
      </form>
      <blockquote>
        <h3 class="body_p">&nbsp;</h3>
        <h3 class="body_p"><em>The Mission</em></h3>
        <p class="body_p">The mission of the Library of Negombo South International School is:</p>
      </blockquote>
      <ul>
        <li class="body_p">To develop information literate students</li>
        <li class="body_p">To encourage active, compassionate, lifelong learners</li>
        <li class="body_p">To teach teachers &amp; students to effectively access, evaluate, use and communicate information</li>
        <li class="body_p">To help provide students with positive learning environment</li>
        <li class="body_p">To encourage the love of reading</li>
      </ul>
      <p>&nbsp;</p></td>
  </tr>
  <tr bgcolor="#FF6600">
    <td height="50" align="center" bgcolor="#CC6600" id="footer">Copyright &copy; 2013 Negombo South International School. All Rights Reserved</td>
  </tr>
</table>
</body>
</html>