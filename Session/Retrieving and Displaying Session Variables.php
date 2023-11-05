<?php
// Start a session
session_start();

// Retrieve and display the value of the session variable "userId"
if (isset($_SESSION["userId"])) {
    echo "User ID: " . $_SESSION["userId"] . "<br>";
}

// Retrieve and display the value of the session variable "userName"
if (isset($_SESSION["userName"])) {
    echo "User Name: " . $_SESSION["userName"] . "<br>";
}

// Retrieve and display the value of the session variable "Age"
if (isset($_SESSION["Age"])) {
    echo "Age: " . $_SESSION["Age"] . "<br>";
}
?>
