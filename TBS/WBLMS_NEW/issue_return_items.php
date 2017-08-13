<?php
session_start();

if($_SESSION['userid']!="" && $_SESSION['pass']!="" && ($_SESSION['cat']=="Librarian" || $_SESSION['cat']=="Library Assistant")){

//To create the database connectivity
include "include/dbconnection.php";

//To lists student and teachers ID
$sql="SELECT User_ID FROM user WHERE User_Type_ID IN (4,5) ORDER BY User_ID";
$result=mysqli_query($con,$sql);
$sql1="SELECT User_ID FROM user WHERE User_Type_ID IN (4,5) ORDER BY User_ID";
$result1=mysqli_query($con,$sql1);

?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Issue/ Return Items</title>
<link rel="stylesheet" type="text/css" href="datePicker.css" />
<!--///////-->
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
<script type="text/javascript">
  $(window).ready(function(){
  
  $('#date-pick3').datePicker({clickInput:true});
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
}
.links_color {	
	color: #CC6600;
	font-weight:normal;
}
body {
	background-image: url();
}
</style>
<script type="text/javascript">
function check(){
	if(document.issue.user_id.value==""){
			alert("Please Select User ID");
			document.issue.user_id.focus();
			return false;
	}else if(document.issue.accession_no.value==""){
			alert("Please Enter Accession No");
			document.issue.accession_no.focus();
			return false;
		
	}else if(isNaN(document.issue.accession_no.value)){
			alert("Please Enter a Valid Accession No");
			document.issue.accession_no.focus();
			document.issue.accession_no.select();
			return false;
		
	}
		return true;
	
}
</script>

<link href="mystyle.css" rel="stylesheet" type="text/css"/>
<link href="mystyleNew.css" rel="stylesheet" type="text/css" />
</head>

<body>
<table width="1183" border="0" align="center">
  <tr>
    <td height="187" colspan="2"><a href="index.php"><img src="images/website banner.jpg" width="1183" height="185" /></a></td>
  </tr>
  <tr align="center" bgcolor="#B6AD89" class="in1">
    <td width="855" align="left" valign="top">
    <blockquote>
    <h4 class="links_color"><em>
      <?php if($_SESSION['cat']=="Librarian"){?><a href="librarianaccount.php" class="links_color">Home</a><?php } if($_SESSION['cat']=="Library Assistant"){?><a href="libraryassistant.php" class="links_color">Home</a><?php  } ?></em> | <em><?php if($_SESSION['cat']=="Librarian") { ?><a href="user management.php" class="links_color">User Management</a><?php } if($_SESSION['cat']=="Library Assistant"){ ?><a href="user management2.php" class="links_color">User Management</a><?php } ?></em> | <em><a href="library item management.php" class="links_color">Library Item Management</a></em> | <em><a href="issue_return_items.php" class="links_color">Issue/Return Items</a></em> | <em><a href="reports.php" class="links_color">Reports</a></em> | <em><a href="online_catalog_search.php" class="links_color">Online Catalog</a></em></h4>  
    </blockquote>
    </td>
    <td width="328" align="right" valign="middle" class="in1">
    Welcome <?php echo $_SESSION['fname']."-".$_SESSION['cat']; ?> | <a href="signout.php"> Logout</a>&nbsp;</td>
  </tr>
  <tr bgcolor="#EAE5CE">
    <td colspan="2" align="CENTER" height="400">
    
    <table width="500" border="0">
      <tr>
        <td width="300" align="center"><p>
          <a href="issueitems.php" class="links_color"><input type="image" name="issues" id="issues" width="100" height="100" src="images/box_upload_48.png" /></a>
        </p>
          <h4><a href="issueitems.php" class="links_color">Manage Issues</a></h4></p>&nbsp;</td>
        <td width="300" align="center"><a href="issueitemsT.php" class="links_color"><input type="image" name="returns" id="returns" width="100" height="100" src="images/box_download_48.png" /></a><h4><a href="issueitemsT.php" class="links_color">Manage Returns </a></h4> </p>&nbsp;</td>
      </tr>
      </table>
    




	   
    </td>
  </tr>
  <tr bgcolor="#FF6600">
    <td height="50" colspan="2" align="center" bgcolor="#CC6600" id="footer">Copyright &copy; 2013 Negombo South International School. All Rights Reserved</td>
  </tr>
</table>
</body>
</html>
<?php } else {
		header("Location:index.php?id=Please Enter Email and Password"); } ?>