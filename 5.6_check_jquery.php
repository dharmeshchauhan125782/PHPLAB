<!DOCTYPE html>
<html>
<head>
<script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
</head>
<body>
<h2>5.6 Check jQuery</h2>
<p id="demo"></p>
<script>
if (window.jQuery) {
    $("#demo").text("jQuery is loaded successfully.");
} else {
    document.getElementById("demo").textContent = "jQuery is not loaded.";
}
</script>
</body>
</html>