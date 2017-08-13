<?php
session_start();
//To restrict other users from accessing this page
//if($_SESSION['userid']!="" && $_SESSION['pass']!="" && ($_SESSION['cat']=="Librarian" || $_SESSION['cat']=="Library Assistant" )){

//To check whether Search button is clicked or not
if(isset($_POST['search'])){
	include("include/dbconnection.php");

// Search using item type and title
if($_POST['itype']!="" && $_POST['title']!=""){
	
	//To get the title
	$t=$_POST['title'];
	
	
	// To check whther Item type is book
	if($_POST['itype']=='Book'){
		$itype=1;
		$it="books";
	$sql="SELECT * FROM item as i, publisher as p WHERE i.Title LIKE '$_POST[title]%' AND i.Item_Type_ID='$itype' AND p.Publisher_ID=i.Publisher_ID"; 
	$result=mysqli_query($con,$sql);
	}
	if($_POST['itype']=='CD/DVD'){
		$itype=2;
		$sql2="SELECT * FROM item as i, item_type as it,`cd/dvd` as cd,publisher as p WHERE i.Title LIKE'$_POST[title]%' AND it.Item_Type_ID='$itype' AND cd.Item_ID=i.Item_ID AND i.Item_Type_ID=it.Item_Type_ID AND p.Publisher_ID=i.Publisher_ID";
		$result=mysqli_query($con,$sql2);
	}
	
	if($_POST['itype']=='Serial'){
		$itype=3;
		$it="serial";
		$sql3="SELECT * FROM item as i, publisher as p WHERE i.Title LIKE '$_POST[title]%' AND i.Item_Type_ID='$itype' AND p.Publisher_ID=i.Publisher_ID";
		$result=mysqli_query($con,$sql3);
	}
	
//check no of records
$no=mysqli_num_rows($result);

}else{
	//To check whether both Item Type and Title are empty or not
	if($_POST['itype']=="" && $_POST['title']==""){
		$msg="Please Enter Item Type and Title";
		header("Location:addcopy.php?id=$msg"); //Redirect to the addcopy.php
	} 
	//To check whether Item Type is empty or not
	elseif($_POST['itype']==""){
		$msg="Please Enter Item Type";
		$title=$_POST['title']; //To send the title back to the add copy page
		header("Location:addcopy.php?id=$msg&id1=$title"); 
	}else{
		//To check if Title field is empty, then display message
		$msg="Please Enter Title";
		$itype=$_POST['itype']; //To send the item type back to the add copy page
		header("Location:addcopy.php?id=$msg&id2=$itype");
	}
}
}
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Add item</title>
<link href="mystyle.css" rel="stylesheet" type="text/css" />
<link href="mystyleNew.css" rel="stylesheet" type="text/css" />
<link rel="stylesheet" href="style.css" type="text/css">

<!-- <script type="text/javascript" src="googlejquery.js"></script> -->


<link href="css/jquery.autocomplete.css" rel="stylesheet" type="text/css" />
        <link href="css/main.css" rel="stylesheet" type="text/css" />
        <script type="text/javascript" src="js/jquery-1.5.2.min.js"></script>
        <script type="text/javascript" src="js/jquery.autocomplete.pack.js"></script>
        <script type="text/javascript" src="js/script.js"></script>




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
	font-weight: normal;
}
body {
	background-image: url(Images/Wall%20Texture%20Bkgd--Yellow-edtd.jpg);
	color: #804000;
	font-family: Georgia, "Times New Roman", Times, serif;
}
</style>

<link href="mystyleNew.css" rel="stylesheet" type="text/css" />

<?php 
//<script type="text/javascript">
//function checkView(){
	//check if the Item Type and Title fields are empty
	//if((document.addCopy.itype.value=="") && (document.addcopy.title.value=="")){
	//	document.getElementById('msg').innerHTML="Please enter Item Type and Title";
		//return false;
	//}
	//	return true;
//}
//</script?>
 
<script type="text/javascript">
//Live search publisher (JQuery)
/*function fillPub(Value)
{
$('#title').val(Value);
$('#display').hide();
}

$(document).ready(function(){
$("#title").keyup(function() {
var name = $('#title').val();
if(name=="")
{
$("#display").html("");
}
else
{
$.ajax({
type: "POST",
url: "liveSearchTitle.php",
data: "name="+ name ,
success: function(html){
$("#display").html(html).show();
}
});
}
});
});
*/
</script>

</head>

<body>
<table width="1183" border="0" align="center">
  <tr>
    <td height="138" colspan="2"><a href="index.php"><img src="Images/website banner.jpg" width="1183" height="132" /></a></td>
  </tr>
  <tr align="center" bgcolor="#B6AD89" class="in">
    <td width="749" align="left" valign="top">
    <h4 class="links_color"><em>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<?php if($_SESSION['cat']=="Admin"){?><a href="adminpanel.php" class="links_color">Home</a><?php } if($_SESSION['cat']=="Librarian"){?><a href="librarianaccount.php" class="links_color">Home</a></em> | <em><a href="user management.php" class="links_color">User Management</a></em> | <em><a href="library item management.php" class="links_color">Library Item Management</a></em> | <em><a href="issue_return_items.php" class="links_color">Issue/Return Items</a></em> | <em><a href="reports.php" class="links_color">Reports</a></em> | <em><a href="online_catalog_search.php" class="links_color">Online Catalog</a></em><?php  } ?></h4>
    </td>
    <td width="283" align="center" valign="middle"><span class="in1">Welcome <?php echo $_SESSION['fname']."-".$_SESSION['cat']; ?> | <a href="signout.php"> Logout</a></span></td>
  </tr>
  <tr bgcolor="#EAE5CE">
    <td colspan="2" align="center"><blockquote>
      <p>&nbsp;</p>
        <table width="854" border="0">
        <tr>
          <td height="35" colspan="6" align="center" class="alert"><span id="msg"></span>&nbsp;</td>
        </tr>
        <tr>
          <td height="40" colspan="6"><span class="alert1">* Please Enter Item Type and Title</span></td>
          </tr>
          <form name="addCopy" method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>">
        <tr>
          <td width="126" height="40">Item Type</td>
          <td height="40" colspan="2"><label for="itype"></label>
            <select name="itype" id="itype">
              <option value="" selected="selected">-Select Item Type-</option>
              <?php 
			  //To display the selected Item Type without deleting when refreshing the page 
			  if(isset($_REQUEST['id2'])){ ?>
              <option value="" selected><?php echo $_REQUEST['id2']; ?></option><?php } ?>
              <option value="Book">Book</option>
              <option value="CD/DVD">CD/DVD</option>
              <option value="Serial">Serial</option>
            </select></td>
          <td width="168" height="40">&nbsp;</td>
          <td height="40" colspan="2">&nbsp;</td>
        </tr>
        <tr>
          <td height="40" valign="top">Title</td>
          <td height="40" colspan="2"><label for="title"></label>
            
            <input name="title" type="text" id="title" size="60" value="<?php /* To display the selected or typed Title without deleting when refreshing the page*/ if(isset($_REQUEST['id1'])){ echo $_REQUEST['id1']; } ?>"
          autocomplete="off" />
            <div id="display"></div></td>
          <td height="40" align="left" valign="top"><input type="submit" name="search" id="search" value=" Search " /></td>
          <td height="40" colspan="2">&nbsp;</td>
        </tr>
        <tr>
          <td height="40">&nbsp;</td>
          <td height="40" colspan="2">
		  <?php //To display the messages when Title, Type or Both are empty
		 if(isset($_REQUEST['id'])){ 
		  echo $_REQUEST['id']; 
		  }?>&nbsp;</td>
          <td height="40">&nbsp;</td>
          <td height="40" colspan="2">&nbsp;</td>
        </tr>
        </form>
        <?php if(isset($_POST['search'])){ ?>
        <tr>
          <td height="40" colspan="4"><label for="itemname"></label>
            Title &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; 
            <input name="itemname" type="text" id="itemname" size="60" value="<?php echo $_POST['title'];?>" disabled="disabled"/></td>
          <td height="40" colspan="2">&nbsp;</td>
        </tr>
        </table>
       <br />
        <table width="1006"> 
		<?php if($no!=0) {
			
			
			 ?>
        <tr>
          <td width="95" class="body_p">&nbsp;</td>
          <td width="74" class="body_p"><strong>Item ID</strong></td>
          <td width="114" height="39"><strong>Type</strong></td>
          <?php if($itype==1 || $itype==3){?>
          <td width="116" height="39"><strong>Edition</strong></td>
          <td width="188" height="39"><strong>Author</strong></td><?php } ?>
 
          <td width="179" height="39"><strong>Publisher</strong></td>
          <td width="120"><strong>No of Copies</strong></td>
          <td width="84">&nbsp;</td>
        </tr>
        <?php while($row=mysqli_fetch_array($result)){ ?>
        <tr>
          <td><img src="upload/<?php echo $row['Item_Image']; ?>" width="50" height="80" /></td>
          <td><?php echo $row['Item_ID']; ?></td>
          <td height="30"><?php echo $_POST['itype']; ?></td>
          <?php if($itype==1 || $itype==3){ // Edition & Author Name will only be displayed when item type is Book and Serial ?> 
          <td height="30"><?php echo $row['Edition'] ?></td>
          <td height="30"><?php 
		  $sqlauth="SELECT Author_Name FROM author as a,$it as b WHERE a.Author_ID=b.Author_ID AND b.Item_ID='$row[Item_ID]'";
		  $resultauth=mysqli_query($con,$sqlauth);
		  while($rowauth=mysqli_fetch_array($resultauth)){
		  
		  
		  echo $rowauth['Author_Name']."<br>"; }?></td><?php } ?>
          <td height="30"><?php echo $row['Publisher_Name']; ?></td>
          <td height="30">
            <?php
		  //To display number of copies
		  $sqlC="SELECT COUNT(*) AS co FROM copy WHERE Item_ID='$row[Item_ID]'";
		  $resultC=mysqli_query($con,$sqlC);
		  $rowC=mysqli_fetch_array($resultC);
		  echo $rowC['co'];
          ?></td>
          <td height="30"><a href="addCopyProcess.php?id=<?php echo $row['Item_ID'];?>">Add Copy</a></td>
        </tr>
        <?php }}else{ ?>
			<form name="addCopy1" method="post" action="additem.php">
			<tr>
          <td height="40" colspan="6" align="center">&nbsp;</td>
          <td height="40" colspan="2">&nbsp;</td>
          </tr></form>
			
		<?php }} ?>
      
        <tr>
          <td colspan="2">&nbsp;</td>
          <td height="30">&nbsp;</td>
          <td height="30">&nbsp;</td>
          <td height="30">&nbsp;</td>
          <td height="30">&nbsp;</td>
          <td height="30" colspan="2">&nbsp;</td>
        </tr>
        
        <?php // To display form or button if Search button is clicked 
		if(isset($_POST['search'])){ ?>
         <form name="addCopy1" method="post" action="additem.php?id=<?php echo $t; ?>&id1=<?php echo $itype; ?>">
			<tr>
          <td height="40" colspan="8" align="center"><input type="submit" name="addItem" id="addItem" value="Add New Item"/></td>
          </tr></form><?php } ?>
        <tr>
          <td colspan="2">&nbsp;</td>
          <td height="30">&nbsp;</td>
          <td height="30">&nbsp;</td>
          <td height="30">&nbsp;</td>
          <td height="30">&nbsp;</td>
          <td height="30" colspan="2">&nbsp;</td>
        </tr>
        <tr>
          <td colspan="2">&nbsp;</td>
          <td height="23">&nbsp;</td>
          <td height="23">&nbsp;</td>
          <td height="23">&nbsp;</td>
          <td height="23">&nbsp;</td>
          <td height="23" colspan="2">&nbsp;</td>
        </tr>
      </table>
    </blockquote></td>
  </tr>
  <tr bgcolor="#FF6600">
    <td height="50" colspan="2" align="center" bgcolor="#CC6600" id="footer">Copyright &copy; 2013 Negombo South International School. All Rights Reserved</td>
  </tr>
</table>

</body>
</html>
<?php /* } else {
	header("Location:index.php?id=Please Enter Email Address or Password");
}
*/
?>