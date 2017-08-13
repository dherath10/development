<?php
class customerOrder{
	private $total=0;
	//A method
	function addItem($amount){
		$this->total=$this->total+$amount;
		echo "<h3>Total Price : ".$this->total."</h3>";
	}
		
}
$obj=new customerOrder();
$obj->addItem(400);
?>