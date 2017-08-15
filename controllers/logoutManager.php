<?php
session_start();
session_unset();
session_destroy();
$_SESSION['$errorMessage']="Logged out!";
header("Location: ../index.php");
?>