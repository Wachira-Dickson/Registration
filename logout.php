<?php
session_start();        // Start the session
session_unset();        // Unset all session variables
session_destroy();      // Destroy the session completely
header("Location: login.php");  // Redirect to login page
exit();
if (isset($_GET["logged_out"])) {
    echo "<div class='alert alert-info'>You have been logged out.</div>";
}
header("Location: login.php?logged_out=1");

?>
