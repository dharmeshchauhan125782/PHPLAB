<!DOCTYPE html>
<html>
<head><title>2.2 Sort Array</title></head>
<body>
<h2>Sort an Array Entered by User</h2>

<form method="post">
    Enter numbers (comma separated):
    <input type="text" name="numbers" required>
    <input type="submit" value="Sort">
</form>

<?php
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $input = trim($_POST["numbers"]);
    $values = array_map("trim", explode(",", $input));
    $numbers = array();

    foreach ($values as $value) {
        if ($value !== "" && is_numeric($value)) {
            $numbers[] = $value + 0;
        }
    }

    if (count($numbers) > 0) {
        sort($numbers, SORT_NUMERIC);
        echo "<h3>Sorted Array</h3>";
        echo implode(", ", $numbers);
    } else {
        echo "<p>Please enter valid numbers.</p>";
    }
}
?>
</body>
</html>