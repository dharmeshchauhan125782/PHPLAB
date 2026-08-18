<?php
try {
    $conn = new PDO("mysql:host=localhost;dbname=college", "root", "");
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    $sql = "INSERT INTO student_pdo (name, email)
            VALUES ('Rahul', 'rahul@gmail.com')";

    $conn->exec($sql);
    echo "Record Inserted Successfully";
} catch (PDOException $e) {
    echo "Error: " . $e->getMessage();
}
?>