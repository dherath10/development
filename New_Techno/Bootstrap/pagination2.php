<?php
$host="localhost";$user="root";$pw="010044403";$db="hotel";
	$con=mysql_connect($host,$user,$pw) or die(mysql_error());
	mysql_select_db($db,$con) or die(mysql_errno());

$sql=mysql_query("SELECT * FROM room");
$count=mysql_num_rows($sql);


$perpage=($count / 5);
echo $perpage=ceil($count / 5);

$sqla="select * from room r,room_type rt where r.room_type=rt.room_type_id LIMIT $page1,5";
$resulta=mysql_query($sqla);

?>
<!DOCTYPE html>
<html>
<head>
   <title>Try v1.2 Bootstrap Online</title>
   <link href="bootstrap-3.3.4-dist/css/bootstrap.min.css" rel="stylesheet">
   <script src="jquery-2.1.4.min.js"></script>
   <script src="bootstrap-3.3.4-dist/js/bootstrap.min.js"></script>
  
</head>
<body>
<ul class="pagination">
  
  <li><a href="#">1</a></li>
  <li><a href="#">2</a></li>
  <li><a href="#">3</a></li>
  <li><a href="#">4</a></li>
  <li><a href="#">5</a></li>
  <li><a href="#">&raquo;</a></li>
</ul>

</body>
</html>
