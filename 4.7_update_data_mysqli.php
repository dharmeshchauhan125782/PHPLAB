<?php
$conn = mysqli_connect("localhost", "root", "", "college");

if (!$conn) {
    die("Connection Failed: " . mysqli_connect_error());
}

$id = 1;
$name = "Ravi";
$email = "ravi@gmail.com";

$stmt = mysqli_prepare(
    $conn,
    "UPDATE student SET name = ?, email = ? WHERE id = ?"
);

mysqli_stmt_bind_param($stmt, "ssi", $name, $email, $id);

if (mysqli_stmt_execute($stmt)) {
    echo "Record Updated Successfully Using MySQLi";
} else {
    echo "Error: " . mysqli_stmt_error($stmt);
}

mysqli_stmt_close($stmt);
mysqli_close($conn);
?>