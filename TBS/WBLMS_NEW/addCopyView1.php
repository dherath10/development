<?php
session_start();

if($_SESSION['userid']!="" && $_SESSION['pass']!="" && ($_SESSION['cat']=="Librarian" || $_SESSION['cat']=="Library Assistant")) {
	
//Date Zone
date_default_timezone_set('Asia/Jayapura');
$cdate=date("Y-m-d"); //Current date
//To get Item's details
$item=$_SESSION['item'];
$pday=$_SESSION['pday'];
$price=$_SESSION['price'];
$state=$_SESSION['state'];
$noc=$_SESSION['noc'];
$shelf=$_SESSION['shelf'];
$acc=$_SESSION['accArray'];
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Add item</title>
<link href="mystyle.css" rel="stylesheet" type="text/css" />
<link href="mystyleNew.css" rel="stylesheet" type="text/css" />
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
	background-image: url(Images/Wall%20Texture%20Bkgd--Yellow-edtd.jpg);
	color: #804000;
	font-family: Georgia, "Times New Roman", Times, serif;
}
</style>


</head>

<body>
<table width="1183" border="0" align="center">
  <tr>
    <td height="187" colspan="2"><a href="index.php"><img src="images/website banner.jpg" width="1183" height="185" /></a></td>
  </tr>
  <tr align="center" bgcolor="#B6AD89" class="in">
    <td width="915" align="left" valign="top"><blockquote>
      <h4 class="links_color"><em>&nbsp;&nbsp;&nbsp;<?php if($_SESSION['cat']=="Librarian"){?><a href="librarianaccount.php" class="links_color">Home</a><?php } if($_SESSION['cat']=="Library Assistant"){?><a href="libraryassistant.php" class="links_color">Home</a><?php  } ?></em> | <em><a href="user management.php" class="links_color">User Management</a></em> | <em><a href="library item management.php" class="links_color">Library Item Management</a></em> | <em><a href="issue_return_items.php" class="links_color">Issue/Return Items</a></em> | <em><a href="reports.php" class="links_color">Reports</a></em> | <em><a href="search.php" class="links_color">Search</a></em></h4>
    </blockquote></td>
    <td width="268" align="right" valign="middle"><span class="in1">Welcome <?php echo $_SESSION['fname']."-".$_SESSION['cat']; ?> | <a href="signout.php" class="in1"> Logout</a></span></td>
  </tr>
  <tr bgcolor="#EAE5CE">
    <td colspan="2" align="center"><blockquote>
      <div>
        <h3><a href="addcopy.php" class="links_color">Add Item</a> | <a href="edit_item.php" class="links_color">Edit Item</a> | <a href="delete_item.php" class="links_color">Delete Item</a> | <span class="links_color"><a href="view_item.php">View Item</a></span></h3>
</div>
      <form action="editCopy.php?ida=<?php echo $acc; ?>" method="post" enctype="multipart/form-data" name="addItem" id="addItem" onsubmit="return checkVali()">
      <table width="581" border="0">
        <tr>
          <th height="36" colspan="2" align="center" scope="col"><blockquote>
            <h3>New Copy Details</h3>
          </blockquote></th>
          </tr>
        <tr>
          <td width="265">&nbsp;</td>
          <td width="306">&nbsp;</td>
        </tr>
        <tr>
          <td colspan="2" align="center">New Copy Successfully Added</td>
          </tr>
        <tr>
          <td>&nbsp;</td>
          <td>&nbsp;</td>
        </tr>
        <tr>
          <td height="35">Item ID</td>
          <td height="35" class="alert"><label for="itemId"></label>&nbsp;<span class="body_p" id="callNo1"><?php echo $item; ?></span></td>
        </tr>
        <tr>
          <td height="35">Purchased Date</td>
          <td height="35"><label for="purchasedDate"><?php echo $pday; ?></label></td>
        </tr>
        <tr>
          <td height="35">Price</td>
          <td height="35"><label for="price"><?php echo $price; ?></label>&nbsp;<span id="price1"></span></td>
        </tr>
        <tr>
          <td height="35">State</td>
          <td height="35" class="body_p"><label for="state"><?php 
		  if($state==1){	  
		  echo "Lending";
		  }else{
			  echo "Reference"; 
		  } ?></label></td>
        </tr>
        <tr>
          <td height="35">No of Copies</td>
          <td height="35" class="body_p"><label for="copies"><?php echo $noc ?></label></td>
        </tr>
        <tr>
          <td height="35">Shelf No</td>
          <td height="35" class="body_p"><label for="shelfNo"><?php echo $shelf; ?></label>&nbsp;<span id="shelfNo1"></span></td>
        </tr>
        <tr>
          <td height="20">Accession No</td>
          <td height="20" class="body_p">
          <?php foreach($acc as $e){ ?>
		  <a href="editCopy.php?idc=<?php echo $e; ?>"><?php echo $e ?></a>
          <?php } ?>
          
          &nbsp;</td>
        </tr>
        <tr>
          <td height="20" colspan="2" align="center"><input type="submit" name="edit" id="edit" value=" Edit All " /></td>
          </tr>
        <tr>
          <td height="20">&nbsp;</td>
          <td height="20" class="alert">&nbsp;</td>
        </tr>
      </table>
      </form>
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
<?php } else {
	header("Location:index.php?id=Please Enter Email and Password");

//header("Location:addCopyProcess.php?ms=id1");	
}
	
?>