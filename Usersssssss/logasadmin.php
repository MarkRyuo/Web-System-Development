<?php

session_start();
require_once('config.php');

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $username = $_POST['username'];
    $password = $_POST['password'];

    // Use prepared statements to prevent SQL injection
    $stmt = $conn->prepare('SELECT * FROM users WHERE username = ? AND password = ?');
    $stmt->bind_param('ss', $username, $password);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        $user = $result->fetch_assoc();
        $_SESSION['username'] = $user['username'];
        $_SESSION['role'] = $user['role'];
        // Assuming you retrieve full name from the database query
        // $_SESSION['usersign'] = $user['usersign'];


        // Redirect based on the user's role
        if ($user['role'] === 'admin') {
            header('Location: /Usersssssss/adminprofile.php');
        } else {
            header('Location: /Usersssssss/staffprofile.php');
        }
        exit;
    } else {
        echo "Invalid username or password";
    }

    $stmt->close();
}
?>

