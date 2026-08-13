<?php
// 2.7 MySQL String Functions
// This program connects to MySQL and runs the required functions.
// Change these settings if your XAMPP/MySQL setup uses different values.

$host = "localhost";
$user = "root";
$password = "";
$database = "test";

$conn = new mysqli($host, $user, $password, $database);

if ($conn->connect_error) {
    die("Database connection failed: " . $conn->connect_error);
}

$queries = array(
    "LENGTH()" => "SELECT LENGTH('Programming') AS result",
    "CONCAT()" => "SELECT CONCAT('Hello', ' ', 'World') AS result",
    "CONCAT_WS()" => "SELECT CONCAT_WS('-', '2026', '08', '12') AS result",
    "TRIM()" => "SELECT TRIM('  PHP  ') AS result",
    "LTRIM()" => "SELECT LTRIM('  PHP') AS result",
    "RTRIM()" => "SELECT RTRIM('PHP   ') AS result",
    "LPAD()" => "SELECT LPAD('PHP', 10, '*') AS result",
    "RPAD()" => "SELECT RPAD('PHP', 10, '*') AS result",
    "LOCATE()" => "SELECT LOCATE('gram', 'Programming') AS result"
);

echo "<h2>MySQL String Functions</h2>";

foreach ($queries as $function => $sql) {
    $result = $conn->query($sql);

    if ($result) {
        $row = $result->fetch_assoc();
        echo "<b>" . $function . "</b>: " . htmlspecialchars((string)$row["result"]) . "<br>";
    } else {
        echo "<b>" . $function . "</b>: Error - " . htmlspecialchars($conn->error) . "<br>";
    }
}

$conn->close();
?>