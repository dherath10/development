<?php
session_start();

if($_SESSION['userid']!="" && $_SESSION['pass']!=""){

//To connect database
include "include/dbconnection.php";


if(isset($_POST['view'])){
	$stype=$_POST['search_type']; 
	$s=trim($_POST['search']); // trim() function removes whitespace and other predefined characters from both sides of a string
	
if($stype=="Title"){
$sql="SELECT * FROM item as i,item_type as it,copy as c,publisher as p WHERE i.Title LIKE '%$s%' AND i.Item_Type_ID=it.Item_Type_ID AND c.Item_ID=i.Item_ID AND i.Publisher_ID=p.Publisher_ID AND i.Item_Type_ID!=3";
}	
if($stype=="Publisher"){
$sql="SELECT * FROM item as i,item_type as it,copy as c,publisher as p WHERE p.Publisher_Name LIKE '%$s%' AND i.Item_Type_ID=it.Item_Type_ID AND c.Item_ID=i.Item_ID AND i.Publisher_ID=p.Publisher_ID AND i.Item_Type_ID!=3";
}
if($stype=="Call_No"){
$sql="SELECT * FROM item as i,item_type as it,copy as c,publisher as p WHERE i.Call_No LIKE '%$s%' AND i.Item_Type_ID=it.Item_Type_ID AND c.Item_ID=i.Item_ID AND i.Publisher_ID=p.Publisher_ID AND i.Item_Type_ID!=3";
}
if($stype=="Item"){
$sql="SELECT * FROM item as i,item_type as it,copy as c, publisher as p, author as a WHERE it.Item_Type_Name LIKE '%$s%' AND i.Item_Type_ID=it.Item_Type_ID  AND c.Item_ID=i.Item_ID AND i.Publisher_ID=p.Publisher_ID AND i.Item_Type_ID!=3";
}
if($stype=="Author"){
$sql="SELECT * FROM item as i,item_type as it, books as b,author as a,copy as c, publisher as p WHERE a.Author_Name LIKE '%$s%' AND i.Item_Type_ID=it.Item_Type_ID AND i.Item_ID=b.Item_ID AND a.Author_ID=b.Author_ID AND c.Item_ID=i.Item_ID AND i.Publisher_ID=p.Publisher_ID AND i.Item_Type_ID!=3" ;
}
$result=mysqli_query($con,$sql);
$no=mysqli_num_rows($result);
$result1=mysqli_query($con,$sql);
$no1=mysqli_num_rows($result1);
}

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
    <td width="852" align="left" valign="top"><blockquote>
      <h3 class="links_color"><em><?php // To give seperate home pages according to the user 
	   if ($_SESSION['cat']=="Student") { ?><a href="studentaccount.php" class="links_color">Home</a><?php } if ($_SESSION['cat']=="Teacher") { ?><a href="teacheraccount.php" class="links_color">Home</a><?php } ?></em> <em><?php if($_SESSION['cat']=="Librarian"){?> <a href="librarianaccount.php" class="links_color">Home</a></em><?php } if($_SESSION['cat']=="Library Assistant"){ ?><a href="libraryassistant.php" class="links_color">Home</a>
      <?php  } ?>
      </em></h3>
    </blockquote></td>
    <td width="331" align="right" valign="middle"><span class="in1">Welcome <?php echo $_SESSION['fname']."-".$_SESSION['cat']; ?> | <a href="signout.php">Logout </a></span></td>
  </tr>
  <tr bgcolor="#EAE5CE">
    <td colspan="2" align="center">
   
    <p></p>
    <table width="1054" border="0" align="center">
      <tr>
        <td width="234" class="body_p"><h3>Search Catalog</h3></td>
        <td width="211">&nbsp;</td>
        <td width="133">&nbsp;</td>
        <td width="458">&nbsp;</td>
      </tr>
      <tr>
        <td class="alert"><?php /////////////////////////////
			if(isset($_REQUEST['msg'])){ 
			
			echo $_REQUEST['msg']; 
			}?>&nbsp;</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
      </tr>
      <form name="view" method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>">
      <tr>
        <td align="center"><label for="search_type"></label>
          <select name="search_type" id="search_type" required="required">
<option value="" selected="selected">Select </option>
            <option value="Author">Author</option>
            <option value="Title">Title</option>
            <option value="Publisher">Publisher</option>
            <option value="Call_No">Call No</option>
          </select> </td>
        <td><label for="search"></label>
          <input type="text" name="search" id="search" required="required"/></td>
        <td align="center"><input name="view" type="submit" class="co" id="view" value="View Item" /></td>
        <td><input name="back" type="reset" class="co" id="back" value=" Back " /></td>
      </tr>
      <tr>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
      </tr></form>
    </table>
    
     <?php if(isset($_POST['view'])){ ?>
    <table width="700" border="0">
  <tr>
    <td width="150" class="body_p1"><strong>Search Type :</strong></td>
    <td width="200" class="body_p"> <?php echo $stype; ?>&nbsp;</td>
    <td width="150" class="body_p1"><strong>Keyword :</strong></td>
    <td width="200" class="body_p"> <?php echo $s; ?>&nbsp;</td>
  </tr>
</table>
<?php } ?>
    <?php if(isset($_POST['view'])){
	if($no1!=0) { ?>  <?php while($row1=mysqli_fetch_array($result1)){ ?>
    <table width="700" border="0" align="center">
  
    
      <tr>
        <td>&nbsp;</td>
        <td colspan="2">&nbsp;</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
      </tr>
      <tr>
        <td>&nbsp;</td>
        <td colspan="2">&nbsp;</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
      </tr>
      <tr class="body_p">
        <td height="179" width="200"><input type="image" name="desert_flower" id="desert_flower" src="upload/<?php echo $row1['Item_Image']; ?>" width="150" height="auto" /></td>
        <td colspan="2" width="400"><label for="search">          
        <strong>Accession No: </strong> : <?php echo $row1['Accession_No']; ?><br />
        <strong>Title</strong> : <?php echo $row1['Title']; ?><br />
            <strong>Author</strong> :
            <?php if($row1['Item_Type_Name']=="Book"){
			
			$sql="SELECT * FROM books as b, author as a WHERE b.Item_ID='$row1[Item_ID]' AND a.Author_ID=b.Author_ID";
			$result=mysqli_query($con,$sql);
			while($row2=mysqli_fetch_array($result)){
				echo $row2['Author_Name'].",";
			}
			
			} ?>
            
            
             <br />
            <strong>Item Type</strong> : <?php echo $row1['Item_Type_Name']; ?><br />
            <strong>Publisher</strong> : <?php echo $row1['Publisher_Name']; ?><br />
            <strong>Year</strong> : <?php echo $row1['Publ_Date']; ?><br />
            <strong>Edition</strong> : <?php echo $row1['Edition']; ?><br />
              <strong>Availability</strong> : <?php echo $row1['Availability']; ?><br />
        </label></td>
        <td align="center">
        <?php
		if($row1['Availability']!="Available"){
			?><input name="reserve" type="submit" class="co" id="reserve" value="Not Avialable" disabled="disabled"/><?php
			
		}else{
		?>
       <a href="online_reservation.php?aid=<?php echo $row1['Accession_No']; ?>"> <input name="reserve" type="submit" class="co" id="reserve" value="Reserve"/></a>
		<?php	
		}
            ?>      </td>
        <td>&nbsp;</td>
      </tr>
      <tr>
        <td>&nbsp;</td>
        <td colspan="2">&nbsp;</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
      </tr>
    </table>  
    <?php } ?>
    <?php }else { echo "<p class='alert'>No Items Found</p>"; }} ?></td>
  </tr>
  <tr bgcolor="#FF6600" id="footer">
    <td height="50" colspan="2" align="center" bgcolor="#CC6600">Copyright &copy; 2013 Negombo South International School. All Rights Reserved</td>
  </tr>
</table>
</body>
</html>
<?php } else {
	header("Location:index.php?id=Please Enter Email and Password"); }?>