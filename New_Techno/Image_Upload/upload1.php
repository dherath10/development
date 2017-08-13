<?php 
//connect to database. Username and password need to be changed 
$connection=mysql_connect("localhost", "root", "010044403"); 

//Select database, database_name needs to be changed 
mysql_select_db("tech"); 

//get decoded image data from database 
$result=mysql_query("SELECT * FROM images WHERE `data`='$_REQUEST[a]'"); 

//fetch data from database 
$data=mysql_fetch_array($result); 
 header('Content-Type: image/jpeg');
echo "<img src=".$data['data']."/>"; 

mysql_close($connection); 


//end 
?>