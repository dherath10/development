<?php
$query=mysql_connect("localhost","root","010044403");
mysql_select_db("wblms",$query);
if(isset($_POST['name']))
{
$name=trim($_POST['name']);
$query2=mysql_query("SELECT Title FROM item WHERE Title LIKE '$name%'");
echo "<ul>";
while($query3=mysql_fetch_array($query2))
{
?>

<li onclick='fill("<?php echo $query3['Title']; ?>")'>
<?php echo $query3['Title']; ?></li>
<?php
}
}
?>
</ul>