<?php
session_start();

include "include/dbconnection.php";

//To get all details related to a particular User ID
$sql="SELECT * FROM user as u, user_type as ut WHERE u.User_ID='$_SESSION[userid]' AND u.User_Type_ID=ut.User_Type_ID";
$result=mysqli_query($con,$sql);
$row=mysqli_fetch_array($result);

?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>MyProfile</title>

<link rel="stylesheet" type="text/css" href="datePicker.css" />
<script src="jquery-1.6.1.min.js" type="text/javascript"></script>
<script src="datePicker-min.js" type="text/javascript"></script>
<script type="text/javascript">
  $(window).ready(function(){
  
  $('#date-pick1').datePicker({clickInput:true}); ////?????????????????????????????
});
</script>

<script type="text/javascript">
  $(window).ready(function(){
  
  $('#date-pick2').datePicker({clickInput:true});
});
</script>

<script type="text/javascript">
function checkPass(){
	var msg=[]; ////////////////////////////////// msg.push?????
	if(document.changepw.cpass.value==""){
		msg.push("Blank 'Current Password'"); ////////////////****************************
		
	}else if(document.changepw.cpass.value.length<6){
		msg.push("Password should have 6 to 15 characters");
	}
	if(document.changepw.npass.value==""){
		msg.push("Blank 'New Password'");
		
	}else if(document.changepw.npass.value.length<6){
		msg.push("Password should have 6 to 15 characters");
	}
	
	
	if(document.changepw.cnpass.value==""){
		msg.push("Blank 'Confirm New Password'");
		
	}
	
		if(document.changepw.npass.value!=document.changepw.cnpass.value){
		msg.push("New Password is not matching");
		
	}
	
		if(msg!=""){
			document.getElementById('msg').innerHTML=msg;
			return false;
				
		}
			return true;
		
}
	

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
<form name="changepw" action="changePassProcess.php" method="post" onsubmit="return checkPass()">
<table width="1183" border="0" align="center">
  <tr>
    <td height="187" colspan="2"><a href="index.php"><img src="Images/website banner.jpg" width="1183" height="185" /></a></td>
  </tr>
  <tr align="center" bgcolor="#B6AD89" class="in">
    <td width="544" height="25" align="left" valign="top"><blockquote>
      <h3 class="links_color"><em><?php include("include/navigate.php"); ?></em></h3>
    </blockquote></td>
    <td width="382" align="right" valign="middle"><span class="in1">Welcome <?php echo $_SESSION['fname']."-".$_SESSION['cat']; ?> | <a href="signout.php">Logout </a></span></td>
  </tr>
  <tr bgcolor="#EAE5CE">
    <td colspan="2" align="center"><p>&nbsp;</p>
      <table width="633" border="0">
        <tr class="body_p">
          <th height="36" colspan="3" align="center" scope="col"><blockquote>
            <h3>Change Password</h3>
          </blockquote></th>
        </tr>
        <tr>
          <td height="35" colspan="3" align="center" class="body_p"><span id="msg" class="alert">
           <?php
		  if(isset($_REQUEST['id'])){
			  
			echo $_REQUEST['id'];
		  
		  }
		  //echo $_SESSION['pass'];
          ?>
          
          
          </span>&nbsp;</td>
          </tr>
        <tr>
          <td width="70" height="35" class="body_p">&nbsp;</td>
          <td width="212" class="body_p">Current Password</td>
          <td width="337" height="35">
          <input name="cpass" type="password" id="cpass" maxlength="15" /></td>
        </tr>
        <tr>
          <td height="35" class="body_p">&nbsp;</td>
          <td height="35" class="body_p">Enter New Password</td>
          <td height="35">
            <input name="npass" type="password" id="npass" maxlength="15" /></td>
        </tr>
        <tr>
          <td height="35" class="body_p">&nbsp;</td>
          <td height="35" class="body_p">Confirm New Password</td>
          <td height="35">
            <input name="cnpass" type="password" id="cnpass" maxlength="15" /></td>
        </tr>
        <tr>
          <td height="25" colspan="2" class="body_p">&nbsp;</td>
          <td height="35">&nbsp;</td>
        </tr>
        <tr>
          <td height="35" colspan="3" align="center" class="body_p"><input type="submit" name="change" id="change" value=" Change " /></td>
        </tr>
      </table>
    <p>&nbsp;</p></td>
  </tr>
  <tr bgcolor="#FF6600" id="footer">
    <td height="50" colspan="2" align="center" bgcolor="#CC6600">Copyright &copy; 2013 Negombo South International School. All Rights Reserved</td>
  </tr>
</table>
</form>
</body>
</html>