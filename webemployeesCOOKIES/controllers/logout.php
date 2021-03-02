<?php 
/*
session_start();

// remove all session variables
session_unset();

// destroy the session
session_destroy();

*/

//Establezo el tiempo de la cookie a 0 
setcookie("userId" , '' , time()-(86400 * 10), '/');
 
//Redirecciono al login

//Redirecciono al login
header("location: ../controllers/controller_login.php");
exit;
?>