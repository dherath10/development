<?php
$q=$_GET['q'];
$con = mysql_connect('localhost', 'root', '010044403');
if (!$con)
 {
 die('Could not connect: ' . mysql_error());
 }
mysql_select_db("wblms", $con);
$sql="SELECT Title FROM item WHERE Title LIKE '$q%'";
$result = mysql_query($sql);
while($row=mysql_fetch_array($result)){
	echo $row['Title']."<br/>";

}
?>
