<?php
$month = date("F");

echo "Current Month: " . $month . "<br><br>";

// If Else
if ($month == "January")
{
    echo "Using If Else : January";
}
else
{
    echo "Using If Else : " . $month;
}

echo "<br><br>";

// Switch Case
switch($month)
{
    case "January":
        echo "Using Switch : January";
        break;

    case "February":
        echo "Using Switch : February";
        break;

    case "March":
        echo "Using Switch : March";
        break;

    default:
        echo "Using Switch : " . $month;
}
?>