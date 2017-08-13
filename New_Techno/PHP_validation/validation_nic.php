<?php
//everything expect letters and numbers
$nic=$_POST['nic'];
if(preg_match('/^[0-9]{9}[vV]$/',$nic)){
		echo "<h2>Valid NIC no: $nic</h2>";
}else{
		echo "<h2>Invalid NIC No: $nic</h2>";	
}

?><a href="validation_nic.html">Back</a>