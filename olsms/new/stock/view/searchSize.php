<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

$p_name=$_GET['q'];
include '../../../common/dbconnection.php';
$ob=new dbconnection();
$con=$ob->connection();

$s="SELECT * FROM size s,product_size ps WHERE ps.size_id=s.size_id AND ps.p_id IN (SELECT p_id FROM product WHERE p_name='$p_name')";
$r=$con->query($s); ?>

<select name="size_id" id="size_id" class="form-control">
<?php
while($ro=$r->fetch_assoc()){
    ?>
    <option value="<?php echo $ro['size_id']; ?>"><?php echo $ro['size_code']; ?></option>
<?php    
}

?>

</select>