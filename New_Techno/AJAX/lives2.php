<?php $query=mysql_connect("localhost","root","010044403"); 
mysql_select_db("wblms",$query); ?> 
<html xmlns="http://www.w3.org/1999/xhtml"> <head> <meta http-equiv="Content-Type" content="text/html; charset=utf-8" /> <title>Untitled Document</title> 
<link rel="stylesheet" href="style.css" type="text/css">
<script type="text/javascript" src="gg.js"></script>
<script type="text/javascript">
function fill(Value)
{
$('#name').val(Value);
$('#display').hide();
}

$(document).ready(function(){
$("#name").keyup(function() {
var name = $('#name').val();
if(name=="")
{
$("#display").html("");
}
else
{
$.ajax({
type: "POST",
url: "ajax.php",
data: "name="+ name ,
success: function(html){
$("#display").html(html).show();
}
});
}
});
});
</script>
</head>
<body>
<div id="content">
<?php
$val='';
if(isset($_POST['submit']))
{
if(!empty($_POST['name']))
{
$val=$_POST['name'];
}
else
{
$val='';
}
}
?>

<form method="post" action="lives2.php">
Search : <input type="text" name="name" id="name" autocomplete="off"
value="<?php echo $val;?>">
<input type="submit" name="submit" id="submit" value="Search">
</form>

<div id="display"></div>

aaaaa
<?php
if(isset($_POST['submit']))
{
if(!empty($_POST['name']))
{
$name=$_POST['name'];
$query3=mysql_query("SELECT Title FROM item WHERE Title LIKE '$name%'");
while($query4=mysql_fetch_array($query3))
{
echo "<div id='box'>";
echo "<b>".$query4['Title']."</b>";
echo "<div id='clear'></div>";
//echo $query4['descr'];
echo "</div>";
}
}
else
{
echo "No Results";
}
}
?>
</div>
</body>
</html>