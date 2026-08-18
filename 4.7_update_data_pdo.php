<?php
try {
    $conn = new PDO("mysql:host=localhost;dbname=college", "root", "");
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    $id = 1;
    $name = "Ravi";
    $email = "ravi@gmail.com";

    $stmt = $conn->prepare(
        "UPDATE student_pdo SET name = ?, email = ? WHERE id = ?"
    );

    $stmt->execute([$name, $email, $id]);

    echo "Record Updated Successfully Using PDO";
} catch (PDOException $e) {
    echo "Error: " . $e->getMessage();
}
?>