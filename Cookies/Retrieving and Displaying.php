<?php
// Retrieve and display the value of the cookie named "userList"
if (isset($_COOKIE["userList"])) {
    echo "User List: " . $_COOKIE["userList"] . "<br>";
}

// Retrieve and display the value of the cookie named "userCourse"
if (isset($_COOKIE["userCourse"])) {
    echo "User Course: " . $_COOKIE["userCourse"] . "<br>";
}
?>
