<!DOCTYPE html>
<html>

<head>
<style>
h1 {
    border-bottom: 3px solid #cc9900;
    color: #996600;
    font-size: 30px;
}
table, th , td {
    border: 1px solid grey;
    border-collapse: collapse;
    padding: 5px;
}
table tr:nth-child(odd) {
    background-color: #f1f1f1;
}
table tr:nth-child(even) {
    background-color: #ffffff;
}
</style>
</head>

<body>

<h1>Customers</h1>
<h3>Candidate Name: <input type="text" name="can" onChange="getCan(this.value)" />
<div id="id01"></div>

<script>
//function getCan(a){
var xmlhttp = new XMLHttpRequest();
var url = "MYSQL.php";

xmlhttp.onreadystatechange=function() {
    if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
        myFunction(xmlhttp.responseText);
    }
}
xmlhttp.open("GET", url, true);
xmlhttp.send();

function myFunction(response) {
    var arr = JSON.parse(response);
    var i;
    var out = "<table>";

    for(i = 0; i < arr.length; i++) {
        out += "<tr><td>" +
        arr[i].Fname +
        "</td><td>" +
        arr[i].District +
        "</td><td>" +
        arr[i].Email +
        "</td></tr>";
    }
    out += "</table>"
    document.getElementById("id01").innerHTML = out;
}
//}
</script>

</body>
</html>