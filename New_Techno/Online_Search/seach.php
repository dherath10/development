<?php
$connection = mysql_connect('localhost', 'root', '010044403');
$db = mysql_select_db('wblms', $connection);
$term = strip_tags(substr($_POST['searchit'],0, 100));
$term = mysql_escape_string($term); // Attack Prevention
if($term=="")
echo "Enter Something to search";
else{
$query = mysql_query("SELECT * FROM item WHERE Title LIKE '{$term}%'", $connection);
$string = '';

if (mysql_num_rows($query)){
while($row = mysql_fetch_assoc($query)){
$string .= "<b>".$row['name']."</b> - ";
$string .= $row['email']."</a>";
$string .= "<br/>\n";
}

}else{
$string = "No matches found!";
}

echo $string;
}
?>