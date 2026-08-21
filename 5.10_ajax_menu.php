<!DOCTYPE html>
<html>
<head>
<script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
<style>
a { margin-right: 15px; }
#content { margin-top: 20px; padding: 15px; border: 1px solid #999; }
</style>
</head>
<body>
<h2>5.10 AJAX Navigation Menu</h2>
<a href="#" data-page="home.html">Home</a>
<a href="#" data-page="about.html">About</a>
<a href="#" data-page="contact.html">Contact</a>
<div id="content">Welcome to the website.</div>
<script>
$("a[data-page]").click(function (event) {
    event.preventDefault();
    $("#content").load($(this).data("page"));
});
</script>
</body>
</html>