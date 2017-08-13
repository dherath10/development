<?php
//Initialize the XML parser
$parser=xml_parser_create();
//Function to use at the start of an element
function start($parser,$element_name,$element_attrs)
{
switch($element_name)
{
case "ADDRESS":
echo "-- Address --<br />";
break;
case "NO":
echo "No: ";
break;
case "STREET":
echo "Street: ";
break;
case "TOWN":
echo "Town: ";
break;
case "COUNTRY":
echo "Country: ";
}
}
function stop($parser,$element_name)
{
echo "<br />";
}
function char($parser,$data)
{
echo $data;
}
//Specify element handler
xml_set_element_handler($parser,"start","stop");
//Specify data handler
xml_set_character_data_handler($parser,"char");
//Open XML file
$fp=fopen("address.xml","r");
//Read data
while ($data=fread($fp,4096))
{
xml_parse($parser,$data,feof($fp)) or
die (sprintf("XML Error: %s at line %d",
xml_error_string(xml_get_error_code($parser)),
xml_get_current_line_number($parser)));
}
//Free the XML parser
xml_parser_free($parser);
?>