<?php
include "include/dbconnection.php";

$sqltype="SELECT User_Type_Name From user_type";
$retype=mysqli_query($con,$sqltype);


 


?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
</head>

<body>
<form id="form1" name="form1" method="post" action="">
  <table width="507" border="0">
    <tr>
      <td width="212">User Type</td>
      <td width="285"><label for="usertype"></label>
        <select name="usertype" id="usertype">
        <?php while($row=mysqli_fetch_array($retype)){ ?>
        <option value="<?php echo $row['User_Type_Name']; ?>"><?php echo $row['User_Type_Name']; ?></option>
        <?php } ?>
        
        </select></td>
    </tr>
    <tr>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
    </tr>
  </table>
</form>
</body>
</html>