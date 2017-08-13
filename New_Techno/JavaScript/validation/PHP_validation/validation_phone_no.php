<?php
//everything expect letters and numbers
$pno=$_POST['pno'];
if(preg_match('/^\+94[0-9]{10}$/',$pno)){
		echo "<h2>Valid Phone Number: $pno</h2>";
}else{
		echo "<h2>Invalid Phone Number: $pno</h2>";	
}
///^[a-z ,.'-]+$/i
?><a href="validation_phone_no.html">Back</a>