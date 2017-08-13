<?php 
session_start(); 

//To create the database connectivity
include "include/dbconnection.php";

?>
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

<!-- /////////////////////////////////////////////// -->
<script type="text/javascript" language="javascript">

function validate(){

var txt=document.forms["forgotPass"]["email"].value;

if(txt==null || txt==""){
alert("Please enter your Email Address");
return false;
}
}
</script>

</head>

<body>
<table width="1183" border="0" align="center">
  <tr>
    <td width="956" height="187"><a href="index.php"><img src="Images/website banner.jpg" width="1183" height="185" /></a></td>
  </tr>
  <tr align="center" bgcolor="#B6AD89" class="in">
    <td align="left" valign="top"><blockquote>
      <h4 class="links_color"><em><a href="index.php" class="links_color">Home</a></em> | <a href="forgotPwd.php" class="links_color"><em>Forgot Password</em></a></h4>
    </blockquote></td>
  </tr>
  <tr bgcolor="#EAE5CE">
    <td>
    <form name="forgotPass" method="post" action="forgotPwdPro.php" enctype="multipart/form-data" onsubmit="return validate();">
    <br />
      <table width="495" height="182" border="0" align="center">
        <tr class="in">
          <td height="42" colspan="2" class="log" align="center"><h3><strong><em>Forgot your password?</em></strong></h3></td>
        </tr> <?php if(!isset($_REQUEST['id'])){ //////////////////////////////// ?>
        <tr class="in">
          <td height="32" colspan="2" align="center" class="log"></td>
        </tr>
       
        <tr>
          <td width="250" height="58" class="in">Enter Your Email Address</td>
          <td width="235">
            <input type="text" name="email"/></td>
        </tr>
        <tr>
          <td height="40" align="right"><input type="submit" value="Send to Librarian" /></td>
          <td height="40" align="left">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input type="reset" value="Clear"/></td>
        </tr>
        <?php } else{ ?>
		<tr>
          <td height="40" align="center" colspan="2" class="alert"><?php 
		  //////////////////////////////////////////////////////////////////////////////
		  echo $_REQUEST['id']; ?>&nbsp;<br /><br /></td>
         </tr>
		
		<?php
		}
		
		?>
    
      </table>
      <p>&nbsp;</p>
    </form>
    
    
      </td>
  </tr>
  <tr bgcolor="#FF6600">
    <td height="50" align="center" bgcolor="#CC6600" id="footer">Copyright &copy; 2013 Negombo South International School. All Rights Reserved</td>
  </tr>
</table>
</body>
</html>