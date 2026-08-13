<?php
// 2.1 Numeric, Associative and Multidimensional Arrays

$days = array("Monday", "Tuesday", "Wednesday", "Thursday", "Friday", "Saturday");

echo "<h2>Numeric Array - Days</h2>";
foreach ($days as $day) {
    echo $day . "<br>";
}

$months = array(
    "January" => 31,
    "February" => 28,
    "March" => 31,
    "April" => 30,
    "May" => 31,
    "June" => 30,
    "July" => 31,
    "August" => 31,
    "September" => 30,
    "October" => 31,
    "November" => 30,
    "December" => 31
);

echo "<h2>Associative Array - Months</h2>";
foreach ($months as $month => $numberOfDays) {
    echo $month . " = " . $numberOfDays . "<br>";
}

$laptop = array(
    array("Company" => "Dell", "Model" => "Inspiron", "Price" => 55000),
    array("Company" => "HP", "Model" => "Pavilion", "Price" => 60000)
);

echo "<h2>Multidimensional Array - Laptop</h2>";
foreach ($laptop as $data) {
    echo "Company: " . $data["Company"] . "<br>";
    echo "Model: " . $data["Model"] . "<br>";
    echo "Price: ₹" . $data["Price"] . "<br><br>";
}
?>