//functions.js
//Function to determine when the process_upload.php file has finished executing.
function doneloading(theframe,thefile){
var theloc = "showimg.php?thefile=" + thefile
theframe.processajax ("showimg",theloc);
}