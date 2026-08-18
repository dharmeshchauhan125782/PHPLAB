<?php
try {
    $conn = new PDO("mysql:host=localhost;dbname=college", "root", "");
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    $sql = "CREATE TABLE IF NOT EXISTS student_pdo (
        id INT AUTO_INCREMENT PRIMARY KEY,
        name VARCHAR(50) NOT NULL,
        email VARCHAR(100) NOT NULL
    )";

    $conn->exec($sql);
    echo "Table Created Successfully";
} catch (PDOException $e) {
    echo "Error: " . $e->getMessage();
}
?>