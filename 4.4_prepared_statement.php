<?php
$conn = mysqli_connect("localhost", "root", "", "college");

if (!$conn) {
    die("Connection Failed: " . mysqli_connect_error());
}

$stmt = mysqli_prepare(
    $conn,
    "INSERT INTO student (name, email) VALUES (?, ?)"
);

$name = "Amit";
$email = "amit@gmail.com";

mysqli_stmt_bind_param($stmt, "ss", $name, $email);

if (mysqli_stmt_execute($stmt)) {
    echo "Data Inserted Successfully Using Prepared Statement";
} else {
    echo "Error: " . mysqli_stmt_error($stmt);
}

mysqli_stmt_close($stmt);
mysqli_close($conn);
?>