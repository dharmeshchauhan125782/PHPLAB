<?php
echo "<h3>Using For Loop</h3>";

for($i=5;$i<=10;$i++)
{
    echo $i . "<br>";
}

echo "<h3>Using Foreach Loop</h3>";

$arr = array(5,6,7,8,9,10);

foreach($arr as $value)
{
    echo $value . "<br>";
}
?>