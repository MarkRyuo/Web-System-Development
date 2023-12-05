<?php
session_start();

include('config.php');

if (!isset($_SESSION['username'])) {
    header("Location: /Login/login.php");
    exit();
}

$username = $_SESSION['username'];

$sql = "SELECT * FROM users WHERE username='$username'";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    $row = $result->fetch_assoc();
    $id = $row['id'];
    $role = $row['role'];
} else {
    echo "Error fetching user data.";
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Profile</title>
</head>
<body>
    <h1>Welcome, <?php echo $username; ?>!</h1>
    <p>User ID: <?php echo $id; ?></p>
    <p>Role: <?php echo $role; ?></p>
    <a href="logout.php">Logout</a>
</body>
</html>
