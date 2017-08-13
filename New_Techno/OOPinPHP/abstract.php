<?php 
abstract class Message
{
	protected $message_content;
	function __construct($text)
	{
		$this->message_content = $text;
	}
	
	abstract public function displayMessage($color);
}
class display extends Message
{
public function displayMessage($color)
{
echo "<h1 style='color:$color'>".$this->message_content."</h1>";
}
}
$obj=new display("Web Scripting");
$obj->displayMessage("red");
?>