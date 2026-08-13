<?php
// 2.9 MySQL Date and Time Functions
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
    HOUR(NOW()) AS hour_result,
    MINUTE(NOW()) AS minute_result,
    SECOND(NOW()) AS second_result,
    DATE_FORMAT(NOW(), '%d-%m-%Y') AS date_result,
    DATE_SUB(CURDATE(), INTERVAL 7 DAY) AS previous_date";

$result = $conn->query($sql);

if ($result) {
    $row = $result->fetch_assoc();

    echo "<h2>MySQL Time Functions</h2>";
    echo "HOUR(): " . $row["hour_result"] . "<br>";
    echo "MINUTE(): " . $row["minute_result"] . "<br>";
    echo "SECOND(): " . $row["second_result"] . "<br>";
    echo "DATE_FORMAT(): " . $row["date_result"] . "<br>";
    echo "DATE_SUB() (7 days before): " . $row["previous_date"] . "<br>";
} else {
    echo "Query Error: " . htmlspecialchars($conn->error);
}

$conn->close();
?>