<?PHP
interface Moveable
{
	function moveForward($distance);
}
class Car
{
	protected $gas = 0;
	function __construct($amt)
	{
		$this->gas = $amt;
		echo "<p>At Start, Car contains". $this->gas."gallons of gas</p>";
}
}
class Sedan extends Car implements Moveable
{
	private $mileage = 18;
	public function moveForward($distance)
{
	$this->gas=$this->gas-round(($distance/$this->mileage),2);
	echo "<p>After moving forward $distance miles,Sedan contains $this->gas gallons of gas.</p>";
}
}
$my_car = new Sedan(20);$my_car->moveForward(50);
?>