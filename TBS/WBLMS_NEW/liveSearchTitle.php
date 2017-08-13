<?php

//To create the database connectivity
include "include/dbconnection.php";

if(isset($_POST['name']))
{
$name=trim($_POST['name']);
//To get Titles using live search
$sql="SELECT DISTINCT Title FROM item WHERE Title LIKE '%$name%'";
$query2 = mysqli_query($con,$sql);


while($query3=mysqli_fetch_array($query2))
{
?>

<span onclick='fillPub("<?php echo $query3['Title']; ?>")'>
<?php echo $query3['Title']; ?></span>
<br />
<?php
}
}
?>
