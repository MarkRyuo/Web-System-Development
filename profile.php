<?php
session_start();

// Check if the user is logged in, if not, redirect to login page
if (!isset($_SESSION['username']) || !isset($_SESSION['role'])) {
    header("Location: /login.html"); // Update the path if needed
    exit();
}

$username = $_SESSION['username'];
$role = $_SESSION['role'];
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="/Login/profile.css">
  <title>User Profile</title>
</head>
<body>

  <div class="profile-container">
    <h1>User Profile</h1>
    <p>Welcome, <?php echo $username; ?>! Your role is <?php echo $role; ?>.</p>
    <!-- Add more profile information as needed -->
    <a href="/logout.php">Logout</a> <!-- Provide a link to the logout page -->
  </div>

</body>
</html>
