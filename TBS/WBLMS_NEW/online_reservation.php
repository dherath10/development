<?php
session_start();
if($_SESSION['userid']!="" && $_SESSION['pass']!=""){
//To connect database
include "include/dbconnection.php";
if(isset($_POST['Reserve'])){
	$aid=$_REQUEST['aid'];//To get accession No
	$reserved_date=$_POST['reserved_date']; //To get reserved date
	$cdate=date("Y-m-d");//Current date
	$ctime=date("G:i:s");//To get current Time
	$curr=strtotime($cdate); //To convert current date into time ID
	$rdate=strtotime($reserved_date); ////To convert reserved date into time ID
	$d=($rdate-$curr)/86400; //To get how manydays
	
//Can select 3 days only
if($d<0 || $d>3){
	$msg="Please Select a Date not more than 3 days"; //////???????????
	header("Location:online_reservation.php?msg=$msg&aid=$aid"); /////////////////
}else{

$sql="SELECT * FROM item as i,item_type as it,copy as c,publisher as p WHERE c.Accession_No='$aid' AND i.Item_Type_ID=it.Item_Type_ID AND c.Item_ID=i.Item_ID AND i.Publisher_ID=p.Publisher_ID";
$result=mysqli_query($con,$sql);
$row=mysqli_fetch_array($result);
$notification="Reserved";
$sqlinsert="INSERT INTO reservation (Accession_No,User_ID,Res_Date,Res_Time,Fulfilled) VALUES('$aid','$_SESSION[userid]','$reserved_date','$ctime','$notification')";
mysqli_query($con,$sqlinsert) or die(mysql_error());

//To update borrow table
$sqlup="UPDATE copy SET Availability='Reserved' WHERE Accession_No='$aid'";
mysqli_query($con,$sqlup);
$msg="Successfully Reserved";
header("Location:online_catalog_search.php?msg=$msg");

}
}else{
	
//To display already selected Copy
$_SESSION['aid']=$aid=$_REQUEST['aid'];
$sql="SELECT * FROM item as i,item_type as it,copy as c,publisher as p WHERE c.Accession_No='$aid' AND i.Item_Type_ID=it.Item_Type_ID AND c.Item_ID=i.Item_ID AND i.Publisher_ID=p.Publisher_ID";
$result=mysqli_query($con,$sql);
$no=mysqli_num_rows($result);


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
<link rel="stylesheet" type="text/css" href="datePicker.css" />
<script src="jquery-1.6.1.min.js" type="text/javascript"></script>
<script src="datePicker-min.js" type="text/javascript"></script>
<script type="text/javascript">
  $(window).ready(function(){
  
  $('#date-pick1').datePicker({clickInput:true});
});
</script>
<script type="text/javascript">
  $(window).ready(function(){
  
  $('#date-pick2').datePicker({clickInput:true});
});
</script>
<script type="text/javascript">
  $(window).ready(function(){
  
  $('#date-pick3').datePicker({clickInput:true});
});
</script>

<link href="mystyle.css" rel="stylesheet" type="text/css" />
<link href="mystyleNew.css" rel="stylesheet" type="text/css" />
</head>

<body>
 <form name="Re" method="post" action="<?php ////////////////////////////////////////////////
 											echo $_SERVER['PHP_SELF']; ?>?aid=<?php echo $aid; ?>">
<table width="1183" border="0" align="center">
  <tr>
    <td height="187" colspan="2"><a href="index.php"><img src="Images/website banner.jpg" width="1183" height="185" /></a></td>
  </tr>
  <tr align="center" bgcolor="#B6AD89" class="in">
    <td width="857" height="25" align="left" valign="top"><blockquote>
      <h3 class="links_color"><em><?php // To give seperate home pages according to the user 
	   if ($_SESSION['cat']=="Student") { ?><a href="studentaccount.php" class="links_color">Home</a><?php } if ($_SESSION['cat']=="Teacher") { ?><a href="teacheraccount.php" class="links_color">Home</a><?php } ?></em> <em><?php if($_SESSION['cat']=="Librarian"){?> <a href="librarianaccount.php" class="links_color">Home</a></em><?php } if($_SESSION['cat']=="Library Assistant"){ ?><a href="libraryassistant.php" class="links_color">Home</a>
      <?php  } ?>
      </em></h3>
    </blockquote></td>
    <td width="326" align="right" valign="middle"><span class="in1">Welcome <?php echo $_SESSION['fname']."-".$_SESSION['cat']; ?> | <a href="signout.php">Logout </a></span></td>
  </tr>
  <tr bgcolor="#EAE5CE">
    <td colspan="2" align="center">
   
    <p>&nbsp;</p>
    <table width="1073" border="0" align="center">
      <tr>
        <td width="238" class="body_p"><h3><strong>Online Reservation</strong>s</h3></td>
        <td width="215">&nbsp;</td>
        <td width="135">&nbsp;</td>
        <td width="467">&nbsp;</td>
      </tr>
   
      <tr>
        <td colspan="4" class="alert">
      
        <table width="1068" border="0">

          <tr>
            <td colspan="8" class="in"><?php if(isset($_REQUEST['msg'])){ /////////////////////
												echo $_REQUEST['msg']; ///////////////////////////////////
			}?>&nbsp;</td>
            </tr>
         
          <tr class="body_p">
            <td width="128"><strong>Accession No</strong></td>
            <td width="115"><strong>Call No</strong></td>
            <td width="116"><strong>Item Type</strong></td>
            <td width="235"><strong>Title</strong></td>
            <td width="116"><strong>Publisher</strong></td>
            <!--<td width="60"><strong>Year</strong></td>-->
            <td width="74"><strong>Price</strong></td>
            <td width="254" class="in">&nbsp;</td>
          </tr>
           <?php $row=mysqli_fetch_array($result); ?>
          <tr class="body_p">
            <td><?php echo $aid; ?>&nbsp;</td>
            <td><?php echo $row['Call_No']; ?>&nbsp;</td>
            <td><?php echo $row['Item_Type_Name']; ?>&nbsp;</td>
            <td><?php echo $row['Title']; ?>&nbsp;</td>
            <td><?php echo $row['Publisher_Name']; ?>&nbsp;</td>
            			<!--<td><?php echo $row['Year']; ?>&nbsp;</td>-->
            <td><?php echo $row['Price']; ?>&nbsp;</td>
            <td align="right"><input name="reserved_date" type="text" id="date-pick1" size="18" required="required"/>&nbsp;            <label>
              <input name="Reserve" type="submit" class="co" id="Reserve" value="Reserve" />
            </label></td>
          </tr>
        </table>
       </td>
        </tr>
    </table>
    <p>&nbsp;</p>
    <p>&nbsp;</p></td>
  </tr>
  <tr bgcolor="#FF6600" id="footer">
    <td height="50" colspan="2" align="center" bgcolor="#CC6600">Copyright &copy; 2013 Negombo South International School. All Rights Reserved</td>
  </tr>
</table>
</form>
</body>
</html>
<?php } }else {
		header("Location:index.php?id=Please Enter Email & Password"); 
		} ?>