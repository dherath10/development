<?php
ob_start();
session_start();
$cdate=date("Y-m-d");//Current date
if(isset($_REQUEST['fid'])){
if($_REQUEST['fid']==0){
		$fid=time();
		$_SESSION['fid']=$fid;
	
}
}
//To create the database connectivity
include "include/dbconnection.php";
//Check the Accession no 
if($_POST['accession_no']!=""){
	$accession_no=$_POST['accession_no'];
	$sql2="SELECT * FROM borrow as b,copy as c,item as i WHERE b.Accession_No=c.Accession_No AND c.Item_ID= i.Item_ID AND b.Accession_No='$accession_no' AND b.Rstatus='No'";
	$result2=mysqli_query($con,$sql2);
	$no=mysqli_num_rows($result2);
		
}else{
	$msg="Please Select Accession No";
		header("Location:issueitemsT.php?id1=$msg");
	
	
}

?>
<?php

//To create the database connectivity
include "include/dbconnection.php";
//To lists student and teachers ID
$sql="SELECT User_ID FROM user WHERE User_Type_ID IN (4,5)";
$result=mysqli_query($con,$sql);
$sql1="SELECT User_ID FROM user WHERE User_Type_ID IN (4,5)";
$result1=mysqli_query($con,$sql1);

?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Issue/ Return Items</title>
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
}
.links_color {	color: #CC6600;
	font-size: 17px;
}
body {
	background-image: url();
}
</style>
<script type="text/javascript">
function check(){
 if(document.return1.accession_no.value==""){
			alert("Please Enter Accession No");
			document.retun1.accession_no.focus();
			return false;
		
	}else if(isNaN(document.retun1.accession_no.value)){
			alert("Please Enter a Valid Accession No");
			document.retun1.accession_no.focus();
			document.retun1.accession_no.select();
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
  <tr align="center" bgcolor="#B6AD89" class="in">
    <td width="869" align="right" valign="middle">
    <h4 class="links_color"><em><?php if($_SESSION['cat']=="Library Assistant"){?><a href="libraryassistant.php" class="links_color">Home</a><?php } if($_SESSION['cat']=="Librarian"){?><a href="librarianaccount.php" class="links_color">Home</a></em> | <em><a href="user management.php" class="links_color">User Management</a></em> | <em><a href="library item management.php" class="links_color">Library Item Management</a></em> | <em><a href="issue_return_items.php" class="links_color">Issue/Return Items</a></em> | <em><a href="reports.php" class="links_color">Reports</a></em> | <em><a href="online_catalog_search.php" class="links_color">Online Catalog</a></em><?php  } ?></h4>
    </blockquote></td>
    <td width="314" align="right" valign="middle">
    <span class="in1">Welcome <?php echo $_SESSION['fname']."-".$_SESSION['cat']; ?> | <a href="signout.php"> Logout</a></span></td>
  </tr>
  <tr bgcolor="#EAE5CE">
    <td colspan="2" align="center"><blockquote>
      <h3 class="body_p">&nbsp;</h3>
      <h3 class="body_p"><strong>Manage Returns</strong></h3>
<table width="942" border="0" align="center">
  <form method="post" name="return1" action="returnitems.php">
  <tr>
    <td width="208" class="body_p">&nbsp;</td>
    <td width="299" class="body_p">Accession No
      <input name="accession_no" type="text" id="accession_no" size="20" /></td>
    <td colspan="2"><input name="view_details" type="submit" class="co" id="view_details" value="View Details" /></td>
    </tr>
  </form>
  <tr>
    <td colspan="2" class="body_p">&nbsp;</td>
    <td width="41">&nbsp;</td>
    <td width="332">&nbsp;</td>
  </tr>
  <tr>
    <td colspan="4" align="center" class="alert">
    <h3>
      <?php if($no==0){ ?>
      
      No Borrowed Items     
      <?php } else { ?>
    </h3>
    <table width="925" border="0">
     <tr>
        <td width="119" height="32" class="body_p"><h3><strong>Accession No</strong></h3></td>
        <td width="316" class="body_p"><h3><strong>Title</strong></h3></td>
        <td width="146" class="body_p"><h3><strong>Borrowed Date</strong></h3></td>
        <td width="138" class="body_p"><h3><strong>Return Date</strong></h3></td>
        <td width="92" class="body_p"><h3><strong>User ID</strong></h3></td>
        <td width="88"><h3>&nbsp;</h3></td>
      </tr>
      <?php while($row2=mysqli_fetch_array($result2)){ ?>
      <tr class="body_p">
        <td><?php echo $row2['Accession_No']; ?>&nbsp;</td>
        <td><?php echo $row2['Title']; ?>&nbsp;</td>
        <td><?php echo $row2['Borrow_Date']; ?>&nbsp;</td>
        <td><?php echo $row2['Return_Date']; ?>&nbsp;</td>
        <td><?php echo $row2['User_ID']; ?>&nbsp;</td>
        <td><a href="returnitemsdate.php?bid=<?php echo $row2['Borrow_ID']; ?>&itid=<?php echo $row2['Item_Type_ID']; ?>"><input name="returned" type="button" class="co" id="returned" value="Returned" /></a></td>
      </tr>
      <?php } ?>
  </table>
    <?php } ?>    </td>
  </tr>
  <tr>
    <td colspan="4" align="center" class="alert">&nbsp;</td>
  </tr>
  <tr>
    <td colspan="4" align="center">&nbsp;</td>
    </tr>
</table>
<p>&nbsp;</p>
</blockquote></td>
  </tr>
  <tr bgcolor="#FF6600">
    <td height="50" colspan="2" align="center" bgcolor="#CC6600" id="footer">Copyright &copy; 2013 Negombo South International School. All Rights Reserved</td>
  </tr>
</table>
</body>
</html>