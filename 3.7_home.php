<?php
session_start();

if (!isset($_SESSION['user'])) {
    header("Location: 3.7_login.php");
    exit;
}
?>
<!DOCTYPE html>
<html>
<body>
<h2>Home Page</h2>

<p>Welcome <?php echo htmlspecialchars($_SESSION['user']); ?></p>

<a href="3.7_logout.php">Logout</a>
</body>
</html>
