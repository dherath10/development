<?php
ob_start();
session_start();
$cdate=date("Y-m-d");//Current date
$fid=$_SESSION['fid'];
//To create the database connectivity
include "include/dbconnection.php";

//To group user ID
$sqlg="SELECT User_ID FROM fine WHERE Fine_ID='$fid' GROUP BY (User_ID)";
$resultg=mysqli_query($con,$sqlg);
//$no=mysqli_num_rows($result3);

//To lists student 
$sql3="SELECT * FROM fine WHERE Fine_ID='$fid'";
$result3=mysqli_query($con,$sql3);
$no=mysqli_num_rows($result3);
//To lists student and teachers ID
$sql="SELECT User_ID FROM user WHERE User_Type_ID IN (4,5)";
$result=mysqli_query($con,$sql);
$sql1="SELECT User_ID FROM user WHERE User_Type_ID IN (4,5)";
$result1=mysqli_query($con,$sql1);

//To get Sumation of fine
$sqlf="SELECT SUM(Fine) AS Fi FROM fine WHERE Fine_ID='$fid'";
$resultf=mysqli_query($con,$sqlf);
$ref=mysqli_fetch_array($resultf);

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
<script>
function openn(a){
window.open("printReceipt.php?id=a","","width=800,height=650,scrollbars=no, resizable=no,dependant=yes,dialog=yes,modal=yes, unadorned=yes,outerWidth=800,outerHeight=650 ,innerWidth=800,outerHeight=650,status=no");
}
</script>
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
function payFine(){
var x=confirm("Are you sure you want to Pay Fines?");
if (x){
	return true;
	}
	else
	{
		return false;
	}
}
</script>
<link href="mystyle.css" rel="stylesheet" type="text/css" />
<link href="mystyleNew.css" rel="stylesheet" type="text/css" />
</head>

<body>
<table width="1183" border="0" align="center">
  <tr>
    <td height="187" colspan="2"><a href="index.php"><img src="images/website banner.jpg" width="1183" height="185" /></a></td>
  </tr>
  <tr align="center" bgcolor="#B6AD89" class="in">
    <td width="863" align="right" valign="top">
    <h4 class="links_color"><em>&nbsp;&nbsp;&nbsp;&nbsp;<?php if($_SESSION['cat']=="Admin"){?><a href="adminpanel.php" class="links_color">Home</a><?php } if($_SESSION['cat']=="Librarian"){?><a href="librarianaccount.php" class="links_color">Home</a></em> | <em><a href="user management.php" class="links_color">User Management</a></em> | <em><a href="library item management.php" class="links_color">Library Item Management</a></em> | <em><a href="issue_return_items.php" class="links_color">Issue/Return Items</a></em> | <em><a href="reports.php" class="links_color">Reports</a></em> | <em><a href="online_catalog_search.php" class="links_color">Online Catalog</a></em></h4></td>
    <td width="320" align="right" valign="middle"><h4 class="links_color">
      <?php  } ?>
    </h4>
    <span class="in1">Welcome <?php echo $_SESSION['fname']."-".$_SESSION['cat']; ?> | <a href="signout.php"> Logout </a></span></td>
  </tr>
  <tr bgcolor="#EAE5CE">
    <td colspan="2" align="left"><blockquote>
      <p class="body_p">&nbsp;</p>
      <blockquote>
        <blockquote>
          <blockquote>
            <h3 class="body_p"><strong>Manage Returns</strong></h3>
          </blockquote>
        </blockquote>
      </blockquote>
<table width="857" border="0" align="center">
  <form method="post" name="return" action="returnitems.php?fid=1">
    <tr>
      <td width="356" align="right" class="body_p">Accession No 
        
        <input name="accession_no" type="text" id="accession_no" size="20" /></td>
      <td colspan="2" align="center"><input name="view_details" type="submit" class="co" id="view_details" value="View Details" /></td>
      </tr>
    </form>
  <tr>
    <td class="body_p">&nbsp;</td>
    <td width="197">&nbsp;</td>
    <td width="290">&nbsp;</td>
    </tr>
  <tr>
    <td colspan="3" align="center" class="alert">
      <h3>
        <?php if($no==0){ ?>
        
        No Borrowed Items and Fine
        
        
        <?php } else { ?>
        </h3>
           <?php while($rowg=mysqli_fetch_array($resultg)){ ?>
      <table width="705" border="0" class="body_p">
        <tr>
          <td width="139" class="body_p">Borrow ID</td>
          <td width="135" class="body_p">Fine</td>
          <td width="162" class="body_p">Actual Return Date</td>
          <td width="111" class="body_p">User ID </td>
          <td width="136" class="body_p">Fine Status</td>
          </tr>
        <?php 
		//To get details User by User
		$sqlg1="SELECT * FROM fine WHERE Fine_ID='$fid' AND User_ID='$rowg[User_ID]'";
		$resultg1=mysqli_query($con,$sqlg1);
		//To calculate Sub Fine Total
		$sqlsubFine="SELECT SUM(Fine) as subFine FROM fine WHERE Fine_ID='$fid' AND User_ID='$rowg[User_ID]'";
		$resultsubFine=mysqli_query($con,$sqlsubFine);
		$rowsubFine=mysqli_fetch_array($resultsubFine);
		while($rowg1=mysqli_fetch_array($resultg1)){ ?>
        <tr>
          <td class="alert1"><?php echo $rowg1['Borrow_ID'];?>&nbsp;</td>
          <td class="alert1"><?php echo $rowg1['Fine'];?>&nbsp;</td>
          <td class="alert1"><?php echo $rowg1['Actual_Return_Date']?>&nbsp;</td>
          <td class="alert1"><?php 
		$sql4="SELECT * FROM borrow WHERE Borrow_ID='$rowg1[Borrow_ID]'";
		$result4=mysqli_query($con,$sql4);
		$row4=mysqli_fetch_array($result4);
		echo $row4['User_ID']; ?>&nbsp;</td>
          <td class="alert1"><?php echo $rowg1['Fstatus']; ?>&nbsp;</td>
          </tr>
        <tr>
          <td>&nbsp;</td>
          <td>&nbsp;</td>
          <td>&nbsp;</td>
          <td>&nbsp;</td>
          <td>&nbsp;</td>
        </tr>
  
        <?php } ?>
        </table>
      <table width="705" border="0" class="body_p">
        
        
        <tr>
          <td width="141"><strong>Sub Total</strong></td>
          <td width="223" class="body_p"><?php echo $rowsubFine['subFine']; ?>&nbsp;</td>
          <td width="105">&nbsp;</td>
          <td width="105">&nbsp;</td>
          <td width="109"><label>
           <input name="print" type="submit" class="co" id="print" value="Print &amp; Pay" onclick='window.open("printReceipt.php?id=<?php echo $rowg['User_ID']; ?>","","width=800,height=650,scrollbars=no, resizable=no,dependant=yes,dialog=yes,modal=yes, unadorned=yes,outerWidth=800,outerHeight=650 ,innerWidth=800,outerHeight=650,status=no");' />
          </label></td>
          </tr>
        <tr>
          <td>&nbsp;</td>
          <td class="body_p">&nbsp;</td>
          <td>&nbsp;</td>
          <td>&nbsp;</td>
          <td>&nbsp;</td>
        </tr>
        </table>
        <hr />
        <?php } ?>
      <p>    <table width="705" border="0" class="body_p">
        
        
        <tr>
          <td width="141"><strong>Total</strong></td>
          <td width="223" class="body_p"><?php echo $ref['Fi']; ?>&nbsp;</td>
          <td width="105">&nbsp;</td>
          <td width="105">&nbsp;</td>
          <td width="109">&nbsp;</td>
          </tr>
        
        </table></p>
      <?php } ?>      </td>
    </tr>
  <tr>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>
     <a href="issueitemsT.php"><input name="back" type="submit" class="co" id="Back" value=" Back " /></a>&nbsp;&nbsp;
    <?php if($ref['Fi']>0){ ?>
    
    <a href="payingfineprocess.php?pay=<?php echo $ref['Fi']; ?>" onclick="return payFine()"><input name="paid" type="submit" class="co" id="paid" value=" Pay" />
    </a>
    <?php } ?>
    
    </td>
    </tr>
</table>
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