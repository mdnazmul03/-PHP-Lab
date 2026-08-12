<?php
/**
 * Self Study: Commonly Used PHP Built-in Functions
 * Each section shows a small example with a comment explaining what it does.
 */

echo "===== STRING FUNCTIONS =====\n";

// strlen() - returns the length (number of characters) of a string
$str = "Hello World";
echo "strlen: " . strlen($str) . "\n"; // 11

// str_word_count() - counts the number of words in a string
echo "str_word_count: " . str_word_count($str) . "\n"; // 2

// str_contains() - checks if a substring exists within a string (returns true/false)
var_dump(str_contains($str, "World")); // true

// strpos() - finds the position of the first occurrence of a substring
echo "strpos: " . strpos($str, "World") . "\n"; // 6

// strtoupper() - converts a string to all uppercase letters
echo "strtoupper: " . strtoupper($str) . "\n"; // HELLO WORLD

// strtolower() - converts a string to all lowercase letters
echo "strtolower: " . strtolower($str) . "\n"; // hello world

// str_replace() - replaces all occurrences of a search string with a replacement
echo "str_replace: " . str_replace("World", "PHP", $str) . "\n"; // Hello PHP

// strrev() - reverses a string
echo "strrev: " . strrev($str) . "\n"; // dlroW olleH

// trim() - removes whitespace (or other characters) from the start and end of a string
$padded = "   Trim Me   ";
echo "trim: '" . trim($padded) . "'\n"; // 'Trim Me'

// explode() - splits a string into an array using a delimiter
$parts = explode(" ", $str);
print_r($parts); // Array ( [0] => Hello [1] => World )

// implode() - joins array elements into a single string using a delimiter (alias: join)
echo "implode: " . implode("-", $parts) . "\n"; // Hello-World

// substr() - extracts a portion of a string starting at a given position/length
echo "substr: " . substr($str, 0, 5) . "\n"; // Hello


echo "\n===== TYPE CHECK / NUMBER FUNCTIONS =====\n";

// is_int() - checks whether a variable is of type integer
var_dump(is_int(10));    // true
var_dump(is_int(10.5));  // false

// is_float() - checks whether a variable is of type float
var_dump(is_float(10.5)); // true

// is_nan() - checks whether a value is "Not a Number" (NAN)
var_dump(is_nan(sqrt(-1))); // true

// is_numeric() - checks if a variable is a number or a numeric string
var_dump(is_numeric("123"));   // true
var_dump(is_numeric("abc"));   // false

// round() - rounds a floating-point number to a given precision
echo "round: " . round(3.14159, 2) . "\n"; // 3.14


echo "\n===== CONSTANTS / INCLUDE-REQUIRE =====\n";

// define() - defines a named constant
define("SITE_NAME", "My PHP Site");
echo "define: " . SITE_NAME . "\n";

// include / require - inserts and evaluates code from another file
// (require stops execution with a fatal error if the file is missing,
//  include only gives a warning and continues)
// Example (commented out since the file may not exist in this demo):
// include 'header.php';
// require 'config.php';
echo "include/require: used to import reusable PHP code from another file\n";


echo "\n===== DATE & TIME FUNCTIONS =====\n";

// date_default_timezone_set() - sets the default timezone used by date functions
date_default_timezone_set("Asia/Kolkata");

// date_default_timezone_get() - gets the currently set default timezone
echo "date_default_timezone_get: " . date_default_timezone_get() . "\n";

// time() - returns the current Unix timestamp (seconds since Jan 1 1970)
$now = time();
echo "time: " . $now . "\n";

// date() - formats a Unix timestamp into a readable date/time string
echo "date: " . date("Y-m-d H:i:s", $now) . "\n";

// strtotime() - parses an English textual date/time into a Unix timestamp
$ts = strtotime("next Monday");
echo "strtotime: " . date("Y-m-d", $ts) . "\n";


echo "\n===== JSON FUNCTIONS =====\n";

// array() - creates an array (can also use short syntax [])
$user = array("name" => "John", "age" => 25);

// json_encode() - converts a PHP value (array/object) into a JSON string
$json = json_encode($user);
echo "json_encode: " . $json . "\n"; // {"name":"John","age":25}

// json_decode() - converts a JSON string back into a PHP value (array/object)
$decoded = json_decode($json, true); // true = return as associative array
print_r($decoded);


echo "\n===== ARRAY FUNCTIONS =====\n";

// array_keys() - returns all the keys of an array
print_r(array_keys($user)); // Array ( [0] => name [1] => age )

// array_merge() - merges one or more arrays into one
$arr1 = array("a", "b");
$arr2 = array("c", "d");
$merged = array_merge($arr1, $arr2);
print_r($merged); // Array ( [0]=>a [1]=>b [2]=>c [3]=>d )

// array_push() - adds one or more elements to the end of an array
array_push($merged, "e");
print_r($merged); // ... [4] => e

// array_reverse() - returns an array with elements in reverse order
print_r(array_reverse($merged));

// sizeof() - alias of count(), returns the number of elements in an array
echo "sizeof: " . sizeof($merged) . "\n"; // 5

// count() - returns the number of elements in an array (or countable object)
echo "count: " . count($merged) . "\n"; // 5

// sort() - sorts an array in ascending order (re-indexes keys)
$numbers = array(5, 3, 8, 1, 9);
sort($numbers);
print_r($numbers); // Array ( [0]=>1 [1]=>3 [2]=>5 [3]=>8 [4]=>9 )

?>