// functions.js
function runajax(objID, serverPage)
{
//Create a boolean variable to check for a valid Internet Explorer instance.
var xmlhttp = false;
//Check if we are using IE.
try {
//If the JavaScript version is greater than 5.
xmlhttp = new ActiveXObject("Msxml2.XMLHTTP");
} catch (e) {
//If not, then use the older ActiveX object.
try {
//If we are using Internet Explorer.
xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
} catch (E) {
//Else we must be using a non-IE browser.
xmlhttp = false;
}
}
// If we are not using IE, create a JavaScript instance of the object.
if (!xmlhttp && typeof XMLHttpRequest != 'undefined') {
xmlhttp = new XMLHttpRequest();
}
var obj = document.getElementById(objID);
xmlhttp.open("GET", serverPage);
xmlhttp.onreadystatechange = function() {
if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {

obj.innerHTML = xmlhttp.responseText;
}
}
xmlhttp.send(null);
}
// Delay in milliseconds before refreshing gallery.
var refreshrate = 1000;
//Function to show a loading message.
function updateStatus()
{
document.getElementById("errordiv").innerHTML = "";
document.getElementById("middiv").innerHTML = "<b>Loading...</b>";
}
function refreshView()
{
// Reload the full-size image.
setTimeout ('runajax ("middiv","midpic.php")',refreshrate);
// Reload the navigation.
setTimeout ('runajax ("picdiv","picnav.php")',refreshrate);
}
function uploadimg(theform)
{
// Update user status message.
updateStatus();
// Now submit the form.
theform.submit();
// And finally update the display.
refreshView();
}
function removeimg(theimg)
{
runajax("errordiv", "delpic.php?pic=" + theimg);
refreshView();
}

function imageClick(img)
{
updateStatus();
runajax('middiv', 'midpic.php?curimage=' + img);
runajax('picdiv', 'picnav.php?curimage=' + img);
}