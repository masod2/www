<?php
// Start the session
session_start();

// Destroy the session
session_destroy();

// Unset all session variables
session_unset();

// Redirect to the login page
header("Location: http://localhost/");
exit;?>