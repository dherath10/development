<?php 
$con = mysql_connect('localhost', 'root', '010044403');
if (!$con)
 {
 die('Could not connect: ' . mysql_error());
 }
mysql_select_db("esoft_hrm", $con);
$sql="SELECT Name FROM employee";
$result = mysql_query($sql);
?>
<!DOCTYPE html>
<html>
<head>
<script type="text/javascript">
function showEmployee(str)
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
xmlhttp.onreadystatechange=function()
  {
  if (xmlhttp.readyState==4 && xmlhttp.status==200)
    {
    document.getElementById("txtHint").innerHTML=xmlhttp.responseText;
    }
  }
xmlhttp.open("GET","getemployee.php?q="+str,true);
xmlhttp.send();
}
</script>
</head>
<body>

<form action=""> 
<select name="employee" onchange="showEmployee(this.value)">
<option value="">Select a Employee:</option>
<?php
while($row = mysql_fetch_array($result))
 { ?>
<option value="<?php echo $row['Name']; ?>"><?php echo $row['Name']; ?></option>

<?php
}
?>
</select>
</form>
<br />
<div id="txtHint">Customer info will be listed here...</div>

</body>
</html>
