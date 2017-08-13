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

//To get Item Type
$item=$_REQUEST['id1'];
$title=$_REQUEST['id'];
$_SESSION['title']=$title;
$val='';
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Add item</title>
<link href="mystyle.css" rel="stylesheet" type="text/css" />
<link href="mystyleNew.css" rel="stylesheet" type="text/css" />
<link rel="stylesheet" href="style.css" type="text/css">
<script type="text/javascript" src="googlejquery.js"></script>
<script type="text/javascript">

//Live search publisher (JQuery)
function fillPub(Value)
{
$('#publisher').val(Value);
$('#display').hide();
}

$(document).ready(function(){
$("#publisher").keyup(function() {
var name = $('#publisher').val();
if(name=="")
{
$("#display").html("");
}
else
{
$.ajax({
type: "POST",
url: "ajax.php",
data: "name="+ name ,
success: function(html){
$("#display").html(html).show();
}
});
}
});
});
</script>

<!-- Live search Author (JQuery) -->
<script type="text/javascript">
function fillAuth(Value)
{
$('#author').val(Value);
$('#display1').hide();
}

$(document).ready(function(){
$("#author").keyup(function() {
var name = $('#author').val();
if(name=="")
{
$("#display1").html("");
}
else
{
$.ajax({
type: "POST",
url: "ajax1.php",
data: "name="+ name ,
success: function(html){
$("#display1").html(html).show();
}
});
}
});
});
</script>
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
<script type="text/javascript">
function checkVali(){
	var d1=document.addItem.day1.value;
	var m1=document.addItem.month1.value;
    var y1=document.addItem.year1.value;
	var d2=document.addItem.day2.value;
	var m2=document.addItem.month2.value;
    var y2=document.addItem.year2.value;
	var pub_date = d1+"/"+m1+"/"+y1;
    var pur_date = d2+"/"+m2+"/"+y2;

    var pub = new Date(pub_date);
    var pur = new Date(pur_date);    
 

	
    var tomorrow = new Date(new Date().getTime() + 24 * 60 * 60 * 1000);
	
	
	if(document.addItem.callNo.value==""){
		document.getElementById('callNo1').innerHTML="Blank Call No";
		document.getElementById('publisher1').innerHTML="";
		document.addItem.callNo.focus();
		return false;
	}else if(document.addItem.publisher.value==""){
		document.getElementById('publisher1').innerHTML="Blank Publisher";
		document.getElementById('callNo1').innerHTML="";
		document.addItem.publisher.focus();
		return false;
		}else if(pub>=pur){
		document.getElementById('pur1').innerHTML="Publish date should be before purchase date";
		return false;
	
	}else if(document.addItem.edition.value==""){
		document.getElementById('edition1').innerHTML="Blank Edition";
		document.getElementById('callNo1').innerHTML="";
		
		document.getElementById('publisher1').innerHTML="";
		
		document.getElementById('pur1').innerHTML="";
		document.addItem.edition.focus();
		return false;
	}else if(document.addItem.lending.value=="" && document.addItem.reference.value==""){
		document.getElementById('lending1').innerHTML="Both cannot be blank  ";
		document.getElementById('callNo1').innerHTML="";
		
		document.getElementById('publisher1').innerHTML="";
		
		document.getElementById('edition1').innerHTML="";
		document.getElementById('pur1').innerHTML="";
		
		return false;
	}
	
	
	
	
		return true;
}
</script>

<script>
function showMonth1(str1) 
{
var xmlhttp;    
if (str1=="")
  {
  document.getElementById("month1").innerHTML="";
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
    document.getElementById("month1").innerHTML=xmlhttp.responseText;
    }
  }
  //the selected value from the menu list(str) passed to the getMonth1.php using q1
xmlhttp.open("GET","getMonth1.php?q1="+str1,true); //
xmlhttp.send();
}
</script>

<script>

function showDay1(str1,str2) 
{
var xmlhttp;    
if (str1=="")
  {
  document.getElementById("day11").innerHTML="";
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
    document.getElementById("day11").innerHTML=xmlhttp.responseText;
    }
  }
  //the selected value from the menu list(str) passed to the getDay1.php using q1
xmlhttp.open("GET","getDay1.php?q1="+str1+"-"+str2,true); //
xmlhttp.send();
}
</script>

<script> ///////////////////////////////////////////////////
function _add_more() {
	  //To gets authors for books
  var txt = "<input type=\"text\" name=\"author[]\" id=\"author\">";
  document.getElementById("dvFile").innerHTML += txt;
 
}
</script>
<script> ///////////////////////////////////////////////////
function _add_more_se() {
  //To gets authors for Serial
  var txt = "<input type=\"text\" name=\"authorss[]\"><br />";
  document.getElementById("dvFiles").innerHTML += txt;
   
}
</script>
<script>
function showResult(str) ////////////////////////////
{
if (str.length==0) ///////////////////////////////////////
  { 
  document.getElementById("livesearch").innerHTML="";
  document.getElementById("livesearch").style.border="0px";
  
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
xmlhttp.onreadystatechange=function()
  {
  if (xmlhttp.readyState==4 && xmlhttp.status==200)
    {
    document.getElementById("livesearch").innerHTML=xmlhttp.responseText;
    document.getElementById("livesearch").style.border="0px";
	document.getElementById('publisher1').innerHTML="";
    }
  }
xmlhttp.open("GET","livesearchpub.php?q="+str,true);
xmlhttp.send();
}
</script>
<script>
function showImage(str1) 
{
var xmlhttp;    
if (str1=="")
  {
  document.getElementById("img1").innerHTML="";
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
    document.getElementById("img1").innerHTML=xmlhttp.responseText;
    }
  }
  //the selected value from the menu list(str) passed to the getMonth1.php using q1
xmlhttp.open("GET","getImage.php?q1="+str1,true); //
xmlhttp.send();
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
      <h3 class="links_color"><em><?php if($_SESSION['cat']=="Librarian"){?><a href="librarianaccount.php" class="links_color">Home</a><?php } if($_SESSION['cat']=="Library Assistant"){?><a href="libraryassistant.php" class="links_color">Home</a><?php  } ?></em> | <em><a href="user management.php" class="links_color">User Management</a></em> | <em><a href="library item management.php" class="links_color">Library Item Management</a></em> | <em><a href="issue_return_items.php" class="links_color">Issue/Return Items</a></em> | <em><a href="reports.php" class="links_color">Reports</a></em> | <em><a href="search.php" class="links_color">Search</a></em></h3>
    </blockquote></td>
    <td width="268" align="right" valign="middle"><span class="in1">Welcome <?php echo $_SESSION['fname']."-".$_SESSION['cat']; ?> | <a href="signout.php" class="in1"> Logout</a></span></td>
  </tr>
  <tr bgcolor="#EAE5CE">
    <td colspan="2" align="center"><blockquote>
      <div>
        <h3><a href="addcopy.php" class="links_color">Add Item</a> | <a href="edit_item.php" class="links_color">Edit Item</a> | <a href="delete_item.php" class="links_color">Delete Item</a> | <span class="links_color"><a href="view_item.php">View Item</a></span></h3>
</div>
      <form action="additemsave.php?id1=<?php echo $item; ?>" method="post" enctype="multipart/form-data" name="addItem" id="addItem" onsubmit="return checkVali()">
      <table width="581" height="1202" border="0">
        <tr>
          <th height="36" colspan="3" align="center" scope="col"><blockquote>
            <h3>Add a New Item to the Library</h3>
          </blockquote></th>
          </tr>
        <tr>
          <td colspan="2">&nbsp;</td>
          <td width="317">&nbsp;</td>
        </tr>
        <tr>
          <td height="35" colspan="2">Call No</td>
          <td height="35" class="alert"><label for="callNo"></label>
            <input type="text" name="callNo" id="callNo" />&nbsp;<span id="callNo1"></span></td>
        </tr>
        <tr>
          <td height="35" colspan="2">Title</td>
          <td height="35" class="alert"><label for="title"></label>
            <input name="title" type="text" id="title" size="45" value="<?php // To get the entered Item Title from addcopy.php
			if(isset($_REQUEST['id'])){ echo $_REQUEST['id']; }  ?>" disabled="disabled"/>&nbsp;<span id="title1"></span></td>
        </tr>
        <tr>
          <td height="35" colspan="2">Publisher</td>
          <td height="35" class="search">
            <!-- <select name="publisher">
              <option value="">- Select Publisher -</option>
              <?php //while($row=mysqli_fetch_array($resultpub)){ ?>
              <option value="<?php //echo $row['Publisher_ID']; ?>"><?php //echo $row['Publisher_Name']; ?></option>
              <?php //} ?>
              </select> -->           
            <div id="content">
            <input type="text" name="publisher" id="publisher" autocomplete="off"
value="<?php echo $val;?>"/>           
            &nbsp;&nbsp;<span class="alert" id="publisher1"></span>
           
            <div id="display"></div>
            </div>
            </td>
        </tr>
        <tr>
          <td height="35" colspan="2">Published Date</td>
          <td height="35">
            <span id="publDate1"></span>
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
              <select name="day1">
                <option selected="selected" value="">Day</option>
                <?php for($i=1;$i<=31;$i++){ ?>
                <option value="<?php echo $i; ?>"><?php echo $i; ?></option>
                <?php } ?>
                </select>
              
          </span>
              
          
            </td>
        </tr>
        <tr>
          <td height="35" colspan="2">Published Place</td>
          <td height="35"><label for="publPlace"></label>
            <input type="text" name="publPlace" id="publPlace" />&nbsp;<span id="publPlace1"></span></td>
        </tr>
        <tr>
          <td height="35" colspan="2">Purchased Date</td>
          <td height="35"><label for="purchasedDate"></label>
            <!--<span id="purchasedDate1"> -->
            
            <select name="year2" id="year2" onchange="showMonth1(this.value)">
                <option selected="selected" value="">Year</option>
                <?php for($i=$y;$i>=1970;$i--){ ?>
                <option value="<?php echo $i; ?>"><?php echo $i; ?></option>
                <?php } ?>
                </select>
                <span id="month1">            
              <select name="month2" id="month2">
                <option selected="selected" value="">Month</option>
                <?php for($i=1;$i<=12;$i++){ ?>
                <option value="<?php echo $i; ?>"><?php echo $i; ?></option>
                <?php } ?>
                </select>
              </span>
               <span id="day11">
              <select name="day2">
                <option selected="selected" value="">Day</option>
                <?php for($i=1;$i<=31;$i++){ ?>
                <option value="<?php echo $i; ?>"><?php echo $i; ?></option>
                <?php } ?>
                </select>
                
            </span></td>
        </tr>
        <tr>
          <td height="35" colspan="2">&nbsp;</td>
          <td height="35"><span id="pur1"></span>&nbsp;</td>
        </tr>
        <tr>
          <td height="35" colspan="2">Edition</td>
          <td height="35" class="alert"><label for="edition"></label>
            <input type="text" name="edition" id="edition" />&nbsp;<span id="edition1"></span></td>
        </tr>
        <tr>
          <td height="35" colspan="2">Price</td>
          <td height="35"><label for="price"></label>
            <label for="currency"></label>
            <select name="currency" id="currency">
              <option>-Select Currency-</option>
              <option value="Rs.">Rs.</option>
              <option value="$">$</option>
              <option value="&pound;">&pound;</option>
              
            </select>
            &nbsp;<input type="text" name="price" id="price" />&nbsp;<span id="price1"></span></td>
        </tr>
        <tr>
          <td colspan="2">No of Copies:</td>
          <td><span id="lending1"></span>&nbsp;
           </td>
        </tr>
        <tr>
          <td height="35" colspan="2">&nbsp;&nbsp;&nbsp;&nbsp;Lending</td>
          <td height="35"><span class="body_p">
            <input type="number" name="lending" id="lending" min="0" />
            </span></td>
        </tr>
        <tr>
          <td height="35" colspan="2">&nbsp;&nbsp;&nbsp;&nbsp;Reference</td>
          <td height="35" class="body_p"><input type="number" name="reference" id="reference" min="0" /></td>
        </tr>
        <tr>
          <td height="35" colspan="2">Shelf No</td>
          <td height="35" class="alert"><label for="shelfNo"></label>
            <input type="text" name="shelfNo" id="shelfNo" />&nbsp;<span id="shelfNo1"></span></td>
        </tr>
        <tr>
          <td colspan="2">Remarks</td>
          <td><label for="remarks"></label>
            <textarea name="remarks" cols="30" id="remarks"></textarea>&nbsp;<span id="remarks1"></span></td>
        </tr>
        
        <tr>
          <td height="35" colspan="2">Upload an Image</td>
          <td height="35">
            <input type="file" name="photo" id="photo" onchange="showImage(this.value)" />
        <span id="img1">  </span></td>
        </tr>
        <tr>
          <td height="35" colspan="2">Item Type</td>
          <td height="35" class="alert"><label for="itemType"></label>
            <!-- this.value correspond to selection on Item Type menu list and selected value will be passed to showItemType function -->
           
              <input value="<?php echo $itype1[$_REQUEST['id1']]; ?>" disabled="disabled" />
             
         &nbsp;<span id="itemType1"></span></td>
        </tr>
        <tr>
        <!-- To display the output of the includeItemType.php -->
          <td colspan="3"><?php include("includeItemType.php"); ?><span id="txtHint">&nbsp;</span></td>
          </tr>
        <tr>
          <td width="116" align="center">&nbsp;</td>
          <td width="134" align="center"><input type="submit" name="addItem2" id="addItem2" value="Add Item" /></td>
          <td><input type="reset" name="Reset" id="Reset" value="Reset" /></td>
        </tr>
        <tr>
          <td colspan="2">&nbsp;</td>
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