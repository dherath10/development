function fillAuth1(Value)
{
$('#author1').val(Value);
$('#display2').hide();
}

$(document).ready(function(){
$("#author1").keyup(function() {
var name = $('#author1').val();
if(name=="")
{
$("#display2").html("");
}
else
{
$.ajax({
type: "POST",
url: "ajax2.php",
data: "name="+ name ,
success: function(html){
$("#display2").html(html).show();
}
});
}
});
});


function showNoAuth(str1) 
{
var xmlhttp;    
if (str1=="")
  {
  document.getElementById("shauth").innerHTML="";
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
    document.getElementById("shauth").innerHTML=xmlhttp.responseText;
    }
  }
  //the selected value from the menu list(str) passed to the getMonth1.php using q1
xmlhttp.open("GET","getAuth.php?q1="+str1,true); //
xmlhttp.send();
}