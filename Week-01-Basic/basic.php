<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

$txt = "Hello world!";
$x = 5;
$y = 10.5;
echo "I love " . $txt . "!<br>";
echo ($x + $y) . "<br>";

$x = 5985;
var_dump($x);
$y = 10.365;
var_dump($y);
$cars = array("Volvo","BMW","Toyota");
var_dump($cars);

$favcolor = "red";
switch ($favcolor) {
	case "red":
		echo "Your favorite color is red!<br>";
		break;
	default:
		echo "Your favorite color is neither red, blue, nor green!<br>";
}

$age = 30;
if ($age < 10) {
	echo "you are baby!<br>";
} elseif ($age > 10 and $age < 18) {
	echo "You are grown up!<br>";
} else {
	echo "you are adult!<br>";
}

for ($x = 0; $x <= 10; $x++) {
	echo "The number is: $x <br>";
}

$age = array("Peter"=>"35", "Ben"=>"37", "Joe"=>"43");
foreach($age as $x => $val) {
	echo "$x = $val<br>";
}

function add(int $a, int $b) {
	return $a + $b;
}
echo add(5, 5) . "<br>";

class Student{
function Student($id) {
$this->id = $id;
 $this->name = $name;
}
}
// create an object
$richard = new Student(100, "Richard");
// show object properties
echo $richard . "<br>";
var_dump($richard);

?>