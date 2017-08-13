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
<title>Edit My Profile</title>
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
	font-family: Georgia, "Times New Roman", Times, serif;
	font-weight: normal;
}
.links_color {color: #CC6600;
}
</style>
<link href="mystyle.css" rel="stylesheet" type="text/css" />
<link href="mystyle1.css" rel="stylesheet" type="text/css" />
<link href="mystyleNew.css" rel="stylesheet" type="text/css" />
<script type="text/javascript">
function checkVali(){
	
	var x=document.reg.phone_no.value;
		var letter=/^[a-zA-Z ]{2,30}$/; //////////////////////????????????????????????????????????????????
	if(document.reg.fname.value==""){
		 document.getElementById('fname1').innerHTML="First Name is required";
		 document.reg.fname.focus();
		//var currentElement = $get(currentElementId); // ID set by OnFocusIn 

		 return false;	
	}else if(!document.reg.fname.value.match(letter)){
		 document.getElementById('fname1').innerHTML="Invalid First Name";
		 document.reg.fname.focus();
		 document.reg.fname.select();
		 
		return false;	
	}else if(document.reg.lname.value==""){
		document.getElementById('lname1').innerHTML="Last Name is required";
		document.getElementById('fname1').innerHTML="";
	
		document.reg.lname.focus();
		return false;
	}else if(!document.reg.lname.value.match(letter)){
		 document.getElementById('lname1').innerHTML="Invalid Last Name";
		 document.getElementById('fname1').innerHTML="";
		 document.reg.lname.focus();
		 document.reg.lname.select();
		return false;	
	}else if(document.reg.address.value==""){
		document.getElementById('address1').innerHTML="Address is required";
		document.getElementById('fname1').innerHTML="";
		document.getElementById('lname1').innerHTML="";
		document.reg.address.focus();
		return false;
	}else if(document.reg.phone_no.value==""){
		document.getElementById('phoneNo1').innerHTML="Phone Number is required";
		document.getElementById('fname1').innerHTML="";
		document.getElementById('lname1').innerHTML="";
		document.getElementById('address1').innerHTML="";
		document.reg.phone_no.focus();
		return false;
	}else if(document.reg.phone_no.value.length!=10 && isNaN(x) ){
		document.getElementById('phoneNo1').innerHTML="Phone Number should have 10 digits AND Only Numeric";
		document.getElementById('fname1').innerHTML="";
		document.getElementById('lname1').innerHTML="";
		document.getElementById('address1').innerHTML="";
		document.reg.phone_no.focus();
		document.reg.phone_no.select();
		return false;
	}else if(isNaN(x)){
		document.getElementById('phoneNo1').innerHTML="Only Numeric Values are allowed";
		document.getElementById('fname1').innerHTML="";
		document.getElementById('lname1').innerHTML="";
		document.getElementById('address1').innerHTML="";
		document.reg.phone_no.focus();
		document.reg.phone_no.select();
		return false;
	}else if(document.reg.phone_no.value.length!=10){
		document.getElementById('phoneNo1').innerHTML="Phone Number should have 10 digits";
		document.getElementById('fname1').innerHTML="";
		document.getElementById('lname1').innerHTML="";
		document.getElementById('address1').innerHTML="";
		document.reg.phone_no.focus();
		document.reg.phone_no.select();
		return false;
	}else if(document.reg.dob.value==""){
		document.getElementById('dob1').innerHTML="Date of Birth is required";
		document.getElementById('fname1').innerHTML="";
		document.getElementById('lname1').innerHTML="";
		document.getElementById('address1').innerHTML="";
		document.getElementById('phoneNo1').innerHTML="";
		document.reg.dob.focus();
		document.reg.dob.select();
		return false;
	}
		return true;
}
</script>


</head>

<body>
<form name="reg" method="post" action="edit_my_profile_process.php" onsubmit="return checkVali()">
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
    <td colspan="2" align="center"><br />
      <table width="813" border="0">
        <tr class="body_p">
          <th height="36" colspan="3" align="center" scope="col"><blockquote>
            <h3>Edit My Profile</h3>
          </blockquote></th>
        </tr>
        <tr>
          <td colspan="3" align="center" class="body_p">&nbsp;</td>
        </tr>
        <tr>
          <td colspan="3" align="center" class="body_p">&nbsp;
          
          </td>
          </tr>
        <tr>
          <td colspan="3" class="body_p">&nbsp;</td>
          </tr>
        <tr>
          <td width="168" class="body_p">&nbsp;</td>
          <td width="272" class="body_p">User ID</td>
          <td width="359"><label for="user id"></label>
          <input name="user id" type="text" disabled="disabled" id="user id" value="<?php echo $row['User_ID']; ?>" /></td>
        </tr>
        <tr>
          <td class="body_p">&nbsp;</td>
          <td class="body_p">User Type Name</td>
          <td>
            <input name="user type id" type="text" disabled="disabled" id="user type id" value="<?php echo $row['User_Type_Name']; ?>" /></td>
        </tr>
        <tr>
          <td class="body_p">&nbsp;</td>
          <td class="body_p">First Name</td>
          <td>
            <input type="text" name="fname" id="fname" value="<?php echo $row['First_Name']; ?>" /><span id="fname1" class="alert"></span></td>
        </tr>
        <tr>
          <td class="body_p">&nbsp;</td>
          <td class="body_p">Last Name</td>
          <td>
            <input type="text" name="lname" id="lname" value="<?php echo $row['Last_Name']; ?>"/><span id="lname1"class="alert"></span></td>
        </tr>
        <tr>
          <td class="body_p">&nbsp;</td>
          <td class="body_p">Address</td>
          <td>
            <input type="text" name="address" id="address" value="<?php echo $row['Address']; ?>"/><span id="address1" class="alert"></span></td>
        </tr>
        <tr>
          <td class="body_p">&nbsp;</td>
          <td class="body_p">Phone No</td>
          <td>
            <input type="text" name="phone_no" id="phone_no" value="<?php echo $row['Phone_No']; ?>"  /><span id="phoneNo1" class="alert"></span></td>
        </tr>
        <tr class="body_p">
          <td class="body_p">&nbsp;</td>
          <td class="body_p">Gender</td>
          <td><label for="gender"></label>
          <?php if($row['Gender']=="Male"){ ?>
            Male
            <input type="radio" name="radio" id="male" value="Male" checked="checked" />
          <label for="male"> 
            Female
            <input type="radio" name="radio" id="Female" value="Female" />
          </label>
		  
		 <?php }else{?>
          Male
            <input type="radio" name="radio" id="male" value="Male"  />
          <label for="male"> 
            Female
            <input type="radio" name="radio" id="Female" value="Female" checked="checked"/>
          </label>
          <?php } ?></td>
        </tr>
        <tr>
          <td class="body_p">&nbsp;</td>
          <td class="body_p">Date of Birth</td>
          <td>
          <input name="dob" type="text" id="date-pick1" value="<?php echo $row['Date_of_Birth']; ?>"  /><span id="dob1" class="alert"></span>            </td>
        </tr>
        <tr>
          <td class="body_p">&nbsp;</td>
          <td class="body_p">Registered Date</td>
          <td>
          <input name="reg_date" type="text" disabled="disabled" id="date-pick2" value="<?php echo $row['Reg_Date']; ?>" />            </td>
</tr>
        <tr>
          <td class="body_p">&nbsp;</td>
          <td class="body_p">E-mail</td>
          <td>
            <input name="email" type="text" disabled="disabled" id="email" value="<?php echo $row['Email']; ?>" /></td>
        </tr>
        <tr>
          <td class="body_p">&nbsp;</td>
          <td class="body_p">&nbsp;</td>
          <td>&nbsp;</td>
        </tr>
        <tr>
          <td colspan="3" align="center" class="body_p"><h5><strong class="links_color"><a href="changePass.php">Change Password</a></strong></h5></td>
        </tr>
        <tr>
          <td colspan="3" class="body_p">&nbsp;</td>
          </tr>
        <tr>
          <td colspan="3" align="center" class="body_p"><input name="save" type="submit" class="co" id="save" value="Save Changes" /></td>
        </tr>
        <tr>
          <td class="body_p">&nbsp;</td>
          <td class="body_p">&nbsp;</td>
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
</form>
</body>
</html>