<?php
setcookie("user", "Vaibhav", time() + 3600, "/");
header("Location: 3.3_home.php");
exit;
?>
