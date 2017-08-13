<?php
session_start();

//To restrict other users from accessing this page without logging in
if($_SESSION['userid']!="" && $_SESSION['pass']!="" && ($_SESSION['cat']=="Admin" || $_SESSION['cat']=="Librarian")){

//To check whether Search button is clicked or not
if(isset($_POST['search'])){
	include("include/dbconnection.php");
	
	//Only search from User Id
	if($_POST['uid']!="" && $_POST['ufname']==""){
		$sql="SELECT * FROM user as u,user_type as ut WHERE u.User_ID='$_POST[uid]' AND u.User_Type_ID=ut.User_Type_ID";
		$result=mysqli_query($con,$sql); //Execute $sql query
		}
	
		//Only search from User First Name	
		elseif($_POST['ufname']!="" && $_POST['uid']==""){
		$sql1="SELECT * FROM user as u,user_type as ut WHERE u.First_Name LIKE '$_POST[ufname]%' AND u.User_Type_ID=ut.User_Type_ID";
		$result=mysqli_query($con,$sql1);	
		
		// Search using both user id and first name	
		}elseif($_POST['ufname']!="" && $_POST['uid']!=""){
		$sql1="SELECT * FROM user as u, user_type as ut WHERE u.User_ID='$_POST[uid]' AND u.User_Type_ID=ut.User_Type_ID AND u.First_Name LIKE '$_POST[ufname]%'";
		$result=mysqli_query($con,$sql1);
	}
							
	//check no of records
	$no=mysqli_num_rows($result);
	
	}
//when Search2 button is clicked 
if(isset($_POST['search2'])){
	$userType=$_POST['utype'];
	include("include/dbconnection.php");

// To display the records according to the user type id
$sqlut="SELECT * FROM user as u, user_type as ut WHERE u.User_Type_ID='$userType' AND ut.User_Type_ID=u.User_Type_ID";
$result=mysqli_query($con,$sqlut);

	//check no of records
	$no=mysqli_num_rows($result);	
}


?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Delete Users</title>
<link href="mystyle.css" rel="stylesheet" type="text/css" />
<link href="mystyleNew.css" rel="stylesheet" type="text/css" />
<style type="text/css">
.body_p {	color: #FF8000;
}
.body_p {	color: #FF8000;
}
.body_p {	font-weight: bold;
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

body {
	background-image: url(Images/Wall%20Texture%20Bkgd--Yellow-edtd.jpg);
}
.links_color {
	color: #CC6600;
	font-weight: normal;
}
#apDiv1 {
	position:absolute;
	width:130px;
	height:195px;
	z-index:1;
	left: 122px;
	top: 280px;
}
#apDiv2 {
	position:absolute;
	width:185px;
	height:188px;
	z-index:2;
	left: 394px;
	top: 295px;
}
#apDiv3 {
	position:absolute;
	width:175px;
	height:182px;
	z-index:3;
	left: 717px;
	top: 296px;
}
#apDiv4 {
	position:absolute;
	width:175px;
	height:198px;
	z-index:4;
	left: 41px;
	top: 507px;
}
</style>
<link href="mystyleNew.css" rel="stylesheet" type="text/css" />

<script>
//Check the User Type
function showType(str1)
{
var xmlhttp;    
if (str1=="")
  {
  document.getElementById("dis").innerHTML="";
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
    document.getElementById("dis").innerHTML=xmlhttp.responseText;
    }
  }
//send a request to a server
xmlhttp.open("GET","getUserType.php?q="+str1,true); //(method,url,async)
xmlhttp.send();
}
</script>

<script type="text/javascript">

function checkView(){
	//check whether UID and FName are empty	
	if(document.view.uid.value=="" && document.view.ufname.value==""){
		document.getElementById('msg').innerHTML="Please enter User ID or First Name";
		return false; //If both uid and fname are empty data won't be passed to next page if Submit button is clicked
	}
		return true;
}
</script>

<script type="text/javascript">
// Javascript code for deactivating user
function confirmDeactivate(){
var x=confirm("Are you sure you want to deactivate the account?");
if (x){
	return true;
	}
	else
	{
		return false;
	}
}

// Javascript code for activating user
function confirmActivate(){
var x=confirm("Are you sure you want to activate the account?");
if (x){
	return true;
	}
	else
	{
		return false;
	}
}
</script>

</head>

<body>
<table width="1183" border="0" align="center">
  <tr>
    <td height="187" colspan="2"><a href="index.php"><img src="Images/website banner.jpg" width="1183" height="185" /></a></td>
  </tr>
  <tr align="center" bgcolor="#B6AD89" class="in">
    <td width="854" height="30" align="left" valign="top"><blockquote>
    <h4 class="links_color"><em><?php if($_SESSION['cat']=="Admin"){?><a href="adminpanel.php" class="links_color">Home</a><?php } if($_SESSION['cat']=="Librarian"){?><a href="librarianaccount.php" class="links_color">Home</a><?php  } ?></em> | <em><a href="user management.php" class="links_color">User Management</a></em> | <em><a href="library item management.php" class="links_color">Library Item Management</a></em> | <em><a href="issue_return_items.php" class="links_color">Issue/Return Items</a></em> | <em><a href="reports.php" class="links_color">Reports</a></em> | <em><a href="online_catalog_search.php" class="links_color">Online Catalog</a></em></h4>
    </blockquote>
      
    </blockquote></td>
    <td width="329" height="20" align="center" valign="middle"><span class="links_color">Welcome <?php echo $_SESSION['fname']."-".$_SESSION['cat']; ?> | <a href="signout.php">Logout </a></span></td>
  </tr>
  <tr bgcolor="#EAE5CE">
    <td colspan="2" align="center">
    <p>
<table align="center" width="500" border="0">
  	<tr class="body_p">
    	<th colspan="3"><h3 class="body_p">Delete User</h3></th>
        </tr>
        <tr>
        	<td width="150">&nbsp;</td>
            <td width="150">&nbsp;</td>
            <td width="150">&nbsp;</td>
        </tr>
        <tr>
          <td height="31" colspan="3" align="center" class="alert"><span id="msg"></span>&nbsp;</td>
        </tr>
        <tr>
          <td height="44" colspan="3" class="alert1">* Please Enter User ID or First Name or both</td>
        </tr>
        <form name="view" action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post" onsubmit="return checkView()">
        	<tr>
            	<td width="150" height="40" class="body_p">User ID</td>
              	<td width="150" height="40"><input type="number" name="uid" id="uid" min="1" /></td>
                <td width="150"></td>
        </tr>
            <tr>    
                <td width="150" height="40" class="body_p">First Name</td>
           	  <td width="150" height="40"><input type="text" name="ufname" id="ufname" /></td>
              <td width="150" height="40" align="center"><input type="submit" name="search" id="search" value=" Search " align="middle"/></td>
        </tr>
            <tr>
              <td height="26" class="body_p">&nbsp;</td>
              <td height="26">&nbsp;</td>
              <td height="26" align="center">&nbsp;</td>
          </tr>
        </form>
            <tr>
              <td height="40" colspan="3"><span class="alert1"> * Please Select User Type</span></td>
            </tr>
            <form name="view1" method="post" action="<?php echo $_SERVER["PHP_SELF"]; ?>">
            <tr>
              <td height="40" class="body_p">Type</td>
              <td height="40"><label for="utype"></label>
                <select name="utype" id="utype" >
                  <option selected="selected">-Select User Type-</option>
                  <option value="1">Admin</option>
                  <option value="2">Librarian</option>
                  <option value="3">Library Assistant</option>
                  <option value="4">Teacher</option>
                  <option value="5">Student</option>
              </select></td>
              <td height="40" align="center"><input type="submit" name="search2" id="search2" value=" Search " align="middle"/></td>
            </tr></form>
  </table>
<p><span id="dis">
<?php if(isset($_POST['search']) || (isset($_POST['search2']))){ //Once you click on the search button and search2 button table will display ?>
<?php if($no!=0){ ?>
	
<table width="1012" border="0">
  <tr class="body_p">
    <td width="64" height="30">User ID</td>
    <td width="89">Type</td>
    <td width="109">First Name</td>
    <td width="108">Last Name</td>
    <td width="80">Gender</td>
    <td width="183">Email</td>
    <td width="114">Date of Birth</td>
    <td width="136">Registered Date</td>
    <td width="91">&nbsp;</td>
  </tr>
  <?php while($row=mysqli_fetch_array($result)){ ?>
  <tr class="body_p1">
    <td width="64"><?php echo $row['User_ID']; ?>&nbsp;</td>
    <td width="89"><?php echo $row['User_Type_Name']; ?>&nbsp;</td>
    <td width="109"><?php echo $row['First_Name']; ?>&nbsp;</td>
    <td width="108"><?php echo $row['Last_Name']; ?>&nbsp;</td>
    <td width="80"><?php echo $row['Gender']; ?>&nbsp;</td>
    <td width="183"><?php echo $row['Email']; ?>&nbsp;</td>
    <td width="114"><?php echo $row['Date_of_Birth']; ?></td>
    <td width="136"><?php echo $row['Reg_Date'];?>&nbsp;</td>
    <td width="91"><?php if($row['Status']=="Active"){ ?><a href="deleteusercon.php?id=<?php echo $row['User_ID']; //Send user id to deleteusercon.php for deactivate a particular record ?>&id1=Deactive" onclick="return confirmDeactivate()">
    Deactivate</a><?php }else{ ?>
    <a href="deleteusercon.php?id=<?php echo $row['User_ID']; //Send user id to deleteusercon.php for deleteing a particular record ?>&id1=Active" onclick="return confirmActivate()">
    Activate</a>
    <?php } ?>
    &nbsp;</td>
  </tr>
  <?php } ?>
</table></span>
<p><span>
  <?php }else{?>
  
  <span class="alert">Records not found</span>
  <?php }
} ?>
  </span>
 <?php if(isset($_REQUEST['changeuid'])) { 
 include("include/dbconnection.php");
 $sql="SELECT * FROM user as u,user_type as ut WHERE u.User_ID='$_REQUEST[changeuid]' AND u.User_Type_ID=ut.User_Type_ID";
		$result=mysqli_query($con,$sql);
 
 
 ?>
 
<table width="1012" border="0">
  <tr class="body_p">
    <td width="64" height="30">User ID</td>
    <td width="89">Type</td>
    <td width="109">First Name</td>
    <td width="108">Last Name</td>
    <td width="80">Gender</td>
    <td width="183">Email</td>
    <td width="114">Date of Birth</td>
    <td width="136">Registered Date</td>
    <td width="91">&nbsp;</td>
  </tr>
  <?php while($row=mysqli_fetch_array($result)){ ?>
  <tr class="body_p1">
    <td width="64"><?php echo $row['User_ID']; ?>&nbsp;</td>
    <td width="89"><?php echo $row['User_Type_Name']; ?>&nbsp;</td>
    <td width="109"><?php echo $row['First_Name']; ?>&nbsp;</td>
    <td width="108"><?php echo $row['Last_Name']; ?>&nbsp;</td>
    <td width="80"><?php echo $row['Gender']; ?>&nbsp;</td>
    <td width="183"><?php echo $row['Email']; ?>&nbsp;</td>
    <td width="114"><?php echo $row['Date_of_Birth']; ?></td>
    <td width="136"><?php echo $row['Reg_Date'];?>&nbsp;</td>
    <td width="91"><?php if($row['Status']=="Active"){ ?><a href="deleteusercon.php?id=<?php echo $row['User_ID']; //Send user id to deleteusercon.php for deactivate a particular record ?>&id1=Deactive" onclick="return confirmDeactivate()">
    Deactivate</a><?php }else{ ?>
    <a href="deleteusercon.php?id=<?php echo $row['User_ID']; //Send user id to deleteusercon.php for deleteing a particular record ?>&id1=Active" onclick="return confirmActivate()">
    Activate</a>
    <?php } ?>
    &nbsp;</td>
  </tr>
  <?php } ?>
</table>
<?php } ?><br /></td>
  </tr>
  
  <tr bgcolor="#FF6600" id="footer">
    <td height="50" colspan="2" align="center" bgcolor="#CC6600">Copyright &copy; 2013 Negombo South International School. All Rights Reserved</td>
  </tr>
</table>
</body>
</html>
<?php } else {
	header("Location:index.php?id=Please Enter Email and Password"); //Message to display when a user tries to enter a page without loggin in
}
?>