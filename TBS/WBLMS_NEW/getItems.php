<?php
$items=$_GET['q1'];

if($items=="books" || $items=="cd" || $items=="serial"){
?>

<?php
}else{
?>

<input type="text" name="search" id="search" required="required" value="e"/>
<?php
}


?>