<!DOCTYPE html>
<html>
<body>
<form method="post">
    Enter Name:
    <input type="text" name="name" required>
    <input type="submit" name="submit" value="Save">
</form>

<?php
if (isset($_POST['submit'])) {
    $name = $_POST['name'];
    setcookie("username", $name, time() + 3600, "/");
    echo "Cookie Created Successfully. Refresh the page to read it.";
}
?>
</body>
</html>
