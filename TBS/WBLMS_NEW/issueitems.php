<?php
session_start();

if($_SESSION['userid']!="" && $_SESSION['pass']!="" && ($_SESSION['cat']=="Librarian" || $_SESSION['cat']=="Library Assistant")){

//To create the database connectivity
include "include/dbconnection.php";
if(isset($_POST['search'])){
$libCardNo=$_POST['libCardNo'];
//strtoupper - to convert into upper case 
if(strtoupper($libCardNo[0])=="S"){
		$sqls="SELECT * FROM user as u, student as s WHERE s.User_ID=u.User_ID and s.Lib_Card_No='$libCardNo'";
		$results=mysqli_query($con,$sqls);
		$nos=mysqli_num_rows($results);
		if($nos!=0){
			$_SESSION['usertype']=$tbl="Student";
				$rows=mysqli_fetch_array($results);
				//To store the User ID in the session
				$_SESSION['uid']=$rows['User_ID'];
//To get last borrowd Item
$sqlB="SELECT * FROM borrow as b, item as i, copy as c, user as u, item_type as it WHERE b.Accession_No=c.Accession_No AND i.Item_ID=c.Item_ID AND b.User_ID=u.User_ID AND i.Item_Type_ID=it.Item_Type_ID AND u.User_ID='$_SESSION[uid]' ORDER BY `Borrow_ID` DESC LIMIT 0,10";
$resultB=mysqli_query($con,$sqlB);
$noB=mysqli_num_rows($resultB);				
		}else{
			$msg="No Student records";
			//To remove the previous User_ID in the session
			$_SESSION['uid']="";	
			$_SESSION['usertype']="";
			$tbl="";
		}
}elseif(strtoupper($libCardNo[0])=="T"){
		$sqlT="SELECT * FROM user as u, teacher as t WHERE t.User_ID=u.User_ID and t.Lib_Card_No='$libCardNo'";
		$resultT=mysqli_query($con,$sqlT);
		$nos=mysqli_num_rows($resultT);
		
		if($nos!=0){
			$_SESSION['usertype']=$tbl="Teacher";
			$rows=mysqli_fetch_array($resultT);
			//To store the User ID in the session
			$_SESSION['uid']=$rows['User_ID'];
			//To get last borrowd Item
$sqlB="SELECT * FROM borrow as b, item as i, copy as c, user as u, item_type as it WHERE b.Accession_No=c.Accession_No AND i.Item_ID=c.Item_ID AND b.User_ID=u.User_ID AND i.Item_Type_ID=it.Item_Type_ID AND u.User_ID='$_SESSION[uid]' ORDER BY `Borrow_ID` DESC LIMIT 0,10";
$resultB=mysqli_query($con,$sqlB);
$noB=mysqli_num_rows($resultB);
			
		}else{
			$msg="No Teacher records";	
			//To remove the previous User_ID in the session
			$_SESSION['uid']="";		
			$_SESSION['usertype']="";
			$tbl="";	
		}
		
		
		
}else{
	//Display the msg if a non existing libCardNo in the DB is entered. 
	$nos=0;
	$msg="Please type a correct Library Card Number";
}

}
/*To list student and teacher ID
$sql="SELECT User_ID FROM user WHERE User_Type_ID IN (4,5) ORDER BY User_ID";
$result=mysqli_query($con,$sql);
$sql1="SELECT User_ID FROM user WHERE User_Type_ID IN (4,5) ORDER BY User_ID";
$result1=mysqli_query($con,$sql1);
*/




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
      <br />
      <table width="673" border="0">
      <form name="issue" method="post" action="issueitems.php" onsubmit="return check()">
        <tr class="body_p">
          <td width="210" height="35">
          <td width="327">Library Card No 
           <input name="libCardNo" type="text" id="libCardNo" size="18"  required="required" /></td>
          <td width="180"><input name="search" type="submit" class="co" id="issue" value="Search" /></td>
        </tr></form>
        <tr>
          <td>&nbsp;</td>
          <td colspan="2">
            
          <?php
		  /*if(isset($_REQUEST['id'])){
			  echo $_REQUEST['id'];
		  }*/
		  
		   ?>&nbsp;</td>
        </tr>
      </table>
      <?php if(isset($_POST['search'])){ 
	  if($nos!=0){
	   //To get first name and last name	  
	  $_SESSION['fn']=$rows['First_Name'];
	  $_SESSION['ln']=$rows['Last_Name'];
	  }
	  ?>
      <br />
      
      <p class="co"><strong>User Details</strong></p>
      <?php if($nos!=0){ ?>
      <table width="485" border="0" align="center">
        <tr>
          <td width="183"><span class="body_p1"><strong>Library Card No</strong></span></td>
          <td width="185" class="alert1"><?php echo $rows['Lib_Card_No']; ?>&nbsp;</td>
          <td width="103" colspan="2" class="alert1">&nbsp;</td>
        </tr>
        <tr>
          <td><span class="body_p1"><strong>Name</strong></span></td>
          <td colspan="3" class="alert1"><?php echo $rows['First_Name']." ".$rows['Last_Name']; ?>&nbsp;</td>
        </tr>
        <tr>
          <td><span class="body_p1"><strong>User Type</strong></span></td>
          <td colspan="3" class="alert1"><?php echo $tbl; ?>&nbsp;</td>
        </tr>
        <tr>
          <td><span class="body_p1"><strong>Gender</strong></span></td>
          <td class="alert1"><?php echo $rows['Gender']; ?>&nbsp;</td>
          <td colspan="2" class="alert1">&nbsp;</td>
        </tr>
        <tr>
          <td><span class="body_p1"><strong>Status</strong></span></td>
          <td class="alert1"><?php echo $rows['Status']; ?>&nbsp;</td>
          <td colspan="2" class="alert1">&nbsp;</td>
        </tr>
        <tr>
          <td>&nbsp;</td>
          <td class="alert1">&nbsp;</td>
          <td colspan="2" class="alert1">&nbsp;</td>
        </tr>
      </table>
      
      <?php }else{ 
	  echo '<span class="alert">'.$msg."<span>";
       } ?>
      <br />
      <p class="co"><strong>Borrowing Records</strong></p>
      <?php if($nos!=0){ ?>
      <?php if($noB!=0){ ?>
      <table width="1000" border="0">
        <tr class="body_p">
          <td width="87">&nbsp;</td>
          <td width="160"><strong>Title</strong></td>
          <td width="135"><strong>Accession No</strong></td>
          <td width="117"><strong>Item Type</strong></td>
          <td width="152"><strong>Issued Date</strong></td>
          <td width="166"><strong>Return Date</strong></td>
          <td width="153"><strong>Return Status</strong></td>
        </tr>
        <?php while($rowB=mysqli_fetch_array($resultB)){
		?>
        <tr class="body_p">
          <td><img src="upload/<?php echo $rowB['Item_Image'];  ?>" width="50" height="auto" />&nbsp;</td>
          <td><?php echo $rowB['Title']; ?>&nbsp;</td>
          <td><?php echo $rowB['Accession_No']; ?>&nbsp;</td>
          <td><?php echo $rowB['Item_Type_Name']; ?>&nbsp;</td>
          <td><?php echo $rowB['Borrow_Date']; ?>&nbsp;</td>
          <td><?php echo $rowB['Return_Date']; ?>&nbsp;</td>
          <td><?php echo $rowB['Rstatus']; ?></td>
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
      <?php }else{
	  echo "<span class='alert'>No records</span>";
	  }
	  } ?>
      <br />
      <?PHP if($tbl!="Teacher"){?>
      <p class="co"><strong>Fine Records</strong></p>
      <?php if($nos!=0){ 
	  //To calculate fines and group by Actual_Return_Date and Fstatus is NO
	  $sqlpay="SELECT SUM(fine) as suma,Actual_Return_Date,Fstatus FROM fine WHERE User_ID='$_SESSION[uid]' AND Fstatus='NO' GROUP BY Actual_Return_Date HAVING SUM(fine)>0";
	  $resultpay=mysqli_query($con,$sqlpay);
	  $nopay=mysqli_num_rows($resultpay);
	  if($nopay!=0){
	  ?>
      <table width="567" border="0">
        <tr class="body_p">
          <td width="87">&nbsp;</td>
          <td width="123"><strong>Fine</strong></td>
          <td width="204"><strong>Actual Return Date</strong></td>
          <td width="128"><strong> Fine Status</strong></td>
        </tr>
        <?php while($rowpay=mysqli_fetch_array($resultpay)){
		?>
        <tr>
          <td>&nbsp;</td>
          <td><?php echo $rowpay['suma']; ?>&nbsp;</td>
          <td><?php echo $rowpay['Actual_Return_Date']; ?>&nbsp;</td>
          <td class="body_p"><?php echo $rowpay['Fstatus']; ?></td>
        </tr>
        <?php } ?>
        <tr>
          <td>&nbsp;</td>
          <td>&nbsp;</td>
          <td>&nbsp;</td>
          <td>&nbsp;</td>
        </tr>
      </table>
       <?php }else{
	  echo "<span class='alert'>No records</span>";
	  }?>
      <?php  } } ?>
      
      <p>&nbsp;</p>
      <p>
      <?php if($nos!=0){
		  if($rows['Status']=='Active'){
			 
			// COUNT is an aggregated function to count the number of borrowed items those are not returned  
			$sqlBrItems="SELECT COUNT(*) as noBItems FROM borrow WHERE User_ID='$_SESSION[uid]' AND RStatus='No'";
			$resultBrItems=mysqli_query($con,$sqlBrItems);  
			 $rowBrItems=mysqli_fetch_array($resultBrItems); 
			 $noBrItems=$rowBrItems['noBItems'];
			 if($tbl=="Student"){
				 $remains=4-$noBrItems;
			 }
			  if($tbl=="Teacher"){
				 $remains=6-$noBrItems;
			 }
			if($remains>0){ //To check borrowed items and returned items to process further. If remains items>0 can go to the next page
			  
		   ?>
        <a href="issueItemsProcess.php?id=<?php echo $libCardNo; ?>"><input name="Next" type="submit" class="co" id="Next" value="Next" />
        <?php }else {
			echo "<span class='alert'>Cannot borrow any items</span>";
			}
			 }}?></a>
      </p>
    <p>&nbsp;</p>
    <?php } ?>
    <br />
    <br />
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