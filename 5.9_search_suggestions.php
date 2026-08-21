<!DOCTYPE html>
<html>
<head>
<script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
</head>
<body>
<h2>5.9 Search Suggestions</h2>
<input type="text" id="search" placeholder="Type to search">
<div id="result"></div>
<script>
$("#search").on("keyup", function () {
    var text = $(this).val();
    if (text.length === 0) {
        $("#result").html("");
        return;
    }
    $.get("search.php", { q: text }, function (data) {
        $("#result").html(data);
    });
});
</script>
</body>
</html>