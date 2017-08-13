<?php
session_start();
//To restrict other users from accessing this page
if($_SESSION['userid']!="" && $_SESSION['pass']!="" && ($_SESSION['cat']=="Librarian" || $_SESSION['cat']=="Library Assistant")) {
	
$iid=$_REQUEST['id'];
//To add the database connectivity
include "include/dbconnection.php";

//To view added item
$sql="SELECT * FROM item as i,item_type as it,publisher as p WHERE i.Item_ID='$iid' AND it.Item_Type_ID=i.Item_Type_ID AND p.Publisher_ID=i.Publisher_ID";
$result=mysqli_query($con,$sql);
$row=mysqli_fetch_array($result);

//Select all the data from copy table where the item id of copy table is equal to item id of last added item 
$sql1="SELECT * FROM copy WHERE Item_ID=$iid";
$result1=mysqli_query($con,$sql1);
$row1=mysqli_fetch_array($result1);
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Item Details</title>
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
	background-image: url(/Images/Wall%20Texture%20Bkgd--Yellow-edtd.jpg);
	color: #804000;
	font-family: Georgia, "Times New Roman", Times, serif;
}
</style>
<link href="mystyle.css" rel="stylesheet" type="text/css"/>
<link href="mystyleNew.css" rel="stylesheet" type="text/css" />
</head>

<body>
<table width="1183" border="0" align="center">
  <tr>
    <td height="187" colspan="2"><a href="index.php"><img src="images/website banner.jpg" width="1183" height="185" /></a></td>
  </tr>
  <tr align="center" bgcolor="#B6AD89" class="in1">
    <td width="916" align="right" valign="top"><blockquote>
      <h3 class="links_color"><em><?php if($_SESSION['cat']=="Librarian"){?><a href="librarianaccount.php" class="links_color">Home</a><?php } if($_SESSION['cat']=="Library Assistant"){?><a href="libraryassistant.php" class="links_color">Home</a><?php  } ?></em> | <em><a href="user management.php" class="links_color">User Management</a></em> | <em><a href="library item management.php" class="links_color">Library Item Management</a></em> | <em><a href="issue_return_items.php" class="links_color">Issue/Return Items</a></em> | <em><a href="reports.php" class="links_color">Reports</a></em> | <em><a href="search.php" class="links_color">Search</a></em></h3>
    </blockquote></td>
    <td width="267" align="right" valign="top">Welcome...<?php echo $_SESSION['fname']."-".$_SESSION['cat']; ?> | <a href="signout.php"> Logout</a></td>
  </tr>
  <tr bgcolor="#EAE5CE">
    <td colspan="2" align="center"><blockquote>
      <div>
        <h3><a href="editItemSearch.php" class="links_color">Edit Item</a></h3>
</div>

      
      <table width="900" border="0">
          <tr>
            <td width="200" rowspan="9" align="center" valign="middle"><img src="upload/<?php echo $row['Item_Image']; ?>" width="200" height="auto" />&nbsp;</td>
            <td width="276" rowspan="9" align="justify" valign="Top" >
              
            <p style="margin:25px"><b>Remark</b><br /><br /><?php echo $row['Remarks']; ?></p></td>
            <td><strong>Title:</strong></td>
            <td><span class="body_p"><?php echo $row['Title']; ?></span></td>
          </tr>
          <tr>
          <td width="153"><strong>Item ID</strong></td>
          <td width="253"><span class="body_p"><?php echo $row['Item_ID']; ?></span></td>
          </tr>
        <tr>
          <td><strong>Item Type</strong></td>
          <td class="body_p"><?php echo $row['Item_Type_Name']; ?>&nbsp;</td>
          </tr>
       
        <tr>
          <td><strong>Call No</strong></td>
          <td><?php echo $row['Call_No']; ?></td>
        </tr>
        <tr>
          <td><strong>Publisher Name</strong></td>
          <td><?php echo $row['Publisher_Name']; ?>&nbsp;</td>
          </tr>
        <tr>
          <td><strong>Published Date</strong></td>
          <td><?php echo $row['Publ_Date']; ?>&nbsp;</td>
          </tr>
        <tr>
          <td><strong>Published Place</strong></td>
          <td><?php echo $row['Publ_Place']; ?>&nbsp;</td>
          </tr>
        <tr>
          <td><strong>Edition</strong></td>
          <td><?php echo $row['Edition']; ?></td>
        </tr>
        <tr>
          <td colspan="2" valign="top" >
          <table width="400">
            <?php if($row['Item_Type_ID']==1){
			$sqlb="SELECT * FROM books WHERE Item_ID=$iid";
			$resultb=mysqli_query($con,$sqlb);
			$rowb=mysqli_fetch_array($resultb);				
			
			 ?>
            <tr>
              <td width="151"><strong>ISBN </strong></td>
              <td width="237"><?php echo $rowb['ISBN']; ?></td>
            </tr>
            <tr>
              <td><strong>Author(s) </strong></td>
              <td><?php $sqlath="SELECT Author_Name FROM author as a, books as b WHERE a.Author_ID=b.Author_ID AND b.Item_ID='$iid'";
		   $resultath=mysqli_query($con,$sqlath);
		  while($rowath=mysqli_fetch_array($resultath)){
			  
			  echo $rowath['Author_Name']."<br />";
		  }
		  ?>              </td>
            </tr>
            <tr>
              <td><strong>Pages</strong></td>
              <td><?php echo $rowb['Pages']; ?></td>
            </tr>
            <?php } ?>
            <?php //
			if($row['Item_Type_ID']==2){
			$sqlc="SELECT * FROM `cd/dvd` WHERE Item_ID=$iid";
			$resultc=mysqli_query($con,$sqlc);
			$rowc=mysqli_fetch_array($resultc);		
		
			 ?>
            <tr>
              <td><strong>Size </strong></td>
              <td><?php echo $rowc['Size']; ?></td>
            </tr>
            <?php } ?>
            <?php //
	  		if($row['Item_Type_ID']==3){
			$sqls="SELECT * FROM serial WHERE Item_ID=$iid";
			$results=mysqli_query($con,$sqls);
			$rows=mysqli_fetch_array($results);		
			
			 ?>
            <tr>
              <td><strong>ISSN </strong></td>
              <td><?php echo $rows['ISSN']; ?></td>
            </tr>
            <tr>
              <td><strong>Author(s) </strong></td>
              <td><?php $sqlath="SELECT Author_Name FROM author as a, serial as s WHERE a.Author_ID=s.Author_ID AND s.Item_ID='$iid'";
		   $resultath=mysqli_query($con,$sqlath);
		  while($rowath=mysqli_fetch_array($resultath)){
			  
			  echo $rowath['Author_Name']."<br>";
		  }
		  ?>              </td>
            </tr>
            <tr>
              <td><strong>Pages</strong></td>
              <td><?php echo $rows['Pages']; ?></td>
            </tr>
            <?php } ?>
          </table></td>
          </tr>
        
        
        <tr>
          <td height="25" colspan="4" align="center"><label>
            <a href="editItemEdit.php?id=<?php echo $iid; ?>"><input type="button" name="Edit" id="Edit" value="Edit" /></a>
            </label></td>
        </tr>
        <tr>
          <td height="109" colspan="4" align="center"><table width="600">
            <tr class="in">
              <td bgcolor="#FFFFFF">Accession No</td>
              <td bgcolor="#FFFFFF">State</td>
              <td bgcolor="#FFFFFF">Purchased Date</td>
              <td bgcolor="#FFFFFF">Added Date</td>
              <td bgcolor="#FFFFFF">Price</td>
              <td bgcolor="#FFFFFF">Shelf No</td>
              <td bgcolor="#FFFFFF">Availability</td>
              <td bgcolor="#FFFFFF">&nbsp;</td>
            </tr>
            <?php 
		  //To get Copies
			$sqlc="SELECT * FROM copy WHERE Item_ID='$row[Item_ID]'";
			$resultc=mysqli_query($con,$sqlc);
          while($rowc=mysqli_fetch_array($resultc))
			{
				?>
            <tr class="in">
              <td bgcolor="#FFFFFF"><?php echo $rowc['Accession_No']; ?></td>
              <td bgcolor="#FFFFFF">
			  
			  <?php if($rowc['State_ID']==1){
			  	echo "Lending";
			  }else{
			  	echo "Reference";
			  } ?></td>
              <td bgcolor="#FFFFFF"><?php echo $rowc['Purchased_Date']; ?>&nbsp;</td>
              <td bgcolor="#FFFFFF"><?php echo $rowc['Date_Added']; ?>&nbsp;</td>
              <td bgcolor="#FFFFFF"><?php  if($rowc['Price']=="d d"){
			  	echo "Donation";
			  }else{
			  echo $rowc['Price']; 
			  
			  } ?>&nbsp;</td>
              <td bgcolor="#FFFFFF"><?php echo $rowc['Shelf_No']; ?> </td>
              <td bgcolor="#FFFFFF"><?php echo $rowc['Availability']; ?></td>
              <td bgcolor="#FFFFFF"><a href="editCopyAcc.php?id=<?php echo $iid; ?>&acc=<?php echo $rowc['Accession_No']; ?>">Edit</a>&nbsp;</td>
            </tr>
            <?php } ?>
          </table>             </td>
          </tr>
      </table>
      
  
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
}
?>