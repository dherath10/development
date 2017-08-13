<?php 
// To get the item type value(1=Book, 2=CD/DVD, 3=Serial)
$itemType=$rowItem['Item_Type_ID'];

//To get an Item Id
$iid=$rowItem['Item_ID'];
?>

<?php 

//To create the database connectivity
include "include/dbconnection.php";

//To list Author Names

$s="SELECT * FROM author";
$r=mysqli_query($con,$s);

$s1="SELECT * FROM author";
$r1=mysqli_query($con,$s1);

$s2="SELECT * FROM author";
$r2=mysqli_query($con,$s2);

$s3="SELECT * FROM author";
$r3=mysqli_query($con,$s3);

if($itemType==1){
//To Get ISBN n Pages
$sqlauth1="SELECT * FROM books as b,author as a WHERE b.Item_ID='$iid' AND b.Author_ID=a.Author_ID";
$resultauth1=mysqli_query($con,$sqlauth1);
$row1=mysqli_fetch_array($resultauth1);

//To get No of authors
$sqlauth2="SELECT * FROM books as b,author as a WHERE b.Item_ID='$iid' AND b.Author_ID=a.Author_ID";
$resultauth2=mysqli_query($con,$sqlauth2);
$no=mysqli_num_rows($resultauth2);
}
if($itemType==3){
//To Get ISSN n Pages
$sqlauth3="SELECT * FROM serial as s,author as a WHERE s.Item_ID='$iid' AND s.Author_ID=a.Author_ID";
$resultauth3=mysqli_query($con,$sqlauth3);
$row3=mysqli_fetch_array($resultauth3);

//To get No of authors
$sqlauth4="SELECT * FROM serial as s,author as a WHERE s.Item_ID='$iid' AND s.Author_ID=a.Author_ID";
$resultauth4=mysqli_query($con,$sqlauth4);

$no=mysqli_num_rows($resultauth4);
}

if($itemType==2){
//To Get The size
$sqlauth5="SELECT * FROM `cd/dvd` as c WHERE c.Item_ID='$iid'";
$resultauth5=mysqli_query($con,$sqlauth5);
$row5=mysqli_fetch_array($resultauth5);


}
?>

<?php if($itemType==1){ // To identify the table of Book type 



?>	
<table width="581" border="0" align="center">
  <tr>
    <td width="258" height="35">ISBN</td>
    <td width="313" height="35"><label for="isbn"></label>
    <input type="text" name="isbn" id="isbn" value="<?php echo $row1['ISBN']; ?>" onkeypress="return onlyNos1(event,this);" /></td>
  </tr>
  
  <tr>
    <td width="258" height="35" valign="top">Author(s) </td>
    <td height="35">
         <?php while($row2=mysqli_fetch_array($resultauth2)){ ?>
      <input type="text" name="author[]" id="author" value="<?php echo $row2['Author_Name']; ?>" />&nbsp;&nbsp;
      <?php if($no!=1){ ?>
      <a href="deleteAuthorBook.php?id=<?php echo $iid; ?>&id1=<?php echo $row2['Author_ID']; ?>">Delete</a> 
      <?php } ?>
      <div id="display1"></div>
      <?php } ?>
      
     
     <a href="javascript:_add_more();" title="Add More">
     <span><input type="button" value="Add More"/></span></a>
    <div id="dvFile">  </div>   </td>
  </tr>   

 
  <tr>
    <td width="258" height="35">Pages</td>
    <td height="35"><label for="pages"></label>
    <input type="text" name="pages" id="pages"  value="<?php echo $row1['Pages']; ?>" onkeypress="return onlyNos1(event,this);" /></td>
  </tr>
</table>
<?php } ?>

<?php if($itemType==3){ ?>
<table width="581" border="0" align="center">
  <tr>
    <td width="258" height="35">ISSN</td>
    <td width="313" height="35">
    <input type="text" name="issn" id="issn" value="<?php echo $row3['ISSN']; ?>" onkeypress="return onlyNos1(event,this);"/></td>
  </tr>
  <tr>
    <td height="35" valign="top">Author(s)</td>
    <td height="35">
    <?php while($rowa=mysqli_fetch_array($resultauth4)){ ?>
      <input type="text" name="authors[]" id="authors" value="<?php echo $rowa['Author_Name']; ?>" />&nbsp;&nbsp;<?php if($no!=1){ ?>
    <a href="deleteAuthorSerial.php?id=<?php echo $iid; ?>&id1=<?php echo $rowa['Author_ID']; ?>">Delete</a><?php } ?> 
      <div id="display2"></div> 
      <?php } ?>
      
     
     <a href="javascript:_add_more_se();" title="Add More">
     <span><input type="button" value="Add More"/></span></a>
      <div id="dvFiles">  </div>
    
     </td>
  </tr>
 
 
  <tr>
    <td width="258" height="35">Pages</td>
    <td height="35"><label for="pages"></label>
    <input type="text" name="pages" id="pages"  value="<?php echo $row3['Pages']; ?>" onkeypress="return onlyNos1(event,this);" /></td>
  </tr>
</table>
<?php } ?>

<?php if($itemType==2){ ?>
<table width="581" border="0" align="center">
  <tr>
    <td width="317" height="35">Size</td>
    <td width="363" height="35"><label for="issn"></label>
      <input type="text" name="size"  value="<?php echo $row5['Size']; ?>" /></td>
  </tr>
</table>
<?php } ?>
