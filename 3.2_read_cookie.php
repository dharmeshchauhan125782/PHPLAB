<?php
if (isset($_COOKIE["username"])) {
    echo "Welcome " . htmlspecialchars($_COOKIE["username"]);
} else {
    echo "Cookie Not Found.";
}
?>
