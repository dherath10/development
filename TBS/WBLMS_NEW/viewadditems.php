<?php
session_start();
//To restrict other users from accessing this page
if($_SESSION['userid']!="" && $_SESSION['pass']!="" && ($_SESSION['cat']=="Librarian" || $_SESSION['cat']=="Library Assistant")) {
	
$iid=$_REQUEST['id'];
//To add the database connectivity
include "include/dbconnection.php";

//To view added item
$sql="SELECT * FROM item as i,item_type as it,publisher as p,category as c WHERE i.Item_ID='$iid' AND it.Item_Type_ID=i.Item_Type_ID AND p.Publisher_ID=i.Publisher_ID AND i.cid=c.cid";
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
<title>View Added items</title>
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
    <td width="855" align="right" valign="top"><blockquote>
      <h4 class="links_color"><em><?php if($_SESSION['cat']=="Admin"){?><a href="adminpanel.php" class="links_color">Home</a><?php } if($_SESSION['cat']=="Librarian"){?><a href="librarianaccount.php" class="links_color">Home</a></em> | <em><a href="user management.php" class="links_color">User Management</a></em> | <em><a href="library item management.php" class="links_color">Library Item Management</a></em> | <em><a href="issue_return_items.php" class="links_color">Issue/Return Items</a></em> | <em><a href="reports.php" class="links_color">Reports</a></em> | <em><a href="online_catalog_search.php" class="links_color">Online Catalog</a></em><?php  } ?></h4>
    </blockquote></td>
    <td width="328" align="right" valign="top">Welcome <?php echo $_SESSION['fname']."-".$_SESSION['cat']; ?> | <a href="signout.php"> Logout</a></td>
  </tr>
  <tr bgcolor="#EAE5CE">
    <td colspan="2" align="center"><blockquote><br />
      <form action="editAddItem.php?id=<?php echo $iid; ?>&id1=<?php echo $row['Item_Type_ID']; ?>" method="post">
        <table width="530" border="0">
        <tr>
          <th height="36" colspan="2" align="left" scope="col"><blockquote>
            <h3 align="center">New Item Added Successfully</h3>
          </blockquote></th>
          </tr>
        <tr>
          <td>&nbsp;</td>
          <td>&nbsp;</td>
        </tr>
        <tr>
          <td colspan="2"><div align="center">
          <img src="upload/<?php echo $row['Item_Image']; ?>" width="200" height="auto" />
          
          </div></td>
        </tr>
        <tr>
          <td colspan="2"><div align="center"></div></td>
          </tr>
        <tr>
          <td width="227" height="35">Item ID</td>
          <td width="293" height="35"><?php echo $row['Item_ID']; ?>&nbsp;</td>
        </tr>
        <tr>
          <td height="35">Call No</td>
          <td height="35"><label for="callNo"></label>&nbsp;<span id="callNo1"><?php echo $row['Call_No']; ?></span></td>
        </tr>
        <tr>
          <td height="35">Title</td>
          <td height="35"><?php echo $row['Title']; ?></td>
        </tr>
        <tr>
          <td height="35">Categoty</td>
          <td height="35"><?php echo $row['subcategory']; ?>&nbsp;</td>
        </tr>
        <tr>
          <td height="35">Publisher</td>
          <td height="35"><?php //$sql="SELECT * FROM publisher WHERE Publisher_ID='$row[Publisher_ID]'";
		  //$result=mysqli_query($con,$sql); $array=mysqli_fetch_array($result); 
		  echo $row['Publisher_Name']; ?></td>
        </tr>
        <tr>
          <td height="35">Published Date</td>
          <td height="35"><?php echo $row['Publ_Date']; ?></td>
        </tr>
        <tr>
          <td height="35">Published Place</td>
          <td height="35"><?php echo $row['Publ_Place']; ?></td>
        </tr>
        <tr>
          <td height="35">Purchased Date</td>
          <td height="35"><?php echo $row1['Purchased_Date']; ?></td>
        </tr>
        <tr>
          <td height="35">Date Added</td>
          <td height="35"><?php echo $row1['Date_Added']; ?>        </tr>
        <tr>
          <td height="35">Edition</td>
          <td height="35"><?php echo $row['Edition']; ?></td>
        </tr>
       
        <tr>
          <td height="35">Price</td>
          <td height="35"><?php 
		  //To check whether Donation or Buy
		  $pr=explode(" ",$row1['Price']);
		  
		  if($pr[0]=="d"){
		  echo "Donated";
		  }elseif($pr[0]=="0"){
		  echo "0.0";
		  }else{
		  echo $row1['Price']; } ?></td>
        </tr>
        <tr>
          <td height="35">Shelf No</td>
          <td height="35"><?php echo $row['shelf']; ?></td>
        </tr>
        <tr>
          <td height="35">Remarks</td>
          <td height="35" align="justify"><?php echo $row['Remarks']; ?></td>
        </tr>
        <tr>
          <td height="35">Item Type</td>
          <td height="35"><?php echo $row['Item_Type_Name']; ?></td>
        </tr>
        <?php if($row['Item_Type_ID']==1){
			$sqlb="SELECT * FROM books WHERE Item_ID=$iid";
			$resultb=mysqli_query($con,$sqlb);
			$rowb=mysqli_fetch_array($resultb);				
			
			 ?>
        <tr>
          <td height="35">ISBN </td>
          <td height="35"><?php echo $rowb['ISBN']; ?></td>
        </tr>
        <tr>
          <td height="35">Author(s) </td>
          <td height="35"><?php $sqlath="SELECT Author_Name FROM author as a, books as b WHERE a.Author_ID=b.Author_ID AND b.Item_ID='$iid'";
		   $resultath=mysqli_query($con,$sqlath);
		  while($rowath=mysqli_fetch_array($resultath)){
			  
			  echo $rowath['Author_Name']."<br />";
		  }
		  ?>		  </td>
        </tr>
        <tr>
          <td height="35">Pages</td>
          <td height="35"><?php echo $rowb['Pages']; ?></td>
        </tr>
        <?php } ?>
        
        <?php //
			if($row['Item_Type_ID']==2){
			$sqlc="SELECT * FROM `cd/dvd` WHERE Item_ID=$iid";
			$resultc=mysqli_query($con,$sqlc);
			$rowc=mysqli_fetch_array($resultc);		
		
			 ?>
        <tr>
          <td height="35">Size </td>
          <td height="35"><?php echo $rowc['Size']; ?></td>
        </tr>
      <?php } ?>
      
      <?php //
	  		if($row['Item_Type_ID']==3){
			$sqls="SELECT * FROM serial WHERE Item_ID=$iid";
			$results=mysqli_query($con,$sqls);
			$rows=mysqli_fetch_array($results);		
			
			 ?>
        <tr>
          <td height="35">ISSN </td>
          <td height="35"><?php echo $rows['ISSN']; ?></td>
        </tr>
         <tr>
          <td height="35">Volume </td>
          <td height="35"><?php echo $rows['Volume']; ?></td>
        </tr>
         <tr>
          <td height="35">Issue </td>
          <td height="35"><?php echo $rows['Issue']; ?></td>
        </tr>
        <tr>
          <td height="35">Author(s) </td>
          <td height="35"><?php $sqlath="SELECT Author_Name FROM author as a, serial as s WHERE a.Author_ID=s.Author_ID AND s.Item_ID='$iid'";
		   $resultath=mysqli_query($con,$sqlath);
		  while($rowath=mysqli_fetch_array($resultath)){
			  
			  echo $rowath['Author_Name']."<br>";
		  }
		  ?>		  </td>
        </tr>
        <tr>
          <td height="35">Pages</td>
          <td height="35"><?php echo $rows['Pages']; ?></td>
        </tr>
        <tr>
          <td height="35">&nbsp;</td>
          <td height="35">&nbsp;</td>
        </tr>
       
        <?php } ?>
         <tr>
          <td height="35" colspan="2" align="center"><input type="submit" name="edit" id="edit" value=" Edit " /></td>
          </tr>
      </table>
    </form>
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