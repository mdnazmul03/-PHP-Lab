<?php

// ==========================================
// 1. VARIABLES
// ==========================================

$name = "Rahim";
$age = 20;
$marks = 85.5;
$isStudent = true;

echo "<h2>1. Variables</h2>";

echo "Name: " . $name . "<br>";
echo "Age: " . $age . "<br>";
echo "Marks: " . $marks . "<br>";
echo "Student: " . $isStudent . "<br>";


// ==========================================
// 2. DATA TYPES
// ==========================================

echo "<h2>2. Data Types</h2>";

$string = "Hello PHP";
$integer = 100;
$float = 10.50;
$boolean = true;
$nothing = null;

echo "String: " . $string . "<br>";
echo "Integer: " . $integer . "<br>";
echo "Float: " . $float . "<br>";
echo "Boolean: " . $boolean . "<br>";
echo "Null: ";
var_dump($nothing);

echo "<br>";


// ==========================================
// 3. IF-ELSE
// ==========================================

echo "<h2>3. If-Else</h2>";

$studentMarks = 75;

if ($studentMarks >= 80) {

    echo "Grade: A+";

} elseif ($studentMarks >= 70) {

    echo "Grade: A";

} elseif ($studentMarks >= 60) {

    echo "Grade: B";

} elseif ($studentMarks >= 50) {

    echo "Grade: C";

} else {

    echo "Grade: F";
}


// ==========================================
// 4. SWITCH CASE
// ==========================================

echo "<h2>4. Switch Case</h2>";

$day = 3;

switch ($day) {

    case 1:
        echo "Saturday";
        break;

    case 2:
        echo "Sunday";
        break;

    case 3:
        echo "Monday";
        break;

    case 4:
        echo "Tuesday";
        break;

    case 5:
        echo "Wednesday";
        break;

    case 6:
        echo "Thursday";
        break;

    case 7:
        echo "Friday";
        break;

    default:
        echo "Invalid day";
}


// ==========================================
// 5. FOR LOOP
// ==========================================

echo "<h2>5. For Loop</h2>";

for ($i = 1; $i <= 5; $i++) {

    echo "Number: " . $i . "<br>";
}


// ==========================================
// 6. WHILE LOOP
// ==========================================

echo "<h2>6. While Loop</h2>";

$i = 1;

while ($i <= 5) {

    echo "Number: " . $i . "<br>";

    $i++;
}


// ==========================================
// 7. DO-WHILE LOOP
// ==========================================

echo "<h2>7. Do-While Loop</h2>";

$i = 1;

do {

    echo "Number: " . $i . "<br>";

    $i++;

} while ($i <= 5);


// ==========================================
// 8. ARRAY
// ==========================================

echo "<h2>8. Array</h2>";

$students = array("Rahim", "Karim", "Hasan", "Sakib");

echo "Student 1: " . $students[0] . "<br>";
echo "Student 2: " . $students[1] . "<br>";
echo "Student 3: " . $students[2] . "<br>";
echo "Student 4: " . $students[3] . "<br>";


// ==========================================
// 9. ARRAY WITH FOR LOOP
// ==========================================

echo "<h2>9. Array with For Loop</h2>";

for ($i = 0; $i < count($students); $i++) {

    echo $students[$i] . "<br>";
}


// ==========================================
// 10. FOREACH LOOP
// ==========================================

echo "<h2>10. Foreach Loop</h2>";

foreach ($students as $student) {

    echo $student . "<br>";
}


// ==========================================
// 11. ASSOCIATIVE ARRAY
// ==========================================

echo "<h2>11. Associative Array</h2>";

$student = array(
    "name" => "Rahim",
    "age" => 20,
    "department" => "CSE",
    "marks" => 85
);

echo "Name: " . $student["name"] . "<br>";
echo "Age: " . $student["age"] . "<br>";
echo "Department: " . $student["department"] . "<br>";
echo "Marks: " . $student["marks"] . "<br>";


// ==========================================
// 12. FOREACH WITH ASSOCIATIVE ARRAY
// ==========================================

echo "<h2>12. Foreach with Associative Array</h2>";

foreach ($student as $key => $value) {

    echo $key . " : " . $value . "<br>";
}


// ==========================================
// 13. SIMPLE CALCULATION
// ==========================================

echo "<h2>13. Arithmetic Operators</h2>";

$a = 20;
$b = 10;

echo "Addition: " . ($a + $b) . "<br>";
echo "Subtraction: " . ($a - $b) . "<br>";
echo "Multiplication: " . ($a * $b) . "<br>";
echo "Division: " . ($a / $b) . "<br>";
echo "Modulus: " . ($a % $b) . "<br>";


// ==========================================
// 14. COMBINING VARIABLES + IF-ELSE
// ==========================================

echo "<h2>14. Student Result</h2>";

$name = "Karim";
$marks = 82;

echo "Student Name: " . $name . "<br>";
echo "Marks: " . $marks . "<br>";

if ($marks >= 80) {

    echo "Result: Excellent";

} elseif ($marks >= 60) {

    echo "Result: Good";

} elseif ($marks >= 40) {

    echo "Result: Pass";

} else {

    echo "Result: Fail";
}


// ==========================================
// 15. NESTED IF
// ==========================================

echo "<h2>15. Nested If</h2>";

$age = 20;
$hasID = true;

if ($age >= 18) {

    if ($hasID == true) {

        echo "You can enter.";

    } else {

        echo "You need an ID.";

    }

} else {

    echo "You are under 18.";
}

?>