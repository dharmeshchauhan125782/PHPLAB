<?php
if (isset($_COOKIE["user"])) {
    echo "Cookie Value: " . htmlspecialchars($_COOKIE["user"]);
} else {
    echo "Cookie is not available. Please open 3.3_cookie_with_header.php first.";
}
?>
