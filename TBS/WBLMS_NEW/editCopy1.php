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
<script>

function showMonth(str1) 
{
var xmlhttp;    
if (str1=="")
  {
  document.getElementById("month").innerHTML="";
  return;
  }
if (window.XMLHttpRequest)
  {// code for IE7+, Firefox, Chrome, Opera, Safari
  xmlhttp=new XMLHttpRequest();
  }
else
  {// code for IE6, IE5
  xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
  }
xmlhttp.onreadystatechange=function() //onreadystatechange:stores a function to call automatically when readyState property changes
  {
	  //Response successfull
  if (xmlhttp.readyState==4 && xmlhttp.status==200) //readyState:4= request finished and response is ready
  //status:200="OK"
    {
    document.getElementById("month").innerHTML=xmlhttp.responseText;
    }
  }
  //the selected value from the menu list(str) passed to the getMonth.php using q1
xmlhttp.open("GET","getMonth.php?q1="+str1,true); ///////////////
xmlhttp.send();
}

function showCallNo(str1) 
{
var xmlhttp;    
if (str1=="")
  {
  document.getElementById("callNo1").innerHTML="";
  return;
  }
if (window.XMLHttpRequest)
  {// code for IE7+, Firefox, Chrome, Opera, Safari
  xmlhttp=new XMLHttpRequest();
  }
else
  {// code for IE6, IE5
  xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
  }
xmlhttp.onreadystatechange=function() //onreadystatechange:stores a function to call automatically when readyState property changes
  {
	  //Response successfull
  if (xmlhttp.readyState==4 && xmlhttp.status==200) //readyState:4= request finished and response is ready
  //status:200="OK"
    {
    document.getElementById("callNo1").innerHTML=xmlhttp.responseText;
    }
  }
  //the selected value from the menu list(str) passed to the getMonth.php using q1
xmlhttp.open("GET","getCall.php?q1="+str1,true); ///////////////
xmlhttp.send();
}

</script>

<script>

function showDay(str1,str2) 
{
var xmlhttp;    
if (str1=="")
  {
  document.getElementById("day").innerHTML="";
  return;
  }
if (window.XMLHttpRequest)
  {// code for IE7+, Firefox, Chrome, Opera, Safari
  xmlhttp=new XMLHttpRequest();
  }
else
  {// code for IE6, IE5
  xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
  }
xmlhttp.onreadystatechange=function() //onreadystatechange:stores a function to call automatically when readyState property changes
  {
	  //Response successfull
  if (xmlhttp.readyState==4 && xmlhttp.status==200) //readyState:4= request finished and response is ready
  //status:200="OK"
    {
    document.getElementById("day").innerHTML=xmlhttp.responseText;
    }
  }
  //the selected value from the menu list(str) passed to the getDay.php using q1
xmlhttp.open("GET","getDay.php?q1="+str1+"-"+str2,true); /////////////////////
xmlhttp.send();
}
</script>
<script>

function showItemType(str) //str = 
{
var xmlhttp;    
if (str=="")
  {
  document.getElementById("txtHint").innerHTML="";
  return;
  }
if (window.XMLHttpRequest)
  {// code for IE7+, Firefox, Chrome, Opera, Safari
  xmlhttp=new XMLHttpRequest();
  }
else
  {// code for IE6, IE5
  xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
  }
xmlhttp.onreadystatechange=function() //onreadystatechange:stores a function to call automatically when readyState property changes
  {
	  //Response successfull
  if (xmlhttp.readyState==4 && xmlhttp.status==200) //readyState:4= request finished and response is ready
  //status:200="OK"
    {
    document.getElementById("txtHint").innerHTML=xmlhttp.responseText;
    }
  }
  //the selected value from the menu list(str) passed to the getItemType.php using q
xmlhttp.open("GET","getItemType.php?q="+str,true); //
xmlhttp.send();
}
</script>

<script type="text/javascript">
function checkVali(){
	var d1=document.addItem.day1.value;
	var m1=document.addItem.month1.value;
    var y1=document.addItem.year1.value;
	
	if((document.addItem.lending.value=="" || document.addItem.lending.value=="0") && (document.addItem.reference.value=="" || document.addItem.reference.value=="0")){
		document.getElementById('lending1').innerHTML="Both cannot be blank  ";
		
		
		return false;
	}
	
	
	
	
		return true;
}
</script>

</head>

<body>
<table width="1183" border="0" align="center">
  <tr>
    <td height="187" colspan="2"><a href="index.php"><img src="images/website banner.jpg" width="1183" height="185" /></a></td>
  </tr>
  <tr align="center" bgcolor="#B6AD89" class="in">
    <td width="915" align="left" valign="top"><blockquote>
      <h4 class="links_color"><em>&nbsp;&nbsp;&nbsp;<?php if($_SESSION['cat']=="Librarian"){?><a href="librarianaccount.php" class="links_color">Home</a><?php } if($_SESSION['cat']=="Library Assistant"){?><a href="libraryassistant.php" class="links_color">Home</a><?php  } ?><?php //} ?></em> | <em><a href="user management.php" class="links_color">User Management</a></em> | <em><a href="library item management.php" class="links_color">Library Item Management</a></em> | <em><a href="issue_return_items.php" class="links_color">Issue/Return Items</a></em> | <em><a href="reports.php" class="links_color">Reports</a></em> | <em><a href="search.php" class="links_color">Search</a></em></h4>
    </blockquote></td>
    <td width="268" align="right" valign="middle"><span class="in1">Welcome <?php echo $_SESSION['fname']."-".$_SESSION['cat']; ?> | <a href="signout.php" class="in1"> Logout</a></span></td>
  </tr>
  <tr bgcolor="#EAE5CE">
    <td colspan="2" align="center"><blockquote>
      <div>
        <h3><a href="addcopy.php" class="links_color">Add Copy</a>| <span class="links_color"><a href="viewItem.php">View Item</a></span></h3>
</div>
<table width="900">
<tr>
<td width="163" height="25" align="center" class="body_p"><h5><strong>Item</strong></h5></td>
            <td width="150" align="left" class="body_p"><h5>Title</h5></td>
            <td width="121" align="left" class="body_p"><h5>Item ID</h5></td>
            <td colspan="2" align="left" class="body_p"><h5><strong>Author</strong></h5></td>
            <td colspan="2" align="left" class="body_p"><h5>Publisher</h5></td>
            <td width="70" align="left" class="body_p"><h5><strong>Type</strong></h5></td>
            <td width="67" align="center" class="body_p"><h5>&nbsp;</h5></td>
          </tr>
           <?php while($row=mysqli_fetch_array($result)){ ?>
          <tr>
            <td align="center"><img src="upload/<?php echo $row['Item_Image']; ?>" width="75" height="auto" />&nbsp;</td>
            <td align="left"><?php echo $row['Title']; ?>&nbsp;</td>
            <td align="left"><?php echo $row['Item_ID']; ?>&nbsp;</td>
            <td colspan="2" align="left"><?php 
			// To get authors .........
			if($row['Item_Type_ID']==1||$row['Item_Type_ID']==3){
			if($row['Item_Type_ID']==1){
			$sqla="SELECT * FROM books as b, author as a WHERE b.Item_ID='$row[Item_ID]' AND b.Author_ID=a.Author_ID";
			}
			if($row['Item_Type_ID']==3){
			$sqla="SELECT * FROM serial as s, author as a WHERE s.Item_ID='$row[Item_ID]' AND s.Author_ID=a.Author_ID";
			}
			$resulta=mysqli_query($con,$sqla);
			while($rowa=mysqli_fetch_array($resulta))
			{
			
			echo $rowa['Author_Name']."<br />"; }}?>
              <br>            </td>
            <td colspan="2" align="left">&nbsp;              <?php echo $row['Publisher_Name']; ?></td>
            <td align="left"><?php echo $row['Item_Type_Name']; ?>&nbsp;</td>
            <td align="center"><a href="viewItemDetails.php?id=<?php echo $row['Item_ID'];  ?>">View</a>
              <?php } ?>
            <br>            </td>
          </tr>
</table>


      <form action="addCopySave.php?id1=<?php echo $item; ?>" method="post" enctype="multipart/form-data" name="addItem" id="addItem" onsubmit="return checkVali()">
      <table width="581" border="0">
        <tr>
          <th height="36" colspan="2" align="center" scope="col"><blockquote>
            <h3>Add a New Copy to the Library</h3>
          </blockquote></th>
          </tr>
        <tr>
          <td width="250">&nbsp;</td>
          <td width="317">&nbsp;</td>
        </tr>
        <tr>
          <td height="35">Item ID</td>
          <td height="35" class="alert"><label for="itemId"></label>
            <input name="itemId" type="text" id="itemId" disabled="disabled" value="<?php echo $item; ?>"/>&nbsp;<span id="callNo1"></span></td>
        </tr>
        <tr>
          <td height="35">Purchased Date</td>
          <td height="35"><label for="purchasedDate"></label>
           
            <select name="year1" id="year1" onchange="showMonth(this.value) ">
                <option selected="selected" value="">Year</option>
                <?php for($i=$y;$i>=1970;$i--) { ?>
                <option value="<?php echo $i; ?>"><?php echo $i; ?></option>
                <?php } ?></select>
                
                <span id="month">
              <select name="month1">
                <option selected="selected" value="">Month</option>
                <?php for($i=1;$i<=12;$i++){ ?>
                <option value="<?php echo $i; ?>"><?php echo $i; ?></option>
                <?php } ?>
                </select>
                </span>
                <span id="day">
              <select name="day1" required>
                <option selected="selected" value="">Day</option>
                <?php for($i=1;$i<=31;$i++){ ?>
                <option value="<?php echo $i; ?>"><?php echo $i; ?></option>
                <?php } ?>
                </select>          </td>
        </tr>
        <tr>
          <td height="35">Price</td>
          <td height="35"><label for="price"></label>
            <select name="currency" id="currency" required>
              <option>-Select Currency-</option>
              <option value="Rs">Rs.</option>
              <option value="$">$</option>
              <option value="&pound;">&pound;</option>
            </select>
            &nbsp;<input type="text" name="price" id="price" />&nbsp;<span id="price1"></td>
        </tr>
        <tr>
          <td>No of Copies:</td>
          <td><span id="lending1"></span>&nbsp; </td>
        </tr>
        <tr>
          <td height="35">&nbsp;&nbsp;&nbsp;&nbsp;Lending</td>
          <td height="35"><span class="body_p">
            <input type="number" name="lending" id="lending" min="0" />
          </span></td>
        </tr>
        <tr>
          <td height="35">&nbsp;&nbsp;&nbsp;&nbsp;Reference</td>
          <td height="35" class="body_p"><input type="number" name="reference" id="reference" min="0" /></td>
        </tr>
        <tr>
          <td height="35">Shelf No</td>
          <td height="35" class="alert"><label for="shelfNo"></label>
            <input type="text" name="shelfNo" id="shelfNo" />&nbsp;<span id="shelfNo1"></span></td>
        </tr>
        <tr>
          <td height="35">&nbsp;</td>
          <td height="35" class="alert">&nbsp;</td>
        </tr>
        <tr>
          <td colspan="2" align="center"><input type="submit" name="addCopy" id="addCopy" value="Add Copy" /></td>
          </tr>
        <tr>
          <td>&nbsp;</td>
          <td>&nbsp;</td>
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