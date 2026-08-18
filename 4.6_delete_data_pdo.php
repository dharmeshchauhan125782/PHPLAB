<?php
try {
    $conn = new PDO("mysql:host=localhost;dbname=college", "root", "");
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    $id = 1;
    $stmt = $conn->prepare("DELETE FROM student_pdo WHERE id = ?");
    $stmt->execute([$id]);

    echo "Record Deleted Successfully Using PDO";
} catch (PDOException $e) {
    echo "Error: " . $e->getMessage();
}
?>