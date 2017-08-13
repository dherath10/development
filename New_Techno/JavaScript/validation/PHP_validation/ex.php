<?php
$localhost="localhost";
$user="root";
$password="";
$db="bit";

$conn=mysql_connect($localhost,$user,$password);
mysql_select_db($db,$conn);//mysql_select_db($db);

$sql="SELECT * FROM student";

mysql_query($sql,$conn); //mysql_query($sql);


//mysqli
$conn=mysqli_connect($localhost,$user,$password,$db);
mysqli_query($conn,$sql);

//Using an Object

$conn=new connect($localhost,$user,$password,$db);
$result=$conn->query($sql);






?>