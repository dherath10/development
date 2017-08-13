<?php
//Get user type(Student)
$user=$_GET['q'];
//To get classes ( 1 to 11 )
$a=array("A","B","C","D","E");
//To get the classes (1 to 13)
$b=array("A","B","C");
if($user==5){

?>
<table width="800" border="0"> 
<tr>
          <td  class="body_p" width="366">Class</td>
          <td width="424" class="alert"><label for="class"></label>
            <select name="class">
            <?php 
			//to generate classes using two loops 
			for($i=1; $i<=11; $i++){
				foreach($a as $e) //$a=array name and $e is an element name inside the array
				{			
				?>
            <option value="<?php echo $i.$e; ?>"><?php echo $i.$e; ?> </option>
			<?php } } ?>
            <?php //To display classes from 12 to 13 ?>
            <?php for($i=12; $i<=13; $i++){
				foreach($b as $e)
				{			
				?>
            <option value="<?php echo $i.$e; ?>"><?php echo $i.$e; ?> </option>
			<?php } } ?>
            </select>
            
            <span id="class1"></span></td>
        </tr>
       
</table>
<?php } 
?>