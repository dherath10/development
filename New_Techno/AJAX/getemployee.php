<?php
$q=$_GET["q"];

$con = mysql_connect('localhost', 'root', '010044403');
if (!$con)
 {
 die('Could not connect: ' . mysql_error());
 }

mysql_select_db("esoft_hrm", $con);

$sql="SELECT * FROM employee WHERE Name = '".$q."'";

$result = mysql_query($sql);

echo "<table border='1'>
<tr>
<th>Name</th>
<th>Designation</th>
<th>Salary</th>

</tr>";

while($row = mysql_fetch_array($result))
 {
 echo "<tr>";
 echo "<td>" . $row['Name'] . "</td>";
 echo "<td>" . $row['Designation'] . "</td>";
 echo "<td>" . $row['Salary'] . "</td>";
 
 echo "</tr>";
 }
echo "</table>";

mysql_close($con);
?>