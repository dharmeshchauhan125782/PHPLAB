<?php
// 2.5 Type Casting using settype() and gettype()

$value = "100";

echo "Value: " . $value . "<br>";
echo "Before Casting Type: " . gettype($value) . "<br>";

settype($value, "integer");

echo "After Casting Value: " . $value . "<br>";
echo "After Casting Type: " . gettype($value) . "<br>";
?>