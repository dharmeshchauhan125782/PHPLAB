<?php
if (isset($_COOKIE["visitor"])) {
    echo "Welcome Back! You are a repeated user.";
} else {
    setcookie("visitor", "Yes", time() + (30 * 24 * 60 * 60), "/");
    echo "Welcome! You are a new user.";
}
?>
