<?php
//everything expect letters and numbers
$pass=$_POST['pass'];
if(preg_match('/^(?=.*\d)(?=.*[a-z])(?=.*[A-Z])(?!.*\s).*$/',$pass)){
		echo "<h2>Strong Password: $pass</h2>";
}else{
		echo "<h2>Not Strong Password: $pass</h2>";	
}

?><a href="validation_password.html">Back</a>