<?php 

mysql_connect("localhost", "root", "010044403"); 
mysql_select_db("tech"); 

if (!isset($_POST['upload'])){ 
//If nothing has been uploaded display the form 
?> 

<form action="<? echo $_SERVER['PHP_SELF']; ?>" method="post"  
ENCTYPE="multipart/form-data"> 
Upload:<br><br> 
<input type="file" name="image"><br><br> 
<input type="hidden" name="uploaded" value="1"> 
<input type="submit" value="Upload" name="upload"> 
</form> 

<? 
}else{ 
$image=$_FILES['image']['tmp_name']; 
//get users IP 
$ip=$_FILES['image']['name']; 
 
if (!empty($image)){ 
//insert information into the database 
mysql_query("INSERT INTO images (img,data)"."VALUES ('NULL', '$ip')"); 
$id=mysql_insert_id();
} 

?>
<a href="upload1.php?a=<?php echo $id; ?>" >Click</a>
<?php




} 
?>