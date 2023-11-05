<?php
// Delete the "userList" cookie
setcookie("userList", "", time() - 3600);

// Delete the "userCourse" cookie
setcookie("userCourse", "", time() - 3600);

echo "Cookies deleted successfully.";
?>
