<?php
session_start();
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Return Reminder</title>
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
}
.links_color {color: #CC6600;
	font-size: 17px;
}
body {
	background-image: url(Images/Wall%20Texture%20Bkgd--Yellow-edtd.jpg);
}
</style>
<link href="file:///D|/Program files/xampp/htdocs/NSIS - Copy/mystyle.css" rel="stylesheet" type="text/css" />
<link href="mystyleNew.css" rel="stylesheet" type="text/css" />
</head>

<body>
<table width="1183" border="0" align="center">
  <tr>
    <td width="1205" height="187"><a href="index.php"><img src="Images/website banner.jpg" width="1183" height="185" /></a></td>
  </tr>
  <tr align="center" bgcolor="#B6AD89" class="in">
    <td align="right" valign="top"><blockquote>
      <h3 class="links_color"><em><strong><a href="index.php" class="links_color">Home</a></strong></em> | <em><strong><a href="http://localhost/wblms/user.php" class="links_color">User Management</a></strong></em> | <em><strong><a href="http://localhost/wblms/item.php" class="links_color">Library Item Management</a></strong></em> | <a href="issue_return_items.php"><em>Issue/Return Items</em></a><a href="search.php" class="links_color"><em> | </em></a><a href="reports.php"><em>Reports</em></a><a href="search.php" class="links_color"><em> | </em></a><a href="search.php"><em>Search</em></a></h3>
    </blockquote>
    <span class="in1">Welcome...<?php echo $_SESSION['fname']."-".$_SESSION['cat']; ?> | <a href="signout.php"> Logout </a></span></td>
      </tr>
  <tr bgcolor="#EAE5CE">
    <td align="left"><blockquote>
      <p>
        <label for="ei2"></label>
        </p>
      <p>&nbsp;</p>
        <table width="850" border="0">
          <tr>
            <td width="185"><span class="body_p"><strong>Return Reminder</strong></span></td>
            <td width="411">&nbsp;</td>
            <td width="39" class="body_p">&nbsp;</td>
            <td width="113" class="body_p">&nbsp;</td>
            <td width="80" class="body_p">&nbsp;</td>
          </tr>
          <tr>
            <td>&nbsp;</td>
            <td>&nbsp;</td>
            <td>&nbsp;</td>
            <td>&nbsp;</td>
            <td>&nbsp;</td>
          </tr>
          <tr>
            <td class="body_p">Email Address</td>
            <td>            <span class="body_p">
              <input type="text" name="email" id="email" />
            </span></td>
            <td align="right">&nbsp;</td>
            <td align="left">&nbsp;</td>
            <td align="left">&nbsp;</td>
          </tr>
          <tr>
            <td class="body_p">Name</td>
            <td>            <span class="body_p">
              <input type="text" name="name" id="name" />
            </span></td>
            <td align="right">&nbsp;</td>
            <td align="left">&nbsp;</td>
            <td align="left">&nbsp;</td>
          </tr>
          <tr>
            <td class="body_p">Subject</td>
            <td>            <span class="body_p">
              <input name="subject" type="text" id="subject" value="Return Reminder" size="50" />
            </span></td>
            <td align="right">&nbsp;</td>
            <td align="left">&nbsp;</td>
            <td align="left">&nbsp;</td>
          </tr>
          <tr>
            <td class="body_p">Message</td>
            <td>            <span class="body_p">
              <textarea name="msg" cols="60" rows="12" id="msg">Dear Student,

This is to remind you to return the book you borrowed, back to the library. You have two more days to return. After that a fine will be calculated, Rs.5/= per day. 

 Thank You ,
 Librarian             </textarea>
            </span></td>
            <td align="right">&nbsp;</td>
            <td align="left">&nbsp;</td>
            <td align="left">&nbsp;</td>
          </tr>
          <tr>
            <td>&nbsp;</td>
            <td>&nbsp;</td>
            <td align="right">&nbsp;</td>
            <td align="left">&nbsp;</td>
            <td align="left">&nbsp;</td>
          </tr>
          <tr>
            <td align="center"><input type="submit" name="send" id="send" value="Send Mail" /></td>
            <td><input type="submit" name="back" id="back" value="Back" /></td>
            <td align="right">&nbsp;</td>
            <td align="left">&nbsp;</td>
            <td align="left">&nbsp;</td>
          </tr>
          <tr>
            <td>&nbsp;</td>
            <td>&nbsp;</td>
            <td align="right">&nbsp;</td>
            <td align="left">&nbsp;</td>
            <td align="left">&nbsp;</td>
          </tr>
        </table>
        <p>&nbsp;</p>
        <blockquote>
          <blockquote>
          <blockquote>
            <blockquote>&nbsp;</blockquote>
          </blockquote>
        </blockquote>
    </blockquote>
    </blockquote></td>
  </tr>
  <tr bgcolor="#FF6600">
    <td height="50" align="center" bgcolor="#CC6600" id="footer">Copyright &copy; 2013 Negombo South International School. All Rights Reserved</td>
  </tr>
</table>
</body>
</html>