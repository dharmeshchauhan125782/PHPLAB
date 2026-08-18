<?php
session_start();

if (!isset($_SESSION["user_id"])) {
    die("Please login first.");
}

$conn = mysqli_connect("localhost", "root", "", "college");

if (!$conn) {
    die("Connection Failed: " . mysqli_connect_error());
}

$id = $_SESSION["user_id"];
$message = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = trim($_POST["name"] ?? "");
    $email = trim($_POST["email"] ?? "");

    $stmt = mysqli_prepare(
        $conn,
        "UPDATE users SET username = ?, email = ? WHERE id = ?"
    );

    mysqli_stmt_bind_param($stmt, "ssi", $name, $email, $id);

    if (mysqli_stmt_execute($stmt)) {
        $_SESSION["username"] = $name;
        $message = "Profile Updated Successfully";
    } else {
        $message = "Profile Update Failed";
    }

    mysqli_stmt_close($stmt);
}

$stmt = mysqli_prepare(
    $conn,
    "SELECT username, email FROM users WHERE id = ?"
);
mysqli_stmt_bind_param($stmt, "i", $id);
mysqli_stmt_execute($stmt);

$result = mysqli_stmt_get_result($stmt);
$user = mysqli_fetch_assoc($result);

if (!$user) {
    die("User Not Found");
}

mysqli_stmt_close($stmt);
mysqli_close($conn);
?>
<!DOCTYPE html>
<html>
<head>
    <title>Edit Profile</title>
</head>
<body>
<h2>Edit Profile</h2>

<p><?php echo htmlspecialchars($message); ?></p>

<form method="post">
    Username:
    <input type="text" name="name"
           value="<?php echo htmlspecialchars($user["username"]); ?>"
           required><br><br>

    Email:
    <input type="email" name="email"
           value="<?php echo htmlspecialchars($user["email"] ?? ""); ?>"
           required><br><br>

    <input type="submit" value="Update Profile">
</form>
</body>
</html>