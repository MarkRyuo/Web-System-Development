<?php
// Start a session
session_start();

// Set session variables
$_SESSION["userId"] = 901010;
$_SESSION["userName"] = "Hatdog";
$_SESSION["Age"] = "20";

echo "Session variables set successfully.";
?>
