<?php
session_start();

//To restrict other users from accessing this page without logging in
if($_SESSION['userid']!="" && $_SESSION['pass'] !="" && ($_SESSION['cat']=="Librarian" || $_SESSION['cat']=="Library Assistant")) {
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Library Item Management</title>
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
.in1 {	font-size: medium;
	list-style-type: circle;
	color: #CC6600;
	text-align: right;
}
.links_color {
	color: #CC6600;
	font-weight: normal;
}
</style>
</head>

<body>
<table width="1183" border="0" align="center">
  <tr>
    <td height="187" colspan="2"><a href="index.php"><img src="Images/website banner.jpg" width="1183" height="185" /></a></td>
  </tr>
  <tr align="center" bgcolor="#B6AD89" class="in">
    <td width="854" height="30" align="left" valign="top"><blockquote>
    <h4 class="links_color"><em><?php if($_SESSION['cat']=="Librarian"){?><a href="librarianaccount.php" class="links_color">Home</a><?php } if($_SESSION['cat']=="Library Assistant"){?><a href="libraryassistant.php" class="links_color">Home</a><?php  } ?></em> | <?php if($_SESSION['cat']=="Librarian"){ ?><em><a href="user management.php" class="links_color">User Management</a></em><?php } if($_SESSION['cat']=="Library Assistant"){ ?><em><a href="user management2.php" class="links_color">User Management</a></em><?php } ?> | <em><a href="library item management.php" class="links_color">Library Item Management</a></em> | <em><a href="issue_return_items.php" class="links_color">Issue/Return Items</a></em> | <em><a href="reports.php" class="links_color">Reports</a></em> | <em><a href="online_catalog_search.php" class="links_color">Online Catalog</a></em></h4>  
    </blockquote></td>
    <td width="329" height="20" align="center" valign="middle"><span class="in1">Welcome...<?php echo $_SESSION['fname']."-".$_SESSION['cat']; ?> | <a href="signout.php"> Logout </a></span>
    </td>
  </tr>
  <tr bgcolor="#EAE5CE">
    <td colspan="2" align="center"><p>&nbsp;</p>
      <table width="848" border="0">
        <tr>
          <td height="51" colspan="4" align="center" valign="top"><h3 class="body_p">Library Item Management</h3></td>
        </tr>
        <tr align="center">
          <td width="212" height="184" align="center" valign="middle"><p align="center"><a href="addcopy.php"><img src="images/book_add (1).png" alt="" name="addBook" width="128" height="128" id="addBook" /></a></p>
          <p align="center"> <a href="addcopy.php">Add Item</a></p></td>
          <td width="212" align="center" valign="middle"><p align="center"><a href="editItemSearch.php"><img src="images/book_edit (1).png" width="128" height="128" alt="" /></a></p>
          <p align="center"> <a href="editItemSearch.php">Edit Item</a></p></td>
          <td width="212" height="40" align="center" valign="middle"><p align="center"><a href="delItemSearch.php"><img src="images/book_delete (1).png" width="128" height="128" alt="" /></a></p>
          <p align="center"> <a href="delItemSearch.php">Delete Item</a></p></td>
          <td width="212" height="40" align="center" valign="middle"><p align="center"><a href="viewItem.php"><img src="images/book_search.png" alt="" name="viewitem" width="128" height="128" id="viewitem" /></a></p>
          <p align="center"><a href="viewItem.php">View Item</a></p></td>
        </tr>
      </table>
      <p>&nbsp;</p></td>
  </tr>
  <tr bgcolor="#FF6600" id="footer">
    <td height="50" colspan="2" align="center" bgcolor="#CC6600">Copyright &copy; 2013 Negombo South International School. All Rights Reserved</td>
  </tr>
</table>
</body>
</html>
<?php } else {
	header("location:index.php?id=Please Enter Email and Password"); #Message to display when a user tries to enter a page without loggin in
}
?>