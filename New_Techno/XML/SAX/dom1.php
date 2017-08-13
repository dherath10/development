<?php
// XML data
$xml_string = "<?xml version='1.0'?>
<sentence>What a wonderful profusion of colors and smells in the market
<vegetable color='green'>cabbages</vegetable>,
<vegetable color='red'>tomatoes</vegetable>,
<fruit color='green'>apples</fruit>,
<vegetable color='purple'>aubergines</vegetable>,
<fruit color='yellow'>bananas</fruit>
</sentence>";
// create a DOM object from the XML data
if(!$doc =  new SimpleXMLElement($xml_string))
{
die("Error parsing XML");
}
// start at the root
$root = $doc->root();
// move down one level to the root's children
$children = $root->children();
// iterate through the list of children
foreach ($children as $child)
{
// if <vegetable> element
if ($child->tagname == "vegetable")
{
// go down one more level
// get the text node
$text = $child->children();
// print the content of the text node
echo "Found: " . $text[0]->content . "<br>";
}
}
?>
<input type="text" autocomplete="on"