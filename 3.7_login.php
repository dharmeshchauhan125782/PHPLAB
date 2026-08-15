<?php
session_start();

if (isset($_SESSION['user'])) {
    header("Location: 3.7_home.php");
    exit;
}

$message = "";

if (isset($_POST['login'])) {
    $user = $_POST['username'];
    $pass = $_POST['password'];

    if ($user === "admin" && $pass === "123") {
        $_SESSION['user'] = $user;
        header("Location: 3.7_home.php");
        exit;
    } else {
        $message = "Invalid Username or Password";
    }
}
?>
<!DOCTYPE html>
<html>
<body>
<h2>Login Form</h2>

<form method="post">
    Username:
    <input type="text" name="username" required><br><br>

    Password:
    <input type="password" name="password" required><br><br>

    <input type="submit" name="login" value="Login">
</form>

<p><?php echo htmlspecialchars($message); ?></p>
<p>Demo Username: admin | Password: 123</p>
</body>
</html>
