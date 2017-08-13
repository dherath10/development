<?php
$xmlDoc=new DOMDocument();
$xmlDoc->load("employee.xml");

$x=$xmlDoc->getElementsByTagName('EMPLOYEE');

//get the q parameter from URL
$q=$_GET["q"];

//lookup all links from the xml file if length of q>0
if (strlen($q)>0)
{
$hint="";
for($i=0; $i<($x->length); $i++)
  {
  $y=$x->item($i)->getElementsByTagName('FNAME');

  if ($y->item(0)->nodeType==1)
    {
    //find a link matching the search text
    if (stristr($y->item(0)->childNodes->item(0)->nodeValue,$q))
      {
      if ($hint=="")
        {
        $hint="<a href='view.php?id=" . 
        $y->item(0)->childNodes->item(0)->nodeValue . 
        "' target='_blank'>" . 
        $y->item(0)->childNodes->item(0)->nodeValue . "</a>";
        }
      else
        {
        $hint=$hint . "<br /><a href='view.php?id=" . 
        $y->item(0)->childNodes->item(0)->nodeValue . 
        "' target='_blank'>" . 
        $y->item(0)->childNodes->item(0)->nodeValue . "</a>";
        }
      }
    }
  }
}

// Set output to "no suggestion" if no hint were found
// or to the correct values
if ($hint=="")
  {
  $response="no suggestion";
  }
else
  {
  $response=$hint;
  }

//output the response
echo $response;
?>
