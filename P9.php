<?php
$numbers = array(10,20,30,40,50);

echo "Original Array:<br>";

foreach($numbers as $value)
{
    echo $value . " ";
}

echo "<br><br>";

$reverse = array_reverse($numbers);

echo "Reversed Array:<br>";

foreach($reverse as $value)
{
    echo $value . " ";
}
?>
