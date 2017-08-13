<?php 
// To get the item type value(1=Book, 2=CD/DVD, 3=Serial)
$itemType=$_REQUEST['id1'];
?>

<?php 

//To create the database connectivity
include "include/dbconnection.php";

//To list Author Names
$sqlauth1="SELECT * FROM author";
$resultauth1=mysqli_query($con,$sqlauth1);

$sqlauth2="SELECT * FROM author";
$resultauth2=mysqli_query($con,$sqlauth2);

$sqlauth3="SELECT * FROM author";
$resultauth3=mysqli_query($con,$sqlauth3);
?>

<?php if($itemType==1){ // To identify the table of Book type ?>	
<table width="581" border="0" align="center">
  <tr>
    <td width="258" height="35">ISBN</td>
    <td width="313" height="35"><label for="isbn"></label>
    <input type="text" name="isbn" id="isbn" onkeypress="return onlyNos1(event,this);" maxlength="13" />&nbsp;<span id="isbn1"></span></td>
  </tr>
  <tr>
    <td height="35">&nbsp;</td>
    <td height="35">Select an author, then continue typing to add more.</td>
  </tr>
  <tr>
    <td width="258" height="35" valign="top">Author </td>
    <td height="35"><label for="author"></label>
      <!--<select name="author1" id="author1">
      <option value="">- Select Author -</option>
              <?php //while($row1=mysqli_fetch_array($resultauth1)){ ?>
              <option value="<?php //echo $row1['Author_ID']; ?>"><?php //echo $row1['Author_Name']; ?></option>
            <?php //} ?>
    </select> -->     
      <input name="author" type="text" required="required" id="author" size="50" /> 
      
     <!-- <a href="javascript:_add_more();" title="Add More">
     <span><img src="images/plus-icon.png" width="25" height="25" border="0" align="absbottom"></span></a>
     <div id="display1"></div>
      <div id="dvFile">    	   </div>   
        -->
      </label></td>
  </tr>
  <tr>
    <td width="258" height="35">Pages</td>
    <td height="35"><label for="pages"></label>
    <input type="number" name="pages" id="pages" min="1" onkeypress="return onlyNos2(event,this);"/></td>
  </tr>
  <tr>
    <td width="258" height="35">&nbsp;</td>
    <td height="35">&nbsp;</td>
  </tr>
</table>
<?php } ?>

<?php if($itemType==3){ ?>
<table width="581" border="0" align="center">
  <tr>
    <td width="255" height="35">ISSN</td>
    <td width="316" height="35"><label for="issn"></label>
    <input type="text" name="issn" id="issn" onkeypress="return onlyNos1(event,this);" maxlength="8" />
           	  
    
    </td>
  </tr>
 
  <tr>
    <td height="35">Volume</td>
    <td height="35">
    <input type="text" name="volume" id="volume" /></td>
  </tr>
  <tr>
    <td height="35">Issue</td>
    <td height="35">
    <input type="text" name="issue" id="issue" /></td>
  </tr>
   <tr>
    <td height="35">&nbsp;</td>
    <td height="35">Select an author, then continue typing to add more</td>
  </tr>
  <tr>
    <td width="255" height="35">Author </td>
    <td height="35"><label for="author4"></label>
    <!--<select name="author1" id="author1">
    <option value="">- Select Author -</option>
    	<?php //while($row1=mysqli_fetch_array($resultauth1)){ ?>
              <option value="<?php //echo $row1['Author_ID']; ?>"><?php //echo $row1['Author_Name']; ?></option>
            <?php //} ?>
    </select> -->
    <input name="author" type="text" required="required" id="author" size="50" /> 
      
      <!-- <a href="javascript:_add_more_se();" title="Add More">
     <span><img src="images/plus-icon.png" width="25" height="25" border="0" align="absbottom"></span></a>
     <div id="display2"></div>
      <div id="dvFiles">    	   </div>   
        -->
      </label></td>
  </tr>
  <tr>
    <td width="255" height="35">Pages</td>
    <td height="35"><label for="pages1"></label>
    <input type="number" name="pages1" id="pages1" min="1" onkeypress="return onlyNos2(event,this);" /></td>
  </tr>
  <tr>
    <td width="255" height="35">&nbsp;</td>
    <td height="35">&nbsp;</td>
  </tr>
</table>
<?php } ?>

<?php if($itemType==2){ ?>
<table width="581" border="0" align="center">
  <tr>
    <td width="317" height="35">Size</td>
    <td width="363" height="35"><label for="issn"></label>
      <input type="text" name="size" required="required" /></td>
  </tr>
  <tr>
    <td width="317" height="35">&nbsp;</td>
    <td height="35"><label for="author4"></label></td>
  </tr>
</table>
<?php 

} ?>
