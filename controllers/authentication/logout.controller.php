<?php
session_start();

// Clear all session variables
session_unset();

// Redirect to the login page
header("Location: login.php");
exit;