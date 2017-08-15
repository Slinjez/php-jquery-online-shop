<?php
session_start();
// remove all session variables
session_unset();

// destroy the session
session_destroy();

//redirect home.
$_SESSION['$errorMessage']="Logged out!";
header("Location: ../index.php");
?>