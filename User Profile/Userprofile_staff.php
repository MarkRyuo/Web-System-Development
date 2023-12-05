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
  header('Location: Userprofile_staff.php');
  exit;
}

// if ($_SESSION['role'] !== 'admin') {
//   // Redirect if the user is not an admin
//   header('Location: /UserProfile Security/userProfileSecurity.php');
//   exit;
// }

// Retrieve user information from the session
$username = $_SESSION['username'];
$usersign = $_SESSION['usersign'];
?>