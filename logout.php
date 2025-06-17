<?php
// Start the session
session_start();

// Destroy all session data
session_unset(); // Removes all session variables
session_destroy(); // Destroys the session

// Redirect to the homepage or login page after logout
header("Location: index.php"); // You can change this to your homepage if needed
exit();
?>
