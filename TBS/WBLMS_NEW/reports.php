<?php
session_start();

//To restrict other users from accessing this page without logging in
if($_SESSION['userid']!="" && $_SESSION['pass']!="" && ($_SESSION['cat']=="Librarian" || $_SESSION['cat']=="Library Assistant")){

if(isset($_POST['view'])){
	$rtype=$_POST['reportType'];
	$from=$_POST['from'];
	$to=$_POST['to'];
//To connect database
include "include/dbconnection.php";

//Query for Borrow
if($rtype=="borrow"){
$sql="SELECT * FROM borrow as b,copy as c, item as i, user as u WHERE b.Borrow_Date BETWEEN '$from' AND '$to' AND b.Accession_No=c.Accession_No AND c.Item_ID=i.Item_ID AND u.User_ID=b.User_ID";
$result=mysqli_query($con,$sql);
}
//Query for Return
if($rtype=="return"){
$sql="SELECT * FROM borrow as b,copy as c, item as i, user as u WHERE b.Actual_Return_Date BETWEEN '$from' AND '$to' AND b.Accession_No=c.Accession_No AND c.Item_ID=i.Item_ID AND u.User_ID=b.User_ID";
$result=mysqli_query($con,$sql);

}	
//Query for Fine
if($rtype=="fine"){
$sql="SELECT * FROM borrow as b,copy as c, item as i, user as u, Fine as f WHERE f.Actual_Return_Date BETWEEN '$from' AND '$to' AND f.Borrow_ID=b.Borrow_ID AND b.Accession_No=c.Accession_No AND c.Item_ID=i.Item_ID AND u.User_ID=b.User_ID AND b.Rstatus='Yes' AND f.Fine NOT IN (0)";
$result=mysqli_query($con,$sql);
$sql1="SELECT SUM(Fine) as Fi FROM borrow as b,copy as c, item as i, user as u, Fine as f WHERE f.Actual_Return_Date BETWEEN '$from' AND '$to' AND f.Borrow_ID=b.Borrow_ID AND b.Accession_No=c.Accession_No AND c.Item_ID=i.Item_ID AND u.User_ID=b.User_ID AND b.Rstatus='Yes' AND f.Fine NOT IN (0)";
$result1=mysqli_query($con,$sql1);
$row1=mysqli_fetch_array($result1);
}		
$no=mysqli_num_rows($result);
}


?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Reports</title>
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
}
.links_color {
	color: #CC6600;
	font-weight:normal;
}
body {
	background-image: url();
}
</style>
<link href="mystyle.css" rel="stylesheet" type="text/css" />
<link href="mystyleNew.css" rel="stylesheet" type="text/css" />
</head>

<body>
<table width="1183" border="0" align="center">
  <tr>
    <td height="187" colspan="2"><a href="index.php"><img src="Images/website banner.jpg" width="1183" height="185" /></a></td>
  </tr>
  <tr align="center" bgcolor="#B6AD89" class="in">
    <td width="854" align="left" valign="top" class="links_color"><blockquote>
    <h3><em><?php if($_SESSION['cat']=="Librarian"){?>
      <a href="librarianaccount.php" class="links_color">Home</a><?php } if($_SESSION['cat']=="Library Assistant"){ ?><a href="libraryassistant.php" class="links_color">Home</a>
      <?php  } // To give seperate home pages according to the user ?>
      </em> | <em><?php if($_SESSION['cat']=="Librarian") { ?><a href="user management.php" class="links_color">User Management</a><?php } if($_SESSION['cat']=="Library Assistant"){ ?><a href="user management2.php" class="links_color">User Management</a><?php } ?></em> | <em><a href="library item management.php" class="links_color">Library Item Management</a></em> | <em><a href="issue_return_items.php" class="links_color">Issue/Return Items</a></em> | <em><a href="reports.php" class="links_color">Reports</a></em> | <em><a href="online_catalog_search.php" class="links_color">Online Catalog</a></em></h3>      
    </blockquote></td>
    <td width="329" align="right" valign="middle"><span class="in1">Welcome <?php echo $_SESSION['fname']."-".$_SESSION['cat']; ?> | <a href="signout.php" class="in1"> Logout</a></span>&nbsp;&nbsp;</td>
  </tr>
  <tr bgcolor="#EAE5CE">
    <td colspan="2" align="left">
      <p>
        <label for="ei2"></label>
      </p>
      <p>&nbsp;</p>
      <form name="view" method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>">
        <table width="850" border="0" align="center">
          <tr class="body_p">
            <td width="129" height="40" class="body_p">Report Type</td>
            <td width="158" class="in"><select name="reportType" id="reportType">
                <option>Select Type</option>
                <option value="fine">Fine Payments</option>
                
                <option value="borrow">Borrowed Items</option>
                <option value="return" selected="selected">Returned Items</option>
            </select></td>
            <td width="215" class="body_p">From 
              <label for="from"></label>
            <input type="text" name="from" id="date-pick1" required="required" /></td>
            <td width="194" class="body_p">To
            <input type="text" name="to" id="date-pick2" required="required" /></td>
            <td width="132" class="in"><label for="to"></label>
            <input name="view" type="submit" class="co" id="view" value=" View " /></td>
          </tr>
          <tr>
            <td class="in">&nbsp;</td>
            <td class="in">&nbsp;</td>
            <td class="in">&nbsp;</td>
            <td class="in">&nbsp;</td>
            <td class="in">&nbsp;</td>
          </tr>
        </table>
      </form>
      
      <?php if(isset($_POST['view'])){ 
	  
	  //Query for Borrowed Items Report
	  if($rtype=="borrow"){
	  ?>
      <table width="891" border="0" align="center">
          <tr>
            <td width="885" colspan="5"><table width="1035" border="0">
              <tr class="body_p">
                <td colspan="2" class="so"><em><strong>Borrowed Items Report</strong></em></td>
                <td width="154" class="so"><em><strong><strong>From</strong><?php echo $from; ?>&nbsp;</strong></em></td>
                <td width="133" class="so"><em><strong>To<strong><?php echo $to; ?></strong></strong></em></td>
                <td width="126" class="so"><em><strong>&nbsp;</strong></em></td>
                <td width="93" class="so"><em><strong>Items <?php echo $no; ?>&nbsp;&nbsp;</strong></em></td>
              </tr>
              <tr>
                <td width="143" class="in">&nbsp;</td>
                <td width="360" class="in">&nbsp;</td>
                <td class="in">&nbsp;</td>
                <td class="in">&nbsp;</td>
                <td class="in">&nbsp;</td>
                <td class="in">&nbsp;</td>
              </tr>
              <tr class="body_p">
                <td height="40" class="body_p"><strong>Accession No</strong></td>
                <td class="body_p"><strong>Item Name</strong></td>
                <td class="body_p"><strong>User Name</strong></td>
                <td class="body_p"><strong>Borrow Date</strong></td>
                <td class="body_p"><strong>Return Date</strong></td>
                <td class="body_p"><strong>Status</strong></td>
              </tr>
                <?php while($row=mysqli_fetch_array($result)){ ?>
              <tr>
                <td height="31" class="body_p"><?php echo $row['Accession_No']; ?>&nbsp;</td>
                <td class="body_p"><?php echo $row['Title']; ?>&nbsp;</td>
                <td class="body_p"><?php echo $row['First_Name']." ".$row['Last_Name']; ?>&nbsp;</td>
                <td class="body_p"><?php echo $row['Borrow_Date']; ?>&nbsp;</td>
                <td class="body_p"><?php echo $row['Return_Date']; ?>&nbsp;</td>
                <td class="body_p"><?php echo $row['Rstatus']; ?>&nbsp;</td>
              </tr>
              <?php } ?>
            </table></td>
          </tr>
    </table>
    <br />
    
    <?php }
	//For Returned Items Report
	if($rtype=="return"){
	  ?>
      <table width="1001" border="0" align="center">
          <tr>
            <td width="995" colspan="5"><table width="1029" border="0">
              <tr class="body_p">
                <td colspan="2" class="so"><em><strong> Returned Items Report </strong></em></td>
                <td width="155" class="so"><em><strong><strong>From</strong><?php echo $from; ?>&nbsp;</strong></em></td>
                <td width="129" class="so"><em><strong>To<strong><?php echo $to; ?></strong></strong></em></td>
                <td width="121" class="so"><em><strong>&nbsp;</strong></em></td>
                <td width="98" class="so"><em><strong>Items <?php echo $no; ?>&nbsp;</strong></em></td>
              </tr>
              <tr>
                <td width="137" class="in">&nbsp;</td>
                <td width="363" class="in">&nbsp;</td>
                <td class="in">&nbsp;</td>
                <td class="in">&nbsp;</td>
                <td class="in">&nbsp;</td>
                <td class="in">&nbsp;</td>
              </tr>
              <tr>
                <td height="40" class="body_p"><strong>Accession No</strong></td>
                <td class="body_p"><strong>Item Name</strong></td>
                <td class="body_p"><strong>User Name</strong></td>
                <td class="body_p"><strong>Borrow Date</strong></td>
                <td class="body_p"><strong>Return Date</strong></td>
                <td class="body_p"><strong>Status</strong></td>
              </tr>
                <?php while($row=mysqli_fetch_array($result)){ ?>
              <tr>
                <td height="31" class="body_p"><?php echo $row['Accession_No']; ?>&nbsp;</td>
                <td class="body_p"><?php echo $row['Title']; ?>&nbsp;</td>
                <td class="body_p"><?php echo $row['First_Name']." ".$row['Last_Name']; ?>&nbsp;</td>
                <td class="body_p" ><?php echo $row['Borrow_Date']; ?>&nbsp;</td>
                <td class="body_p"><?php echo $row['Return_Date']; ?>&nbsp;</td>
                <td class="body_p"><?php echo $row['Rstatus']; ?>&nbsp;</td>
              </tr>
              <?php } ?>
            </table></td>
          </tr>
    </table>
    <br />
    
    <?php }
	//For Fine Payments Report
	if($rtype=="fine"){
	  ?>
      <table width="1001" border="0" align="center">
          <tr class="body_p">
            <td width="995" colspan="5"><table width="1024" border="0">
              <tr>
                <td colspan="2" class="so"><em><strong>Fine Payments Report </strong></em></td>
                <td width="141" class="so"><em><strong><strong>From</strong><?php echo $from; ?>&nbsp;</strong></em></td>
                <td width="131" class="so"><em><strong>To<strong><?php echo $to; ?></strong></strong></em></td>
                <td width="184" class="so"><em><strong>&nbsp;</strong></em></td>
                <td width="98" class="so"><em><strong>Items <?php echo $no; ?>&nbsp;</strong></em></td>
              </tr>
              <tr>
                <td width="133" class="in">&nbsp;</td>
                <td width="311" class="in">&nbsp;</td>
                <td class="in">&nbsp;</td>
                <td class="in">&nbsp;</td>
                <td class="in">&nbsp;</td>
                <td class="in">&nbsp;</td>
              </tr>
              <tr>
                <td height="40" class="body_p"><strong>Accession No</strong></td>
                <td class="body_p"><strong>Item Name</strong></td>
                <td class="body_p"><strong>User Name</strong></td>
                <td class="body_p"><strong>Return Date</strong></td>
                <td class="body_p"><strong>Actual Return Date</strong></td>
                <td class="body_p"><strong>Fine</strong></td>
              </tr>
                <?php while($row=mysqli_fetch_array($result)){ ?>
              <tr>
                <td height="31" class="body_p"><?php echo $row['Accession_No']; ?>&nbsp;</td>
                <td class="body_p"><?php echo $row['Title']; ?>&nbsp;</td>
                <td class="body_p"><?php echo $row['First_Name']." ".$row['Last_Name']; ?>&nbsp;</td>
                <td class="body_p" ><?php echo $row['Return_Date']; ?>&nbsp;</td>
                <td class="body_p"><?php echo $row['Actual_Return_Date']; ?>&nbsp;</td>
                <td class="body_p"><?php echo $row['Fine']; ?>&nbsp;</td>
              </tr>
            
              <?php } ?>  <tr>
                <td height="33" class="in">&nbsp;</td>
                <td class="in">&nbsp;</td>
                <td class="in">&nbsp;</td>
                <td class="in" >&nbsp;</td>
                <td class="body_p" ><em>Total</em>&nbsp;</td>
                <td class="body_p"><em><?php echo $row1['Fi']; ?></em>&nbsp;</td>
              </tr>
            </table>
            
            
            
            </td>
          </tr>
    </table>
      <p>&nbsp;</p>
      
      
    <?php }
	
	} ?>
    </td>
  </tr>
  <tr bgcolor="#FF6600">
    <td height="50" colspan="2" align="center" bgcolor="#CC6600" id="footer">Copyright &copy; 2013 Negombo South International School. All Rights Reserved</td>
  </tr>
</table>
</body>
</html>
<?php } else {
			header("Location:index.php?id=Please Enter Email and Password");
			}
?>