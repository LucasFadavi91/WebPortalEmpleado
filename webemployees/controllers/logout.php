<?php 

session_start();

// remove all session variables
session_unset();

// destroy the session
session_destroy();

//Redirecciono al login
header("location: ../controllers/controller_login.php");
exit;
?>