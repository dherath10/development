<?php
session_start();

//To create the database connectivity
include "include/dbconnection.php";

//To list Publisher Names
$sqlpub="SELECT * FROM publisher";
$resultpub=mysqli_query($con,$sqlpub);

//To get the current year in 4 digits(here 'date' below is a function)
$y=date("Y");

if($_SESSION['userid']!="" && $_SESSION['pass']!="" && ($_SESSION['cat']=="Librarian" || $_SESSION['cat']=="Library Assistant")) {

//To assign item types into Item Type array
$itype1=array("","Book","CD/DVD","Serial");

//To get Item
$item=$_REQUEST['id'];
//To get added accession Numbers
$arracc=$_SESSION['arracc'];
$sql="SELECT * FROM item as i,item_type as it, publisher as p WHERE i.Item_ID='$item' AND i.Item_Type_ID=it.Item_Type_ID  AND i.Publisher_ID=p.Publisher_ID";
$result=mysqli_query($con,$sql);
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
    <td width="856" align="left" valign="top"><blockquote>
      <h4 class="links_color"><em>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<?php if($_SESSION['cat']=="Admin"){?><a href="adminpanel.php" class="links_color">Home</a><?php } if($_SESSION['cat']=="Librarian"){?><a href="librarianaccount.php" class="links_color">Home</a></em> | <em><a href="user management.php" class="links_color">User Management</a></em> | <em><a href="library item management.php" class="links_color">Library Item Management</a></em> | <em><a href="issue_return_items.php" class="links_color">Issue/Return Items</a></em> | <em><a href="reports.php" class="links_color">Reports</a></em> | <em><a href="online_catalog_search.php" class="links_color">Online Catalog</a></em><?php  } ?></h4>
    </blockquote></td>
    <td width="327" align="right" valign="middle"><span class="in1">Welcome <?php echo $_SESSION['fname']."-".$_SESSION['cat']; ?> | <a href="signout.php" class="in1"> Logout</a></span></td>
  </tr>
  <tr bgcolor="#EAE5CE">
    <td colspan="2" align="center"><blockquote>
    <br />
      <table width="700" border="0">
        <?php while($row=mysqli_fetch_array($result)){ ?>
        <tr>
    <td width="170" rowspan="10" align="center"><img src="upload/<?php echo $row['Item_Image']; ?>" width="170" height="auto" />&nbsp;</td>
    <td width="97">&nbsp;</td>
    <td width="147" class="body_p">Item ID</td>
    <td width="268"><?php echo $row['Item_ID']; ?>&nbsp;</td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td class="body_p">Title</td>
    <td><?php echo $row['Title']; ?>&nbsp;</td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td class="body_p">Author</td>
    <td><?php 
			// To get authors .........
			if($row['Item_Type_ID']==1||$row['Item_Type_ID']==3){
			if($row['Item_Type_ID']==1){
			$sqla="SELECT * FROM books as b, author as a WHERE b.Item_ID='$row[Item_ID]' AND b.Author_ID=a.Author_ID";
			}
			if($row['Item_Type_ID']==3){
			$sqla="SELECT * FROM serial as s, author as a WHERE s.Item_ID='$row[Item_ID]' AND s.Author_ID=a.Author_ID";
			}
			$resulta=mysqli_query($con,$sqla);
			$co=mysqli_num_rows($resulta);
			$count=0;
			while($rowa=mysqli_fetch_array($resulta))
			{
			$count++;
			echo $rowa['Author_Name'];
			if($co==$count){
				
			}else{
			echo ",";
			}
			}	
			}?></td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td class="body_p">Publisher</td>
    <td><?php echo $row['Publisher_Name']; ?>&nbsp;</td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td class="body_p">Published Date</td>
    <td><?php echo $pubd=$row['Publ_Date']; ?>&nbsp;</td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td class="body_p">Type</td>
    <td><?php echo $row['Item_Type_Name']; ?>&nbsp;</td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td class="body_p">Edition</td>
    <td><?php echo $row['Edition']; ?>&nbsp;</td>
  </tr>
 <?php 
 //To get book details
 if($row['Item_Type_ID']==1){ 
 $sqlbook="SELECT * FROM books WHERE Item_ID='$item'";
 $resultbook=mysqli_query($con,$sqlbook);
 $rowbook=mysqli_fetch_array($resultbook);
 
 ?>
  <tr>
    <td>&nbsp;</td>
    <td class="body_p">ISBN</td>
    <td><?php echo $rowbook['ISBN']; ?>&nbsp;</td>
  </tr>
   
  <tr>
    <td>&nbsp;</td>
    <td class="body_p">Pages</td>
    <td><?php echo $rowbook['Pages']; ?>&nbsp;</td>
  </tr>
  <?php } ?>
   <?php 
 //To get serial details
 if($row['Item_Type_ID']==3){ 
 $sqlserial="SELECT * FROM serial WHERE Item_ID='$item'";
 $resultserial=mysqli_query($con,$sqlserial);
 $rowserial=mysqli_fetch_array($resultserial);
 
 ?>
  <tr>
    <td>&nbsp;</td>
    <td class="body_p">ISSN</td>
    <td><?php echo $rowserial['ISSN']; ?>&nbsp;</td>
  </tr>
   
  <tr>
    <td>&nbsp;</td>
    <td class="body_p">Pages</td>
    <td><?php echo $rowserial['Pages']; ?>&nbsp;</td>
  </tr>
  <?php } ?>

              
    <?php 
 //To get serial details
 if($row['Item_Type_ID']==2){ 
 $sqlcd="SELECT * FROM `cd/dvd` WHERE Item_ID='$item'";
 $resultcd=mysqli_query($con,$sqlcd);
 $rowcd=mysqli_fetch_array($resultcd);
 
 ?>

   
  <tr>
    <td>&nbsp;</td>
    <td class="body_p">Size</td>
    <td><?php echo $rowcd['Size']; ?>&nbsp;</td>
  </tr>
  <?php } ?>
  <tr>
    <td colspan="3" align="center"><br /><a href="viewItemDetails.php?id=<?php echo $row['Item_ID'];  ?>" target="_blank"><input type="button" value="View" /></a>&nbsp;</td>
    </tr>
  <?php 
			
			  
			  } ?>            
              
 
</table>
      <hr  />
      <br />
      <table width="581" border="0">
        <tr>
          <td width="250" height="35">Purchased Date</td>
          <td width="317" height="35"><?php echo $_SESSION['pday']; ?></td>
        </tr>
        <?php
        $p=$_SESSION['price'];
		   //To separate currency and price
		  $pr=explode(" ",$p);
		  ?>
        <tr>
          <td height="35"><?php if($pr[0]=='d'){ //Donated
				echo "Donated";
		}else{
				echo "Price";//Purchased
		}
          
          ?>
          </td>
          <td height="35"><?php
		  //To display whether the price is not yet decided or donated or purchased 
		  //To get price (0 0 or  d d or currency price )
		   
		  if($pr[0]=='0'){ //Not yet decide 
			  echo "";
		  }elseif($pr[0]=='d'){ //Donated
				echo "";
		}else{
				echo $_SESSION['price'];//Purchased
		}
			  
		  
		   ?></td>
        </tr>
        <tr>
          <td>No of Copies:</td>
          <td><span id="lending1"></span>&nbsp; </td>
        </tr>
        <tr>
          <td height="35">&nbsp;&nbsp;&nbsp;&nbsp;Lending</td>
          <td height="35"><?php echo $_SESSION['lending']; ?>&nbsp;</td>
        </tr>
        <tr>
          <td height="35">&nbsp;&nbsp;&nbsp;&nbsp;Reference</td>
          <td height="35" class="body_p"><?php echo $_SESSION['reference']; ?>&nbsp;</td>
        </tr>
        <tr>
          <td height="35">Shelf No</td>
          <td height="35" class="body_p"><?php echo $_SESSION['shelf']; ?></td>
        </tr>
        <tr>
          <td height="35">Accession Number(s)</td>
          <td height="35" class="body_p">
          <?php
		  foreach($arracc as $e){
		  	echo sprintf("%06d",$e)." |";
		  }
          ?>
          &nbsp;</td>
        </tr>
        <tr>
          <td height="25" colspan="2" align="center" ><a href="editCopy.php?id=<?php echo $item; ?>&msg='yes'"><input type="submit" name="EditCopy" id="EditCopy" value="Edit Copy" /></a></td>
          </tr>
        <tr>
          <td height="25" colspan="2" align="center"><a href="addCopyProcess.php?id=<?php echo $item; ?>">Add Another Copy</a></td>
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