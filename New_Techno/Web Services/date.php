<?php
$header ="Content-Type: application/json";
header($header);
$date = date("M d, Y");
print json_encode($date);
?>

