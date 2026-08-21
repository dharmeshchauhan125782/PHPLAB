<!DOCTYPE html>
<html>
<body>
<h2>5.5 Fetch Database Information with AJAX</h2>
<button onclick="loadStudents()">Show Students</button>
<div id="demo"></div>
<script>
function loadStudents() {
    var xhttp = new XMLHttpRequest();
    xhttp.onreadystatechange = function () {
        if (this.readyState == 4 && this.status == 200) {
            document.getElementById("demo").innerHTML = this.responseText;
        }
    };
    xhttp.open("GET", "database.php", true);
    xhttp.send();
}
</script>
</body>
</html>