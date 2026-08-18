<?php
$conn = mysqli_connect("localhost", "root", "", "college");

if (!$conn) {
    die("Connection Failed: " . mysqli_connect_error());
}

$sql = "CREATE TABLE IF NOT EXISTS student (
    id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(50) NOT NULL,
    email VARCHAR(100) NOT NULL
)";

if (mysqli_query($conn, $sql)) {
    echo "Table Created Successfully";
} else {
    echo "Error: " . mysqli_error($conn);
}

mysqli_close($conn);
?>