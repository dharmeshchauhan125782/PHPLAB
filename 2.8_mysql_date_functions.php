<?php
// 2.8 MySQL Date Functions
// Change database settings if required.

$host = "localhost";
$user = "root";
$password = "";
$database = "test";

$conn = new mysqli($host, $user, $password, $database);

if ($conn->connect_error) {
    die("Database connection failed: " . $conn->connect_error);
}

$sql = "SELECT
    DAYOFWEEK(CURDATE()) AS dayofweek_result,
    WEEKDAY(CURDATE()) AS weekday_result,
    DAYOFMONTH(CURDATE()) AS dayofmonth_result,
    DAYOFYEAR(CURDATE()) AS dayofyear_result,
    DAYNAME(CURDATE()) AS dayname_result";

$result = $conn->query($sql);

if ($result) {
    $row = $result->fetch_assoc();

    echo "<h2>MySQL Date Functions</h2>";
    echo "DAYOFWEEK(): " . $row["dayofweek_result"] . "<br>";
    echo "WEEKDAY(): " . $row["weekday_result"] . "<br>";
    echo "DAYOFMONTH(): " . $row["dayofmonth_result"] . "<br>";
    echo "DAYOFYEAR(): " . $row["dayofyear_result"] . "<br>";
    echo "DAYNAME(): " . $row["dayname_result"] . "<br>";
} else {
    echo "Query Error: " . htmlspecialchars($conn->error);
}

$conn->close();
?>