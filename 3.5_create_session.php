<?php
session_start();

$_SESSION["name"] = "Vaibhav";

echo "Session Created Successfully.<br>";
echo "Session Name: " . htmlspecialchars($_SESSION["name"]);
?>
