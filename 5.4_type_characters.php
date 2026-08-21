<!DOCTYPE html>
<html>
<body>
<h2>5.4 Communicate with Server While Typing</h2>
<label>Type your name:</label>
<input type="text" onkeyup="showHint(this.value)">
<p id="txtHint"></p>
<script>
function showHint(str) {
    if (str.length == 0) {
        document.getElementById("txtHint").innerHTML = "";
        return;
    }
    var xhttp = new XMLHttpRequest();
    xhttp.onreadystatechange = function () {
        if (this.readyState == 4 && this.status == 200) {
            document.getElementById("txtHint").innerHTML = this.responseText;
        }
    };
    xhttp.open("GET", "hint.php?q=" + encodeURIComponent(str), true);
    xhttp.send();
}
</script>
</body>
</html>