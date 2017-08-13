<?php 
$noau=$_GET['q1'];
if($noau==1){
?>
	<input type="text" name="author1[]" id="author1" /> <br />
     <div id="display2"></div>
<?php } 
      
 if($noau==2){
?>
	<input type="text" name="author[]" id="author1" /> <br />
    <input type="text" name="author[]" id="author2" /> <br />
     <div id="display1"></div>
<?php }  if($noau==3){
?>
	<input type="text" name="author[]" id="author1" /> <br />
    <input type="text" name="author[]" id="author2" /> <br />
     <input type="text" name="author[]" id="author3" /> <br />
<?php } ?>  