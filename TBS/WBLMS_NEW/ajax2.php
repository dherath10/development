<?php

//To create the database connectivity
include "include/dbconnection.php";

if(isset($_POST['name']))
{
$name=trim($_POST['name']);

$sql="SELECT * FROM author WHERE Author_Name LIKE '$name%'";
$query2 = mysqli_query($con,$sql);


while($query3=mysqli_fetch_array($query2))
{
?>

<span onclick='fillAuth1("<?php echo $query3['Author_Name']; ?>")'>
<?php echo $query3['Author_Name']; ?></span>
<br />
<?php
}
}
?>
