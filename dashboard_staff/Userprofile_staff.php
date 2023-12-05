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

// Check if the user is not logged in
if (!isset($_SESSION['username'])) {
    header('Location: Userprofile_staff.php');
    exit;
}

// Retrieve user information from the session
$username = $_SESSION['username'];
$role = $_SESSION['role'];

// // Check if the user is not a staff member
// if ($role !== 'staff') {
//     header('Location: /dashboard/Dashboard.html'); // Redirect to the appropriate page for non-staff members
//     exit;
// }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Welcome staff</title>
</head>
<body>

<form class="input">
    <h1>Welcome staff!</h1>

    <label for="role" class="role">User Role:</label>
    <input type="text" id="role" name="role" value="<?php echo htmlspecialchars($role); ?>" readonly>

    <label for="username">Username:</label>
    <input type="text" id="username" name="username" value="<?php echo htmlspecialchars($username); ?>" readonly>
</form>

</body>
</html>
