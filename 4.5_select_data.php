<?php
$conn = mysqli_connect("localhost", "root", "", "college");

if (!$conn) {
    die("Connection Failed: " . mysqli_connect_error());
}

$sql = "SELECT * FROM student";
$result = mysqli_query($conn, $sql);

if (mysqli_num_rows($result) > 0) {
    while ($row = mysqli_fetch_assoc($result)) {
        echo "ID: " . htmlspecialchars($row["id"]) . "<br>";
        echo "Name: " . htmlspecialchars($row["name"]) . "<br>";
        echo "Email: " . htmlspecialchars($row["email"]) . "<br><hr>";
    }
} else {
    echo "No Records Found";
}

mysqli_close($conn);
?>