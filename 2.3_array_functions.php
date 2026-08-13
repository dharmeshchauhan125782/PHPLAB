<?php
// 2.3 Demonstration of Array Functions

echo "<h2>1) array_change_key_case()</h2>";
$arr = array("NAME" => "Rahul", "CITY" => "Vadodara");
print_r(array_change_key_case($arr, CASE_LOWER));

echo "<h2>2) array_chunk()</h2>";
$months = array("January", "February", "March", "April", "May", "June");
print_r(array_chunk($months, 2));

echo "<h2>3) array_count_values()</h2>";
$fruits = array("Apple", "Banana", "Apple", "Orange", "Banana", "Apple");
print_r(array_count_values($fruits));

echo "<h2>4) array_pop()</h2>";
$numbers = array(10, 20, 30);
array_pop($numbers);
print_r($numbers);

echo "<h2>5) array_push()</h2>";
array_push($numbers, 40);
print_r($numbers);

echo "<h2>6) array_unshift()</h2>";
array_unshift($numbers, 5);
print_r($numbers);

echo "<h2>7) array_shift()</h2>";
array_shift($numbers);
print_r($numbers);
?>