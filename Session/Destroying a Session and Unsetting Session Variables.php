<?php
// Start a session
session_start();

// Unset all session variables
session_unset();

// Destroy the session
session_destroy();

echo "Session destroyed and variables unset successfully.";
?>
