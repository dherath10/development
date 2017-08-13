<?php
session_start();

//To restrict other users from accessing this page without logging in
if ($_SESSION['userid']!="" && $_SESSION['pass']!="" && ($_SESSION['cat']=="Teacher" || $_SESSION['cat']=="Student")){

if(isset($_POST['view'])){
	$htype=$_POST['historyType'];
	$from=$_POST['from'];
	$to=$_POST['to'];
//To connect database
include "include/dbconnection.php";

//Query for Reserved Items
if($htype=="reserve"){
	$sql="SELECT * FROM reservation as r, copy as c, item as i, user as u WHERE r.Res_Date BETWEEN '$from' AND '$to' AND r.Item_ID=i.Item_ID AND i.Item_ID=c.Item_ID AND r.User_ID=u.User_ID AND u.User_ID='$_SESSION[userid]'";
	$result=mysqli_query($con,$sql);
}

//Query for Borrowed Items
if($htype=="borrow"){
$sql="SELECT * FROM borrow as b,copy as c, item as i, user as u WHERE b.Borrow_Date BETWEEN '$from' AND '$to' AND b.Accession_No=c.Accession_No AND c.Item_ID=i.Item_ID AND u.User_ID=b.User_ID AND b.User_ID='$_SESSION[userid]'";
$result=mysqli_query($con,$sql);
}

//Query for Returned Items
if($htype=="return"){
$sql="SELECT * FROM borrow as b,copy as c, item as i, user as u WHERE b.Return_Date BETWEEN '$from' AND '$to' AND b.Accession_No=c.Accession_No AND c.Item_ID=i.Item_ID AND u.User_ID=b.User_ID AND b.User_ID='$_SESSION[userid]'";
$result=mysqli_query($con,$sql);

}	
//Query for Fine Payments
if($htype=="fine"){
$sql="SELECT * FROM fine as f,borrow as b,copy as c, item as i, user as u WHERE f.Actual_Return_Date BETWEEN '$from' AND '$to' AND b.Accession_No=c.Accession_No AND c.Item_ID=i.Item_ID AND u.User_ID=f.User_ID AND f.Borrow_ID=b.Borrow_ID AND f.Fine NOT IN (0.00) AND f.User_ID='$_SESSION[userid]'";
$result=mysqli_query($con,$sql);

$sql1="SELECT SUM(f.fine) AS Fi FROM fine as f,borrow as b,copy as c, item as i, user as u WHERE f.Actual_Return_Date BETWEEN '$from' AND '$to' AND b.Accession_No=c.Accession_No AND c.Item_ID=i.Item_ID AND u.User_ID=f.User_ID AND f.Borrow_ID=b.Borrow_ID AND f.Fine NOT IN (0.00) AND f.User_ID='$_SESSION[userid]'";
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
<title>History</title>
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
    <td width="854" align="left" valign="top"><blockquote>
    <h4 class="links_color"><em><?php if($_SESSION['cat']=="Teacher"){?><a href="teacheraccount.php" class="links_color">Home</a><?php } if ($_SESSION['cat']=="Student") {?><a href="studentaccount.php" class="links_color">Home</a><?php } ?></em> | <em><a href="online_catalog_search.php" class="links_color">Online Catalog</a></em></h4>      
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
        <table width="892" border="0" align="center">
          <tr class="body_p">
            <td width="106" height="40" class="body_p">View History</td>
            <td width="151" class="in"><select name="historyType" class="co" id="historyType">
                <option selected="selected">Select Type</option>
                <option value="fine">Fine Payments</option>
                
                <option value="borrow">Borrowed Items</option>
                <option value="return">Returned Items</option>
                <option value="reserve">Reserved Items</option>
            </select></td>
            <td width="230" class="body_p">From 
              <label for="from"></label>
            <input type="text" name="from" id="date-pick1" required="required" /></td>
            <td width="201" class="body_p">To
            <input type="text" name="to" id="date-pick2" required="required" /></td>
            <td width="86" class="in"><label for="to"></label>
            <input name="view" type="submit" class="co" id="view" value=" View " /></td>
            <td width="92" class="in"><input name="cancel" type="reset" class="co" id="cancel" value="Cancel" /></td>
          </tr>
          <tr>
            <td class="in">&nbsp;</td>
            <td class="in">&nbsp;</td>
            <td class="in">&nbsp;</td>
            <td class="in">&nbsp;</td>
            <td class="in">&nbsp;</td>
            <td class="in">&nbsp;</td>
          </tr>
        </table>
      </form>
      
      <br />
	  <?php if(isset($_POST['view'])){ 
	  
	  //Query for Borrowed Items History
	  if($htype=="borrow"){
	 
	  ?>
      <table width="972" border="0" align="center">
          <tr>
            <td width="966" colspan="5" class="alert" align="center">
             <?php if($no!=0){ ?>
            <table width="969" border="0">
              <tr class="bodyLinks">
                <td colspan="2" class="so"><strong>Borrowed Items </strong></td>
                <td width="137" class="so"><strong>From</strong></td>
                <td width="136" class="so"><strong><?php echo $from; ?>&nbsp;</strong></td>
                <td width="129" class="so"><strong>To</strong></td>
                <td width="123" class="so"><strong><?php echo $to; ?>&nbsp;</strong></td>
                <td width="98" class="so"><strong>Items <?php echo $no; ?>&nbsp;&nbsp;</strong></td>
              </tr>
              <tr>
                <td width="184" class="in">&nbsp;</td>
                <td colspan="2" class="in">&nbsp;</td>
                <td class="in">&nbsp;</td>
                <td class="in">&nbsp;</td>
                <td class="in">&nbsp;</td>
                <td class="in">&nbsp;</td>
              </tr>
              <tr class="body_p">
                <td height="40" class="body_p"><strong>Accession No</strong></td>
                <td colspan="2" class="body_p"><strong>Item Name</strong></td>
                <td class="body_p"><strong>Borrow Date</strong></td>
                <td class="body_p"><strong>Return Date</strong></td>
                <td class="body_p"><strong>Status</strong></td>
                <td class="body_p">&nbsp;</td>
              </tr>
                <?php while($row=mysqli_fetch_array($result)){ ?>
              <tr>
                <td height="31" class="in"><?php echo $row['Accession_No']; ?>&nbsp;</td>
                <td colspan="2" class="in"><?php echo $row['Title']; ?>&nbsp;</td>
                <td class="in"><?php echo $row['Borrow_Date']; ?>&nbsp;</td>
                <td class="in"><?php echo $row['Return_Date']; ?>&nbsp;</td>
                <td class="in"><?php echo $row['Rstatus']; ?>&nbsp;</td>
                <td class="in">&nbsp;</td>
              </tr>
              <?php } ?>
            </table>
            <?php } else{ echo "No borrow Records from $from to $to";}?>
            
            
            </td>
          </tr>
    </table>
    <br />
    
    <?php }
	//For Returned Items History
	if($htype=="return"){
	  ?>
      <table width="974" border="0" align="center">
          <tr>
            <td width="968" colspan="5" class="alert" align="center">
             <?php if($no!=0){ ?>
            <table width="969" border="0">
              <tr class="bodyLinks">
                <td colspan="2" class="so"><strong> Returned Items </strong></td>
                <td width="142" class="so"><strong>From</strong></td>
                <td width="137" class="so"><strong><?php echo $from; ?>&nbsp;</strong></td>
                <td width="135" class="so"><strong>To</strong></td>
                <td width="120" class="so"><strong><?php echo $to; ?>&nbsp;</strong></td>
                <td width="99" class="so"><strong>Items <?php echo $no; ?>&nbsp;</strong></td>
              </tr>
              <tr>
                <td width="185" class="in">&nbsp;</td>
                <td colspan="2" class="in">&nbsp;</td>
                <td class="in">&nbsp;</td>
                <td class="in">&nbsp;</td>
                <td class="in">&nbsp;</td>
                <td class="in">&nbsp;</td>
              </tr>
              <tr>
                <td height="40" class="body_p"><strong>Accession No</strong></td>
                <td colspan="2" class="body_p"><strong>Item Name</strong></td>
                <td class="body_p"><strong>Borrow Date</strong></td>
                <td class="body_p"><strong>Return Date</strong></td>
                <td class="body_p"><strong>Status</strong></td>
                <td class="body_p">&nbsp;</td>
              </tr>
                <?php while($row=mysqli_fetch_array($result)){ ?>
              <tr>
                <td height="31" class="in"><?php echo $row['Accession_No']; ?>&nbsp;</td>
                <td colspan="2" class="in"><?php echo $row['Title']; ?>&nbsp;</td>
                <td class="in"><?php echo $row['Borrow_Date']; ?></td>
                <td class="in" ><?php echo $row['Return_Date']; ?></td>
                <td class="in"><?php echo $row['Rstatus']; ?></td>
                <td class="in">&nbsp;</td>
              </tr>
              <?php }?>
            </table>
            <?php } else{ echo "No $htype Records from $from to $to";} ?>
            </td>
          </tr>
    </table>
    <br />
    
    <?php }
	//For Fine Payments History
	if($htype=="fine"){
	  ?>
      <table width="952" border="0" align="center">
          <tr class="body_p">
            <td width="946" colspan="5" class="alert" align="center">
             <?php if($no!=0){ ?>
            <table width="974" border="0">
              <tr class="bodyLinks">
                <td colspan="2" class="so"><strong>Fine Payments </strong></td>
                <td width="177" class="so"><strong>From</strong></td>
                <td width="143" class="so"><strong><?php echo $from; ?>&nbsp;</strong></td>
                <td width="148" class="so"><strong>To</strong></td>
                <td width="100" class="so"><strong><?php echo $to; ?>&nbsp;</strong></td>
                <td width="104" class="so"><strong>Items <?php echo $no; ?>&nbsp;</strong></td>
              </tr>
              <tr>
                <td width="194" class="in">&nbsp;</td>
                <td colspan="2" class="in">&nbsp;</td>
                <td class="in">&nbsp;</td>
                <td class="in">&nbsp;</td>
                <td class="in">&nbsp;</td>
                <td class="in">&nbsp;</td>
              </tr>
              <tr>
                <td height="40" class="body_p"><strong>Accession No</strong></td>
                <td colspan="2" class="body_p"><strong>Item Name</strong></td>
                <td class="body_p"><strong>Return Date</strong></td>
                <td class="body_p"><strong>Actual Return Date</strong></td>
                <td class="body_p"><strong>Fine</strong></td>
                <td class="body_p">&nbsp;</td>
              </tr>
                <?php while($row=mysqli_fetch_array($result)){ ?>
              <tr>
                <td height="31" class="in"><?php echo $row['Accession_No']; ?>&nbsp;</td>
                <td colspan="2" class="in"><?php echo $row['Title']; ?>&nbsp;</td>
                <td class="in"><?php echo $row['Return_Date']; ?></td>
                <td class="in" ><?php echo $row['Actual_Return_Date']; ?></td>
                <td class="in"><?php echo $row['Fine']; ?></td>
                <td class="in">&nbsp;</td>
              </tr>
            
              <?php } ?>  <tr>
                <td height="33" class="in">&nbsp;</td>
                <td colspan="2" class="in">&nbsp;</td>
                <td class="in">&nbsp;</td>
                <td class="body_p" ><em><strong>Total</strong></em>&nbsp;</td>
                <td class="body_p" ><span class="in"><?php echo $row1['Fi']; ?></span></td>
                <td class="in">&nbsp;</td>
              </tr>
            </table>
            <?php } else{ echo "No $htype Records from $from to $to";}  ?>
            
            
            </td>
          </tr>
    </table>
      <p>&nbsp;</p>
      
      
    <?php }
	// For Reserved Items
	if($htype=="reserve"){
		?>
        <table width="974" border="0" align="center">
          <tr>
            <td width="968" colspan="5" class="alert" align="center">
             <?php if($no!=0){ ?>
            <table width="969" border="0">
              <tr class="bodyLinks">
                <td colspan="2" class="so"><strong> Reserved Items </strong></td>
                <td width="142" class="so"><strong>From</strong></td>
                <td width="137" class="so"><strong><?php echo $from; ?>&nbsp;</strong></td>
                <td width="135" class="so"><strong>To</strong></td>
                <td width="120" class="so"><strong><?php echo $to; ?>&nbsp;</strong></td>
                <td width="99" class="so"><strong>Items <?php echo $no; ?>&nbsp;</strong></td>
              </tr>
              <tr>
                <td width="185" class="in">&nbsp;</td>
                <td colspan="2" class="in">&nbsp;</td>
                <td class="in">&nbsp;</td>
                <td class="in">&nbsp;</td>
                <td class="in">&nbsp;</td>
                <td class="in">&nbsp;</td>
              </tr>
              <tr>
                <td height="40" class="body_p"><strong>Accession No</strong></td>
                <td colspan="2" class="body_p"><strong>Item Name</strong></td>
                <td class="body_p"><strong>Reserved Date</strong></td>
                <td class="body_p"><strong>Reserved Time</strong></td>
                <td class="body_p"><strong>Fulfilled</strong></td>
                <td class="body_p">&nbsp;</td>
              </tr>
                <?php while($row=mysqli_fetch_array($result)){ ?>
              <tr>
                <td height="31" class="in"><?php echo $row['Accession_No']; ?>&nbsp;</td>
                <td colspan="2" class="in"><?php echo $row['Title']; ?>&nbsp;</td>
                <td class="in"><?php echo $row['Res_Date']; ?></td>
                <td class="in" ><?php echo $row['Res_Time']; ?></td>
                <td class="in"><?php echo $row['Fulfilled']; ?></td>
                <td class="in">&nbsp;</td>
              </tr>
              <?php } ?>
            </table>
            <?php } else{ echo "No $htype Records from $from to $to";}  ?>
            </td>
          </tr>
    </table>
    
       <?php } } ?>
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