<?php
class customeDetails{
	private $cus_name;
	private $cus_city;
	
	//Constructor function
	function __construct($name,$city){
		$this->cus_name=$name;
		$this->cus_city=$city;	
	}
	function display(){
		echo "Customer Details : ".$this->cus_name. " ".$this->cus_city;	
	}		
}
$obj=new customeDetails("Thilina","Horana");
$obj->display();
?>
