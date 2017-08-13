<?php
session_start();

//To restrict other users from accessing this page without logging in
if($_SESSION['userid']!="" && $_SESSION['pass']!="" && ($_SESSION['cat']=="Admin" || $_SESSION['cat']=="Librarian")){

//To get current year
$y=date("Y"); // 

$yy=$y-5; //To reduce 5 years from the current year to get the Birth Year
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>User Registration</title>

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
.links_color {	color: #CC6600;
	font-weight:normal;
}
</style>

<style type="text/css">
body {
	background-image: url(Images/Wall%20Texture%20Bkgd--Yellow-edtd.jpg);
}
</style>
<link href="mystyle.css" rel="stylesheet" type="text/css" />
<link href="mystyleNew.css" rel="stylesheet" type="text/css" />

<script>
//Add class field
function showUser(str) 
{
var xmlhttp;    
if (str=="")
  {
  document.getElementById("txtHint").innerHTML="";
  return;
  }
if (window.XMLHttpRequest)
  {// code for IE7+, Firefox, Chrome, Opera, Safari
  xmlhttp=new XMLHttpRequest();
  }
else
  {// code for IE6, IE5
  xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
  }
xmlhttp.onreadystatechange=function() //onreadystatechange:stores a function to call automatically when readyState property changes
  {
	  //Response successfull
  if (xmlhttp.readyState==4 && xmlhttp.status==200) //readyState:4= request finished and response is ready
  //status:200="OK"
    {
    document.getElementById("txtHint").innerHTML=xmlhttp.responseText;
    }
  }
  //the request
xmlhttp.open("GET","getUser.php?q="+str,true); // (method,url,async)
xmlhttp.send();
}
</script>


<script>
//Check the email
function showEmail(str1)
{
var xmlhttp;    
if (str1=="")
  {
  document.getElementById("email1").innerHTML="";
  return;
  }
if (window.XMLHttpRequest)
  {// code for IE7+, Firefox, Chrome, Opera, Safari
  xmlhttp=new XMLHttpRequest();
  }
else
  {// code for IE6, IE5
  xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
  }
xmlhttp.onreadystatechange=function() //onreadystatechange:stores a function to call automatically when readyState property changes
  {
  if (xmlhttp.readyState==4 && xmlhttp.status==200)  //Response successfull
  //readyState:4= request finished and response is ready
  //status:200="OK"
    {
    document.getElementById("email1").innerHTML=xmlhttp.responseText;
    }
  }
//send a request to a server
xmlhttp.open("GET","getEmail.php?q="+str1,true); //(method,url,async)
xmlhttp.send();
}
</script>


<script type="text/javascript">
function checkVali(){
	
	var x=document.reg.phoneNo.value;
	var em1=document.reg.email.value;
	/* To get at position */
	var atpos=em1.indexOf("@");
		/* To get dot position */
	var dotpos=em1.lastIndexOf(".");
	var letter=/^[a-zA-Z ]{2,30}$/; /////////
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
	}else if(document.reg.phoneNo.value==""){
		document.getElementById('phoneNo1').innerHTML="Phone Number is required";
		document.getElementById('fname1').innerHTML="";
		document.getElementById('lname1').innerHTML="";
		document.getElementById('address1').innerHTML="";
		document.reg.phoneNo.focus();
		return false;
	}else if(document.reg.phoneNo.value.length!=10){
		document.getElementById('phoneNo1').innerHTML="Phone Number should have 10 digits";
		document.getElementById('fname1').innerHTML="";
		document.getElementById('lname1').innerHTML="";
		document.getElementById('address1').innerHTML="";
		document.reg.phoneNo.focus();
		document.reg.phoneNo.select();
		return false;
	}else if(isNaN(x)){
		document.getElementById('phoneNo1').innerHTML="Only Numeric Values are allowed";
		document.getElementById('fname1').innerHTML="";
		document.getElementById('lname1').innerHTML="";
		document.getElementById('address1').innerHTML="";
		document.reg.phoneNo.focus();
		document.reg.phoneNo.select();
		return false;
	}else if(document.reg.gender.value==""){
		document.getElementById('gender1').innerHTML="Gender is required";
		document.getElementById('fname1').innerHTML="";
		document.getElementById('lname1').innerHTML="";
		document.getElementById('address1').innerHTML="";
		document.getElementById('phoneNo1').innerHTML="";
		document.reg.gender.focus();
		return false;
	}else if(document.reg.day.value=="" || document.reg.month.value=="" || document.reg.year.value=="" ){
		document.getElementById('dob').innerHTML="DOB is required";
		document.getElementById('fname1').innerHTML="";
		document.getElementById('lname1').innerHTML="";
		document.getElementById('address1').innerHTML="";
		document.getElementById('phoneNo1').innerHTML="";
		document.getElementById('gender1').innerHTML="";
		
		return false;
	}else if(document.reg.email.value==""){
		document.getElementById('email1').innerHTML="Email Address is required";
		document.getElementById('fname1').innerHTML="";
		document.getElementById('lname1').innerHTML="";
		document.getElementById('address1').innerHTML="";
		document.getElementById('phoneNo1').innerHTML="";
		document.getElementById('gender1').innerHTML="";
		document.getElementById('dob').innerHTML="";
		document.reg.email.focus();
		return false;
	}else if(atpos<1 || dotpos<atpos+2 || dotpos+2>=em1.length){
		document.getElementById('email1').innerHTML="Invalid Email Address";
		document.getElementById('fname1').innerHTML="";
		document.getElementById('lname1').innerHTML="";
		document.getElementById('address1').innerHTML="";
		document.getElementById('phoneNo1').innerHTML="";
		document.getElementById('gender1').innerHTML="";
		document.getElementById('dob').innerHTML="";
		document.reg.email.focus();
		document.reg.email.select();
		return false;
	}else if(document.reg.password.value==""){
		document.getElementById('pass1').innerHTML="Password is required";
		document.getElementById('fname1').innerHTML="";
		document.getElementById('lname1').innerHTML="";
		document.getElementById('address1').innerHTML="";
		document.getElementById('phoneNo1').innerHTML="";
		document.getElementById('gender1').innerHTML="";
		document.getElementById('dob').innerHTML="";
		document.getElementById('email1').innerHTML="";
		document.reg.password.focus();
		//document.reg.password.select();
		return false;
	}else if(document.reg.password.value.length<=6){
		document.getElementById('pass1').innerHTML="Password should have 6 to 15 characters";
		document.getElementById('fname1').innerHTML="";
		document.getElementById('lname1').innerHTML="";
		document.getElementById('address1').innerHTML="";
		document.getElementById('phoneNo1').innerHTML="";
		document.getElementById('gender1').innerHTML="";
		document.getElementById('dob').innerHTML="";
		document.getElementById('email1').innerHTML="";
		document.reg.password.focus();
		document.reg.password.select();
		return false;
	}else if(document.reg.password.value!=document.reg.rpassword.value){
		document.getElementById('pass2').innerHTML="Passwords do not match";
		document.getElementById('fname1').innerHTML="";
		document.getElementById('lname1').innerHTML="";
		document.getElementById('address1').innerHTML="";
		document.getElementById('phoneNo1').innerHTML="";
		document.getElementById('gender1').innerHTML="";
		document.getElementById('dob').innerHTML="";
		document.getElementById('email1').innerHTML="";
		document.getElementById('pass1').innerHTML="";
		document.reg.rpassword.focus();
		document.reg.rpassword.select();
		return false;
	}else if(document.reg.type.value==""){
		document.getElementById('type1').innerHTML="Type is required";
		document.getElementById('fname1').innerHTML="";
		document.getElementById('lname1').innerHTML="";
		document.getElementById('address1').innerHTML="";
		document.getElementById('phoneNo1').innerHTML="";
		document.getElementById('gender1').innerHTML="";
		document.getElementById('dob').innerHTML="";
		document.getElementById('email1').innerHTML="";
		document.getElementById('pass1').innerHTML="";
		document.getElementById('pass2').innerHTML="";		
		document.reg.type.focus();
		return false;
	}else if(document.reg.class.value==""){
		document.getElementById('class1').innerHTML="Class is required";
		document.getElementById('fname1').innerHTML="";
		document.getElementById('lname1').innerHTML="";
		document.getElementById('address1').innerHTML="";
		document.getElementById('phoneNo1').innerHTML="";
		document.getElementById('gender1').innerHTML="";
		document.getElementById('dob').innerHTML="";
		document.getElementById('email1').innerHTML="";
		document.getElementById('pass1').innerHTML="";
		document.getElementById('pass2').innerHTML="";
		document.getElementById('type1').innerHTML="";
		document.reg.class.focus();
		return false;
	}
		return true;
}

<!-- ///////////// -->
function onl(){
		document.reg.email.focus();
		
		
	
}
</script>

<!-- To check Integers only -->
<script language="Javascript" type="text/javascript">
 
        function onlyNos2(e, t) {
            try {
                if (window.event) {
                    var charCode = window.event.keyCode;
                }
                else if (e) {
                    var charCode = e.which;
                }
                else { return true; }
                if (charCode > 31 && (charCode < 48 || charCode > 57)) {
					// 31 is Unit Separator, 48 is Zero, 57 is Nine
                    return false;
                }
                return true;
            }
            catch (err) {
                alert(err.Description);
            }
        }
</script>

</head>
<?php if(isset($_REQUEST['id1'])) { ?>
<body onload="onl()"><?php }else{ ?>
<body> 
<?php } ?>
<table width="1183" border="0" align="center">
  <tr>
    <td height="187" colspan="2"><a href="index.php"><img src="Images/website banner.jpg" width="1183" height="185" /></a></td>
  </tr>
  <tr align="center" bgcolor="#B6AD89" class="in">
    <td width="877" align="left" valign="top"><blockquote>
      <h3 class="links_color"><em>&nbsp;&nbsp;&nbsp;<?php if($_SESSION['cat']=="Admin"){?><a href="adminpanel.php" class="links_color">Home</a><?php } if($_SESSION['cat']=="Librarian"){?><a href="librarianaccount.php" class="links_color">Home</a><?php  } ?></em> | <em><a href="user management.php" class="links_color">User Management</a></em> <?php if($_SESSION['cat']=="Librarian") { ?>| <em><a href="library item management.php" class="links_color">Library Item Management</a></em> | <em><a href="issue_return_items.php" class="links_color">Issue/Return Items</a></em> | <em><a href="reports.php" class="links_color">Reports</a></em> | <em><a href="online_catalog_search.php" class="links_color">Online Catalog</a></em><?php } ?></h3>
    </blockquote></td>
    <td width="306" align="right" valign="middle"><span class="in1">Welcome...<?php echo $_SESSION['fname']."-".$_SESSION['cat']; ?> | <a href="signout.php"> Logout</a></span></td>
  </tr>
  <tr bgcolor="#EAE5CE">
    <td colspan="2" align="right"><blockquote>
      <p>&nbsp;</p>
      <form method="post" action="userregistrationcon.php" name="reg" id="reg" onsubmit="return checkVali()">
      <table width="800" border="0" align="center">
        <tr>
          <td colspan="7" align="center" class="body_p"><h3 class="body_p">User Registration</h3>
 
          </td>
          </tr>        
        <tr>
          <td colspan="7" align="center" class="body_p">
          <?php
		  //To check whether ms has a value or not that means it came from userregistrationcon.php(Existing email)
		   if(isset($_REQUEST['ms'])){
			   echo $_REQUEST['ms']; 
			  		  }
		  ?>
          
          &nbsp;</td>
          </tr>
        <tr>
          <td colspan="3" class="body_p">First Name</td>
          <td colspan="4" class="alert"><label for="fname"></label>
            <input type="text" name="fname" id="fname" value="<?php 
			//If the email address is existing then display the entered first name without having a blank
			 if(isset($_REQUEST['id1'])){ echo $_SESSION['fname'];  } ?>" />&nbsp;<span id='fname1'></span></td>
        </tr>
        <tr>
          <td colspan="3" class="body_p">Last Name</td>
          <td colspan="4" class="alert"><label for="lname"></label>
            <input type="text" name="lname" id="lname" value="<?php 
			//If the Email address is existing then display the entered last name without having a blank
			 if(isset($_REQUEST['id1'])){ echo $_SESSION['lname'];  } ?>" />&nbsp;<span id='lname1'></span></td>
        </tr>
        <tr>
          <td colspan="3" class="body_p">Address</td>
          <td colspan="4" class="alert" valign="middle"><textarea name="address" cols="25" id="address"><?php 
			//If the Email address is existing then display the entered address without having a blank
			 if(isset($_REQUEST['id1'])){ echo $_SESSION['address'];  } ?></textarea>
            <label for="address"></label> &nbsp;<span id='address1'></span></td>
     <!-- <td colspan="3" valign="middle" class="alert"> &nbsp;<span id='address1'></span>&nbsp;&nbsp;</td> -->
          </tr>
        <tr>
          <td colspan="3" class="body_p">Phone No</td>
          <td colspan="4" class="alert"><label for="phoneNo"></label>
            <input type="text" name="phoneNo" id="phoneNo" value="<?php 
			//If the Email address is existing then display the entered Phone No without having a blank
			if(isset($_REQUEST['id1'])){ echo $_SESSION['phoneNo']; } ?>" onkeypress="return onlyNos2(event,this);" maxlength="10"/>&nbsp;
            <span id="phoneNo1"></span></td>
        </tr>
        <tr>
          <td colspan="3" class="body_p">Gender</td>
          <td colspan="4" class="alert"><label for="gender"></label>
            <label for="gender"></label>
              <select name="gender" id="gender">
                
                <?php 
			//If the Email address is existing then display the entered Gender without having a blank
			 if(isset($_REQUEST['id1'])){ ?>
             <!--  -->
             <option value="<?php echo $_SESSION['gender']; //To assign selected gender  ?>"><?php echo $_SESSION['gender'];//To display already selected gender ?></option>
			 	 <?php 
				 if($_SESSION['gender']=="Male"){ //To check if Male is selected and to display Female gender in Select Menu ?>
				 <option value="Female">Female</option>
                <?php	 
				 }else{ //To check if Female is selected and to display Male gender in Select Menu ?>
					 <option value="Male">Male</option>
                 <?php    
				 }
				 
				 } else { ?>
                 <option value="">-Select Gender-</option> 
                 <option value="Male">Male</option>
                <option value="Female">Female</option>
                 <?php
				 }
			 ?>
               </select>&nbsp;<span id="gender1"></span>
              </td>
        </tr>
        <tr>
          <td colspan="3" class="body_p">Date of Birth</td>
          <td colspan="4" class="alert"><label for="day"></label>
            <select name="day" id="day">
            <?php 
			// Check if the Email address is existing (getting the id1 message)
			if(isset($_REQUEST['id1'])){ //If the Email address is existing then display the entered day without having a blank
				?>
                <option selected="selected" value="<?php echo $_SESSION['day']; ?>"><?php echo $_SESSION['day']; ?></option><?php }else{ //Otherwise select the day ?>
              <option selected="selected" value="">Day</option>
              <?php } ?>
              <?php for($i=1;$i<=31;$i++){ ?>
              <option value="<?php echo $i; ?>"><?php echo $i; ?></option>
              <?php } ?>   
              </select>
              
            <label for="month"></label>
            <select name="month" id="month">
             <?php 
			 // Check if the Email address is existing (getting the id1 message)
			 if(isset($_REQUEST['id1'])){ //If the Email address is existing then display the entered month without having a blank
				?>
                <option selected="selected" value="<?php echo $_SESSION['month']; ?>"><?php echo $_SESSION['month']; ?></option><?php }else{ ?>
              <option selected="selected"  value="">Month</option>
              <?php } for($i=1;$i<=12;$i++){ ?>
              <option value="<?php echo $i; ?>"><?php echo $i; ?></option>
              <?php } ?>
              </select>
              
            <label for="year"></label>
            <select name="year" id="year">
            <?php 
			// Check if the Email address is existing (getting the id1 message)
			if(isset($_REQUEST['id1'])){ //If the Email address is existing then display the entered year without having a blank
				?>
              <option selected="selected"  value="<?php echo $_SESSION['year']; ?>"><?php echo $_SESSION['year']; ?></option><?php }else{ ?>
              <option selected="selected" value="">Year</option>
              <?php } for($i=1970;$i<=$yy;$i++){ ?>
              <option value="<?php echo $i; ?>"><?php echo $i; ?></option>
              <?php } ?>
            </select>&nbsp;<span id="dob"></span></td>
        </tr>
        <tr>
          <td colspan="3" class="body_p">Email</td>
          <td colspan="4" class="alert">
           <?php if(isset($_REQUEST['id1'])){
				?>
            <input type="text" name="email" id="email" onkeyup="showEmail(this.value)" />&nbsp;<span id="email1">Email Address Existing</span>
            <?php } else { ?>
            <input type="text" name="email" id="email" onkeyup="showEmail(this.value)" />&nbsp;<span id="email1"></span>
            <?php } ?>
            </td>
        </tr>
        <tr>
          <td colspan="3" class="body_p">Password</td>
          <td colspan="4" class="alert"><input type="password" name="password" id="password" maxlength="15"/>&nbsp;<span id="pass1"></span></td>
        </tr>
        <tr>
          <td colspan="3" class="body_p">Retype Password</td>
          <td colspan="4" class="alert"><label for="rpassword"></label>
            <input type="password" name="rpassword" id="rpassword" maxlength="15"/>&nbsp;<span id="pass2"></span></td>
        </tr>
       
        <tr>
          <td colspan="3" class="body_p">Type</td>
          <td colspan="4" class="alert">
            
              <select name="type" id="type" onchange="showUser(this.value)">
                <option value="">-Select User Type-</option>
                <option value="5">Student</option>
                <option value="4">Teacher</option>
                <option value="2">Librarian</option>
                <option value="3">Library Assistant</option>
                <option value="1">Administrator</option>
              </select>&nbsp;
              <span id="type1"></span>
            </td>
        </tr>
        
        <tr>
          <td colspan="7" class="body_p"><span id="txtHint">&nbsp;</span></td>
          </tr>
 
        <tr>
          <td colspan="3" class="body_p">&nbsp;</td>
          <td colspan="4">&nbsp;</td>
        </tr>
        <tr>
          <td colspan="3" class="body_p">&nbsp;</td>
          <td colspan="4">&nbsp;</td>
        </tr>
        <tr>
          <td width="227" class="body_p">&nbsp;</td>
          <td width="63" class="body_p"><input type="submit" name="Register" id="Register" value="Register" /></td>
          <td width="1" class="body_p">&nbsp;</td>
          <td width="316"><input type="reset" name="Reset" id="Reset" value="Reset" /></td>
          <td width="104">&nbsp;</td>
          <td width="1">&nbsp;</td>
          <td width="58">&nbsp;</td>
        </tr>
      </table>      
      </form>
<p>&nbsp;</p>
      
      <p>&nbsp;</p>
</blockquote></td>
  </tr>
  <tr bgcolor="#FF6600">
    <td height="50" colspan="2" align="center" bgcolor="#CC6600" id="footer">Copyright &copy; 2013 Negombo South International School. All Rights Reserved</td>
  </tr>
</table>
</body>
</body>
</html>
<?php } else {
	header("Location:index.php?id=Please Enter Email and Password"); //Message to display when a user tries to enter a page without loggin in	
	
}
?>