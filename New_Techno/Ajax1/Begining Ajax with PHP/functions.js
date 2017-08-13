// JavaScript Document
var xmlhttp = false;

//Check if we are using IE.
try {
//If the javascript version is greater than 5.
xmlhttp = new ActiveXObject("Msxml2.XMLHTTP");
} catch (e) {
//If not, then use the older active x object.
try {
//If we are using IE.
xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
} catch (E) {
//Else we must be using a non-IE browser.
xmlhttp = false;
}
}
//If we are using a non-IE browser, create a JavaScript instance of the object.
if (!xmlhttp && typeof XMLHttpRequest != 'undefined') {
xmlhttp = new XMLHttpRequest();
}
//A variable used to distinguish whether to open or close the calendar.
var showCalendar = true;
function showHideCalendar() {
//The location we are loading the page into.
var objID = "calendar";
//Change the current image of the minus or plus.
if (showCalendar == true){
//Show the calendar.
document.getElementById("opencloseimg").src = "images/mins.gif";
//The page we are loading.
var serverPage = "calendar.php";
//Set the open close tracker variable.
showCalendar = false;
var obj = document.getElementById(objID);
xmlhttp.open("GET", serverPage);
xmlhttp.onreadystatechange = function() {
28 CHAPTER 3 ¦ PHP AND AJAX
if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
obj.innerHTML = xmlhttp.responseText;
}
}
xmlhttp.send(null);
} else {
//Hide the calendar.
document.getElementById("opencloseimg").src = "images/plus.gif";
showCalendar = true;
document.getElementById(objID).innerHTML = "";
}
}