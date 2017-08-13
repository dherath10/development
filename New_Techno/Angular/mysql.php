<?php
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");

$conn = new mysqli("localhost", "root", "010044403", "jprm");

$result = $conn->query("SELECT * FROM candidate");

$outp = "[";
while($rs = $result->fetch_array(MYSQLI_ASSOC)) {
    if ($outp != "[") {$outp .= ",";}
    $outp .= '{"Fname":"'  . $rs["Fname"] . '",';
    $outp .= '"District":"'   . $rs["District"]        . '",';
    $outp .= '"Email":"'. $rs["Email"]     . '"}'; 
}
$outp .="]";

$conn->close();

echo($outp);
?>