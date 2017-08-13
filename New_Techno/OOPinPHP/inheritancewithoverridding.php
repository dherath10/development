<?php
//Inheritance with overridding
class degree{
	public $uni;
	function assign($name){
		$this->uni=$name;	
	}	
	function display(){
			echo $this->uni." BIT";
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