<?php
$q=$_GET["q"];
$con = mysql_connect('localhost', 'root', '010044403');
if (!$con)
 {
 die('Could not connect: ' . mysql_error());
 }
mysql_select_db("misdb", $con);
$sql="SELECT * FROM pro WHERE pcode = '".$q."'";
$result = mysql_query($sql);
echo "<table border='1'>
<tr>
<th>Product Code</th>
<th>Product Name</th>
<th>Product Details</th>
</tr>";
while($row = mysql_fetch_array($result))
 {
 echo "<tr>";
 echo "<td>" . $row['pcode'] . "</td>";
 echo "<td>" . $row['pname'] . "</td>";
 echo "<td>" . $row['pdiss'] . "</td>";
 echo "</tr>";
 }
echo "</table>";
mysql_close($con);
?>