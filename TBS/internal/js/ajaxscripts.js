//        AJAX
        
function showProvince(str)
{
var xmlhttp;    
if (str=="")
  {
  document.getElementById("showpro").innerHTML="";
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
xmlhttp.onreadystatechange=function()
  {
  if (xmlhttp.readyState==4 && xmlhttp.status==200)
    {
    document.getElementById("showpro").innerHTML=xmlhttp.responseText;
    }
  }
xmlhttp.open("GET","../../../common/getProvince.php?q="+str,true);
xmlhttp.send();
}

//To find existing user name
function showUserName(str)
{
var xmlhttp;    
if (str=="")
  {
  document.getElementById("showName").innerHTML="";
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
xmlhttp.onreadystatechange=function()
  {
  if (xmlhttp.readyState==4 && xmlhttp.status==200)
    {
    document.getElementById("showName").innerHTML=xmlhttp.responseText;
    }
  }
xmlhttp.open("GET","../../../common/getUserName.php?q="+str,true);
xmlhttp.send();
}

//to show user logs
function showUserLog(str)
{
var xmlhttp;    
if (str=="")
  {
  document.getElementById("displayU").innerHTML="";
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
xmlhttp.onreadystatechange=function()
  {
  if (xmlhttp.readyState==4 && xmlhttp.status==200)
    {
    document.getElementById("displayU").innerHTML=xmlhttp.responseText;
    }
  }
xmlhttp.open("GET","../../../common/getUserLog.php?q="+str,true);
xmlhttp.send();
}

//To get Model
function getModel(str)
{
var xmlhttp;    
if (str=="")
  {
  document.getElementById("displayModel").innerHTML="";
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
xmlhttp.onreadystatechange=function()
  {
  if (xmlhttp.readyState==4 && xmlhttp.status==200)
    {
    document.getElementById("displayModel").innerHTML=xmlhttp.responseText;
    }
  }
xmlhttp.open("GET","../../../common/getModel.php?q="+str,true);
xmlhttp.send();
}
//End of AJAX