<?php
// Set a cookie named "userList" with the value "Student Name" and an expiration time of 3.5 hours
setcookie("userList", "Jhon Mark", time() + 3.5 * 3600);

// Set a cookie named "userCourse" with the value "IT" and the same expiration time
setcookie("userCourse", "IT-NT", time() + 3.5 * 3600);

echo "Cookies set successfully.";
?>


