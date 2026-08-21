<!DOCTYPE html>
<html>
<body>
<h2>5.2 XMLHttpRequest with Callback</h2>
<button onclick="loadDoc()">Load File</button>
<p id="demo"></p>
<script>
function loadDoc() {
    var xhttp = new XMLHttpRequest();
    xhttp.onload = function () {
        myFunction(this);
    };
    xhttp.open("GET", "data.txt", true);
    xhttp.send();
}
function myFunction(xhttp) {
    document.getElementById("demo").innerHTML = xhttp.responseText;
}
</script>
</body>
</html>