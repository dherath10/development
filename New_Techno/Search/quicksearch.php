<ul>
   <table class="table table-bordered">

    <tbody>
	
<?php
include('config.php');
$count= 0;
$key =  $_POST['key'];
$key = addslashes($key);
$sql = mysql_query("select DISTINCT Title,Item_ID from item WHERE Title LIKE '%$key%'") or die(mysql_error());

    While($row = mysql_fetch_array($sql)) {
	$count++;
	$bookid= $row['Item_ID'];
	$title=$row['Title'];

	if($count<= 10){
?>

	
	
		<div class="show<?php echo $bookid; ?>">
		
	 
	
    <tr>
    <td><a><i class="icon-book"></i>&nbsp;<?php echo $title; ?></a></td>
  
    </tr>


	
	
		</div>
<?php }}
if($count==""){
echo "no match Found";
}else{
 ?>
 
 
 
 <?php } ?>
 </ul>
 		
    </tbody>
    </table>	