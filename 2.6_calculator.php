<!DOCTYPE html>
<html>
<head><title>2.6 Calculator</title></head>
<body>
<h2>Simple Calculator</h2>

<form method="post">
    Number 1:
    <input type="number" step="any" name="n1" required><br><br>

    Number 2:
    <input type="number" step="any" name="n2" required><br><br>

    Operation:
    <select name="op">
        <option value="+">Addition (+)</option>
        <option value="-">Subtraction (-)</option>
        <option value="*">Multiplication (*)</option>
        <option value="/">Division (/)</option>
    </select><br><br>

    <input type="submit" value="Calculate">
</form>

<?php
function calculator($a, $b, $op) {
    switch ($op) {
        case "+":
            return $a + $b;
        case "-":
            return $a - $b;
        case "*":
            return $a * $b;
        case "/":
            return ($b != 0) ? $a / $b : "Cannot divide by zero";
        default:
            return "Invalid operation";
    }
}

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $n1 = (float) $_POST["n1"];
    $n2 = (float) $_POST["n2"];
    $op = $_POST["op"];

    echo "<h3>Answer: " . calculator($n1, $n2, $op) . "</h3>";
}
?>
</body>
</html>