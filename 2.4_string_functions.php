<?php
// 2.4 Demonstration of String Functions

$str = "Welcome to PHP Programming";

echo "String: " . $str . "<br>";
echo "1) strlen(): " . strlen($str) . "<br>";
echo "2) strpos() - Position of PHP: " . strpos($str, "PHP") . "<br>";
echo "3) str_word_count(): " . str_word_count($str) . "<br>";
echo "4) strrev(): " . strrev($str) . "<br>";
echo "5) strtolower(): " . strtolower($str) . "<br>";
echo "6) strtoupper(): " . strtoupper($str) . "<br>";
?>