<?php
//Inheritance
class degree{
	public $uni;
	function assign($name){
		$this->uni=$name;	
	}	
	
}
class internaldegree extends degree{
		function display(){
			echo $this->uni." BIT";
		}
	}
$obj=new internaldegree();
$obj->assign("University of colombo schoo of computing");
$obj->display();
?>