<?php
ob_start();
session_start();
$cdate=date("Y-m-d");//Current date
$fid=$_SESSION['fid'];
$uid=$_REQUEST['id'];
//To create the database connectivity
include "include/dbconnection.php";
?>
<link href="mystyle.css" rel="stylesheet" type="text/css" />
<link href="mystyleNew.css" rel="stylesheet" type="text/css" />
<div id="pr">
<table width="705" border="0" align="center" class="body_p">
<tr>
  <td class="body_p">&nbsp;</td>
  <td colspan="2" class="bodyLinks"><div align="center">Receipt</div></td>
  <td class="body_p">&nbsp;</td>
  <td class="body_p">&nbsp;</td>
</tr>
<tr>
  <td class="body_p">&nbsp;</td>
  <td colspan="2" class="body_p">&nbsp;</td>
  <td class="body_p">&nbsp;</td>
  <td class="body_p">&nbsp;</td>
</tr>
<tr>
          <td width="139" class="body_p">Borrow ID</td>
          <td width="135" class="body_p">Fine</td>
          <td width="162" class="body_p">Actual Return Date</td>
          <td width="111" class="body_p">User ID </td>
          <td width="136" class="body_p">Fine Status</td>
  </tr>
        <?php 
		//To get details User by User
		$sqlg1="SELECT * FROM fine WHERE Fine_ID='$fid' AND User_ID='$uid'";
		$resultg1=mysqli_query($con,$sqlg1);
		//To calculate Sub Fine Total
		$sqlsubFine="SELECT SUM(Fine) as subFine FROM fine WHERE Fine_ID='$fid' AND User_ID='$uid'";
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
     <table align="center">   
<tr>
          <td width="141"><div align="center" class="alert1"><strong>Sub Total</strong></div></td>
          <td width="223" class="body_p"><?php echo $rowsubFine['subFine']; ?>&nbsp;</td>
          <td width="105">&nbsp;</td>
          <td width="105">&nbsp;</td>
          <td width="109"></td>
          </tr>
        <tr>
          <td>&nbsp;</td>
          <td class="body_p">&nbsp;</td>
          <td>&nbsp;</td>
          <td>&nbsp;</td>
          <td>&nbsp;</td>
        </tr>
        </table>
</div>
<p>&nbsp;
  <input name="print2" type="button" class="co" id="print2" onClick="window.print('pr')" value="Print" />
</p>
