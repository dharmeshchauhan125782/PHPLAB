<!DOCTYPE html>
<html>
<head>
<script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
<style>body { height: 1500px; }</style>
</head>
<body>
<h2>5.7 Smooth Scroll to Top</h2>
<p>Scroll down and click the button.</p>
<div style="margin-top:1100px;">
<button id="topBtn">Go To Top</button>
</div>
<script>
$("#topBtn").click(function () {
    $("html, body").animate({ scrollTop: 0 }, 1000);
});
</script>
</body>
</html>