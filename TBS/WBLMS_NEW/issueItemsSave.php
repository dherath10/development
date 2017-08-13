<?php
session_start();

if($_SESSION['userid']!="" && $_SESSION['pass']!="" && ($_SESSION['cat']=="Librarian" || $_SESSION['cat']=="Library Assistant")){


$libCardNo=$_SESSION['libCardNo1'];
$uid=$_SESSION['uid'];
$libSesID=$_SESSION['libSesID'];
//To create the database connectivity
include "include/dbconnection.php";
//To get user Information
$sqluserIn="SELECT * FROM user WHERE User_ID='$uid'";
$resultuserIn=mysqli_query($con,$sqluserIn);
$rowuserIn=mysqli_fetch_array($resultuserIn);
$uname=$rowuserIn['First_Name'];



//To get the number of selected items from the Currnt_Borrow table according to the Library Session ID
$sqlItem="SELECT count(*) as noItem FROM current_borrow WHERE Lib_Ses_ID='$libSesID'"; 
$resultItem=mysqli_query($con,$sqlItem);
$rowItem=mysqli_fetch_array($resultItem);
$noItem=$rowItem['noItem']; //Number of Selected items in the current_borrow table
// COUNT is an aggregated function to count the number of borrowed items those are not returned  
$sqlBrItems="SELECT COUNT(*) as noBItems FROM borrow WHERE User_ID='$uid' AND RStatus='No'";$resultBrItems=mysqli_query($con,$sqlBrItems);  
$rowBrItems=mysqli_fetch_array($resultBrItems); 
$noBrItems=$rowBrItems['noBItems'];

//Identify the remaining items user can borrow defined from the borrow table and default number
if($_SESSION['usertype']=="Student"){
	$remains=4-$noBrItems; 
	}
if($_SESSION['usertype']=="Teacher"){
    $remains=6-$noBrItems;
	}


if(isset($_POST['search'])){
	$accessionNo=$_POST['accessionNo'];
	//To display the details related with the accession no. when Search button is clicked
	$sqlAcc="SELECT * FROM item as i, copy as c, item_type as it, state as s WHERE i.Item_ID=c.Item_ID AND i.Item_Type_ID=it.Item_Type_ID AND c.State_ID=s.State_ID AND c.Accession_No='$accessionNo'";
	$resultAcc=mysqli_query($con,$sqlAcc);
	$rowAcc=mysqli_fetch_array($resultAcc);
	$iID=$rowAcc['Item_ID']; //To get the Item_ID
	$Title=$rowAcc['Title'];
	$Accession_No=$rowAcc['Accession_No'];
	$noAcc=mysqli_num_rows($resultAcc); // To check whther the mentioned Accession number existing in tne db
	
	//To identify Duplicate Item IDs
	$sqlItemID="SELECT * FROM current_borrow WHERE Item_ID='$iID' AND lib_Ses_ID='$libSesID'";
	$resultItemID=mysqli_query($con,$sqlItemID);
	$noItemID=mysqli_num_rows($resultItemID);
	
	
	if($noItemID!=0){
		//To identify Duplicate Accession Nos
	$sqlAccNo="SELECT * FROM current_borrow WHERE Accession_No='$accessionNo' AND lib_Ses_ID='$libSesID'";
	$resultAccNo=mysqli_query($con,$sqlAccNo);
	$noAccNo=mysqli_num_rows($resultAccNo);
		if($noAccNo!=0){
			$msg="This copy ($Accession_No) is already confirmed";
			$status=0;
		}else{
			$msg1="($uname) has already borrowed a copy of($Title). Do you want to issue another copy? ";	
	}
	}
}

if(isset($_POST['Confirm'])){ //when Confirm button is clicked
$accessionNo=$_REQUEST['accNo'];

//To get details related to the Accession No
	$sqlAcc="SELECT * FROM item as i, copy as c, item_type as it WHERE i.Item_ID=c.ITem_ID AND i.Item_Type_ID=it.Item_Type_ID AND c.Accession_No='$accessionNo'";
	$resultAcc=mysqli_query($con,$sqlAcc);
	$rowAcc=mysqli_fetch_array($resultAcc);
	$Item_ID=$rowAcc['Item_ID'];
	$Title=$rowAcc['Title'];
	$Item_Image=$rowAcc['Item_Image'];
	$Accession_No=$rowAcc['Accession_No'];
	$Item_Type_Name=$rowAcc['Item_Type_Name'];
	$Call_No=$rowAcc['Call_No'];
	$BStatus="No";
	$libSesID=$_SESSION['libSesID'];
	
	
	// Default number of items that the students and teachers can borrow	
	if($_SESSION['usertype']=="Student"){
	$noi=4;	
	}elseif($_SESSION['usertype']=="Teacher"){
	$noi=6;	
	}
	// To check the remaining number of items that a user can borrow
	if($noItem>=$remains){
		$msg="No of items that the borrower can select are exceeded";	
	}else{
	// To get the Time ID to insert in the current_borrow table to identify the borrowed sequence
	$Time_ID=time();
	//To add borrow item info into Current_Borrow table
	$sqlCBorrow="INSERT INTO current_borrow VALUES('$libSesID','$Item_ID','$uid','$Title','$Item_Image','$Accession_No','$Item_Type_Name','$Call_No','$BStatus','$Time_ID')";
	

	if(mysqli_query($con,$sqlCBorrow)){
		// After adding records to current_borrow table and to display the borrowing list(related to paticular SessionID)
			$msg=" ";
			
			//To get the number of selected items from the Currnt_Borrow table according to the Library Session ID
			$sqlItem1="SELECT count(*) as noItem1 FROM current_borrow WHERE Lib_Ses_ID='$libSesID'"; 
			$resultItem1=mysqli_query($con,$sqlItem1);
			$rowItem1=mysqli_fetch_array($resultItem1);
			$noItem=$rowItem1['noItem1'];
	}else{
		$msg="This copy ($Accession_No) is already confirmed";
	}
	}
}

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
      
      <table width="673" border="0">
      <form name="issue" method="post" action="issueitemsSave.php" onsubmit="return check()">
        <tr class="body_p">
          <td width="210" height="35">
          <td width="327">Accession No 
            <input name="accessionNo" type="text" id="accessionNo" size="18"  required="required"  /></td>
          <td width="180"><input name="search" type="submit" class="co" id="issue" value="Search" /></td>
        </tr></form>
        <tr>
          <td colspan="3" align="center" class="alert">
            
          <?php
		  //if(isset($_REQUEST['id'])){ 
			//  echo $_REQUEST['id'];
		  //}
		  

		   ?>&nbsp;</td>
        </tr>
      </table>
      <p align="right" class="body_p"><img src="images/book_icon.png" width="30" height="30"  />Item List (<?php echo $noItem; ?>) Out of <?php echo $remains; ?> <a href="issueItemsIssue.php"> (Check Out) </a><strong><?php echo $_SESSION['fn']." ".$_SESSION['ln']." (".$_SESSION['libCardNo1'].")";?></strong> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</p>
  <p align="left">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
    <a href="issueitems.php"><input name="back" type="submit" class="co" id="back" value="Back" /></a>
  </p>   
	 <?php if(isset($_POST['search'])){ // When the Search button clicked ?>
     <?php if($noAcc!=0){ ?>
      <p class="co"><strong>Item Details</strong></p>
      <table width="1018" border="0">
        <tr class="body_p">
          <td width="87">&nbsp;</td>
          <td width="257"><strong>Title</strong></td>
          <td width="142"><strong>Accession No</strong></td>
          <td width="129"><strong>Item Type</strong></td>
          <td width="109"><strong>State</strong></td>
          <td width="127"><strong>Call No</strong></td>
          <td width="137"><strong>Availability</strong></td>
        </tr>
        <?php 
		?>
        <tr class="body_p">
          <td><img src="upload/<?php echo $rowAcc['Item_Image'];  ?>" width="50" height="auto" />&nbsp;</td>
          <td><?php echo $rowAcc['Title']; ?>&nbsp;</td>
          <td><?php echo $rowAcc['Accession_No']; ?>&nbsp;</td>
          <td><?php echo $rowAcc['Item_Type_Name']; ?>&nbsp;</td>
          <td><?php echo $rowAcc['PR/Lending']; ?>&nbsp;</td>
          <td><?php echo $rowAcc['Call_No']; ?>&nbsp;</td>
          <td><?php echo $rowAcc['Availability']; ?></td>
        </tr>
        <?php  ?>
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
      <p class="alert">
      <?php if($rowAcc['Availability']=="Available" && $rowAcc['PR/Lending']=="Lending" && !isset($status)){ // To check the availability of the items to Confirm
	  
	  		  
		  // To display the msg regarding to the Same Item ID
		  if(isset($msg1)){
			  echo $msg1;
		  }
	  ?></p>
   <form method="post" action="issueItemsSave.php?accNo=<?php echo $accessionNo; ?>">  
      <input name="Confirm" type="submit" class="co" id="Confirm" value=" Confirm " />&nbsp;&nbsp;&nbsp;</form>
  <?php } elseif($rowAcc['Availability']=="Reserved"){
  
  //If it is already reserved
  $sqlRes="SELECT * FROM reservation WHERE User_ID='$uid' AND Accession_No='$accessionNo'"; 
			$resultRes=mysqli_query($con,$sqlRes);
			//$rowItem1=mysqli_fetch_array($resultItem1);
			$noRes=mysqli_num_rows($resultRes);
			if($noRes!=0){
				echo "User has already reserved this copy. Do you want to issue?";
				?>
                 <form method="post" action="issueItemsSave.php?accNo=<?php echo $accessionNo; ?>">  
      <input name="Confirm" type="submit" class="co" id="Confirm" value=" Confirm " />&nbsp;&nbsp;&nbsp;</form>
                <?php
				
			}
  
  
  }
  // To display the msg regarding to the Same Accession No
		   if(isset($msg)){
			  echo $msg;
		  }
  
  }else{
  	echo "<span class='alert'>Invalid Accession No</span>";
  }
   } 
   if(isset($_POST['Confirm']) || isset($_REQUEST['did'])){ // When the Confirm button clicked or 'did' is coming from issuItemsDelete.php
   
   $sqlCrb="SELECT * FROM current_borrow WHERE lib_Ses_ID='$libSesID' ORDER BY Time_ID DESC";
$resultCrb=mysqli_query($con,$sqlCrb);
   
   ?>
	<p class="co"><strong>Current Borrowing Details</strong></p>
      <table width="1040" border="0">
        <tr class="body_p">
          <td width="141">&nbsp;</td>
          <td width="386"><strong>Title</strong></td>
          <td width="164"><strong>Accession No</strong></td>
          <td width="154"><strong>Item Type</strong></td>
          <td width="118"><strong>Call No</strong></td>
          <td width="51">&nbsp;</td>
        </tr>
        <?php while($rowCrb=mysqli_fetch_array($resultCrb)){ ?>
        <tr>
          <td><img src="upload/<?php echo $rowCrb['Image'];  ?>" width="50" height="auto" /></td>
          <td><?php echo $rowCrb['Title']; ?>&nbsp;</td>
          <td><?php echo $rowCrb['Accession_No']; ?>&nbsp;</td>
          <td><?php echo $rowCrb['Item_Type_Name']; ?>&nbsp;</td>
          <td><?php echo $rowCrb['Call_No']; ?></td>
          <td><a href="issueItemsDelete.php?id=<?php echo $rowCrb['Accession_No']; ?>" onclick="return checkDel()"><img src="images/delete_action.png" width="25" height="23" /></a></td>
        </tr>
        <?php } ?>
        <tr>
          <td>&nbsp;</td>
          <td>&nbsp;</td>
          <td>&nbsp;</td>
          <td>&nbsp;</td>
          <td>&nbsp;</td>
          <td>&nbsp;</td>
        </tr>
      </table>
      <p>
        <a href="issueItemsSave.php"><input name="continue" type="submit" class="co" id="continue" value="Continue" /></a> &nbsp;&nbsp;&nbsp;
        <a href="issueItemsIssue.php"><input name="checkout" type="submit" class="co" id="checkout" value="Checkout" /></a>
      </p>
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
<?php } else {
		header("Location:index.php?id=Please Enter Email and Password"); } ?>