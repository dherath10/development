<?php 
session_start();
$q=$_GET["q"];

$con = mysql_connect("localhost","root","010044403");
if (!$con)
  {
  die('Could not connect: ' . mysql_error());
  }

mysql_select_db("misdb", $con);

$result = mysql_query("SELECT * FROM pro WHERE pname LIKE '$q%'");
$num = mysql_num_rows($result);


?>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Show Buyers Details of <?php echo $q; ?> </title>
<link href="wimis.css" rel="stylesheet" type="text/css">
</head>

<body topmargin="0" leftmargin="0" bottommargin="0" rightmargin="0">
<center>

<table width="800" border="0" cellpadding="0" cellspacing="0">
  <!--DWLayoutTable-->
  <tr>
    <td height="25" colspan="6" align="center" valign="middle" class="header1">Wishwaloka Internal Management Information System (WIMIS)</td>
    </tr>
  <tr>
    <td height="75" colspan="6" align="center" valign="top"><img src="icon/UOC.bmp" alt="Logo" width="75" height="75"></td>
    </tr>
  <tr>
    <td height="34" colspan="6" align="right" valign="bottom" class="link"><b><img src="icon/setting.ico">&nbsp;<b><?php echo $_SESSION['username'] ?>(Administrator)</b>&nbsp;&nbsp;<a class="link" href="signoutusers.php?name=<?php echo $_SESSION['username']; ?>">[Sign Out]</a></b></td>
    </tr>
  <tr>
    <td width="200" height="20" valign="top" bgcolor="CCCCCC"><a href="bcodeadv.php"><img src="icon/buyer.png" width="20" height="20" border="0"></a></td>
    <td colspan="4" align="center" valign="middle" bgcolor="#CCCCCC" class="login">Show Buyer's Details</td>
    <td width="200" align="right" valign="top" bgcolor="CCCCCC"><a class="link" href="signoutusers.php?name=<?php echo $_SESSION['username']; ?>"><img alt="Logout" src="icon/ca.gif" border="0" width="20" height="20"></a></td>
    </tr>
  <tr>
    <td height="25" align="left" valign="middle" class="link">No fo Records : <?php echo $num; ?> 	</td>
    <td colspan="4" align="center" valign="middle" class="info">Search by Buyer Name: <?php echo $pname ?></td>
    <td align="right" valign="middle"><span><a href="pcodeadv.php" class="link"><img src="icon/product.png" width="20" height="20" border="0">(Productr Code Details)</a></span></td>
    </tr>
  
  
  
  <tr>
    <td height="68" colspan="6" valign="top">
	
	  <table border="1" align="center" >
	    <!--DWLayoutTable-->
  <tr bgcolor="#CCCCCC" class="login" align="center">
    <td>&nbsp;Product Code:&nbsp;</td>
	  <td>&nbsp;Product Name:&nbsp;</td>
	  <td width="300">&nbsp;Product Details:&nbsp;</td>
	  
	  <td>&nbsp;</td>
  </tr>
  <?php
$data=0;
while($row = mysql_fetch_array($result))
  {
  $data=1;
  ?>
  <tr class="inputs" >
    <td align="center" bgcolor="EFEFEF">
      <?php echo $row['pcode']; ?>	</td>
	  <td align="center" bgcolor="EFEFEF">
	    <?php echo $row['pname']; ?>	</td>
	  <td align="center" bgcolor="EFEFEF">
	    <?php echo $row['pdiss']; ?>	</td>
	  
	  <td bgcolor="EFEFEF"><a href="editpro.php?id=<?php echo $row['pcode']; ?>">[Edit]</a></td>
    </tr>
	    <?php
  } 
  ?>
      </table></td>
    </tr>
  <tr>
    <td height="193">&nbsp;</td>
    <td width="50">&nbsp;</td>
    <td width="150">&nbsp;</td>
    <td width="150">&nbsp;</td>
    <td width="50">&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td colspan="2" rowspan="2" valign="top" bgcolor="EFEFEF"><!--DWLayoutEmptyCell-->&nbsp;</td>
    <td width="150" height="50" align="center" valign="middle" bgcolor="EFEFEF"><a href="pcodeadv.php"><img src="icon/product.png" width="40" height="40" border="0"></a></td>
    <td width="150" align="center" valign="middle" bgcolor="EFEFEF"><a class="login1" href="adminlog_log.php"><img src="icon/WhiteHouse.png" alt="Administrator Home Page" width="40" height="40" border="0"></a></td>
    <td colspan="2" rowspan="2" valign="top" bgcolor="EFEFEF"><!--DWLayoutEmptyCell-->&nbsp;</td>
    </tr>
  <tr>
    <td height="24" align="center" valign="top" bgcolor="EFEFEF"><a class="link" href="pcodeadv.php">Product Code Details </a></td>
    <td align="center" valign="top" bgcolor="EFEFEF"><a class="link" href="adminlog_log.php">Administrator Home</a></td>
    </tr>
  
  
  
  
  
  
  
  
  
  
  
  <tr>
    <td height="22" colspan="6" valign="top"><!--DWLayoutEmptyCell-->&nbsp;</td>
  </tr>
  <tr>
    <td height="50" colspan="6" align="center" valign="middle" class="createcopy"> Copyright &copy; 2007 Wiswaloka Industries..... All rights reserved<br />
	Created by <a href="daminda.php">Daminda Herath</a> for Wiswaloka	</td>
    </tr>
</table>

</center>
</body>
</html>

  

