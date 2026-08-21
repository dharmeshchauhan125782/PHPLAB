<!DOCTYPE html>
<html>
<body>
<h2>5.3 Retrieve Header Information</h2>
<button onclick="getHeaders()">Get Headers</button>
<pre id="demo"></pre>
<script>
function getHeaders() {
    var xhttp = new XMLHttpRequest();
    xhttp.onreadystatechange = function () {
        if (this.readyState == 4 && this.status == 200) {
            document.getElementById("demo").textContent =
                this.getAllResponseHeaders();
        }
    };
    xhttp.open("GET", "data.txt", true);
    xhttp.send();
}
</script>
</body>
</html>