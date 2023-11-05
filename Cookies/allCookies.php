<?php
// Set a cookie named "userList" with the value "Student Name" and an expiration time of 3.5 hours
setcookie("userList", "Student Name", time() + 3.5 * 3600);

// Set a cookie named "userCourse" with the value "IT" and the same expiration time
setcookie("userCourse", "IT", time() + 3.5 * 3600);

echo "Cookies set successfully.";
?>

<?php
// Delete the "userList" cookie
setcookie("userList", "Student Name", time() - 3600);

// Delete the "userCourse" cookie
setcookie("userCourse", "IT", time() - 3600);

echo "Cookies deleted successfully.";
?>

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
