<?php
session_start();
if($_SESSION['userid']!="" && $_SESSION['pass']!="" && ($_SESSION['cat']=="Librarian" || $_SESSION['cat']=="Library Assistant")){

$libCardNo=$_SESSION['libCardNo1'];
$uid=$_SESSION['uid'];
$libSesID=$_SESSION['libSesID'];

//To create the database connectivity
include "include/dbconnection.php";
$curDate=date("Y-m-d"); //Current date
$curDateID=strtotime($curDate);//Current date time ID
$twoWeeksID=$curDateID+(60*60*24*14); // To get the Time ID after 14 days
$twoWeeksDate=date("Y-m-d",$twoWeeksID); // To convert that Time ID into Y-m-d format


if(isset($_REQUEST['id'])){
$sqlBList="SELECT * FROM current_borrow WHERE Lib_Ses_ID='$libSesID' AND U_ID='$uid' ORDER BY Time_ID DESC";
$resultBList=mysqli_query($con,$sqlBList);
while($rowBList=mysqli_fetch_array($resultBList)){ //To add borrow items to the borrow table using while loop
$curDate=date("Y-m-d"); //Current date
$curDateID=strtotime($curDate);//Current date time ID
$twoWeeksID=$curDateID+(60*60*24*14); // To get the Time ID after 14 days
$twoWeeksDate=date("Y-m-d",$twoWeeksID); // To convert that Time ID into Y-m-d format

//To insert records one by one to the borrow table
$sqlBInsert="INSERT INTO borrow VALUES('', '$rowBList[Accession_No]', '$uid', '$curDate', '$twoWeeksDate', '', 'No','')";
mysqli_query($con, $sqlBInsert) or die(mysqli_error($con));

// To update the copy table because of borrowing
$sqlCopyUpdate="UPDATE copy SET Availability='Borrowed' WHERE Accession_No='$rowBList[Accession_No]'";
mysqli_query($con,$sqlCopyUpdate);

// To update the reservation table because of borrowing
$sqlResUpdate="UPDATE reservation SET Fulfilled='Borrowed',Notification_Date='$cDate' WHERE Accession_No='$rowBList[Accession_No]' AND User_ID='$uid'";
mysqli_query($con,$sqlResUpdate);

// To Delete the borrowed items from the current_borrow table after issue confirmation
$sqlDelBList="DELETE FROM current_borrow WHERE Lib_Ses_ID='$libSesID'";
mysqli_query($con, $sqlDelBList);

header("Location:issueitems.php"); //To redirect to the Item Issue table
	
}
	
}

$sqlItem="SELECT count(*) as noItem FROM current_borrow WHERE Lib_Ses_ID='$libSesID' AND U_ID='$uid'";
$resultItem=mysqli_query($con,$sqlItem);
$rowItem=mysqli_fetch_array($resultItem);
$noItem=$rowItem['noItem'];
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Issue Items</title>
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
<script type="text/javascript">

// Javascript code for Issue confirmation
function confirmIssue(){
var x=confirm("Are you sure you want to Issue Item(s)?");
if (x){
	return true;
	}
	else
	{
		return false;
	}
}

	function checkDel(){
		var r=confirm("Are you sure you want to delete?");
		if (r==true){
			return true;
		}else{
			return false;
		}
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
    <td width="882" align="left" valign="top">
    <blockquote>
    <h3 class="links_color"><em><?php if($_SESSION['cat']=="Librarian"){?><a href="librarianaccount.php" class="links_color">Home</a><?php } if($_SESSION['cat']=="Library Assistant"){?><a href="libraryassistant.php" class="links_color">Home</a><?php  } ?></em> | <em><?php if($_SESSION['cat']=="Librarian") { ?><a href="user management.php" class="links_color">User Management</a><?php } if($_SESSION['cat']=="Library Assistant"){ ?><a href="user management2.php" class="links_color">User Management</a><?php } ?></em> | <em><a href="library item management.php" class="links_color">Library Item Management</a></em> | <em><a href="issue_return_items.php" class="links_color">Issue/Return Items</a></em> | <em><a href="reports.php" class="links_color">Reports</a></em> | <em><a href="online_catalog_search.php" class="links_color">Online Catalog</a></em></h3>  
    </blockquote>
    </td>
    <td width="301" align="right" valign="top" class="in1">
    <span>Welcome <?php echo $_SESSION['fname']."-".$_SESSION['cat']; ?> | <a href="signout.php"> Logout</a></span></td>
  </tr>
  <tr bgcolor="#EAE5CE">
    <td colspan="2" align="center">
      <p>&nbsp;</p>
      <h3 class="body_p">Manage Issues</h3>
      
      <p align="right" class="body_p"><img src="images/book_icon.png" width="30" height="30" />Item List (<?php echo $noItem; ?>) out of <a href="issueItemsIssue.php">(Check Out)</a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<strong><?php echo $_SESSION['fn']." ".$_SESSION['ln']." (".$_SESSION['libCardNo1'].")";?></strong> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</p>
     <p align="left">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
    <a href="issueitems.php"><input name="back" type="submit" class="co" id="back" value="Back" /></a>
  </p>

  
  <?php  
   $sql="SELECT * FROM current_borrow WHERE Lib_Ses_ID='$libSesID' AND U_ID='$uid' ORDER BY Time_ID DESC";
   $result=mysqli_query($con,$sql);
   $n=mysqli_num_rows($result);
   ?>
	<p class="co"><strong>Current Borrowing Details</strong></p>
    <?php if($n!=0){ ?>
      <table width="1119" border="0">
        <tr class="body_p">
          <td width="136">&nbsp;</td>
          <td width="425"><strong>Title</strong></td>
          <td width="139"><strong>Accession No</strong></td>
          <td width="116"><strong>Item Type</strong></td>
          <td width="113"><strong>Call No</strong></td>
          <td width="113"><strong>Return Date</strong></td>
          <td width="47">&nbsp;</td>
        </tr>
        <?php while($row=mysqli_fetch_array($result)){ ?>
        <tr>
          <td><img src="upload/<?php echo $row['Image'];  ?>" width="50" height="auto" /></td>
          <td><?php echo $row['Title']; ?>&nbsp;</td>
          <td><?php echo $row['Accession_No']; ?>&nbsp;</td>
          <td><?php echo $row['Item_Type_Name']; ?>&nbsp;</td>
          <td><?php echo $row['Call_No']; ?></td>
          <td><?php echo $twoWeeksDate; ?>&nbsp;</td>
          <td><a href="issueItemsDelete.php?id=<?php echo $row['Accession_No']; ?>&id1=1" onclick="return checkDel()"><img src="images/delete_action.png" width="16" height="16" /></a></td>
        </tr>
        <?php } ?>
        <tr>
          <td>&nbsp;</td>
          <td>&nbsp;</td>
          <td>&nbsp;</td>
          <td>&nbsp;</td>
          <td>&nbsp;</td>
          <td>&nbsp;</td>
          <td>&nbsp;</td>
        </tr>
      </table>
      
      <p><a href="issueItemsSave.php"> <input name="Continue" type="button" class="co" value=" Continue " /></a>&nbsp;&nbsp;&nbsp;<a href="issueItemsIssue.php?id=Yes" onclick="return confirmIssue()"> <input name="issue" type="button" class="co" value=" Issue " /></a></p>
      
      <?php }else{ ?>
      <p class="alert" align="center">No records</p>
      <?php } ?>
      



    <p>&nbsp;</p>
    </td>
  </tr>
  <tr bgcolor="#FF6600">
    <td height="50" colspan="2" align="center" bgcolor="#CC6600" id="footer">Copyright &copy; 2013 Negombo South International School. All Rights Reserved</td>
  </tr>
</table>
</body>
</html>
<?php 
} else {
		header("Location:index.php?id=Please Enter Email and Password"); 
		} ?>