<?php
// 2.10 MySQL Current Date and Time Functions
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
    CURDATE() AS current_date_result,
    CURRENT_DATE() AS current_date_result_2,
    CURTIME() AS current_time_result,
    CURRENT_TIME() AS current_time_result_2,
    UNIX_TIMESTAMP() AS unix_result";

$result = $conn->query($sql);

if ($result) {
    $row = $result->fetch_assoc();

    $timestamp = (int) $row["unix_result"];
    $fromUnix = date("Y-m-d H:i:s", $timestamp);

    echo "<h2>MySQL Current Date and Time Functions</h2>";
    echo "CURDATE(): " . $row["current_date_result"] . "<br>";
    echo "CURRENT_DATE(): " . $row["current_date_result_2"] . "<br>";
    echo "CURTIME(): " . $row["current_time_result"] . "<br>";
    echo "CURRENT_TIME(): " . $row["current_time_result_2"] . "<br>";
    echo "UNIX_TIMESTAMP(): " . $row["unix_result"] . "<br>";
    echo "FROM_UNIXTIME(): " . $fromUnix . "<br>";
} else {
    echo "Query Error: " . htmlspecialchars($conn->error);
}

$conn->close();
?>