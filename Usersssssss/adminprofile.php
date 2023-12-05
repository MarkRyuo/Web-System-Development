<?php
session_start();

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "db_nt3102";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if (!isset($_SESSION['username'])) {
  header('Location: userProfile.php');
  exit;
}

if ($_SESSION['role'] !== 'admin') {
  // Redirect if the user is not an admin
  header('Location: /UserProfile Security/userProfileSecurity.php');
  exit;
}

// Retrieve user information from the session
$username = $_SESSION['username'];
$usersign = $_SESSION['usersign'];
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>admin</title>
</head>
<body>

<form class="input">
    <h1>Welcome admin!</h1>

    <label for="role" class="role">User Role:</label>
    <input type="text" id="role" name="role" value="<?php echo htmlspecialchars($role); ?>" readonly>

    <label for="username">Username:</label>
    <input type="text" id="username" name="username" value="<?php echo htmlspecialchars($username); ?>" readonly>
</form>
  
</body>
</html>