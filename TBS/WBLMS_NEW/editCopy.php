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
//To get added accession Numbers
$arracc=$_SESSION['arracc'];
//To get Item
$item=$_REQUEST['id'];
$purArray=explode("-",$_SESSION['pday']);
$pr=explode(" ",$_SESSION['price']);

$sql="SELECT * FROM item as i,item_type as it, publisher as p WHERE i.Item_ID='$item' AND i.Item_Type_ID=it.Item_Type_ID  AND i.Publisher_ID=p.Publisher_ID";
$result=mysqli_query($con,$sql);
//$row=mysqli_fetch_array($result);
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
<!-- Check item donations -->
 <script language="javascript">
    function enableDisable(bEnable, menuID,textBoxID)///////////////////
    {
         document.getElementById(menuID).disabled = bEnable;
		 document.getElementById(textBoxID).disabled = bEnable;
    }
</script>
    <script language="Javascript" type="text/javascript">
 
        function onlyNos(e, t) {
            try {
                if (window.event) {
                    var charCode = window.event.keyCode;
                }
                else if (e) {
                    var charCode = e.which;
                }
                else { return true; }
                if (charCode > 31 && (charCode < 48 || charCode > 57)&&charCode !=46) {
                    return false;
                }
                return true;
            }
            catch (err) {
                alert(err.Description);
            }
        }
 
    </script>
<!--
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
-->
</head>

<body>
<table width="1183" border="0" align="center">
  <tr>
    <td height="187" colspan="2"><a href="index.php"><img src="images/website banner.jpg" width="1183" height="185" /></a></td>
  </tr>
  <tr align="center" bgcolor="#B6AD89" class="in">
    <td width="856" align="left" valign="top"><blockquote>
      <h4 class="links_color"><em><?php if($_SESSION['cat']=="Library Assistant"){?><a href="libraryassistant.php" class="links_color">Home</a><?php } if($_SESSION['cat']=="Librarian"){?><a href="librarianaccount.php" class="links_color">Home</a></em> | <em><a href="user management.php" class="links_color">User Management</a></em> | <em><a href="library item management.php" class="links_color">Library Item Management</a></em> | <em><a href="issue_return_items.php" class="links_color">Issue/Return Items</a></em> | <em><a href="reports.php" class="links_color">Reports</a></em> | <em><a href="online_catalog_search.php" class="links_color">Online Catalog</a></em><?php  } ?></h4>
    </blockquote></td>
    <td width="327" align="right" valign="middle"><span class="in1">Welcome <?php echo $_SESSION['fname']."-".$_SESSION['cat']; ?> | <a href="signout.php" class="in1"> Logout</a></span></td>
  </tr>
  <tr bgcolor="#EAE5CE">
    <td colspan="2" align="center"><blockquote><br />
      <h4>Edit Copy Details</h4>
      
      
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
      
      <hr />
      


      <p><?php if(isset($_REQUEST['msg'])){
	
	 $_REQUEST['msg'];	
}
?>&nbsp;</p>
      <form action="editCopySave.php?id1=<?php echo $item; ?>&pubd=<?php echo $pubd; ?>" method="post" enctype="multipart/form-data" name="addItem" id="addItem" onsubmit="return checkVali()">
      <table width="581" border="0">
        <tr>
          <td width="250" height="35">Purchased Date</td>
          <td width="317" height="35"><label for="purchasedDate"></label>
            
            <select name="year1" id="year1" onchange="showMonth(this.value) ">
              <option selected="selected" value="<?php echo $purArray[0];?>"><?php  echo $purArray[0]; //To get the day from the $pubArray array which is assigned from the table(Day=[2],Month=[1],Year=[0]indexes)?></option>
              <?php for($i=$y;$i>=1970;$i--) { ?>
              <option value="<?php echo $i; ?>"><?php echo $i; ?></option>
              <?php } ?></select>
            
            <span id="month">
              <select name="month1">
                <option selected="selected" value="<?php echo $purArray[1];?>"><?php  echo $purArray[1]; //To get the day from the $pubArray array which is assigned from the table(Day=[2],Month=[1],Year=[0]indexes)?></option>
                <?php for($i=1;$i<=12;$i++){ ?>
                <option value="<?php echo $i; ?>"><?php echo $i; ?></option>
                <?php } ?>
                </select>
              </span>
            <span id="day">
              <select name="day1" required>
                <option selected="selected" value="<?php echo $purArray[2];?>"><?php  echo $purArray[2]; //To get the day from the $pubArray array which is assigned from the table(Day=[2],Month=[1],Year=[0]indexes)?></option>
                <?php for($i=1;$i<=31;$i++){ ?>
                <option value="<?php echo $i; ?>"><?php echo $i; ?></option>
                <?php } ?>
                </select>     </span><span class="alert1">     *First Select Year </span></td>
        </tr>
        <tr>
          <td height="35">Donations</td>
          <td height="35">
          <?php
        $p=$_SESSION['price'];
		   //To separate currency and price
		  $pr=explode(" ",$p);
		  ?>
        <?php if($pr[0]=='d'){ //Donated
				?> 
				
				<input type="checkbox" name="donate" id="donate" onclick="enableDisable(this.checked,'currency','price')" checked="checked">&nbsp;
				
				<?PHP
		}else{
			?>
				<input type="checkbox" name="donate" id="donate" onclick="enableDisable(this.checked,'currency','price')">&nbsp;
		<?PHP
        }
          
          ?>
          
</td>
        </tr>
        <tr>
          <td height="35">Price</td>
          <td height="35">
          
           <?php if($pr[0]=='d'){ //Donated
				?> 
				
				 <select name="currency" id="currency" disabled="disabled">
             
              
                 <option value="">-Select Currency-</option>
               
              <option value="Rs">Rs.</option>
              <option value="$">$</option>
              <option value="&pound;">&pound;</option>
            </select>
            &nbsp;<input type="text" name="price" id="price" min="0" value="" onKeyPress="return onlyNos(event,this);" disabled="disabled"/>&nbsp;<span id="price1"></span>
				<?PHP
		}else{
			?>
				 <select name="currency" id="currency">
             
              <?php if(isset($_REQUEST['msg'])){
					?>
                    <option value="<?php echo $pr[0] ?>"><?php echo $pr[0] ?></option>
                    <?php
					
					 }else {
				?>
                 <option value="">-Select Currency-</option>
                <?php } ?>
              <option value="Rs">Rs.</option>
              <option value="$">$</option>
              <option value="&pound;">&pound;</option>
            </select>
            &nbsp;<input type="text" name="price" id="price" min="0" value="<?php if(isset($_REQUEST['msg'])){
					echo $pr[1]; }
				?>" onKeyPress="return onlyNos(event,this);" />&nbsp;<span id="price1"></span>
		<?PHP
        }
          
          ?>
          
           </td>
        </tr>
        <tr>
          <td>No of Copies:</td>
          <td><span id="lending1"></span>&nbsp; </td>
        </tr>
        <tr>
          <td height="35">&nbsp;&nbsp;&nbsp;&nbsp;Lending</td>
          <td height="35"><span class="body_p">
          <!-- Lending and reference fields are disabled because once you add a new item, copies(L n R) can be updated.. -->
            <input type="number" name="lending" id="lending" min="0" value="<?php echo $_SESSION['lending']; ?>" disabled="disabled" /><input name="lending" type="hidden" value="<?php echo $_SESSION['lending']; ?>" />
          </span></td>
        </tr>
        <tr>
          <td height="35">&nbsp;&nbsp;&nbsp;&nbsp;Reference</td>
          <td height="35" class="body_p"><input type="number" name="reference" id="reference" min="0" value="<?php echo $_SESSION['reference']; ?>" disabled="disabled" />
          <input name="reference" type="hidden" value="<?php echo $_SESSION['reference']; ?>" />
          </td>
        </tr>
        <tr>
          <td height="35">Shelf No</td>
          <td height="35" class="alert"><label for="shelfNo"></label>
            <input type="text" name="shelfNo" id="shelfNo" value="<?php echo $_SESSION['shelf']; ?>" />&nbsp;<span id="shelfNo1"></span></td>
        </tr>
        <tr>
          <td height="35">Accession No</td>
          <td height="35" class="body_p"><?php
		  foreach($arracc as $e){
		  	echo $e." |";
		  }
          ?>&nbsp;</td>
        </tr>
        <tr>
          <td colspan="2" align="center"><input type="submit" name="update" id="update" value="Update" /></td>
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