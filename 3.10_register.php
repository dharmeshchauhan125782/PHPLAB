<?php
$conn = mysqli_connect("localhost", "root", "", "college");

if (!$conn) {
    die("Database Connection Failed: " . mysqli_connect_error());
}

$message = "";

if (isset($_POST['submit'])) {
    $name = trim($_POST['name']);
    $email = trim($_POST['email']);
    $password = $_POST['password'];

    $stmt = mysqli_prepare(
        $conn,
        "INSERT INTO users (name, email, password) VALUES (?, ?, ?)"
    );

    if ($stmt) {
        mysqli_stmt_bind_param($stmt, "sss", $name, $email, $password);

        if (mysqli_stmt_execute($stmt)) {
            $message = "Registration Successful.";
        } else {
            $message = "Error: " . mysqli_stmt_error($stmt);
        }

        mysqli_stmt_close($stmt);
    } else {
        $message = "Error preparing query: " . mysqli_error($conn);
    }
}
?>
<!DOCTYPE html>
<html>
<body>
<h2>Registration Form</h2>

<form method="post">
    Name:
    <input type="text" name="name" required>
    <br><br>

    Email:
    <input type="email" name="email" required>
    <br><br>

    Password:
    <input type="password" name="password" required>
    <br><br>

    <input type="submit" name="submit" value="Register">
</form>

<p><?php echo htmlspecialchars($message); ?></p>
</body>
</html>

<?php
mysqli_close($conn);
?>
