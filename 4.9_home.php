<?php
session_start();

if (!isset($_SESSION["user_id"])) {
    header("Location: 4.9_login.php");
    exit;
}
?>
<!DOCTYPE html>
<html>
<head>
    <title>Home Page</title>
</head>
<body>
<h2>Welcome, <?php echo htmlspecialchars($_SESSION["username"]); ?></h2>
<p>You have successfully logged in.</p>
</body>
</html>