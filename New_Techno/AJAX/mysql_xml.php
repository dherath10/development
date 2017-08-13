<?php
//database configuration
$local = "localhost";
$user = "root";
$pass = "010044403";
$db   = "emusic";
$table = "shoping";
 
//connect to host
mysql_connect($local,$user,$pass);
//select database
mysql_select_db($db) or die( "Unable to select database");

$xml          = "<?xml version=\"1.0\" encoding=\"UTF-8\"?>";
$root_element = "emusic"; //fruits
$xml         .= "<$root_element>";
//select all items in table
$sql = "SELECT * FROM ".$table;
 
if (!$result = mysql_query($sql))
   die("Query failed.");
 
if(mysql_num_rows($result)>0)
{
   while($result_array = mysql_fetch_assoc($result))
   {
      $xml .= "<".$table.">";
       //loop through each key,value pair in row
      foreach($result_array as $key => $value)
      {
         //$key holds the table column name
         $xml .= "<$key>";
          //embed the SQL data in a CDATA element to avoid XML entity issues
         $xml .= "<![CDATA[$value]]>"; 
          //and close the element
         $xml .= "</$key>";
      }
       $xml.="</".$table.">";
   }
}
//close the root element
$xml .= "</$root_element>";
//send the xml header to the browser
header ("Content-Type:text/xml"); 
//output the XML data
echo $xml;
$filename = "emp.xml";
$content = file($filename);
$fp = fopen($filename,"w");
fputs($fp,$xml);
fclose($fp);
?>