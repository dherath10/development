<?php
//Get user type
$userType=$_GET['q'];

include("include/dbconnection.php");

// To display the records according to the user type id
$sqlut="SELECT * FROM user as u, user_type as ut WHERE u.User_Type_ID='$userType' AND ut.User_Type_ID=u.User_Type_ID";
$resultut=mysqli_query($con,$sqlut);
?>
<table width="1000" border="0">
  <tr class="body_p">
    <td height="37">User ID&nbsp;</td>
    <td>Type&nbsp;</td>
    <td>First Name&nbsp;</td>
    <td>Last Name&nbsp;</td>
    <td>Gender&nbsp;</td>
    <td>Email&nbsp;</td>
    <td>Date of Birth&nbsp;</td>
    <td>Registered Date</td>
  </tr>
  <?php while($row=mysqli_fetch_array($resultut)){ ?>
  <tr>
    <td><?php echo $row['User_ID'];?> &nbsp;</td>
    <td><?php echo $row['User_Type_Name'];?>&nbsp;</td>
    <td><?php echo $row['First_Name'];?>&nbsp;</td>
    <td><?php echo $row['Last_Name'];?>&nbsp;</td>
    <td><?php echo $row['Gender'];?>&nbsp;</td>
    <td><?php echo $row['Email'];?>&nbsp;</td>
    <td><?php echo $row['Date_of_Birth']?>&nbsp;</td>
    <td><?php echo $row['Reg_Date'];?></td>
  </tr>
  <?php } ?>
</table>
