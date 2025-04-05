<?php
// logout.php

// Start the session
session_start();

// Set language for redirection messages
if ($_SESSION['lang'] == 'en') {
    $redirect_message = "You have been logged out.";
} else {
    $redirect_message = "U bent uitgelogd.";
}

// Unset all session variables
$_SESSION = array();

// Destroy the session cookie if it exists
if (isset($_COOKIE[session_name()])) {
    setcookie(session_name(), '', time() - 42000, '/');
}

// Destroy the session
session_destroy();

// Redirect to the home page or login page with a message
header("Location: /tandartsonline/index.php?message=" . urlencode($redirect_message));
exit();
?>
