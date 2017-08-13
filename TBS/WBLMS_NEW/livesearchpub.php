<?php
$q=$_GET['q'];
include "include/dbconnection.php";

$sql="SELECT * FROM publisher WHERE Publisher_Name LIKE '$q%'";
$result = mysqli_query($con,$sql);
while($row=mysqli_fetch_array($result)){
	echo $row['Publisher_Name']."<br/>";

}
?>