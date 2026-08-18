<?php
session_start();

$conn = mysqli_connect("localhost", "root", "", "college");

if (!$conn) {
    die("Connection Failed: " . mysqli_connect_error());
}

$message = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = trim($_POST["username"] ?? "");
    $password = $_POST["password"] ?? "";

    $stmt = mysqli_prepare(
        $conn,
        "SELECT id, username, password FROM users WHERE username = ? AND password = ?"
    );

    mysqli_stmt_bind_param($stmt, "ss", $username, $password);
    mysqli_stmt_execute($stmt);

    $result = mysqli_stmt_get_result($stmt);

    if (mysqli_num_rows($result) == 1) {
        $user = mysqli_fetch_assoc($result);
        $_SESSION["user_id"] = $user["id"];
        $_SESSION["username"] = $user["username"];

        header("Location: 4.9_home.php");
        exit;
    } else {
        $message = "Invalid Username or Password";
    }

    mysqli_stmt_close($stmt);
}
?>
<!DOCTYPE html>
<html>
<head>
    <title>Login</title>
</head>
<body>
<h2>Login Form</h2>

<form method="post">
    Username:
    <input type="text" name="username" required><br><br>

    Password:
    <input type="password" name="password" required><br><br>

    <input type="submit" value="Login">
</form>

<p><?php echo htmlspecialchars($message); ?></p>
</body>
</html>
<?php mysqli_close($conn); ?>