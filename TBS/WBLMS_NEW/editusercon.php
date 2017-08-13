<?php
session_start();

//To restrict other users from accessing this page without logging in
if($_SESSION['userid']!="" && $_SESSION['pass']!="" && ($_SESSION['cat']=="Admin" || $_SESSION['cat']=="Librarian" )){

//To get classes ( 1 to 11 )
$a=array("A","B","C","D","E");
//To get the classes (1 to 13)
$b=array("A","B","C");

//To get current year
$y=date("Y"); // 

$yy=$y-5; //To reduce 5 years from the current year to get the Birth Year

//To get the User id
$uid=$_REQUEST['id'];

//To get the database connectivity
include("include/dbconnection.php");

//To get all the User Type Names
$sqlt="SELECT * FROM user_type";
$resultt=mysqli_query($con,$sqlt);

//To get all the user details and user type details for a particular user id
$sqluser="SELECT * FROM user as u, user_type as ut WHERE u.User_ID='$_REQUEST[id]' AND u.User_Type_ID=ut.User_Type_ID";
$resultuser=mysqli_query($con,$sqluser);
$rowuser=mysqli_fetch_array($resultuser); //To get all the user details into an array
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Edit User Information</title>
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
	font-size: 17px;
}
</style>

<style type="text/css">
body {
	background-image: url(Images/Wall%20Texture%20Bkgd--Yellow-edtd.jpg);
}
</style>
<link href="mystyleNew.css" rel="stylesheet" type="text/css" />
<link href="mystyle.css" rel="stylesheet" type="text/css" />
<script>

//Add class field
function showUser(str) //str = string
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
xmlhttp.open("GET","getUser.php?q="+str,true); //
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
xmlhttp.onreadystatechange=function()
  {
  if (xmlhttp.readyState==4 && xmlhttp.status==200)
    {
    document.getElementById("email1").innerHTML=xmlhttp.responseText;
    }
  }
//send a request to a server
xmlhttp.open("GET","getEmail1.php?q="+str1,true); //(method,url,async)
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
	var letter=/^[a-zA-Z ]{2,30}$/;
	if(document.reg.fname.value==""){
		 document.getElementById('fname1').innerHTML="Blank First Name";
		 document.reg.fname.focus();
		var currentElement = $get(currentElementId); // ID set by OnFocusIn 

		 return false;	
	}else if(!document.reg.fname.value.match(letter)){
		 document.getElementById('fname1').innerHTML="Invalid First Name";
		 document.reg.fname.focus();
		 document.reg.fname.select();
		return false;	
	}else if(document.reg.lname.value==""){
		document.getElementById('lname1').innerHTML="Blank Last Name";
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
		document.getElementById('address1').innerHTML="Blank Address";
		document.getElementById('fname1').innerHTML="";
		document.getElementById('lname1').innerHTML="";
		document.reg.address.focus();
		return false;
	}else if(document.reg.phoneNo.value==""){
		document.getElementById('phoneNo1').innerHTML="Blank Phone No";
		document.getElementById('fname1').innerHTML="";
		document.getElementById('lname1').innerHTML="";
		document.getElementById('address1').innerHTML="";
		document.reg.phoneNo.focus();
		return false;
	}else if(document.reg.phoneNo.value.length!=10){
		document.getElementById('phoneNo1').innerHTML="Please enter 10 digits Tel No  ";
		document.getElementById('fname1').innerHTML="";
		document.getElementById('lname1').innerHTML="";
		document.getElementById('address1').innerHTML="";
		document.reg.phoneNo.focus();
		document.reg.phoneNo.select();
		return false;
	}else if(isNaN(x)){
		document.getElementById('phoneNo1').innerHTML="Not a Number";
		document.getElementById('fname1').innerHTML="";
		document.getElementById('lname1').innerHTML="";
		document.getElementById('address1').innerHTML="";
		document.reg.phoneNo.focus();
		document.reg.phoneNo.select();
		return false;
	}else if(document.reg.gender.value==""){
		document.getElementById('gender1').innerHTML="Blank Gender";
		document.getElementById('fname1').innerHTML="";
		document.getElementById('lname1').innerHTML="";
		document.getElementById('address1').innerHTML="";
		document.getElementById('phoneNo1').innerHTML="";
		document.reg.gender.focus();
		return false;
	}else if(document.reg.day.value=="" || document.reg.month.value=="" || document.reg.year.value=="" ){
		document.getElementById('dob').innerHTML="Please Enter DOB";
		document.getElementById('fname1').innerHTML="";
		document.getElementById('lname1').innerHTML="";
		document.getElementById('address1').innerHTML="";
		document.getElementById('phoneNo1').innerHTML="";
		document.getElementById('gender1').innerHTML="";
		
		return false;
	}else if(document.reg.email.value==""){
		document.getElementById('email1').innerHTML="Blank Email Address";
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
		document.getElementById('pass1').innerHTML="Blank Password";
		document.getElementById('fname1').innerHTML="";
		document.getElementById('lname1').innerHTML="";
		document.getElementById('address1').innerHTML="";
		document.getElementById('phoneNo1').innerHTML="";
		document.getElementById('gender1').innerHTML="";
		document.getElementById('dob').innerHTML="";
		document.getElementById('email1').innerHTML="";
		document.reg.password.focus();
		return false;
	}else if(document.reg.password.value.length<=6){
		document.getElementById('pass1').innerHTML="Password length should be more than 6 characters";
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
		document.getElementById('pass2').innerHTML="Passwords are not matching";
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
		document.getElementById('type1').innerHTML="Blank Type"+x1;
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
		document.getElementById('class1').innerHTML="Blank Class";
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
function onl(){
		document.reg.email.focus();
		
		
	
}
</script>
</head>

<body> 

<table width="1183" border="0" align="center">
  <tr>
    <td height="187" colspan="2"><a href="index.php"><img src="Images/website banner.jpg" width="1183" height="185" /></a></td>
  </tr>
  <tr align="center" bgcolor="#B6AD89" class="in">
    <td width="878" align="left" valign="top"><blockquote>
      <h4 class="links_color"><em><?php //for admin
	   if($_SESSION['cat']=="Admin"){?><a href="adminpanel.php" class="links_color">Home</a><?php } 
	   if($_SESSION['cat']=="Librarian"){//for Librarian?><a href="librarianaccount.php" class="links_color">Home</a><?php  } ?></em> | <em><a href="user management.php">User Management</a></em>
       <?php if($_SESSION['cat']=="Librarian" || $_SESSION['cat']=="Library Assistant" ){?>
       | <em><a href="library item management.php" class="links_color">Library Item Management</a></em> | <em><a href="issue_return_items.php">Issue/Return Items</a></em> | <em><a href="reports.php">Reports</a></em> | <em><a href="search.php">Search</a></em><?php } ?></h4>
    </blockquote></td>
    <td width="305" align="right" valign="top"><span class="in1">Welcome...<?php echo $_SESSION['fname']."-".$_SESSION['cat']; ?> | <a href="signout.php"> Logout</a></span></td>
  </tr>
  <tr bgcolor="#EAE5CE">
    <td colspan="2" align="center"><blockquote>
      <p>&nbsp;</p>
      <form method="post" action="edituserup.php?uid=<?php echo $uid; ?>" name="reg" id="reg" onsubmit="return checkVali()">
      <table width="800" border="0" align="center">
        <tr>
          <td colspan="8" align="center" class="body_p"><h3 class="body_p">Edit User</h3>
 
          </td>
          </tr>        
        <tr>
          <td colspan="8" align="center" class="body_p">
          <?php
		  //To check whether ms has a value or not that means it came from userregistrationcon.php(Existing email)
		   if(isset($_REQUEST['ms'])){
			   echo $_REQUEST['ms']; 
			  		  }
		  ?>
          
          &nbsp;</td>
          </tr>
        <tr>
          <td colspan="4" class="body_p">First Name</td>
          <td colspan="4" class="alert"><label for="fname"></label>
            <input type="text" name="fname" id="fname" value="<?php 
			//If it's email address is existing then display the entered first name
			 if(isset($_REQUEST['id'])){ echo $rowuser['First_Name'];  } ?>" />&nbsp;<span id='fname1'></span></td>
        </tr>
        <tr>
          <td colspan="4" class="body_p">Last Name</td>
          <td colspan="4" class="alert"><label for="lname"></label>
            <input type="text" name="lname" id="lname" value="<?php 
			//If it's email address is existing then display the entered last name
			 if(isset($_REQUEST['id'])){ echo $rowuser['Last_Name'];  } ?>" />&nbsp;<span id='lname1'></span></td>
        </tr>
        <tr>
          <td colspan="4" class="body_p">Address</td>
          <td class="alert" valign="middle"><textarea name="address" cols="25" id="address"><?php 
			//If it's email address is existing then display the entered address
			 if(isset($_REQUEST['id'])){ echo $rowuser['Address'];  } ?></textarea>
            <label for="address"></label>           </td>
          <td colspan="3" valign="middle" class="alert"> &nbsp;<span id='address1'></span>&nbsp;&nbsp;</td>
          </tr>
        <tr>
          <td colspan="4" class="body_p">Phone No</td>
          <td colspan="4" class="alert"><label for="phoneNo"></label>
            <input type="text" name="phoneNo" id="phoneNo" value="<?php 
			if(isset($_REQUEST['id'])){ echo $rowuser['Phone_No']; } ?>" maxlength="10"/>&nbsp;
            <span id="phoneNo1"></span></td>
        </tr>
        <tr>
          <td colspan="4" class="body_p">Gender</td>
          <td colspan="4" class="alert"><label for="gender"></label>
            <label for="gender"></label>
              <select name="gender" id="gender">
                
                <?php 
			//If it's email address is existing then display the entered name
			 if(isset($_REQUEST['id'])){ ?>
             <!--  -->
             <option value="<?php echo $rowuser['Gender']; //To assign selected gender  ?>"><?php echo $rowuser['Gender'];//To display already selected gender ?></option>
			 	 <?php 
				 if($rowuser['Gender']=="Male"){ //To check if Male is selected and to display Female gender in Select Menu ?>
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
          <td colspan="4" class="body_p">Date of Birth</td>
          <td colspan="4" class="alert"><label for="day"></label>
            <select name="day" id="day">
            <?php 
			//To check the existing email address
			if(isset($_REQUEST['id'])){ // If it's existing email display the date
				$dob=$rowuser['Date_of_Birth']; // Put the Date_of_Birth coming from the $rowuser array to a variable calles $dob
				
				$bdate=explode('-',$dob); //To divide the date of birth into year, month and day
				$year=$bdate[0]; //To get the year
				$month=$bdate[1]; //To get the month
				$day=$bdate[2];	// To get the day			
				?>
                <option selected="selected" value="<?php echo $day; ?>"><?php echo $day; ?></option><?php }else{ //Otherwise select the day ?>
              <option selected="selected" value="">Day</option>
              <?php } ?>
              <?php for($i=1;$i<=31;$i++){ ?>
              <option value="<?php echo $i; ?>"><?php echo $i; ?></option>
              <?php } ?>   
              </select>
              
            <label for="month"></label>
            <select name="month" id="month">
             <?php if(isset($_REQUEST['id'])){
				?>
                <option selected="selected" value="<?php echo $month; ?>"><?php echo $month; ?></option><?php }else{ ?>
              <option selected="selected"  value="">Month</option>
              <?php } for($i=1;$i<=12;$i++){ ?>
              <option value="<?php echo $i; ?>"><?php echo $i; ?></option>
              <?php } ?>
              </select>
              
            <label for="year"></label>
            <select name="year" id="year">
            <?php if(isset($_REQUEST['id'])){
				?>
              <option selected="selected"  value="<?php echo $year; ?>"><?php echo $year; ?></option><?php }else{ ?>
              <option selected="selected" value="">Year</option>
              <?php } for($i=1970;$i<=$yy;$i++){ ?>
              <option value="<?php echo $i; ?>"><?php echo $i; ?></option>
              <?php } ?>
            </select>&nbsp;<span id="dob"></span></td>
        </tr>
        <tr>
          <td colspan="4" class="body_p">Email</td>
          <td colspan="4" class="alert">
           <?php if(isset($_REQUEST['id'])){
				?>
            <input type="text" name="email" id="email" onkeyup="showEmail(this.value)" value="<?php echo $rowuser['Email']; ?>" disabled="disabled" // To stop changing the Email address  />&nbsp;<span id="email1"></span>
            <?php } else { ?>
            <input type="text" name="email" id="email" onkeyup="showEmail(this.value)" />&nbsp;<span id="email1"></span>
            <?php } ?>
            </td>
        </tr>
        <tr>
          <td colspan="4" class="body_p">Password</td>
          <td colspan="4" class="alert"><input type="password" name="password" id="password" />&nbsp;<span id="pass1"></span></td>
        </tr>
        <tr>
          <td colspan="4" class="body_p">Retype Password</td>
          <td colspan="4" class="alert"><label for="rpassword"></label>
            <input type="password" name="rpassword" id="rpassword" />&nbsp;<span id="pass2"></span></td>
        </tr>
       
        <tr>
          <td colspan="4" class="body_p">Type</td>
          <td colspan="4" class="alert">
            <!-- To get the user type and pass to Ajax code(showUser function -->
              <select name="type" id="type" onchange="showUser(this.value)" required="required">
                <option value="<?php echo $rowuser['User_Type_ID']; ?>"><?php echo $rowuser['User_Type_Name'];?></option>
                <?php //To get all the user type names from the database
				 while($rowt=mysqli_fetch_array($resultt)) {
					//if($rowt['User_Type_ID']==$rowuser['User_Type_ID']){
						//continue;
					//}
					?>
                <option value="<?php echo $rowt['User_Type_ID'];?>"><?php echo $rowt['User_Type_Name'];?></option>
               
               <?php }?>
              </select>&nbsp;
              <span id="type1"></span>
            </td>
        </tr>
        <tr>
          <td colspan="8" class="body_p"><span id="txtHint">
          <?php if ($rowuser['User_Type_ID']==5){
			  $sqlcls="SELECT Class FROM student WHERE User_ID='$uid'";
			  $resultcls=mysqli_query($con,$sqlcls);
			  
			  $rowcls=mysqli_fetch_array($resultcls);
			 $cls=$rowcls['Class'];
			  
			  include("getClass.php");
			  
			  
		  }?>
          
          
          
          </span>&nbsp;</td>
          </tr>
   
        <tr>
          <td width="400" class="body_p">&nbsp;</td>
          <td width="68" class="body_p">&nbsp;</td>
          <td width="4" class="body_p">&nbsp;</td>
          <td width="1" class="body_p">&nbsp;</td>
          <td width="400"><span class="body_p">
            <input type="submit" name="Update" id="Update" value="Update" />
            </span></td>
          <td width="104">&nbsp;</td>
          <td width="1">&nbsp;</td>
          <td width="55">&nbsp;</td>
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

</html>
<?php } else {
	header("Location:index.php?id=Please Enter Email and Password"); //Message to display when a user tries to enter a page without loggin in	
	
}
?>