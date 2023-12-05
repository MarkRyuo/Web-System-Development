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

if (!isset($_SESSION['username'])) {
  header('Location: /Usersssssss/staffprofile.php');
  exit;
}

// if ($_SESSION['role'] !== 'admin') {
//   // Redirect if the user is not an admin
//   header('Location: /UserProfile Security/userProfileSecurity.php');
//   exit;
// }

// Retrieve user information from the session
$username = $_SESSION['username'];
$role = $_SESSION['role'];
?>


<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
</head>
<body>

  <form class="input" action="staffprofile.php">
    <h1>Welcome staff!</h1>

    <label for="role" class="role">User Role:</label>
    <input type="text" id="role" name="role" value="<?php echo htmlspecialchars($role); ?>" readonly>

    <label for="username">Username:</label>
    <input type="text" id="username" name="username" value="<?php echo htmlspecialchars($username); ?>" readonly>
</form>
  
</body>
</html>