<?php require_once('Connections/con1.php'); ?>
<?php
ob_start();
error_reporting(E_ALL ^ E_NOTICE);
session_start();

if($_SESSION['userid']!="" && $_SESSION['pass']!=""){

//To connect database
include "include/dbconnection.php";


//if(isset($_POST['view'])){
	$stype=$_SESSION['stype'];
	$s=$_SESSION['search'];
	// trim() function removes whitespace and other predefined characters from both sides of a string
	
if($stype=="Title"){
$sql="SELECT DISTINCT Item_ID,Title,Publisher_Name,Item_Type_Name,Item_Image FROM item as i,item_type as it,publisher as p WHERE i.Title LIKE '%$s%' AND i.Item_Type_ID=it.Item_Type_ID AND i.Publisher_ID=p.Publisher_ID ORDER BY i.Item_ID DESC";
}	
if($stype=="Publisher"){
$sql="SELECT * FROM item as i,item_type as it, publisher as p WHERE p.Publisher_Name LIKE '%$s%' AND i.Item_Type_ID=it.Item_Type_ID  AND i.Publisher_ID=p.Publisher_ID ORDER BY i.Item_ID DESC";
}
if($stype=="Call_No"){
$sql="SELECT * FROM item as i,item_type as it,publisher as p WHERE i.Call_No LIKE '%$s%' AND i.Item_Type_ID=it.Item_Type_ID AND i.Publisher_ID=p.Publisher_ID ORDER BY i.Item_ID DESC";
}
if($stype=="Title"){
$sql="SELECT * FROM item as i,item_type as it, publisher as p WHERE i.Title LIKE '%$s%' AND i.Item_Type_ID=it.Item_Type_ID AND i.Publisher_ID=p.Publisher_ID ORDER BY i.Item_ID DESC";
}
if($stype=="Author"){
$sql="SELECT * FROM item as i,item_type as it, books as b,author as a, publisher as p WHERE a.Author_Name LIKE '%$s%' AND i.Item_Type_ID=it.Item_Type_ID AND i.Item_ID=b.Item_ID AND a.Author_ID=b.Author_ID AND i.Publisher_ID=p.Publisher_ID ORDER BY i.Item_ID DESC";
}
if($stype=="ISBN"){
$sql="SELECT * FROM item as i,item_type as it, books as b,publisher as p WHERE b.ISBN LIKE '%$s%' AND i.Item_Type_ID=it.Item_Type_ID AND i.Item_ID=b.Item_ID AND i.Publisher_ID=p.Publisher_ID ORDER BY Item_ID DESC";
}
if($stype=="ISSN"){
$sql="SELECT * FROM item as i,item_type as it, serial as s,publisher as p WHERE s.ISSN LIKE '%$s%' AND i.Item_Type_ID=it.Item_Type_ID AND i.Item_ID=s.Item_ID AND i.Publisher_ID=p.Publisher_ID ORDER BY i.Item_ID DESC";
}
if($stype=="books"){
$sql="SELECT * FROM item as i,item_type as it, publisher as p WHERE it.Item_Type_ID='1' AND i.Title LIKE '%$s%' AND i.Item_Type_ID=it.Item_Type_ID AND i.Publisher_ID=p.Publisher_ID ORDER BY i.Item_ID DESC";
}

if($stype=="cd"){
$sql="SELECT * FROM item as i,item_type as it,publisher as p WHERE it.Item_Type_ID='2' AND i.Title LIKE '%$s%' AND i.Item_Type_ID=it.Item_Type_ID AND i.Publisher_ID=p.Publisher_ID ORDER BY i.Item_ID DESC";
}
if($stype=="serial"){
$sql="SELECT * FROM item as i,item_type as it,publisher as p WHERE it.Item_Type_ID='3' AND i.Title LIKE '%$s%' AND i.Item_Type_ID=it.Item_Type_ID AND i.Publisher_ID=p.Publisher_ID ORDER BY i.Item_ID DESC";
}
$result=mysqli_query($con,$sql);
//$no=mysqli_num_rows($result);
//}
?>
<?php
if (!function_exists("GetSQLValueString")) {
function GetSQLValueString($theValue, $theType, $theDefinedValue = "", $theNotDefinedValue = "") 
{
  $theValue = get_magic_quotes_gpc() ? stripslashes($theValue) : $theValue;

  $theValue = function_exists("mysql_real_escape_string") ? mysql_real_escape_string($theValue) : mysql_escape_string($theValue);

  switch ($theType) {
    case "text":
      $theValue = ($theValue != "") ? "'" . $theValue . "'" : "NULL";
      break;    
    case "long":
    case "int":
      $theValue = ($theValue != "") ? intval($theValue) : "NULL";
      break;
    case "double":
      $theValue = ($theValue != "") ? "'" . doubleval($theValue) . "'" : "NULL";
      break;
    case "date":
      $theValue = ($theValue != "") ? "'" . $theValue . "'" : "NULL";
      break;
    case "defined":
      $theValue = ($theValue != "") ? $theDefinedValue : $theNotDefinedValue;
      break;
  }
  return $theValue;
}
}

$currentPage = $_SERVER["PHP_SELF"];

$maxRows_Record = 10;
$pageNum_Record = 0;
if (isset($_GET['pageNum_Record'])) {
  $pageNum_Record = $_GET['pageNum_Record'];
}
$startRow_Record = $pageNum_Record * $maxRows_Record;

mysql_select_db($database_con1, $con1);
$query_Record = $sql;
$query_limit_Record = sprintf("%s LIMIT %d, %d", $query_Record, $startRow_Record, $maxRows_Record);
$Record = mysql_query($query_limit_Record, $con1) or die(mysql_error());
$row_Record = mysql_fetch_assoc($Record);

if (isset($_GET['totalRows_Record'])) {
  $totalRows_Record = $_GET['totalRows_Record'];
} else {
  $all_Record = mysql_query($query_Record);
  $totalRows_Record = mysql_num_rows($all_Record);
}
$totalPages_Record = ceil($totalRows_Record/$maxRows_Record)-1;

$queryString_Record = "";
if (!empty($_SERVER['QUERY_STRING'])) {
  $params = explode("&", $_SERVER['QUERY_STRING']);
  $newParams = array();
  foreach ($params as $param) {
    if (stristr($param, "pageNum_Record") == false && 
        stristr($param, "totalRows_Record") == false) {
      array_push($newParams, $param);
    }
  }
  if (count($newParams) != 0) {
    $queryString_Record = "&" . htmlentities(implode("&", $newParams));
  }
}
$queryString_Record = sprintf("&totalRows_Record=%d%s", $totalRows_Record, $queryString_Record);



?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Online Catalog-Search</title>
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
    <td width="847" align="left" valign="top"><blockquote>
      <h3 class="links_color"><em>&nbsp;&nbsp;&nbsp;<?php if($_SESSION['cat']=="Librarian"){?><a href="librarianaccount.php" class="links_color">Home</a><?php } if($_SESSION['cat']=="Library Assistant"){?><a href="libraryassistant.php" class="links_color">Home</a><?php  } ?></em> | <?php if($_SESSION['cat']=="Librarian"){ ?><em><a href="user management.php" class="links_color">User Management</a></em><?php } if($_SESSION['cat']=="Library Assistant"){ ?><em><a href="user management2.php" class="links_color">User Management</a></em><?php } ?> | <em><a href="library item management.php" class="links_color">Library Item Management</a></em> | <em><a href="issue_return_items.php" class="links_color">Issue/Return Items</a></em> | <em><a href="reports.php" class="links_color">Reports</a></em> | <em><a href="online_catalog_search.php" class="links_color">Online Catalog</a></em></h3>
    </blockquote></td>
    <td width="336" align="right" valign="middle"><span class="in1">Welcome <?php echo $_SESSION['fname']."-".$_SESSION['cat']; ?> | <a href="signout.php">Logout </a></span></td>
  </tr>
  <tr bgcolor="#EAE5CE" class="in">
    <td colspan="2" align="center">
   
   
    <table width="932" border="0" align="center">
      <tr>
        <td colspan="4" align="center" class="body_p"><h3>Search Items</h3>          </td>
        </tr><form name="view" method="post" action="viewItemPro.php">
      <tr>
        <td width="314">&nbsp;</td>
        <td width="120">
          <select name="search_type" id="search_type" required="required">
            <option value="">-Select Search Term-</option>
            <option value="Author">Author</option>
            <option value="Title">Title</option>
            <option value="Publisher">Publisher</option>
            <option value="books">Book</option>
            <option value="cd">CD/DVD</option>
            <option value="serial">Serial</option>
          </select>       </td>
        <td width="273" align="center"><span id="items">
          <input type="text" name="search" id="search" /></span></td>
        <td width="213"><input type="submit" name="view" id="view" value="View Item" /></td>
      </tr>
      <tr>
        <td colspan="4" align="center">
        <p class="body_p"><strong >Search By: <?php echo $stype; ?> &nbsp; Keyword  :<?php echo $s; ?> </strong>&nbsp;</p>
        
        <table border="0" class="in1">
      <tr>
        <td><?php if ($pageNum_Record > 0) { // Show if not first page ?>
              <a href="<?php printf("%s?pageNum_Record=%d%s", $currentPage, 0, $queryString_Record); ?>">First</a>
              <?php } // Show if not first page ?>        </td>
        <td><?php if ($pageNum_Record > 0) { // Show if not first page ?>
              <a href="<?php printf("%s?pageNum_Record=%d%s", $currentPage, max(0, $pageNum_Record - 1), $queryString_Record); ?>">Previous</a>
              <?php } // Show if not first page ?>        </td>
        <td><?php if ($pageNum_Record < $totalPages_Record) { // Show if not last page ?>
              <a href="<?php printf("%s?pageNum_Record=%d%s", $currentPage, min($totalPages_Record, $pageNum_Record + 1), $queryString_Record); ?>">Next</a>
              <?php } // Show if not last page ?>        </td>
        <td><?php if ($pageNum_Record < $totalPages_Record) { // Show if not last page ?>
              <a href="<?php printf("%s?pageNum_Record=%d%s", $currentPage, $totalPages_Record, $queryString_Record); ?>">Last</a>
              <?php } // Show if not last page ?>        </td>
      </tr>
    </table>
    Records <?php echo ($startRow_Record + 1) ?> to <?php echo min($startRow_Record + $maxRows_Record, $totalRows_Record) ?> of <?php echo $totalRows_Record ?>
<table border="0">
      <tr>
        <td><?php if ($pageNum_Record > 0) { // Show if not first page ?>
            <a href="<?php printf("%s?pageNum_Record=%d%s", $currentPage, 0, $queryString_Record); ?>"><img src="First.gif" border="0" /></a>
            <?php } // Show if not first page ?>        </td>
        <td><?php if ($pageNum_Record > 0) { // Show if not first page ?>
            <a href="<?php printf("%s?pageNum_Record=%d%s", $currentPage, max(0, $pageNum_Record - 1), $queryString_Record); ?>"><img src="Previous.gif" border="0" /></a>
            <?php } // Show if not first page ?>        </td>
        <td><?php if ($pageNum_Record < $totalPages_Record) { // Show if not last page ?>
            <a href="<?php printf("%s?pageNum_Record=%d%s", $currentPage, min($totalPages_Record, $pageNum_Record + 1), $queryString_Record); ?>"><img src="Next.gif" border="0" /></a>
            <?php } // Show if not last page ?>        </td>
        <td><?php if ($pageNum_Record < $totalPages_Record) { // Show if not last page ?>
            <a href="<?php printf("%s?pageNum_Record=%d%s", $currentPage, $totalPages_Record, $queryString_Record); ?>"><img src="Last.gif" border="0" /></a>
            <?php } // Show if not last page ?>        </td>
      </tr>
    </table> 
</td>
        </tr>
        </form>
    </table>
    
    <?php if($totalRows_Record!=0){ ?>
    <table border="0" align="center" width="900">
      <tr>
        <td align="center"><h3>Item</h3></td>
        <td align="center"><h3>Title</h3></td>
        <td align="center"><h3>Item ID</h3></td>
        <td align="center"><h3>Author</h3></td>
        <td align="center"><h3>Publisher</h3></td>
        <td align="center"><h3>Item Type</h3></td>
        <td align="center" class="log">&nbsp;</td>
      </tr>
      <?php do { ?>
        <tr>
          <td align="center" class="in"><a href="viewItem.php?id=<?php echo $row_Record['Item_ID']; ?>">&nbsp; </a> <img src="upload/<?php echo $row_Record['Item_Image']; ?>" width="75" height="auto" /></td>
          <td align="center" class="in"><?php echo $row_Record['Title']; ?>&nbsp; </td>
          <td align="center" class="in"><?php echo $row_Record['Item_ID']; ?>&nbsp; </td>
          <td align="center" class="in"><?php 
			// To get authors .........
			if($row_Record['Item_Type_ID']!=2){
			if($row_Record['Item_Type_ID']==1){
			$sqla="SELECT * FROM books as b, author as a WHERE b.Item_ID='$row_Record[Item_ID]' AND b.Author_ID=a.Author_ID";
			}
			if($row_Record['Item_Type_ID']==3){
			$sqla="SELECT * FROM serial as s, author as a WHERE s.Item_ID='$row_Record[Item_ID]' AND s.Author_ID=a.Author_ID";
			}
			
			
			
			$resulta=mysqli_query($con,$sqla);
			while($rowa=mysqli_fetch_array($resulta))
			{
			
			echo $rowa['Author_Name']."<br />"; } }
			
			?> </td>
          <td align="center" class="in"><?php echo $row_Record['Publisher_Name']; ?>&nbsp; </td>
          <td align="center" class="in"><?php echo $row_Record['Item_Type_Name']; ?>&nbsp; </td>
          <td align="center"><a href="viewItemDetails.php?id=<?php echo $row_Record['Item_ID'];  ?>">View</a> </td>
        </tr>
        <?php } while ($row_Record = mysql_fetch_assoc($Record)); ?>
    </table>
    <br />
    
    <?php }else{
	echo "No Item found";
	}
	 ?>
    
    
    </p></td>
  </tr>
  <tr bgcolor="#FF6600" id="footer">
    <td height="50" colspan="2" align="center" bgcolor="#CC6600">Copyright &copy; 2013 Negombo South International School. All Rights Reserved</td>
  </tr>
</table>
</body>
</html>
<?php
mysql_free_result($Record);
 } else {
	header("Location:index.php?id=Please Enter Email and Password"); }?>