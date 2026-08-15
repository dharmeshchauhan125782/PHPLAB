<?php
setcookie("username", "", time() - 3600, "/");
unset($_COOKIE["username"]);
echo "Cookie Deleted Successfully.";
?>
