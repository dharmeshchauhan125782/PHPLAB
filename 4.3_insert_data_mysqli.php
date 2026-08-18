<?php
$conn = mysqli_connect("localhost", "root", "", "college");

if (!$conn) {
    die("Connection Failed: " . mysqli_connect_error());
}

$sql = "INSERT INTO student (name, email)
        VALUES ('Vaibhav', 'vaibhav@gmail.com')";

if (mysqli_query($conn, $sql)) {
    echo "Record Inserted Successfully";
} else {
    echo "Error: " . mysqli_error($conn);
}

mysqli_close($conn);
?>