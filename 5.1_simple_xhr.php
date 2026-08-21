<!DOCTYPE html>
<html>
<body>
<h2>5.1 Simple XMLHttpRequest</h2>
<button onclick="loadData()">Load Data</button>
<p id="demo"></p>
<script>
function loadData() {
    var xhttp = new XMLHttpRequest();
    xhttp.onreadystatechange = function () {
        if (this.readyState == 4 && this.status == 200) {
            document.getElementById("demo").innerHTML = this.responseText;
        }
    };
    xhttp.open("GET", "data.txt", true);
    xhttp.send();
}
</script>
</body>
</html>