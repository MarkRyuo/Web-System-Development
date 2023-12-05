<?php
session_start();

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "ims_db";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if (!isset($_SESSION['username']) || !isset($_SESSION['role'])) {
    header('Location: Userprofile.php');
    exit;
}

// Retrieve user information from the session
$username = htmlspecialchars($_SESSION['username']);
$role = htmlspecialchars($_SESSION['role']);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Welcome <?php echo ucfirst($role); ?></title>
</head>
<body>

<form class="input">
    <?php if ($role === 'admin'): ?>
        <h1>Welcome Admin!</h1>
        <!-- Admin-specific content goes here -->
        <label for="role" class="role">User Role:</label>
        <input type="text" id="role" name="role" value="<?php echo $role; ?>" readonly>
        <label for="username">Username:</label>
        <input type="text" id="username" name="username" value="<?php echo $username; ?>" readonly>
        <!-- Admin-specific content goes here -->
    <?php else: ?>
        <h1>Welcome Staff!</h1>
        <!-- Staff-specific content goes here -->
        <label for="role" class="role">User Role:</label>
        <input type="text" id="role" name="role" value="<?php echo $role; ?>" readonly>
        <label for="username">Username:</label>
        <input type="text" id="username" name="username" value="<?php echo $username; ?>" readonly>
        <!-- Staff-specific content goes here -->
    <?php endif; ?>
</form>

</body>
</html>
