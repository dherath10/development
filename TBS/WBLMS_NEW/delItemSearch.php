<?php
ob_start();
error_reporting(E_ALL ^ E_NOTICE);
session_start();

if($_SESSION['userid']!="" && $_SESSION['pass']!=""){

//To connect database
include "include/dbconnection.php";

/*
if(isset($_POST['view'])){
	$stype=$_POST['search_type']; 
	$s=trim($_POST['search']); 
	// trim() function removes whitespace and other predefined characters from both sides of a string
	
if($stype=="Title"){
$sql="SELECT DISTINCT Item_ID,Title,Publisher_Name,Item_Type_Name,Item_Image FROM item as i,item_type as it,publisher as p WHERE i.Title LIKE '%$s%' AND i.Item_Type_ID=it.Item_Type_ID AND i.Publisher_ID=p.Publisher_ID";
}	
if($stype=="Publisher"){
$sql="SELECT * FROM item as i,item_type as it, publisher as p WHERE p.Publisher_Name LIKE '%$s%' AND i.Item_Type_ID=it.Item_Type_ID  AND i.Publisher_ID=p.Publisher_ID";
}
if($stype=="Call_No"){
$sql="SELECT * FROM item as i,item_type as it,publisher as p WHERE i.Call_No LIKE '%$s%' AND i.Item_Type_ID=it.Item_Type_ID AND i.Publisher_ID=p.Publisher_ID";
}
if($stype=="Title"){
$sql="SELECT * FROM item as i,item_type as it, publisher as p WHERE i.Title LIKE '%$s%' AND i.Item_Type_ID=it.Item_Type_ID AND i.Publisher_ID=p.Publisher_ID";
}
if($stype=="Author"){
$sql="SELECT * FROM item as i,item_type as it, books as b,author as a, publisher as p WHERE a.Author_Name LIKE '%$s%' AND i.Item_Type_ID=it.Item_Type_ID AND i.Item_ID=b.Item_ID AND a.Author_ID=b.Author_ID AND i.Publisher_ID=p.Publisher_ID";
}
if($stype=="ISBN"){
$sql="SELECT * FROM item as i,item_type as it, books as b,publisher as p WHERE b.ISBN LIKE '%$s%' AND i.Item_Type_ID=it.Item_Type_ID AND i.Item_ID=b.Item_ID AND i.Publisher_ID=p.Publisher_ID";
}
if($stype=="ISSN"){
$sql="SELECT * FROM item as i,item_type as it, serial as s,publisher as p WHERE s.ISSN LIKE '%$s%' AND i.Item_Type_ID=it.Item_Type_ID AND i.Item_ID=s.Item_ID AND i.Publisher_ID=p.Publisher_ID";
}
$result=mysqli_query($con,$sql);
$no=mysqli_num_rows($result);
}
*/
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Delete Item</title>
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
	font-weight: normal;
}
.links_color {color: #CC6600;
}
</style>

<link href="mystyle.css" rel="stylesheet" type="text/css" />
<link href="mystyle1.css" rel="stylesheet" type="text/css" />
<link href="mystyleNew.css" rel="stylesheet" type="text/css" />

</head>

<body>
<table width="1183" border="0" align="center">
  <tr>
    <td height="187" colspan="2"><a href="index.php"><img src="Images/website banner.jpg" width="1183" height="185" /></a></td>
  </tr>
  <tr align="center" bgcolor="#B6AD89" class="in">
    <td width="856" align="left" valign="top"><blockquote>
      <h3 class="links_color"><em>&nbsp;&nbsp;&nbsp;<?php if($_SESSION['cat']=="Librarian"){?><a href="librarianaccount.php" class="links_color">Home</a><?php } if($_SESSION['cat']=="Library Assistant"){?><a href="libraryassistant.php" class="links_color">Home</a><?php  } ?></em> | <?php if($_SESSION['cat']=="Librarian"){ ?><em><a href="user management.php" class="links_color">User Management</a></em><?php } if($_SESSION['cat']=="Library Assistant"){ ?><em><a href="user management2.php" class="links_color">User Management</a></em><?php } ?> | <em><a href="library item management.php" class="links_color">Library Item Management</a></em> | <em><a href="issue_return_items.php" class="links_color">Issue/Return Items</a></em> | <em><a href="reports.php" class="links_color">Reports</a></em> | <em><a href="online_catalog_search.php" class="links_color">Online Catalog</a></em></h3>
    </blockquote></td>
    <td width="327" align="right" valign="middle"><span class="in1">Welcome <?php echo $_SESSION['fname']."-".$_SESSION['cat']; ?> | <a href="signout.php">Logout </a></span></td>
  </tr>
  <tr bgcolor="#EAE5CE">
    <td colspan="2" align="center">
   
    <p></p>
    <table width="932" border="0" align="center">
      <tr>
        <td>&nbsp;</td>
        <td colspan="2" align="center" class="body_p"><strong>Delete Item</strong></td>
        <td width="331">&nbsp;</td>
      </tr>
      <tr>
        <td width="230">&nbsp;</td>
        <td colspan="3" class="alert"><?php if(isset($_REQUEST['msg'])){ 
			
			echo $_REQUEST['msg']; 
			}?></td>
        </tr>
      <form name="view" method="post" action="delItemPro.php">
      <tr>
        <td class="body_p">Search Items</td>
        <td width="162">
          <select name="search_type" id="search" required="required">
            <option value="" selected="selected">-Select Search Term-</option>
            <option value="serial">Serial</option>
            <option value="Author">Author</option>
            <option value="Title">Title</option>
            <option value="Publisher">Publisher</option>
            <option value="books">Book</option>
            <option value="cd">CD/DVD</option>
          </select>       </td>
        <td width="191" align="center"><span id="items"><input type="text" name="search" id="search" /></span></td>
        <td><input type="submit" name="search" id="search" value="Search Item" /></td>
      </tr>
      <tr>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
      </tr></form>
      <tr>
        <td height="37" colspan="4" class="alert">&nbsp;       </td>
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
	header("Location:index.php?id=Please Enter Email and Password"); }?>