<?php
$message = "";

if (isset($_POST['login'])) {
    $username = $_POST['username'];
    $password = $_POST['password'];

    if (isset($_POST['remember'])) {
        setcookie("remember_username", $username, time() + 3600, "/");
        setcookie("remember_password", $password, time() + 3600, "/");
    } else {
        setcookie("remember_username", "", time() - 3600, "/");
        setcookie("remember_password", "", time() - 3600, "/");
    }

    $message = "Login details submitted successfully.";
}

$savedUsername = isset($_COOKIE['remember_username']) ? $_COOKIE['remember_username'] : "";
$savedPassword = isset($_COOKIE['remember_password']) ? $_COOKIE['remember_password'] : "";
?>
<!DOCTYPE html>
<html>
<body>
<h2>Remember Username and Password</h2>

<form method="post">
    Username:
    <input type="text" name="username"
           value="<?php echo htmlspecialchars($savedUsername); ?>" required>
    <br><br>

    Password:
    <input type="password" name="password"
           value="<?php echo htmlspecialchars($savedPassword); ?>" required>
    <br><br>

    <input type="checkbox" name="remember"
        <?php if ($savedUsername !== "") echo "checked"; ?>>
    Remember Me
    <br><br>

    <input type="submit" name="login" value="Login">
</form>

<p><?php echo htmlspecialchars($message); ?></p>
</body>
</html>
