<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Upload N refresh</title>
<script>

function showImage(str1) 
{
var xmlhttp;    
if (str1=="")
  {
  document.getElementById("show").innerHTML="";
  return;
  }
if (window.XMLHttpRequest)
  {// code for IE7+, Firefox, Chrome, Opera, Safari
  xmlhttp=new XMLHttpRequest();
  }
else
  {// code for IE6, IE5
  xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
  }
xmlhttp.onreadystatechange=function() //onreadystatechange:stores a function to call automatically when readyState property changes
  {
	  //Response successfull
  if (xmlhttp.readyState==4 && xmlhttp.status==200) //readyState:4= request finished and response is ready
  //status:200="OK"
    {
    document.getElementById("show").innerHTML=xmlhttp.responseText;
    }
  }
  //the selected value from the menu list(str) passed to the getMonth.php using q1
xmlhttp.open("GET","getShow.php?q1="+str1,true); ///////////////
xmlhttp.send();
}
</script>
</head>

<body>
<span id="show">
 <input type="file" name="photo" id="photo" onchange="showImage(this.value)" />
</span>
</body>
</html>
