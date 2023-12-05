<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Profile</title>
</head>
<body>

<?php
session_start();

if (!isset($_SESSION['username'])) {
    header("Location: login.php");
    exit();
}

include('config.php');

$username = $_SESSION['username'];

$sql = "SELECT * FROM users WHERE username = '$username'";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    $row = $result->fetch_assoc();
    echo "<h1>Welcome, " . $row['username'] . "!</h1>";
    echo "<p>Your role: " . $row['role'] . "</p>";
} else {
    echo "User not found.";
}

$conn->close();
?>

</body>
</html>
